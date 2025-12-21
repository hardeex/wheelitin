@extends('specialist-dashboard.base')
@section('header', ' Reports')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
      @include('specialist-dashboard-components.available-reports')
    </div>
@endsection
