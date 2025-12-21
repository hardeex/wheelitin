<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CarOwnerController extends Controller
{
    public function myQuotes()
    {
        return view('user-dashboard.my-quoted-list');
    }


    // public function showAcceptForm(Request $request, $reportId)
    // {
    //     $specialistId = $request->query('specialistId');
        
    //     if (!$specialistId) {
    //         return redirect()->route('index')->with('error', 'Invalid request: missing specialist information.');
    //     }

    //     Log::info('=== SHOWING ACCEPT FORM ===', [
    //         'report_id' => $reportId,
    //         'specialist_id' => $specialistId,
    //     ]);


    //     return view('user-dashboard.accept-form', [
    //         'reportId' => $reportId,
    //         'specialistId' => $specialistId,
    //     ]);
    // }


    public function showAcceptForm(Request $request, $reportId)
{
    $specialistId = $request->query('specialistId');
    if (!$specialistId) {
        return redirect()->route('index')->with('error', 'Invalid request: missing specialist information.');
    }

    Log::info('=== SHOWING ACCEPT FORM ===', [
        'report_id' => $reportId,
        'specialist_id' => $specialistId,
    ]);

    // Fetch the report to check its status
    $token = Session::get('access_token');
    
    try {
        $url = config('api.backend_url') . '/reports/' . $reportId;
        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($url);

        if ($response->successful()) {
            $report = $response->json()['data'] ?? $response->json()['report'] ?? null;
            
            // Check if report is still in pending status
            if ($report && isset($report['status']) && $report['status'] !== 'pending') {
                return redirect()->back()->with('error', 'This report is no longer in pending status and cannot be modified.');
            }
        }
    } catch (\Exception $e) {
        Log::error('Error fetching report status', ['error' => $e->getMessage()]);
    }

    return view('user-dashboard.accept-form', [
        'reportId' => $reportId,
        'specialistId' => $specialistId,
    ]);
}



   public function acceptReport(Request $request, $reportId)
{
    $startTime = microtime(true);

    Log::info('=== PUBLIC REPORT ACCEPT START ===', [
        'report_id' => $reportId,
        'specialistId' => $request->input('specialistId'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
        'timestamp' => now()->toDateTimeString(),
    ]);

    // Validation (specialistId is now an alphanumeric ID, not an email)
    $validator = Validator::make($request->all(), [
        'specialistId' => 'required|string',
        'date' => 'required|date|after_or_equal:today',
        'time' => 'required|date_format:H:i',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $specialistId = $request->input('specialistId');
    $date = $request->input('date');
    $time = $request->input('time');

    // Construct new backend URL format (query param, not path)
    $baseUrl = rtrim(config('api.backend_url'), '/');
  $url = "{$baseUrl}/reports/{$reportId}/accept/{$specialistId}";


    Log::info('Attempting to accept quotation', [
        'url' => $url,
        'report_id' => $reportId,
        'specialist_id' => $specialistId,
        'payload' => [
            'date' => $date,
            'time' => $time,
        ]
    ]);

    try {
        $response = Http::timeout(90)
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post($url, [
                'date' => $date,
                'time' => $time,
            ]);

        Log::info('Backend response (ACCEPT)', [
            'url' => $url,
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        if ($response->successful()) {
            Log::info('=== PUBLIC REPORT ACCEPT SUCCESS ===', [
                'report_id' => $reportId,
                'duration_seconds' => round(microtime(true) - $startTime, 2),
            ]);

            return redirect()
                ->route('index')
                ->with('success', "Quotation accepted successfully! The appointment is scheduled for {$date} at {$time}.");
        }

        $data = $response->json();
        $errorMessage = $data['error'] ?? $data['message'] ?? 'Failed to accept quotation.';

        if ($response->status() === 404) {
            $errorMessage = 'This quotation could not be found. It may have already been accepted or declined.';
        }

        return back()->with('error', $errorMessage)->withInput();

    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        Log::error('=== CONNECTION EXCEPTION ===', [
            'report_id' => $reportId,
            'exception_message' => $e->getMessage(),
        ]);

        return back()
            ->with('error', 'Could not connect to the server. Please try again.')
            ->withInput();

    } catch (\Exception $e) {
        Log::error('=== ACCEPT EXCEPTION ===', [
            'report_id' => $reportId,
            'exception_message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()
            ->with('error', 'An unexpected error occurred. Please try again.')
            ->withInput();
    }
}


public function declineReport(Request $request, $reportId)
{
    $startTime = microtime(true);

    Log::info('=== PUBLIC REPORT DECLINE START ===', [
        'report_id'    => $reportId,
        'specialistId' => $request->input('specialistId'),
        'timestamp'    => now()->toDateTimeString(),
    ]);

    //  Validation
    $validator = Validator::make($request->all(), [
        // The specialistId must be the user ID (not email)
        'specialistId' => 'required|string',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    $specialistId = $request->input('specialistId');

    //  Construct backend URL (path params style)
    $baseUrl = rtrim(config('api.backend_url'), '/');
    $url = "{$baseUrl}/reports/{$reportId}/decline/{$specialistId}";

    Log::info('Attempting to decline quotation', [
        'url'           => $url,
        'report_id'     => $reportId,
        'specialist_id' => $specialistId,
    ]);

    try {
        //  Make external API call (no payload)
        $response = Http::timeout(90)
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post($url);

        Log::info('Backend response (DECLINE)', [
            'url'    => $url,
            'status' => $response->status(),
            'body'   => $response->body(),
        ]);

        //  Success
        if ($response->successful()) {
            Log::info('=== PUBLIC REPORT DECLINE SUCCESS ===', [
                'report_id'        => $reportId,
                'duration_seconds' => round(microtime(true) - $startTime, 2),
            ]);

            return redirect()
                ->route('index')
                ->with('success', "Quotation declined successfully. Thank you for your response.");
        }

        //  Handle known errors
        $data = $response->json();
        $errorMessage = $data['error'] ?? $data['message'] ?? 'Failed to decline quotation.';

        if ($response->status() === 404) {
            $errorMessage = 'This quotation could not be found. It may have already been accepted or declined.';
        }

        return back()->with('error', $errorMessage)->withInput();

    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        Log::error('=== CONNECTION EXCEPTION (DECLINE) ===', [
            'report_id' => $reportId,
            'exception_message' => $e->getMessage(),
        ]);

        return back()
            ->with('error', 'Could not connect to the server. Please try again.')
            ->withInput();

    } catch (\Exception $e) {
        Log::error('=== DECLINE EXCEPTION ===', [
            'report_id' => $reportId,
            'exception_message' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return back()
            ->with('error', 'An unexpected error occurred. Please try again.')
            ->withInput();
    }
}




/**
 * Mark report as completed
 */
public function completeReport(Request $request, $reportId)
{
    Log::info('Specialist completing report method is initiated', [
        'report_id' => $reportId,
        'specialist_id' => Session::get('user')['id'] ?? 'unknown',
        'incoming request' => $request->all(),
    ]);

    $token = Session::get('access_token');

    if (!$token) {
        return redirect()->back()->with('error', 'Session expired. Please log in again.');
    }

    try {
        $url = config('api.backend_url') . '/reports/' . $reportId . '/complete';

        Log::info('Sending completion request to backend', [
            'url' => $url,
            'report_id' => $reportId,
        ]);

        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->post($url);

        Log::debug('Backend API response for report completion', [
            'status' => $response->status(),
            'ok' => $response->ok(),
            'successful' => $response->successful(),
            'clientError' => $response->clientError(),
            'serverError' => $response->serverError(),
            'body' => $response->body(),
            'headers' => $response->headers(),
        ]);

        // ✅ SUCCESS
        if ($response->successful()) {
            $message = $response->json()['message'] ?? 'Report marked as completed successfully!';
            return redirect()->back()->with('success', $message);
        }

        // ❌ ERROR HANDLING
        $backendError = $response->json()['error'] ?? $response->json()['message'] ?? 'Failed to complete report.';

        // Map backend messages → user-friendly messages
        $friendlyMessage = match ($backendError) {
            'Report is not in in-progress status' =>
                'This report cannot be completed because it is not currently in progress. Please check the appointment date or report status.',
            default =>
                $backendError, // show exact backend error if no custom message
        };

        Log::warning('Report completion failed', [
            'report_id' => $reportId,
            'status' => $response->status(),
            'backend_error' => $backendError,
            'user_message' => $friendlyMessage,
        ]);

        return redirect()->back()->with('error', $friendlyMessage);

    } catch (\Exception $e) {

        Log::error('Report completion exception', [
            'report_id' => $reportId,
            'error' => $e->getMessage(),
        ]);

        return redirect()->back()->with('error', 'An unexpected error occurred while completing the report.');
    }
}

}
