<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JoinWaitListController extends Controller
{
    public function joinWaitList()
    {
        return view('pages.join-waitlist');
    }

    public function sendJoinWaitListData(Request $request)
    {
        Log::info('Waitlist submission received', $request->all());

        // Validate the request
        $validator = Validator::make($request->all(), [
            'userType' => 'required|string|in:user,mechanic',
            'firstName' => 'nullable|string|max:255',
            'lastName' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'phoneNumber' => 'required|string|max:20',
            'address' => 'nullable|string|max:500',             
        ]);

        if ($validator->fails()) {
            Log::warning('Waitlist validation failed', [
                'errors' => $validator->errors()->toArray(),
                'input' => $request->except(['_token'])
            ]);
            return back()->withErrors($validator)->withInput();
        }

        try {
            // Prepare data for API (camelCase to match expected payload)
            $apiData = [
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                'phoneNumber' => $request->phoneNumber,
                'userType' => $request->userType,
                'address' => $request->address,
            ];

            $apiUrl = config('api.backend_url') . '/waitlist/join';
            
            Log::info('Sending waitlist request to API', [
                'url' => $apiUrl,
                'payload' => $apiData,
                'timestamp' => now()->toIso8601String()
            ]);

            // Make API request with increased timeout
            $response = Http::timeout(15)
                ->withHeaders([
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ])
                ->post($apiUrl, $apiData);

            $status = $response->status();
            $responseData = $response->json() ?? [];
            $responseBody = $response->body();

            // Log comprehensive response details
            Log::info('Waitlist API Response Received', [
                'status' => $status,
                'headers' => $response->headers(),
                'body' => $responseData,
                'raw_body' => $responseBody,
                'request_duration' => $response->handlerStats()['total_time'] ?? 'N/A',
            ]);

            // Handle success (200 or 201)
            if ($status === 200 || $status === 201) {
                Log::info('Waitlist submission successful', [
                    'email' => $request->email,
                    'userType' => $request->userType,
                    'response_message' => $responseData['message'] ?? 'No message'
                ]);
                return back()->with('success', $responseData['message'] ?? 'Successfully joined the waitlist!');
            }

            // Handle validation error from backend (422)
            if ($status === 422) {
                $errors = $responseData['errors'] ?? null;
                $message = $responseData['message'] ?? 'Validation failed.';
                
                Log::warning('Backend validation error', [
                    'status' => 422,
                    'message' => $message,
                    'errors' => $errors,
                    'submitted_data' => $apiData
                ]);
                
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
                
                Log::warning('Bad request to waitlist API', [
                    'status' => 400,
                    'error_message' => $errorMessage,
                    'full_response' => $responseData,
                    'submitted_data' => $apiData
                ]);
                
                return back()->with('error', $errorMessage)->withInput();
            }

            // Handle internal server errors (500)
            if ($status === 500) {
                Log::error('Waitlist Server Error - DETAILED', [
                    'status' => 500,
                    'message' => $responseData['message'] ?? 'Server error occurred.',
                    'error' => $responseData['error'] ?? null,
                    'details' => $responseData['details'] ?? '',
                    'data' => $responseData['data'] ?? null,
                    'trace' => $responseData['trace'] ?? null,
                    'exception' => $responseData['exception'] ?? null,
                    'file' => $responseData['file'] ?? null,
                    'line' => $responseData['line'] ?? null,
                    'full_response_body' => $responseBody,
                    'submitted_payload' => $apiData,
                    'api_url' => $apiUrl,
                    'request_headers' => [
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json',
                    ]
                ]);
                
                return back()
                    ->with('error', $responseData['message'] ?? 'Server error occurred. Please try again later.')
                    ->withInput();
            }

            // Handle any other unexpected response
            $errorMessage = $responseData['message']
                ?? $responseData['error']
                ?? 'Unexpected error occurred. Please try again.';
            
            Log::error('Unexpected API response', [
                'status' => $status,
                'error_message' => $errorMessage,
                'full_response' => $responseData,
                'raw_body' => $responseBody,
                'submitted_data' => $apiData
            ]);
            
            return back()->with('error', $errorMessage)->withInput();

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Waitlist API Connection Failed - DETAILED', [
                'error' => $e->getMessage(),
                'exception_class' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'url' => config('api.backend_url') . '/waitlist/join',
                'full_api_url' => $apiUrl ?? 'N/A',
                'trace' => $e->getTraceAsString(),
                'timeout_setting' => 15,
                'submitted_data' => $apiData ?? [],
            ]);
            
            return back()->with('error', 'Unable to connect to server. Please check your internet connection and try again.')
                ->withInput();
                
        } catch (\Illuminate\Http\Client\RequestException $e) {
            Log::error('Waitlist API Request Exception', [
                'error' => $e->getMessage(),
                'exception_class' => get_class($e),
                'status_code' => $e->response->status() ?? 'N/A',
                'response_body' => $e->response->body() ?? 'N/A',
                'response_json' => $e->response->json() ?? [],
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);
            
            return back()->with('error', 'An error occurred while processing your request. Please try again.')
                ->withInput();
                
        } catch (\Exception $e) {
            Log::error('Waitlist General Exception - DETAILED', [
                'error' => $e->getMessage(),
                'exception_class' => get_class($e),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
                'submitted_data' => $apiData ?? [],
                'previous_exception' => $e->getPrevious() ? [
                    'message' => $e->getPrevious()->getMessage(),
                    'class' => get_class($e->getPrevious())
                ] : null
            ]);
            
            return back()->with('error', 'An unexpected error occurred: ' . $e->getMessage())->withInput();
        }
    }
}