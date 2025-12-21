<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200 flex-shrink-0">
        <a href="{{ route('index') }}" class="flex items-center space-x-2">
            <span class="text-xl font-bold text-dark-blue font-display">Wheelitin</span>
        </a>
        <!-- Close button for mobile -->
        <button id="close-sidebar" class="lg:hidden text-dark-blue/70 hover:text-dark-blue">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- User Profile Section -->
    <div class="p-6 border-b border-gray-200 flex-shrink-0">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-gradient-to-br from-sun to-sky-blue rounded-full flex items-center justify-center">
                <span class="text-white text-lg font-bold">
                    {{ strtoupper(($user['first_name'][0] ?? '') . ($user['last_name'][0] ?? '')) ?: 'NA' }}
                </span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-dark-blue truncate">{{ $user['first_name'] ?? '' }} {{ $user['last_name'] ?? '' }}</p>
                <p class="text-xs text-dark-blue/60 truncate">{{ $user['email'] ?? '' }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation - Scrollable -->
    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
        
        <!-- Main Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-dark-blue/60 uppercase tracking-wider">Main</h3>
            
            <!-- Home -->
            <a href="{{ route('index') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'index' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>

            <!-- Dashboard -->
            <a href="{{ route('user.dashboard') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'user.dashboard' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Dashboard
            </a>

            <!-- Notifications -->
            <a href="{{ route('notifications') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'notifications' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                Notifications
                @if(isset($unreadNotifications) && $unreadNotifications > 0)
                <span class="ml-auto bg-sun text-white text-xs font-bold px-2 py-1 rounded-full">{{ $unreadNotifications }}</span>
                @endif
            </a>
        </div>

        <!-- My Reports Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-dark-blue/60 uppercase tracking-wider">My Reports</h3>

            <!-- Report New Issue -->
            <a href="{{ route('report.car.issue') }}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
               {{ Route::currentRouteName() === 'report.car.issue' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4" />
                </svg>
                Report New Issue
            </a>

            <!-- My Reported Issues -->
            <a href="{{ route('user.reported.car.issues') }}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
               {{ in_array(Route::currentRouteName(), ['user.reported.car.issues', 'user.report.details']) ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                My Reported Issues
            </a>
        </div>

        <!-- Services Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-dark-blue/60 uppercase tracking-wider">Services</h3>
            
            <!-- Find Specialists -->
            <a href="{{ route('specialists.index') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialists.index' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Find Specialists
            </a>

            <!-- My Quotes -->
            <a href="{{ route('quotes.index') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'quotes.index' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                My Quotes
            </a>

            <!-- My Bookings -->
            <a href="{{ route('bookings.index') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'bookings.index' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                My Bookings
            </a>

            <!-- My Reviews -->
            <a href="{{ route('reviews.index') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'reviews.index' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                My Reviews
            </a>
        </div>

        <!-- Account Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-dark-blue/60 uppercase tracking-wider">Account</h3>
            
            <!-- Profile -->
            <a href="{{ route('profile') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'profile' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Profile
            </a>

            <!-- Settings -->
            <a href="{{ route('settings') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'settings' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Settings
            </a>
        </div>

        <!-- Support Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-dark-blue/60 uppercase tracking-wider">Support</h3>
            
            <!-- Help & FAQ -->
            <a href="{{ route('help') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'help' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Help & FAQ
            </a>

            <!-- Contact -->
            <a href="{{ route('contact') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'contact' ? 'bg-gradient-to-r from-sky-blue to-baby-blue text-white' : 'text-dark-blue hover:bg-baby-blue/10' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact Us
            </a>
        </div>

    </nav>

    <!-- Logout Button -->
    <div class="p-4 border-t border-gray-200 flex-shrink-0">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-3 text-sm font-medium text-sun hover:bg-sun/10 rounded-lg group transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>

{{-- <script>
// Mobile sidebar toggle
const sidebar = document.getElementById('sidebar');
const closeSidebarBtn = document.getElementById('close-sidebar');
const openSidebarBtn = document.getElementById('open-sidebar'); // Add this button to your mobile navbar

closeSidebarBtn?.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
});

openSidebarBtn?.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
});

// Close sidebar when clicking outside on mobile
document.addEventListener('click', (e) => {
    if (window.innerWidth < 1024) {
        if (!sidebar.contains(e.target) && !openSidebarBtn?.contains(e.target)) {
            sidebar.classList.add('-translate-x-full');
        }
    }
});
</script> --}}