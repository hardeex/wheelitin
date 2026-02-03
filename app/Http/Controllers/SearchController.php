<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
      /**
     * Search for specialists based on location and optional filters
     * Backend accepts: q, status, make, model, year, issue, location, urgency
     */
    public function searchSpecialists(Request $request)
    {
        $request->validate([
            'location' => 'nullable|string|min:2',
            'q' => 'nullable|string|min:2',
            'service' => 'nullable|string',
            'issue' => 'nullable|string',
            'make' => 'nullable|string',
            'model' => 'nullable|string',
            'year' => 'nullable|string',
            'urgency' => 'nullable|string',
            'status' => 'nullable|string',
        ]);

        $token = Session::get('access_token');
        
        try {
            $url = config('api.backend_url') . '/auth/search';
            
            // Prepare query parameters based on backend requirements
            $params = [];
            
            // General search query
            if ($request->filled('q')) {
                $params['q'] = $request->input('q');
            }
            
            // Location search
            if ($request->filled('location')) {
                $params['location'] = $request->input('location');
            }
            
            // Issue type (can also be service type)
            if ($request->filled('issue')) {
                $params['issue'] = $request->input('issue');
            } elseif ($request->filled('service')) {
                $params['issue'] = $request->input('service');
            }
            
            // Car details filters
            if ($request->filled('make')) {
                $params['make'] = $request->input('make');
            }
            
            if ($request->filled('model')) {
                $params['model'] = $request->input('model');
            }
            
            if ($request->filled('year')) {
                $params['year'] = $request->input('year');
            }
            
            // Urgency filter
            if ($request->filled('urgency')) {
                $params['urgency'] = $request->input('urgency');
            }
            
            // Status filter
            if ($request->filled('status')) {
                $params['status'] = $request->input('status');
            }

            Log::info('Searching for specialists', [
                'url' => $url,
                'params' => $params,
            ]);

            // Make API request (with or without authentication)
            $httpRequest = Http::timeout(15);
            
            if ($token) {
                $httpRequest = $httpRequest->withToken($token);
            }

            $response = $httpRequest->get($url, $params);

            if ($response->successful()) {
                $data = $response->json();
                
                Log::info('Search successful', [
                    'results_count' => count($data['specialists'] ?? $data['results'] ?? $data['data'] ?? []),
                ]);

                

                return view('search.results', [
                    'specialists' => $data['specialists'] ?? $data['results'] ?? $data['data'] ?? [],
                    'location' => $request->input('location'),
                    'service' => $request->input('service') ?? $request->input('issue'),
                    'total' => $data['total'] ?? $data['count'] ?? count($data['specialists'] ?? $data['results'] ?? $data['data'] ?? []),
                    'filters' => $params,
                ]);
            }

            Log::error('Search API request failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'Unable to search at this time. Please try again.');

        } catch (\Exception $e) {
            Log::error('Search Exception', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()->back()
                ->withInput()
                ->with('error', 'An error occurred while searching. Please try again.');
        }
    }

}
