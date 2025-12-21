<div class="bg-gradient-to-br from-blue-50 to-slate-100 min-h-screen py-8 px-4">
    <div class="max-w-6xl mx-auto">

        <!-- Hero Section with Image -->
        <div class="grid lg:grid-cols-2 gap-8 items-center mb-8">
            <!-- Left: Text Content -->
            <div class="text-center lg:text-left">
                <div
                    class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-4 shadow-lg lg:mx-0 mx-auto">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-3">Report Your Car Issue</h1>
                <p class="text-lg text-gray-600 max-w-md lg:mx-0 mx-auto mb-6">Get matched with trusted local mechanics
                    who'll provide accurate quotes for your repair</p>

                <!-- Trust Badges -->
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Verified Mechanics</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Fast Response</span>
                    </div>
                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                            </path>
                        </svg>
                        <span class="text-sm font-medium text-gray-700">Secure & Private</span>
                    </div>
                </div>
            </div>

            <!-- Right: Hero Image -->
            <div class="hidden lg:block">
                <div class="relative">
                    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 rounded-2xl p-8 shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1486262715619-67b85e0b08d3?w=600&h=400&fit=crop"
                            alt="Mechanic working on car" class="rounded-xl shadow-lg w-full h-64 object-cover">

                    </div>
                    <div
                        class="absolute -top-4 -right-4 bg-yellow-400 text-yellow-900 px-4 py-2 rounded-full font-bold text-sm shadow-lg transform rotate-6">
                        📞 15 min response!
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-2xl mx-auto">
            <!-- Progress Indicator -->
            <div class="bg-white rounded-2xl shadow-sm p-6 mb-6">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-sm font-medium text-blue-600">Step <span id="currentStep">1</span> of 3</span>
                    <span class="text-sm text-gray-500"><span id="progressPercent">33</span>% Complete</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2">
                    <div id="progressBar" class="bg-blue-600 h-2 rounded-full transition-all duration-300"
                        style="width: 33%"></div>
                </div>
            </div>

            {{-- <!-- Error/Success Messages -->
      @if (session('error'))
      <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6">
        {{ session('error') }}
      </div>
      @endif

      @if (session('success'))
      <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-6">
        {{ session('success') }}
      </div>
      @endif --}}

            @include('feedback')

            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <form id="issueForm" class="p-8" method="POST" action="{{ route('issues.submit') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <!-- Step 1: Vehicle & Issue Details (REQUIRED) -->
                    <div id="step1" class="form-step">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span
                                class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full mr-3 text-sm font-bold">1</span>
                            Vehicle & Issue Details
                        </h2>

                        <div class="space-y-5">
                            <!-- Car Make -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Car Make *</label>
                                <select name="carMaker" id="carMaker" required
                                    class="form-select w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-gray-900">
                                    <option value="" disabled selected>Select your car make</option>
                                    <option>Audi</option>
                                    <option>BMW</option>
                                    <option>Chevrolet</option>
                                    <option>Fiat</option>
                                    <option>Ford</option>
                                    <option>Honda</option>
                                    <option>Hyundai</option>
                                    <option>Jaguar</option>
                                    <option>Jeep</option>
                                    <option>Kia</option>
                                    <option>Land Rover</option>
                                    <option>Lexus</option>
                                    <option>Mazda</option>
                                    <option>Mercedes-Benz</option>
                                    <option>Mini</option>
                                    <option>Nissan</option>
                                    <option>Peugeot</option>
                                    <option>Renault</option>
                                    <option>Skoda</option>
                                    <option>Subaru</option>
                                    <option>Suzuki</option>
                                    <option>Tesla</option>
                                    <option>Toyota</option>
                                    <option>Volkswagen</option>
                                    <option>Volvo</option>
                                    <option>Other</option>
                                </select>

                                <input type="text" name="carMakerOther" id="carMakerOther"
                                    placeholder="Enter your car make"
                                    class="form-input hidden w-full mt-3 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
                            </div>


                            <!-- Car Model and Year -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="form-group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Model *</label>
                                    <input type="text" name="carModel" id="carModel" required
                                        placeholder="e.g., Camry, Accord"
                                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
                                </div>

                                <div class="form-group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Year *</label>
                                    <select name="carYear" id="carYear" required
                                        class="form-select w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-gray-900">
                                        <option value="" disabled selected>Select year</option>
                                        <option>2026</option>
                                        <option>2025</option>
                                        <option>2024</option>
                                        <option>2023</option>
                                        <option>2022</option>
                                        <option>2021</option>
                                        <option>2020</option>
                                        <option>2019</option>
                                        <option>2018</option>
                                        <option>2017</option>
                                        <option>2016</option>
                                        <option>2015</option>
                                        <option>2014</option>
                                        <option>2013</option>
                                        <option>2012</option>
                                        <option>2011</option>
                                        <option>2010</option>
                                        <option>2009</option>
                                        <option>2008</option>
                                        <option>2007</option>
                                        <option>2006</option>
                                        <option>2005</option>
                                        <option>2004</option>
                                        <option>2003</option>
                                        <option>2002</option>
                                        <option>2001</option>
                                        <option>2000</option>
                                        <option>1999</option>
                                        <option>1998</option>
                                        <option>1997</option>
                                        <option>1996</option>
                                        <option>1995</option>
                                        <option>1994</option>
                                        <option>1993</option>
                                        <option>1992</option>
                                        <option>1991</option>
                                        <option>1990</option>
                                        <option>1989</option>
                                        <option>1988</option>
                                        <option>1987</option>
                                        <option>1986</option>
                                        <option>1985</option>
                                        <option>1984</option>
                                        <option>1983</option>
                                        <option>1982</option>
                                        <option>1981</option>
                                        <option>1980</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Type of Issue -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">What's wrong? *</label>
                                <select name="issueType" id="issueType" required
                                    class="form-select w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-gray-900">
                                    <option value="" disabled selected>Select the type of issue</option>

                                    <!-- Engine & Performance -->
                                    <option value="engine-starting">Engine won't start</option>
                                    <option value="engine-overheating">Engine overheating</option>
                                    <option value="engine-noise">Unusual engine noise</option>
                                    <option value="poor-performance">Poor acceleration or power</option>
                                    <option value="oil-leak">Oil leak</option>

                                    <!-- Transmission / Gearbox -->
                                    <option value="gear-slipping">Gear slipping / shifting issues</option>
                                    <option value="clutch">Clutch problems</option>
                                    <option value="transmission-fluid">Transmission fluid leak</option>

                                    <!-- Brakes & Suspension -->
                                    <option value="brake-noise">Brake noise or vibration</option>
                                    <option value="soft-brakes">Soft or unresponsive brakes</option>
                                    <option value="suspension">Suspension / ride comfort issues</option>
                                    <option value="steering">Steering issues or alignment</option>

                                    <!-- Electrical / Battery -->
                                    <option value="battery-dead">Battery not charging / dead</option>
                                    <option value="lights-not-working">Lights not working</option>
                                    <option value="power-windows">Power windows / locks not working</option>
                                    <option value="alternator">Alternator / charging system issue</option>

                                    <!-- Air Conditioning / Heating -->
                                    <option value="ac-not-cooling">AC not cooling</option>
                                    <option value="heater-not-working">Heater not working</option>
                                    <option value="blower-issue">Blower fan not working</option>

                                    <!-- Bodywork / Paint -->
                                    <option value="dent">Dent or scratch</option>
                                    <option value="paint-damage">Paint damage or rust</option>
                                    <option value="bumper">Bumper or panel damage</option>
                                    <option value="glass">Windshield or glass damage</option>

                                    <!-- Dashboard / Electronics -->
                                    <option value="warning-light">Warning light on dashboard</option>
                                    <option value="sensor-issue">Sensor / diagnostic issue</option>

                                    <!-- Other -->
                                    <option value="other">Other (please specify)</option>
                                </select>

                                <input type="text" name="issueTypeOther" id="issueTypeOther"
                                    placeholder="Please describe your issue"
                                    class="form-input hidden w-full mt-3 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
                            </div>


                            <!-- Describe Issue -->
                            {{-- <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Describe the problem
                                    *</label>
                                <textarea name="description" id="description" required rows="5"
                                    placeholder="Tell us what's happening... When did you first notice it? Does it happen all the time or only sometimes?"
                                    class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
                                <p class="text-xs text-gray-500 mt-2">💡 Tip: The more details you provide, the more
                                    accurate the quotes will be</p>
                            </div> --}}


                            <div class="form-group">
    <label class="block text-sm font-semibold text-gray-700 mb-2">Describe the problem *</label>
    
    <div class="relative">
        <textarea name="description" id="description" required rows="5"
            placeholder="Tell us what's happening... When did you first notice it? Does it happen all the time or only sometimes?"
            class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition resize-none"></textarea>
        
        <!-- AI Improve Button -->
        <button type="button" id="aiImproveBtn"
            class="absolute bottom-3 right-3 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition shadow-sm flex items-center gap-1.5 disabled:opacity-50 disabled:cursor-not-allowed">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            <span id="aiImproveText">Improve with AI</span>
        </button>
    </div>

    <div class="flex items-start justify-between mt-2">
        <p class="text-xs text-gray-500">💡 Tip: The more details you provide, the more accurate the quotes will be</p>
        
        <!-- AI Suggestions Button -->
        <button type="button" id="aiSuggestionsBtn"
            class="text-xs text-blue-600 hover:text-blue-700 font-medium flex items-center gap-1">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            What to include?
        </button>
    </div>

    <!-- AI Suggestions Panel (hidden by default) -->
    <div id="aiSuggestionsPanel" class="hidden mt-3 bg-blue-50 border border-blue-200 rounded-xl p-4">
        <h4 class="text-sm font-semibold text-gray-900 mb-2">Help improve your description by answering:</h4>
        <ul id="aiSuggestionsList" class="text-xs text-gray-700 space-y-1.5">
            <!-- Suggestions will be loaded here -->
        </ul>
    </div>

    <!-- AI Improvement Result (hidden by default) -->
    <div id="aiImprovementResult" class="hidden mt-3 bg-green-50 border border-green-200 rounded-xl p-4">
        <div class="flex items-start justify-between mb-2">
            <h4 class="text-sm font-semibold text-green-900 flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                AI-Improved Description
            </h4>
            <button type="button" id="closeAIResult" class="text-gray-400 hover:text-gray-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <p id="aiImprovedText" class="text-sm text-gray-700 mb-3 whitespace-pre-wrap"></p>
        <div class="flex gap-2">
            <button type="button" id="useAIDescription"
                class="flex-1 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold px-3 py-2 rounded-lg transition">
                Use This Description
            </button>
            <button type="button" id="keepOriginal"
                class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 text-xs font-semibold px-3 py-2 rounded-lg transition">
                Keep Original
            </button>
        </div>
    </div>
