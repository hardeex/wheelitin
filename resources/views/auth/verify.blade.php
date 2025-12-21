@extends('components.base')

@section('title', 'Verify Account')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-baby-blue/20 via-background to-orange/20 flex items-center justify-center py-12 px-4">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <img src="https://images.unsplash.com/photo-1563986768494-4dee2763ff3f?w=1920&q=80" alt="Background" class="w-full h-full object-cover">
    </div>

    <!-- Decorative Blobs -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-baby-blue rounded-full blur-3xl opacity-20 animate-pulse"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange rounded-full blur-3xl opacity-15 animate-pulse" style="animation-delay: 1s;"></div>

    <!-- Verification Container -->
    <div class="relative w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8 border-2 border-baby-blue/30">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-sun to-sky-blue rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-dark-blue mb-2 font-display">Verify Your Email</h2>
                <p class="text-dark-blue/70">
                    Enter your email address to receive a verification link
                </p>
            </div>

            @include('feedback')

            <!-- Email Verification Form -->
            <form action="{{ route('verify.submit') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Email input field -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-dark-blue mb-2">Email Address</label>
                    <input type="email" id="email" name="email" required
                        value="{{ old('email') ?? $user['email'] ?? '' }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue bg-baby-blue/5"
                        placeholder="you@example.com"
                        autocomplete="email"
                        readonly>
                    @error('email')
                        <p class="mt-1 text-sm text-sun">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit button -->
                <button type="submit"
                    class="w-full bg-gradient-to-r from-sun to-orange text-white py-3 px-6 rounded-lg font-semibold hover:from-orange hover:to-sun focus:outline-none focus:ring-4 focus:ring-orange/50 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                    Send Verification Link
                </button>
            </form>

            <!-- Information Box -->
            <div class="mt-6 p-4 bg-baby-blue/10 border border-baby-blue rounded-lg">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-sky-blue mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="text-sm font-semibold text-dark-blue mb-1">What happens next?</p>
                        <p class="text-xs text-dark-blue/70">We'll send a verification link to your email. Click the link to activate your account instantly.</p>
                    </div>
                </div>
            </div>

            <!-- Help Box -->
            <div class="mt-6 p-4 bg-gray-50 border border-gray-200 rounded-lg">
                <p class="text-xs text-dark-blue mb-2"><strong>Having trouble?</strong></p>
                <ul class="text-xs text-dark-blue/70 space-y-1">
                    <li>• Check your spam/junk folder for the email</li>
                    <li>• Make sure you entered the correct email address</li>
                    <li>• The verification link expires after 24 hours</li>
                    <li>• Contact support if you still can't verify</li>
                </ul>
            </div>

            <!-- Back to Login -->
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <a href="{{ route('login') }}" class="text-sm text-dark-blue/70 hover:text-dark-blue inline-flex items-center transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Login
                </a>
            </div>
        </div>

        <!-- Help Text -->
        <div class="mt-6 text-center">
            <p class="text-sm text-dark-blue/70">
                Need help? <a href="#" class="text-sky-blue hover:text-dark-blue font-medium transition-colors duration-200">Contact Support</a>
            </p>
        </div>
    </div>
</div>

<script>
// Auto-focus email input
document.addEventListener('DOMContentLoaded', function() {
    const emailInput = document.getElementById('email');
    if (emailInput && !emailInput.value) {
        emailInput.focus();
    }
});
</script>
@endsection