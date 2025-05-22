@extends('admin.master')
@section('title', __('keywords.edit_company'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.edit_company') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.companies.update', ['company' => $company]) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="image"></x-form-label>

                                        <input type="file" name="image" class="form-control-file"
                                        value="{{ $company->image }}">
                                        <x-validation-error field="image"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                  
                                    <x-submit></x-submit>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>

    @endsection
