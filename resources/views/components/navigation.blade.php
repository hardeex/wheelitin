<nav class="bg-[var(--color-background)] px-4 sm:px-6 lg:px-8 py-4 shadow-sm">
    <div class="max-w-7xl mx-auto flex items-center justify-between">

        @php
            $user = session('user');
            $dashboardRoute = match ($user['user_type'] ?? 'default') {
                'user' => route('user.dashboard'),
                'specialist' => route('specialist.dashboard'),
                'admin' => route('admin.dashboard'),
                default => route('index'), // fallback
            };
        @endphp

        <!-- Logo -->
        <div class="flex-shrink-0">
            <a href="/" class="block transition-transform hover:scale-105 duration-300">
                <img src="{{ asset('images/logo.png') }}" 
                     alt="Wheel It In" 
                     class="h-12 w-auto sm:h-16 md:h-[82px]">
            </a>
        </div>

        <!-- Desktop Menu (Center) -->
        <div class="hidden lg:flex items-center gap-8">
            <a href="{{route('index')}}" 
               class="text-lg font-display uppercase text-[var(--color-dark-blue)] hover:text-[var(--color-orange)] transition-all duration-300 relative group">
                Home
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-full transition-all duration-300"></span>
            </a>
            <a href="{{route('about')}}" 
               class="text-lg font-display uppercase text-[var(--color-dark-blue)] hover:text-[var(--color-orange)] transition-all duration-300 relative group">
                About
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-full transition-all duration-300"></span>
            </a>
            @if ($user && in_array($user['user_type'], ['specialist', 'admin']))
                <a href="{{route('reported.cars')}}" 
                   class="text-lg font-display uppercase text-[var(--color-dark-blue)] hover:text-[var(--color-orange)] transition-all duration-300 relative group">
                    Reported Cases
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-full transition-all duration-300"></span>
                </a>
            @endif
            <a href="{{route('contact')}}" 
               class="text-lg font-display uppercase text-[var(--color-dark-blue)] hover:text-[var(--color-orange)] transition-all duration-300 relative group">
                Contact
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-full transition-all duration-300"></span>
            </a>
        </div>

        <!-- Auth Buttons (Right) -->
        <div class="flex items-center gap-3">
            @if ($user)
                <!-- Dashboard Button -->
                <a href="{{ $dashboardRoute }}" 
                   class="hidden sm:flex items-center gap-2 bg-[var(--color-dark-blue)] text-white px-4 py-2.5 rounded-full hover:bg-[var(--color-orange)] transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Dashboard</span>
                </a>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="hidden sm:block">
                    @csrf
                    <button type="submit"
                            class="flex items-center gap-2 bg-red-600 text-white px-4 py-2.5 rounded-full hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" 
                                  stroke-linejoin="round" 
                                  stroke-width="2" 
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span class="font-medium text-sm sm:text-base">Logout</span>
                    </button>
                </form>
            @else
                <!-- Service Provider Button (when not logged in) -->
                <a href="{{route('login')}}" 
                   class="hidden sm:flex items-center gap-2 bg-[var(--color-dark-blue)] text-white px-4 py-2.5 rounded-full hover:bg-[var(--color-orange)] transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M12 4v16m8-8H4" />
                    </svg>
                    <span class="font-medium text-sm sm:text-base">Service Provider</span>
                </a>
            @endif

            <!-- Mobile Menu Toggle -->
            <button id="menuToggle" 
                    class="lg:hidden bg-[var(--color-dark-blue)] text-white p-2.5 rounded-full hover:bg-[var(--color-orange)] transition-all duration-300 transform hover:scale-110 shadow-md">
                <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg id="closeIcon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" 
                          stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenu" class="lg:hidden fixed inset-0 z-[9999] hidden">
        <!-- Backdrop -->
        <div class="absolute inset-0  bg-opacity-50 backdrop-blur-sm transition-opacity duration-300"></div>
        
        <!-- Menu Panel -->
        <div id="menuPanel" class="absolute right-0 top-0 h-full w-80 bg-[var(--color-dark-blue)] shadow-2xl transform translate-x-full transition-transform duration-300 overflow-hidden">
            <!-- Close Button -->
            <div class="flex justify-end p-6">
                <button id="menuClose" 
                        class="text-[var(--color-orange)] hover:text-white transition-all duration-300 transform hover:rotate-90 hover:scale-110">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Menu Items -->
            <div class="flex flex-col gap-3 px-6 overflow-y-auto max-h-[calc(100vh-120px)]">
                <a href="{{route('index')}}" 
                   class="group text-xl font-display uppercase text-[var(--color-orange)] hover:text-white transition-all duration-300 border-b border-gray-600 hover:border-[var(--color-orange)] pb-3 transform hover:translate-x-2">
                    <span class="flex items-center gap-3">
                        <span class="w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-8 transition-all duration-300"></span>
                        Home
                    </span>
                </a>
                <a href="{{route('about')}}" 
                   class="group text-xl font-display uppercase text-[var(--color-orange)] hover:text-white transition-all duration-300 border-b border-gray-600 hover:border-[var(--color-orange)] pb-3 transform hover:translate-x-2">
                    <span class="flex items-center gap-3">
                        <span class="w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-8 transition-all duration-300"></span>
                        About
                    </span>
                </a>
                @if ($user && in_array($user['user_type'], ['specialist', 'admin']))
                    <a href="{{route('reported.cars')}}" 
                       class="group text-xl font-display uppercase text-[var(--color-orange)] hover:text-white transition-all duration-300 border-b border-gray-600 hover:border-[var(--color-orange)] pb-3 transform hover:translate-x-2">
                        <span class="flex items-center gap-3">
                            <span class="w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-8 transition-all duration-300"></span>
                            Reported Cases
                        </span>
                    </a>
                @endif
                <a href="{{route('contact')}}" 
                   class="group text-xl font-display uppercase text-[var(--color-orange)] hover:text-white transition-all duration-300 border-b border-gray-600 hover:border-[var(--color-orange)] pb-3 transform hover:translate-x-2">
                    <span class="flex items-center gap-3">
                        <span class="w-0 h-0.5 bg-[var(--color-orange)] group-hover:w-8 transition-all duration-300"></span>
                        Contact
                    </span>
                </a>

                <!-- Mobile Auth Buttons -->
                <div class="flex flex-col gap-3 mt-4 pt-4 border-t border-gray-600">
                    @if ($user)
                        <a href="{{ $dashboardRoute }}" 
                           class="flex items-center justify-center gap-2 bg-[var(--color-orange)] text-white px-6 py-3 rounded-full hover:bg-white hover:text-[var(--color-dark-blue)] transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">Dashboard</span>
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="w-full flex items-center justify-center gap-2 bg-white text-red-600 px-6 py-3 rounded-full hover:bg-red-600 hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" 
                                          stroke-linejoin="round" 
                                          stroke-width="2" 
                                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                <span class="font-medium">Logout</span>
                            </button>
                        </form>
                    @else
                        <a href="{{route('login')}}" 
                           class="flex items-center justify-center gap-2 bg-white text-[var(--color-dark-blue)] px-6 py-3 rounded-full hover:bg-[var(--color-orange)] hover:text-white transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M12 4v16m8-8H4" />
                            </svg>
                            <span class="font-medium">Service Provider</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuPanel = document.getElementById('menuPanel');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    const menuClose = document.getElementById('menuClose');

    function openMenu() {
        mobileMenu.classList.remove('hidden');
        menuIcon.classList.add('hidden');
        closeIcon.classList.remove('hidden');
        
        // Trigger animation after a brief delay
        setTimeout(() => {
            menuPanel.classList.remove('translate-x-full');
        }, 10);
    }

    function closeMenu() {
        menuPanel.classList.add('translate-x-full');
        menuIcon.classList.remove('hidden');
        closeIcon.classList.add('hidden');
        
        // Hide menu after animation completes
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
        }, 300);
    }

    menuToggle.addEventListener('click', () => {
        if (mobileMenu.classList.contains('hidden')) {
            openMenu();
        } else {
            closeMenu();
        }
    });

    menuClose.addEventListener('click', closeMenu);

    // Close menu when clicking backdrop
    mobileMenu.addEventListener('click', (e) => {
        if (e.target === mobileMenu || e.target.classList.contains('bg-opacity-50')) {
            closeMenu();
        }
    });

    // Close menu on escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
            closeMenu();
        }
    });
</script>