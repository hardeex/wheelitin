{{-- <nav class="bg-[var(--color-background)] px-6 py-4 flex items-center justify-between">
    <!-- Logo -->
    <div class="flex-shrink-0 ml-20">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" 
                 alt="Wheel It In" 
                 class="h-[82px] w-[215px]">
        </a>
    </div>

    <!-- Search Bar -->
    <div class="flex-1 max-w-md mx-auto">
        <div class="relative">
            <input type="text" 
                   placeholder="Search Here" 
                   class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" 
                 fill="none" 
                 stroke="currentColor" 
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <!-- Menu Button -->
    <div class="flex-shrink-0 mr-12">
        <button class="bg-[var(--color-dark-blue)] text-white p-3 rounded-full hover:bg-[var(--color-primary)] transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</nav> --}}


<nav class="bg-[var(--color-background)] px-4 sm:px-6 py-4 flex items-center justify-between gap-2 sm:gap-4 relative">
    <!-- Logo -->
    <div class="flex-shrink-0 sm:ml-20">
        <a href="/">
            <img src="{{ asset('images/logo.png') }}" 
                 alt="Wheel It In" 
                 class="h-12 w-auto sm:h-16 md:h-[82px] sm:w-auto">
        </a>
    </div>

    <!-- Search Bar (hidden on mobile) -->
    <div class="flex-1 max-w-md mx-auto hidden sm:block">
        <div class="relative">
            <input type="text" 
                   placeholder="Search Here" 
                   class="w-full pl-10 pr-4 py-2.5 rounded-full border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-[var(--color-primary)] focus:border-transparent">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" 
                 fill="none" 
                 stroke="currentColor" 
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>

    <!-- Menu Button -->
    <div class="flex-shrink-0 sm:mr-12">
        <button id="menuToggle" class="bg-[var(--color-dark-blue)] text-white p-2.5 sm:p-3 rounded-full hover:bg-[var(--color-primary)] transition-colors">
            <svg id="menuIcon" class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="closeIcon" class="w-5 h-5 sm:w-6 sm:h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" 
                      stroke-linejoin="round" 
                      stroke-width="2" 
                      d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Menu Overlay -->
    <div id="mobileMenu" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40" style="top: 0;">
        <div class="absolute right-0 top-0 h-full w-80 bg-[var(--color-dark-blue)] shadow-lg transform transition-transform duration-300">
            <!-- Close Button -->
            <div class="flex justify-end p-6">
                <button id="menuClose" class="text-[var(--color-orange)] hover:text-[var(--color-sun)] transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" 
                              stroke-linejoin="round" 
                              stroke-width="2" 
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <!-- Menu Items -->
            <div class="flex flex-col gap-8 px-8 pt-8">
                <a href="{{route('index')}}" class="text-[28px] font-display uppercase text-[var(--color-orange)] hover:text-[var(--color-sun)] transition-colors border-b border-gray-600 pb-4">Home</a>
                <a href="{{route('about')}}" class="text-[28px] font-display uppercase text-[var(--color-orange)] hover:text-[var(--color-sun)] transition-colors border-b border-gray-600 pb-4">About</a>
                <a href="{{route('contact')}}" class="text-[28px] font-display uppercase text-[var(--color-orange)] hover:text-[var(--color-sun)] transition-colors border-b border-gray-600 pb-4">Contact Us</a>
                <a href="{{route('service')}}" class="text-[28px] font-display uppercase text-[var(--color-orange)] hover:text-[var(--color-sun)] transition-colors border-b border-gray-600 pb-4">Services</a>
            </div>
        </div>
    </div>
</nav>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    const menuIcon = document.getElementById('menuIcon');
    const closeIcon = document.getElementById('closeIcon');
    const menuClose = document.getElementById('menuClose');

    function toggleMenu() {
        mobileMenu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    }

    menuToggle.addEventListener('click', toggleMenu);
    menuClose.addEventListener('click', toggleMenu);

    // Close menu when clicking outside
    mobileMenu.addEventListener('click', (e) => {
        if (e.target === mobileMenu) {
            toggleMenu();
        }
    });
</script>