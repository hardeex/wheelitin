@extends('components.base')
@section('title', 'Cookie Policy - Auto Repair')
@section('content')

<!-- Hero Section -->
<section class="bg-dark-blue text-white py-16">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-display font-bold mb-4">Cookie Policy</h1>
            <p class="text-xl text-baby-blue mb-6">Last Updated: December 20, 2025</p>
            <p class="text-lg text-white/80">Learn how we use cookies to improve your experience</p>
        </div>
    </div>
</section>

<!-- Quick Navigation -->
<section class="bg-white border-b sticky top-0 z-10 shadow-sm">
    <div class="container mx-auto px-4">
        <div class="flex overflow-x-auto py-4 space-x-6">
            <a href="#what-are-cookies" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">What Are Cookies</a>
            <a href="#why-we-use" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Why We Use Them</a>
            <a href="#types" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Types of Cookies</a>
            <a href="#third-party" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Third-Party Cookies</a>
            <a href="#manage" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Manage Cookies</a>
            <a href="#contact" class="text-sm font-medium text-gray-600 hover:text-dark-blue whitespace-nowrap">Contact</a>
        </div>
    </div>
</section>

<!-- Cookie Content -->
<section class="py-16 bg-background">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            
            <!-- Introduction -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-cookie-bite text-dark-blue"></i>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Introduction</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        This Cookie Policy explains how we use cookies and similar tracking technologies on our auto repair service platform. By using our website or mobile application, you consent to the use of cookies as described in this policy.
                    </p>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We use cookies to enhance your experience, provide personalized content, analyze usage patterns, and improve our services. This policy provides detailed information about the types of cookies we use and how you can manage them.
                    </p>
                    <div class="bg-baby-blue/10 border-l-4 border-baby-blue rounded p-4 mt-4">
                        <p class="text-gray-700 leading-relaxed">
                            <strong class="text-dark-blue">Quick Summary:</strong> We use cookies to make our platform work better for you. You can control most cookies through your browser settings, but some are essential for the platform to function properly.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 1: What Are Cookies -->
            <div id="what-are-cookies" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">1</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">What Are Cookies?</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Cookies are small text files that are stored on your device (computer, smartphone, or tablet) when you visit a website. They help websites remember information about your visit, such as your preferences, login status, and browsing activities.
                    </p>
                    
                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">How Cookies Work</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        When you visit our platform, our server sends a cookie to your device. Your browser stores this cookie and sends it back to our server with each subsequent request. This allows us to recognize you and remember your preferences across different pages and visits.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-2 mt-6">Similar Technologies</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">In addition to cookies, we may use other tracking technologies:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2">
                        <li><strong>Web Beacons:</strong> Small graphic images (also known as pixel tags) that track user behavior</li>
                        <li><strong>Local Storage:</strong> Browser storage that allows us to store data locally on your device</li>
                        <li><strong>Session Storage:</strong> Temporary storage that is cleared when you close your browser</li>
                        <li><strong>SDKs:</strong> Software development kits used in mobile applications for analytics and functionality</li>
                    </ul>
                </div>
            </div>

            <!-- Section 2: Why We Use Cookies -->
            <div id="why-we-use" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">2</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Why We Use Cookies</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We use cookies to provide you with a better, faster, and safer experience on our platform. Here's how cookies help us serve you better:
                    </p>

                    <div class="space-y-6">
                        <!-- Authentication -->
                        <div class="bg-background rounded-lg p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-sky-blue/20 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-user-lock text-sky-blue text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Authentication & Security</h3>
                                    <p class="text-gray-700 leading-relaxed">Keep you logged in securely, prevent unauthorized access, and protect against fraudulent activities.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Functionality -->
                        <div class="bg-background rounded-lg p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-sky-blue/20 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-cog text-sky-blue text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Functionality & Preferences</h3>
                                    <p class="text-gray-700 leading-relaxed">Remember your settings, language preferences, location, and other customizations to provide a personalized experience.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Performance -->
                        <div class="bg-background rounded-lg p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-sky-blue/20 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-chart-line text-sky-blue text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Performance & Analytics</h3>
                                    <p class="text-gray-700 leading-relaxed">Understand how visitors use our platform, identify areas for improvement, and optimize performance.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Marketing -->
                        <div class="bg-background rounded-lg p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0 w-10 h-10 bg-sky-blue/20 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-bullhorn text-sky-blue text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-dark-blue mb-2">Marketing & Communication</h3>
                                    <p class="text-gray-700 leading-relaxed">Show you relevant advertisements, measure campaign effectiveness, and deliver personalized content.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 3: Types of Cookies We Use -->
            <div id="types" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">3</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Types of Cookies We Use</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-6">
                        We use different types of cookies for various purposes. Here's a breakdown of each category:
                    </p>

                    <!-- Strictly Necessary Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6 mb-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-semibold text-dark-blue">Strictly Necessary Cookies</h3>
                            <span class="bg-orange text-white text-xs px-3 py-1 rounded-full font-semibold">REQUIRED</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            These cookies are essential for the platform to function properly. They enable core functionality such as security, network management, and accessibility. You cannot opt out of these cookies.
                        </p>
                        <div class="bg-background rounded p-4">
                            <p class="text-sm text-gray-600 mb-2"><strong>Examples:</strong></p>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Session cookies for authentication</li>
                                <li>• Security cookies for fraud prevention</li>
                                <li>• Load balancing cookies</li>
                                <li>• Cookie consent preferences</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Performance Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6 mb-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-semibold text-dark-blue">Performance Cookies</h3>
                            <span class="bg-sky-blue text-white text-xs px-3 py-1 rounded-full font-semibold">OPTIONAL</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            These cookies collect information about how you use our platform, such as which pages you visit most often. This data helps us improve the platform's performance and user experience.
                        </p>
                        <div class="bg-background rounded p-4">
                            <p class="text-sm text-gray-600 mb-2"><strong>Examples:</strong></p>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Google Analytics cookies</li>
                                <li>• Page load time tracking</li>
                                <li>• Error reporting cookies</li>
                                <li>• A/B testing cookies</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Functional Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6 mb-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-semibold text-dark-blue">Functional Cookies</h3>
                            <span class="bg-sky-blue text-white text-xs px-3 py-1 rounded-full font-semibold">OPTIONAL</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            These cookies enable enhanced functionality and personalization, such as remembering your preferences, location, and language settings.
                        </p>
                        <div class="bg-background rounded p-4">
                            <p class="text-sm text-gray-600 mb-2"><strong>Examples:</strong></p>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Language preference cookies</li>
                                <li>• Location settings</li>
                                <li>• Video player preferences</li>
                                <li>• Recent searches history</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Targeting/Advertising Cookies -->
                    <div class="border border-gray-200 rounded-lg p-6 mb-6">
                        <div class="flex items-start justify-between mb-3">
                            <h3 class="text-lg font-semibold text-dark-blue">Targeting/Advertising Cookies</h3>
                            <span class="bg-sky-blue text-white text-xs px-3 py-1 rounded-full font-semibold">OPTIONAL</span>
                        </div>
                        <p class="text-gray-700 leading-relaxed mb-3">
                            These cookies track your browsing habits to deliver relevant advertisements based on your interests. They also help us measure the effectiveness of our marketing campaigns.
                        </p>
                        <div class="bg-background rounded p-4">
                            <p class="text-sm text-gray-600 mb-2"><strong>Examples:</strong></p>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>• Facebook Pixel</li>
                                <li>• Google Ads cookies</li>
                                <li>• Retargeting cookies</li>
                                <li>• Social media sharing cookies</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Cookie Duration -->
                    <div class="bg-orange/10 border-l-4 border-orange rounded p-4 mt-6">
                        <h4 class="font-semibold text-dark-blue mb-2">Cookie Duration</h4>
                        <p class="text-gray-700 text-sm mb-2">Cookies can be classified by how long they remain active:</p>
                        <ul class="text-sm text-gray-700 space-y-1">
                            <li>• <strong>Session Cookies:</strong> Deleted when you close your browser</li>
                            <li>• <strong>Persistent Cookies:</strong> Remain on your device for a set period or until manually deleted</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Section 4: Third-Party Cookies -->
            <div id="third-party" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">4</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Third-Party Cookies and Services</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We work with trusted third-party partners who may set cookies on our platform to provide their services. These partners have their own privacy policies governing their use of cookies.
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-3 mt-6">Third-Party Services We Use</h3>

                    <div class="space-y-4">
                        <!-- Google Analytics -->
                        <div class="bg-background rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-chart-bar text-dark-blue mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-dark-blue mb-1">Google Analytics</h4>
                                    <p class="text-sm text-gray-600 mb-2">Tracks website usage and provides insights into visitor behavior.</p>
                                    <a href="https://policies.google.com/privacy" target="_blank" class="text-sky-blue text-sm hover:underline">Google Privacy Policy →</a>
                                </div>
                            </div>
                        </div>

                        <!-- Facebook Pixel -->
                        <div class="bg-background rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fab fa-facebook text-dark-blue mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-dark-blue mb-1">Facebook Pixel</h4>
                                    <p class="text-sm text-gray-600 mb-2">Measures advertising effectiveness and delivers relevant ads.</p>
                                    <a href="https://www.facebook.com/privacy/policy/" target="_blank" class="text-sky-blue text-sm hover:underline">Facebook Privacy Policy →</a>
                                </div>
                            </div>
                        </div>

                        <!-- Google Ads -->
                        <div class="bg-background rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-ad text-dark-blue mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-dark-blue mb-1">Google Ads</h4>
                                    <p class="text-sm text-gray-600 mb-2">Delivers targeted advertising based on your interests.</p>
                                    <a href="https://policies.google.com/technologies/ads" target="_blank" class="text-sky-blue text-sm hover:underline">Google Ads Privacy →</a>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Processors -->
                        <div class="bg-background rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-credit-card text-dark-blue mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-dark-blue mb-1">Payment Processors (Paystack, Flutterwave)</h4>
                                    <p class="text-sm text-gray-600 mb-2">Securely process payments and prevent fraud.</p>
                                    <a href="https://paystack.com/privacy" target="_blank" class="text-sky-blue text-sm hover:underline mr-3">Paystack Privacy →</a>
                                    <a href="https://flutterwave.com/privacy-policy" target="_blank" class="text-sky-blue text-sm hover:underline">Flutterwave Privacy →</a>
                                </div>
                            </div>
                        </div>

                        <!-- Intercom/Support -->
                        <div class="bg-background rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-comments text-dark-blue mr-3 mt-1"></i>
                                <div>
                                    <h4 class="font-semibold text-dark-blue mb-1">Customer Support Tools</h4>
                                    <p class="text-sm text-gray-600">Enable live chat and customer support functionality.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p class="text-gray-700 leading-relaxed mt-6">
                        We carefully select our third-party partners and require them to handle data responsibly. However, we are not responsible for the privacy practices of these third parties.
                    </p>
                </div>
            </div>

            <!-- Section 5: How to Manage Cookies -->
            <div id="manage" class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">5</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">How to Manage Cookies</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        You have several options to control and manage cookies on our platform:
                    </p>

                    <h3 class="text-lg font-semibold text-dark-blue mb-3 mt-6">Browser Settings</h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Most web browsers allow you to control cookies through their settings. You can set your browser to refuse cookies or delete certain cookies. Here's how to manage cookies in popular browsers:
                    </p>

                    <div class="grid md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-background rounded-lg p-4">
                            <h4 class="font-semibold text-dark-blue mb-2 flex items-center">
                                <i class="fab fa-chrome text-orange mr-2"></i> Google Chrome
                            </h4>
                            <p class="text-sm text-gray-600">Settings → Privacy and Security → Cookies and other site data</p>
                        </div>
                        <div class="bg-background rounded-lg p-4">
                            <h4 class="font-semibold text-dark-blue mb-2 flex items-center">
                                <i class="fab fa-firefox text-orange mr-2"></i> Mozilla Firefox
                            </h4>
                            <p class="text-sm text-gray-600">Options → Privacy & Security → Cookies and Site Data</p>
                        </div>
                        <div class="bg-background rounded-lg p-4">
                            <h4 class="font-semibold text-dark-blue mb-2 flex items-center">
                                <i class="fab fa-safari text-orange mr-2"></i> Safari
                            </h4>
                            <p class="text-sm text-gray-600">Preferences → Privacy → Cookies and website data</p>
                        </div>
                        <div class="bg-background rounded-lg p-4">
                            <h4 class="font-semibold text-dark-blue mb-2 flex items-center">
                                <i class="fab fa-edge text-orange mr-2"></i> Microsoft Edge
                            </h4>
                            <p class="text-sm text-gray-600">Settings → Cookies and site permissions → Cookies</p>
                        </div>
                    </div>

                    <h3 class="text-lg font-semibold text-dark-blue mb-3 mt-6">Opt-Out Tools</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">You can opt out of specific types of cookies:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li><strong>Google Analytics:</strong> Install the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" class="text-sky-blue hover:underline">Google Analytics Opt-out Browser Add-on</a></li>
                        <li><strong>Advertising:</strong> Visit <a href="http://www.youronlinechoices.com/" target="_blank" class="text-sky-blue hover:underline">Your Online Choices</a> or <a href="https://optout.aboutads.info/" target="_blank" class="text-sky-blue hover:underline">Digital Advertising Alliance</a></li>
                        <li><strong>Facebook Ads:</strong> Adjust your <a href="https://www.facebook.com/ads/preferences" target="_blank" class="text-sky-blue hover:underline">Facebook Ad Preferences</a></li>
                    </ul>

                    <h3 class="text-lg font-semibold text-dark-blue mb-3 mt-6">Mobile Devices</h3>
                    <p class="text-gray-700 leading-relaxed mb-2">For mobile apps, you can manage tracking through your device settings:</p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li><strong>iOS:</strong> Settings → Privacy → Tracking → Limit Ad Tracking</li>
                        <li><strong>Android:</strong> Settings → Google → Ads → Opt out of Ads Personalization</li>
                    </ul>

                    <div class="bg-orange/10 border-l-4 border-orange rounded p-4 mt-6">
                        <p class="text-gray-700 leading-relaxed">
                            <strong class="text-dark-blue">Important:</strong> Blocking or deleting cookies may affect the functionality of our platform. Some features may not work properly without cookies enabled.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Section 6: Updates to This Policy -->
            <div class="bg-white rounded-xl shadow-sm p-8 mb-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">6</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Updates to This Cookie Policy</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        We may update this Cookie Policy from time to time to reflect changes in our practices, technology, or legal requirements. When we make significant changes, we will:
                    </p>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 mb-4">
                        <li>Update the "Last Updated" date at the top of this page</li>
                        <li>Display a notification on our platform</li>
                        <li>Send you an email if the changes are material</li>
                    </ul>
                    <p class="text-gray-700 leading-relaxed">
                        We encourage you to review this Cookie Policy periodically to stay informed about how we use cookies.
                    </p>
                </div>
            </div>

            <!-- Section 7: Contact Us -->
            <div id="contact" class="bg-white rounded-xl shadow-sm p-8">
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center mr-4">
                        <span class="text-dark-blue font-bold">7</span>
                    </div>
                    <h2 class="text-2xl font-display font-bold text-dark-blue">Questions About Cookies?</h2>
                </div>
                <div class="prose max-w-none ml-14">
                    <p class="text-gray-700 leading-relaxed mb-4">
                        If you have any questions about our use of cookies or this Cookie Policy, please contact us:
                    </p>
                    <div class="bg-background rounded-lg p-6 space-y-3">
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-envelope text-dark-blue w-6 mr-3"></i>
                            <span>privacy@wheelitin.co.uk</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-cookie-bite text-dark-blue w-6 mr-3"></i>
                            <span>Cookie Policy Inquiries</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <i class="fas fa-phone text-dark-blue w-6 mr-3"></i>
                            <span>+44 123 5566</span>
                        </div>
                        <div class="flex items-center text<div class="flex items-center text-gray-700">
                            <i class="fas fa-map-marker-alt text-dark-blue w-6 mr-3"></i>
                            <span>United Kingdom</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Cookie Preference Center -->
