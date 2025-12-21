<?php
// app/Jobs/UploadMediaToCloudinary.php

namespace App\Jobs;

use App\Services\CloudinaryUploadService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class UploadMediaToCloudinary implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300; // 5 minutes
    public $tries = 3;
    public $backoff = [10, 30, 60]; // Retry delays

    protected $filePath;
    protected $fileName;
    protected $fileType;
    protected $uploadId;
    protected $folder;

    public function __construct($filePath, $fileName, $fileType, $uploadId, $folder)
    {
        $this->filePath = $filePath;
        $this->fileName = $fileName;
        $this->fileType = $fileType; // 'image' or 'video'
        $this->uploadId = $uploadId;
        $this->folder = $folder;
    }

    public function handle(CloudinaryUploadService $cloudinaryService)
    {
        try {
            Log::info("Starting Cloudinary upload", [
                'upload_id' => $this->uploadId,
                'file' => $this->fileName,
                'type' => $this->fileType
            ]);

            // Upload based on type
            if ($this->fileType === 'image') {
                $result = $cloudinaryService->uploadImageFromPath($this->filePath, $this->folder);
            } else {
                $result = $cloudinaryService->uploadVideoFromPath($this->filePath, $this->folder);
            }

            if ($result['success']) {
                // Cache the result with upload ID
                $cacheKey = "upload_{$this->uploadId}_{$this->fileType}_{$this->fileName}";
                Cache::put($cacheKey, $result, now()->addMinutes(30));

                Log::info("Cloudinary upload successful", [
                    'upload_id' => $this->uploadId,
                    'url' => $result['url'],
                    'file' => $this->fileName
                ]);

                // Delete temporary file after successful upload
                if (file_exists($this->filePath)) {
                    unlink($this->filePath);
                }
            } else {
                throw new \Exception($result['error'] ?? 'Upload failed');
            }

        } catch (\Exception $e) {
            Log::error("Cloudinary upload job failed", [
                'upload_id' => $this->uploadId,
                'file' => $this->fileName,
                'error' => $e->getMessage()
            ]);

            // Store error in cache
            $errorKey = "upload_error_{$this->uploadId}_{$this->fileName}";
            Cache::put($errorKey, $e->getMessage(), now()->addMinutes(30));

            throw $e; // Re-throw to trigger retry
        }
    }

    public function failed(\Throwable $exception)
    {
        Log::critical("Cloudinary upload job permanently failed", [
            'upload_id' => $this->uploadId,
            'file' => $this->fileName,
            'error' => $exception->getMessage()
        ]);

        // Clean up temp file
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}