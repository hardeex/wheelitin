<!-- Hero Section -->
<section class="relative overflow-hidden"
    style="background: linear-gradient(180deg, #FDF3DA 28%, #8ECAE6 50%, #219EBC 100%);">
    
    <style>
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-down {
            animation: fadeInDown 0.8s ease-out forwards;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
            opacity: 0;
        }
    </style>
    
    <div class="h-[520px] sm:h-[560px] md:h-[650px] lg:h-[722px] w-full max-w-[1440px] mx-auto px-4 sm:px-6 relative">
        <!-- Car Icon - Top Left -->
        <div class="absolute top-4 left-3 sm:top-12 sm:left-8 md:top-20 md:left-16 lg:top-[180px] lg:left-[140px] z-20">
            <img src="{{ asset('images/car-icon.gif') }}" alt="Car Icon"
                class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-auto lg:h-50">
        </div>

        <!-- Main Content - Centered -->
        <div class="flex flex-col items-center justify-start pt-16 sm:pt-20 md:pt-24 lg:pt-16 xl:pt-20">
            <!-- Headline -->
            <h1
                class="font-display font-bold text-[34px] xs:text-[38px] sm:text-[44px] md:text-[50px] lg:text-[56px] xl:text-[60px] leading-[1.1] sm:leading-[1.05] tracking-[0.02em] text-[var(--color-dark-blue)] text-center mb-4 sm:mb-4 md:mb-4 lg:mb-3 px-2 animate-fade-in-down max-w-[95%] sm:max-w-4xl">
                <span class="block">Book Trusted Local Mechanics In Minutes</span>
            </h1>

            <!-- Subheading -->
            <p class="text-[var(--color-dark-blue)] font-medium text-center mb-5 sm:mb-6 md:mb-6 lg:mb-5 px-4 text-[15px] xs:text-[16px] sm:text-[18px] md:text-[19px] lg:text-[20px] max-w-[90%] sm:max-w-2xl animate-fade-in"
                style="font-family: 'Poppins', sans-serif; animation-delay: 0.2s;">
                Hassle-free car repairs, upgrades and custom work.
            </p>

            <!-- CTA Button -->
            <a href="{{ route('join.waitlist') }}"
                class="font-display relative z-50 bg-[var(--color-dark-blue)] text-white px-9 sm:px-10 md:px-12 py-3 sm:py-3 md:py-4 rounded-full font-semibold hover:bg-opacity-90 hover:scale-105 transition-all duration-300 text-[15px] sm:text-[16px] md:text-[18px] shadow-lg animate-fade-in-up"
                style="animation-delay: 0.4s;">
                Join Waitlist
            </a>
        </div>

        <!-- Phone/Map Icon - Top Right -->
        <div class="absolute top-4 right-3 sm:top-12 sm:right-6 md:top-16 md:right-8 lg:top-[140px] lg:right-[30px] z-30">
            <img src="{{ asset('images/map.gif') }}" alt="Map"
                class="w-14 h-14 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-auto lg:h-50">
        </div>

        <!-- Bottom Illustration - Cars and Mechanic SIDE BY SIDE WITH SAME BASELINE -->
        <div class="absolute bottom-0 left-0 right-0 flex items-end justify-center pointer-events-none pb-0">
            <div class="flex items-end justify-center gap-4 sm:gap-8 md:gap-12 lg:gap-16 xl:gap-20 w-full max-w-[1200px] px-4">
                
                <!-- Left Side: Person Pushing Car -->
                <div class="flex-shrink-0 z-10 flex items-end">
                    <img src="{{ asset('images/car.kra-autosave.GIF') }}" alt="Cars"
                        class="w-[280px] sm:w-[400px] md:w-[520px] lg:w-[680px] xl:w-[680px] h-auto">
                </div>

                <!-- Right Side: Standing Mechanic - TALLER -->
                <div class="hidden sm:flex flex-shrink-0 z-10 items-end">
                    <img src="{{ asset('images/reparing-new.gif') }}" alt="Mechanic"
                        class="h-[190px] sm:h-[180px] md:h-[230px] lg:h-[300px] xl:h-[350px] w-auto">
                </div>
            </div>
        </div>
    </div>
</section>