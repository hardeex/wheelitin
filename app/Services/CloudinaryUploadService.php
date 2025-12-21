<?php
// app/Services/CloudinaryUploadService.php

namespace App\Services;

use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Log;

class CloudinaryUploadService
{
    protected $cloudinary;

    public function __construct()
    {
        $this->cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => config('services.cloudinary.cloud_name'),
                'api_key' => config('services.cloudinary.api_key'),
                'api_secret' => config('services.cloudinary.api_secret'),
            ],
            'url' => ['secure' => true]
        ]);
    }

    /**
     * Upload image from file path (for jobs)
     */
    public function uploadImageFromPath($filePath, $folder = 'car-issues/images')
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload(
                $filePath,
                [
                    'folder' => $folder,
                    'resource_type' => 'image',
                    'transformation' => [
                        'quality' => 'auto:good',
                        'fetch_format' => 'auto',
                    ],
                    'eager' => [
                        ['width' => 400, 'height' => 300, 'crop' => 'fill'], // Thumbnail
                    ],
                    'eager_async' => true,
                ]
            );

            return [
                'success' => true,
                'url' => $result['secure_url'],
                'public_id' => $result['public_id'],
                'format' => $result['format'],
                'width' => $result['width'],
                'height' => $result['height'],
                'thumbnail' => $result['eager'][0]['secure_url'] ?? null,
            ];
        } catch (\Exception $e) {
            Log::error('Cloudinary image upload failed', [
                'file' => $filePath,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Upload video from file path (for jobs)
     */
    public function uploadVideoFromPath($filePath, $folder = 'car-issues/videos')
    {
        try {
            $result = $this->cloudinary->uploadApi()->upload(
                $filePath,
                [
                    'folder' => $folder,
                    'resource_type' => 'video',
                    'chunk_size' => 10000000, // 10MB chunks
                    'eager' => [
                        ['width' => 640, 'crop' => 'scale', 'format' => 'mp4'],
                    ],
                    'eager_async' => true,
                ]
            );

            return [
                'success' => true,
                'url' => $result['secure_url'],
                'public_id' => $result['public_id'],
                'format' => $result['format'],
                'duration' => $result['duration'] ?? null,
            ];
        } catch (\Exception $e) {
            Log::error('Cloudinary video upload failed', [
                'file' => $filePath,
                'error' => $e->getMessage(),
            ]);

            return [
                'success' => false,
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Upload image directly (for synchronous uploads if needed)
     */
    public function uploadImage($file, $folder = 'car-issues/images')
    {
        return $this->uploadImageFromPath($file->getRealPath(), $folder);
    }

    /**
     * Upload video directly (for synchronous uploads if needed)
     */
    public function uploadVideo($file, $folder = 'car-issues/videos')
    {
        return $this->uploadVideoFromPath($file->getRealPath(), $folder);
    }

    public function deleteFile($publicId, $resourceType = 'image')
    {
        try {
            $result = $this->cloudinary->uploadApi()->destroy(
                $publicId,
                ['resource_type' => $resourceType]
            );

            return $result['result'] === 'ok';
        } catch (\Exception $e) {
            Log::error('Cloudinary file deletion failed', [
                'public_id' => $publicId,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }
}