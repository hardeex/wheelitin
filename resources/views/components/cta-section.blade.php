<!-- cta-section.blade.php -->
<section class="py-20 px-4 md:px-8 lg:px-16 bg-[var(--color-background)]">
    <div class="max-w-6xl mx-auto">
        <!-- CTA Card -->
        <div class="relative bg-[#023047] rounded-[40px] overflow-hidden">
            <!-- Orange Corner Decorations -->
            <div class="absolute top-0 left-0 w-24 h-24 bg-[#FB8500] rounded-br-full"></div>
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#FB8500] rounded-bl-full"></div>
            <div class="absolute bottom-0 left-0 w-32 h-32 bg-[#FB8500] rounded-tr-full"></div>
            <div class="absolute bottom-0 right-0 w-32 h-32 bg-[#FB8500] rounded-tl-full"></div>
            
            <!-- Content Container -->
            <div class="relative grid grid-cols-1 lg:grid-cols-2 gap-8 items-center px-8 md:px-16 py-16 md:py-20">
                <!-- Left Content -->
                <div class="z-10">
                    <h2 class="font-display text-[40px] md:text-[48px] lg:text-[56px] text-[var(--color-baby-blue)] mb-6 uppercase leading-tight">
                        Ready to Repair your<br>car with ease?
                    </h2>
                    <p class="text-white text-[16px] md:text-[18px] mb-8 leading-relaxed">
                        Wheelitin is revolutionizing the auto repair industry by<br class="hidden md:block">
                        creating a transparent.
                    </p>
                    <button class="bg-transparent border-2 border-[#FB8500] text-[#FB8500] px-10 py-4 rounded-lg font-semibold text-[16px] hover:bg-[#FB8500] hover:text-white transition-all duration-300">
                        Sign Up
                    </button>
                </div>

                <!-- Right Image -->
                <div class="z-10 flex justify-center lg:justify-end">
                    <img 
                        src="/images/read-for-repair.gif" 
                        alt="Ready for repair" 
                        class="w-full max-w-md h-auto object-contain"
                    />
                </div>
            </div>
        </div>
    </div>
</section>