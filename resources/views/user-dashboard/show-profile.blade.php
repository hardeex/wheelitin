@extends('user-dashboard.base')
@section('header', 'Manage Profile')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
      @include('user-dashboard-components.manage-profile')
    </div>
@endsection
