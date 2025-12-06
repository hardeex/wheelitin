<!-- mechanic-section.blade.php -->
<section class="pt-20 pb-0 px-0 bg-[var(--color-background)]">
    <div class="w-[80%] mx-auto">
        <!-- Video Container -->
        <div class="relative rounded-[20px] overflow-hidden cursor-pointer">
            <!-- Background Image -->
            <img 
                src="/images/mechanic--on-call.png" 
                alt="Mechanic on call" 
                class="w-full h-auto object-cover block"
            />
            
            <!-- Play Button Overlay - Centered -->
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Play Button Circle -->
                <div class="w-[100px] h-[100px] bg-white rounded-full flex items-center justify-center">
                    <!-- Play Icon Triangle -->
                    <svg 
                        class="w-[40px] h-[40px] text-[#023047] ml-[6px]" 
                        fill="currentColor" 
                        viewBox="0 0 24 24"
                    >
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</section>