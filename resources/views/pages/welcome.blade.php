@extends('components.base')
@section('title', 'Wheelitin')

@section('content')

@include('components.waitlist')
{{-- <x-hero /> --}}
{{-- <x-mechanic-section /> --}}
<x-how-it-works />
<x-faq />
<x-cta-section />
{{-- <x-testimonial /> --}}
<x-footer />


@endsection