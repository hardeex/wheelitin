{{-- <!-- Hero Section -->
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
</section> --}}





<!-- Hero Section -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #FDF3DA 28%, #8ECAE6 50%, #219EBC 100%);">
    <div class="h-[550px] sm:h-[600px] md:h-[650px] lg:h-[722px] w-full max-w-[1440px] mx-auto px-4 sm:px-6 relative">
        <!-- Car Icon - Top Left -->
        <div class="absolute top-8 left-4 sm:top-16 sm:left-8 md:top-24 md:left-16 lg:top-[180px] lg:left-[140px] z-20">
            <img src="{{ asset('images/car-icon.gif') }}" 
                 alt="Car Icon" 
                 class="w-10 h-10 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-auto lg:h-50">
        </div>

        <!-- Main Content - Centered -->
        <div class="flex flex-col items-center justify-start pt-12 sm:pt-20 md:pt-24 lg:pt-20">
            <!-- Headline -->
            <h1 class="font-display font-bold text-[36px] sm:text-[48px] md:text-[60px] lg:text-[70px] xl:text-[80px] leading-[0.95] tracking-[0.05em] text-[var(--color-dark-blue)] text-center mb-3 sm:mb-4 px-4">
                <span class="block">Car Maintenance,</span>
                <span class="block">Made Easy</span>
            </h1>

            <!-- Subheading -->
            <p class="text-[var(--color-dark-blue)] font-medium text-center mb-5 sm:mb-6 px-4 text-[15px] sm:text-[18px] md:text-[22px] lg:text-[26px]" style="font-family: 'Poppins', sans-serif;">
                Hassle-free MOT, Service and Car Repair
            </p>

            <!-- CTA Button -->
            <button class="bg-[var(--color-dark-blue)] text-white px-10 sm:px-10 md:px-12 py-3 sm:py-3.5 md:py-4 rounded-full font-semibold hover:bg-opacity-90 transition-all text-[15px] sm:text-[16px] md:text-[18px]">
                Get Quote Now
            </button>
        </div>

        <!-- Phone/Map Icon - Top Right -->
        <div class="absolute top-8 right-4 sm:top-16 sm:right-6 md:top-20 md:right-8 lg:top-[140px] lg:right-[30px] z-30">
            <img src="{{ asset('images/map.gif') }}" 
                 alt="Map" 
                 class="w-10 h-10 sm:w-16 sm:h-16 md:w-20 md:h-20 lg:w-auto lg:h-50">
        </div>

        <!-- Bottom Illustration - Cars and Mechanic -->
        <div class="absolute bottom-0 left-0 right-0 flex items-end justify-center h-[160px] sm:h-[180px] md:h-[220px] lg:h-[260px]">
            <!-- Cars Image -->
            <div class="absolute bottom-[-40px] sm:bottom-[-80px] md:bottom-[-120px] lg:bottom-[-160px]" 
                 style="left: 50%; transform: translateX(-55%); z-index: 10;">
                <img src="{{ asset('images/cars-headline.gif') }}" 
                     alt="Cars" 
                     class="w-[300px] sm:w-[400px] md:w-[550px] lg:w-[700px] h-auto">
            </div>

            <!-- Walking Mechanic -->
            <div class="absolute bottom-0" 
                 style="left: 50%; transform: translateX(40%); z-index: 20;">
                <img src="{{ asset('images/walking.gif') }}" 
                     alt="Mechanic" 
                     class="h-[90px] sm:h-[100px] md:h-[130px] lg:h-auto w-auto">
            </div>
        </div>
    </div>
</section>