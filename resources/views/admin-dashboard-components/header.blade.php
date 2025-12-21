 <header class="bg-white shadow-sm sticky top-0 z-30">
     <div class="flex items-center justify-between h-16 px-4 sm:px-6 lg:px-8">
         <!-- Mobile Menu Button -->
         <button id="open-sidebar" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
             <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
             </svg>
         </button>

         <!-- Page Title -->
         <h1 class="text-xl font-bold text-gray-900">@yield('header', 'Dashboard')</h1>

         <!-- Right Side Actions -->
         <div class="flex items-center space-x-4">
             <!-- Notifications -->
             <button class="relative p-2 text-gray-500 hover:text-gray-700 hover:bg-gray-100 rounded-lg">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                     </path>
                 </svg>
                 <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
             </button>

             <!-- User Avatar (Mobile) -->
             <div
                 class="lg:hidden w-8 h-8 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center">
                 <span class="text-white text-sm font-bold">JD</span>
             </div>
         </div>
     </div>
 </header>
