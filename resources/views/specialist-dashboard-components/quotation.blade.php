
<div class="min-h-screen" style="background: linear-gradient(135deg, var(--color-neutral-100) 0%, var(--color-primary-100) 100%)">
    <!-- Header -->
    <header class="bg-white shadow-sm border-b" style="border-color: var(--color-neutral-200)">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold" style="color: var(--color-accent-900)">My Quotations</h1>
                    <p class="text-sm mt-1" style="color: var(--color-neutral-700)">Manage and track your submitted quotations</p>
                </div>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-sm font-medium" style="color: var(--color-accent-900)">{{ $user['name'] ?? 'Specialist' }}</p>
                        <p class="text-xs" style="color: var(--color-neutral-700)">{{ $user['email'] ?? '' }}</p>
                    </div>
                    <div class="w-10 h-10 rounded-full bg-brand-gradient flex items-center justify-center text-white font-semibold">
                        {{ strtoupper(substr($user['name'] ?? 'S', 0, 1)) }}
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="bg-white rounded-lg shadow-sm border p-5" style="border-color: var(--color-neutral-200)">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium" style="color: var(--color-neutral-700)">Total Quotations</p>
                        <p class="text-2xl font-bold mt-1" style="color: var(--color-accent-900)">{{ count($quotations) }}</p>
                    </div>
                    <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background-color: var(--color-primary-100)">
                        <i class="fas fa-file-invoice text-xl" style="color: var(--color-primary-600)"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border p-5" style="border-color: var(--color-neutral-200)">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium" style="color: var(--color-neutral-700)">Pending</p>
                        <p class="text-2xl font-bold mt-1" style="color: var(--color-warning-600)">
                            {{ collect($quotations)->where('status', 'pending')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background-color: var(--color-warning-100)">
                        <i class="fas fa-clock text-xl" style="color: var(--color-warning-600)"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border p-5" style="border-color: var(--color-neutral-200)">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium" style="color: var(--color-neutral-700)">Accepted</p>
                        <p class="text-2xl font-bold mt-1" style="color: var(--color-success-600)">
                            {{ collect($quotations)->where('status', 'accepted')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background-color: var(--color-success-100)">
                        <i class="fas fa-check-circle text-xl" style="color: var(--color-success-600)"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-sm border p-5" style="border-color: var(--color-neutral-200)">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium" style="color: var(--color-neutral-700)">Completed</p>
                        <p class="text-2xl font-bold mt-1" style="color: var(--color-primary-600)">
                            {{ collect($quotations)->where('status', 'completed')->count() }}
                        </p>
                    </div>
                    <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background-color: var(--color-primary-100)">
                        <i class="fas fa-check-double text-xl" style="color: var(--color-primary-600)"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Tabs -->
        <div class="bg-white rounded-lg shadow-sm border mb-6" style="border-color: var(--color-neutral-200)">
            <div class="border-b" style="border-color: var(--color-neutral-200)">
                <nav class="flex -mb-px overflow-x-auto">
                    <button onclick="filterQuotations('all')" class="filter-tab active whitespace-nowrap px-6 py-4 text-sm font-medium border-b-2" style="border-color: var(--color-primary-600); color: var(--color-primary-600)">
                        All ({{ count($quotations) }})
                    </button>
                    <button onclick="filterQuotations('pending')" class="filter-tab whitespace-nowrap px-6 py-4 text-sm font-medium border-b-2 border-transparent" style="color: var(--color-neutral-700)">
                        Pending ({{ collect($quotations)->where('status', 'pending')->count() }})
                    </button>
                    <button onclick="filterQuotations('accepted')" class="filter-tab whitespace-nowrap px-6 py-4 text-sm font-medium border-b-2 border-transparent" style="color: var(--color-neutral-700)">
                        Accepted ({{ collect($quotations)->where('status', 'accepted')->count() }})
                    </button>
                    <button onclick="filterQuotations('completed')" class="filter-tab whitespace-nowrap px-6 py-4 text-sm font-medium border-b-2 border-transparent" style="color: var(--color-neutral-700)">
                        Completed ({{ collect($quotations)->where('status', 'completed')->count() }})
                    </button>
                    <button onclick="filterQuotations('rejected')" class="filter-tab whitespace-nowrap px-6 py-4 text-sm font-medium border-b-2 border-transparent" style="color: var(--color-neutral-700)">
                        Rejected ({{ collect($quotations)->where('status', 'rejected')->count() }})
                    </button>
                </nav>
            </div>
        </div>

        <!-- Quotations List -->
        @if(count($quotations) > 0)
            <div class="space-y-4">
                @foreach($quotations as $quote)
                    <div class="quotation-card bg-white rounded-lg shadow-sm border hover:shadow-md transition-shadow duration-200" data-status="{{ $quote['status'] ?? 'pending' }}" style="border-color: var(--color-neutral-200)">
                        <div class="p-6">
                            <!-- Header -->
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <div class="flex items-center gap-3 mb-2">
                                        <h3 class="text-lg font-semibold" style="color: var(--color-accent-900)">{{ $quote['car'] ?? 'N/A' }}</h3>
                                        @if(isset($quote['status']))
                                            @php
                                                $statusStyles = [
                                                    'pending' => 'background-color: var(--color-warning-100); color: var(--color-warning-800); border-color: var(--color-warning-200)',
                                                    'accepted' => 'background-color: var(--color-success-100); color: var(--color-success-800); border-color: var(--color-success-200)',
                                                    'rejected' => 'background-color: var(--color-error-100); color: var(--color-error-800); border-color: var(--color-error-200)',
                                                    'completed' => 'background-color: var(--color-primary-100); color: var(--color-primary-800); border-color: var(--color-primary-200)',
                                                ];
                                                $statusIcons = [
                                                    'pending' => 'fa-clock',
                                                    'accepted' => 'fa-check-circle',
                                                    'rejected' => 'fa-times-circle',
                                                    'completed' => 'fa-check-double',
                                                ];
                                            @endphp
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium border" style="{{ $statusStyles[$quote['status']] ?? 'background-color: var(--color-neutral-100); color: var(--color-neutral-800); border-color: var(--color-neutral-200)' }}">
                                                <i class="fas {{ $statusIcons[$quote['status']] ?? 'fa-circle' }}"></i>
                                                {{ ucfirst($quote['status']) }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="flex flex-wrap items-center gap-4 text-sm" style="color: var(--color-neutral-700)">
                                        <span class="flex items-center gap-1.5">
                                            <i class="fas fa-hashtag" style="color: var(--color-neutral-500)"></i>
                                            {{ substr($quote['reportId'] ?? 'N/A', -8) }}
                                        </span>
                                        <span class="flex items-center gap-1.5">
                                            <i class="fas fa-calendar" style="color: var(--color-neutral-500)"></i>
                                            {{ isset($quote['submittedAt']) ? date('M d, Y', strtotime($quote['submittedAt'])) : 'N/A' }}
                                        </span>
                                        @if(isset($quote['customer']['name']))
                                            <span class="flex items-center gap-1.5">
                                                <i class="fas fa-user" style="color: var(--color-neutral-500)"></i>
                                                {{ $quote['customer']['name'] }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button onclick="toggleDetails('{{ $quote['reportId'] ?? '' }}')" class="p-2 transition-colors" style="color: var(--color-neutral-500)">
                                    <i class="fas fa-chevron-down text-xl toggle-icon"></i>
                                </button>
                            </div>

                            <!-- Quotation Summary -->
                            @if(isset($quote['quotation']))
                                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 py-4 border-t" style="border-color: var(--color-neutral-200)">
                                    <div class="flex items-center gap-3">
                                      <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: var(--color-success-100)">
    <i class="fas fa-sterling-sign" style="color: var(--color-success-600)"></i>
</div>

                                        <div>
                                            <p class="text-xs font-medium" style="color: var(--color-neutral-700)">Amount</p>
                                            <p class="text-lg font-bold" style="color: var(--color-accent-900)"> £ {{ number_format($quote['quotation']['amount'] ?? 0, 2) }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: var(--color-primary-100)">
                                            <i class="fas fa-clock" style="color: var(--color-primary-600)"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium" style="color: var(--color-neutral-700)">Duration</p>
                                            <p class="text-lg font-bold" style="color: var(--color-accent-900)">{{ $quote['quotation']['duration'] ?? 'N/A' }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 rounded-lg flex items-center justify-center" style="background-color: var(--color-accent-100)">
                                            <i class="fas fa-calendar-check" style="color: var(--color-accent-600)"></i>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium" style="color: var(--color-neutral-700)">Submitted</p>
                                            <p class="text-sm font-semibold" style="color: var(--color-accent-900)">
                                                {{ isset($quote['quotation']['submittedAt']) ? date('M d, Y', strtotime($quote['quotation']['submittedAt'])) : 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <!-- Expandable Details -->
                            <div id="details-{{ $quote['reportId'] ?? '' }}" class="hidden mt-4 pt-4 border-t" style="border-color: var(--color-neutral-200)">
                                @if(isset($quote['quotation']['reasonForFault']))
                                    <div class="mb-4">
                                        <h4 class="text-sm font-semibold mb-2 flex items-center gap-2" style="color: var(--color-accent-800)">
                                            <i class="fas fa-wrench" style="color: var(--color-neutral-500)"></i>
                                            Reason for Fault
                                        </h4>
                                        <p class="text-sm rounded-lg p-3" style="color: var(--color-neutral-800); background-color: var(--color-neutral-100)">{{ $quote['quotation']['reasonForFault'] }}</p>
                                    </div>
                                @endif

                                @if(isset($quote['customer']))
                                    <div class="mb-4">
                                        <h4 class="text-sm font-semibold mb-2 flex items-center gap-2" style="color: var(--color-accent-800)">
                                            <i class="fas fa-user-circle" style="color: var(--color-neutral-500)"></i>
                                            Customer Information
                                        </h4>
                                        <div class="rounded-lg p-3 space-y-1" style="background-color: var(--color-neutral-100)">
                                            @if(isset($quote['customer']['name']))
                                                <p class="text-sm" style="color: var(--color-neutral-800)"><span class="font-medium">Name:</span> {{ $quote['customer']['name'] }}</p>
                                            @endif
                                            @if(isset($quote['customer']['email']))
                                                <p class="text-sm" style="color: var(--color-neutral-800)"><span class="font-medium">Email:</span> {{ $quote['customer']['email'] }}</p>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <!-- Review Section for Completed Reports -->
                                @if(($quote['status'] ?? '') === 'completed')
                                    <div class="mt-4 pt-4 border-t" style="border-color: var(--color-neutral-200)">
                                        <div id="review-form-{{ $quote['reportId'] ?? '' }}" class="review-form">
                                            <h4 class="text-sm font-semibold mb-3 flex items-center gap-2" style="color: var(--color-accent-800)">
                                                <i class="fas fa-star" style="color: var(--color-warning-500)"></i>
                                                Submit Review
                                            </h4>
                                            <form onsubmit="submitReview(event, '{{ $quote['reportId'] ?? '' }}')">
                                                <div class="mb-3">
                                                    <label class="block text-sm font-medium mb-2" style="color: var(--color-accent-800)">Rating</label>
                                                    <div class="flex gap-2">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <button type="button" onclick="setRating('{{ $quote['reportId'] ?? '' }}', {{ $i }})" class="rating-star w-10 h-10 rounded-lg border-2 transition-all flex items-center justify-center" style="border-color: var(--color-neutral-300); color: var(--color-neutral-400)" data-rating="{{ $i }}">
                                                                <i class="fas fa-star text-xl"></i>
                                                            </button>
                                                        @endfor
                                                    </div>
                                                    <input type="hidden" name="rating" id="rating-{{ $quote['reportId'] ?? '' }}" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label class="block text-sm font-medium mb-2" style="color: var(--color-accent-800)">Comment (min 10 characters)</label>
                                                    <textarea name="comment" id="comment-{{ $quote['reportId'] ?? '' }}" rows="3" required minlength="10" class="w-full px-3 py-2 border rounded-lg text-sm" style="border-color: var(--color-neutral-300)" placeholder="Share your experience with this service..."></textarea>
                                                </div>
                                                <div class="flex gap-3">
                                                    <button type="submit" class="flex-1 text-white font-medium py-2.5 px-4 rounded-lg transition-colors flex items-center justify-center gap-2 bg-brand-gradient">
                                                        <i class="fas fa-paper-plane"></i>
                                                        Submit Review
                                                    </button>
                                                </div>
                                            </form>
                                            <div id="review-success-{{ $quote['reportId'] ?? '' }}" class="hidden mt-3 p-3 border rounded-lg" style="background-color: var(--color-success-50); border-color: var(--color-success-200)">
                                                <p class="text-sm flex items-center gap-2" style="color: var(--color-success-800)">
                                                    <i class="fas fa-check-circle"></i>
                                                    Review submitted successfully!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-lg shadow-sm border p-12 text-center" style="border-color: var(--color-neutral-200)">
                <div class="w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4" style="background-color: var(--color-neutral-100)">
                    <i class="fas fa-inbox text-3xl" style="color: var(--color-neutral-500)"></i>
                </div>
                <h3 class="text-lg font-semibold mb-2" style="color: var(--color-accent-900)">No Quotations Found</h3>
                <p class="mb-6" style="color: var(--color-neutral-700)">You haven't submitted any quotations yet.</p>
                @if(isset($error))
                    <div class="border rounded-lg p-4 mb-4 max-w-md mx-auto" style="background-color: var(--color-error-50); border-color: var(--color-error-200)">
                        <p class="text-sm" style="color: var(--color-error-800)">{{ $error }}</p>
                    </div>
                @endif
            </div>
        @endif
    </main>
</div>

<script>
    // Filter quotations
    function filterQuotations(status) {
        const cards = document.querySelectorAll('.quotation-card');
        const tabs = document.querySelectorAll('.filter-tab');
        
        tabs.forEach(tab => {
            tab.classList.remove('active');
            tab.style.borderColor = 'transparent';
            tab.style.color = 'var(--color-neutral-700)';
        });
        
        event.target.classList.add('active');
        event.target.style.borderColor = 'var(--color-primary-600)';
        event.target.style.color = 'var(--color-primary-600)';
        
        cards.forEach(card => {
            if (status === 'all' || card.dataset.status === status) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Toggle details
    function toggleDetails(reportId) {
        const details = document.getElementById(`details-${reportId}`);
        const icon = event.currentTarget.querySelector('.toggle-icon');
        
        if (details.classList.contains('hidden')) {
            details.classList.remove('hidden');
            icon.classList.remove('fa-chevron-down');
            icon.classList.add('fa-chevron-up');
        } else {
            details.classList.add('hidden');
            icon.classList.remove('fa-chevron-up');
            icon.classList.add('fa-chevron-down');
        }
    }

    // Rating system
    function setRating(reportId, rating) {
        const stars = document.querySelectorAll(`#review-form-${reportId} .rating-star`);
        const input = document.getElementById(`rating-${reportId}`);
        
        input.value = rating;
        
        stars.forEach((star, index) => {
            if (index < rating) {
                star.style.borderColor = 'var(--color-warning-400)';
                star.style.backgroundColor = 'var(--color-warning-50)';
                star.style.color = 'var(--color-warning-400)';
            } else {
                star.style.borderColor = 'var(--color-neutral-300)';
                star.style.backgroundColor = 'transparent';
                star.style.color = 'var(--color-neutral-400)';
            }
        });
    }

    // Submit review
    async function submitReview(event, reportId) {
        event.preventDefault();
        
        const form = event.target;
        const rating = document.getElementById(`rating-${reportId}`).value;
        const comment = document.getElementById(`comment-${reportId}`).value;
        
        if (!rating) {
            alert('Please select a rating');
            return;
        }
        
        const submitBtn = form.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
        
        try {
            const response = await fetch(`/reports/${reportId}/review`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ rating: parseInt(rating), comment })
            });
            
            const data = await response.json();
            
            if (data.success) {
                form.classList.add('hidden');
                document.getElementById(`review-success-${reportId}`).classList.remove('hidden');
            } else {
                alert(data.message || 'Failed to submit review');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            }
        } catch (error) {
            alert('An error occurred while submitting your review');
            submitBtn.disabled = false;
            submitBtn.innerHTML = originalText;
        }
    }
</script>
