@extends('user-dashboard.base')
@section('header', 'Raise Car Issues')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
      @include('car.report-issue')
    </div>
@endsection
