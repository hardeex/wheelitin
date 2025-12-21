@extends('specialist-dashboard.base')
@section('header', 'My Submitted Quotations')

@section('content')
    <!-- Welcome Section -->
    <div class="mb-8">
   @include('specialist-dashboard-components.quotation')
    </div>
@endsection
