@extends('admin.master')
@section('title', __('keywords.company'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.show_company') }}</h2>
                <div class="card shadow">
                    <div class="card-body">

                        <div class="row">


                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>{{ __('keywords.image') }}</label>
                                    <div>
                                        <img width="250px" src="{{ asset("storage/companies/$company->image") }}"
                                            alt="">

                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>

    @endsection