<section class="bg-white py-12 border-t">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="bg-background rounded-2xl p-8 md:p-12">
                <i class="fas fa-sliders-h text-dark-blue text-5xl mb-4"></i>
                <h2 class="text-2xl font-display font-bold text-dark-blue mb-4">Manage Your Cookie Preferences</h2>
                <p class="text-gray-700 mb-6">You can change your cookie settings at any time by adjusting your browser preferences or using the tools below.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button class="inline-block bg-dark-blue text-white font-semibold px-8 py-3 rounded-lg hover:bg-sky-blue transition">
                        <i class="fas fa-cog mr-2"></i>Cookie Settings
                    </button>
                    <a href="{{ route('privacy') }}" 
                        class="inline-block bg-white text-dark-blue border-2 border-dark-blue font-semibold px-8 py-3 rounded-lg hover:bg-baby-blue hover:border-baby-blue hover:text-white transition">
                        <i class="fas fa-shield-alt mr-2"></i>Privacy Policy
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-dark-blue py-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-2xl font-display font-bold text-white mb-4">Still Have Questions?</h2>
        <p class="text-baby-blue mb-6">Our team is here to help you understand our cookie practices</p>
        <a href="{{ route('contact') }}" 
            class="inline-block bg-orange text-white font-semibold px-8 py-3 rounded-lg hover:bg-sun transition">
            <i class="fas fa-envelope mr-2"></i>Contact Us
        </a>
    </div>
</section>

<x-footer />
@endsection