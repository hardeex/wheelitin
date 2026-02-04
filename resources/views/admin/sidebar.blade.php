<aside id="sidebar"
    class="fixed left-0 top-0 h-full w-72 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 text-white
           transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out
           z-40 shadow-2xl">

    {{-- User Info --}}
    <div class="p-6 border-b border-slate-700/50">
        <div class="flex items-center space-x-3">
            <div
                class="w-12 h-12 rounded-full bg-gradient-to-br from-amber-400 to-orange-500
                       flex items-center justify-center text-white font-bold text-xl shadow-lg">
                {{ strtoupper(substr(Session::get('user.first_name', 'U'), 0, 1)) }}
            </div>
            <div>
                <h2 class="font-semibold text-lg">
                    {{ Session::get('user.first_name', '') }}
                    {{ Session::get('user.last_name', '') }}
                </h2>
                <p class="text-slate-400 text-sm">
                    {{ Session::get('user.email', '') }}
                </p>
            </div>
        </div>
    </div>

    {{-- Navigation --}}
    <nav class="p-4 space-y-1">

        {{-- Dashboard --}}
        <a href="{{ route('admin.dashboard') }}"
           @class([
               'flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition-all duration-200',
               'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md'
                    => Route::currentRouteName() === 'admin.dashboard',
               'text-slate-300 hover:bg-slate-800/50 hover:text-white'
                    => Route::currentRouteName() !== 'admin.dashboard',
           ])>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3"/>
            </svg>
            <span>Dashboard</span>
        </a>

        {{-- Waitlist --}}
        <a href="{{ route('admin.waitlist') }}"
           @class([
               'flex items-center space-x-3 px-4 py-3 rounded-lg font-medium transition-all duration-200',
               'bg-gradient-to-r from-amber-500 to-orange-500 text-white shadow-md'
                    => Route::currentRouteName() === 'admin.waitlist',
               'text-slate-300 hover:bg-slate-800/50 hover:text-white'
                    => Route::currentRouteName() !== 'admin.waitlist',
           ])>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
            <span>Manage Waitlist</span>
        </a>

    </nav>

    {{-- Logout --}}
    <div class="absolute bottom-0 w-full p-4 border-t border-slate-700/50">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center space-x-2 px-4 py-3 rounded-lg
                       bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white
                       transition-all duration-200 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>
