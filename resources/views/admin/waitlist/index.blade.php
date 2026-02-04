

    <!-- Main Content -->
    <div class="max-w-9xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="text-3xl sm:text-4xl font-display text-[#023047] mb-2">Waitlist</h2>
                <p class="text-gray-600">Manage your waitlist registrations</p>
            </div>
            <div class="flex gap-3">
                <button onclick="openEmailAllModal()" class="px-4 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#8ECAE6] transition-colors duration-200 text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email All
                </button>
                <button onclick="openExportModal()" class="px-4 py-2 bg-[#023047] text-white rounded-lg hover:bg-[#219EBC] transition-colors duration-200 text-sm font-medium flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Export
                </button>
            </div>
        </div>

        <!-- Error Message -->
        @if(isset($error))
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-red-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-red-700 text-sm font-medium">{{ $error }}</p>
                </div>
            </div>
        @endif

        @include('feedback')
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Total Registrations -->
            <div class="bg-gradient-to-r from-[#8ECAE6] to-[#219EBC] rounded-xl p-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-white/90 text-sm font-medium mb-1">Total Registrations</p>
                        <p class="text-4xl font-display text-white">{{ $count ?? 0 }}</p>
                    </div>
                    <div class="bg-white/20 p-4 rounded-lg">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Users -->
            <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-[#8ECAE6]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-1">Users</p>
                        <p class="text-3xl font-display text-[#023047]">
                            {{ collect($waitlist ?? [])->where('userType', 'user')->count() }}
                        </p>
                    </div>
                    <div class="bg-[#8ECAE6] p-3 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- specialists -->
            <div class="bg-white rounded-xl p-6 shadow-md border-l-4 border-[#FFB703]">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium mb-1">specialists</p>
                        <p class="text-3xl font-display text-[#023047]">
                            {{ collect($waitlist ?? [])->where('userType', 'specialist')->count() }}
                        </p>
                    </div>
                    <div class="bg-[#FFB703] p-3 rounded-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class="mb-6 bg-white rounded-lg shadow-md p-4">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <input type="text" id="searchInput" placeholder="Search by name, email, or phone..." 
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent"
                        onkeyup="filterTable()">
                </div>
                <select id="typeFilter" onchange="filterTable()" 
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                    <option value="">All Types</option>
                    <option value="user">Users</option>
                    <option value="specialist">specialists</option>
                </select>
                <select id="statusFilter" onchange="filterTable()" 
                    class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                    <option value="">All Status</option>
                    <option value="registered">Registered</option>
                    <option value="pending">Pending</option>
                </select>
            </div>
        </div>

        <!-- Waitlist Table -->
        @if(!empty($waitlist) && count($waitlist) > 0)
            <!-- Desktop View -->
            <div class="hidden md:block bg-white rounded-xl shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200" id="waitlistTable">
                        <thead class="bg-[#023047]">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Name</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Email</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Phone</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">User Type</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Business</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Joined</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-center text-xs font-semibold text-white uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($waitlist as $entry)
                                <tr class="hover:bg-[#FFFAEE] transition-colors duration-150" 
                                    data-name="{{ strtolower(($entry['firstName'] ?? '') . ' ' . ($entry['lastName'] ?? '')) }}"
                                    data-email="{{ strtolower($entry['email'] ?? '') }}"
                                    data-phone="{{ $entry['phoneNumber'] ?? '' }}"
                                    data-type="{{ $entry['userType'] ?? '' }}"
                                    data-status="{{ !empty($entry['registeredUserId']) ? 'registered' : 'pending' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $entry['firstName'] ?? 'N/A' }} {{ $entry['lastName'] ?? '' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">{{ $entry['email'] ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">{{ $entry['phoneNumber'] ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            {{ ($entry['userType'] ?? '') === 'specialist' ? 'bg-[#FFB703] text-[#023047]' : 'bg-[#8ECAE6] text-[#023047]' }}">
                                            {{ ucfirst($entry['userType'] ?? 'user') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600 max-w-xs truncate">{{ $entry['businessName'] ?? '-' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-600">
                                            {{ isset($entry['joinedAt']) ? \Carbon\Carbon::parse($entry['joinedAt'])->format('M d, Y') : 'N/A' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if(!empty($entry['registeredUserId']))
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Registered
                                            </span>
                                        @else
                                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                Pending
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <!-- View Details -->
                                            <button onclick='viewDetails(@json($entry))' 
                                                class="text-[#219EBC] hover:text-[#023047] transition-colors" 
                                                title="View Details">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </button>
                                            
                                            <!-- Send Email -->
                                            <button onclick='sendEmail(@json($entry))' 
                                                class="text-[#FFB703] hover:text-[#FB8500] transition-colors" 
                                                title="Send Email">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                            </button>
                                            
                                            <!-- Edit -->
                                            <button onclick='editEntry(@json($entry))' 
                                                class="text-blue-600 hover:text-blue-800 transition-colors" 
                                                title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </button>
                                            
                                            <!-- Delete -->
                                            <button onclick='confirmDelete(@json($entry))' 
                                                class="text-red-600 hover:text-red-800 transition-colors" 
                                                title="Delete">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile View -->
            <div class="md:hidden space-y-4" id="mobileWaitlist">
                @foreach($waitlist as $entry)
                    <div class="bg-white rounded-lg shadow-md p-5 border-l-4 {{ ($entry['userType'] ?? '') === 'specialist' ? 'border-[#FFB703]' : 'border-[#8ECAE6]' }}"
                        data-name="{{ strtolower(($entry['firstName'] ?? '') . ' ' . ($entry['lastName'] ?? '')) }}"
                        data-email="{{ strtolower($entry['email'] ?? '') }}"
                        data-phone="{{ $entry['phoneNumber'] ?? '' }}"
                        data-type="{{ $entry['userType'] ?? '' }}"
                        data-status="{{ !empty($entry['registeredUserId']) ? 'registered' : 'pending' }}">
                        <div class="flex justify-between items-start mb-3">
                            <div>
                                <h3 class="text-lg font-semibold text-[#023047]">{{ $entry['firstName'] ?? 'N/A' }} {{ $entry['lastName'] ?? '' }}</h3>
                                <span class="inline-block mt-1 px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ ($entry['userType'] ?? '') === 'specialist' ? 'bg-[#FFB703] text-[#023047]' : 'bg-[#8ECAE6] text-[#023047]' }}">
                                    {{ ucfirst($entry['userType'] ?? 'user') }}
                                </span>
                            </div>
                            @if(!empty($entry['registeredUserId']))
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Registered
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Pending
                                </span>
                            @endif
                        </div>
                        <div class="space-y-2 text-sm mb-4">
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-[#219EBC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                {{ $entry['email'] ?? 'N/A' }}
                            </div>
                            <div class="flex items-center text-gray-600">
                                <svg class="w-4 h-4 mr-2 text-[#219EBC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                                {{ $entry['phoneNumber'] ?? 'N/A' }}
                            </div>
                            @if(!empty($entry['businessName']))
                                <div class="flex items-center text-gray-600">
                                    <svg class="w-4 h-4 mr-2 text-[#219EBC]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    {{ $entry['businessName'] }}
                                </div>
                            @endif
                            <div class="flex items-center text-gray-500 text-xs pt-2 border-t border-gray-100">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Joined: {{ isset($entry['joinedAt']) ? \Carbon\Carbon::parse($entry['joinedAt'])->format('M d, Y') : 'N/A' }}
                            </div>
                        </div>
                        <!-- Mobile Actions -->
                        <div class="flex gap-2 pt-3 border-t border-gray-200">
                            <button onclick='viewDetails(@json($entry))' 
                                class="flex-1 px-3 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#023047] transition-colors text-sm font-medium">
                                View
                            </button>
                            <button onclick='sendEmail(@json($entry))' 
                                class="flex-1 px-3 py-2 bg-[#FFB703] text-white rounded-lg hover:bg-[#FB8500] transition-colors text-sm font-medium">
                                Email
                            </button>
                            <button onclick='editEntry(@json($entry))' 
                                class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </button>
                            <button onclick='confirmDelete(@json($entry))' 
                                class="px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-colors text-sm font-medium">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-xl shadow-md p-12 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
                <h3 class="text-xl font-display text-gray-600 mb-2">No Waitlist Entries Yet</h3>
                <p class="text-gray-500">Waitlist registrations will appear here once users sign up.</p>
            </div>
        @endif
    </div>

    <!-- View Details Modal -->
    <div id="viewModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                <h3 class="text-2xl font-display text-[#023047]">Waitlist Entry Details</h3>
                <button onclick="closeModal('viewModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div id="viewModalContent" class="space-y-4">
                <!-- Content will be dynamically inserted -->
            </div>
        </div>
    </div>

    <!-- Send Email Modal -->
    <div id="emailModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                <h3 class="text-2xl font-display text-[#023047]">Send Email</h3>
                <button onclick="closeModal('emailModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form action="#" method="POST">
                @csrf
                <input type="hidden" id="emailTo" name="email_to">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">To:</label>
                        <input type="text" id="emailRecipient" readonly 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-50">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject:</label>
                        <input type="text" name="subject" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent"
                            placeholder="Enter email subject">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message:</label>
                        <textarea name="message" rows="6" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent"
                            placeholder="Enter your message here..."></textarea>
                    </div>
                    <div class="flex gap-3 pt-4">
                        <button type="submit" 
                            class="flex-1 px-4 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#023047] transition-colors font-medium">
                            Send Email
                        </button>
                        <button type="button" onclick="closeModal('emailModal')" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Email All Modal -->
    <div id="emailAllModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                <h3 class="text-2xl font-display text-[#023047]">Send Email to All</h3>
                <button onclick="closeModal('emailAllModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="space-y-4">
                    <div class="bg-[#FFFAEE] border-l-4 border-[#FFB703] p-4 rounded-r-lg">
                        <p class="text-sm text-gray-700">
                            <strong>Recipients:</strong> {{ $count ?? 0 }} waitlist members
                        </p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Subject:</label>
                        <input type="text" name="subject" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent"
                            placeholder="Enter email subject">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Message:</label>
                        <textarea name="message" rows="6" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent"
                            placeholder="Enter your message here..."></textarea>
                    </div>
                    <div>
                        <label class="flex items-center">
                            <input type="checkbox" name="users_only" class="rounded border-gray-300 text-[#219EBC] focus:ring-[#219EBC]">
                            <span class="ml-2 text-sm text-gray-700">Send to Users only</span>
                        </label>
                        <label class="flex items-center mt-2">
                            <input type="checkbox" name="specialists_only" class="rounded border-gray-300 text-[#219EBC] focus:ring-[#219EBC]">
                            <span class="ml-2 text-sm text-gray-700">Send to specialists only</span>
                        </label>
                    </div>
                    <div class="flex gap-3 pt-4">
                        <button type="submit" 
                            class="flex-1 px-4 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#023047] transition-colors font-medium">
                            Send to All
                        </button>
                        <button type="button" onclick="closeModal('emailAllModal')" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-xl bg-white">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                <h3 class="text-2xl font-display text-[#023047]">Edit Waitlist Entry</h3>
                <button onclick="closeModal('editModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="editEntryId" name="entry_id">
                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name:</label>
                            <input type="text" id="editFirstName" name="first_name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name:</label>
                            <input type="text" id="editLastName" name="last_name" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email:</label>
                        <input type="email" id="editEmail" name="email" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number:</label>
                        <input type="tel" id="editPhone" name="phone_number" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">User Type:</label>
                        <select id="editUserType" name="user_type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                            <option value="user">User</option>
                            <option value="specialist">specialist</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Business Name:</label>
                        <input type="text" id="editBusinessName" name="business_name"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#219EBC] focus:border-transparent">
                    </div>
                    <div class="flex gap-3 pt-4">
                        <button type="submit" 
                            class="flex-1 px-4 py-2 bg-[#219EBC] text-white rounded-lg hover:bg-[#023047] transition-colors font-medium">
                            Save Changes
                        </button>
                        <button type="button" onclick="closeModal('editModal')" 
                            class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                            Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-xl bg-white">
            <div class="text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-display text-gray-900 mb-2">Delete Entry</h3>
                <p class="text-sm text-gray-600 mb-1">Are you sure you want to delete this waitlist entry?</p>
                <p id="deleteEntryName" class="text-sm font-semibold text-gray-900 mb-4"></p>
                <p class="text-xs text-red-600 mb-6">This action cannot be undone.</p>
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" id="deleteEntryId" name="entry_id">
                    <div class="flex gap-3">
                        <button type="submit" 
                            class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium">
                            Delete
                        </button>
                        <button type="button" onclick="closeModal('deleteModal')" 
                            class="flex-1 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Export Modal -->
    <div id="exportModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-xl bg-white">
            <div class="flex items-center justify-between mb-4 pb-3 border-b border-gray-200">
                <h3 class="text-xl font-display text-[#023047]">Export Waitlist</h3>
                <button onclick="closeModal('exportModal')" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="space-y-3">
                <p class="text-sm text-gray-600 mb-4">Choose export format:</p>
                <a href="#" 
                    class="block w-full px-4 py-3 bg-[#219EBC] text-white rounded-lg hover:bg-[#023047] transition-colors text-center font-medium">
                    Export as CSV
                </a>
                <a href="#" 
                    class="block w-full px-4 py-3 bg-[#FFB703] text-white rounded-lg hover:bg-[#FB8500] transition-colors text-center font-medium">
                    Export as Excel
                </a>
                <a href="#" 
                    class="block w-full px-4 py-3 bg-[#8ECAE6] text-[#023047] rounded-lg hover:bg-[#219EBC] hover:text-white transition-colors text-center font-medium">
                    Export as PDF
                </a>
                <button type="button" onclick="closeModal('exportModal')" 
                    class="w-full px-4 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors font-medium">
                    Cancel
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-12 py-6 text-center text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} Wheelit In. All rights reserved.</p>
    </footer>

    <script>
        // View Details Function
        function viewDetails(entry) {
            const content = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">First Name</label>
                        <p class="text-gray-900 font-medium">${entry.firstName || 'N/A'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Last Name</label>
                        <p class="text-gray-900 font-medium">${entry.lastName || 'N/A'}</p>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-500 mb-1">Email</label>
                        <p class="text-gray-900 font-medium">${entry.email || 'N/A'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Phone Number</label>
                        <p class="text-gray-900 font-medium">${entry.phoneNumber || 'N/A'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">User Type</label>
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full ${entry.userType === 'specialist' ? 'bg-[#FFB703] text-[#023047]' : 'bg-[#8ECAE6] text-[#023047]'}">
                            ${entry.userType ? entry.userType.charAt(0).toUpperCase() + entry.userType.slice(1) : 'User'}
                        </span>
                    </div>
                    ${entry.businessName ? `
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Business Name</label>
                            <p class="text-gray-900 font-medium">${entry.businessName}</p>
                        </div>
                    ` : ''}
                    ${entry.address ? `
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Address</label>
                            <p class="text-gray-900 font-medium">${entry.address}</p>
                        </div>
                    ` : ''}
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Joined Date</label>
                        <p class="text-gray-900 font-medium">${entry.joinedAt ? new Date(entry.joinedAt).toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' }) : 'N/A'}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                        <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full ${entry.registeredUserId ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800'}">
                            ${entry.registeredUserId ? 'Registered' : 'Pending'}
                        </span>
                    </div>
                    ${entry.registeredUserId ? `
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-1">Registered User ID</label>
                            <p class="text-gray-900 font-mono text-sm">${entry.registeredUserId}</p>
                        </div>
                    ` : ''}
                </div>
            `;
            document.getElementById('viewModalContent').innerHTML = content;
            document.getElementById('viewModal').classList.remove('hidden');
        }

        // Send Email Function
        function sendEmail(entry) {
            document.getElementById('emailTo').value = entry.email;
            document.getElementById('emailRecipient').value = `${entry.firstName} ${entry.lastName} (${entry.email})`;
            document.getElementById('emailModal').classList.remove('hidden');
        }

        // Email All Function
        function openEmailAllModal() {
            document.getElementById('emailAllModal').classList.remove('hidden');
        }

        // Edit Entry Function
        function editEntry(entry) {
            document.getElementById('editEntryId').value = entry._id;
            document.getElementById('editFirstName').value = entry.firstName || '';
            document.getElementById('editLastName').value = entry.lastName || '';
            document.getElementById('editEmail').value = entry.email || '';
            document.getElementById('editPhone').value = entry.phoneNumber || '';
            document.getElementById('editUserType').value = entry.userType || 'user';
            document.getElementById('editBusinessName').value = entry.businessName || '';
            document.getElementById('editModal').classList.remove('hidden');
        }

        // Confirm Delete Function
        function confirmDelete(entry) {
            document.getElementById('deleteEntryId').value = entry._id;
            document.getElementById('deleteEntryName').textContent = `${entry.firstName} ${entry.lastName} (${entry.email})`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        // Export Modal Function
        function openExportModal() {
            document.getElementById('exportModal').classList.remove('hidden');
        }

        // Close Modal Function
        function closeModal(modalId) {
            document.getElementById(modalId).classList.add('hidden');
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modals = ['viewModal', 'emailModal', 'emailAllModal', 'editModal', 'deleteModal', 'exportModal'];
            modals.forEach(modalId => {
                const modal = document.getElementById(modalId);
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        }

        // Filter Table Function
        function filterTable() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const typeFilter = document.getElementById('typeFilter').value;
            const statusFilter = document.getElementById('statusFilter').value;

            // Desktop table
            const tableRows = document.querySelectorAll('#waitlistTable tbody tr');
            tableRows.forEach(row => {
                const name = row.dataset.name || '';
                const email = row.dataset.email || '';
                const phone = row.dataset.phone || '';
                const type = row.dataset.type || '';
                const status = row.dataset.status || '';

                const matchesSearch = name.includes(searchInput) || 
                                     email.includes(searchInput) || 
                                     phone.includes(searchInput);
                const matchesType = !typeFilter || type === typeFilter;
                const matchesStatus = !statusFilter || status === statusFilter;

                if (matchesSearch && matchesType && matchesStatus) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Mobile cards
            const mobileCards = document.querySelectorAll('#mobileWaitlist > div');
            mobileCards.forEach(card => {
                const name = card.dataset.name || '';
                const email = card.dataset.email || '';
                const phone = card.dataset.phone || '';
                const type = card.dataset.type || '';
                const status = card.dataset.status || '';

                const matchesSearch = name.includes(searchInput) || 
                                     email.includes(searchInput) || 
                                     phone.includes(searchInput);
                const matchesType = !typeFilter || type === typeFilter;
                const matchesStatus = !statusFilter || status === statusFilter;

                if (matchesSearch && matchesType && matchesStatus) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
