{{-- Success Messages --}}
@if (session('success'))
    <div id="success-alert" class="feedback-alert animate-slide-in">
        <div class="bg-[var(--color-dark-blue)] border-l-4 border-sky-blue rounded-xl shadow-2xl p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-sky-blue/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-sky-blue text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-white">Success!</p>
                    <p class="text-sm text-white/90 mt-1 leading-relaxed">{{ session('success') }}</p>
                </div>
                <button onclick="closeAlert('success-alert')" class="ml-3 flex-shrink-0 text-white/70 hover:text-white transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Error Messages --}}
@if (session('error'))
    <div id="error-alert" class="feedback-alert animate-slide-in">
        <div class="bg-[var(--color-dark-blue)] border-l-4 border-sun rounded-xl shadow-2xl p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-sun/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-circle text-sun text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-white">Error!</p>
                    <p class="text-sm text-white/90 mt-1 leading-relaxed">{{ session('error') }}</p>
                </div>
                <button onclick="closeAlert('error-alert')" class="ml-3 flex-shrink-0 text-white/70 hover:text-white transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Warning Messages --}}
@if (session('warning'))
    <div id="warning-alert" class="feedback-alert animate-slide-in">
        <div class="bg-[var(--color-dark-blue)] border-l-4 border-orange rounded-xl shadow-2xl p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-orange/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-orange text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-white">Warning!</p>
                    <p class="text-sm text-white/90 mt-1 leading-relaxed">{{ session('warning') }}</p>
                </div>
                <button onclick="closeAlert('warning-alert')" class="ml-3 flex-shrink-0 text-white/70 hover:text-white transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Info Messages --}}
@if (session('info'))
    <div id="info-alert" class="feedback-alert animate-slide-in">
        <div class="bg-[var(--color-dark-blue)] border-l-4 border-baby-blue rounded-xl shadow-2xl p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-baby-blue/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-info-circle text-baby-blue text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-white">Info</p>
                    <p class="text-sm text-white/90 mt-1 leading-relaxed">{{ session('info') }}</p>
                </div>
                <button onclick="closeAlert('info-alert')" class="ml-3 flex-shrink-0 text-white/70 hover:text-white transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div id="validation-alert" class="feedback-alert animate-slide-in">
        <div class="bg-[var(--color-dark-blue)] border-l-4 border-sun rounded-xl shadow-2xl p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-sun/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-times-circle text-sun text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm font-bold text-white">Validation Errors</p>
                    <ul class="mt-2 text-sm text-white/90 space-y-1.5">
                        @foreach ($errors->all() as $error)
                            <li class="flex items-start">
                                <i class="fas fa-circle text-sun text-xs mt-1 mr-2"></i>
                                <span>{{ $error }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <button onclick="closeAlert('validation-alert')" class="ml-3 flex-shrink-0 text-white/70 hover:text-white transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

{{-- Status Messages (for password reset, email verification, etc.) --}}
@if (session('status'))
    <div id="status-alert" class="feedback-alert animate-slide-in">
        <div class="bg-[var(--color-dark-blue)] border-l-4 border-sky-blue rounded-xl shadow-2xl p-4">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-sky-blue/20 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-sky-blue text-xl"></i>
                    </div>
                </div>
                <div class="ml-3 flex-1">
                    <p class="text-sm text-white font-medium leading-relaxed">{{ session('status') }}</p>
                </div>
                <button onclick="closeAlert('status-alert')" class="ml-3 flex-shrink-0 text-white/70 hover:text-white transition-colors">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>
        </div>
    </div>
@endif

<style>
/* Fixed positioning for alerts - MAXIMUM Z-INDEX */
.feedback-alert {
    position: fixed !important;
    top: 1rem !important;
    right: 1rem !important;
    z-index: 99999 !important;
    max-width: 28rem !important;
    width: calc(100% - 2rem) !important;
    pointer-events: auto !important;
}

/* Responsive adjustments */
@media (min-width: 640px) {
    .feedback-alert {
        width: auto !important;
        min-width: 24rem !important;
    }
}

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
    animation: slideIn 0.3s ease-out !important;
}

.animate-slide-out {
    animation: slideOut 0.3s ease-in !important;
}

/* Ensure alerts are above everything with extreme z-index */
.feedback-alert * {
    box-sizing: border-box;
}

/* Override any potential conflicts */
.feedback-alert,
.feedback-alert > div {
    isolation: isolate;
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