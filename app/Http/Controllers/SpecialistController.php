<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SpecialistController extends Controller
{

     protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
   
    public function dashboard()
    {
         $user = Session::get('user');
           // Get analytics data
        $analytics = $this->getAnalytics($user);
        
        return view('specialist-dashboard.dashboard',[
            'user' => $user,
            'analytics' => $analytics,
        ]);
    }


      /**
     * Fetch analytics data from backend
     * 
     * @param object $user
     * @return array|null
     */
    private function getAnalytics($user)
    {
        Log::info('=== GET ANALYTICS START ===', [
            'user_provided' => !is_null($user),
            'user_id' => $user['id'] ?? 'N/A',
        ]);
        
        try {
            $token = Session::get('access_token'); 
            
            Log::info('=== TOKEN CHECK ===', [
                'token_exists' => !is_null($token),
                'token_type' => gettype($token),
                'token_length' => $token ? strlen($token) : 0,
                'token_preview' => $token ? substr($token, 0, 30) . '...' : 'NULL',
                'session_id' => Session::getId(),
            ]);
            
            if (!$token) {
                Log::warning('No token available for analytics fetch', [
                    'session_keys' => array_keys(Session::all()),
                ]);
                return null;
            }

            $url = rtrim(config('api.backend_url'), '/') . '/reports/analytics';
            
            Log::info('=== MAKING ANALYTICS API REQUEST ===', [
                'url' => $url,
                'method' => 'GET',
                'has_token' => true,
                'token_length' => strlen($token),
            ]);
            
            $response = Http::withToken($token)
                ->timeout(30)
                ->get($url);

            Log::info('=== ANALYTICS API RESPONSE ===', [
                'url' => $url,
                'status' => $response->status(),
                'success' => $response->successful(),
                'body_preview' => substr($response->body(), 0, 500),
                'full_response' => $response->json(),
            ]);

            if ($response->successful()) {
                $data = $response->json();
                $analyticsData = $data['analytics'] ?? null;
                
                Log::info('=== ANALYTICS DATA EXTRACTED ===', [
                    'has_analytics_key' => isset($data['analytics']),
                    'analytics_is_null' => is_null($analyticsData),
                    'total_reports' => $analyticsData['totalReports'] ?? 0,
                    'status_breakdown_count' => isset($analyticsData['statusBreakdown']) ? count($analyticsData['statusBreakdown']) : 0,
                ]);
                
                return $analyticsData;
            }

            Log::warning('Analytics API returned non-successful response', [
                'status' => $response->status(),
                'status_text' => $response->status() === 401 ? 'UNAUTHORIZED' : 'ERROR',
                'body' => $response->body(),
                'json' => $response->json(),
            ]);

            return null;

        } catch (\Exception $e) {
            Log::error('=== ANALYTICS EXCEPTION ===', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return null;
        }
    }

    /**
 * Get reports specifically for specialist (from backend endpoint)
 */
public function getSpecialistReports()
{
    Log::info('Fetching reports for specialist');

    $user = $this->userService->fetchDashboardUser();
    $token = Session::get('access_token');

    if (!$user || !$token) {
        return redirect()->route('login')->with('error', 'Please log in.');
    }

    try {
        // Use the specialist-specific endpoint
        $url = config('api.backend_url') . '/reports/getreports/specialist';

        Log::info('Fetching specialist reports from backend', [
            'url' => $url,
            'specialist_id' => $user['id'] ?? $user['_id'],
        ]);

        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($url);

        //  Log response regardless of success/failure
        Log::debug('Backend API response for specialist reports', [
            'status' => $response->status(),
            'ok' => $response->ok(),
            'successful' => $response->successful(),
            'clientError' => $response->clientError(),
            'serverError' => $response->serverError(),
            'body' => $response->body(),
            'headers' => $response->headers(),
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            $reports = $responseData['data'] ?? $responseData['reports'] ?? [];

            Log::info('Specialist reports fetched successfully', [
                'report_count' => count($reports),
            ]);

            return view('specialist-dashboard.specialist-reports', [
                'user' => $user,
                'reports' => $reports,
            ]);
        }

        //  Log non-successful response details
        Log::warning('Failed to fetch specialist reports from backend', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return view('specialist-dashboard.specialist-reports', [
            'user' => $user,
            'reports' => [],
            'error' => 'Failed to fetch reports (status ' . $response->status() . ')',
        ]);

    } catch (\Exception $e) {
        //  Log the exception with trace
        Log::error('Error fetching specialist reports', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return view('specialist-dashboard.specialist-reports', [
            'user' => $user,
            'reports' => [],
            'error' => 'An error occurred while fetching reports',
        ]);
    }
}

   



/**
 * Display available reports for specialists
 */

public function availableReports()
{
    Log::info('Specialist viewing available reports');

    $user = $this->userService->fetchDashboardUser();

    if (!$user) {
        Log::debug('No user found in session, redirecting to login.');
        return redirect()->route('login')->with('error', 'Please log in to view reports.');
    }

    $token = Session::get('access_token');

    if (!$token) {
        Log::debug('Access token missing or expired.');
        return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
    }

    try {
        //  Prepare backend request
        $url = config('api.backend_url') . '/reports/getreports/specialist';
        $specialistId = $user['id'] ?? $user['_id'];

        Log::info('Fetching available reports from backend', [
            'url' => $url,
            'specialist_id' => $specialistId,
        ]);

        Log::debug('Sending HTTP GET request', [
            'endpoint' => $url,
            'headers' => [
                'Authorization' => 'Bearer {hidden}',
                'Accept' => 'application/json',
            ],
        ]);

        //  Perform request
        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($url);

        //  Log backend response (always)
        Log::debug('Backend API response received', [
            'status' => $response->status(),
            'ok' => $response->ok(),
            'successful' => $response->successful(),
            'clientError' => $response->clientError(),
            'serverError' => $response->serverError(),
            'headers' => $response->headers(),
            'body' => $response->body(),
        ]);

        //  Handle success
        if ($response->successful()) {
            $responseData = $response->json();
            $reports = $responseData['data'] ?? $responseData['reports'] ?? [];

            Log::debug('Raw reports fetched', [
                'count' => count($reports),
                'sample' => array_slice($reports, 0, 2), 
            ]);

            // Filter only pending reports without quotations from this specialist
            $availableReports = array_filter($reports, function ($report) use ($specialistId) {
                $status = $report['status'] ?? '';
                $quotations = $report['quotations'] ?? [];

                // Log each filtering step for deep debugging
                Log::debug('Evaluating report for availability', [
                    'report_id' => $report['id'] ?? 'unknown',
                    'status' => $status,
                    'quotation_count' => count($quotations),
                ]);

                if ($status !== 'pending') {
                    return false;
                }

                foreach ($quotations as $quotation) {
                    if (($quotation['specialistId'] ?? '') === $specialistId) {
                        Log::debug('Report excluded — specialist already quoted', [
                            'report_id' => $report['id'] ?? 'unknown',
                            'specialist_id' => $specialistId,
                        ]);
                        return false;
                    }
                }

                return true;
            });

            Log::info('Available reports fetched successfully', [
                'total_reports' => count($reports),
                'available_reports' => count($availableReports),
            ]);


        //   dd($reports);
        //     exit();

            return view('specialist-dashboard.available-reports', [
                'user' => $user,
                'reports' => array_values($availableReports),
            ]);
        }

        //  Non-successful backend response
        Log::warning('Failed to fetch available reports from backend', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

      

        return view('specialist-dashboard.available-reports', [
            'user' => $user,
            'reports' => [],
            'error' => 'Failed to fetch reports (status ' . $response->status() . ')',
        ]);

    } catch (\Exception $e) {
        //  Exception with trace
        Log::error('Error fetching available reports', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return view('specialist-dashboard.available-reports', [
            'user' => $user,
            'reports' => [],
            'error' => 'An error occurred while fetching reports',
        ]);
    }
}




/**
 * Display available reports for specialists with filtering and sorting
 */
public function reportedCars(Request $request)
{
    Log::info('Specialist viewing available reports');

    $user = $this->userService->fetchDashboardUser();

    if (!$user) {
        Log::debug('No user found in session, redirecting to login.');
        return redirect()->route('login')->with('error', 'Please log in to view reports.');
    }

    $token = Session::get('access_token');

    if (!$token) {
        Log::debug('Access token missing or expired.');
        return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
    }

    try {
        // Prepare backend request
        $url = config('api.backend_url') . '/reports/allreports';
        $specialistId = $user['id'] ?? $user['_id'];

        Log::info('Fetching available reports from backend', [
            'url' => $url,
            'specialist_id' => $specialistId,
        ]);

        // Perform request
        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($url);

        Log::debug('Backend API response received', [
            'status' => $response->status(),
            'ok' => $response->ok(),
        ]);

        // Handle success
        if ($response->successful()) {
            $responseData = $response->json();
            $reports = $responseData['data'] ?? $responseData['reports'] ?? [];

            Log::debug('Raw reports fetched', [
                'count' => count($reports),
            ]);

            // Filter only pending reports without quotations from this specialist
            $availableReports = array_filter($reports, function ($report) use ($specialistId) {
                $status = $report['status'] ?? '';
                $quotations = $report['quotations'] ?? [];

                if ($status !== 'pending') {
                    return false;
                }

                foreach ($quotations as $quotation) {
                    if (($quotation['specialistId'] ?? '') === $specialistId) {
                        return false;
                    }
                }

                return true;
            });

            // Convert to collection for easier manipulation
            $reportsCollection = collect(array_values($availableReports));

            // Apply filters
            $filter = $request->get('filter', 'all');
            
            switch ($filter) {
                case 'urgent':
                    $reportsCollection = $reportsCollection->filter(function ($report) {
                        return ($report['urgency'] ?? '') === 'urgent';
                    });
                    break;
                    
                case 'driveable':
                    $reportsCollection = $reportsCollection->filter(function ($report) {
                        return isset($report['driveable']) && $report['driveable'] === true;
                    });
                    break;
                    
                case 'collection':
                    $reportsCollection = $reportsCollection->filter(function ($report) {
                        return strtolower($report['serviceType'] ?? '') === 'collection';
                    });
                    break;
                    
                case 'garage':
                    $reportsCollection = $reportsCollection->filter(function ($report) {
                        return strtolower($report['serviceType'] ?? '') === 'garage';
                    });
                    break;
                    
                case 'mobile':
                    $reportsCollection = $reportsCollection->filter(function ($report) {
                        return strtolower($report['serviceType'] ?? '') === 'mobile';
                    });
                    break;
            }

            // Apply sorting
            $sort = $request->get('sort', 'newest');
            
            switch ($sort) {
                case 'urgent':
                    // Sort by urgency priority, then by date
                    $urgencyOrder = ['urgent' => 1, '24hours' => 2, '2-3days' => 3, 'week' => 4, 'flexible' => 5];
                    $reportsCollection = $reportsCollection->sortBy(function ($report) use ($urgencyOrder) {
                        $urgency = $report['urgency'] ?? 'flexible';
                        return $urgencyOrder[$urgency] ?? 99;
                    });
                    break;
                    
                case 'oldest':
                    $reportsCollection = $reportsCollection->sortBy(function ($report) {
                        return strtotime($report['createdAt'] ?? 'now');
                    });
                    break;
                    
                case 'newest':
                default:
                    $reportsCollection = $reportsCollection->sortByDesc(function ($report) {
                        return strtotime($report['createdAt'] ?? 'now');
                    });
                    break;
            }

            // Convert back to array with reset keys
            $filteredReports = $reportsCollection->values()->all();

            Log::info('Available reports filtered and sorted', [
                'total_reports' => count($reports),
                'available_reports' => count($availableReports),
                'filtered_reports' => count($filteredReports),
                'filter' => $filter,
                'sort' => $sort,
            ]);

            return view('pages.reported-cases', [
                'user' => $user,
                'reports' => $filteredReports,
            ]);
        }

        // Non-successful backend response
        Log::warning('Failed to fetch available reports from backend', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return view('pages.reported-cases', [
            'user' => $user,
            'reports' => [],
            'error' => 'Failed to fetch reports (status ' . $response->status() . ')',
        ]);

    } catch (\Exception $e) {
        // Exception with trace
        Log::error('Error fetching available reports', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return view('pages.reported-cases', [
            'user' => $user,
            'reports' => [],
            'error' => 'An error occurred while fetching reports',
        ]);
    }
}

   /**
 * View single report details
 */
public function viewReport($reportId)
{
    Log::info('Specialist viewing report details', [
        'report_id' => $reportId,
    ]);

    $user = $this->userService->fetchDashboardUser();
    $token = Session::get('access_token');

    if (!$user || !$token) {
        Log::debug('User or access token missing when trying to view report.', [
            'report_id' => $reportId,
        ]);
        return redirect()->route('login')->with('error', 'Please log in.');
    }

    try {
        $url = config('api.backend_url') . '/reports/' . $reportId;

        Log::debug('Sending request to fetch single report', [
            'url' => $url,
            'report_id' => $reportId,
        ]);

        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($url);

        // 🔍 Always log response (success or error)
        Log::debug('Backend API response for single report', [
            'status' => $response->status(),
            'ok' => $response->ok(),
            'successful' => $response->successful(),
            'clientError' => $response->clientError(),
            'serverError' => $response->serverError(),
            'body' => $response->body(),
            'headers' => $response->headers(),
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            $report = $responseData['data'] ?? $responseData;

            Log::info('Report details fetched successfully', [
                'report_id' => $reportId,
            ]);

            return view('specialist-dashboard.report-details', [
                'user' => $user,
                'report' => $report,
            ]);
        }

        Log::warning('Failed to fetch report details', [
            'report_id' => $reportId,
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return redirect()->route('specialist.reports')
            ->with('error', 'Report not found.');

    } catch (\Exception $e) {
        Log::error('Error fetching report details', [
            'report_id' => $reportId,
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return redirect()->route('specialist.reports')
            ->with('error', 'Failed to load report details.');
    }
}



public function submitQuotation(Request $request, $reportId)
{
    $startTime = microtime(true);
    $requestId = uniqid('REQ_', true);
    
    Log::info('=== QUOTATION SUBMISSION START ===', [
        'request_id' => $requestId,
        'report_id' => $reportId,
        'timestamp' => now()->toDateTimeString(),
        'user_id' => Session::get('user_id'),
        'payload' => $request->all()
    ]);

    // ---------- 1. VALIDATION ----------
    $validator = Validator::make($request->all(), [
        'amount'         => 'required|numeric|min:0',
        'duration'       => 'required|string|max:255',
        'reasonForFault' => 'required|string|min:20',
    ]);

    if ($validator->fails()) {
        Log::warning('Validation failed', [
            'request_id' => $requestId,
            'errors' => $validator->errors()->toArray()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors'  => $validator->errors(),
        ], 422);
    }

    // ---------- 2. TOKEN ----------
    $token = Session::get('access_token');
    if (!$token) {
        Log::error('No access token found in session', ['request_id' => $requestId]);
        
        return response()->json([
            'success' => false,
            'message' => 'Session expired – please log in again.',
        ], 401);
    }

    // ---------- 3. PREPARE BACKEND REQUEST ----------
    $url = rtrim(config('api.backend_url'), '/') . "/reports/postreports/{$reportId}/quotations";
    
    $payload = [
        'amount'         => (float) $request->input('amount'),
        'duration'       => $request->input('duration'),
        'reasonForFault' => $request->input('reasonForFault'),
    ];

    Log::info('Sending request to backend', [
        'request_id' => $requestId,
        'url' => $url,
        'payload' => $payload,
        'method' => 'POST',
        'timeout_settings' => [
            'timeout' => 120,
            'connect_timeout' => 10
        ]
    ]);

    // ---------- 4. CALL BACKEND WITH EXTENDED TIMEOUT ----------
    try {
        $requestStart = microtime(true);
        
        Log::info('HTTP request initiated', [
            'request_id' => $requestId,
            'time' => date('H:i:s.u')
        ]);
        
        $response = Http::timeout(120)
            ->connectTimeout(10)
            ->withToken($token)
            ->withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ])
            ->post($url, $payload);

        $requestDuration = microtime(true) - $requestStart;

        Log::info('Backend response received', [
            'request_id' => $requestId,
            'status' => $response->status(),
            'duration_seconds' => round($requestDuration, 2),
            'response_size' => strlen($response->body()),
            'headers' => $response->headers(),
            'body_preview' => substr($response->body(), 0, 1000),
            'full_body' => $response->body() // Log full response for debugging
        ]);

        // ---------- SUCCESS ----------
        if ($response->successful()) {
            $totalDuration = microtime(true) - $startTime;
            
            Log::info('=== QUOTATION SUBMISSION SUCCESS ===', [
                'request_id' => $requestId,
                'report_id' => $reportId,
                'total_duration_seconds' => round($totalDuration, 2),
                'backend_duration_seconds' => round($requestDuration, 2),
                'response_data' => $response->json()
            ]);
            
            return response()->json([
                'success' => true,
                'message' => 'Quotation submitted successfully',
                'data' => $response->json(),
                'debug' => [
                    'request_id' => $requestId,
                    'duration' => round($totalDuration, 2)
                ]
            ]);
        }

        // ---------- HANDLE NON-SUCCESSFUL RESPONSES ----------
        $data = $response->json();
        
        Log::warning('Backend returned non-successful response', [
            'request_id' => $requestId,
            'status' => $response->status(),
            'response_body' => $response->body(),
            'parsed_data' => $data,
            'duration_seconds' => round($requestDuration, 2)
        ]);

        // 1. Report with invalid media (422)
        if ($response->status() === 422 && 
            isset($data['message']) &&
            (str_contains($data['message'], 'images') || 
             str_contains($data['message'], 'videos'))) {
            
            Log::warning('Report has invalid media', [
                'request_id' => $requestId,
                'report_id' => $reportId,
                'backend_message' => $data['message']
            ]);
            
            return response()->json([
                'success'       => false,
                'message'       => 'This report has invalid media and cannot accept quotes.',
                'backend_error' => true,
            ], 422);
        }

        // 2. Report already has quotation from this specialist
        if ($response->status() === 400 && 
            isset($data['message']) &&
            str_contains($data['message'], 'already submitted')) {
            
            Log::warning('Duplicate quotation attempt', [
                'request_id' => $requestId,
                'report_id' => $reportId,
                'backend_message' => $data['message']
            ]);
            
            return response()->json([
                'success'       => false,
                'message'       => 'You have already submitted a quotation for this report.',
                'backend_error' => true,
            ], 400);
        }

        // 3. Generic backend failure
        Log::error('Backend error', [
            'request_id' => $requestId,
            'status' => $response->status(),
            'message' => $data['message'] ?? 'Unknown error',
            'full_response' => $response->body()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => $data['message'] ?? 'Backend error – please try another report.',
            'backend_error' => true,
        ], $response->status());

    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        $totalDuration = microtime(true) - $startTime;
        
        Log::error('=== CONNECTION EXCEPTION ===', [
            'request_id' => $requestId,
            'report_id' => $reportId,
            'exception_type' => 'ConnectionException',
            'exception_message' => $e->getMessage(),
            'duration_seconds' => round($totalDuration, 2),
            'url' => $url,
            'exceeded_timeout' => $totalDuration > 120,
            'trace' => $e->getTraceAsString()
        ]);
        
        // Timeout vs Connection failure
        if ($totalDuration > 115) {
            Log::critical('TIMEOUT CONFIRMED - Backend took too long', [
                'request_id' => $requestId,
                'duration' => round($totalDuration, 2),
                'timeout_threshold' => 120
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Request took too long. Please check "My Quotations" to verify if it was submitted.',
                'timeout' => true,
                'debug' => [
                    'request_id' => $requestId,
                    'duration' => round($totalDuration, 2)
                ]
            ], 504);
        }
        
        // Actual connection failure
        Log::error('CONNECTION FAILURE - Cannot reach backend', [
            'request_id' => $requestId,
            'duration' => round($totalDuration, 2)
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Cannot connect to backend server. Please try again.',
            'connection_error' => true,
        ], 503);
        
    } catch (\Illuminate\Http\Client\RequestException $e) {
        $totalDuration = microtime(true) - $startTime;
        
        Log::error('=== REQUEST EXCEPTION ===', [
            'request_id' => $requestId,
            'report_id' => $reportId,
            'exception_type' => 'RequestException',
            'exception_message' => $e->getMessage(),
            'duration_seconds' => round($totalDuration, 2),
            'response_status' => $e->response ? $e->response->status() : 'N/A',
            'response_body' => $e->response ? $e->response->body() : 'N/A',
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Request failed. Please try again.',
            'debug' => [
                'request_id' => $requestId
            ]
        ], 500);
        
    } catch (\Exception $e) {
        $totalDuration = microtime(true) - $startTime;
        
        Log::error('=== UNEXPECTED EXCEPTION ===', [
            'request_id' => $requestId,
            'report_id' => $reportId,
            'exception_type' => get_class($e),
            'exception_message' => $e->getMessage(),
            'duration_seconds' => round($totalDuration, 2),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ]);
        
        return response()->json([
            'success' => false,
            'message' => 'Unexpected error – please try again.',
            'debug' => [
                'request_id' => $requestId
            ]
        ], 500);
    } finally {
        // Always log completion
        $totalDuration = microtime(true) - $startTime;
        Log::info('=== REQUEST COMPLETED ===', [
            'request_id' => $requestId,
            'total_duration_seconds' => round($totalDuration, 2),
            'timestamp' => now()->toDateTimeString()
        ]);
    }
}


  /**
 * View specialist's submitted quotations
 */

public function myQuotations()
{
    Log::info('Fetching specialist quotations');

    $user = $this->userService->fetchDashboardUser();
    $token = Session::get('access_token');

    if (!$user || !$token) {
        Log::debug('User or token missing when trying to view quotations.');
        return redirect()->route('login')->with('error', 'Please log in.');
    }

    try {
        $specialistId = $user['id'] ?? $user['_id'];
        $url = config('api.backend_url') . '/reports/getmyquotations';

        Log::info('Fetching all reports to extract quotations for specialist', [
            'url' => $url,
            'specialist_id' => $specialistId,
        ]);

        Log::debug('Sending HTTP GET request', [
            'endpoint' => $url,
            'headers' => [
                'Authorization' => 'Bearer {hidden}',
                'Accept' => 'application/json',
            ],
        ]);

        // Perform request
        $response = Http::timeout(30)
            ->withToken($token)
            ->acceptJson()
            ->get($url);

        // Log backend response in detail
        Log::debug('Backend API response for quotations fetch', [
            'status' => $response->status(),
            'ok' => $response->ok(),
            'successful' => $response->successful(),
            'clientError' => $response->clientError(),
            'serverError' => $response->serverError(),
            'body_preview' => substr($response->body(), 0, 500),
            'headers' => $response->headers(),
        ]);

        if ($response->successful()) {
            $responseData = $response->json();

            //  Log structure of response for clarity
            Log::debug('Raw API data received for my quotations', [
                'response_keys' => array_keys($responseData),
                'quotation_count' => isset($responseData['quotations']) ? count($responseData['quotations']) : 0,
            ]);

            $allReports = $responseData['quotations']
                ?? $responseData['data']
                ?? $responseData['reports']
                ?? [];

            Log::debug('Reports retrieved successfully', [
                'report_count' => count($allReports),
                'sample_reports' => array_slice($allReports, 0, 2),
            ]);

            //  Process quotations - compatible with new backend structure
            $myQuotations = [];

            foreach ($allReports as $quotationData) {
                $reportId = $quotationData['reportId'] ?? 'unknown';
                $quotation = $quotationData['quotation'] ?? null;

                if ($quotation) {
                    Log::debug('Quotation found for specialist', [
                        'report_id' => $reportId,
                        'quotation_amount' => $quotation['amount'] ?? null,
                        'quotation_duration' => $quotation['duration'] ?? null,
                    ]);

                   

                    $myQuotations[] = $quotationData;

                }
            }

            Log::info('Specialist quotations fetched successfully', [
                'total_reports' => count($allReports),
                'my_quotations_count' => count($myQuotations),
            ]);


            // dd($myQuotations);
            // exit();

            return view('specialist-dashboard.my-quotations', [
                'user' => $user,
                'quotations' => $myQuotations,
            ]);
        }

        //  Non-successful backend response
        Log::warning('Failed to fetch quotations from backend', [
            'status' => $response->status(),
            'body' => $response->body(),
        ]);

        return view('specialist-dashboard.my-quotations', [
            'user' => $user,
            'quotations' => [],
            'error' => 'Failed to fetch quotations (status ' . $response->status() . ')',
        ]);

    } catch (\Exception $e) {
        //  Exception handling with stack trace
        Log::error('Error fetching specialist quotations', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return view('specialist-dashboard.my-quotations', [
            'user' => $user,
            'quotations' => [],
            'error' => 'An error occurred while fetching quotations.',
        ]);
    }
}


}
