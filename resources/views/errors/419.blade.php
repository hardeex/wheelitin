@extends('components.base')

@section('title', '404 - Page Not Found')

@section('content')

<div class="min-h-screen bg-[var(--color-background)] flex items-center justify-center px-4" 
     style="background: linear-gradient(135deg, var(--color-baby-blue) 0%, var(--color-background) 50%, var(--color-sky-blue) 100%);">
    <div class="max-w-2xl w-full text-center">
        <!-- Animated 404 Illustration -->
        <div class="relative mb-8">
            <div class="font-display text-[200px] font-bold text-transparent bg-clip-text leading-none select-none animate-pulse"
                 style="background: linear-gradient(135deg, var(--color-sky-blue) 0%, var(--color-dark-blue) 100%); -webkit-background-clip: text; background-clip: text;">
                404
            </div>
            
            <!-- Floating Car Icon -->
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                <div class="animate-bounce">
                    <svg class="w-24 h-24 text-[var(--color-orange)]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Error Message -->
        <div class="mb-8">
            <h1 class="font-display text-4xl md:text-5xl font-bold text-[var(--color-dark-blue)] mb-4">
                Oops! Wrong Turn
            </h1>
            <p class="text-xl text-[var(--color-dark-blue)]/80 mb-2">
                Looks like this page took a detour and got lost.
            </p>
            <p class="text-lg text-[var(--color-dark-blue)]/60">
                The page you're looking for doesn't exist or has been moved.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
            <h2 class="text-xl font-semibold text-[var(--color-dark-blue)] mb-6">Let's get you back on track:</h2>
            <div class="grid md:grid-cols-2 gap-4">
                <a href="{{ route('index') }}" class="flex items-center justify-center space-x-2 bg-[var(--color-sky-blue)] text-white px-6 py-4 rounded-xl font-semibold hover:bg-[var(--color-dark-blue)] transition-all shadow-lg hover:shadow-xl hover:scale-105 transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Go Home</span>
                </a>

                @auth
                    <a href="{{ route('user.dashboard') }}" class="flex items-center justify-center space-x-2 bg-[var(--color-orange)] text-white px-6 py-4 rounded-xl font-semibold hover:bg-[var(--color-sun)] transition-all shadow-lg hover:shadow-xl hover:scale-105 transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        <span>My Dashboard</span>
                    </a>
                @else
                    <a href="{{ route('register') }}" class="flex items-center justify-center space-x-2 bg-[var(--color-orange)] text-white px-6 py-4 rounded-xl font-semibold hover:bg-[var(--color-sun)] transition-all shadow-lg hover:shadow-xl hover:scale-105 transform">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        <span>Get Started</span>
                    </a>
                @endauth
            </div>

            <div class="mt-6 grid md:grid-cols-3 gap-4 text-sm">
                <a href="{{ route('how-it-works') }}" class="flex items-center justify-center space-x-2 text-[var(--color-dark-blue)]/70 hover:text-[var(--color-sky-blue)] py-3 px-4 rounded-lg hover:bg-[var(--color-baby-blue)]/20 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>How It Works</span>
                </a>
                <a href="{{ route('help') }}" class="flex items-center justify-center space-x-2 text-[var(--color-dark-blue)]/70 hover:text-[var(--color-sky-blue)] py-3 px-4 rounded-lg hover:bg-[var(--color-baby-blue)]/20 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Help Center</span>
                </a>
                <a href="{{ route('contact') }}" class="flex items-center justify-center space-x-2 text-[var(--color-dark-blue)]/70 hover:text-[var(--color-sky-blue)] py-3 px-4 rounded-lg hover:bg-[var(--color-baby-blue)]/20 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Contact Us</span>
                </a>
            </div>
        </div>

        <!-- Search Box -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <p class="text-[var(--color-dark-blue)] mb-4 font-medium">Looking for something specific?</p>
            <form action="{{ route('search.specialists') }}" method="GET" class="flex gap-3">
                <input 
                    type="text" 
                    name="q" 
                    placeholder="Search mechanics, services, or locations..." 
                    class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-xl focus:ring-2 focus:ring-[var(--color-sky-blue)] focus:border-[var(--color-sky-blue)] focus:outline-none transition-all">
                <button 
                    type="submit" 
                    class="bg-[var(--color-sky-blue)] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[var(--color-dark-blue)] transition-colors flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <span class="hidden sm:inline">Search</span>
                </button>
            </form>
        </div>

        <!-- Error Code -->
        <div class="mt-8 text-sm text-[var(--color-dark-blue)]/40">
            Error Code: 404 | Page Not Found
        </div>
    </div>
</div>

<style>
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-20px);
        }
    }
    
    .animate-bounce {
        animation: bounce 2s infinite;
    }
</style>

@endsection