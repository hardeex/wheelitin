<!-- Hero Section -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #FDF3DA 28%, #8ECAE6 50%, #219EBC 100%); height: 722px;">
    <div class="h-full w-full max-w-[1440px] mx-auto px-6 relative">
        
        <!-- Car Icon - Top Left -->
        <div class="absolute" style="top: 180px; left: 140px; z-index: 20;">
            <img src="{{ asset('images/car-icon.gif') }}" 
                 alt="Car Icon" 
                 class="w-auto h-50">
        </div>

        <!-- Main Content - Centered -->
        <div class="flex flex-col items-center justify-start pt-20">
            <!-- Headline -->
            {{-- <h1 class="font-display font-bold text-[var(--color-dark-blue)] text-center mb-4" style="font-family: 'ResotYG', sans-serif; font-size: 110px; line-height: 0.95; letter-spacing: -0.02em;">
                <span class="block">Car Maintenance,</span>
                <span class="block">Made Easy</span>
            </h1> --}}


<h1 class="font-display font-bold text-[70px] leading-[0.95] tracking-[0.05em] text-[var(--color-dark-blue)] text-center mb-4">
    <span class="block">Car Maintenance,</span>
    <span class="block">Made Easy</span>
</h1>



            <!-- Subheading -->
            <p class="text-[var(--color-dark-blue)] font-medium text-center mb-6" style="font-family: 'Poppins', sans-serif; font-size: 26px;">
                Hassle-free MOT, Service and Car Repair
            </p>

            <!-- CTA Button -->
            <button class="bg-[var(--color-dark-blue)] text-white px-12 py-4 rounded-full font-semibold hover:bg-opacity-90 transition-all" style="font-size: 18px;">
                Get Quote Now
            </button>
        </div>

        <!-- Phone/Map Icon - Top Right -->
        <div class="absolute" style="top: 140px; right: 30px; z-index: 30;">
            <img src="{{ asset('images/map.gif') }}" 
                 alt="Map" 
                 class="w-auto h-50">
        </div>

       
        <!-- Bottom Illustration - Cars and Mechanic -->
        <div class="absolute bottom-0  left-0 right-0  flex items-end justify-center" style="height: 260px;">
            <!-- Cars Image -->
            <div class="absolute bottom-[-160px]  mt-12 "  style="left: 50%; transform: translateX(-55%); z-index: 10; width: 700px;">
                <img src="{{ asset('images/cars-headline.gif') }}" 
                     alt="Cars" 
                     class="w-full h-auto">
            </div>
            
            <!-- Walking Mechanic -->
            <div class="absolute bottom-0" style="left: 50%; transform: translateX(40%); z-index: 20;">
                <img src="{{ asset('images/walking.gif') }}" 
                     alt="Mechanic" 
                     style="height: auto; width: auto;">
            </div>
        </div>
    </div>
</section>