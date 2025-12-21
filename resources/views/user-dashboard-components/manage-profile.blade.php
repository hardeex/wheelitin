@include('feedback')
<div class="min-h-screen bg-gray-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Profile</h1>
            <p class="mt-2 text-sm text-gray-600">Manage your personal information and security settings</p>
        </div>

        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-lg flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex flex-col items-center">
                        <div class="relative group">
                            @if(!empty($user['profile_picture']))
                                <img id="profileImage" src="{{ $user['profile_picture'] }}" alt="Profile Picture" class="w-24 h-24 rounded-full object-cover mb-4">
                            @else
                                <div id="profileInitials" class="w-24 h-24 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white text-3xl font-bold mb-4">
                                    {{ strtoupper(substr($user['first_name'] ?? 'U', 0, 1)) }}{{ strtoupper(substr($user['last_name'] ?? 'U', 0, 1)) }}
                                </div>
                            @endif
                            <button type="button" id="changePhotoBtn" class="absolute bottom-4 right-0 w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-lg opacity-0 group-hover:opacity-100">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900">{{ $user['first_name'] ?? '' }} {{ $user['last_name'] ?? '' }}</h2>
                        <p class="text-sm text-gray-500 mt-1">{{ ucfirst($user['user_type'] ?? 'User') }}</p>
                        
                        <!-- Verification Badge -->
                        @if($user['isVerified'] ?? false)
                            <span class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Verified Account
                            </span>
                        @else
                            <span class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                Not Verified
                            </span>
                        @endif
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <dl class="space-y-3">
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 break-all">{{ $user['email'] ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase">Phone</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user['phone'] ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase">Role</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user['user_type'] ?? 'N/A' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 uppercase">User ID</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $user['id'] ?? 'N/A' }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Profile Information Form -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Profile Information</h3>
                            <p class="text-sm text-gray-500 mt-1">Update your personal details</p>
                        </div>
                        <button id="editProfileBtn" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit Profile
                        </button>
                    </div>

                    <form id="profileForm" action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Hidden input for profile picture -->
                        <input type="hidden" name="profile_picture" id="profilePictureData">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user['first_name'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors">
                                @error('first_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user['last_name'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors">
                                @error('last_name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                <input type="email" name="email" id="email" value="{{ old('email', $user['email'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors">
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" id="phone" value="{{ old('phone', $user['phone'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors">
                                @error('phone')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Address -->
                            <div class="md:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <textarea name="address" id="address" rows="3" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors">{{ old('address', $user['address'] ?? '') }}</textarea>
                                @error('address')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Post Codes -->
                            <div class="md:col-span-2">
                                <label for="postCodes" class="block text-sm font-medium text-gray-700 mb-2">Post Codes</label>
                                <input type="text" name="postCodes" id="postCodes" value="{{ old('postCodes', isset($user['postCodes']) ? implode(', ', $user['postCodes']) : '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., SW1, SW2, SW3">
                                <p class="mt-1 text-xs text-gray-500">Separate multiple post codes with commas</p>
                                @error('postCodes')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        @if(($user['user_type'] ?? '') === 'specialist')
                        <!-- Specialist Profile Section -->
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <h4 class="text-md font-semibold text-gray-900 mb-4">Specialist Information</h4>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Profession -->
                                <div>
                                    <label for="profession" class="block text-sm font-medium text-gray-700 mb-2">Profession</label>
                                    <input type="text" name="profession" id="profession" value="{{ old('profession', $user['profession'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., Electrician">
                                    @error('profession')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Years of Experience -->
                                <div>
                                    <label for="yearsOfExperience" class="block text-sm font-medium text-gray-700 mb-2">Years of Experience</label>
                                    <input type="number" name="yearsOfExperience" id="yearsOfExperience" value="{{ old('yearsOfExperience', $user['yearsOfExperience'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., 5" min="0">
                                    @error('yearsOfExperience')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Services -->
                                <div class="md:col-span-2">
                                    <label for="services" class="block text-sm font-medium text-gray-700 mb-2">Services Offered</label>
                                    <input type="text" name="services" id="services" value="{{ old('services', isset($user['services']) ? implode(', ', $user['services']) : '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., Wiring, Repairs, Installation">
                                    <p class="mt-1 text-xs text-gray-500">Separate multiple services with commas</p>
                                    @error('services')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Service Areas -->
                                <div class="md:col-span-2">
                                    <label for="serviceAreas" class="block text-sm font-medium text-gray-700 mb-2">Service Areas</label>
                                    <input type="text" name="serviceAreas" id="serviceAreas" value="{{ old('serviceAreas', isset($user['serviceAreas']) ? implode(', ', $user['serviceAreas']) : '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., London, Surrey, Kent">
                                    <p class="mt-1 text-xs text-gray-500">Separate multiple areas with commas</p>
                                    @error('serviceAreas')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- License Number -->
                                <div>
                                    <label for="licenseNumber" class="block text-sm font-medium text-gray-700 mb-2">License Number</label>
                                    <input type="text" name="licenseNumber" id="licenseNumber" value="{{ old('licenseNumber', $user['licenseNumber'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors">
                                    @error('licenseNumber')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- License Document -->
                                <div>
                                    <label for="licenseDocument" class="block text-sm font-medium text-gray-700 mb-2">License Document</label>
                                    <input type="text" name="licenseDocument" id="licenseDocument" value="{{ old('licenseDocument', $user['licenseDocument'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="Document URL or ID">
                                    @error('licenseDocument')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Hourly Rate -->
                                <div>
                                    <label for="hourlyRate" class="block text-sm font-medium text-gray-700 mb-2">Hourly Rate (£)</label>
                                    <input type="number" name="hourlyRate" id="hourlyRate" value="{{ old('hourlyRate', $user['hourlyRate'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., 50" min="0" step="0.01">
                                    @error('hourlyRate')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Availability -->
                                <div>
                                    <label for="availability" class="block text-sm font-medium text-gray-700 mb-2">Availability</label>
                                    <input type="text" name="availability" id="availability" value="{{ old('availability', $user['availability'] ?? '') }}" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="e.g., Weekdays, Weekends">
                                    @error('availability')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Bio -->
                                <div class="md:col-span-2">
                                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-2">Professional Bio</label>
                                    <textarea name="bio" id="bio" rows="4" disabled class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent disabled:bg-gray-50 disabled:text-gray-500 transition-colors" placeholder="Tell us about your experience and expertise...">{{ old('bio', $user['bio'] ?? '') }}</textarea>
                                    @error('bio')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Form Actions -->
                        <div id="formActions" class="hidden mt-6 flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                            <button type="button" id="cancelBtn" class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Cancel
                            </button>
                            <button type="submit" class="px-4 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Change Password Section -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900">Change Password</h3>
                        <p class="text-sm text-gray-500 mt-1">Update your password to keep your account secure</p>
                    </div>

                    <form action="{{ route('change.password') }}" method="POST">
                        @csrf

                        <div class="space-y-5">
                            <!-- Current Password -->
                            <div>
                                <label for="currentPassword" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                                <div class="relative">
                                    <input type="password" name="currentPassword" id="currentPassword" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10 transition-colors" placeholder="Enter current password">
                                    <button type="button" onclick="togglePassword('currentPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('currentPassword')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- New Password -->
                            <div>
                                <label for="newPassword" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                                <div class="relative">
                                    <input type="password" name="newPassword" id="newPassword" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10 transition-colors" placeholder="Enter new password">
                                    <button type="button" onclick="togglePassword('newPassword')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Must be at least 8 characters long</p>
                                @error('newPassword')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Confirm New Password -->
                            <div>
                                <label for="newPassword_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                                <div class="relative">
                                    <input type="password" name="newPassword_confirmation" id="newPassword_confirmation" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent pr-10 transition-colors" placeholder="Confirm new password">
                                    <button type="button" onclick="togglePassword('newPassword_confirmation')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </button>
                                </div>
                                @error('newPassword_confirmation')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-6 pt-6 border-t border-gray-200">
                            <button type="submit" class="w-full md:w-auto px-6 py-2 border border-transparent rounded-lg text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Photo Upload Modal -->
<div id="photoModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-lg bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Profile Picture</h3>
            
            <!-- Camera Preview -->
            <div id="cameraSection" class="hidden mb-4">
                <video id="cameraStream" class="w-full rounded-lg mb-3" autoplay playsinline></video>
                <canvas id="photoCanvas" class="hidden"></canvas>
                <div class="flex gap-2">
                    <button type="button" id="captureBtn" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        Capture Photo
                    </button>
                    <button type="button" id="stopCameraBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Stop Camera
                    </button>
                </div>
            </div>

            <!-- Photo Preview -->
            <div id="previewSection" class="hidden mb-4">
                <img id="photoPreview" class="w-full rounded-lg mb-3" alt="Photo preview">
                <div class="flex gap-2">
                    <button type="button" id="usePhotoBtn" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors">
                        Use This Photo
                    </button>
                    <button type="button" id="retakeBtn" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                        Retake
                    </button>
                </div>
            </div>

            <!-- Options -->
            <div id="optionsSection" class="space-y-3">
                <button type="button" id="useCameraBtn" class="w-full px-4 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                    Take Photo with Camera
                </button>
                
                <button type="button" id="uploadFileBtn" class="w-full px-4 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors flex items-center justify-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    Upload from Device
                </button>
                <input type="file" id="fileInput" accept="image/*" class="hidden">
            </div>

            <!-- Close Button -->
            <button type="button" id="closeModalBtn" class="mt-4 w-full px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors">
                Cancel
            </button>
        </div>
    </div>
</div>

<script>
    // Toggle password visibility
    function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
    }

    // Photo Modal Elements
    const photoModal = document.getElementById('photoModal');
    const changePhotoBtn = document.getElementById('changePhotoBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const useCameraBtn = document.getElementById('useCameraBtn');
    const uploadFileBtn = document.getElementById('uploadFileBtn');
    const fileInput = document.getElementById('fileInput');
    const cameraSection = document.getElementById('cameraSection');
    const previewSection = document.getElementById('previewSection');
    const optionsSection = document.getElementById('optionsSection');
    const cameraStream = document.getElementById('cameraStream');
    const photoCanvas = document.getElementById('photoCanvas');
    const captureBtn = document.getElementById('captureBtn');
    const stopCameraBtn = document.getElementById('stopCameraBtn');
    const photoPreview = document.getElementById('photoPreview');
    const usePhotoBtn = document.getElementById('usePhotoBtn');
    const retakeBtn = document.getElementById('retakeBtn');
    const profilePictureData = document.getElementById('profilePictureData');
    const profileImage = document.getElementById('profileImage');
    const profileInitials = document.getElementById('profileInitials');

    let currentStream = null;
    let capturedPhoto = null;

    // Open modal
    changePhotoBtn.addEventListener('click', function() {
        photoModal.classList.remove('hidden');
        resetModal();
    });

    // Close modal
    closeModalBtn.addEventListener('click', function() {
        photoModal.classList.add('hidden');
        stopCamera();
        resetModal();
    });

    // Close modal when clicking outside
    photoModal.addEventListener('click', function(e) {
        if (e.target === photoModal) {
            photoModal.classList.add('hidden');
            stopCamera();
            resetModal();
        }
    });

    // Reset modal to initial state
    function resetModal() {
        optionsSection.classList.remove('hidden');
        cameraSection.classList.add('hidden');
        previewSection.classList.add('hidden');
        capturedPhoto = null;
    }

    // Use Camera
    useCameraBtn.addEventListener('click', async function() {
        try {
            currentStream = await navigator.mediaDevices.getUserMedia({ 
                video: { facingMode: 'user' },
                audio: false 
            });
            cameraStream.srcObject = currentStream;
            optionsSection.classList.add('hidden');
            cameraSection.classList.remove('hidden');
        } catch (error) {
            alert('Unable to access camera. Please check your permissions or use file upload instead.');
            console.error('Camera error:', error);
        }
    });

    // Capture Photo
    captureBtn.addEventListener('click', function() {
        const context = photoCanvas.getContext('2d');
        photoCanvas.width = cameraStream.videoWidth;
        photoCanvas.height = cameraStream.videoHeight;
        context.drawImage(cameraStream, 0, 0);
        
        capturedPhoto = photoCanvas.toDataURL('image/jpeg', 0.8);
        photoPreview.src = capturedPhoto;
        
        stopCamera();
        cameraSection.classList.add('hidden');
        previewSection.classList.remove('hidden');
    });

    // Stop Camera
    stopCameraBtn.addEventListener('click', function() {
        stopCamera();
        resetModal();
    });

    function stopCamera() {
        if (currentStream) {
            currentStream.getTracks().forEach(track => track.stop());
            currentStream = null;
        }
    }

    // Retake Photo
    retakeBtn.addEventListener('click', function() {
        previewSection.classList.add('hidden');
        optionsSection.classList.remove('hidden');
        capturedPhoto = null;
    });

    // Use Photo
    usePhotoBtn.addEventListener('click', function() {
        if (capturedPhoto) {
            updateProfilePicture(capturedPhoto);
            photoModal.classList.add('hidden');
            resetModal();
        }
    });

    // Upload File
    uploadFileBtn.addEventListener('click', function() {
        fileInput.click();
    });

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            // Validate file type
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file');
                return;
            }

            // Validate file size (max 5MB)
            if (file.size > 5 * 1024 * 1024) {
                alert('Image size should not exceed 5MB');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(event) {
                updateProfilePicture(event.target.result);
                photoModal.classList.add('hidden');
                resetModal();
                fileInput.value = '';
            };
            reader.readAsDataURL(file);
        }
    });

    // Update Profile Picture
    function updateProfilePicture(base64Image) {
        // Store base64 data for form submission
        profilePictureData.value = base64Image;

        // Update preview
        if (profileImage) {
            profileImage.src = base64Image;
        } else if (profileInitials) {
            // Replace initials with image
            const imgElement = document.createElement('img');
            imgElement.id = 'profileImage';
            imgElement.src = base64Image;
            imgElement.alt = 'Profile Picture';
            imgElement.className = 'w-24 h-24 rounded-full object-cover mb-4';
            profileInitials.replaceWith(imgElement);
        }
    }

    // Edit profile functionality
    const editBtn = document.getElementById('editProfileBtn');
    const cancelBtn = document.getElementById('cancelBtn');
    const formActions = document.getElementById('formActions');
    const profileForm = document.getElementById('profileForm');
    const inputs = profileForm.querySelectorAll('input:not([type="file"]):not([type="hidden"]), textarea');

    editBtn.addEventListener('click', function() {
        inputs.forEach(input => {
            if (input.name !== 'email') { // Keep email read-only
                input.removeAttribute('disabled');
                input.classList.remove('disabled:bg-gray-50', 'disabled:text-gray-500');
            }
        });
        formActions.classList.remove('hidden');
        editBtn.classList.add('hidden');
    });

    cancelBtn.addEventListener('click', function() {
        inputs.forEach(input => {
            input.setAttribute('disabled', 'disabled');
        });
        formActions.classList.add('hidden');
        editBtn.classList.remove('hidden');
        profileForm.reset();
        
        // Reset profile picture preview
        profilePictureData.value = '';
        
        // Restore original image or initials
        const currentImage = document.getElementById('profileImage');
        if (currentImage && '{{ $user["profile_picture"] ?? "" }}') {
            currentImage.src = '{{ $user["profile_picture"] ?? "" }}';
        }
    });
</script>