<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;

class JoinWailListControoller extends Controller
{
    public function joinWaitList()
    {
        return view('pages.join-waitlist');
    }

    public function sendJoinWaitiListData(Request $request)
    {
        Log::info('Waitlist submission received', $request->all());

        // Validate the request
        $validator = Validator::make(
            $request->all(),
            [
                'userType' => 'required|string|in:user,specialist',
                'firstName' => 'nullable|string|max:255',
                'lastName' => 'nullable|string|max:255',
                'email' => 'required|email|max:255',
                'phoneNumber' => 'required|string|max:20',
                 'car_type' => 'nullable|string|max:50',
                'business_name' => 'nullable|string|max:255',
                'address' => 'nullable|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Prepare data for API
            $apiData = [
                'user_type' => $request->userType,
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'phone' => $request->phoneNumber,
                'car_type' => $request->car_type,
                'business_name' => $request->business_name,
                'location' => $request->location,
            ];

            // Make API request
            $response = Http::timeout(15)->post(config('api.backend_url') . '/waitlist', $apiData);

            Log::info('Waitlist API Response', [
                'status' => $response->status(),
                'body' => $response->json() ?? [],
            ]);

            $status = $response->status();
            $responseData = $response->json() ?? [];

            // Handle success (200 or 201)
            if ($status === 200 || $status === 201) {
                return back()->with('success', $responseData['message'] ?? 'Successfully joined the waitlist!');
            }

            // Handle validation error from backend (422)
            if ($status === 422) {
                $errors = $responseData['errors'] ?? null;
                $message = $responseData['message'] ?? 'Validation failed.';

                if ($errors) {
                    return back()->withErrors($errors)->withInput();
                }

                return back()->with('error', $message)->withInput();
            }

            // Handle duplicate or bad request (400)
            if ($status === 400) {
                $errorMessage = $responseData['error']
                    ?? $responseData['message']
                    ?? 'Invalid request. Please check your input.';
                
                return back()->with('error', $errorMessage)->withInput();
            }

            // Handle internal server errors (500)
            if ($status === 500) {
                Log::error('Waitlist Server Error', [
                    'message' => $responseData['message'] ?? 'Server error occurred.',
                    'details' => $responseData['details'] ?? '',
                    'status' => 500,
                ]);

                return back()
                    ->with('error', $responseData['message'] ?? 'Server error occurred. Please try again later.')
                    ->withInput();
            }

            // Handle any other unexpected response
            $errorMessage = $responseData['message']
                ?? $responseData['error']
                ?? 'Unexpected error occurred. Please try again.';

            return back()->with('error', $errorMessage)->withInput();

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Waitlist API Connection Failed', [
                'error' => $e->getMessage(),
                'url' => config('api.backend_url') . '/waitlist',
            ]);

            return back()->with('error', 'Unable to connect to server. Please check your internet connection and try again.')
                         ->withInput();
        } catch (\Exception $e) {
            Log::error('Waitlist Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage())->withInput();
        }
    }
}