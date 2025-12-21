<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CloudinaryController extends Controller
{
    /**
     * Get upload configuration for frontend (unsigned uploads)
     */
   public function getUploadConfig(Request $request)
    {
        try {
            $fileType = $request->input('type', 'image');
            
            $cloudName = config('services.cloudinary.cloud_name');
            $uploadPreset = config('services.cloudinary.upload_preset');
            
            // Log for debugging
            Log::info('Cloudinary config requested', [
                'type' => $fileType,
                'cloud_name' => $cloudName,
                'upload_preset' => $uploadPreset,
                'env_cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'env_upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),
            ]);

            // Validate configuration
            if (empty($cloudName)) {
                throw new \Exception('CLOUDINARY_CLOUD_NAME not configured');
            }

            if (empty($uploadPreset)) {
                throw new \Exception('CLOUDINARY_UPLOAD_PRESET not configured');
            }

            $config = [
                'success' => true,
                'cloud_name' => $cloudName,
                'upload_preset' => $uploadPreset,
                'folder' => $fileType === 'video' ? 'car-issues/videos' : 'car-issues/images',
            ];

            Log::info('Returning Cloudinary config', $config);

            return response()->json($config);

        } catch (\Exception $e) {
            Log::error('Failed to get Cloudinary config', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to get upload configuration: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Generate signature for signed uploads (more secure, optional)
     */
    public function generateUploadSignature(Request $request)
    {
        try {
            $timestamp = time();
            $fileType = $request->input('type', 'image');
            $folder = $fileType === 'video' ? 'car-issues/videos' : 'car-issues/images';

            $params = [
                'timestamp' => $timestamp,
                'folder' => $folder,
            ];

            // Generate signature
            $signature = $this->generateSignature($params);

            return response()->json([
                'success' => true,
                'signature' => $signature,
                'timestamp' => $timestamp,
                'api_key' => config('services.cloudinary.api_key'),
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'folder' => $folder,
            ]);

        } catch (\Exception $e) {
            Log::error('Cloudinary signature generation failed', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to generate upload signature'
            ], 500);
        }
    }

    /**
     * Generate Cloudinary signature
     */
    private function generateSignature(array $params)
    {
        ksort($params);

        $toSign = [];
        foreach ($params as $key => $value) {
            if (!empty($value)) {
                $toSign[] = "{$key}={$value}";
            }
        }
        $stringToSign = implode('&', $toSign);

        $apiSecret = config('services.cloudinary.api_secret');
        return hash('sha1', $stringToSign . $apiSecret);
    }
}