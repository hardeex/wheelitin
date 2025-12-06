<nav class="bg-[var(--color-background)] px-6 py-4 flex items-center justify-between">
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
</nav>