</div>

                            <!-- Upload Images -->

                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Upload Photos *</label>

                                <!-- Preview Grid -->
                                <div class="flex flex-wrap gap-3 mb-4" id="imagePreview"></div>

                                <!-- Action Buttons -->
                                <div class="flex gap-3">
                                    <input type="file" name="images[]" id="images" accept="image/*" multiple
                                        class="hidden">

                                    <button type="button" id="chooseFilesBtn"
                                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2.5 px-4 rounded-xl transition flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16h10M12 3v13m-5 0h10"></path>
                                        </svg>
                                        Choose Files
                                    </button>

                                    <button type="button" id="takePhotoBtn"
                                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 px-4 rounded-xl transition flex items-center justify-center gap-2">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 9a2 2 0 012-2h14a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                            </path>
                                            <circle cx="12" cy="13" r="3"></circle>
                                        </svg>
                                        Take Photo
                                    </button>
                                </div>

                                <p class="text-xs text-gray-500 mt-2">Up to 5 images • JPG, PNG, GIF</p>
                            </div>

                            <!-- Location -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Your Location *</label>
                                <select name="location" id="location" required
                                    class="form-select w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-gray-900">
                                    <option value="" disabled selected>Select your location</option>
                                    <option>London</option>
                                    <option>Manchester</option>
                                    <option>Birmingham</option>
                                    <option>Leeds</option>
                                    <option>Glasgow</option>
                                    <option>Liverpool</option>
                                    <option>Bristol</option>
                                    <option>Sheffield</option>
                                    <option>Nottingham</option>
                                    <option>Leicester</option>
                                    <option>Newcastle upon Tyne</option>
                                    <option>Edinburgh</option>
                                    <option>Belfast</option>
                                    <option>Cardiff</option>
                                    <option>Southampton</option>
                                    <option>Portsmouth</option>
                                    <option>Cambridge</option>
                                    <option>Oxford</option>
                                    <option>Brighton</option>
                                    <option>Norwich</option>
                                    <option>Reading</option>
                                    <option>Derby</option>
                                    <option>Exeter</option>
                                    <option>Coventry</option>
                                    <option>Stoke-on-Trent</option>
                                    <option>York</option>
                                    <option>Milton Keynes</option>
                                    <option>Plymouth</option>
                                    <option>Swansea</option>
                                    <option>Aberdeen</option>
                                    <option>Other</option>
                                </select>

                                <input type="text" name="locationOther" id="locationOther"
                                    placeholder="Enter your town or postcode"
                                    class="form-input hidden w-full mt-3 px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition" />
                            </div>



                            <!-- Urgency -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    When do you need this done? *
                                </label>
                                <select name="urgency" id="urgency" required
                                    class="form-select w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white text-gray-900">
                                    <option value="" disabled selected>Select timeframe</option>
                                    <option value="urgent">ASAP (Car not driveable)</option>
                                    <option value="24hours">Within 24 hours</option>
                                    <option value="2-3days">Within 2–3 days</option>
                                    <option value="week">Within a week</option>
                                    <option value="flexible">Not urgent / Flexible</option>
                                </select>
                            </div>


                            <button type="button" onclick="nextStep()"
                                class="mt-8 w-full bg-blue-600 text-white font-semibold py-3.5 rounded-xl hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition duration-200 shadow-lg hover:shadow-xl">
                                Continue to Additional Details →
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Additional Details (OPTIONAL) -->
                    <div id="step2" class="form-step" style="display: none;">
                        <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                            <span
                                class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full mr-3 text-sm font-bold">2</span>
                            Additional Details (Optional)
                        </h2>

                        <div class="space-y-5">
                            <!-- LicensePlate -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    License Plate (Optional)
                                </label>
                                <input type="text" name="licensePlate" id="licensePlate"
                                    placeholder="e.g., AB12 CDE"
                                    class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>


                             <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Mileage (Optional)
                                </label>
                                <input type="text" name="mileage" id="mileage"
                                    placeholder="e.g. 32000"
                                    class="form-input w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                            </div>

                            <!-- Can the car be driven? -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Can the car be
                                    driven?</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="driveable" value="yes" class="sr-only peer">
                                        <span
                                            class="text-center font-medium text-gray-700 peer-checked:text-blue-600">✓
                                            Yes, it drives</span>
                                        <div
                                            class="absolute inset-0 border-2 border-blue-600 rounded-xl opacity-0 peer-checked:opacity-100 transition">
                                        </div>
                                    </label>
                                    <label
                                        class="relative flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="driveable" value="no" class="sr-only peer">
                                        <span
                                            class="text-center font-medium text-gray-700 peer-checked:text-blue-600">✗
                                            Not driveable</span>
                                        <div
                                            class="absolute inset-0 border-2 border-blue-600 rounded-xl opacity-0 peer-checked:opacity-100 transition">
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Preferred Service Type -->
                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Preferred Service
                                    Type</label>
                                <div class="space-y-2">
                                    <label
                                        class="flex items-start p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="serviceType" value="mobile"
                                            class="mt-1 mr-3 text-blue-600">
                                        <div>
                                            <span class="font-medium text-gray-900">🚗 Mobile Mechanic</span>
                                            <p class="text-xs text-gray-500 mt-1">Mechanic comes to your location
                                            </p>
                                        </div>
                                    </label>
                                    <label
                                        class="flex items-start p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="serviceType" value="garage"
                                            class="mt-1 mr-3 text-blue-600">
                                        <div>
                                            <span class="font-medium text-gray-900">🏪 Take to Garage</span>
                                            <p class="text-xs text-gray-500 mt-1">You drive the car to the garage
                                            </p>
                                        </div>
                                    </label>
                                    <label
                                        class="flex items-start p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="serviceType" value="collection"
                                            class="mt-1 mr-3 text-blue-600">
                                        <div>
                                            <span class="font-medium text-gray-900">🔄 Collection & Return</span>
                                            <p class="text-xs text-gray-500 mt-1">Garage collects and returns your
                                                car</p>
                                        </div>
                                    </label>
                                    <label
                                        class="flex items-start p-4 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                        <input type="radio" name="serviceType" value="diagnostic"
                                            class="mt-1 mr-3 text-blue-600">
                                        <div>
                                            <span class="font-medium text-gray-900">🔍 Diagnostic Only</span>
                                            <p class="text-xs text-gray-500 mt-1">Just need the issue diagnosed
                                                first</p>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Upload Videos (Optional) -->
                            {{-- <div class="form-group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-3">Upload Videos
                                        (Optional)</label>
                                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-500 transition cursor-pointer bg-gray-50"
                                        onclick="document.getElementById('videos').click()">
                                        <svg class="mx-auto h-10 w-10 text-gray-400 mb-2" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                        </svg>
                                        <p class="text-xs font-medium text-gray-700 mb-1">Click to upload videos</p>
                                        <p class="text-xs text-gray-500">Videos can help mechanics diagnose the issue
                                        </p>
                                        <input type="file" name="videos[]" id="videos" accept="video/*"
                                            multiple class="hidden">
                                    </div>
                                    <div id="videoPreview" class="mt-3"></div>
                                </div> --}}

                            <div class="form-group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Upload Videos
                                    (Optional)</label>
                                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-500 transition cursor-pointer bg-gray-50"
                                    onclick="document.getElementById('videos').click()">
                                    <svg class="mx-auto h-10 w-10 text-gray-400 mb-2" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                    </svg>
                                    <p class="text-xs font-medium text-gray-700 mb-1">Click to upload videos</p>
                                    <p class="text-xs text-gray-500">Videos can help mechanics diagnose the issue (Max
                                        50MB per video)</p>
                                    <input type="file" name="videos[]" id="videos" accept="video/*" multiple
                                        class="hidden">
                                </div>
                                <div id="videoPreview" class="mt-3"></div>
                            </div>
                        </div>

                        <div class="flex gap-3 mt-8">
                            <button type="button" onclick="prevStep()"
                                class="w-1/3 bg-gray-100 text-gray-700 font-semibold py-3.5 rounded-xl hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 focus:outline-none transition duration-200">
                                ← Back
                            </button>
                            <button type="button" onclick="nextStep()"
                                class="flex-1 bg-blue-600 text-white font-semibold py-3.5 rounded-xl hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none transition duration-200 shadow-lg hover:shadow-xl">
                                Continue to Contact Info →
                            </button>
                        </div>
                    </div>
            </div>

            <!-- Step 3: Contact Information (REQUIRED) -->
            <div id="step3" class="form-step" style="display: none;">
                <h2 class="text-xl font-semibold text-gray-900 mb-6 flex items-center">
                    <span
                        class="flex items-center justify-center w-8 h-8 bg-blue-100 text-blue-600 rounded-full mr-3 text-sm font-bold">3</span>
                    Contact Information
                </h2>

                <div class="space-y-5">
                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-6">
                        <h3 class="text-sm font-semibold text-gray-900 mb-4">How can mechanics reach you?
                        </h3>
                        <div class="space-y-4">
                            {{-- <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Name
                                                *</label>
                                            <input type="text" name="contactName" value="{{$user['first_name'] ['last_name'] ?? ''}}" id="contactName" required
                                                placeholder="e.g., John Doe"
                                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                                        </div> --}}
                            {{-- <div>
                                            <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number
                                                *</label>
                                            <input type="tel" name="contactPhone" id="contactPhone" required value="{{$user['phone'] ?? ''}}"
                                                placeholder="e.g., +234 801 234 5678"
                                                class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                                        </div> --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email </label>
                                <input type="email" name="contactEmail" id="contactEmail"
                                    value="{{ $user['email' ?? ''] }}" placeholder="e.g., john@example.com" readonly
                                    class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition bg-white">
                            </div>
                        </div>
                    </div>

                    <!-- Preferred Contact Method -->
                    {{-- <div class="form-group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-3">Preferred Contact
                                        Method *</label>
                                    <div class="grid grid-cols-2 gap-3">
                                        <label
                                            class="relative flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                            <input type="radio" name="preferredContact" value="phone" required
                                                class="sr-only peer">
                                            <span
                                                class="text-center font-medium text-gray-700 peer-checked:text-blue-600">📞
                                                Phone</span>
                                            <div
                                                class="absolute inset-0 border-2 border-blue-600 rounded-xl opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </label>
                                        <label
                                            class="relative flex items-center justify-center px-4 py-3 border-2 border-gray-300 rounded-xl cursor-pointer hover:border-blue-500 transition">
                                            <input type="radio" name="preferredContact" value="email" required
                                                class="sr-only peer">
                                           <span class="text-center font-medium text-gray-700 peer-checked:text-blue-600">Email</span>
                                            <div
                                                class="absolute inset-0 border-2 border-blue-600 rounded-xl opacity-0 peer-checked:opacity-100 transition">
                                            </div>
                                        </label>
                                    </div>
                                </div> --}}
                </div>

                <div class="flex gap-3 mt-8">
                    <button type="button" onclick="prevStep()"
                        class="w-1/3 bg-gray-100 text-gray-700 font-semibold py-3.5 rounded-xl hover:bg-gray-200 focus:ring-4 focus:ring-gray-300 focus:outline-none transition duration-200">
                        ← Back
                    </button>
                    <button type="submit" id="submitBtn"
                        class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-semibold py-3.5 rounded-xl hover:from-blue-700 hover:to-blue-800 focus:ring-4 focus:ring-blue-300 focus:outline-none transition duration-200 shadow-lg hover:shadow-xl">
                        Submit & Get Quotes 🎯
                    </button>
                </div>
            </div>
        </div>

        </form>
    </div>

    <!-- Trust Indicators -->
    <div class="mt-6 text-center">
        <p class="text-xs text-gray-500 max-w-xl mx-auto leading-relaxed">
            🔒 Your information is secure • 🛡️ Only verified mechanics will contact you • ⭐ Free quotes with no
            obligation
        </p>
    </div>
</div>
</div>
</div>

<script>
// AI Description Improvement Feature - Direct OjaFlow API Connection
document.addEventListener('DOMContentLoaded', function() {
    // Get OjaFlow API URL from backend
    const OJAFLOW_API_URL = '{{ config("api.ojaflow_ai_url") }}';
    
    const descriptionTextarea = document.getElementById('description');
    const aiImproveBtn = document.getElementById('aiImproveBtn');
    const aiImproveText = document.getElementById('aiImproveText');
    const aiSuggestionsBtn = document.getElementById('aiSuggestionsBtn');
    const aiSuggestionsPanel = document.getElementById('aiSuggestionsPanel');
    const aiSuggestionsList = document.getElementById('aiSuggestionsList');
    const aiImprovementResult = document.getElementById('aiImprovementResult');
    const aiImprovedText = document.getElementById('aiImprovedText');
    const useAIDescriptionBtn = document.getElementById('useAIDescription');
    const keepOriginalBtn = document.getElementById('keepOriginal');
    const closeAIResultBtn = document.getElementById('closeAIResult');

    let originalDescription = '';
    let improvedDescription = '';

    // AI Improve Button - Calls OjaFlow API directly
    aiImproveBtn.addEventListener('click', async function() {
        const description = descriptionTextarea.value.trim();

        if (description.length < 10) {
            alert('Please write at least 10 characters before using AI improvement.');
            descriptionTextarea.focus();
            return;
        }

        // Disable button and show loading
        aiImproveBtn.disabled = true;
        aiImproveText.textContent = 'Improving...';

        try {
            const response = await fetch(`${OJAFLOW_API_URL}/ai/improve-car-description`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    description: description,
                    carMaker: document.getElementById('carMaker')?.value,
                    carModel: document.getElementById('carModel')?.value,
                    carYear: document.getElementById('carYear')?.value,
                    issueType: document.getElementById('issueType')?.value,
                })
            });

            const data = await response.json();

            if (data.success) {
                originalDescription = description;
                improvedDescription = data.data.improved;

                // Show the improvement result
                aiImprovedText.textContent = improvedDescription;
                aiImprovementResult.classList.remove('hidden');

                // Scroll to result
                aiImprovementResult.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            } else {
                alert(data.message || 'Failed to improve description. Please try again.');
            }
        } catch (error) {
            console.error('AI Improvement Error:', error);
            alert('Failed to improve description. Please check your internet connection and try again.');
        } finally {
            // Re-enable button
            aiImproveBtn.disabled = false;
            aiImproveText.textContent = 'Improve with AI';
        }
    });

    // Use AI Description
    useAIDescriptionBtn.addEventListener('click', function() {
        descriptionTextarea.value = improvedDescription;
        aiImprovementResult.classList.add('hidden');
        
        // Show success feedback
        const feedback = document.createElement('div');
        feedback.className = 'text-xs text-green-600 mt-2 flex items-center gap-1';
        feedback.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Description updated!';
        descriptionTextarea.parentElement.appendChild(feedback);
        setTimeout(() => feedback.remove(), 3000);
    });

    // Keep Original
    keepOriginalBtn.addEventListener('click', function() {
        aiImprovementResult.classList.add('hidden');
    });

    // Close AI Result
    closeAIResultBtn.addEventListener('click', function() {
        aiImprovementResult.classList.add('hidden');
    });

    // AI Suggestions Button - Calls OjaFlow API directly
    aiSuggestionsBtn.addEventListener('click', async function() {
        const issueType = document.getElementById('issueType')?.value;

        if (!issueType) {
            alert('Please select an issue type first.');
            document.getElementById('issueType')?.focus();
            return;
        }

        // Toggle panel
        if (!aiSuggestionsPanel.classList.contains('hidden')) {
            aiSuggestionsPanel.classList.add('hidden');
            return;
        }

        // Show loading
        aiSuggestionsList.innerHTML = '<li class="text-gray-500 italic">Loading suggestions...</li>';
        aiSuggestionsPanel.classList.remove('hidden');

        try {
            const response = await fetch(`${OJAFLOW_API_URL}/ai/get-issue-suggestions`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    issueType: issueType
                })
            });

            const data = await response.json();

            if (data.success && data.data.suggestions.length > 0) {
                aiSuggestionsList.innerHTML = data.data.suggestions
                    .map(suggestion => `<li class="flex items-start gap-2"><span class="text-blue-600 mt-0.5">•</span><span>${suggestion}</span></li>`)
                    .join('');
            } else {
                aiSuggestionsList.innerHTML = '<li class="text-gray-500">No suggestions available at the moment.</li>';
            }
        } catch (error) {
            console.error('AI Suggestions Error:', error);
            aiSuggestionsList.innerHTML = '<li class="text-red-600">Failed to load suggestions. Please try again.</li>';
        }
    });
});
</script>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // ==============================================================
    // 1. CONFIG & STATE
    // ==============================================================
    const CLOUDINARY_UPLOAD_URL = 'https://api.cloudinary.com/v1_1/';
    const MAX_IMAGES = 5;
    const MAX_VIDEO_SIZE = 50 * 1024 * 1024; // 50MB in bytes
    const totalSteps = 3;
    
    let currentStep = 1;
    let imageFiles = []; // File objects for images
    let videoFiles = []; // File objects for videos
    let uploadedImageUrls = []; // Cloudinary URLs for uploaded images
    let uploadedVideoUrls = []; // Cloudinary URLs for uploaded videos

    // ==============================================================
    // 2. DOM ELEMENTS
    // ==============================================================
    const el = {
        // Progress
        currentStepEl: document.getElementById('currentStep'),
        progressPercentEl: document.getElementById('progressPercent'),
        progressBarEl: document.getElementById('progressBar'),

        // Steps
        step1: document.getElementById('step1'),
        step2: document.getElementById('step2'),
        step3: document.getElementById('step3'),

        // Form & Submit
        form: document.getElementById('issueForm'),
        submitBtn: document.getElementById('submitBtn'),

        // Step 1
        carMaker: document.getElementById('carMaker'),
        carMakerOther: document.getElementById('carMakerOther'),
        carModel: document.getElementById('carModel'),
        carYear: document.getElementById('carYear'),
        issueType: document.getElementById('issueType'),
        issueTypeOther: document.getElementById('issueTypeOther'),
        description: document.getElementById('description'),
        images: document.getElementById('images'),
        imagePreview: document.getElementById('imagePreview'),
        chooseFilesBtn: document.getElementById('chooseFilesBtn'),
        takePhotoBtn: document.getElementById('takePhotoBtn'),
        location: document.getElementById('location'),
        locationOther: document.getElementById('locationOther'),
        urgency: document.getElementById('urgency'),

        // Step 2
        mileage: document.getElementById('mileage'),
        videos: document.getElementById('videos'),
        videoPreview: document.getElementById('videoPreview'),

        // Step 3
        contactEmail: document.getElementById('contactEmail'),
    };

    // ==============================================================
    // 3. CLOUDINARY UPLOAD FUNCTIONS
    // ==============================================================
    
  
    /**
 * Upload file to Cloudinary with enhanced error handling
 */
