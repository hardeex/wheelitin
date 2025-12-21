
<div class="bg-gradient-to-br from-blue-50 to-slate-100 min-h-screen py-8 px-4">
    <div class="max-w-6xl mx-auto">
        
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('user.reports') }}" 
               class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to My Reports
            </a>
        </div>

      @include('feedback')

        <div class="grid lg:grid-cols-3 gap-6">
            
            <!-- Left Column: Report Details -->
            <div class="lg:col-span-2 space-y-6">
                
                <!-- Main Report Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <!-- Header -->
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900 mb-2">
                                {{ $report['carMaker'] }} {{ $report['carModel'] }}
                            </h1>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <span class="px-2 py-1 bg-gray-100 rounded-lg font-medium">
                                    {{ $report['carYear'] }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                    {{ $report['location'] }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($report['createdAt'])->format('M d, Y') }}
                                </span>
                            </div>
                        </div>
                        
                        @php
                            $status = $report['status'];
                            $statusConfig = [
                                'pending' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => 'Pending'],
                                'in-progress' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'label' => 'In Progress'],
                                'completed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => 'Completed'],
                                'cancelled' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => 'Cancelled'],
                            ];
                            $statusStyle = $statusConfig[$status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'label' => ucfirst($status)];
                        @endphp
                        <span class="px-4 py-2 rounded-full text-sm font-semibold {{ $statusStyle['bg'] }} {{ $statusStyle['text'] }}">
                            {{ $statusStyle['label'] }}
                        </span>
                    </div>

                    <!-- Issue Details -->
                    <div class="space-y-4 mb-6">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Issue Type</h3>
                            <p class="text-lg font-medium text-gray-900">
                                {{ ucwords(str_replace('-', ' ', $report['issueType'])) }}
                            </p>
                        </div>

                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 uppercase mb-2">Description</h3>
                            <p class="text-gray-700 leading-relaxed">{{ $report['description'] }}</p>
                        </div>
                    </div>

                    <!-- Images -->
                    @if(isset($report['images']) && count($report['images']) > 0)
                    <div class="mb-6">
                        <h3 class="text-sm font-semibold text-gray-500 uppercase mb-3">Images</h3>
                        <div class="grid grid-cols-3 md:grid-cols-4 gap-3">
                            @foreach($report['images'] as $image)
                            @php
                                $imageUrl = is_array($image) ? ($image['url'] ?? '') : $image;
                            @endphp
                            @if($imageUrl)
                            <img src="{{ $imageUrl }}" 
                                 alt="Car issue" 
                                 class="w-full h-24 object-cover rounded-lg border-2 border-gray-200 hover:border-blue-500 cursor-pointer transition"
                                 onclick="openImageModal('{{ $imageUrl }}')">
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Additional Details Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-4 bg-gray-50 rounded-xl">
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Urgency</p>
                            <p class="font-semibold text-gray-900">
                                @php
                                    $urgencyLabels = [
                                        'urgent' => 'ASAP',
                                        '24hours' => '24 Hours',
                                        '2-3days' => '2-3 Days',
                                        'week' => 'Within Week',
                                        'flexible' => 'Flexible'
                                    ];
                                @endphp
                                {{ $urgencyLabels[$report['urgency']] ?? ucfirst($report['urgency']) }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">Driveable</p>
                            <p class="font-semibold {{ $report['driveable'] ? 'text-green-600' : 'text-red-600' }}">
                                {{ $report['driveable'] ? 'Yes' : 'No' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs text-gray-500 mb-1">Service Type</p>
                            <p class="font-semibold text-gray-900">
                                {{ ucfirst($report['serviceType']) }}
                            </p>
                        </div>

                        @if($report['mileage'])
                        <div>
                            <p class="text-xs text-gray-500 mb-1">Mileage</p>
                            <p class="font-semibold text-gray-900">{{ number_format($report['mileage']) }} km</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Quotations Section -->
                @if(isset($report['quotations']) && count($report['quotations']) > 0)
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Quotations Received ({{ count($report['quotations']) }})
                    </h2>

                    <div class="space-y-4">
                        @foreach($report['quotations'] as $quotation)
                        <div class="border-2 border-gray-200 rounded-xl p-5 hover:border-blue-300 transition">
                            <div class="flex items-start justify-between mb-4">
                                <div>
                                    <h3 class="text-lg font-bold text-gray-900 mb-1">
                                        {{ $quotation['specialistName'] ?? 'Specialist' }}
                                    </h3>
                                    <p class="text-sm text-gray-600">
                                        Submitted {{ \Carbon\Carbon::parse($quotation['createdAt'] ?? now())->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-blue-600">
                                        £{{ number_format($quotation['amount'], 2) }}
                                    </p>
                                    <p class="text-sm text-gray-600">
                                        {{ $quotation['duration'] }}
                                    </p>
                                </div>
                            </div>

                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">Diagnosis & Repair Plan:</h4>
                                <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $quotation['reasonForFault'] }}</p>
                            </div>

                            @if($report['status'] === 'pending')
                            <div class="flex gap-3">
                                <button onclick="acceptQuotation('{{ $report['_id'] }}', '{{ $quotation['specialistId'] }}')"
                                        class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-xl transition">
                                    Accept Quote
                                </button>
                                <button onclick="declineQuotation('{{ $report['_id'] }}', '{{ $quotation['specialistId'] }}')"
                                        class="flex-1 bg-red-50 hover:bg-red-100 text-red-600 font-semibold py-3 rounded-xl transition">
                                    Decline
                                </button>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>

                @else
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center">
                    <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">No Quotations Yet</h3>
                    <p class="text-gray-600">Specialists will send you quotes soon. Check back later!</p>
                </div>
                @endif

                <!-- Review Section (if completed) -->
                @if($report['status'] === 'completed' && (!isset($report['reviews']) || count($report['reviews']) === 0))
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Leave a Review</h2>
                    
                    <form id="reviewForm" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Rating *</label>
                            <div class="flex gap-2" id="ratingStars">
                                @for($i = 1; $i <= 5; $i++)
                                <button type="button" 
                                        onclick="setRating({{ $i }})"
                                        class="rating-star text-3xl text-gray-300 hover:text-yellow-400 transition">
                                    ★
                                </button>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="ratingValue" required>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Your Review *</label>
                            <textarea name="comment" 
                                      required 
                                      minlength="10"
                                      rows="4"
                                      placeholder="Share your experience with this service..."
                                      class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"></textarea>
                        </div>

                        <button type="submit" 
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-xl transition">
                            Submit Review
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <!-- Right Column: Summary -->
            <div class="space-y-6">
                <div class="bg-white rounded-2xl shadow-lg p-6 sticky top-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Report Summary</h3>
                    
                    <div class="space-y-3 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Report ID:</span>
                            <span class="font-semibold text-gray-900">{{ substr($report['_id'], -8) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Status:</span>
                            <span class="font-semibold {{ $statusStyle['text'] }}">{{ $statusStyle['label'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Quotations:</span>
                            <span class="font-semibold text-gray-900">{{ count($report['quotations'] ?? []) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Created:</span>
                            <span class="font-semibold text-gray-900">
                                {{ \Carbon\Carbon::parse($report['createdAt'])->format('M d, Y') }}
                            </span>
                        </div>
                    </div>

                    @if($report['status'] === 'pending' && count($report['quotations'] ?? []) === 0)
                    <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-xl">
                        <p class="text-sm text-blue-700">
                            <strong>Waiting for quotes...</strong><br>
                            Specialists are reviewing your report. You'll be notified when you receive quotations.
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Modal -->
<div id="imageModal" class="hidden fixed inset-0 bg-black bg-opacity-90 z-50 flex items-center justify-center p-4" onclick="closeImageModal()">
    <div class="relative max-w-6xl max-h-full">
        <button onclick="closeImageModal()" class="absolute -top-10 right-0 text-white hover:text-gray-300">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
        <img id="modalImage" src="" alt="Full size" class="max-w-full max-h-screen rounded-lg">
    </div>
</div>

<script>
let selectedRating = 0;

function openImageModal(imageUrl) {
    document.getElementById('modalImage').src = imageUrl;
    document.getElementById('imageModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeImageModal() {
    document.getElementById('imageModal').classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function setRating(rating) {
    selectedRating = rating;
    document.getElementById('ratingValue').value = rating;
    
    const stars = document.querySelectorAll('.rating-star');
    stars.forEach((star, index) => {
        if (index < rating) {
            star.classList.remove('text-gray-300');
            star.classList.add('text-yellow-400');
        } else {
            star.classList.remove('text-yellow-400');
            star.classList.add('text-gray-300');
        }
    });
}

async function acceptQuotation(reportId, specialistId) {
    if (!confirm('Are you sure you want to accept this quotation? This action cannot be undone.')) {
        return;
    }

    try {
        const response = await fetch(`/reports/${reportId}/accept/${specialistId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        });

        const data = await response.json();

        if (data.success) {
            alert('Quotation accepted successfully!');
            location.reload();
        } else {
            alert('Failed to accept quotation: ' + data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
}

async function declineQuotation(reportId, specialistId) {
    if (!confirm('Are you sure you want to decline this quotation?')) {
        return;
    }

    try {
        const response = await fetch(`/reports/${reportId}/decline/${specialistId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            }
        });

        const data = await response.json();

        if (data.success) {
            alert('Quotation declined.');
            location.reload();
        } else {
            alert('Failed to decline quotation: ' + data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
}

// Submit Review
document.getElementById('reviewForm')?.addEventListener('submit', async function(e) {
    e.preventDefault();

    if (selectedRating === 0) {
        alert('Please select a rating');
        return;
    }

    const formData = new FormData(this);
    const reportId = '{{ $report["_id"] }}';

    try {
        const response = await fetch(`/reports/${reportId}/review`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                rating: selectedRating,
                comment: formData.get('comment')
            })
        });

        const data = await response.json();

        if (data.success) {
            alert('Review submitted successfully!');
            location.reload();
        } else {
            alert('Failed to submit review: ' + data.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    }
});
</script>
