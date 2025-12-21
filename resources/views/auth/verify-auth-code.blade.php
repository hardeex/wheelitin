@extends('components.base')

@section('title', 'Verify Authentication Code')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-baby-blue/20 via-background to-orange/20 flex items-center justify-center py-12 px-4">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
        <img src="https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=1920&q=80" alt="Background" class="w-full h-full object-cover">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-dark-blue mb-2 font-display">Authentication Required</h2>
                <p class="text-dark-blue/70">
                    Enter the 5-character code sent to <strong class="text-dark-blue">{{ $pending['email'] }}</strong>
                </p>
            </div>

            @include('components.feedback')

            <!-- Auth Code Form -->
            <form action="{{ route('verify.auth.code.submit') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="email" value="{{ $pending['email'] }}">

                <div>
                    <label for="auth_code" class="block text-sm font-semibold text-dark-blue mb-2">Authentication Code</label>
                    <input type="text" id="auth_code" name="auth_code" required maxlength="5"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue text-center text-2xl tracking-widest uppercase font-bold"
                        placeholder="XXXXX"
                        autocomplete="one-time-code">
                    @error('auth_code')
                        <p class="mt-1 text-sm text-sun">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Security Notice -->
                <div class="p-4 bg-orange/10 border border-orange rounded-lg">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-sun mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-dark-blue mb-1">Security Notice</p>
                            <p class="text-xs text-dark-blue/70">This code is required for admin/agent access. Never share it with anyone.</p>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="w-full bg-dark-blue text-white py-3 px-6 rounded-lg font-semibold hover:bg-dark-blue/90 focus:outline-none focus:ring-4 focus:ring-sky-blue/50 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                    Verify & Continue
                </button>
            </form>

            <!-- Back to Login -->
            <div class="mt-6 pt-6 border-t border-gray-200 text-center">
                <a href="{{ route('login') }}" class="text-sm text-dark-blue/70 hover:text-dark-blue transition-colors duration-200">
                    ← Back to Login
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
document.addEventListener('DOMContentLoaded', function() {
    const authCodeInput = document.getElementById('auth_code');
    if (authCodeInput) {
        authCodeInput.focus();
        
        // Convert to uppercase and only allow alphanumeric
        authCodeInput.addEventListener('input', function(e) {
            this.value = this.value.toUpperCase().replace(/[^A-Z0-9]/g, '');
        });
    }
});
</script>
@endsection