@extends('components.base')
@section('title', 'Contact Us')

@section('content')
   <x-contact-hero />

  <!-- Contact Cards Section -->
  <section class="pt-24 pb-16 px-4 md:px-8 lg:px-16 bg-[var(--color-background)]">
    <div class="max-w-7xl mx-auto">
        <!-- Contact Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            <!-- Visit us At -->
            <div class="flex flex-col mt-0"
                 data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="0">
                <div class="rounded-[18px] overflow-hidden p-8 min-h-[280px] transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background: #FFA85C;">
                    <!-- Icon -->
                    <div class="w-12 h-12 mb-4 transition-all duration-300 group-hover:scale-110 group-hover:rotate-12">
                        <img 
                            src="/images/location.png" 
                            alt="Location" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 transition-all duration-300 group-hover:text-white">
                        Visit us At
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-sm text-gray-800 leading-relaxed transition-all duration-300 group-hover:text-white">
                        Lorem ipsum dolor sit amet consectetur. Turpis egestas dis ut erat aliquet auctor id lobortumis ultrices integer netus a tincidunt et issen nibh habaleest liguh.
                    </p>
                </div>
            </div>

            <!-- Call Us On -->
            <div class="flex flex-col mt-0 lg:mt-8"
                 data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="150">
                <div class="rounded-[18px] mt-12 overflow-hidden p-8 min-h-[280px] transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background: #FFD66B;">
                    <!-- Icon -->
                    <div class="w-12 h-12 mb-4 transition-all duration-300 group-hover:scale-110 group-hover:rotate-12">
                        <img 
                            src="/images/phone.png" 
                            alt="Phone" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 transition-all duration-300 group-hover:text-white">
                        Call Us On
                    </h3>
                    
                    <!-- Phone Numbers -->
                    <div class="space-y-1">
                        <p class="text-sm text-gray-800 transition-all duration-300 group-hover:text-white group-hover:translate-x-2">
                            +234534628yy9
                        </p>
                        <p class="text-sm text-gray-800 transition-all duration-300 group-hover:text-white group-hover:translate-x-2">
                            +234534628yy9
                        </p>
                    </div>
                </div>
            </div>

            <!-- Send Us an Email -->
            <div class="flex flex-col mt-0 lg:mt-16"
                 data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="300">
                <div class="rounded-[18px] overflow-hidden mt-20 p-8 min-h-[290px] transition-all duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer group" 
                     style="background: #8ECAE6;">
                    <!-- Icon -->
                    <div class="w-12 h-12 mb-4 transition-all duration-300 group-hover:scale-110 group-hover:rotate-12">
                        <img 
                            src="/images/email.png" 
                            alt="Email" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3 transition-all duration-300 group-hover:text-white">
                        Send Us an Email
                    </h3>
                    
                    <!-- Description -->
                    <p class="text-sm text-gray-800 leading-relaxed transition-all duration-300 group-hover:text-white">
                        Lorem ipsum dolor sit amet consectetur. Turpis egestas dis ut cras dolor auctor id Bibendum quis integer mauris tincidunt et issen nush habaleest dgun.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

  <!-- Contact Form Section -->
  <section class="py-16 px-4 md:px-8 lg:px-16" style="background: #023047;">
    <div class="max-w-2xl mx-auto">
        <!-- Heading -->
        <h2 class="font-display pt-20 text-3xl md:text-4xl lg:text-5xl text-center mb-8" 
            style="color: #FFB703;"
            data-aos="fade-down"
            data-aos-duration="1000">
            Reach Out to Us to<br>Get More Information
        </h2>
        
        <!-- Form -->
        <form class="space-y-4" id="contactForm">
            <!-- Name Input -->
            <div data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="100">
                <input 
                    type="text" 
                    placeholder="Name*" 
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 hover:shadow-lg focus:scale-105"
                    style="background: #8ECAE6;"
                    required
                />
            </div>
            
            <!-- Phone Number Input -->
            <div data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="200">
                <input 
                    type="tel" 
                    placeholder="Phone Number*" 
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 hover:shadow-lg focus:scale-105"
                    style="background: #8ECAE6;"
                    required
                />
            </div>
            
            <!-- Email Input -->
            <div data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="300">
                <input 
                    type="email" 
                    placeholder="Email Address*" 
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 transition-all duration-300 hover:shadow-lg focus:scale-105"
                    style="background: #8ECAE6;"
                    required
                />
            </div>
            
            <!-- Message Textarea -->
            <div data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="400">
                <textarea 
                    placeholder="Message*" 
                    rows="4"
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none transition-all duration-300 hover:shadow-lg focus:scale-105"
                    style="background: #8ECAE6;"
                    required
                ></textarea>
            </div>
            
            <!-- Submit Button -->
            <div data-aos="fade-up"
                 data-aos-duration="800"
                 data-aos-delay="500">
                <button 
                    type="submit"
                    class="w-full py-4 rounded-lg font-semibold text-white text-lg transition-all duration-300 hover:opacity-90 hover:scale-105 hover:shadow-xl active:scale-95"
                    style="background: #FB8500;">
                    Book an Appointment
                </button>
            </div>
        </form>
    </div>
</section>

<x-footer />

<!-- Add custom form interaction script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('input, textarea');
    
    // Add floating label effect on focus
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.style.transform = 'scale(1.02)';
        });
        
        input.addEventListener('blur', function() {
            this.style.transform = 'scale(1)';
        });
        
        // Add shake animation on invalid input
        input.addEventListener('invalid', function(e) {
            e.preventDefault();
            this.classList.add('shake');
            setTimeout(() => {
                this.classList.remove('shake');
            }, 500);
        });
    });
    
    // Form submission with animation
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const button = form.querySelector('button[type="submit"]');
        const originalText = button.textContent;
        
        // Button loading state
        button.textContent = 'Sending...';
        button.disabled = true;
        button.style.opacity = '0.7';
        
        // Simulate form submission (replace with actual submission logic)
        setTimeout(() => {
            button.textContent = '✓ Sent Successfully!';
            button.style.background = '#219EBC';
            
            // Reset form
            setTimeout(() => {
                form.reset();
                button.textContent = originalText;
                button.disabled = false;
                button.style.opacity = '1';
                button.style.background = '#FB8500';
            }, 2000);
        }, 1500);
    });
});
</script>

<style>
/* Shake animation for invalid inputs */
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-10px); }
    75% { transform: translateX(10px); }
}

.shake {
    animation: shake 0.5s;
}

/* Smooth focus ring animation */
input:focus, textarea:focus {
    animation: pulse 1s infinite;
}

@keyframes pulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(251, 133, 0, 0.4); }
    50% { box-shadow: 0 0 0 8px rgba(251, 133, 0, 0); }
}
</style>
    
@endsection