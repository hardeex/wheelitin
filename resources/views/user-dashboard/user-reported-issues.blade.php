@extends('user-dashboard.base')
@section('header', 'Reported Car Issues')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
      @include('user-dashboard-components.car-owner-reported-issues')
    </div>
@endsection
