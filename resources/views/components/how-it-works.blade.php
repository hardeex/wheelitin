<!-- how-it-works.blade.php -->
<section class="pt-24 pb-16 px-4 md:px-8 lg:px-16 bg-[var(--color-background)]">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3) translateY(50px);
            }
            50% {
                opacity: 1;
                transform: scale(1.05) translateY(-10px);
            }
            70% {
                transform: scale(0.95) translateY(5px);
            }
            100% {
                opacity: 1;
                transform: scale(1) translateY(0);
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
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-fade-in-up {
            animation: bounceIn 1s ease-out forwards;
            opacity: 0;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
            opacity: 0;
        }
        
        .animate-scale-in {
            animation: scaleIn 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out forwards;
            opacity: 0;
        }
        
        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out forwards;
            opacity: 0;
        }
        
        .step-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .step-card:hover {
            transform: translateY(-8px);
        }
        
        .step-image-container {
            transition: transform 0.3s ease;
        }
        
        .step-card:hover .step-image-container {
            transform: scale(1.05);
        }
        
        .cta-button {
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
    </style>
    
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:justify-between md:items-start mb-16">
            <div class="animate-slide-in-left">
                <h2 class="font-display text-[48px] md:text-[56px] lg:text-[64px] text-[var(--color-dark-blue)] mb-2 uppercase leading-tight">
                    HOW IT WORKS
                </h2>
                <p class="text-[18px] text-gray-700">
                    Hassle-free MOT, Service and Car Repair
                </p>
            </div>
            <button class="hidden md:block bg-[var(--color-dark-blue)] text-white px-8 py-4 rounded-full font-semibold text-[16px] cta-button animate-slide-in-right" style="animation-delay: 0.2s;">
                Get Quote Now
            </button>
        </div>
        
        <!-- Steps Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            <!-- Step 1 -->
            <div class="flex flex-col mt-0 step-card animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="rounded-[24px] overflow-hidden mb-6" style="background: #FF7A0099;">
                    <div class="aspect-[4/3] flex items-center justify-center p-8 step-image-container">
                        <img 
                            src="/images/car picture.GIF" 
                            alt="Post your request" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                </div>
                <h3 class="font-display text-[24px] md:text-[28px] text-[var(--color-dark-blue)] mb-3 uppercase">
                   SNAP IT
                </h3>
                <p class="text-[16px] text-gray-700 leading-relaxed">
                   Take a photo or describe the issue.
                </p>
            </div>
            
            <!-- Step 2 -->
            <div class="flex flex-col mt-0 lg:mt-16 step-card animate-fade-in-up" style="animation-delay: 0.6s;">
                <div class="rounded-[24px] overflow-hidden mb-6" style="background: #FFB70366;">
                    <div class="aspect-[4/3] flex items-center justify-center p-8 step-image-container">
                        <img 
                            src="/images/reading-reports.gif" 
                            alt="Review options" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                </div>
                <h3 class="font-display text-[24px] md:text-[28px] text-[var(--color-dark-blue)] mb-3 uppercase">
                   COMPARE
                </h3>
                <p class="text-[16px] text-gray-700 leading-relaxed">
                  Review quotes from trusted, local mechanics.
                </p>
            </div>
            
            <!-- Step 3 -->
            <div class="flex flex-col mt-0 lg:mt-32 step-card animate-fade-in-up" style="animation-delay: 1s;">
                <div class="rounded-[24px] overflow-hidden mb-6" style="background: #8ECAE6B2;">
                    <div class="aspect-[4/3] flex items-center justify-center p-8 step-image-container">
                        <img 
                            src="/images/accepting-request.gif" 
                            alt="Accept and book" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                </div>
                <h3 class="font-display text-[24px] md:text-[28px] text-[var(--color-dark-blue)] mb-3 uppercase">
                   BOOK
                </h3>
                <p class="text-[16px] text-gray-700 leading-relaxed">
                  Review quotes from trusted, local mechanics.
                </p>
            </div>
        </div>
        
        <!-- Mobile Button (Below Steps) -->
        <div class="mt-12 md:hidden text-center animate-fade-in-up" style="animation-delay: 1.4s;">
            <button class="bg-[var(--color-dark-blue)] text-white px-8 py-4 rounded-full font-semibold text-[16px] cta-button">
                Get Quote Now
            </button>
        </div>
    </div>
</section>