<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarOwnerController;
use App\Http\Controllers\CloudinaryController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\JoinWailListControoller;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SpecialistController;
use Illuminate\Support\Facades\Route;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
// Route::get('/service', [PagesController::class, 'services'])->name('service');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/send/waitlist/data', [PagesController::class, 'sendWaitListData'])->name('sendwaitlist.data');
Route::post('/send/waitlist/data', [PagesController::class, 'sendWaitlistData'])->name('waitlist.store');
Route::get('/help', [PagesController::class, 'help'])->name('help');
Route::get('/all/speciliast', [PagesController::class, 'allSpecialiast'])->name('specialists.index');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('/terms', [PagesController::class, 'terms'])->name('terms');
Route::get('/privacy', [PagesController::class, 'privacy'])->name('privacy');
Route::get('/cookies', [PagesController::class, 'cookies'])->name('cookies');




Route::get('/search', [SearchController::class, 'searchSpecialists'])->name('search.specialists');


/***
 * 
 * JOIN WAIT LIST CONTROLLER
 */

Route::get('/join/waitlist', [JoinWailListControoller::class, 'joinWaitList'])->name('join.waitlist');
Route::post('/send/waitlist/data', [JoinWailListControoller::class, 'sendJoinWaitiListData'])->name('send.waitlist.data');


// ============================================
// AUTH ROUTES (Redirect if already authenticated)
// ============================================
Route::middleware('redirect.auth')->group(function () {
    // Registration
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'submit'])->name('register.submit');

    // Login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginSubmit'])->name('login.submit');

    // Forgot Password
    Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

    // Reset Password
    Route::get('/reset-password', [AuthController::class, 'showResetPassword'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
});

// ============================================
// VERIFICATION ROUTES (Public but user-specific)
// ============================================
Route::get('/verify', [AuthController::class, 'showVerification'])->name('verify.show');
Route::post('/verify', [AuthController::class, 'verifyAccount'])->name('verify.submit');
Route::get('/verify-email', [AuthController::class, 'verifyEmailLink'])->name('verify.email.link');
Route::post('/verify/resend', [AuthController::class, 'resendVerification'])->name('verify.resend');

// Auth Code Verification
Route::get('/verify-auth-code', [AuthController::class, 'showAuthCodeVerification'])->name('verify.auth.code');
Route::post('/verify-auth-code', [AuthController::class, 'verifyAuthCode'])->name('verify.auth.code.submit');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ============================================
// CLOUDINARY ROUTES (Authenticated)
// ============================================
Route::middleware('check.auth')->group(function () {
    Route::get('/cloudinary/config', [CloudinaryController::class, 'getUploadConfig'])->name('cloudinary.config');

    Route::post('/cloudinary/signature', [CloudinaryController::class, 'generateUploadSignature'])->name('cloudinary.signature');
});

// ============================================
// USER ROUTES (Authenticated Users)
// ============================================
Route::middleware('check.auth')
    ->prefix('user')
    ->group(function () {
        Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('user.dashboard');
        Route::get('/report-car-issue', [GuestController::class, 'reportCarIsssue'])->name('report.car.issue');
        Route::post('/submit-car-report', [GuestController::class, 'submitCarIssues'])->name('issues.submit');
        Route::get('/user/reported/issue', [GuestController::class, 'userReportedCarIssues'])->name('user.reported.car.issues');
        Route::get('/my-reports/{id}', [GuestController::class, 'reportDetails'])->name('user.report.details');
        Route::post('/reports/{reportId}/review', [GuestController::class, 'submitReview'])->name('report.review.submit');
        Route::get('/upload-status/{uploadId}', [GuestController::class, 'checkUploadStatus'])->name('upload.status');
    });

// ============================================
// MANAGEMENT ROUTES (Authenticated - User Profile & Settings)
// ============================================
Route::middleware('check.auth')->group(function () {
    // Contact (requires auth)
    Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

    // Profile & Settings
    Route::get('/profile', [ManagementController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ManagementController::class, 'updateProfile'])->name('profile.update');
    Route::get('/settings', [ManagementController::class, 'settings'])->name('settings');
    Route::post('/change-password', [ManagementController::class, 'changePassword'])->name('change.password');
    Route::get('/my-bookings', [ManagementController::class, 'myBookings'])->name('bookings.index');
    Route::get('/my-reviews', [ManagementController::class, 'myReviews'])->name('reviews.index');
    Route::get('/notifications', [ManagementController::class, 'notifications'])->name('notifications');

    // User Activity
    Route::get('/my-quotes', [CarOwnerController::class, 'myQuotes'])->name('quotes.index');
    Route::post('/reports/{reportId}/complete', [CarOwnerController::class, 'completeReport'])->name('specialist.report.complete');
});

// ============================================
// SPECIALIST ROUTES (Authenticated Specialists)
// ============================================
Route::middleware('check.specialist')
    ->prefix('specialist')
    ->group(function () {
        Route::get('/dashboard', [SpecialistController::class, 'dashboard'])->name('specialist.dashboard');
        Route::get('/earnings', [SpecialistController::class, 'myEarning'])->name('specialist.earnings');
        Route::get('/reports', [SpecialistController::class, 'availableReports'])->name('specialist.reports');
        // Route::get('/my-jobs', [SpecialistController::class, 'getSpecialistReports'])->name('specialist.jobs');
        Route::get('/reports/{reportId}', [SpecialistController::class, 'viewReport'])->name('specialist.report.view');
        Route::post('/reports/{reportId}/quotation', [SpecialistController::class, 'submitQuotation'])->name('specialist.quotation.submit');
        Route::get('/quotations', [SpecialistController::class, 'myQuotations'])->name('quotations');
        Route::get('/reported/cars', [SpecialistController::class, 'reportedCars'])->name('reported.cars');
    });

// ============================================
// ADMIN ROUTES (Authenticated Admins)
// ============================================
Route::middleware('check.admin')
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });

