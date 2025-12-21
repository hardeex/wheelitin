@extends('components.base')

@section('title', 'Register')

@section('content')
    <!-- Hero Section with Background -->
    <div class="relative min-h-screen bg-gradient-to-br from-baby-blue/20 via-background to-orange/20">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-5">
            <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920&q=80" alt="Background"
                class="w-full h-full object-cover">
        </div>

        <!-- Decorative Blobs -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-baby-blue rounded-full blur-3xl opacity-20 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange rounded-full blur-3xl opacity-15 animate-pulse" style="animation-delay: 1s;"></div>

        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
            <div class="grid lg:grid-cols-2 gap-12 items-center">

                <!-- Left Side - Benefits Section -->
                <div class="hidden lg:block space-y-8">
                    <div class="space-y-4">
                        <div class="inline-flex items-center gap-2 mb-4">
                            <div class="w-8 h-px bg-sun"></div>
                            <span class="text-sm uppercase tracking-widest text-sky-blue font-semibold">Join Wheelitin</span>
                        </div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-dark-blue leading-tight font-display">
                            Fast, Reliable<br>
                            <span class="text-sky-blue">Auto Repair Near You</span>
                        </h1>
                        <p class="text-lg sm:text-xl text-dark-blue/80 font-medium">
                            Wheelitin connects UK car owners with trusted mechanics for repairs, servicing, and custom work—all in one easy-to-use platform.
                        </p>
                    </div>

                    <!-- Benefits Grid -->
                    <div class="grid sm:grid-cols-2 gap-4">
                        <div class="bg-white p-6 rounded-xl shadow-sm border border-baby-blue hover:shadow-md hover:border-sky-blue transition-all duration-200">
                            <div class="w-12 h-12 bg-baby-blue/20 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-home text-sky-blue text-xl"></i>
                            </div>
                            <h3 class="font-bold text-dark-blue mb-2">Verified Garages</h3>
                            <p class="text-sm text-dark-blue/70">Find trusted local garages and mobile mechanics near you.</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border border-baby-blue hover:shadow-md hover:border-sky-blue transition-all duration-200">
                            <div class="w-12 h-12 bg-baby-blue/20 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-chart-bar text-sky-blue text-xl"></i>
                            </div>
                            <h3 class="font-bold text-dark-blue mb-2">Instant Quotes</h3>
                            <p class="text-sm text-dark-blue/70">Compare prices from multiple providers and book with confidence.</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border border-baby-blue hover:shadow-md hover:border-sky-blue transition-all duration-200">
                            <div class="w-12 h-12 bg-baby-blue/20 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-users text-sky-blue text-xl"></i>
                            </div>
                            <h3 class="font-bold text-dark-blue mb-2">Expert Network</h3>
                            <p class="text-sm text-dark-blue/70">Work with certified technicians for repairs, servicing, or upgrades.</p>
                        </div>

                        <div class="bg-white p-6 rounded-xl shadow-sm border border-baby-blue hover:shadow-md hover:border-sky-blue transition-all duration-200">
                            <div class="w-12 h-12 bg-baby-blue/20 rounded-lg flex items-center justify-center mb-4">
                                <i class="fas fa-clipboard-check text-sky-blue text-xl"></i>
                            </div>
                            <h3 class="font-bold text-dark-blue mb-2">Service Records</h3>
                            <p class="text-sm text-dark-blue/70">Track all your vehicle history, quotes, and documents in one place.</p>
                        </div>
                    </div>

                    <!-- Trust Badges -->
                    <div class="flex flex-wrap items-center gap-6 pt-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-sky-blue"></i>
                            <span class="text-sm font-medium text-dark-blue">Free to use</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-sky-blue"></i>
                            <span class="text-sm font-medium text-dark-blue">Instant setup</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-check-circle text-sky-blue"></i>
                            <span class="text-sm font-medium text-dark-blue">24/7 UK Support</span>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Registration Form -->
                <div class="w-full">
                    <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 lg:p-10 border-2 border-baby-blue/30">
                        <div class="mb-8">
                            <h2 class="text-2xl sm:text-3xl font-bold text-dark-blue mb-2 font-display">Create Your Account</h2>
                            <p class="text-dark-blue/70">Join thousands of satisfied users today</p>
                        </div>

                        @include('feedback')

                        <form action="{{ route('register.submit') }}" method="POST" class="space-y-6">
                            @csrf

                            <!-- Account Type Selection -->
                            <div>
                                <label class="block text-sm font-bold text-dark-blue mb-3">I am registering as</label>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <!-- User Option -->
                                    <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all duration-200 hover:border-sky-blue {{ old('user_type', 'user') == 'user' ? 'border-sky-blue bg-baby-blue/10' : 'border-gray-300 bg-white' }}">
                                        <input type="radio" name="user_type" value="user" 
                                            class="w-4 h-4 text-sky-blue border-gray-300 focus:ring-sky-blue" 
                                            {{ old('user_type', 'user') == 'user' ? 'checked' : '' }}>
                                        <div class="ml-3">
                                            <span class="block text-sm font-bold text-dark-blue">Car Owner</span>
                                            <span class="block text-xs text-dark-blue/60 mt-1">Looking for repair services</span>
                                        </div>
                                    </label>

                                    <!-- Specialist Option -->
                                    <label class="relative flex items-center p-4 border-2 rounded-xl cursor-pointer transition-all duration-200 hover:border-sky-blue {{ old('user_type') == 'specialist' ? 'border-sky-blue bg-baby-blue/10' : 'border-gray-300 bg-white' }}">
                                        <input type="radio" name="user_type" value="specialist" 
                                            class="w-4 h-4 text-sky-blue border-gray-300 focus:ring-sky-blue"
                                            {{ old('user_type') == 'specialist' ? 'checked' : '' }}>
                                        <div class="ml-3">
                                            <span class="block text-sm font-bold text-dark-blue">Mechanic</span>
                                            <span class="block text-xs text-dark-blue/60 mt-1">Offering repair services</span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- First Name and Last Name -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block text-sm font-bold text-dark-blue mb-2">First Name</label>
                                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                        placeholder="John">
                                </div>
                                <div>
                                    <label for="last_name" class="block text-sm font-bold text-dark-blue mb-2">Last Name</label>
                                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                                        required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                        placeholder="Doe">
                                </div>
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label for="email" class="block text-sm font-bold text-dark-blue mb-2">Email Address</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-envelope text-gray-400"></i>
                                    </div>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                        placeholder="john@example.com">
                                </div>
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone" class="block text-sm font-bold text-dark-blue mb-2">Phone Number</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-phone text-gray-400"></i>
                                    </div>
                                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                        placeholder="44123567">
                                </div>
                                <p class="text-xs text-dark-blue/60 mt-1">Enter your UK phone number</p>
                            </div>

                            <!-- Address -->
                            <div>
                                <label for="address" class="block text-sm font-bold text-dark-blue mb-2">Address</label>
                                <input type="text" id="address" name="address" value="{{ old('address') }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                    placeholder="Buckingham Palace, London, SW1A 1AA, United Kingdom">
                            </div>

                            <!-- Post Code -->
                            <div>
                                <label for="postCodes" class="block text-sm font-bold text-dark-blue mb-2">Post Code</label>
                                <input type="text" id="postCodes" name="postCodes" value="{{ old('postCodes') }}" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                    placeholder="SW1A 1AA">
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm font-bold text-dark-blue mb-2">Password</label>
                                <div class="relative">
                                    <input type="password" id="password" name="password" required
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-sky-blue focus:border-sky-blue transition-all duration-200 text-dark-blue"
                                        placeholder="••••••••">
                                    <button type="button" onclick="togglePasswordVisibility('password')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                        <i class="fas fa-eye text-gray-400 hover:text-gray-600"></i>
                                    </button>
                                </div>
                                <p class="text-xs text-dark-blue/60 mt-1">Minimum 8 characters</p>
                            </div>

                            <!-- Terms -->
                            <div class="flex items-start">
                                <input type="checkbox" id="terms" name="terms" required
                                    class="mt-1 w-4 h-4 text-sky-blue border-gray-300 rounded focus:ring-sky-blue">
                                <label for="terms" class="ml-2 text-sm text-dark-blue/70">
                                    I agree to the <a href="{{route('terms')}}" class="text-sky-blue hover:text-dark-blue font-semibold underline">Terms of Service</a> and 
                                    <a href="{{route('privacy')}}" class="text-sky-blue hover:text-dark-blue font-semibold underline">Privacy Policy</a>
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-sun to-orange text-white py-4 px-6 rounded-lg font-bold hover:from-orange hover:to-sun focus:outline-none focus:ring-4 focus:ring-orange/50 transform hover:scale-[1.02] transition-all duration-200 shadow-lg">
                                Create Account
                            </button>

                            <!-- Login Link -->
                            <p class="text-center text-sm text-dark-blue/70">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-sky-blue hover:text-dark-blue font-bold">Sign in</a>
                            </p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Toggle password visibility
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling.querySelector('i');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>

@endsection