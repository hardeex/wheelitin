<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-display font-bold text-[var(--color-dark-blue)] mb-2">
            Dashboard
        </h1>
        <p class="text-gray-700 text-lg font-sans">
            Welcome back, {{ $user['first_name'] ?? 'User' }}!
        </p>
    </div>

    @if($analytics)
        <!-- Top Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Total Reports Card -->
            <div class="bg-gradient-to-br from-[var(--color-sky-blue)] to-[var(--color-dark-blue)] rounded-2xl p-6 shadow-xl text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-display font-semibold opacity-90 uppercase tracking-wider mb-2">
                            Total Reports
                        </p>
                        <p class="text-5xl font-display font-bold">
                            {{ $analytics['totalReports'] ?? 0 }}
                        </p>
                    </div>
                    <div class="bg-white/20 rounded-full p-4 backdrop-blur-sm">
                        <i class="fas fa-file-alt text-3xl"></i>
                    </div>
                </div>
            </div>

            <!-- Average Rating Card -->
            <div class="bg-gradient-to-br from-[var(--color-orange)] to-[var(--color-sun)] rounded-2xl p-6 shadow-xl text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div class="flex-1">
                        <p class="text-xs font-display font-semibold opacity-90 uppercase tracking-wider mb-2">
                            Average Rating
                        </p>
                        <div class="flex items-baseline gap-2">
                            <p class="text-5xl font-display font-bold">
                                {{ $analytics['reviews']['avgRating'] ?? 'N/A' }}
                            </p>
                            @if($analytics['reviews']['avgRating'])
                            <i class="fas fa-star text-2xl"></i>
                            @endif
                        </div>
                        <p class="text-xs font-sans opacity-90 mt-2">
                            {{ $analytics['reviews']['totalReviews'] ?? 0 }} reviews
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Spent Card (Customer) -->
            <div class="bg-gradient-to-br from-[var(--color-baby-blue)] to-[var(--color-sky-blue)] rounded-2xl p-6 shadow-xl text-white transform hover:scale-105 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-display font-semibold opacity-90 uppercase tracking-wider mb-2">
                            Total Spent
                        </p>
                        <p class="text-5xl font-display font-bold">
                            £{{ number_format($analytics['customer']['totalSpent'] ?? 0, 2) }}
                        </p>
                    </div>
                    <div class="bg-white/20 rounded-full p-4 backdrop-blur-sm">
                        <i class="fas fa-pound-sign text-3xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Status Breakdown Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            @if(isset($analytics['statusBreakdown']))
                @foreach($analytics['statusBreakdown'] as $status)
                    @php
                        $colors = [
                            'pending' => ['from' => 'var(--color-orange)', 'to' => 'var(--color-sun)'],
                            'accepted' => ['from' => 'var(--color-sky-blue)', 'to' => 'var(--color-dark-blue)'],
                            'in-progress' => ['from' => 'var(--color-baby-blue)', 'to' => 'var(--color-sky-blue)'],
                            'completed' => ['from' => '#16a34a', 'to' => '#15803d']
                        ];
                        $color = $colors[$status['status']] ?? $colors['pending'];
                    @endphp
                    
                    <div class="bg-gradient-to-br rounded-2xl p-6 shadow-lg text-white hover:shadow-xl transition-all duration-300" style="background: linear-gradient(to bottom right, {{ $color['from'] }}, {{ $color['to'] }});">
                        <p class="text-xs font-display font-semibold opacity-95 uppercase tracking-wider mb-2">
                            {{ $status['label'] }}
                        </p>
                        <p class="text-4xl font-display font-bold">
                            {{ $status['count'] }}
                        </p>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Charts and Stats Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <!-- Customer Reports Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <h2 class="text-2xl font-display font-bold text-[var(--color-dark-blue)] mb-6">
                    Customer Reports
                </h2>
                <canvas id="customerReportsChart" class="max-h-72"></canvas>
                <div class="flex justify-around mt-6 pt-6 border-t border-gray-200">
                    <div class="text-center">
                        <p class="text-green-600 text-3xl font-display font-bold">{{ $analytics['customer']['reportsAccepted'] ?? 0 }}</p>
                        <p class="text-gray-600 text-sm font-sans mt-1">Accepted</p>
                    </div>
                    <div class="text-center">
                        <p class="text-red-600 text-3xl font-display font-bold">{{ $analytics['customer']['reportsDeclined'] ?? 0 }}</p>
                        <p class="text-gray-600 text-sm font-sans mt-1">Declined</p>
                    </div>
                </div>
            </div>

            <!-- Financial Summary -->
            <div class="bg-gradient-to-br from-[var(--color-sky-blue)] to-[var(--color-dark-blue)] rounded-2xl p-6 shadow-xl text-white">
                <h2 class="text-xl font-display font-bold mb-6 opacity-95">
                    Financial Summary
                </h2>
                <div class="space-y-4">
                    <div class="bg-white/15 p-5 rounded-xl backdrop-blur-sm border border-white/20">
                        <p class="text-xs font-display opacity-90 uppercase tracking-wider mb-1">Net Balance</p>
                        <p class="text-3xl font-display font-bold">
                            £{{ number_format(($analytics['specialist']['totalEarned'] ?? 0) - ($analytics['customer']['totalSpent'] ?? 0), 2) }}
                        </p>
                    </div>
                    <div class="bg-white/15 p-5 rounded-xl backdrop-blur-sm border border-white/20">
                        <p class="text-xs font-display opacity-90 uppercase tracking-wider mb-1">Active Reports</p>
                        <p class="text-3xl font-display font-bold">
                            {{ collect($analytics['statusBreakdown'] ?? [])->where('status', '!=', 'completed')->sum('count') }}
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Status Distribution & Monthly Trend -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            
            <!-- Status Distribution Pie Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <h2 class="text-2xl font-display font-bold text-[var(--color-dark-blue)] mb-6">
                    Report Status Distribution
                </h2>
                <canvas id="statusChart" class="max-h-72"></canvas>
            </div>

            <!-- Monthly Reports Chart -->
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <h2 class="text-2xl font-display font-bold text-[var(--color-dark-blue)] mb-6">
                    Monthly Trend
                </h2>
                @if(isset($analytics['monthlyReports']) && count($analytics['monthlyReports']) > 0)
                    <canvas id="monthlyChart" class="max-h-72"></canvas>
                @else
                    <div class="text-center py-12 text-gray-400">
                        <i class="fas fa-chart-line text-6xl mb-4"></i>
                        <p class="font-sans">No monthly data available yet</p>
                    </div>
                @endif
            </div>

        </div>

        <!-- Latest Report & Car Makers -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Latest Report -->
            @if(isset($analytics['latestReport']) && $analytics['latestReport'])
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                    <h2 class="text-2xl font-display font-bold text-[var(--color-dark-blue)] mb-6">
                        Latest Report
                    </h2>
                    <div class="border-l-4 border-[var(--color-sky-blue)] pl-6 bg-[#E0F2F9] p-6 rounded-r-xl">
                        <h3 class="text-2xl font-display font-bold text-[var(--color-dark-blue)] mb-4">
                            {{ $analytics['latestReport']['title'] }}
                        </h3>
                        <div class="flex gap-4 items-center flex-wrap">
                            @php
                                $statusColors = [
                                    'pending' => ['bg' => '#FEF3C7', 'text' => '#92400E'],
                                    'accepted' => ['bg' => '#DBEAFE', 'text' => '#1E40AF'],
                                    'in-progress' => ['bg' => '#FEF3C7', 'text' => '#92400E'],
                                    'completed' => ['bg' => '#D1FAE5', 'text' => '#065F46']
                                ];
                                $statusColor = $statusColors[$analytics['latestReport']['status']] ?? $statusColors['pending'];
                            @endphp
                            <span class="inline-block px-4 py-2 rounded-full text-sm font-display font-bold" style="background-color: {{ $statusColor['bg'] }}; color: {{ $statusColor['text'] }};">
                                {{ ucfirst($analytics['latestReport']['status']) }}
                            </span>
                            <span class="text-gray-600 text-sm font-sans flex items-center gap-2">
                                <i class="fas fa-clock"></i>
                                {{ \Carbon\Carbon::parse($analytics['latestReport']['date'])->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </div>
            @else
                <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-lg border border-gray-200 flex items-center justify-center text-center text-gray-400">
                    <div>
                        <i class="fas fa-file-alt text-6xl mb-4"></i>
                        <p class="font-sans">No recent reports</p>
                    </div>
                </div>
            @endif

            <!-- Quick Stats -->
            <div class="bg-gradient-to-br from-[var(--color-orange)] to-[var(--color-sun)] rounded-2xl p-6 shadow-xl text-white">
                <h2 class="text-lg font-display font-bold mb-4 opacity-95">
                    Quick Stats
                </h2>
                <div class="space-y-4">
                    <div class="bg-white/10 p-4 rounded-lg backdrop-blur-sm border border-white/20">
                        <p class="text-xs font-display opacity-90 uppercase tracking-wider">Reports This Month</p>
                        <p class="text-2xl font-display font-bold mt-1">
                            {{ count($analytics['monthlyReports'] ?? []) > 0 ? end($analytics['monthlyReports'])['count'] : 0 }}
                        </p>
                    </div>
                    <div class="bg-white/10 p-4 rounded-lg backdrop-blur-sm border border-white/20">
                        <p class="text-xs font-display opacity-90 uppercase tracking-wider">Completion Rate</p>
                        <p class="text-2xl font-display font-bold mt-1">
                            {{ $analytics['totalReports'] > 0 ? round((collect($analytics['statusBreakdown'] ?? [])->where('status', 'completed')->sum('count') / $analytics['totalReports']) * 100) : 0 }}%
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Car Makers Chart -->
        @if(isset($analytics['carMakers']) && count($analytics['carMakers']) > 0)
            <div class="bg-white rounded-2xl p-6 shadow-lg border border-gray-200">
                <h2 class="text-2xl font-display font-bold text-[var(--color-dark-blue)] mb-6">
                    Reports by Car Manufacturer
                </h2>
                <canvas id="carMakersChart" class="max-h-72"></canvas>
            </div>
        @endif

    @else
        <!-- No Analytics Data -->
        <div class="bg-white rounded-2xl p-12 shadow-lg border border-gray-200 text-center">
            <i class="fas fa-chart-bar text-8xl text-gray-300 mb-6"></i>
            <h3 class="text-3xl font-display font-bold text-[var(--color-dark-blue)] mb-3">
                No Analytics Available
            </h3>
            <p class="text-gray-600 text-lg font-sans">
                Unable to load analytics data at this time. Please try refreshing the page.
            </p>
        </div>
    @endif

</div>

@if($analytics)
<script>
    // Brand colors
    const brandColors = {
        babyBlue: '#8ECAE6',
        skyBlue: '#219EBC',
        darkBlue: '#023047',
        orange: '#FFB703',
        sun: '#FB8500'
    };

    // Customer Reports Chart
    const customerReportsCtx = document.getElementById('customerReportsChart');
    if (customerReportsCtx) {
        new Chart(customerReportsCtx, {
            type: 'doughnut',
            data: {
                labels: ['Accepted', 'Declined'],
                datasets: [{
                    data: [
                        {{ $analytics['customer']['reportsAccepted'] ?? 0 }},
                        {{ $analytics['customer']['reportsDeclined'] ?? 0 }}
                    ],
                    backgroundColor: ['#16a34a', '#dc2626'],
                    borderWidth: 4,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            font: { size: 13, weight: '600', family: 'Poppins' }
                        }
                    }
                }
            }
        });
    }

    // Status Breakdown Pie Chart
    const statusCtx = document.getElementById('statusChart');
    if (statusCtx) {
        new Chart(statusCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_column($analytics['statusBreakdown'] ?? [], 'label')) !!},
                datasets: [{
                    data: {!! json_encode(array_column($analytics['statusBreakdown'] ?? [], 'count')) !!},
                    backgroundColor: [brandColors.orange, brandColors.skyBlue, brandColors.babyBlue, '#16a34a'],
                    borderWidth: 4,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            font: { size: 13, weight: '600', family: 'Poppins' }
                        }
                    }
                }
            }
        });
    }

    // Monthly Reports Line Chart
    @if(isset($analytics['monthlyReports']) && count($analytics['monthlyReports']) > 0)
    const monthlyCtx = document.getElementById('monthlyChart');
    if (monthlyCtx) {
        new Chart(monthlyCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_column($analytics['monthlyReports'], 'month')) !!},
                datasets: [{
                    label: 'Reports',
                    data: {!! json_encode(array_column($analytics['monthlyReports'], 'count')) !!},
                    borderColor: brandColors.skyBlue,
                    backgroundColor: 'rgba(142, 202, 230, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: brandColors.skyBlue,
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { 
                            stepSize: 1,
                            font: { family: 'Poppins' }
                        }
                    },
                    x: {
                        ticks: {
                            font: { family: 'Poppins' }
                        }
                    }
                }
            }
        });
    }
    @endif

    // Car Makers Bar Chart
    @if(isset($analytics['carMakers']) && count($analytics['carMakers']) > 0)
    const carMakersCtx = document.getElementById('carMakersChart');
    if (carMakersCtx) {
        new Chart(carMakersCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(array_column($analytics['carMakers'], 'make')) !!},
                datasets: [{
                    label: 'Reports',
                    data: {!! json_encode(array_column($analytics['carMakers'], 'count')) !!},
                    backgroundColor: [
                        brandColors.skyBlue, 
                        brandColors.darkBlue, 
                        brandColors.babyBlue, 
                        brandColors.orange, 
                        brandColors.sun,
                        '#89b1cb'
                    ],
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { 
                            stepSize: 1,
                            font: { family: 'Poppins' }
                        }
                    },
                    x: {
                        ticks: {
                            font: { family: 'Poppins' }
                        }
                    }
                }
            }
        });
    }
    @endif
</script>
@endif