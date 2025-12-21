@extends('user-dashboard.base')
@section('header', 'Car Report Details')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
     @include('car.report-details')
    </div>
@endsection
