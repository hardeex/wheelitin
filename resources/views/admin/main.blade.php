   <!-- Header -->
        <div class="mb-8 {{ session('success') ? '' : 'mt-16 lg:mt-0' }}">
            <h1 class="font-display text-4xl lg:text-5xl font-bold text-slate-900 mb-2">Welcome back, {{ Session::get('user.first_name', 'Traveler') }}!</h1>
            <p class="text-slate-600 text-lg">Here's what's happening on your website</p>
        </div>


        