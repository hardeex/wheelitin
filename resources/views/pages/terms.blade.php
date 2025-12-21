@extends('components.base')
@section('title', 'Terms of Service - Auto Repair')
@section('content')

<!-- Hero Section -->
<section class="bg-dark-blue text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Terms of Service</h1>
            <p class="text-xl text-baby-blue mb-6">Last Updated: December 20, 2025</p>
            <p class="text-lg text-white/80">Please read these terms carefully before using our services</p>
        </div>
    </div>
</section>

<!-- Quick Navigation -->
<section class="bg-white border-b sticky top-0 z-10 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-4 space-x-6">
            <a href="#acceptance" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Acceptance</a>
            <a href="#services" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Services</a>
            <a href="#accounts" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">User Accounts</a>
            <a href="#bookings" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Bookings</a>
            <a href="#payments" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Payments</a>
            <a href="#liability" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Liability</a>
            <a href="#termination" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Termination</a>
            <a href="#contact" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Contact</a>
        </div>
    </div>
</section>

<!-- Terms Content -->
<section class="py-16 bg-background">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Introduction -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="prose max-w-none">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Welcome to our auto repair service platform. These Terms of Service govern your use of our website, mobile application, and related services. By accessing or using our platform, you agree to be bound by these terms.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        If you do not agree to these terms, please do not use our services. We reserve the right to update these terms at any time, and your continued use of the platform constitutes acceptance of any changes.
                    </p>
                </div>
            </div>

            <!-- Section 1: Acceptance of Terms -->
            <div id="acceptance" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">1</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Acceptance of Terms</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        By creating an account, accessing, or using our platform, you acknowledge that you have read, understood, and agree to be bound by these Terms of Service and our Privacy Policy.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You must be at least 18 years of age to use our services. If you are using our services on behalf of an organisation, you represent that you have the authority to bind that organisation to these terms.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        These terms constitute a legally binding agreement between you and our company. Your use of the platform is also governed by our Privacy Policy, which is incorporated by reference into these terms.
                    </p>
                </div>
            </div>

            <!-- Section 2: Description of Services -->
            <div id="services" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">2</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Description of Services</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Our platform provides a marketplace connecting vehicle owners with certified auto mechanics and repair service providers. We facilitate the booking, communication, and payment processes but do not directly provide auto repair services.
                    </p>
                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Services Include:</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Connecting users with verified mechanics and service providers</li>
                        <li>Facilitating service bookings and appointments</li>
                        <li>Providing quote comparison tools</li>
                        <li>Processing secure payments</li>
                        <li>Customer review and rating system</li>
                        <li>Customer support and dispute resolution</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">
                        We reserve the right to modify, suspend, or discontinue any aspect of our services at any time without prior notice. We are not liable for any modification, suspension, or discontinuation of services.
                    </p>
                </div>
            </div>

            <!-- Section 3: User Accounts -->
            <div id="accounts" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">3</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">User Accounts and Responsibilities</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Account Creation</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        To use our services, you must create an account by providing accurate and complete information. You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.
                    </p>
                    
                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">User Obligations</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">You agree to:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Provide accurate, current, and complete information</li>
                        <li>Maintain and update your information to keep it accurate</li>
                        <li>Notify us immediately of any unauthorised account access</li>
                        <li>Not share your account credentials with others</li>
                        <li>Not create multiple accounts for fraudulent purposes</li>
                        <li>Comply with all applicable laws and regulations</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Prohibited Conduct</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">You agree not to:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2">
                        <li>Use the platform for any illegal or unauthorised purpose</li>
                        <li>Harass, abuse, or harm other users or service providers</li>
                        <li>Submit false, misleading, or fraudulent information</li>
                        <li>Interfere with the proper functioning of the platform</li>
                        <li>Attempt to gain unauthorised access to our systems</li>
                        <li>Use automated systems to access the platform without permission</li>
                    </ul>
                </div>
            </div>

            <!-- Section 4: Bookings and Services -->
            <div id="bookings" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">4</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Bookings and Service Agreements</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When you book a service through our platform, you enter into a direct agreement with the service provider. We act as an intermediary to facilitate this transaction but are not a party to the service agreement.
                    </p>
                    
                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Booking Process</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>All bookings are subject to service provider availability</li>
                        <li>Quotes provided are estimates and may change based on actual service requirements</li>
                        <li>You must provide accurate vehicle and service information</li>
                        <li>Service providers may decline bookings at their discretion</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Cancellation Policy</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You may cancel bookings according to the cancellation policy established by each service provider. Cancellations made less than 24 hours before the scheduled service may incur fees. Emergency cancellations will be handled on a case-by-case basis.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Service Quality</h3>
                    <p class="text-gray-700 leading-relaxed">
                        While we vet service providers, we do not guarantee the quality of services performed. Service providers are independent contractors responsible for their own work. We encourage users to review service providers and report any issues through our platform.
                    </p>
                </div>
            </div>

            <!-- Section 5: Payments and Fees -->
            <div id="payments" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">5</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Payments and Fees</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Payment Processing</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        All payments are processed securely through our platform. We may charge a service fee for facilitating transactions. Payment must be made in full before or immediately after service completion as specified by the service provider.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Pricing and Quotes</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>All prices are in Nigerian Naira (₦) unless otherwise stated</li>
                        <li>Quotes are estimates and final prices may vary</li>
                        <li>Additional charges may apply for parts, materials, or unexpected repairs</li>
                        <li>Service providers must notify you of price changes before proceeding</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Refunds and Disputes</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Refund eligibility is determined on a case-by-case basis. If you are dissatisfied with a service, contact our support team within 48 hours. We will investigate and work to resolve disputes fairly between users and service providers.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Platform Fees</h3>
                    <p class="text-gray-700 leading-relaxed">
                        We may charge fees for using our platform, which will be clearly disclosed before transaction completion. These fees help maintain and improve our services.
                    </p>
                </div>
            </div>

            <!-- Section 6: Liability and Disclaimers -->
            <div id="liability" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">6</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Limitation of Liability</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Service Disclaimer</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Our platform is provided "as is" without warranties of any kind. We do not guarantee uninterrupted or error-free service. We are not responsible for the actions, quality of work, or conduct of service providers on our platform.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Limitation of Damages</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        To the maximum extent permitted by law, we shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use our services, including damages to your vehicle.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Third-Party Services</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Service providers are independent contractors. We do not control their actions and are not liable for any damages or losses resulting from services they provide. Users assume all risks associated with hiring service providers through our platform.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Indemnification</h3>
                    <p class="text-gray-700 leading-relaxed">
                        You agree to indemnify and hold us harmless from any claims, damages, losses, liabilities, and expenses arising from your use of the platform, violation of these terms, or violation of any rights of another party.
                    </p>
                </div>
            </div>

            <!-- Section 7: Intellectual Property -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">7</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Intellectual Property Rights</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        All content on our platform, including text, graphics, logos, images, and software, is our property or that of our licensors and is protected by copyright, trademark, and other intellectual property laws.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You may not reproduce, distribute, modify, or create derivative works from any content on our platform without express written permission. Limited use is permitted for personal, non-commercial purposes only.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        By submitting content to our platform, including reviews and photos, you grant us a non-exclusive, worldwide, royalty-free licence to use, reproduce, and display that content in connection with our services.
                    </p>
                </div>
            </div>

            <!-- Section 8: Privacy and Data -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">8</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Privacy and Data Protection</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Your privacy is important to us. Our collection and use of your personal information is governed by our Privacy Policy, which is incorporated into these terms by reference.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        By using our platform, you consent to the collection, use, and sharing of your information as described in our Privacy Policy. We implement appropriate security measures to protect your data.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We may share your information with service providers to facilitate bookings and services. Service providers are required to maintain the confidentiality of your information.
                    </p>
                </div>
            </div>

            <!-- Section 9: Termination -->
            <div id="termination" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">9</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Termination of Service</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You may terminate your account at any time by contacting our support team. Upon termination, your right to use the platform will immediately cease.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We reserve the right to suspend or terminate your account at any time for any reason, including violation of these terms, fraudulent activity, or abuse of our platform or other users.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Upon termination, certain provisions of these terms will survive, including those related to intellectual property, disclaimers, limitations of liability, and dispute resolution.
                    </p>
                </div>
            </div>

            <!-- Section 10: Dispute Resolution -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">10</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Dispute Resolution and Governing Law</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Governing Law</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        These terms shall be governed by and construed in accordance with the laws of the Federal Republic of Nigeria, without regard to its conflict of law provisions.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Dispute Resolution</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Any disputes arising from these terms or your use of our services shall first be resolved through good-faith negotiations. If negotiations fail, disputes shall be resolved through binding arbitration in Lagos, Nigeria.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Class Action Waiver</h3>
                    <p class="text-gray-700 leading-relaxed">
                        You agree to resolve disputes with us on an individual basis and waive any right to participate in class-action lawsuits or class-wide arbitration.
                    </p>
                </div>
            </div>

            <!-- Section 11: Changes to Terms -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">11</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Modifications to Terms</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We reserve the right to modify these terms at any time. When we make changes, we will update the "Last Updated" date at the top of this page and notify users through email or platform notification.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Your continued use of the platform after changes become effective constitutes acceptance of the modified terms. If you do not agree to the changes, you must stop using our services.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We encourage you to review these terms periodically to stay informed of any updates.
                    </p>
                </div>
            </div>

            <!-- Section 12: Contact Information -->
            <div id="contact" class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">12</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Contact Information</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you have any questions about these Terms of Service, please contact us:
                    </p>
                    <div class="bg-background rounded-lg p-6 space-y-3">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-envelope text-dark-blue w-6 mr-3"></i>
                            <span>legal@wheelitin.co.uk</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-phone text-dark-blue w-6 mr-3"></i>
                            <span>+44 124 5672</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-map-marker-alt text-dark-blue w-6 mr-3"></i>
                            <span>United Kingdom</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-dark-blue py-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl font-display font-bold text-white mb-4">Have Questions About Our Terms?</h2>
        <p class="text-baby-blue mb-6">Our legal team is here to help clarify any concerns</p>
        <a href="{{ route('contact') }}" 
            class="inline-block bg-orange text-white font-semibold px-8 py-3 rounded-lg hover:bg-sun transition">
            <i class="fas fa-envelope mr-2"></i>Contact Legal Team
        </a>
    </div>
</section>

<x-footer />
@endsection