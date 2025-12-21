@extends('components.base')
@section('title', 'About Us')

@section('content')
    <!-- About Us Hero Section -->
    <section class="relative overflow-hidden" style="background: linear-gradient(180deg, #FDF3DA 28%, #8ECAE6 50%, #219EBC 100%);">
        <div class="h-[450px] sm:h-[500px] md:h-[550px] lg:h-[600px] w-full max-w-[1440px] mx-auto px-4 sm:px-6 relative">
            <!-- Car Icon - Above "About Us" text -->
            <div class="absolute top-6 left-4 sm:top-8 sm:left-8 md:top-12 md:left-16 lg:top-16 lg:left-24 z-20"
                 data-aos="fade-right"
                 data-aos-duration="1000"
                 data-aos-delay="200">
                <img src="{{ asset('images/car-icon.gif') }}" 
                     alt="Car Icon" 
                     class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28">
            </div>
            
            <!-- Main Content - Left Aligned -->
            <div class="flex flex-col items-start justify-start pt-24 sm:pt-28 md:pt-36 lg:pt-40 pl-4 sm:pl-8 md:pl-16 lg:pl-24">
                <!-- Headline -->
                <h1 class="font-display mt-12 font-bold text-[42px] sm:text-[56px] md:text-[72px] lg:text-[90px] leading-[0.95] tracking-normal text-[var(--color-dark-blue)] mb-3 sm:mb-4"
                    data-aos="fade-up"
                    data-aos-duration="1000">
                    About Us
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
            
            <div class="absolute bottom-0 right-0 flex items-end gap-2 pr-4">
                <!-- Map Icon -->
                <div class="-mr-20 mb-30"
                     data-aos="zoom-in"
                     data-aos-duration="800"
                     data-aos-delay="400">
                    <img src="{{ asset('images/map.gif') }}" 
                         alt="Map" 
                         class="w-16 h-16 sm:w-20 sm:h-20 md:w-24 md:h-24 lg:w-28 lg:h-28">
                </div>
                
                <!-- Hero Image -->
                <div class="relative z-10"
                     data-aos="fade-left"
                     data-aos-duration="1200"
                     data-aos-delay="300">
                    <img src="{{ asset('images/about-hero.gif') }}" 
                         alt="Team" 
                         class="h-[220px] sm:h-[270px] md:h-[320px] lg:h-[620px] w-auto">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section (First) -->
    <section class="relative overflow-hidden py-12 sm:py-16 md:py-20 lg:py-24">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-12">
                <!-- Left Side - Text Content -->
                <div class="w-full lg:w-1/2 lg:max-w-[550px]"
                     data-aos="fade-right"
                     data-aos-duration="1000">
                    <!-- Heading -->
                    <h2 class="font-display text-[42px] sm:text-[56px] md:text-[68px] lg:text-[80px] text-[var(--color-dark-blue)] mb-6 sm:mb-8 leading-[0.95] tracking-normal"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        Our Story
                    </h2>

                    <!-- Description -->
                    <p class="text-[var(--color-dark-blue)] text-[16px] sm:text-[17px] md:text-[18px] lg:text-[19px] leading-relaxed mb-8 sm:mb-10 max-w-[500px]" 
                       style="font-family: 'Poppins', sans-serif;"
                       data-aos="fade-up"
                       data-aos-delay="200">
                        Wheelitin is revolutionizing the auto repair industry by creating a transparent, convenient, and trustworthy platform that connects car owners with certified mechanics.
                    </p>

                    <!-- CTA Button -->
                    <button class="bg-[var(--color-dark-blue)] text-white px-10 sm:px-12 md:px-14 py-3 sm:py-3.5 md:py-4 rounded-full font-semibold hover:bg-opacity-90 transition-all duration-300 text-[15px] sm:text-[16px] md:text-[17px] hover:scale-105 hover:shadow-lg" 
                            style="font-family: 'Poppins', sans-serif;"
                            data-aos="fade-up"
                            data-aos-delay="300">
                        Learn More
                    </button>
                </div>

                <!-- Right Side - Image -->
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-end"
                     data-aos="fade-left"
                     data-aos-duration="1000"
                     data-aos-delay="200">
                    <img src="{{ asset('images/our-story.gif') }}" 
                         alt="Our Story" 
                         class="w-full max-w-[400px] sm:max-w-[480px] md:max-w-[550px] lg:max-w-[600px] h-auto transform hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </section>

    <!-- Our Story Section (Second - Team Work) -->
    <section class="relative overflow-hidden py-12 sm:py-16 md:py-20 lg:py-24" style="background-color: #FFFAEE;">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-8 lg:gap-16">
                <!-- Left Side - Image -->
                <div class="w-full lg:w-1/2 flex justify-center lg:justify-start order-2 lg:order-1"
                     data-aos="fade-right"
                     data-aos-duration="1000"
                     data-aos-delay="200">
                    <img src="{{ asset('images/team-work.gif') }}" 
                         alt="Team Work" 
                         class="w-full max-w-[350px] sm:max-w-[420px] md:max-w-[480px] lg:max-w-[520px] h-auto transform hover:scale-105 transition-transform duration-500">
                </div>

                <!-- Right Side - Text Content -->
                <div class="w-full lg:w-1/2 lg:max-w-[550px] order-1 lg:order-2"
                     data-aos="fade-left"
                     data-aos-duration="1000">
                    <!-- Heading -->
                    <h2 class="font-display text-[42px] sm:text-[56px] md:text-[68px] lg:text-[80px] text-[var(--color-dark-blue)] mb-6 sm:mb-8 leading-[0.95] tracking-normal"
                        data-aos="fade-up"
                        data-aos-delay="100">
                        Our Story
                    </h2>

                    <!-- Description -->
                    <p class="text-[var(--color-dark-blue)] text-[16px] sm:text-[17px] md:text-[18px] lg:text-[19px] leading-relaxed mb-8 sm:mb-10" 
                       style="font-family: 'Poppins', sans-serif;"
                       data-aos="fade-up"
                       data-aos-delay="200">
                        Wheelitin is revolutionizing the auto repair industry by creating a transparent, convenient, and trustworthy platform that connects car owners with certified mechanics.
                    </p>

                    <!-- CTA Button -->
                    <button class="bg-[var(--color-dark-blue)] text-white px-10 sm:px-12 md:px-14 py-3 sm:py-3.5 md:py-4 rounded-full font-semibold hover:bg-opacity-90 transition-all duration-300 text-[15px] sm:text-[16px] md:text-[17px] hover:scale-105 hover:shadow-lg" 
                            style="font-family: 'Poppins', sans-serif;"
                            data-aos="fade-up"
                            data-aos-delay="300">
                        Learn More
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="relative overflow-hidden py-12 sm:py-16 md:py-20 lg:py-24" style="background-color: #023047;">
        <div class="max-w-[1440px] mx-auto px-4 sm:px-6 md:px-8 lg:px-12">
            <!-- Section Heading -->
            <h2 class="font-display text-[42px] sm:text-[56px] md:text-[68px] lg:text-[80px] text-center mb-12 sm:mb-16 md:mb-20 leading-[0.95] tracking-normal" 
                style="color: #FFB703;"
                data-aos="fade-down"
                data-aos-duration="1000">
                Our Values
            </h2>

            <!-- Values Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- Value Card 1 - Commitment -->
                <div class="rounded-[24px] p-6 md:p-8 flex flex-col transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background-color: #8ECAE6;"
                     data-aos="flip-left"
                     data-aos-duration="800"
                     data-aos-delay="0">
                    <!-- Number -->
                    <span class="text-[32px] md:text-[40px] font-bold mb-4 transition-all duration-300 group-hover:scale-110" style="color: #FB8500; font-family: 'Poppins', sans-serif;">01</span>
                    
                    <!-- Image -->
                    <div class="flex justify-center mb-6 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                        <img src="{{ asset('images/committment.gif') }}" 
                             alt="Commitment" 
                             class="w-32 h-32 md:w-40 md:h-40 object-contain">
                    </div>
                    
                    <!-- Title -->
                    <h3 class="font-display text-[28px] md:text-[32px] mb-4 transition-colors duration-300" style="color: #023047;">
                        Commitment
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-[14px] md:text-[15px] leading-relaxed" style="color: #023047; font-family: 'Poppins', sans-serif;">
                        Lorem ipsum dolor sit amet consectetur. Nisi bibendum pretium lorem ut nisi ultrices. Amet sit proin mattis dignissim purus tincidunt. Facilisis risus justo non vel euismod. Sagittis non sit tristique et massa senectus nulla nulla. Nunc in nulla sed nunc euismod dolor. Nascetur pulvinar dignissim volutpat egestas nibh cum tincidunt.
                    </p>
                </div>

                <!-- Value Card 2 - Hardwork -->
                <div class="rounded-[24px] p-6 md:p-8 flex flex-col transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background-color: #8ECAE6;"
                     data-aos="flip-left"
                     data-aos-duration="800"
                     data-aos-delay="150">
                    <!-- Number -->
                    <span class="text-[32px] md:text-[40px] font-bold mb-4 transition-all duration-300 group-hover:scale-110" style="color: #FB8500; font-family: 'Poppins', sans-serif;">02</span>
                    
                    <!-- Image -->
                    <div class="flex justify-center mb-6 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                        <img src="{{ asset('images/committment.gif') }}" 
                             alt="Hardwork" 
                             class="w-32 h-32 md:w-40 md:h-40 object-contain">
                    </div>
                    
                    <!-- Title -->
                    <h3 class="font-display text-[28px] md:text-[32px] mb-4 transition-colors duration-300" style="color: #023047;">
                        Hardwork
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-[14px] md:text-[15px] leading-relaxed" style="color: #023047; font-family: 'Poppins', sans-serif;">
                        Lorem ipsum dolor sit amet consectetur. Nisi bibendum pretium lorem ut nisi ultrices. Amet sit proin mattis dignissim purus tincidunt.
                    </p>
                </div>

                <!-- Value Card 3 - Trust -->
                <div class="rounded-[24px] p-6 md:p-8 flex flex-col transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background-color: #8ECAE6;"
                     data-aos="flip-left"
                     data-aos-duration="800"
                     data-aos-delay="300">
                    <!-- Number -->
                    <span class="text-[32px] md:text-[40px] font-bold mb-4 transition-all duration-300 group-hover:scale-110" style="color: #FB8500; font-family: 'Poppins', sans-serif;">03</span>
                    
                    <!-- Image -->
                    <div class="flex justify-center mb-6 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                        <img src="{{ asset('images/trust.gif') }}" 
                             alt="Trust" 
                             class="w-32 h-32 md:w-40 md:h-40 object-contain">
                    </div>
                    
                    <!-- Title -->
                    <h3 class="font-display text-[28px] md:text-[32px] mb-4 transition-colors duration-300" style="color: #023047;">
                        Trust
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-[14px] md:text-[15px] leading-relaxed" style="color: #023047; font-family: 'Poppins', sans-serif;">
                        Lorem ipsum dolor sit amet consectetur. Nisi bibendum pretium lorem ut nisi ultrices. Amet sit proin mattis dignissim purus tincidunt.
                    </p>
                </div>

                <!-- Value Card 4 - Dedication -->
                <div class="rounded-[24px] p-6 md:p-8 flex flex-col transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background-color: #8ECAE6;"
                     data-aos="flip-left"
                     data-aos-duration="800"
                     data-aos-delay="450">
                    <!-- Number -->
                    <span class="text-[32px] md:text-[40px] font-bold mb-4 transition-all duration-300 group-hover:scale-110" style="color: #FB8500; font-family: 'Poppins', sans-serif;">04</span>
                    
                    <!-- Image -->
                    <div class="flex justify-center mb-6 transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">
                        <img src="{{ asset('images/dedication.gif') }}" 
                             alt="Dedication" 
                             class="w-32 h-32 md:w-40 md:h-40 object-contain">
                    </div>
                    
                    <!-- Title -->
                    <h3 class="font-display text-[28px] md:text-[32px] mb-4 transition-colors duration-300" style="color: #023047;">
                        Dedication
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-[14px] md:text-[15px] leading-relaxed" style="color: #023047; font-family: 'Poppins', sans-serif;">
                        Lorem ipsum dolor sit amet consectetur. Nisi bibendum pretium lorem ut nisi ultrices. Amet sit proin mattis dignissim purus tincidunt.
                    </p>
                </div>
            </div>
        </div>
    </section>
{{-- 
    <x-team-member /> --}}
    <x-footer />
@endsection