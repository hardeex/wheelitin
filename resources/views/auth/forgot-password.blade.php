@extends('components.base')

@section('title', 'Forgot Password')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-[#8ECAE6]/20 via-[#FFFAEE] to-[#FFB703]/20 flex items-center justify-center py-12 px-4">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <img src="https://images.unsplash.com/photo-1555421689-491a97ff2040?w=1920&q=80" alt="Background" class="w-full h-full object-cover">
    </div>

    <!-- Decorative Blobs -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-[#8ECAE6] rounded-full blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-[#FFB703] rounded-full blur-3xl opacity-15 animate-pulse" style="animation-delay: 1s;"></div>

    <!-- Forgot Password Container -->
    <div class="relative w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8 border-2 border-[#8ECAE6]/30">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-[#FB8500] to-[#219EBC] rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-[#023047] mb-2 font-display">Forgot Password?</h2>
                <p class="text-[#023047]/70">
                    No worries! Enter your email address and we'll send you a link to reset your password.
                </p>
            </div>

            @include('feedback')

            <!-- Forgot Password Form -->
            <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-semibold text-[#023047] mb-2">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"></path>
                            </svg>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                            class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-[#219EBC] transition-all duration-200 text-[#023047]"
                            placeholder="john@example.com">
                    </div>
                    @error('email')
                        <p class="mt-1 text-sm text-[#FB8500]">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Info Box -->
                <div class="p-4 bg-[#8ECAE6]/10 border border-[#8ECAE6] rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-[#219EBC] mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-[#023047] mb-1">What happens next?</p>
                            <ul class="text-xs text-[#023047]/70 space-y-1">
                                <li>• We'll send a password reset link to your email</li>
                                <li>• Click the link to create a new password</li>
                                <li>• The link expires in 60 minutes</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-[#FB8500] to-[#FFB703] text-white py-3 px-6 rounded-lg font-semibold hover:from-[#FFB703] hover:to-[#FB8500] focus:outline-none focus:ring-4 focus:ring-[#FFB703]/50 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                    Send Reset Link
                </button>
            </form>

            <!-- Back to Login -->
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <a href="{{ route('login') }}" class="text-sm text-[#023047]/70 hover:text-[#023047] inline-flex items-center transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Login
                </a>
            </div>
        </div>

        <!-- Help Text -->
        <div class="mt-6 text-center">
            <p class="text-sm text-[#023047]/70">
                Don't have an account? <a href="{{ route('register') }}" class="text-[#219EBC] hover:text-[#023047] font-medium transition-colors duration-200">Sign up</a>
            </p>
        </div>
    </div>
</div>
@endsection