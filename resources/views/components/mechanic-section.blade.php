<!-- mechanic-section.blade.php -->
<section class="pt-20 pb-0 px-0 bg-[var(--color-background)]">
    <div class="w-[80%] mx-auto">
        <!-- Video Container -->
        <div class="relative rounded-[20px] overflow-hidden group shadow-2xl">
            <!-- Video Element -->
            <video 
                id="mechanicVideo"
                class="w-full h-auto object-cover block"
                poster="/images/mechanic--on-call.png"
                preload="metadata"
                playsinline
            >
                <source src="/videos/wheelitin-conenct users and mechanics.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            
            <!-- Loading Spinner -->
            <div 
                id="loadingSpinner" 
                class="absolute inset-0 flex items-center justify-center bg-black/40 pointer-events-none opacity-0 transition-opacity duration-300"
            >
                <div class="w-16 h-16 border-4 border-white/30 border-t-white rounded-full animate-spin"></div>
            </div>
            
            <!-- Play Button Overlay - Centered -->
            <div 
                id="playButtonOverlay" 
                class="absolute inset-0 flex items-center justify-center bg-black/20 cursor-pointer transition-all duration-300 hover:bg-black/30"
                role="button"
                aria-label="Play video"
                tabindex="0"
            >
                <!-- Play Button Circle with Pulse Animation -->
                <div class="relative">
                    <!-- Pulse Ring -->
                    <div class="absolute inset-0 w-[100px] h-[100px] bg-white rounded-full animate-ping opacity-20"></div>
                    <!-- Play Button -->
                    <div class="relative w-[100px] h-[100px] bg-white rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 hover:scale-110 hover:shadow-3xl">
                        <svg 
                            class="w-[40px] h-[40px] text-[#023047] ml-[6px]" 
                            fill="currentColor" 
                            viewBox="0 0 24 24"
                        >
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Video Controls -->
            <div 
                id="videoControls" 
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 via-black/60 to-transparent p-6 opacity-0 transition-opacity duration-300 pointer-events-none"
            >
                <!-- Progress Bar -->
                <div class="mb-4">
                    <div 
                        id="progressContainer" 
                        class="w-full h-1.5 bg-white/30 rounded-full cursor-pointer hover:h-2 transition-all duration-200"
                        role="progressbar"
                        aria-label="Video progress"
                    >
                        <div 
                            id="progressBar" 
                            class="h-full bg-white rounded-full transition-all duration-100 relative"
                            style="width: 0%"
                        >
                            <div class="absolute right-0 top-1/2 -translate-y-1/2 w-3 h-3 bg-white rounded-full shadow-lg opacity-0 group-hover:opacity-100 transition-opacity"></div>
                        </div>
                    </div>
                </div>

                <!-- Control Buttons -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <!-- Play/Pause Button -->
                        <button 
                            id="playPauseBtn" 
                            class="text-white hover:text-gray-300 transition-colors"
                            aria-label="Play or pause video"
                        >
                            <svg id="playIcon" class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                            <svg id="pauseIcon" class="w-8 h-8 hidden" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                            </svg>
                        </button>

                        <!-- Volume Control -->
                        <div class="flex items-center gap-2 group/volume">
                            <button 
                                id="volumeBtn" 
                                class="text-white hover:text-gray-300 transition-colors"
                                aria-label="Toggle mute"
                            >
                                <svg id="volumeIcon" class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M3 9v6h4l5 5V4L7 9H3zm13.5 3c0-1.77-1.02-3.29-2.5-4.03v8.05c1.48-.73 2.5-2.25 2.5-4.02z"/>
                                </svg>
                                <svg id="muteIcon" class="w-6 h-6 hidden" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M16.5 12c0-1.77-1.02-3.29-2.5-4.03v2.21l2.45 2.45c.03-.2.05-.41.05-.63zm2.5 0c0 .94-.2 1.82-.54 2.64l1.51 1.51C20.63 14.91 21 13.5 21 12c0-4.28-2.99-7.86-7-8.77v2.06c2.89.86 5 3.54 5 6.71zM4.27 3L3 4.27 7.73 9H3v6h4l5 5v-6.73l4.25 4.25c-.67.52-1.42.93-2.25 1.18v2.06c1.38-.31 2.63-.95 3.69-1.81L19.73 21 21 19.73l-9-9L4.27 3zM12 4L9.91 6.09 12 8.18V4z"/>
                                </svg>
                            </button>
                            <input 
                                type="range" 
                                id="volumeSlider" 
                                min="0" 
                                max="100" 
                                value="100"
                                class="w-0 group-hover/volume:w-20 transition-all duration-300 h-1 bg-white/30 rounded-lg appearance-none cursor-pointer [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:w-3 [&::-webkit-slider-thumb]:h-3 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-white"
                                aria-label="Volume"
                            />
                        </div>

                        <!-- Time Display -->
                        <div class="text-white text-sm font-medium">
                            <span id="currentTime">0:00</span> / <span id="duration">0:00</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <!-- Fullscreen Button -->
                        <button 
                            id="fullscreenBtn" 
                            class="text-white hover:text-gray-300 transition-colors"
                            aria-label="Toggle fullscreen"
                        >
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
@keyframes ping {
    75%, 100% {
        transform: scale(1.5);
        opacity: 0;
    }
}

