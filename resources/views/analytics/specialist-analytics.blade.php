<div style="max-width: 1400px; margin: 0 auto; padding: 2rem;">
    
    <!-- Header -->
    <div style="margin-bottom: 2rem;">
        <h1 style="font-size: 2.25rem; font-weight: 700; color: #111827; margin-bottom: 0.5rem;">
            Dashboard
        </h1>
        <p style="color: #6b7280; font-size: 1rem;">
            Welcome back, {{ $user['first_name'] ?? 'User' }}!
        </p>
    </div>

    @if($analytics)
        <!-- Top Stats Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            
            <!-- Total Reports Card -->
            <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 1rem; padding: 1.5rem; box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3); color: white;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-size: 0.75rem; font-weight: 500; opacity: 0.9; text-transform: uppercase; letter-spacing: 0.05em;">
                            Total Reports
                        </p>
                        <p style="font-size: 2.5rem; font-weight: 700; margin-top: 0.5rem;">
                            {{ $analytics['totalReports'] ?? 0 }}
                        </p>
                    </div>
                    <div style="background: rgba(255,255,255,0.2); border-radius: 9999px; padding: 0.75rem;">
                        <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Average Rating Card -->
            <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 1rem; padding: 1.5rem; box-shadow: 0 10px 25px rgba(245, 87, 108, 0.3); color: white;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div>
                        <p style="font-size: 0.75rem; font-weight: 500; opacity: 0.9; text-transform: uppercase; letter-spacing: 0.05em;">
                            Avg Rating
                        </p>
                        <p style="font-size: 2.5rem; font-weight: 700; margin-top: 0.5rem; display: flex; align-items: baseline; gap: 0.5rem;">
                            {{ $analytics['reviews']['avgRating'] ?? 'N/A' }}
                            @if($analytics['reviews']['avgRating'])
                            <span style="font-size: 1.25rem; opacity: 0.9;">⭐</span>
                            @endif
                        </p>
                        <p style="font-size: 0.75rem; opacity: 0.9; margin-top: 0.25rem;">
                            {{ $analytics['reviews']['totalReviews'] ?? 0 }} reviews
                        </p>
                    </div>
                </div>
            </div>

            <!-- Total Earned Card (Specialist) -->
            <div style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); border-radius: 1rem; padding: 1.5rem; box-shadow: 0 10px 25px rgba(56, 239, 125, 0.3); color: white;">
                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <div style="width: 100%;">
                        <p style="font-size: 0.75rem; font-weight: 500; opacity: 0.9; text-transform: uppercase; letter-spacing: 0.05em;">
                            Total Earned
                        </p>
                        <p style="font-size: 2.5rem; font-weight: 700; margin-top: 0.5rem;">
                            ${{ number_format($analytics['specialist']['totalEarned'] ?? 0, 2) }}
                        </p>
                    </div>
                    <div style="background: rgba(255,255,255,0.2); border-radius: 9999px; padding: 0.75rem;">
                        <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            
        </div>

        <!-- Status Breakdown Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
            @if(isset($analytics['statusBreakdown']))
                @foreach($analytics['statusBreakdown'] as $status)
                    @php
                        $colors = [
                            'pending' => ['gradient' => 'linear-gradient(135deg, #FCD34D 0%, #F59E0B 100%)', 'shadow' => 'rgba(245, 158, 11, 0.3)'],
                            'accepted' => ['gradient' => 'linear-gradient(135deg, #60A5FA 0%, #3B82F6 100%)', 'shadow' => 'rgba(59, 130, 246, 0.3)'],
                            'in-progress' => ['gradient' => 'linear-gradient(135deg, #FDE047 0%, #EAB308 100%)', 'shadow' => 'rgba(234, 179, 8, 0.3)'],
                            'completed' => ['gradient' => 'linear-gradient(135deg, #34D399 0%, #10B981 100%)', 'shadow' => 'rgba(16, 185, 129, 0.3)']
                        ];
                        $color = $colors[$status['status']] ?? $colors['pending'];
                    @endphp
                    
                    <div style="background: {{ $color['gradient'] }}; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 10px 25px {{ $color['shadow'] }}; color: white;">
                        <p style="font-size: 0.75rem; font-weight: 500; opacity: 0.95; text-transform: uppercase; letter-spacing: 0.05em;">
                            {{ $status['label'] }}
                        </p>
                        <p style="font-size: 2.5rem; font-weight: 700; margin-top: 0.5rem;">
                            {{ $status['count'] }}
                        </p>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Charts and Stats Row -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            
            

            <!-- Specialist Quotations Chart -->
            <div style="background-color: white; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">
                    Specialist Quotations
                </h2>
                <canvas id="specialistQuotationsChart" style="max-height: 300px;"></canvas>
                <div style="display: flex; justify-content: space-around; margin-top: 1rem; padding-top: 1rem; border-top: 1px solid #e5e7eb;">
                    <div style="text-align: center;">
                        <p style="color: #3B82F6; font-size: 1.5rem; font-weight: 700;">{{ $analytics['specialist']['quotationsAccepted'] ?? 0 }}</p>
                        <p style="color: #6b7280; font-size: 0.875rem;">Accepted</p>
                    </div>
                    <div style="text-align: center;">
                        <p style="color: #F59E0B; font-size: 1.5rem; font-weight: 700;">{{ $analytics['specialist']['quotationsDeclined'] ?? 0 }}</p>
                        <p style="color: #6b7280; font-size: 0.875rem;">Declined</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Status Distribution & Monthly Trend -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            
            <!-- Status Distribution Pie Chart -->
            <div style="background-color: white; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">
                    Report Status Distribution
                </h2>
                <canvas id="statusChart" style="max-height: 300px;"></canvas>
            </div>

            <!-- Monthly Reports Chart -->
            <div style="background-color: white; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">
                    Monthly Trend
                </h2>
                @if(isset($analytics['monthlyReports']) && count($analytics['monthlyReports']) > 0)
                    <canvas id="monthlyChart" style="max-height: 300px;"></canvas>
                @else
                    <div style="text-align: center; padding: 3rem; color: #9CA3AF;">
                        <svg style="width: 4rem; height: 4rem; margin: 0 auto 1rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <p>No monthly data available yet</p>
                    </div>
                @endif
            </div>

        </div>

    

        <!-- Car Makers Chart -->
        @if(isset($analytics['carMakers']) && count($analytics['carMakers']) > 0)
            <div style="background-color: white; border-radius: 1rem; padding: 1.5rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08);">
                <h2 style="font-size: 1.25rem; font-weight: 600; color: #111827; margin-bottom: 1rem;">
                    Reports by Car Maker
                </h2>
                <canvas id="carMakersChart" style="max-height: 300px;"></canvas>
            </div>
        @endif

    @else
        <!-- No Analytics Data -->
        <div style="background-color: white; border-radius: 1rem; padding: 3rem; box-shadow: 0 4px 15px rgba(0,0,0,0.08); text-align: center;">
            <svg style="width: 5rem; height: 5rem; color: #d1d5db; margin: 0 auto 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
            </svg>
            <h3 style="font-size: 1.5rem; font-weight: 600; color: #111827; margin-bottom: 0.5rem;">
                No Analytics Available
            </h3>
            <p style="color: #6b7280; font-size: 1rem;">
                Unable to load analytics data at this time. Please try refreshing the page.
            </p>
        </div>
    @endif

