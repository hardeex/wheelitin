<?php

namespace App\Http\Controllers;

use App\Jobs\UploadMediaToCloudinary;
use App\Services\CloudinaryUploadService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class GuestController extends Controller
{
   
     protected $userService;
    protected $cloudinaryService;

    public function __construct(UserService $userService, CloudinaryUploadService $cloudinaryService)
    {
        $this->userService = $userService;
        $this->cloudinaryService = $cloudinaryService;
    }




    public function dashboard()
{
    $user = Session::get('user');
    $token = Session::get('access_token');
    
    Log::info('=== DASHBOARD METHOD START ===', [
        'has_user' => !is_null($user),
        'user_id' => $user['id'] ?? 'N/A',
        'user_email' => $user['email'] ?? 'N/A',
        'has_token' => !is_null($token),
        'token_preview' => $token ? substr($token, 0, 20) . '...' : 'NULL',
        'all_session_keys' => array_keys(Session::all()),
    ]);
    
    // Get analytics data
    $analytics = $this->getAnalytics($user);
    
    Log::info('=== DASHBOARD ANALYTICS RESULT ===', [
        'analytics_is_null' => is_null($analytics),
        'analytics_has_data' => !is_null($analytics) && !empty($analytics),
        'total_reports' => $analytics['totalReports'] ?? 0,
    ]);
    
    return view('user-dashboard.dashboard', [
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

    public function reportCarIsssue()
{
    Log::info('The report car method is called');

      $user = $this->userService->fetchDashboardUser();

    if (!$user) {
        Log::warning('User fetch failed or not logged in, redirecting to login.');
        return redirect()->route('login')->with('error', 'Please log in to report a car issue.');
    }

    // Check if email is verified
    if (empty($user['isVerified']) || $user['isVerified'] === false) {
        Log::info('User email not verified, redirecting to verification page', [
            'user_id' => $user['_id'] ?? 'unknown',
            'email' => $user['email'] ?? 'N/A'
        ]);
        return redirect()->route('verify.show')->with('error', 'Please verify your email before reporting a car issue.');
    }

    Log::info('Redirected to verification page successfully');
    Log::info('User authorized to report car issue', [
        'user_id' => $user['_id'] ?? 'unknown',
        'email' => $user['email'] ?? 'N/A'
    ]);

    return view('user-dashboard.car-report', compact('user'));
}


public function submitCarIssues(Request $request)
{
    Log::info('--- Car Issue Submission Attempt ---', [
        'user_id' => Session::get('user')['id'] ?? 'guest',
        'timestamp' => now(),
    ]);

    // Validate form data - IMAGES/VIDEOS ARE NOW URL STRINGS
    $validator = Validator::make($request->all(), [
        'carMaker' => 'required|string|max:255',
        'carModel' => 'required|string|max:255',
        'carYear' => 'required|string',
        'issueType' => 'required|string',
        'description' => 'required|string|min:10',
        'location' => 'required|string',
        'urgency' => 'required|string',
        'mileage' => 'nullable|integer',
        'driveable' => 'nullable|string',
        'licensePlate' => 'nullable|string',
        'mileage' => 'nullable|string',
        'serviceType' => 'required|string',
        'contactName' => 'nullable|string|max:255',
        'contactPhone' => 'nullable|string|max:20',
        'contactEmail' => 'nullable|email',
        'preferredContact' => 'nullable|string|in:phone,email',
        'images' => 'nullable|array',
        'images.*' => 'nullable|string|url', // URLs from Cloudinary
        'videos' => 'nullable|array',
        'videos.*' => 'nullable|string|url', // URLs from Cloudinary
    ]);

    if ($validator->fails()) {
        Log::warning('Issue submission validation failed', [
            'errors' => $validator->errors()->toArray(),
        ]);
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 422);
    }

    $token = Session::get('access_token');

    if (!$token) {
        Log::error('No access token found for issue submission');
        return response()->json([
            'success' => false,
            'message' => 'Session expired. Please log in again.'
        ], 401);
    }

    try {
        $url = config('api.backend_url') . '/reports';

        // Prepare payload
        $payload = [
            'carMaker' => $request->carMaker,
            'carModel' => $request->carModel,
            'carYear' => $request->carYear,
            'licensePlate' => $request->licensePlate,
            'mileage'  => $request->mileage,
            'issueType' => $request->issueType,
            'description' => $request->description,
            'location' => $request->location,
            'urgency' => $request->urgency,           
            'driveable' => $request->driveable,
            'serviceType' => $request->serviceType,
            'contactName' => $request->contactName,
            'contactPhone' => $request->contactPhone,
            'contactEmail' => $request->contactEmail,
            'preferredContact' => $request->preferredContact,
        ];

        // Add image URLs if present
        if ($request->has('images') && is_array($request->images)) {
            $payload['images'] = array_map(function($url) {
                return [
                    'url' => $url,
                    'type' => 'image'
                ];
            }, $request->images);
        }

        // Add video URLs if present
        if ($request->has('videos') && is_array($request->videos)) {
            $payload['videos'] = array_map(function($url) {
                return [
                    'url' => $url,
                    'type' => 'video'
                ];
            }, $request->videos);
        }

        Log::info('Sending payload with Cloudinary URLs to backend', [
            'url' => $url,
            'has_images' => isset($payload['images']),
            'has_videos' => isset($payload['videos']),
            'image_count' => count($payload['images'] ?? []),
            'video_count' => count($payload['videos'] ?? []),
        ]);

        // Send to backend
        $response = Http::timeout(90)
            ->withToken($token)
            ->acceptJson()
            ->asJson()
            ->post($url, $payload);

        Log::info('Backend response received', [
            'status' => $response->status(),
            'body' => $response->json(),
        ]);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'message' => 'Issue submitted successfully!',
                'data' => $response->json()
            ]);
        }

        $responseData = $response->json();
        $errorMessage = $responseData['message'] ?? 'Failed to submit issue.';

        Log::error('Issue submission failed', [
            'status' => $response->status(),
            'error' => $errorMessage,
            'response' => $responseData,
        ]);

        return response()->json([
            'success' => false,
            'message' => $errorMessage,
            'response' => $responseData,
        ], $response->status());

    } catch (\Illuminate\Http\Client\ConnectionException $e) {
        Log::error('Connection timeout during issue submission', [
            'error' => $e->getMessage(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Connection timeout. Please check your internet connection and try again.'
        ], 504);

    } catch (\Exception $e) {
        Log::error('Issue Submission Exception', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
        ]);

        return response()->json([
            'success' => false,
            'message' => 'An error occurred while submitting your issue. Please try again.'
        ], 500);
    }
}







    /**
     * Check upload status (called by frontend via polling or webhook)
     */
    public function checkUploadStatus($uploadId)
    {
        $batchId = Cache::get("upload_batch_{$uploadId}");
        
        if (!$batchId) {
            return response()->json([
                'success' => false,
                'message' => 'Upload session not found'
            ], 404);
        }

        $batch = \Illuminate\Support\Facades\Bus::findBatch($batchId);

        if (!$batch) {
            return response()->json([
                'success' => false,
                'message' => 'Batch not found'
            ], 404);
        }

        // Collect completed uploads from cache
        $imageUrls = [];
        $videoUrls = [];
        $errors = [];

        // Check cache for completed uploads
        $cacheKeys = Cache::get("upload_keys_{$uploadId}", []);
        foreach ($cacheKeys as $key) {
            $result = Cache::get($key);
            if ($result) {
                if (strpos($key, '_image_') !== false) {
                    $imageUrls[] = $result;
                } else {
                    $videoUrls[] = $result;
                }
            }
        }

        return response()->json([
            'success' => true,
            'status' => $batch->finished() ? 'completed' : 'processing',
            'progress' => $batch->progress(),
            'total_jobs' => $batch->totalJobs,
            'pending_jobs' => $batch->pendingJobs,
            'failed_jobs' => $batch->failedJobs,
            'images' => $imageUrls,
            'videos' => $videoUrls,
        ]);
    }




    /**
     * Display user's reported car issues
     */
    public function userReportedCarIssues()
    {
        Log::info('The method for user reported car issues is initiated');

        // Fetch user from dashboard
        $user = $this->userService->fetchDashboardUser();

        if (!$user) {
            Log::warning('User fetch failed or not logged in, redirecting to login.');
            return redirect()->route('login')->with('error', 'Please log in to view your reports.');
        }

        // Check if email is verified
        if (empty($user['isVerified']) || $user['isVerified'] === false) {
            Log::info('User email not verified, redirecting to verification page', [
                'user_id' => $user['id'] ?? $user['_id'] ?? 'unknown',
                'email' => $user['email'] ?? 'N/A'
            ]);
            return redirect()->route('verify.show')
                ->with('error', 'Please verify your email before viewing your reports.');
        }

        // Get access token
        $token = Session::get('access_token');

        if (!$token) {
            Log::error('No access token found for fetching reports');
            return redirect()->route('login')->with('error', 'Session expired. Please log in again.');
        }

        try {
            // Extract user ID
            $userId = $user['id'] ?? $user['_id'] ?? null;

            if (!$userId) {
                throw new \Exception('User ID not found');
            }

            // Fetch reports from backend
            $url = config('api.backend_url') . '/reports/user/' . $userId;

            Log::info('Fetching user reports from backend', [
                'url' => $url,
                'user_id' => $userId,
            ]);

            $response = Http::timeout(30)
                ->withToken($token)
                ->acceptJson()
                ->get($url);

            Log::info('Backend response for user reports', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            if ($response->successful()) {
                $responseData = $response->json();
                $reports = $responseData['data'] ?? $responseData['reports'] ?? [];

                Log::info('User reports fetched successfully', [
                    'user_id' => $userId,
                    'report_count' => count($reports),
                ]);

                dd($reports);
                exit();


                return view('user-dashboard.user-reported-issues', [
                    'user' => $user,
                    'reports' => $reports,
                ]);
            }

            // Handle non-successful responses
            $errorMessage = $response->json()['message'] ?? 'Failed to fetch reports.';
            
            Log::error('Failed to fetch user reports', [
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            return view('user-dashboard.user-reported-issues', [
                'user' => $user,
                'reports' => [],
                'error' => $errorMessage,
            ]);

        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::error('Connection timeout while fetching reports', [
                'error' => $e->getMessage(),
            ]);

            return view('user-dashboard.user-reported-issues', [
                'user' => $user,
                'reports' => [],
                'error' => 'Connection timeout. Please try again later.',
            ]);

        } catch (\Exception $e) {
            Log::error('Exception while fetching user reports', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return view('user-dashboard.user-reported-issues', [
                'user' => $user,
                'reports' => [],
                'error' => 'An error occurred while fetching your reports.',
            ]);
        }
    }


    /**
     * Submit a review for a completed report
     */
    public function submitReview(Request $request, $reportId)
    {
        Log::info('User submitting review', [
            'report_id' => $reportId,
            'user_id' => Session::get('user')['id'] ?? 'unknown',
        ]);

        // Validate review data
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $token = Session::get('access_token');

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired. Please log in again.'
            ], 401);
        }

        try {
            $url = config('api.backend_url') . '/reports/' . $reportId . '/reviews';

            $payload = [
                'rating' => (int) $request->rating,
                'comment' => $request->comment,
            ];

            Log::info('Sending review to backend', [
                'url' => $url,
                'payload' => $payload,
            ]);

            $response = Http::timeout(30)
                ->withToken($token)
                ->acceptJson()
                ->asJson()
                ->post($url, $payload);

            if ($response->successful()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Review submitted successfully!',
                    'data' => $response->json(),
                ]);
            }

            $errorMessage = $response->json()['message'] ?? 'Failed to submit review.';

            Log::error('Review submission failed', [
                'status' => $response->status(),
                'error' => $errorMessage,
            ]);

            return response()->json([
                'success' => false,
                'message' => $errorMessage,
            ], $response->status());

        } catch (\Exception $e) {
            Log::error('Review submission exception', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting your review.',
            ], 500);
        }
    }

    /**
     * Get single report details (enhanced with quotations)
     */
    public function reportDetails($id)
    {
        $user = $this->userService->fetchDashboardUser();
        $token = Session::get('access_token');

        if (!$user || !$token) {
            return redirect()->route('login')->with('error', 'Please log in.');
        }

        try {
            $url = config('api.backend_url') . '/reports/' . $id;

            $response = Http::timeout(30)
                ->withToken($token)
                ->acceptJson()
                ->get($url);

            if ($response->successful()) {
                $report = $response->json()['data'] ?? $response->json();
                
                return view('user-dashboard.report-details', [
                    'user' => $user,
                    'report' => $report,
                ]);
            }

            return redirect()->route('user.reports')
                ->with('error', 'Report not found.');

        } catch (\Exception $e) {
            Log::error('Error fetching report details', [
                'report_id' => $id,
                'error' => $e->getMessage(),
            ]);

            return redirect()->route('user.reports')
                ->with('error', 'Failed to load report details.');
        }
    }

}
