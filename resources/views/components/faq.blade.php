<!-- faq-section.blade.php -->
<section class="py-20 px-4 md:px-8 lg:px-16 bg-[var(--color-dark-blue)]">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                max-height: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                max-height: 500px;
                transform: translateY(0);
            }
        }
        
        @keyframes slideUp {
            from {
                opacity: 1;
                max-height: 500px;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                max-height: 0;
                transform: translateY(-10px);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .faq-item {
            transition: all 0.3s ease;
        }
        
        .faq-item:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }
        
        .faq-content {
            overflow: hidden;
            transition: all 0.4s ease;
        }
        
        .faq-content.show {
            animation: slideDown 0.4s ease forwards;
        }
        
        .faq-content.hide {
            animation: slideUp 0.3s ease forwards;
        }
        
        .faq-icon-container {
            transition: all 0.3s ease;
        }
        
        .faq-item:hover .faq-icon-container {
            transform: scale(1.1);
            background-color: rgba(255, 255, 255, 0.1);
        }
    </style>
    
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="font-display text-[48px] md:text-[56px] lg:text-[64px] text-[var(--color-orange)] mb-4 uppercase leading-tight">
                FREQUENTLY ASKED<br>QUESTIONS
            </h2>
            <p class="text-white text-[16px] md:text-[18px]">
                Everything you need to know about Wheelitin
            </p>
        </div>

        <!-- FAQ Items -->
        <div class="space-y-4">
            <!-- FAQ Item 1 -->
            <div class="faq-item bg-[var(--color-baby-blue)] rounded-[24px] overflow-hidden animate-fade-in-up" style="animation-delay: 0.1s;">
                <button class="w-full px-8 py-6 flex items-center justify-between text-left" onclick="toggleFaq(this)">
                    <span class="text-[var(--color-dark-blue)] text-[18px] md:text-[20px] font-semibold pr-4">
                        What is Wheelitin, and how does it work?
                    </span>
                    <div class="faq-icon-container flex-shrink-0 w-8 h-8 rounded-full border-2 border-[var(--color-dark-blue)] flex items-center justify-center">
                        <svg class="w-4 h-4 text-[var(--color-dark-blue)] transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="px-8 pb-6 faq-content hidden">
                    <p class="text-[var(--color-dark-blue)] text-[16px] leading-relaxed">
                        Wheelitin is a platform that helps car owners find trusted mechanics and compare quotes for repairs, upgrades, and custom work. Whether you need a service, urgent repair, paint job, tyre upgrade, diagnostics, or cosmetic improvements, Wheelitin lets you upload your issue, review quotes from local mechanics, and book your appointment - all from your phone.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="faq-item bg-[var(--color-baby-blue)] rounded-[24px] overflow-hidden animate-fade-in-up" style="animation-delay: 0.2s;">
                <button class="w-full px-8 py-6 flex items-center justify-between text-left" onclick="toggleFaq(this)">
                    <span class="text-[var(--color-dark-blue)] text-[18px] md:text-[20px] font-semibold pr-4">
                        Do you arrange replacement cars?
                    </span>
                    <div class="faq-icon-container flex-shrink-0 w-8 h-8 rounded-full border-2 border-[var(--color-dark-blue)] flex items-center justify-center">
                        <svg class="w-4 h-4 text-[var(--color-dark-blue)] transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="px-8 pb-6 faq-content hidden">
                    <p class="text-[var(--color-dark-blue)] text-[16px] leading-relaxed">
                        Yes! Wheelitin offers replacement cars while your vehicle is being repaired. You can add a replacement vehicle to your booking from just £20 per day. Availability may vary depending on your location and the type of vehicle you need.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="faq-item bg-[var(--color-baby-blue)] rounded-[24px] overflow-hidden animate-fade-in-up" style="animation-delay: 0.3s;">
                <button class="w-full px-8 py-6 flex items-center justify-between text-left" onclick="toggleFaq(this)">
                    <span class="text-[var(--color-dark-blue)] text-[18px] md:text-[20px] font-semibold pr-4">
                        How do I submit an issue or request a quote?
                    </span>
                    <div class="faq-icon-container flex-shrink-0 w-8 h-8 rounded-full border-2 border-[var(--color-dark-blue)] flex items-center justify-center">
                        <svg class="w-4 h-4 text-[var(--color-dark-blue)] transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="px-8 pb-6 faq-content hidden">
                    <p class="text-[var(--color-dark-blue)] text-[16px] leading-relaxed">
                        Just enter your vehicle registration and upload a photo or video of the issue, or write a quick description. Local mechanics will review your request and send you quotes, and we'll notify you as soon as they come in.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="faq-item bg-[var(--color-baby-blue)] rounded-[24px] overflow-hidden animate-fade-in-up" style="animation-delay: 0.4s;">
                <button class="w-full px-8 py-6 flex items-center justify-between text-left" onclick="toggleFaq(this)">
                    <span class="text-[var(--color-dark-blue)] text-[18px] md:text-[20px] font-semibold pr-4">
                        How do I compare quotes?
                    </span>
                    <div class="faq-icon-container flex-shrink-0 w-8 h-8 rounded-full border-2 border-[var(--color-dark-blue)] flex items-center justify-center">
                        <svg class="w-4 h-4 text-[var(--color-dark-blue)] transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="px-8 pb-6 faq-content hidden">
                    <p class="text-[var(--color-dark-blue)] text-[16px] leading-relaxed">
                        Once mechanics respond to your request, you'll see a breakdown of each quote, including price, estimated time, reviews, and availability. You can compare options side-by-side and choose the mechanic that suits your budget and needs.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="faq-item bg-[var(--color-baby-blue)] rounded-[24px] overflow-hidden animate-fade-in-up" style="animation-delay: 0.5s;">
                <button class="w-full px-8 py-6 flex items-center justify-between text-left" onclick="toggleFaq(this)">
                    <span class="text-[var(--color-dark-blue)] text-[18px] md:text-[20px] font-semibold pr-4">
                        How do I book a mechanic through Wheelitin?
                    </span>
                    <div class="faq-icon-container flex-shrink-0 w-8 h-8 rounded-full border-2 border-[var(--color-dark-blue)] flex items-center justify-center">
                        <svg class="w-4 h-4 text-[var(--color-dark-blue)] transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </button>
                <div class="px-8 pb-6 faq-content hidden">
                    <p class="text-[var(--color-dark-blue)] text-[16px] leading-relaxed">
                        After selecting a quote, tap "Book Appointment." Choose from the mechanic's available time slots or arrange a time directly. Once confirmed, you'll receive a booking summary and reminders leading up to your appointment.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function toggleFaq(button) {
    const content = button.nextElementSibling;
    const icon = button.querySelector('svg');
    const allContents = document.querySelectorAll('.faq-content');
    const allIcons = document.querySelectorAll('.faq-item svg');
    
    // Close all other FAQs
    allContents.forEach((item) => {
        if (item !== content && !item.classList.contains('hidden')) {
            item.classList.remove('show');
            item.classList.add('hide');
            setTimeout(() => {
                item.classList.add('hidden');
                item.classList.remove('hide');
            }, 300);
        }
    });
    
    // Reset all other icons
    allIcons.forEach((svg) => {
        if (svg !== icon) {
            svg.classList.remove('rotate-180');
        }
    });
    
    // Toggle current FAQ
    if (content.classList.contains('hidden')) {
        content.classList.remove('hidden');
        content.classList.add('show');
        icon.classList.add('rotate-180');
        setTimeout(() => {
            content.classList.remove('show');
        }, 400);
    } else {
        content.classList.remove('show');
        content.classList.add('hide');
        icon.classList.remove('rotate-180');
        setTimeout(() => {
            content.classList.add('hidden');
            content.classList.remove('hide');
        }, 300);
    }
}
</script>