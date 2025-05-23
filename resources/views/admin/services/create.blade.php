@extends('admin.master')
@section('title', __('keywords.add_new_service'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.add_new_service') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.services.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="title"></x-form-label>
                                        <input type="text" name="title" class="form-control"
                                            placeholder="{{ __('keywords.enter_title') }}">
                                     <x-validation-error field="title"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="icon"></x-form-label>

                                        <input type="text" name="icon" class="form-control"
                                            placeholder="{{ __('keywords.icon') }}">
                                            <x-validation-error field="icon"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <x-form-label field="description"></x-form-label>

                                        <textarea type="text" name="description" class="form-control" placeholder="{{ __('keywords.description') }}"></textarea>
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
