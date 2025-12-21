<!-- Contact Us Hero Section -->
<section class="relative overflow-hidden" style="background: linear-gradient(180deg, #FDF3DA 28%, #8ECAE6 50%, #219EBC 100%);">
    <div class="h-[450px] sm:h-[500px] md:h-[550px] lg:h-[600px] w-full max-w-[1440px] mx-auto px-4 sm:px-6 relative">
        <!-- Car Icon - Above "Contact Us" text -->
        <div class="absolute top-6 left-4 sm:top-8 sm:left-8 md:top-12 md:left-16 lg:top-16 lg:left-24 z-20"
             data-aos="fade-right"
             data-aos-duration="1000"
             data-aos-delay="200">
            <img src="{{ asset('images/car-icon.gif') }}" 
                 alt="Car Icon" 
                 class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 transform hover:scale-110 hover:rotate-12 transition-all duration-500 cursor-pointer">
        </div>
        
        <!-- Main Content - Left Aligned -->
        <div class="flex flex-col items-start justify-start pt-24 sm:pt-28 md:pt-36 lg:pt-40 pl-4 sm:pl-8 md:pl-16 lg:pl-24">
            <!-- Headline -->
            <h1 class="font-display mt-12 font-bold text-[42px] sm:text-[56px] md:text-[72px] lg:text-[90px] leading-[0.95] tracking-normal text-[var(--color-dark-blue)] mb-3 sm:mb-4"
                data-aos="fade-up"
                data-aos-duration="1000"
                data-aos-delay="0">
                Contact Us
            </h1>
            
            <!-- Subheading -->
            <p class="text-[var(--color-dark-blue)] font-medium text-[16px] sm:text-[18px] md:text-[20px] lg:text-[22px] max-w-[500px]" 
               style="font-family: 'Poppins', sans-serif;"
               data-aos="fade-up"
               data-aos-duration="1000"
               data-aos-delay="200">
                Hassle-free MOT, Service and Car Repair
            </p>
        </div>
        
        <!-- Bottom Section - Map and Contact Image -->
        <div class="absolute bottom-0 right-0 flex items-end gap-2 pr-4">
            <!-- Map Icon -->
            <div class="-mr-20 mb-30"
                 data-aos="zoom-in"
                 data-aos-duration="800"
                 data-aos-delay="400">
                <img src="{{ asset('images/map.gif') }}" 
                     alt="Map" 
                     class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 transform hover:scale-125 hover:rotate-6 transition-all duration-500 cursor-pointer">
            </div>
            
            <!-- Hero Image -->
            <div class="relative z-10"
                 data-aos="fade-left"
                 data-aos-duration="1200"
                 data-aos-delay="300">
                <img src="{{ asset('images/contact.gif') }}" 
                     alt="Contact" 
                     class="h-[220px] sm:h-[270px] md:h-[320px] lg:h-[620px] w-auto transform hover:scale-105 transition-all duration-700 ease-out">
            </div>
        </div>
    </div>
    
    <!-- Floating Animation Elements -->
    <div class="absolute top-20 right-20 w-4 h-4 bg-yellow-400 rounded-full animate-float opacity-60"></div>
    <div class="absolute top-40 right-60 w-3 h-3 bg-orange-400 rounded-full animate-float-delayed opacity-50"></div>
    <div class="absolute bottom-40 left-40 w-5 h-5 bg-blue-300 rounded-full animate-float-slow opacity-40"></div>
</section>

<style>
/* Floating bubble animations */
@keyframes float {
    0%, 100% {
        transform: translateY(0) translateX(0);
    }
    25% {
        transform: translateY(-20px) translateX(10px);
    }
    50% {
        transform: translateY(-40px) translateX(-10px);
    }
    75% {
        transform: translateY(-20px) translateX(10px);
    }
}

@keyframes float-delayed {
    0%, 100% {
        transform: translateY(0) translateX(0) scale(1);
    }
    33% {
        transform: translateY(-30px) translateX(-15px) scale(1.2);
    }
    66% {
        transform: translateY(-15px) translateX(15px) scale(0.8);
    }
}

@keyframes float-slow {
    0%, 100% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-50px) rotate(180deg);
    }
}

.animate-float {
    animation: float 6s ease-in-out infinite;
}

.animate-float-delayed {
    animation: float-delayed 8s ease-in-out infinite;
    animation-delay: 1s;
}

.animate-float-slow {
    animation: float-slow 10s ease-in-out infinite;
    animation-delay: 2s;
}

/* Gradient animation on hover */
section:hover {
    animation: gradient-shift 3s ease infinite;
}

@keyframes gradient-shift {
    0%, 100% {
        filter: hue-rotate(0deg);
    }
    50% {
        filter: hue-rotate(5deg);
    }
}
</style>