</div>

@if($analytics)
<script>
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
                    backgroundColor: ['#10B981', '#EF4444'],
                    borderWidth: 3,
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
                            padding: 15,
                            font: { size: 12, weight: '600' }
                        }
                    }
                }
            }
        });
    }

    // Specialist Quotations Chart
    const specialistQuotationsCtx = document.getElementById('specialistQuotationsChart');
    if (specialistQuotationsCtx) {
        new Chart(specialistQuotationsCtx, {
            type: 'doughnut',
            data: {
                labels: ['Accepted', 'Declined'],
                datasets: [{
                    data: [
                        {{ $analytics['specialist']['quotationsAccepted'] ?? 0 }},
                        {{ $analytics['specialist']['quotationsDeclined'] ?? 0 }}
                    ],
                    backgroundColor: ['#3B82F6', '#F59E0B'],
                    borderWidth: 3,
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
                            padding: 15,
                            font: { size: 12, weight: '600' }
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
                    backgroundColor: ['#F59E0B', '#3B82F6', '#EAB308', '#10B981'],
                    borderWidth: 3,
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
                            font: { size: 12, weight: '600' }
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
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#fff',
                    pointBorderWidth: 3,
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {{{-- Success Messages --}}
@if (session('success'))
    <div id="success-alert" class="fixed top-4 right-4 z-50 max-w-md w-full animate-slide-in">
        <div class="bg-success-50 border-l-4 border-success-500 rounded-xl shadow-2xl p-4 backdrop-blur-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-success-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-success-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-success-900">Success!</p>
                    <p class="text-sm text-success-800 mt-1 leading-relaxed">{{ session('success') }}</p>
                </div>
                <button onclick="closeAlert('success-alert')" class="ml-3 flex-shrink-0 text-success-500 hover:text-success-700 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Error Messages --}}
@if (session('error'))
    <div id="error-alert" class="fixed top-4 right-4 z-50 max-w-md w-full animate-slide-in">
        <div class="bg-error-50 border-l-4 border-error-500 rounded-xl shadow-2xl p-4 backdrop-blur-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-error-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-circle text-error-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-error-900">Error!</p>
                    <p class="text-sm text-error-800 mt-1 leading-relaxed">{{ session('error') }}</p>
                </div>
                <button onclick="closeAlert('error-alert')" class="ml-3 flex-shrink-0 text-error-500 hover:text-error-700 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Warning Messages --}}
@if (session('warning'))
    <div id="warning-alert" class="fixed top-4 right-4 z-50 max-w-md w-full animate-slide-in">
        <div class="bg-warning-50 border-l-4 border-warning-500 rounded-xl shadow-2xl p-4 backdrop-blur-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-warning-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-warning-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-warning-900">Warning!</p>
                    <p class="text-sm text-warning-800 mt-1 leading-relaxed">{{ session('warning') }}</p>
                </div>
                <button onclick="closeAlert('warning-alert')" class="ml-3 flex-shrink-0 text-warning-500 hover:text-warning-700 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Info Messages --}}
@if (session('info'))
    <div id="info-alert" class="fixed top-4 right-4 z-50 max-w-md w-full animate-slide-in">
        <div class="bg-primary-50 border-l-4 border-primary-500 rounded-xl shadow-2xl p-4 backdrop-blur-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-info-circle text-primary-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-primary-900">Info</p>
                    <p class="text-sm text-primary-800 mt-1 leading-relaxed">{{ session('info') }}</p>
                </div>
                <button onclick="closeAlert('info-alert')" class="ml-3 flex-shrink-0 text-primary-500 hover:text-primary-700 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div id="validation-alert" class="fixed top-4 right-4 z-50 max-w-md w-full animate-slide-in">
        <div class="bg-error-50 border-l-4 border-error-500 rounded-xl shadow-2xl p-4 backdrop-blur-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-error-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-times-circle text-error-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-error-900">Validation Errors</p>
                    <ul class="mt-2 text-sm text-error-800 space-y-1.5">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-start">
                                <i class="fas fa-circle text-error-600 text-xs mt-1 mr-2"></i>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="closeAlert('validation-alert')" class="ml-3 flex-shrink-0 text-error-500 hover:text-error-700 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Status Messages (for password reset, email verification, etc.) --}}
@if (session('status'))
    <div id="status-alert" class="fixed top-4 right-4 z-50 max-w-md w-full animate-slide-in">
        <div class="bg-primary-50 border-l-4 border-primary-500 rounded-xl shadow-2xl p-4 backdrop-blur-sm">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-primary-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-primary-600 text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm text-primary-900 font-medium leading-relaxed">{{ session('status') }}</p>
                </div>
                <button onclick="closeAlert('status-alert')" class="ml-3 flex-shrink-0 text-primary-500 hover:text-primary-700 transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

<style>
@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

@keyframes slideOut {
    from {
        transform: translateX(0);
        opacity: 1;
    }
    to {
        transform: translateX(100%);
        opacity: 0;
    }
}

.animate-slide-in {
    animation: slideIn 0.3s ease-out;
}

.animate-slide-out {
    animation: slideOut 0.3s ease-in;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-dismiss alerts after 5 seconds
    const alerts = [
        'success-alert',
        'error-alert',
        'warning-alert',
        'info-alert',
        'validation-alert',
        'status-alert'
    ];

    alerts.forEach(function(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            setTimeout(function() {
                closeAlert(alertId);
            }, 5000);
        }
    });
});

function closeAlert(alertId) {
    const alert = document.getElementById(alertId);
    if (alert) {
        alert.classList.remove('animate-slide-in');
        alert.classList.add('animate-slide-out');
        
        setTimeout(function() {
            alert.remove();
        }, 300);
    }
}
</script>
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1 }
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
                        '#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe', '#00f2fe'
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
                        ticks: { stepSize: 1 }
                    }
                }
            }
        });
    }
    @endif
</script>
@endif