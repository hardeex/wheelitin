@extends('components.base')
@section('title', 'Schedule Time With Specialist')


@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-2xl mx-auto px-4">
        <!-- Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold text-blue-600 mb-2">Accept Quotation</h1>
            <p class="text-gray-600">Schedule your appointment by selecting a date and time below.</p>
        </div>
{{-- 
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-800 rounded-lg p-4 mb-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif --}}

        @include('feedback')

        <!-- Form -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <form method="POST" action="{{ route('reports.accept', $reportId) }}">
                @csrf
                
                <input type="hidden" name="specialistId" value="{{ $specialistId }}">

                <!-- Report Info -->
                <div class="mb-6 p-4 bg-blue-50 rounded-lg border border-blue-100">
                    <h3 class="text-sm font-semibold text-blue-800 mb-2">Report Details</h3>
                    <p class="text-sm text-gray-700"><strong>Report ID:</strong> {{ $reportId }}</p>
                    <p class="text-sm text-gray-700"><strong>Specialist:</strong> {{ $specialistId }}</p>
                </div>

              <!-- Date Field -->
<div class="mb-6">
    <label for="date" class="block text-sm font-semibold text-gray-700 mb-2">
        Appointment Date <span class="text-red-500">*</span>
    </label>
    <input 
        type="date" 
        id="date" 
        name="date" 
        value="{{ old('date', date('Y-m-d')) }}" 
        min="{{ date('Y-m-d') }}"
        required
        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 @error('date') border-red-500 @enderror"
    >
    @error('date')
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>


                <!-- Time Field -->
                <div class="mb-8">
                    <label for="time" class="block text-sm font-semibold text-gray-700 mb-2">
                        Appointment Time <span class="text-red-500">*</span>
                    </label>
                    <input 
                        type="time" 
                        id="time" 
                        name="time" 
                        value="{{ old('time') }}"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-150 @error('time') border-red-500 @enderror"
                    >
                    @error('time')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button 
                        type="submit"
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-150 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                    >
                        Accept & Schedule Appointment
                    </button>
                    
                    <a 
                        href="{{ route('index') }}"
                        class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-6 rounded-lg transition duration-150 text-center focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2"
                    >
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        <!-- Information Box -->
        <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
            <div class="flex">
                <svg class="w-5 h-5 text-blue-600 mr-3 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm text-blue-800">
                    <p class="font-semibold mb-1">Important Information</p>
                    <p>Please ensure you select a date and time when you'll be available for the appointment.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection