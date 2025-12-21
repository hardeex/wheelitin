<section class="relative overflow-hidden bg-gradient-to-br from-blue-600 via-blue-700 to-indigo-800 py-16 px-4 sm:px-6 lg:px-8">
    <!-- Decorative background elements -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left content -->
            <div class="text-white space-y-6">
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>10,000+ Issues Resolved</span>
                </div>
                
                <h2 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight">
                    Car Acting Up?
                    <span class="block text-blue-200 mt-2">We've Got You Covered</span>
                </h2>
                
                <p class="text-lg sm:text-xl text-blue-100 leading-relaxed max-w-xl">
                    Report your car issue in under 2 minutes and connect with verified mechanics near you. Get instant quotes and transparent pricing.
                </p>
                
                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="{{ route('report.car.issue') }}" class="group bg-white text-blue-700 px-8 py-4 rounded-lg font-semibold text-lg shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-200 flex items-center gap-2">
                        Report Car Issue
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    
                    <a href="{{ route('how-it-works') }}" class="bg-white/10 backdrop-blur-sm text-white px-8 py-4 rounded-lg font-semibold text-lg border-2 border-white/30 hover:bg-white/20 transition-all duration-200">
                        How It Works
                    </a>
                </div>
                
                <div class="flex items-center gap-8 pt-4 text-sm">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Free to use</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>No credit card</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Instant quotes</span>
                    </div>
                </div>
            </div>
            
            <!-- Right visual element -->
            <div class="hidden lg:block">
                <div class="relative">
                    <!-- Floating card -->
                    <div class="bg-white rounded-2xl shadow-2xl p-8 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                        <div class="flex items-start gap-4 mb-6">
                            <div class="bg-blue-100 p-3 rounded-xl">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg mb-1">Quick & Easy</h3>
                                <p class="text-gray-600 text-sm">Describe your issue in minutes</p>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Upload Photos</span>
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-green-500 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                            
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Select Service</span>
                                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-green-500 rounded-full" style="width: 100%"></div>
                                </div>
                            </div>
                            
                            <div class="bg-blue-50 rounded-lg p-4 border-2 border-blue-200 border-dashed">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-blue-700">Get Quotes</span>
                                    <div class="flex">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse ml-1" style="animation-delay: 0.2s"></div>
                                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse ml-1" style="animation-delay: 0.4s"></div>
                                    </div>
                                </div>
                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-500 rounded-full animate-pulse" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <div class="flex items-center gap-3">
                                <div class="flex -space-x-2">
                                    <div class="w-8 h-8 rounded-full bg-blue-500 border-2 border-white"></div>
                                    <div class="w-8 h-8 rounded-full bg-green-500 border-2 border-white"></div>
                                    <div class="w-8 h-8 rounded-full bg-purple-500 border-2 border-white"></div>
                                </div>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-gray-900">1,247 mechanics</span> ready to help
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating badge -->
                    <div class="absolute -top-4 -right-4 bg-yellow-400 text-yellow-900 px-4 py-2 rounded-full font-bold text-sm shadow-lg transform rotate-12 animate-bounce">
                        Average 15 min response!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>