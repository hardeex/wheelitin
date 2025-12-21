@extends('components.base')
@section('title', 'Privacy Policy - Auto Repair')
@section('content')

<!-- Hero Section -->
<section class="bg-dark-blue text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Privacy Policy</h1>
            <p class="text-xl text-baby-blue mb-6">Last Updated: December 20, 2025</p>
            <p class="text-lg text-white/80">Your privacy matters to us. Learn how we protect your data.</p>
        </div>
    </div>
</section>

<!-- Quick Navigation -->
<section class="bg-white border-b sticky top-0 z-10 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-4 space-x-6">
            <a href="#introduction" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Introduction</a>
            <a href="#data-collection" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Data Collection</a>
            <a href="#data-usage" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">How We Use Data</a>
            <a href="#data-sharing" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Data Sharing</a>
            <a href="#data-security" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Security</a>
            <a href="#your-rights" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Your Rights</a>
            <a href="#cookies" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Cookies</a>
            <a href="#contact" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Contact</a>
        </div>
    </div>
</section>

<!-- Privacy Content -->
<section class="py-16 bg-background">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Introduction -->
            <div id="introduction" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-shield-alt text-dark-blue"></i>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Introduction</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Welcome to our Privacy Policy. This document explains how we collect, use, disclose, and safeguard your information when you use our auto repair service platform. We are committed to protecting your privacy and ensuring the security of your personal data.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        By using our platform, you agree to the collection and use of information in accordance with this Privacy Policy. If you do not agree with our policies and practices, please do not use our services.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last Updated" date.
                    </p>
                </div>
            </div>

            <!-- Section 1: Information We Collect -->
            <div id="data-collection" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">1</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Information We Collect</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Personal Information</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">When you register or use our services, we may collect:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Full name and contact information (email, phone number)</li>
                        <li>Account credentials (username, password)</li>
                        <li>Location data (address, service location)</li>
                        <li>Vehicle information (make, model, year, license plate)</li>
                        <li>Payment information (billing address, payment method details)</li>
                        <li>Profile photos and user-generated content</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Usage Information</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">We automatically collect information about how you interact with our platform:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Device information (IP address, browser type, operating system)</li>
                        <li>Log data (access times, pages viewed, app features used)</li>
                        <li>Location data (GPS coordinates, if you enable location services)</li>
                        <li>Booking and service history</li>
                        <li>Communication records with mechanics and support</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Information from Third Parties</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">We may receive information from:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2">
                        <li>Social media platforms (if you sign up using social login)</li>
                        <li>Payment processors and financial institutions</li>
                        <li>Identity verification services</li>
                        <li>Marketing partners and analytics providers</li>
                    </ul>
                </div>
            </div>

            <!-- Section 2: How We Use Your Information -->
            <div id="data-usage" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">2</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">How We Use Your Information</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We use the information we collect for various purposes to provide and improve our services:
                    </p>
                    
                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Service Delivery</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Create and manage your account</li>
                        <li>Process bookings and facilitate services</li>
                        <li>Connect you with verified mechanics</li>
                        <li>Process payments and issue receipts</li>
                        <li>Provide customer support and respond to inquiries</li>
                        <li>Send service notifications and updates</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Platform Improvement</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Analyze usage patterns to improve functionality</li>
                        <li>Personalize your experience on the platform</li>
                        <li>Develop new features and services</li>
                        <li>Conduct research and analytics</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Safety and Security</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Verify user identities and prevent fraud</li>
                        <li>Detect and prevent security threats</li>
                        <li>Enforce our terms of service</li>
                        <li>Resolve disputes and troubleshoot problems</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Marketing and Communication</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2">
                        <li>Send promotional offers and updates (with your consent)</li>
                        <li>Conduct surveys and gather feedback</li>
                        <li>Send administrative messages and service announcements</li>
                    </ul>
                </div>
            </div>

            <!-- Section 3: How We Share Your Information -->
            <div id="data-sharing" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">3</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">How We Share Your Information</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We do not sell your personal information. We may share your information in the following circumstances:
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2">With Service Providers</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We share necessary information with mechanics and service providers to facilitate your bookings. This includes your name, contact information, location, and vehicle details.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">With Third-Party Service Providers</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">We work with trusted partners who help us operate our platform:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Payment processors (Paystack, Flutterwave)</li>
                        <li>Cloud hosting providers</li>
                        <li>Analytics and marketing services</li>
                        <li>Customer support tools</li>
                        <li>Email and communication services</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">For Legal Compliance</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">We may disclose information when required to:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Comply with legal obligations or court orders</li>
                        <li>Respond to government requests</li>
                        <li>Protect our rights, property, or safety</li>
                        <li>Prevent fraud or illegal activities</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Business Transfers</h3>
                    <p class="text-gray-700 leading-relaxed">
                        In the event of a merger, acquisition, or sale of assets, your information may be transferred to the new entity. We will notify you before your information becomes subject to a different privacy policy.
                    </p>
                </div>
            </div>

            <!-- Section 4: Data Security -->
            <div id="data-security" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">4</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Data Security</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We take the security of your personal information seriously and implement appropriate technical and organizational measures to protect it from unauthorized access, disclosure, alteration, or destruction.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Security Measures</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Encryption of data in transit and at rest</li>
                        <li>Secure socket layer (SSL) technology</li>
                        <li>Regular security audits and vulnerability assessments</li>
                        <li>Access controls and authentication requirements</li>
                        <li>Employee training on data protection</li>
                        <li>Incident response procedures</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Your Responsibility</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        While we implement robust security measures, you are responsible for maintaining the confidentiality of your account credentials. Choose a strong password and do not share it with others. Notify us immediately if you suspect unauthorized access to your account.
                    </p>

                    <div class="bg-orange/10 border-l-4 border-orange rounded p-4 mt-4">
                        <p class="text-gray-700 leading-relaxed">
                            <strong class="text-dark-blue">Important:</strong> No method of transmission over the internet is 100% secure. While we strive to protect your information, we cannot guarantee absolute security.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 5: Your Rights and Choices -->
            <div id="your-rights" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">5</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Your Rights and Choices</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You have certain rights regarding your personal information:
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Access and Portability</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You have the right to access your personal information and request a copy in a portable format. You can download your data from your account settings or contact us for assistance.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Correction and Update</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You can update your account information at any time through your profile settings. If you need help correcting your information, contact our support team.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Deletion</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You have the right to request deletion of your personal information. We will delete your data unless we are required to retain it for legal or operational purposes. To request deletion, contact us at privacy@autorepair.ng.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Marketing Communications</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You can opt out of promotional emails by clicking the "unsubscribe" link in any marketing email or adjusting your notification preferences in your account settings. Note that you will still receive transactional emails related to your bookings and account.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Location Services</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You can control location permissions through your device settings. Disabling location services may limit certain features of our platform.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Do Not Track</h3>
                    <p class="text-gray-700 leading-relaxed">
                        We do not currently respond to "Do Not Track" signals from web browsers. We may implement such functionality in the future.
                    </p>
                </div>
            </div>

            <!-- Section 6: Cookies and Tracking -->
            <div id="cookies" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">6</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Cookies and Tracking Technologies</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We use cookies and similar tracking technologies to enhance your experience on our platform, analyze usage patterns, and deliver personalized content.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Types of Cookies We Use</h3>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li><strong>Essential Cookies:</strong> Required for the platform to function properly</li>
                        <li><strong>Performance Cookies:</strong> Help us understand how visitors use our platform</li>
                        <li><strong>Functional Cookies:</strong> Remember your preferences and settings</li>
                        <li><strong>Advertising Cookies:</strong> Deliver relevant advertisements and track campaign performance</li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Managing Cookies</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Most web browsers allow you to control cookies through their settings. You can typically find cookie controls in the "Options" or "Preferences" menu. Note that disabling cookies may affect the functionality of our platform.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Third-Party Analytics</h3>
                    <p class="text-gray-700 leading-relaxed">
                        We use third-party analytics services such as Google Analytics to understand platform usage. These services use cookies to collect information about your interactions with our platform. You can opt out of Google Analytics by installing the Google Analytics Opt-out Browser Add-on.
                    </p>
                </div>
            </div>

            <!-- Section 7: Data Retention -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">7</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Data Retention</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We retain your personal information for as long as necessary to provide our services, comply with legal obligations, resolve disputes, and enforce our agreements.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When you delete your account, we will delete or anonymize your personal information within 90 days, unless we are required to retain it for legal, tax, or regulatory purposes.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        Certain information may be retained in backup systems for a limited time before permanent deletion. Anonymized or aggregated data may be retained indefinitely for analytical purposes.
                    </p>
                </div>
            </div>

            <!-- Section 8: Children's Privacy -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">8</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Children's Privacy</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Our platform is not intended for individuals under the age of 18. We do not knowingly collect personal information from children. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        If we discover that we have inadvertently collected information from a child under 18, we will take steps to delete that information as soon as possible.
                    </p>
                </div>
            </div>

            <!-- Section 9: International Data Transfers -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">9</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">International Data Transfers</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Your information may be processed and stored on servers located outside Nigeria, including in countries that may have different data protection laws. By using our platform, you consent to the transfer of your information to these locations.
                    </p>
                    <p class="text-gray-700 leading-relaxed">
                        We take appropriate measures to ensure that your information receives adequate protection in accordance with this Privacy Policy, regardless of where it is processed.
                    </p>
                </div>
            </div>

            <!-- Section 10: Changes to This Policy -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">10</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Changes to This Privacy Policy</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We may update this Privacy Policy from time to time to reflect changes in our practices, technology, legal requirements, or other factors. We will notify you of any material changes by:
                    </p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Posting the updated policy on our platform</li>
                        <li>Sending you an email notification</li>
                        <li>Displaying a prominent notice on our platform</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">
                        Your continued use of our platform after changes become effective constitutes acceptance of the updated Privacy Policy. We encourage you to review this policy periodically to stay informed about how we protect your information.
                    </p>
                </div>
            </div>

            <!-- Section 11: Contact Us -->
            <div id="contact" class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">11</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Contact Us About Privacy</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you have any questions, concerns, or requests regarding this Privacy Policy or our data practices, please contact us:
                    </p>
                    <div class="bg-background rounded-lg p-6 space-y-3">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-envelope text-dark-blue w-6 mr-3"></i>
                            <span>privacy@wheelitin.co.uk</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-shield-alt text-dark-blue w-6 mr-3"></i>
                            <span>Data Protection Officer</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-phone text-dark-blue w-6 mr-3"></i>
                            <span>+44 123 456 </span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-map-marker-alt text-dark-blue w-6 mr-3"></i>
                            <span>Lagos, Nigeria</span>
                        </div>
                    </div>
                    <p class="text-gray-700 leading-relaxed mt-4">
                        We will respond to your inquiries within 30 days of receipt.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<x-footer />

@endsection