<!-- About Us Hero Section -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #FDF3DA 28%, #8ECAE6 50%, #219EBC 100%);">
    <div class="h-[450px] sm:h-[500px] md:h-[550px] lg:h-[600px] w-full max-w-[1440px] mx-auto px-4 sm:px-6 relative">
        <!-- Car Icon - Above "About Us" text -->
        <div class="absolute top-6 left-4 sm:top-8 sm:left-8 md:top-12 md:left-16 lg:top-16 lg:left-24 z-20">
            <img src="{{ asset('images/car-icon.gif') }}" 
                 alt="Car Icon" 
                 class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28">
        </div>

        <!-- Main Content - Left Aligned -->
        <div class="flex flex-col  items-start justify-start pt-24 sm:pt-28 md:pt-36 lg:pt-40 pl-4 sm:pl-8 md:pl-16 lg:pl-24">
            <!-- Headline -->
            <h1 class="font-display mt-12 font-bold text-[42px] sm:text-[56px] md:text-[72px] lg:text-[90px] leading-[0.95] tracking-normal text-[var(--color-dark-blue)] mb-3 sm:mb-4">
                Services
            </h1>

            <!-- Subheading -->
            <p class="text-[var(--color-dark-blue)] font-medium text-[16px] sm:text-[18px] md:text-[20px] lg:text-[22px] max-w-[500px]" style="font-family: 'Poppins', sans-serif;">
                Hassle-free MOT, Service and Car Repair
            </p>
        </div>

      

        <div class="absolute bottom-0 right-0 flex items-end gap-2 pr-4">
    <!-- Map Icon -->
    <div class="-mr-20 mb-30"> <!-- negative right margin moves it closer -->
        <img src="{{ asset('images/map.gif') }}" 
             alt="Map" 
             class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28">
    </div>

    <!-- Hero Image -->
    <div class="relative z-10">
        <img src="{{ asset('images/services.gif') }}" 
             alt="Team" 
             class="h-[220px] sm:h-[270px] md:h-[320px] lg:h-[620px] w-auto">
    </div>
</div>

    </div>
</section>