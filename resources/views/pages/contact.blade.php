@extends('components.base')
@section('title', 'Contact Us')

@section('content')
   <x-contact-hero />


  <section class="pt-24 pb-16 px-4 md:px-8 lg:px-16 bg-[var(--color-background)]">
    <div class="max-w-7xl mx-auto">
        <!-- Contact Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 items-start">
            <!-- Visit us At -->
            <div class="flex flex-col mt-0">
                <div class="rounded-[18px] overflow-hidden p-8 min-h-[280px]" style="background: #FFA85C;">
                    <!-- Icon -->
                    <div class="w-12 h-12 mb-4">
                        <img 
                            src="/images/location.png" 
                            alt="Location" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Visit us At</h3>
                    
                    <!-- Description -->
                    <p class="text-sm text-gray-800 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur. Turpis egestas dis ut erat aliquet auctor id lobortumis ultrices integer netus a tincidunt et issen nibh habaleest liguh.
                    </p>
                </div>
            </div>

            <!-- Call Us On -->
            <div class="flex flex-col mt-0 lg:mt-8">
                <div class="rounded-[18px] mt-12 overflow-hidden p-8 min-h-[280px]" style="background: #FFD66B;">
                    <!-- Icon -->
                    <div class="w-12 h-12 mb-4">
                        <img 
                            src="/images/phone.png" 
                            alt="Phone" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Call Us On</h3>
                    
                    <!-- Phone Numbers -->
                    <div>
                        <p class="text-sm text-gray-800">+234534628yy9</p>
                        <p class="text-sm text-gray-800">+234534628yy9</p>
                    </div>
                </div>
            </div>

            <!-- Send Us an Email -->
            <div class="flex flex-col mt-0 lg:mt-16">
                <div class="rounded-[18px] overflow-hidden  mt-20 p-8 min-h-[290px]" style="background: #8ECAE6;">
                    <!-- Icon -->
                    <div class="w-12 h-12 mb-4">
                        <img 
                            src="/images/email.png" 
                            alt="Email" 
                            class="w-full h-full object-contain"
                        />
                    </div>
                    
                    <!-- Title -->
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Send Us an Email</h3>
                    
                    <!-- Description -->
                    <p class="text-sm text-gray-800 leading-relaxed">
                        Lorem ipsum dolor sit amet consectetur. Turpis egestas dis ut cras dolor auctor id Bibendum quis integer mauris tincidunt et issen nush habaleest dgun.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-16 px-4  md:px-8 lg:px-16" style="background: #023047;">
    <div class="max-w-2xl mx-auto">
        <!-- Heading -->
        <h2 class="font-display pt-20 text-3xl md:text-4xl lg:text-5xl text-center mb-8" style="color: #FFB703;">
            Reach Out to Us to<br>Get More Information
        </h2>
        
        <!-- Form -->
        <form class="space-y-4">
            <!-- Name Input -->
            <div>
                <input 
                    type="text" 
                    placeholder="Name*" 
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    style="background: #8ECAE6;"
                    required
                />
            </div>
            
            <!-- Phone Number Input -->
            <div>
                <input 
                    type="tel" 
                    placeholder="Phone Number*" 
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    style="background: #8ECAE6;"
                    required
                />
            </div>
            
            <!-- Email Input -->
            <div>
                <input 
                    type="email" 
                    placeholder="Email Address*" 
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500"
                    style="background: #8ECAE6;"
                    required
                />
            </div>
            
            <!-- Message Textarea -->
            <div>
                <textarea 
                    placeholder="Message*" 
                    rows="4"
                    class="w-full px-6 py-4 rounded-lg text-gray-900 placeholder-gray-700 focus:outline-none focus:ring-2 focus:ring-orange-500 resize-none"
                    style="background: #8ECAE6;"
                    required
                ></textarea>
            </div>
            
            <!-- Submit Button -->
            <div>
                <button 
                    type="submit"
                    class="w-full py-4  font-semibold text-white text-lg transition-opacity hover:opacity-90"
                    style="background: #FB8500;"
                >
                    Book an Appointment
                </button>
            </div>
        </form>
    </div>
</section>

<x-footer />
    
@endsection