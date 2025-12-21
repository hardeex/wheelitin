<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200 flex-shrink-0">
        <a href="{{ route('index') }}" class="flex items-center space-x-2">
            <span class="text-xl font-bold text-gray-900">Wheelitin</span>
            <span class="text-xs font-semibold text-purple-600 bg-purple-100 px-2 py-1 rounded">Specialist</span>
        </a>
        <!-- Close button for mobile -->
        <button id="close-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- Specialist Profile Section -->
    <div class="p-6 border-b border-gray-200 flex-shrink-0">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-indigo-500 rounded-full flex items-center justify-center">
                <span class="text-white text-lg font-bold">
                    {{ strtoupper(($user['first_name'][0] ?? '') . ($user['last_name'][0] ?? '')) ?: 'SP' }}
                </span>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">{{ $user['first_name'] ?? '' }} {{ $user['last_name'] ?? '' }}</p>
                <p class="text-xs text-gray-500 truncate">{{ $user['email'] ?? '' }}</p>
                <span class="inline-flex items-center text-xs text-purple-600 font-medium mt-1">
                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @if(isset($user['rating']))
                        {{ number_format($user['rating'], 1) }}
                    @else
                        New
                    @endif
                </span>
            </div>
        </div>
    </div>

    <!-- Navigation - Scrollable -->
    <nav class="flex-1 px-4 py-6 space-y-6 overflow-y-auto">
        
        <!-- Main Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</h3>


               <!-- Home -->
            <a href="{{ route('index') }}" target="_blank"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'index' ? 'bg-gradient-to-r from-green-600 to-green-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Home
            </a>
            
            <!-- Dashboard -->
            <a href="{{ route('specialist.dashboard') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.dashboard' ? 'bg-gradient-to-r from-purple-600 to-purple-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Dashboard
            </a>

            <!-- Notifications -->
            <a href="{{ route('notifications') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'notifications' ? 'bg-gradient-to-r from-yellow-600 to-yellow-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                Notifications
                @if(isset($unreadNotifications) && $unreadNotifications > 0)
                <span class="ml-auto bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $unreadNotifications }}</span>
                @endif
            </a>
        </div>

        <!-- Jobs & Reports Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Jobs & Reports</h3>

            <!-- Available Reports -->
            <a href="{{ route('specialist.reports') }}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
               {{ Route::currentRouteName() === 'specialist.reports' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                Available Reports
                @if(isset($availableReportsCount) && $availableReportsCount > 0)
                <span class="ml-auto bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $availableReportsCount }}</span>
                @endif
            </a>

            <!-- My Jobs -->
            {{-- <a href="{{ route('specialist.jobs') }}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
               {{ Route::currentRouteName() === 'specialist.jobs' ? 'bg-gradient-to-r from-indigo-600 to-indigo-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                My Active Jobs
                @if(isset($activeJobsCount) && $activeJobsCount > 0)
                <span class="ml-auto bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">{{ $activeJobsCount }}</span>
                @endif
            </a> --}}

            <!-- My Quotations -->
            <a href="{{route('quotations')}}"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
               {{ Route::currentRouteName() === 'specialist.quotations' ? 'bg-gradient-to-r from-cyan-600 to-cyan-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                My Quotations 
            </a>

            <!-- Job History -->
            <a href="#"
               class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
               {{ Route::currentRouteName() === 'specialist.history' ? 'bg-gradient-to-r from-gray-600 to-gray-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Job History
            </a>
        </div>

        <!-- Earnings Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Earnings</h3>
            
            <!-- My Earnings -->
            <a href="{{ route('specialist.earnings') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.earnings' ? 'bg-gradient-to-r from-green-600 to-green-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                My Earnings
                @if(isset($totalEarnings))
                <span class="ml-auto text-xs font-semibold text-green-600">£{{ number_format($totalEarnings, 2) }}</span>
                @endif
            </a>

            <!-- Payment History -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.payments' ? 'bg-gradient-to-r from-emerald-600 to-emerald-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                </svg>
                Payment History
            </a>

            <!-- Invoices -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.invoices' ? 'bg-gradient-to-r from-teal-600 to-teal-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Invoices
            </a>
        </div>

        <!-- Performance Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Performance</h3>
            
            <!-- Reviews & Ratings -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.reviews' ? 'bg-gradient-to-r from-amber-600 to-amber-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                Reviews & Ratings
                @if(isset($user['rating']))
                <span class="ml-auto text-xs font-semibold text-amber-600">{{ number_format($user['rating'], 1) }} ★</span>
                @endif
            </a>

            <!-- Statistics -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.stats' ? 'bg-gradient-to-r from-pink-600 to-pink-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
                Statistics
            </a>
        </div>

        <!-- Business Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Business</h3>
            
            <!-- My Services -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.services' ? 'bg-gradient-to-r from-violet-600 to-violet-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                My Services
            </a>

            <!-- Service Areas -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.areas' ? 'bg-gradient-to-r from-rose-600 to-rose-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                Service Areas
            </a>

            <!-- Availability -->
            <a href="#"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'specialist.availability' ? 'bg-gradient-to-r from-orange-600 to-orange-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Availability
            </a>
        </div>

        <!-- Account Section -->
        <div>
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Account</h3>
            
            <!-- Profile -->
            <a href="{{ route('profile') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'profile' ? 'bg-gradient-to-r from-slate-600 to-slate-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Profile
            </a>

            <!-- Settings -->
            <a href="{{ route('settings') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'settings' ? 'bg-gradient-to-r from-gray-600 to-gray-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
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
            <h3 class="px-4 mb-2 text-xs font-semibold text-gray-400 uppercase tracking-wider">Support</h3>
            
            <!-- Help & FAQ -->
            <a href="{{ route('help') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'help' ? 'bg-gradient-to-r from-sky-600 to-sky-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Help & FAQ
            </a>

            <!-- Contact Support -->
            <a href="{{ route('contact') }}"
                class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
                {{ Route::currentRouteName() === 'contact' ? 'bg-gradient-to-r from-teal-600 to-teal-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Contact Support
            </a>
        </div>

    </nav>

    <!-- Logout Button -->
    <div class="p-4 border-t border-gray-200 flex-shrink-0">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-3 text-sm font-medium text-red-600 hover:bg-red-50 rounded-lg group transition-colors">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
{{-- 
<script>
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