.animate-ping {
    animation: ping 2s cubic-bezier(0, 0, 0.2, 1) infinite;
}

/* Custom scrollbar for volume slider */
#volumeSlider::-webkit-slider-runnable-track {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}

#volumeSlider::-moz-range-track {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 10px;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('mechanicVideo');
    const overlay = document.getElementById('playButtonOverlay');
    const controls = document.getElementById('videoControls');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const playIcon = document.getElementById('playIcon');
    const pauseIcon = document.getElementById('pauseIcon');
    const progressContainer = document.getElementById('progressContainer');
    const progressBar = document.getElementById('progressBar');
    const currentTimeEl = document.getElementById('currentTime');
    const durationEl = document.getElementById('duration');
    const volumeBtn = document.getElementById('volumeBtn');
    const volumeIcon = document.getElementById('volumeIcon');
    const muteIcon = document.getElementById('muteIcon');
    const volumeSlider = document.getElementById('volumeSlider');
    const fullscreenBtn = document.getElementById('fullscreenBtn');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const container = video.parentElement;

    let controlsTimeout;

    // Format time in mm:ss
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs.toString().padStart(2, '0')}`;
    }

    // Toggle play/pause
    function togglePlay() {
        if (video.paused) {
            video.play();
        } else {
            video.pause();
        }
    }

    // Update play/pause icons
    function updatePlayButton() {
        if (video.paused) {
            playIcon.classList.remove('hidden');
            pauseIcon.classList.add('hidden');
        } else {
            playIcon.classList.add('hidden');
            pauseIcon.classList.remove('hidden');
        }
    }

    // Show controls
    function showControls() {
        if (!video.paused) {
            controls.style.opacity = '1';
            controls.style.pointerEvents = 'auto';
            clearTimeout(controlsTimeout);
            controlsTimeout = setTimeout(hideControls, 3000);
        }
    }

    // Hide controls
    function hideControls() {
        if (!video.paused) {
            controls.style.opacity = '0';
            controls.style.pointerEvents = 'none';
        }
    }

    // Play video when overlay is clicked
    overlay.addEventListener('click', togglePlay);
    overlay.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            togglePlay();
        }
    });

    // Click video to toggle play/pause
    video.addEventListener('click', togglePlay);

    // Play/Pause button
    playPauseBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        togglePlay();
    });

    // Update UI when video plays
    video.addEventListener('play', function() {
        overlay.style.opacity = '0';
        overlay.style.pointerEvents = 'none';
        updatePlayButton();
        showControls();
    });

    // Update UI when video pauses
    video.addEventListener('pause', function() {
        overlay.style.opacity = '1';
        overlay.style.pointerEvents = 'auto';
        controls.style.opacity = '0';
        controls.style.pointerEvents = 'none';
        updatePlayButton();
    });

    // Show overlay when video ends
    video.addEventListener('ended', function() {
        overlay.style.opacity = '1';
        overlay.style.pointerEvents = 'auto';
        controls.style.opacity = '0';
        controls.style.pointerEvents = 'none';
    });

    // Update progress bar
    video.addEventListener('timeupdate', function() {
        const progress = (video.currentTime / video.duration) * 100;
        progressBar.style.width = progress + '%';
        currentTimeEl.textContent = formatTime(video.currentTime);
    });

    // Set duration
    video.addEventListener('loadedmetadata', function() {
        durationEl.textContent = formatTime(video.duration);
    });

    // Seek functionality
    progressContainer.addEventListener('click', function(e) {
        const rect = progressContainer.getBoundingClientRect();
        const pos = (e.clientX - rect.left) / rect.width;
        video.currentTime = pos * video.duration;
    });

    // Volume control
    volumeBtn.addEventListener('click', function() {
        video.muted = !video.muted;
        if (video.muted) {
            volumeIcon.classList.add('hidden');
            muteIcon.classList.remove('hidden');
        } else {
            volumeIcon.classList.remove('hidden');
            muteIcon.classList.add('hidden');
        }
    });

    volumeSlider.addEventListener('input', function() {
        video.volume = this.value / 100;
        video.muted = false;
        volumeIcon.classList.remove('hidden');
        muteIcon.classList.add('hidden');
    });

    // Fullscreen
    fullscreenBtn.addEventListener('click', function() {
        if (!document.fullscreenElement) {
            container.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });

    // Show controls on mouse move
    container.addEventListener('mousemove', showControls);
    container.addEventListener('mouseleave', hideControls);

    // Keyboard controls
    document.addEventListener('keydown', function(e) {
        if (e.code === 'Space' && e.target === document.body) {
            e.preventDefault();
            togglePlay();
        }
    });

    // Loading state
    video.addEventListener('waiting', function() {
        loadingSpinner.style.opacity = '1';
    });

    video.addEventListener('canplay', function() {
        loadingSpinner.style.opacity = '0';
    });

    // Double-click for fullscreen
    video.addEventListener('dblclick', function() {
        if (!document.fullscreenElement) {
            container.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });
});
</script>