async function uploadToCloudinary(file, type = 'image') {
    try {
        console.log('Starting upload:', file.name, 'Type:', type);
        
        // Get upload config from Laravel backend
        const configResponse = await fetch('/cloudinary/config?type=' + type, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '',
                'Accept': 'application/json'
            }
        });
        
        console.log('Config response status:', configResponse.status);
        
        if (!configResponse.ok) {
            const errorText = await configResponse.text();
            console.error('Config response error:', errorText);
            throw new Error(`Failed to get config: ${configResponse.status} - ${errorText}`);
        }

        const config = await configResponse.json();
        console.log('Config received:', config);
        
        if (!config.success) {
            throw new Error(config.message || 'Failed to get upload configuration');
        }

        // Validate config
        if (!config.cloud_name) {
            throw new Error('Cloud name is missing from configuration');
        }

        if (!config.upload_preset) {
            throw new Error('Upload preset is missing from configuration');
        }

        // Prepare upload data
        const formData = new FormData();
        formData.append('file', file);
        formData.append('upload_preset', config.upload_preset);
        formData.append('folder', config.folder);

        console.log('Uploading to Cloudinary:', {
            cloud_name: config.cloud_name,
            upload_preset: config.upload_preset,
            folder: config.folder,
            file_name: file.name,
            file_size: file.size
        });

        // Upload to Cloudinary
        const uploadUrl = `https://api.cloudinary.com/v1_1/${config.cloud_name}/${type}/upload`;
        
        const uploadResponse = await fetch(uploadUrl, {
            method: 'POST',
            body: formData
        });

        console.log('Upload response status:', uploadResponse.status);

        if (!uploadResponse.ok) {
            const errorText = await uploadResponse.text();
            console.error('Upload error response:', errorText);
            throw new Error(`Upload failed: ${uploadResponse.status}`);
        }

        const result = await uploadResponse.json();
        console.log('Upload successful:', result);

        if (result.secure_url) {
            return {
                success: true,
                url: result.secure_url,
                public_id: result.public_id,
                format: result.format
            };
        } else {
            throw new Error(result.error?.message || 'Upload failed - no URL returned');
        }

    } catch (error) {
        console.error('Cloudinary upload error:', error);
        return {
            success: false,
            error: error.message
        };
    }
}

    /**
     * Upload all images with progress indicator
     */
    async function uploadAllImages() {
        if (imageFiles.length === 0) return true;

        const progressDiv = createProgressDiv('Uploading images...', 'imageUploadProgress', imageFiles.length, 'bg-blue-600');
        
        const progressBar = document.getElementById('imageUploadProgress');
        const statusText = document.getElementById('imageUploadStatus');

        for (let i = 0; i < imageFiles.length; i++) {
            const result = await uploadToCloudinary(imageFiles[i], 'image');
            
            if (result.success) {
                uploadedImageUrls.push(result.url);
            } else {
                alert(`Failed to upload ${imageFiles[i].name}: ${result.error}`);
                document.body.removeChild(progressDiv);
                return false;
            }

            // Update progress
            const progress = ((i + 1) / imageFiles.length) * 100;
            progressBar.style.width = progress + '%';
            statusText.textContent = `${i + 1} / ${imageFiles.length}`;
        }

        document.body.removeChild(progressDiv);
        return true;
    }

    /**
     * Upload all videos with progress indicator
     */
    async function uploadAllVideos() {
        if (videoFiles.length === 0) return true;

        const progressDiv = createProgressDiv('Uploading videos...', 'videoUploadProgress', videoFiles.length, 'bg-purple-600');
        
        const progressBar = document.getElementById('videoUploadProgress');
        const statusText = document.getElementById('videoUploadStatus');

        for (let i = 0; i < videoFiles.length; i++) {
            const result = await uploadToCloudinary(videoFiles[i], 'video');
            
            if (result.success) {
                uploadedVideoUrls.push(result.url);
            } else {
                alert(`Failed to upload ${videoFiles[i].name}: ${result.error}`);
                document.body.removeChild(progressDiv);
                return false;
            }

            // Update progress
            const progress = ((i + 1) / videoFiles.length) * 100;
            progressBar.style.width = progress + '%';
            statusText.textContent = `${i + 1} / ${videoFiles.length}`;
        }

        document.body.removeChild(progressDiv);
        return true;
    }

    /**
     * Create progress indicator div
     */
    function createProgressDiv(title, progressId, totalFiles, colorClass) {
        const progressDiv = document.createElement('div');
        progressDiv.className = 'fixed top-4 right-4 bg-white rounded-lg shadow-lg p-4 z-50';
        progressDiv.innerHTML = `
            <p class="font-semibold mb-2">${title}</p>
            <div class="w-64 bg-gray-200 rounded-full h-2">
                <div id="${progressId}" class="${colorClass} h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
            </div>
            <p class="text-xs text-gray-500 mt-1" id="${progressId.replace('Progress', 'Status')}">0 / ${totalFiles}</p>
        `;
        document.body.appendChild(progressDiv);
        return progressDiv;
    }

    // ==============================================================
    // 4. IMAGE PREVIEW & MANAGEMENT
    // ==============================================================
    
    el.chooseFilesBtn?.addEventListener('click', () => {
        el.images.removeAttribute('capture');
        el.images.click();
    });

    el.takePhotoBtn?.addEventListener('click', () => {
        el.images.setAttribute('capture', 'environment');
        el.images.click();
    });

    el.images.addEventListener('change', () => {
        const newFiles = Array.from(el.images.files);
        if (!newFiles.length) return;

        const total = imageFiles.length + newFiles.length;
        if (total > MAX_IMAGES) {
            alert(`Maximum ${MAX_IMAGES} images allowed. Only the first ${MAX_IMAGES} will be kept.`);
        }

        imageFiles = [...imageFiles, ...newFiles].slice(0, MAX_IMAGES);
        renderImagePreviews();
        el.images.removeAttribute('capture');
    });

    function renderImagePreviews() {
        el.imagePreview.innerHTML = '';
        imageFiles.forEach((file, i) => {
            const reader = new FileReader();
            reader.onload = e => {
                const wrapper = document.createElement('div');
                wrapper.className = 'relative group w-28 h-28 rounded-lg overflow-hidden border-2 border-gray-200';

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-full h-full object-cover';

                const overlay = document.createElement('div');
                overlay.className = 'absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition flex items-center justify-center';

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.setAttribute('data-idx', i);
                removeBtn.className = 'remove-img bg-red-600 hover:bg-red-700 text-white w-9 h-9 rounded-full flex items-center justify-center shadow-lg';
                removeBtn.innerHTML = '×';

                overlay.appendChild(removeBtn);
                wrapper.appendChild(img);
                wrapper.appendChild(overlay);
                el.imagePreview.appendChild(wrapper);
            };
            reader.readAsDataURL(file);
        });
    }

    el.imagePreview.addEventListener('click', e => {
        const btn = e.target.closest('.remove-img');
        if (!btn) return;
        const idx = parseInt(btn.dataset.idx);
        imageFiles.splice(idx, 1);
        renderImagePreviews();
    });

    // ==============================================================
    // 5. VIDEO UPLOAD & VALIDATION
    // ==============================================================
    
    el.videos.addEventListener('change', () => {
        const newFiles = Array.from(el.videos.files);
        if (!newFiles.length) return;

        const oversizedFiles = [];
        const validFiles = [];

        newFiles.forEach(file => {
            if (file.size > MAX_VIDEO_SIZE) {
                oversizedFiles.push({
                    name: file.name,
                    size: (file.size / (1024 * 1024)).toFixed(2)
                });
            } else {
                validFiles.push(file);
            }
        });

        if (oversizedFiles.length > 0) {
            const fileList = oversizedFiles.map(f => `• ${f.name} (${f.size}MB)`).join('\n');
            alert(`The following video(s) exceed the 50MB limit:\n\n${fileList}\n\nPlease choose smaller video files.`);

            if (validFiles.length === 0) {
                el.videos.value = '';
                el.videoPreview.innerHTML = '';
                videoFiles = [];
                return;
            }
        }

        videoFiles = validFiles;

        if (videoFiles.length > 0) {
            const totalSize = videoFiles.reduce((sum, f) => sum + f.size, 0);
            const totalSizeMB = (totalSize / (1024 * 1024)).toFixed(2);

            const fileNames = videoFiles.map(f => {
                const sizeMB = (f.size / (1024 * 1024)).toFixed(2);
                return `${f.name} (${sizeMB}MB)`;
            }).join(', ');

            el.videoPreview.innerHTML = `
                <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                    <p class="text-xs font-semibold text-green-700 mb-1">✓ ${videoFiles.length} video(s) selected:</p>
                    <p class="text-xs text-green-600">${fileNames}</p>
                    <p class="text-xs text-gray-500 mt-1">Total size: ${totalSizeMB}MB</p>
                </div>
            `;
        } else {
            el.videoPreview.innerHTML = '';
        }
    });

    // ==============================================================
    // 6. NAVIGATION & VALIDATION
    // ==============================================================
    
    function updateProgress() {
        el.currentStepEl.textContent = currentStep;
        const pct = currentStep === 1 ? 33 : currentStep === 2 ? 67 : 100;
        el.progressPercentEl.textContent = pct;
        el.progressBarEl.style.width = pct + '%';
    }

    function showStep(step) {
        [el.step1, el.step2, el.step3].forEach((stepEl, index) => {
            if (stepEl) {
                stepEl.style.display = index === step - 1 ? 'block' : 'none';
            }
        });

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function validateStep(step) {
        const stepEl = document.getElementById('step' + step);
        const required = stepEl.querySelectorAll('[required]:not(.hidden input):not(.hidden select)');

        for (let f of required) {
            // Radio groups
            if (f.type === 'radio') {
                const group = stepEl.querySelectorAll(`input[name="${f.name}"]`);
                const checked = Array.from(group).some(r => r.checked);
                if (!checked) {
                    group[0].closest('.form-group')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return false;
                }
                continue;
            }

            // Images requirement
            if (f.type === 'file' && f.name === 'images[]' && imageFiles.length === 0) {
                alert('Please upload at least one image of the issue.');
                return false;
            }

            // Normal inputs
            if (!f.value.trim()) {
                f.focus();
                f.classList.add('border-red-500');
                setTimeout(() => f.classList.remove('border-red-500'), 2000);
                return false;
            }
        }

        // Video size validation
        if (step === 2 && videoFiles.length > 0) {
            const oversized = videoFiles.find(v => v.size > MAX_VIDEO_SIZE);
            if (oversized) {
                const sizeMB = (oversized.size / (1024 * 1024)).toFixed(2);
                alert(`Video "${oversized.name}" (${sizeMB}MB) is too large. Maximum size is 50MB.`);
                return false;
            }
        }

        return true;
    }

    window.nextStep = function() {
        if (!validateStep(currentStep)) return;
        if (currentStep < totalSteps) {
            currentStep++;
            showStep(currentStep);
            updateProgress();
        }
    };

    window.prevStep = function() {
        if (currentStep > 1) {
            currentStep--;
            showStep(currentStep);
            updateProgress();
        }
    };

    // ==============================================================
    // 7. "OTHER" FIELD HANDLERS
    // ==============================================================
    
    function setupOther(select, input, otherVal = 'Other', altVal = 'other') {
        if (!select || !input) return;
        select.addEventListener('change', () => {
            const isOther = select.value === otherVal || select.value === altVal;
            input.classList.toggle('hidden', !isOther);
            input.required = isOther;
            if (isOther) input.focus();
            if (!isOther) input.value = '';
        });
    }
    
    setupOther(el.carMaker, el.carMakerOther);
    setupOther(el.issueType, el.issueTypeOther, 'other');
    setupOther(el.location, el.locationOther);

    // ==============================================================
    // 8. RADIO BUTTON STYLING
    // ==============================================================
    
    document.querySelectorAll('input[type="radio"]').forEach(r => {
        r.addEventListener('change', function() {
            const container = this.closest('.grid') || this.closest('.space-y-2');
            if (!container) return;
            container.querySelectorAll('label').forEach(l => {
                l.classList.remove('border-blue-600', 'bg-blue-50');
                l.classList.add('border-gray-300');
            });
            if (this.checked) {
                const lbl = this.closest('label');
                lbl.classList.remove('border-gray-300');
                lbl.classList.add('border-blue-600', 'bg-blue-50');
            }
        });
    });

    // ==============================================================
    // 9. FORM SUBMISSION WITH CLOUDINARY UPLOAD
    // ==============================================================
    
    el.form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!validateStep(currentStep)) return;

        // Disable submit button
        el.submitBtn.disabled = true;
        el.submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">⏳</span> Uploading files...';

        try {
            // Upload images to Cloudinary
            const imagesUploaded = await uploadAllImages();
            if (!imagesUploaded) {
                throw new Error('Image upload failed');
            }

            // Upload videos to Cloudinary
            if (videoFiles.length > 0) {
                el.submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">⏳</span> Uploading videos...';
                const videosUploaded = await uploadAllVideos();
                if (!videosUploaded) {
                    throw new Error('Video upload failed');
                }
            }

            // Prepare form data
            el.submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">⏳</span> Submitting...';

            const formData = new FormData(this);
            
            // Handle "Other" values
            if (el.carMaker?.value === 'Other' && el.carMakerOther?.value) {
                formData.set('carMaker', el.carMakerOther.value);
            }
            if (el.issueType?.value === 'other' && el.issueTypeOther?.value) {
                formData.set('issueType', el.issueTypeOther.value);
            }
            if (el.location?.value === 'Other' && el.locationOther?.value) {
                formData.set('location', el.locationOther.value);
            }
            
            // Remove file inputs and add Cloudinary URL arrays
            formData.delete('images[]');
            formData.delete('videos[]');
            
            // Add uploaded URLs
            uploadedImageUrls.forEach(url => {
                formData.append('images[]', url);
            });
            
            uploadedVideoUrls.forEach(url => {
                formData.append('videos[]', url);
            });

            // Submit to backend
            const response = await fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            });

            const data = await response.json();

            if (data.success) {
                // Show success message
                document.querySelector('.bg-white.rounded-2xl.shadow-xl').innerHTML = `
                    <div class="p-12 text-center">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-100 rounded-full mb-6">
                            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3">Issue Submitted Successfully!</h2>
                        <p class="text-gray-600 mb-6 max-w-md mx-auto">Your car issue has been sent to local mechanics. You'll receive quotes within 24 hours.</p>
                        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 max-w-md mx-auto mb-6">
                            <p class="text-sm text-gray-700"><strong>What happens next?</strong></p>
                            <ul class="text-sm text-gray-600 text-left mt-2 space-y-1">
                                <li>✓ Verified mechanics review your issue</li>
                                <li>✓ You receive quotes via phone/email</li>
                                <li>✓ Choose the best mechanic for you</li>
                            </ul>
                        </div>
                        <button onclick="location.reload()" class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-xl hover:bg-blue-700 transition">
                            Submit Another Issue
                        </button>
                    </div>`;
            } else {
                throw new Error(data.message || 'Submission failed');
            }

        } catch (error) {
            console.error('Submission error:', error);
            alert('Failed to submit. Please try again.');
            el.submitBtn.disabled = false;
            el.submitBtn.innerHTML = 'Submit & Get Quotes 🎯';
        }
    });

    // ==============================================================
    // 10. INITIALIZATION
    // ==============================================================
    
    showStep(1);
    updateProgress();
});
</script>

<style>
    .form-step {
        animation: fadeIn 0.3s ease-in;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .form-input:focus,
    .form-select:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #94a3b8;
    }
</style>
