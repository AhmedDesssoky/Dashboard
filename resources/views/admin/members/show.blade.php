@extends('admin.master')
@section('title', __('keywords.member'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.show_member') }}</h2>
                <div class="card shadow">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.name') }}</label>
                                    <p class="form-control">{{ $member->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.position') }}</label>
                                    <p class="form-control">{{ $member->position }}</p>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>{{ __('keywords.image') }}</label>
                                    <div>
                                        <img width="30px" src="{{ asset("storage/members/$member->image") }}"
                                            alt="">

                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.facebook') }}</label>
                                    <p class="form-control">{{ $member->facebook }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.twitter') }}</label>
                                    <p class="form-control">{{ $member->twitter }}</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label>{{ __('keywords.linkedin') }}</label>
                                    <p class="form-control">{{ $member->linkedin }}</p>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    @endsection
