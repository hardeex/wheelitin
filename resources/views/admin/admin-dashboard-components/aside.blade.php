<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Logo -->
    <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
        <a href="{{ route('index') }}" class="flex items-center space-x-2">

            <span class="text-xl font-bold text-gray-900">Admin Dashboard</span>
        </a>
        <!-- Close button for mobile -->
        <button id="close-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- User Profile Section -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div
                class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
               <span class="text-white text-lg font-bold">
    {{ strtoupper(
        ($user['first_name'][0] ?? '') . ($user['last_name'][0] ?? '')
    ) ?: 'NA' }}
</span>


            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate"> {{ $user['first_name'] ?? '' }}
                    {{ $user['last_name'] ?? '' }} </p>
                <p class="text-xs text-gray-500 truncate"> {{ $user['email'] ?? '' }} </p>
            </div>
        </div>

    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">

               <!-- Home -->
<a href="{{ route('index') }}"
    class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
    {{ Route::currentRouteName() === 'index' ? 'bg-gradient-to-r from-green-600 to-green-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7m-2 2v7a2 2 0 01-2 2h-3a2 2 0 01-2-2v-7" />
    </svg>
    Home
</a>


        <!-- Dashboard -->
        <a href="#"
   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
   {{ Route::currentRouteName() === 'user.dashboard' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
   <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <!-- Dashboard icon: a grid -->
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h4v4H4V6zM4 14h4v4H4v-4zM10 6h4v4h-4V6zM10 14h4v4h-4v-4zM16 6h4v4h-4V6zM16 14h4v4h-4v-4z" />
    </svg>
    Dashboard
</a>


<a href="#"
   class="flex items-center px-4 py-3 text-sm font-medium rounded-lg group
   {{ Route::currentRouteName() === 'create.profile' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
    <svg class="w-5 h-5 mr-3 {{ Route::currentRouteName() === 'create.profile' ? 'text-white' : 'text-gray-500 group-hover:text-blue-600' }}"
         fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M5.121 17.804A4 4 0 0112 14a4 4 0 016.879 3.804M15 11a3 3 0 11-6 0 3 3 0 016 0zM12 14v7" />
    </svg>
    Create Profile
</a>



        <!-- Commissions -->
        <a href="#"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg group">
            <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                </path>
            </svg>
            Commissions
        </a>

        <!-- Referrals -->
        <a href="#"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg group">
            <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            Referrals
        </a>

        <!-- Tasks -->
        <a href="#"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg group">
            <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4">
                </path>
            </svg>
            Tasks
        </a>

        <!-- Analytics -->
        <a href="#"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg group">
            <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                </path>
            </svg>
            Analytics
        </a>



        <a href="{{route('profile')}}"
   class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg group">
   <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor" 
        viewBox="0 0 24 24">
       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
             d="M5.121 17.804A13.937 13.937 0 0112 15c2.48 0 4.78.753 6.879 2.04M15 11a3 3 0 11-6 0 3 3 0 016 0zM19.071 4.929a9 9 0 11-14.142 0 9 9 0 0114.142 0z" />
   </svg>
   Profile
</a>

        <!-- Settings -->
        <a href="#"
            class="flex items-center px-4 py-3 text-sm font-medium text-gray-700 hover:bg-gray-100 rounded-lg group">
            <svg class="w-5 h-5 mr-3 text-gray-500 group-hover:text-blue-600" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            Settings
        </a>
    </nav>

    <!-- Logout Button -->
    <div class="p-4 border-t border-gray-200">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-3 text-sm font-medium text-blue-600 hover:bg-blue-50 rounded-lg group">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                    </path>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>
