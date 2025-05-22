@extends('admin.master')
@section('title', __('keywords.testimonial'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.show_testimonial') }}</h2>
                <div class="card shadow">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.name') }}</label>
                                    <p class="form-control">{{ $testimonial->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.position') }}</label>
                                    <p class="form-control">{{ $testimonial->position }}</p>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>{{ __('keywords.image') }}</label>
                                    <div>
                                        <img width="30px" src="{{ asset("storage/testimonials/$testimonial->image") }}"
                                            alt="">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.description') }}</label>
                                    <p class="form-control">{{ $testimonial->description }}</p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    @endsection
