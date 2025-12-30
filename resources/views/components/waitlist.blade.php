<section class="relative overflow-hidden min-h-screen flex items-center justify-center bg-[var(--color-dark-blue)]">

        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-20 h-20 bg-[var(--color-orange)] rounded-full opacity-20 animate-float">
            </div>
            <div
                class="absolute top-40 right-20 w-16 h-16 bg-[var(--color-sky-blue)] rounded-full opacity-20 animate-float-delayed">
            </div>
            <div
                class="absolute bottom-20 left-1/4 w-24 h-24 bg-[var(--color-baby-blue)] rounded-full opacity-20 animate-float-slow">
            </div>
            <div
                class="absolute top-1/3 right-1/3 w-32 h-32 bg-[var(--color-sky-blue)] rounded-full opacity-10 animate-float">
            </div>
            <div
                class="absolute bottom-40 right-10 w-20 h-20 bg-[var(--color-orange)] rounded-full opacity-15 animate-float-delayed">
            </div>
        </div>

        <style>
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-20px);
                }
            }

            @keyframes float-delayed {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-30px);
                }
            }

            @keyframes float-slow {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-15px);
                }
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-float-delayed {
                animation: float-delayed 8s ease-in-out infinite;
            }

            .animate-float-slow {
                animation: float-slow 10s ease-in-out infinite;
            }
        </style>

        <div class="relative z-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Left Side - Content -->
                <div class="text-white space-y-6" data-aos="fade-right" data-aos-duration="1000">


                    <!-- Main Heading -->
                    <h1 class="font-display text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight"
                        data-aos="fade-up" data-aos-delay="300">
                        Be the First to
                        <span class="block text-[var(--color-orange)]">Experience Wheelitin</span>
                    </h1>

                    <!-- Subheading -->
                    <p class="text-lg sm:text-xl text-white/90 max-w-xl" data-aos="fade-up" data-aos-delay="400">
                        Join thousands of car owners and mechanics revolutionizing auto repair. Get exclusive early access,
                        special discounts, and be part of something amazing.
                    </p>

                    <!-- Benefits List for Car Owners -->
                    <div class="space-y-4 pt-4" data-aos="fade-up" data-aos-delay="500" id="ownerBenefits">
                        <h3 class="text-xl font-bold mb-3 text-[var(--color-orange)]">For Car Owners:</h3>
                        <div class="flex items-start space-x-3 group">
                            <div
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-[var(--color-orange)] flex items-center justify-center mt-1 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-[var(--color-dark-blue)]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-white/90 group-hover:text-white transition-colors">Early access to our platform
                            </p>
                        </div>
                        <div class="flex items-start space-x-3 group">
                            <div
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-[var(--color-orange)] flex items-center justify-center mt-1 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-[var(--color-dark-blue)]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-white/90 group-hover:text-white transition-colors">Hire a temp car from £5 an
                                hour</p>
                        </div>
                        <div class="flex items-start space-x-3 group">
                            <div
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-[var(--color-orange)] flex items-center justify-center mt-1 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-[var(--color-dark-blue)]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-white/90 group-hover:text-white transition-colors">Connect with certified
                                mechanics</p>
                        </div>
                    </div>

                    <!-- Benefits List for Mechanics (Hidden by default) -->
                    <div class="space-y-4 pt-4 hidden" data-aos="fade-up" data-aos-delay="500" id="mechanicBenefits">
                        <h3 class="text-xl font-bold mb-3 text-[var(--color-orange)]">For Mechanics & Service Providers:
                        </h3>
                        <div class="flex items-start space-x-3 group">
                            <div
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-[var(--color-orange)] flex items-center justify-center mt-1 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-[var(--color-dark-blue)]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-white/90 group-hover:text-white transition-colors">Get more customers instantly
                            </p>
                        </div>
                        <div class="flex items-start space-x-3 group">
                            <div
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-[var(--color-orange)] flex items-center justify-center mt-1 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-[var(--color-dark-blue)]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            {{-- <p class="text-white/90 group-hover:text-white transition-colors">Zero commission for first 6
                                months</p> --}}
                        </div>
                        <div class="flex items-start space-x-3 group">
                            <div
                                class="flex-shrink-0 w-6 h-6 rounded-full bg-[var(--color-orange)] flex items-center justify-center mt-1 group-hover:scale-110 transition-transform">
                                <svg class="w-4 h-4 text-[var(--color-dark-blue)]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <p class="text-white/90 group-hover:text-white transition-colors">Free business profile &
                                marketing tools</p>
                        </div>
                    </div>


                </div>

                <!-- Right Side - Form -->
                <div class="relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="300">

                    <!-- Form Card -->
                    <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10 relative overflow-hidden">

                        <!-- Decorative Elements -->
                        <div
                            class="absolute top-0 right-0 w-40 h-40 bg-[var(--color-baby-blue)] rounded-full -mr-20 -mt-20 opacity-50">
                        </div>
                        <div
                            class="absolute bottom-0 left-0 w-32 h-32 bg-[var(--color-sky-blue)] rounded-full -ml-16 -mb-16 opacity-50">
                        </div>

                        @include('feedback')



                        <div class="relative z-10">
                            <!-- Form Header -->
                            <div class="text-center mb-8">
                                <div
                                    class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4 bg-[var(--color-dark-blue)]">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Join the Waitlist</h2>
                                <p class="text-gray-600">
                                    Secure your spot in just 30 seconds
                                </p>
                            </div>


                            <!-- Form -->
                            <form class="space-y-5" method="POST" action="{{ route('send.waitlist.data') }}">
                                @csrf

                                <!-- User Type Selection -->
                                <div class="relative">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">I am a <span
                                            class="text-red-500">*</span></label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <label
                                            class="relative flex items-center justify-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-[var(--color-sky-blue)] has-[:checked]:border-[var(--color-sky-blue)] has-[:checked]:bg-[var(--color-baby-blue)]/20 group">
                                            <input type="radio" name="userType" value="user" class="sr-only peer"
                                                required onchange="toggleWaitlistFields()">
                                            <div class="text-center">
                                                <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 group-has-[:checked]:text-[var(--color-sky-blue)]"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                                <span
                                                    class="text-sm font-semibold text-gray-700 group-has-[:checked]:text-[var(--color-sky-blue)]">Car
                                                    Owner</span>
                                            </div>
                                        </label>
                                        <label
                                            class="relative flex items-center justify-center p-4 border-2 border-gray-200 rounded-xl cursor-pointer transition-all hover:border-[var(--color-sky-blue)] has-[:checked]:border-[var(--color-sky-blue)] has-[:checked]:bg-[var(--color-baby-blue)]/20 group">
                                            <input type="radio" name="userType" value="specialist"
                                                class="sr-only peer" required onchange="toggleWaitlistFields()">
                                            <div class="text-center">
                                                <svg class="w-8 h-8 mx-auto mb-2 text-gray-400 group-has-[:checked]:text-[var(--color-sky-blue)]"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <span
                                                    class="text-sm font-semibold text-gray-700 group-has-[:checked]:text-[var(--color-sky-blue)]">Specialist</span>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Name Fields (For Car Owner) -->
                                <div id="userNameFields">
                                    <!-- First Name Input -->
                                    <div class="relative mb-5">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">First Name</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <input type="text" id="firstName" name="firstName" placeholder="John"
                                                class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-[var(--color-sky-blue)] focus:outline-none transition-all duration-300 hover:border-gray-300" />
                                        </div>
                                    </div>

                                    <!-- Last Name Input -->
                                    <div class="relative">
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">Last Name</label>
                                        <div class="relative">
                                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                    </path>
                                                </svg>
                                            </span>
                                            <input type="text" id="lastName" name="lastName" placeholder="Doe"
                                                class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-[var(--color-sky-blue)] focus:outline-none transition-all duration-300 hover:border-gray-300" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Business Name Field (For Specialist) -->
                                <div id="businessNameField" class="relative hidden">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Business Name</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="text" id="businessName" name="businessName" placeholder="ABC Auto Repairs Ltd"
                                            class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-[var(--color-sky-blue)] focus:outline-none transition-all duration-300 hover:border-gray-300" />
                                    </div>
                                </div>

                                <!-- Email Input (REQUIRED) -->
                                <div class="relative">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address <span
                                            class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="email" name="email" placeholder="john@example.com"
                                            class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-[var(--color-sky-blue)] focus:outline-none transition-all duration-300 hover:border-gray-300"
                                            required />
                                    </div>
                                </div>

                                <!-- Phone Input (Optional) -->
                                <div class="relative">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number</label>
                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                                </path>
                                            </svg>
                                        </span>
                                        <input type="tel" name="phoneNumber" placeholder="+44 1234 567"
                                            class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl focus:border-[var(--color-sky-blue)] focus:outline-none transition-all duration-300 hover:border-gray-300" />
                                    </div>
                                </div>

                                <!-- address -->
                                <div class="relative">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                                        Address <span class="text-gray-400 text-xs">(Optional)</span>
                                    </label>

                                    <div class="relative">
                                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </span>

                                        <input type="text" name="address"
                                            placeholder="e.g. London, Manchester, Birmingham, SW1A 1AA"
                                            class="w-full pl-12 pr-4 py-3.5 border-2 border-gray-200 rounded-xl
                   focus:border-[var(--color-sky-blue)] focus:outline-none
                   transition-all duration-300 hover:border-gray-300 bg-white" />
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                    class="w-full py-4 rounded-xl font-bold text-white text-lg transition-all duration-300 hover:scale-105 hover:shadow-2xl active:scale-95 relative overflow-hidden group bg-[var(--color-dark-blue)]">
                                    <span class="relative z-10">Join the Waitlist Now</span>
                                    <div
                                        class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                                    </div>
                                </button>

                                <!-- Privacy Notice -->
                                <p class="text-xs text-center text-gray-500 mt-4">
                                    By joining, you agree to receive updates about Wheelitin.
                                    <a href="#" class="text-[var(--color-sky-blue)] hover:underline">Privacy
                                        Policy</a>
                                </p>
                            </form>

                            <!-- Success Message (Hidden by default) -->
                            <div id="successMessage" class="hidden text-center space-y-4">
                                <div
                                    class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-green-100 mb-4">
                                    <svg class="w-10 h-10 text-green-500" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900">You're on the list! 🎉</h3>
                                <p class="text-gray-600" id="successMessageText">
                                    We'll send you an email with your confirmation and next steps.
                                </p>
                                <button onclick="resetForm()"
                                    class="text-[var(--color-sky-blue)] hover:text-[var(--color-dark-blue)] font-semibold">
                                    Add another person
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <script>
            // Toggle between name fields based on user type
            function toggleWaitlistFields() {
                const userType = document.querySelector('input[name="userType"]:checked').value;
                const userNameFields = document.getElementById('userNameFields');
                const businessNameField = document.getElementById('businessNameField');
                const ownerBenefits = document.getElementById('ownerBenefits');
                const mechanicBenefits = document.getElementById('mechanicBenefits');
                
                if (userType === 'specialist') {
                    userNameFields.classList.add('hidden');
                    businessNameField.classList.remove('hidden');
                    ownerBenefits.classList.add('hidden');
                    mechanicBenefits.classList.remove('hidden');
                } else {
                    userNameFields.classList.remove('hidden');
                    businessNameField.classList.add('hidden');
                    ownerBenefits.classList.remove('hidden');
                    mechanicBenefits.classList.add('hidden');
                }
            }

            // Initialize the correct fields on page load
            document.addEventListener('DOMContentLoaded', function() {
                // Set default to car owner if nothing is selected
                const checkedRadio = document.querySelector('input[name="userType"]:checked');
                if (!checkedRadio) {
                    document.querySelector('input[name="userType"][value="user"]').checked = true;
                }
                toggleWaitlistFields();
            });
        </script>
    </section>