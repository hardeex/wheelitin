<div class="min-h-screen bg-neutral-100">
    <!-- Header -->
    <div class="border-b-2 border-primary-200 bg-accent-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-4xl font-bold text-white">My Reported Issues</h1>
            <p class="mt-2 text-lg text-primary-200">Track and manage your vehicle service requests</p>
        </div>
    </div>

    @include('feedback')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl p-6 shadow-lg text-white transform hover:scale-105 transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold opacity-90 uppercase tracking-wider">Total Reports</p>
                        <p class="text-4xl font-bold mt-2">{{ count($reports) }}</p>
                    </div>
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-clipboard-list text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-warning-400 to-warning-600 rounded-2xl p-6 shadow-lg text-white transform hover:scale-105 transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold opacity-90 uppercase tracking-wider">Pending</p>
                        <p class="text-4xl font-bold mt-2">
                            {{ collect($reports)->where('status', 'pending')->count() }}
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-clock text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-accent-700 to-accent-900 rounded-2xl p-6 shadow-lg text-white transform hover:scale-105 transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold opacity-90 uppercase tracking-wider">With Quotations</p>
                        <p class="text-4xl font-bold mt-2">
                            {{ collect($reports)->filter(function($r) { return isset($r['quotations']) && count($r['quotations']) > 0; })->count() }}
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-file-invoice-dollar text-2xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-success-500 to-success-700 rounded-2xl p-6 shadow-lg text-white transform hover:scale-105 transition-all">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-semibold opacity-90 uppercase tracking-wider">Accepted</p>
                        <p class="text-4xl font-bold mt-2">
                            {{ collect($reports)->where('status', 'accepted')->count() }}
                        </p>
                    </div>
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-sm">
                        <i class="fas fa-check-circle text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters & Search -->
        <div class="mb-6 flex flex-col sm:flex-row gap-4">
            <div class="flex-1 relative">
                <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-neutral-400"></i>
                <input type="text" id="searchInput" placeholder="Search by car maker, model, or location..." 
                       class="w-full pl-12 pr-4 py-3 border-2 border-neutral-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-accent-900 transition-all"
                       onkeyup="filterReports()">
            </div>
            <select id="statusFilter" class="px-6 py-3 border-2 border-neutral-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 text-accent-900 font-semibold transition-all"
                    onchange="filterReports()">
                <option value="">All Statuses</option>
                <option value="pending">Pending</option>
                <option value="accepted">Accepted</option>
                <option value="declined">Declined</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <!-- Reports List -->
        <div class="space-y-6" id="reportsList">
            @forelse($reports as $index => $report)
                @php
                    $statusColors = [
                        'pending' => ['bg' => 'warning-100', 'text' => 'warning-800', 'border' => 'warning-500'],
                        'accepted' => ['bg' => 'primary-100', 'text' => 'primary-800', 'border' => 'primary-500'],
                        'declined' => ['bg' => 'error-100', 'text' => 'error-800', 'border' => 'error-500'],
                        'completed' => ['bg' => 'success-100', 'text' => 'success-800', 'border' => 'success-500']
                    ];
                    $statusColor = $statusColors[$report['status']] ?? $statusColors['pending'];

                    $urgencyColors = [
                        'urgent' => ['bg' => 'error-500', 'text' => 'white'],
                        '24hours' => ['bg' => 'warning-500', 'text' => 'white'],
                        'normal' => ['bg' => 'neutral-200', 'text' => 'accent-900']
                    ];
                    $urgencyColor = $urgencyColors[$report['urgency']] ?? $urgencyColors['normal'];

                    $hasQuotations = isset($report['quotations']) && count($report['quotations']) > 0;
                    $hasReviews = isset($report['reviews']) && count($report['reviews']) > 0;
                    $hasVideos = isset($report['videos']) && count($report['videos']) > 0;
                    $hasLicensePlate = isset($report['licensePlate']) && !empty($report['licensePlate']);
                @endphp

            <div class="bg-white rounded-2xl shadow-lg border-2 border-neutral-200 hover:shadow-xl transition-all duration-300 report-card overflow-hidden" 
                 data-status="{{ $report['status'] }}"
                 data-search="{{ strtolower($report['carMaker'] . ' ' . $report['carModel'] . ' ' . $report['location']) }}">
                
                <!-- Collapsible Header -->
                <div class="p-6 cursor-pointer" onclick="toggleReport('report-{{ $index }}')">
                    @if($report['status'] === 'accepted')
                    <div class="mb-4 px-5 py-3 rounded-xl bg-primary-50 border-l-4 border-primary-500 flex items-center gap-3">
                        <i class="fas fa-check-circle text-primary-600 text-xl"></i>
                        <span class="font-bold text-sm text-primary-900">This report has been accepted and is in progress</span>
                    </div>
                    @elseif($report['status'] === 'declined')
                    <div class="mb-4 px-5 py-3 rounded-xl bg-error-50 border-l-4 border-error-500 flex items-center gap-3">
                        <i class="fas fa-times-circle text-error-600 text-xl"></i>
                        <span class="font-bold text-sm text-error-900">All quotations for this report have been declined</span>
                    </div>
                    @elseif($report['status'] === 'completed')
                    <div class="mb-4 px-5 py-3 rounded-xl bg-success-50 border-l-4 border-success-500 flex items-center gap-3">
                        <i class="fas fa-badge-check text-success-600 text-xl"></i>
                        <span class="font-bold text-sm text-success-900">This service has been completed</span>
                    </div>
                    @endif

                    <div class="flex items-start justify-between">
                        <div class="flex-1">
                            <div class="flex items-center gap-3 mb-3 flex-wrap">
                                <h3 class="text-2xl font-bold text-accent-900">
                                    {{ $report['carYear'] }} {{ $report['carMaker'] }} {{ $report['carModel'] }}
                                </h3>
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-{{ $statusColor['bg'] }} text-{{ $statusColor['text'] }} border border-{{ $statusColor['border'] }}">
                                    {{ ucfirst($report['status']) }}
                                </span>
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-{{ $urgencyColor['bg'] }} text-{{ $urgencyColor['text'] }}">
                                    {{ ucfirst(str_replace('24hours', '24 Hours', $report['urgency'])) }}
                                </span>
                                @if($hasQuotations)
                                <span class="px-4 py-1.5 rounded-full text-xs font-bold bg-accent-900 text-white">
                                    <i class="fas fa-file-invoice mr-1"></i>{{ count($report['quotations']) }} Quote(s)
                                </span>
                                @endif
                            </div>
                            <div class="flex items-center gap-6 text-sm text-neutral-600 flex-wrap">
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-map-marker-alt text-primary-600"></i>
                                    {{ $report['location'] }}
                                </span>
                                <span class="flex items-center gap-2">
                                    <i class="fas fa-calendar-alt text-primary-600"></i>
                                    {{ \Carbon\Carbon::parse($report['createdAt'])->format('d M Y, h:i A') }}
                                </span>
                                @if($hasLicensePlate)
                                <span class="flex items-center gap-2 font-bold text-accent-900">
                                    <i class="fas fa-car text-primary-600"></i>
                                    {{ $report['licensePlate'] }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="ml-4">
                            <i class="fas fa-chevron-down w-8 h-8 text-accent-900 transition-transform duration-200 text-2xl" id="arrow-report-{{ $index }}"></i>
                        </div>
                    </div>
                </div>

                <!-- Collapsible Content -->
                <div id="report-{{ $index }}" class="hidden border-t-2 border-neutral-200">
                    <div class="p-6 bg-neutral-50">
                        <!-- Vehicle & Issue Details Table -->
                        <div class="overflow-x-auto mb-6 bg-white rounded-xl border border-neutral-200">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="bg-accent-900 text-white">
                                        <th class="px-6 py-4 text-left font-bold">Property</th>
                                        <th class="px-6 py-4 text-left font-bold">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-t border-neutral-200">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Issue Type</td>
                                        <td class="px-6 py-3 text-accent-900">{{ ucwords(str_replace('-', ' ', $report['issueType'])) }}</td>
                                    </tr>
                                    <tr class="border-t border-neutral-200 bg-neutral-50">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Service Type</td>
                                        <td class="px-6 py-3 text-accent-900">{{ ucfirst($report['serviceType']) }}</td>
                                    </tr>
                                    <tr class="border-t border-neutral-200">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Driveable</td>
                                        <td class="px-6 py-3 text-accent-900">{{ $report['driveable'] ? 'Yes' : 'No' }}</td>
                                    </tr>
                                    @if(isset($report['mileage']) && $report['mileage'])
                                    <tr class="border-t border-neutral-200 bg-neutral-50">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Mileage</td>
                                        <td class="px-6 py-3 text-accent-900">{{ number_format($report['mileage']) }} miles</td>
                                    </tr>
                                    @endif
                                    <tr class="border-t border-neutral-200">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Contact Email</td>
                                        <td class="px-6 py-3 text-accent-900">{{ $report['contactEmail'] }}</td>
                                    </tr>
                                    <tr class="border-t border-neutral-200 bg-neutral-50">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Report ID</td>
                                        <td class="px-6 py-3 font-mono text-xs text-accent-900">{{ $report['_id'] }}</td>
                                    </tr>
                                    <tr class="border-t border-neutral-200">
                                        <td class="px-6 py-3 font-semibold text-neutral-700">Last Updated</td>
                                        <td class="px-6 py-3 text-accent-900">{{ \Carbon\Carbon::parse($report['updatedAt'])->format('d M Y, h:i A') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Description -->
                        <div class="mb-6 rounded-xl p-6 bg-white border-2 border-primary-200">
                            <p class="text-xs font-bold uppercase mb-3 text-primary-700 tracking-wider">Description</p>
                            <p class="text-accent-900 leading-relaxed">{{ $report['description'] }}</p>
                        </div>

                        <!-- Images -->
                        @if(!empty($report['images']) && count($report['images']) > 0)
                        <div class="mb-6">
                            <p class="text-sm font-bold uppercase mb-4 text-accent-900 tracking-wider">
                                <i class="fas fa-images text-primary-600 mr-2"></i>Attached Images ({{ count($report['images']) }})
                            </p>
                            <div class="flex gap-4 overflow-x-auto pb-4">
                                @foreach($report['images'] as $imgIndex => $image)
                                <img src="{{ $image }}" alt="Car issue {{ $imgIndex + 1 }}" 
                                     class="w-40 h-40 object-cover rounded-xl border-4 border-primary-200 cursor-pointer hover:scale-110 hover:border-primary-500 transition-all shadow-lg" 
                                     onclick="openImageModal('{{ $image }}')">
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Videos -->
                        @if($hasVideos)
                        <div class="mb-6">
                            <p class="text-sm font-bold uppercase mb-4 text-accent-900 tracking-wider">
                                <i class="fas fa-video text-primary-600 mr-2"></i>Attached Videos ({{ count($report['videos']) }})
                            </p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($report['videos'] as $video)
                                <video controls class="w-full rounded-xl border-4 border-primary-200 shadow-lg">
                                    <source src="{{ $video }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Quotations Section -->
                        @if($hasQuotations)
                        <div class="mb-6">
                            <p class="text-lg font-bold mb-4 text-accent-900">
                                <i class="fas fa-file-invoice-dollar text-primary-600 mr-2"></i>Quotations Received ({{ count($report['quotations']) }})
                            </p>
                            <div class="space-y-4">
                                @foreach($report['quotations'] as $qIndex => $quotation)
                                    @php
                                        $isAccepted = (isset($quotation['status']) && $quotation['status'] === 'accepted') || $report['status'] === 'accepted';
                                        $isDeclined = (isset($quotation['status']) && $quotation['status'] === 'declined') || $report['status'] === 'declined';
                                        $isCompleted = $report['status'] === 'completed';
                                        $quotationDisabled = $isAccepted || $isDeclined || $isCompleted || $report['status'] !== 'pending';
                                    @endphp
                                <div class="border-2 rounded-2xl p-6 relative bg-white border-primary-200 shadow-md" 
                                     style="{{ $quotationDisabled ? 'opacity: 0.8;' : '' }}">
                                    
                                    @if($isAccepted)
                                    <div class="absolute top-4 right-4">
                                        <span class="px-4 py-2 rounded-full text-xs font-bold bg-success-500 text-white flex items-center gap-2">
                                            <i class="fas fa-check-circle"></i>Accepted
                                        </span>
                                    </div>
                                    @elseif($isDeclined)
                                    <div class="absolute top-4 right-4">
                                        <span class="px-4 py-2 rounded-full text-xs font-bold bg-error-500 text-white flex items-center gap-2">
                                            <i class="fas fa-times-circle"></i>Declined
                                        </span>
                                    </div>
                                    @elseif($isCompleted)
                                    <div class="absolute top-4 right-4">
                                        <span class="px-4 py-2 rounded-full text-xs font-bold bg-primary-600 text-white flex items-center gap-2">
                                            <i class="fas fa-check-double"></i>Completed
                                        </span>
                                    </div>
                                    @endif

                                    <div class="grid md:grid-cols-2 gap-6 mb-6">
                                        <div>
                                            <p class="text-4xl font-bold mb-2 text-accent-900">£{{ number_format($quotation['amount'], 2) }}</p>
                                            <p class="text-sm mb-4 text-neutral-700">
                                                <span class="font-bold text-accent-900">Duration:</span> {{ $quotation['duration'] }}
                                            </p>
                                            <p class="text-xs text-neutral-600">
                                                <span class="font-semibold">Submitted:</span> {{ \Carbon\Carbon::parse($quotation['createdAt'])->format('d M Y, h:i A') }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-bold uppercase mb-2 text-neutral-600 tracking-wider">Specialist ID</p>
                                            <p class="font-mono text-xs mb-4 break-all text-accent-900">{{ $quotation['specialistId'] }}</p>
                                            <p class="text-xs font-bold uppercase mb-2 text-neutral-600 tracking-wider">Quotation ID</p>
                                            <p class="font-mono text-xs break-all text-accent-900">{{ $quotation['_id'] }}</p>
                                        </div>
                                    </div>

                                    <div class="rounded-xl p-5 mb-6 bg-primary-50 border-2 border-primary-200">
                                        <p class="text-xs font-bold uppercase mb-3 text-primary-700 tracking-wider">Diagnosis / Reason for Fault</p>
                                        <p class="text-sm whitespace-pre-line text-accent-900 leading-relaxed">{{ $quotation['reasonForFault'] }}</p>
                                    </div>

                                    <div class="flex gap-3 flex-wrap">
                                        @if($quotationDisabled)
                                            @if($isCompleted)
                                            <div class="flex-1 px-6 py-4 rounded-xl text-center bg-success-50 border-2 border-success-500">
                                                <p class="font-bold text-success-800">✓ Service Completed</p>
                                                <p class="text-xs mt-1 text-success-700">This report has been marked as completed</p>
                                            </div>
                                            @elseif($isAccepted)
                                            <div class="flex-1 px-6 py-4 rounded-xl text-center bg-primary-50 border-2 border-primary-500">
                                                <p class="font-bold text-primary-800">✓ Quotation Accepted</p>
                                                <p class="text-xs mt-1 text-primary-700">Action completed - No further changes allowed</p>
                                            </div>
                                            @elseif($isDeclined)
                                            <div class="flex-1 px-6 py-4 rounded-xl text-center bg-error-50 border-2 border-error-500">
                                                <p class="font-bold text-error-800">✗ Quotation Declined</p>
                                                <p class="text-xs mt-1 text-error-700">Action completed - No further changes allowed</p>
                                            </div>
                                            @else
                                            <div class="flex-1 px-6 py-4 rounded-xl text-center bg-neutral-100 border-2 border-neutral-300">
                                                <p class="font-bold text-neutral-700">Report status: {{ ucfirst($report['status']) }}</p>
                                                <p class="text-xs mt-1 text-neutral-600">This report is no longer in pending status</p>
                                            </div>
                                            @endif
                                        @else
                                        <a href="{{ route('reports.accept.form', ['reportId' => $report['_id'], 'specialistId' => $quotation['specialistId']]) }}" 
                                           class="flex-1 px-6 py-4 rounded-xl font-bold text-sm text-center transition-all hover:shadow-xl bg-accent-900 text-white hover:bg-accent-800">
                                            <i class="fas fa-check-circle mr-2"></i>Accept Quotation
                                        </a>
                                        <form action="{{ route('reports.decline', $report['_id']) }}" method="GET" class="flex-1">
                                            <input type="hidden" name="specialistId" value="{{ $quotation['specialistId'] }}">
                                            <button type="submit" 
                                                    class="w-full px-6 py-4 rounded-xl font-bold text-sm border-2 transition-all hover:shadow-xl bg-white text-error-600 border-error-500 hover:bg-error-50"
                                                    onclick="return confirm('Are you sure you want to decline this quotation?');">
                                                <i class="fas fa-times-circle mr-2"></i>Decline Quotation
                                            </button>
                                        </form>
                                        @endif
                                    </div>

                                    <!-- Complete & Review Actions for Accepted Reports -->
                                   @if($isAccepted && !$isCompleted)
    <div class="mt-6 pt-6 border-t-2 border-neutral-200">
        <p class="text-sm font-bold mb-4 text-accent-900">
            <i class="fas fa-tasks text-primary-600 mr-2"></i>Service Actions
        </p>

        <div class="flex gap-3 flex-wrap">
            {{-- <form action="{{ route('specialist.report.complete', $report['_id']) }}" method="POST" 
                  onsubmit="return confirm('Mark this service as completed?');" class="flex-1">
                @csrf
                <button type="submit"
                        class="w-full px-6 py-4 rounded-xl font-bold text-sm text-center transition-all hover:shadow-xl bg-success-600 text-white hover:bg-success-700">
                    <i class="fas fa-check-double mr-2"></i>Mark as Completed
                </button>
            </form> --}}

            <form action="{{ route('specialist.report.complete', $report['_id']) }}" 
      method="POST"
      onsubmit="return confirm('Mark this service as completed?');"
      class="flex-1">
    @csrf
    <button type="submit"
        class="w-full px-6 py-4 rounded-xl font-bold text-sm text-center transition-all hover:shadow-xl bg-success-600 text-white hover:bg-success-700">
        <i class="fas fa-check-double mr-2"></i>Mark as Completed
    </button>
</form>

        </div>
    </div>
@endif


                                    <!-- Review Action for Completed Reports -->
                                    @if($isCompleted && !$hasReviews)
                                    <div class="mt-6 pt-6 border-t-2 border-neutral-200">
                                        <p class="text-sm font-bold mb-4 text-accent-900">
                                            <i class="fas fa-star text-warning-500 mr-2"></i>Leave a Review
                                        </p>
                                        <a href="{{ route('reports.review.form', ['reportId' => $report['_id'], 'specialistId' => $quotation['specialistId']]) }}" 
                                           class="block px-6 py-4 rounded-xl font-bold text-sm text-center transition-all hover:shadow-xl bg-warning-500 text-white hover:bg-warning-600">
                                            <i class="fas fa-pen mr-2"></i>Write a Review for Specialist
                                        </a>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @else
                        <div class="rounded-2xl p-8 text-center mb-6 bg-white border-4 border-dashed border-neutral-300">
                            <i class="fas fa-inbox text-6xl text-neutral-300 mb-4"></i>
                            <p class="font-bold text-accent-900 text-lg">No quotations received yet</p>
                            <p class="text-sm mt-2 text-neutral-600">Specialists will review your report and send quotations soon</p>
                        </div>
                        @endif

                        <!-- Reviews Section -->
                        @if($hasReviews)
                        <div>
                            <p class="text-lg font-bold mb-4 text-accent-900">
                                <i class="fas fa-star text-warning-500 mr-2"></i>Reviews & Feedback ({{ count($report['reviews']) }})
                            </p>
                            <div class="space-y-4">
                                @foreach($report['reviews'] as $review)
                                <div class="border-2 border-primary-200 rounded-2xl p-6 bg-white shadow-md">
                                    <div class="flex items-start justify-between mb-4">
                                        <div>
                                            <div class="flex items-center gap-2 mb-2">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star text-xl {{ $i <= ($review['rating'] ?? 0) ? 'text-warning-500' : 'text-neutral-300' }}"></i>
                                                @endfor
                                                <span class="font-bold ml-2 text-accent-900">{{ $review['rating'] ?? 'N/A' }}/5</span>
                                            </div>
                                            @if(isset($review['reviewerName']))
                                            <p class="text-sm font-bold text-accent-900">{{ $review['reviewerName'] }}</p>
                                            @endif
                                        </div>
                                        <span class="text-xs text-neutral-600">
                                            {{ isset($review['createdAt']) ? \Carbon\Carbon::parse($review['createdAt'])->format('d M Y') : 'N/A' }}
                                        </span>
                                    </div>
                                    @if(isset($review['comment']))
                                    <p class="text-sm text-accent-900 leading-relaxed">{{ $review['comment'] }}</p>
                                    @endif
                                    @if(isset($review['reviewerId']))
                                    <p class="text-xs mt-3 font-mono text-neutral-500">Reviewer ID: {{ $review['reviewerId'] }}</p>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="bg-white rounded-2xl shadow-xl p-16 text-center border-2 border-neutral-200">
                <i class="fas fa-clipboard-list text-8xl text-neutral-300 mb-6"></i>
                <h3 class="text-3xl font-bold mb-3 text-accent-900">No Reports Yet</h3>
                <p class="mb-8 text-neutral-600 text-lg">You haven't reported any car issues yet</p>
                <a href="{{ route('report.create') ?? '#' }}" class="inline-block px-8 py-4 rounded-xl font-bold transition-all hover:shadow-xl bg-accent-900 text-white hover:bg-accent-800">
                    <i class="fas fa-plus-circle mr-2"></i>Report an Issue
                </a>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 hidden items-center justify-center z-50" onclick="closeImageModal()">
    <div class="max-w-6xl max-h-screen p-8">
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white text-4xl hover:text-primary-400 transition-colors">
            <i class="fas fa-times-circle"></i>
        </button>
        <img id="modalImage" src="" alt="Full size" class="max-w-full max-h-screen rounded-2xl shadow-2xl">
    </div>
</div>

<script>
    function toggleReport(id) {
        const content = document.getElementById(id);
        const arrow = document.getElementById('arrow-' + id);
        
        if (content.classList.contains('hidden')) {
            content.classList.remove('hidden');
            arrow.classList.add('rotate-180');
        } else {
            content.classList.add('hidden');
            arrow.classList.remove('rotate-180');
        }
    }

    function filterReports() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        const statusFilter = document.getElementById('statusFilter').value;
        const reports = document.querySelectorAll('.report-card');
        
        reports.forEach(report => {
            const searchText = report.getAttribute('data-search');
            const status = report.getAttribute('data-status');
            
            const matchesSearch = searchText.includes(searchInput);
            const matchesStatus = !statusFilter || status === statusFilter;
            
            if (matchesSearch && matchesStatus) {
                report.style.display = 'block';
            } else {
                report.style.display = 'none';
            }
        });
    }

    function openImageModal(src) {
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        modalImage.src = src;
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeImageModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });
</script>