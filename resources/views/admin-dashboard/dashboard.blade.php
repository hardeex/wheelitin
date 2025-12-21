@extends('admin-dashboard.base')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
       <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-2">
    Welcome back, {{ $user['first_name'] ?? '' }} {{ $user['last_name'] ?? '' }}! 👋
</h2>

        <p class="text-gray-600 mb-4">Here's what's happening with your account today.</p>




        <!-- Stats Grid -->
        @include('admin-dashboard-components.stats')

        {{-- @include('wallet-components.create-customer-account') --}}



        <!-- Two Column Layout -->
        @include('admin-dashboard-components.recent-activity')

        <!-- Top Performers & Upcoming Tasks -->
        @include('admin-dashboard-components.top-referral')
    </div>
@endsection
