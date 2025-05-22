@extends('front.master')
@section('title', 'Services')
@section('service-active', 'active')
@section('hero')
    <x-hero-section title="Services" subtitle="Service"></x-hero-section>

@endsection

@section('content')

    <x-front-services-component></x-front-services-component>

    <!-- Testimonial Start -->
    <x-front-testimonials-component></x-front-testimonials-component>
    <!-- Testimonial End -->



@endsection
