@extends('components.base')
@section('title', 'Help Center - Auto Repair')
@section('content')

<!-- Hero Section -->
<section class="bg-dark-blue text-white py-20">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">How Can We Help You?</h1>
            <p class="text-xl text-white/90 mb-8">Find answers to common questions and get the support you need</p>
        </div>
    </div>
</section>

<!-- Quick Help Categories -->
<section class="py-16 bg-background">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-display font-bold text-center text-dark-blue mb-12">Browse by Category</h2>
        
        <div class="grid md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
            <!-- Category 1 -->
            <a href="#getting-started" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-rocket text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Getting Started</h3>
                <p class="text-sm text-gray-600">Learn the basics</p>
            </a>

            <!-- Category 2 -->
            <a href="#booking" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-calendar-check text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Booking Services</h3>
                <p class="text-sm text-gray-600">Schedule repairs</p>
            </a>

            <!-- Category 3 -->
            <a href="#payments" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-credit-card text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Payments & Pricing</h3>
                <p class="text-sm text-gray-600">Billing information</p>
            </a>

            <!-- Category 4 -->
            <a href="#mechanics" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-user-cog text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Finding Mechanics</h3>
                <p class="text-sm text-gray-600">Connect with pros</p>
            </a>

            <!-- Category 5 -->
            <a href="#account" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-user-circle text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Account Settings</h3>
                <p class="text-sm text-gray-600">Manage your profile</p>
            </a>

            <!-- Category 6 -->
            <a href="#safety" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-shield-alt text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Safety & Security</h3>
                <p class="text-sm text-gray-600">Stay protected</p>
            </a>

            <!-- Category 7 -->
            <a href="#troubleshooting" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-wrench text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Troubleshooting</h3>
                <p class="text-sm text-gray-600">Fix common issues</p>
            </a>

            <!-- Category 8 -->
            <a href="#contact" class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition text-center group">
                <div class="w-16 h-16 bg-baby-blue/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-dark-blue transition">
                    <i class="fas fa-headset text-dark-blue text-2xl group-hover:text-white transition"></i>
                </div>
                <h3 class="font-semibold text-dark-blue mb-2">Contact Support</h3>
                <p class="text-sm text-gray-600">Get in touch</p>
            </a>
        </div>
    </div>
</section>


<!-- FAQ Sections -->
<section class="py-16 bg-background">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Getting Started FAQs -->
            <div id="getting-started" class="mb-12">
                <h2 class="text-2xl font-display font-bold text-dark-blue mb-6 flex items-center">
                    <i class="fas fa-rocket text-dark-blue mr-3"></i>
                    Getting Started
                </h2>
                <div class="space-y-3">
                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            How do I create an account?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            Creating an account is simple. Click the "Sign Up" button in the top right corner, enter your email address and create a password, then verify your email. You can also sign up using your Google or Facebook account for faster registration.
                        </div>
                    </details>

                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            Is the service available in my area?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            We currently operate in major cities across Nigeria, with Lagos, Abuja, and Port Harcourt being our primary service areas. Enter your location when booking to see available mechanics near you.
                        </div>
                    </details>

                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            Do I need to download an app?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            No app is required. Our platform works seamlessly on any web browser from your phone, tablet, or computer. However, we do offer mobile apps for iOS and Android for added convenience.
                        </div>
                    </details>
                </div>
            </div>

            <!-- Booking FAQs -->
            <div id="booking" class="mb-12">
                <h2 class="text-2xl font-display font-bold text-dark-blue mb-6 flex items-center">
                    <i class="fas fa-calendar-check text-dark-blue mr-3"></i>
                    Booking Services
                </h2>
                <div class="space-y-3">
                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            How quickly can I get a mechanic?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            Availability varies by location and time. For non-emergency services, you can typically book appointments within 24-48 hours. Emergency services are available 24/7 with mechanics often arriving within 1-2 hours.
                        </div>
                    </details>

                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            Can mechanics come to my location?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            Yes! Many of our mechanics offer mobile services and can come to your home, office, or roadside location. This option is available for most basic repairs and maintenance services.
                        </div>
                    </details>

                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            What information do I need to provide when booking?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            You'll need your vehicle make, model, and year, a description of the issue or service needed, your preferred location, and your availability. Photos of any visible issues can help mechanics provide more accurate quotes.
                        </div>
                    </details>
                </div>
            </div>

            <!-- Payments FAQs -->
            <div id="payments" class="mb-12">
                <h2 class="text-2xl font-display font-bold text-dark-blue mb-6 flex items-center">
                    <i class="fas fa-credit-card text-dark-blue mr-3"></i>
                    Payments & Pricing
                </h2>
                <div class="space-y-3">
                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            When do I pay for services?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            Payment is due after the service is completed and you've confirmed satisfaction with the work. You can pay directly through the platform using various payment methods.
                        </div>
                    </details>

                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            Are quotes binding?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            Initial quotes are estimates based on the information provided. The final price may change if additional issues are discovered during the service. Any changes will be communicated and approved before work proceeds.
                        </div>
                    </details>

                    <details class="bg-white rounded-lg shadow-sm">
                        <summary class="px-6 py-4 font-semibold text-dark-blue cursor-pointer hover:bg-background">
                            Do you offer payment plans?
                        </summary>
                        <div class="px-6 pb-4 text-gray-600">
                            For larger repairs over ₦50,000, we partner with financing providers to offer flexible payment plans. Contact our support team to learn more about available options.
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Still Need Help? -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-gradient-to-r from-sky-blue to-dark-blue rounded-2xl p-8 md:p-12 text-white text-center">
                <i class="fas fa-question-circle text-6xl mb-6 opacity-80"></i>
                <h2 class="text-3xl font-display font-bold mb-4">Still Need Help?</h2>
                <p class="text-xl text-white/90 mb-8">Our support team is here to assist you 24/7</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('contact') }}" 
                        class="inline-block bg-white text-sky-blue font-semibold px-8 py-4 rounded-lg hover:bg-baby-blue hover:text-white transition">
                        <i class="fas fa-envelope mr-2"></i>Contact Support
                    </a>
                    <a href="tel:+2348001234567" 
                        class="inline-block bg-orange text-white font-semibold px-8 py-4 rounded-lg hover:bg-sun transition">
                        <i class="fas fa-phone mr-2"></i>Call Us Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Tips -->
<section class="py-16 bg-background">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-3xl font-display font-bold text-center text-dark-blue mb-12">Quick Tips</h2>
            
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="w-12 h-12 bg-orange/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-lightbulb text-orange text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-dark-blue mb-2">Be Specific</h3>
                    <p class="text-gray-600 text-sm">Provide detailed descriptions of your vehicle issues to get more accurate quotes and faster service.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="w-12 h-12 bg-orange/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-camera text-orange text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-dark-blue mb-2">Add Photos</h3>
                    <p class="text-gray-600 text-sm">Include clear photos of any visible problems to help mechanics better understand your needs.</p>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="w-12 h-12 bg-orange/20 rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-star text-orange text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-dark-blue mb-2">Check Reviews</h3>
                    <p class="text-gray-600 text-sm">Read mechanic reviews and ratings from other customers to make informed decisions.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<x-footer />
@endsection