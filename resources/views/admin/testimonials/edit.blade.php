@extends('admin.master')
@section('title', __('keywords.edit_testimonial'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.edit_testimonial') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.testimonials.update', ['testimonial' => $testimonial]) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="name"></x-form-label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('keywords.enter_name') }}" value="{{ $testimonial->name }}">
                                        <x-validation-error field="name"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="position"></x-form-label>
                                        <input type="text" name="position" class="form-control"
                                            placeholder="{{ __('keywords.position') }}" value="{{ $testimonial->position }}">
                                        <x-validation-error field="position"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="image"></x-form-label>

                                        <input type="file" name="image" class="form-control-file"
                                        value="{{ $testimonial->image }}">
                                        <x-validation-error field="image"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <x-form-label field="description"></x-form-label>

                                        <textarea type="text" name="description" class="form-control" placeholder="{{ __('keywords.description') }}">{{ $testimonial->description }}</textarea>
                                        <x-validation-error field="description"></x-validation-error>

                                    </div>
                                    <x-submit></x-submit>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    @endsection
