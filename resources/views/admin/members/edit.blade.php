@extends('admin.master')
@section('title', __('keywords.edit_member'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title h5">{{ __('keywords.edit_member') }}</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <form action="{{ route('admin.members.update', ['member' => $member]) }}"
                            method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="name"></x-form-label>
                                        <input type="text" name="name" class="form-control"
                                            placeholder="{{ __('keywords.name') }}" value="{{ $member->name }}">
                                        <x-validation-error field="name"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <x-form-label field="position"></x-form-label>
                                        <input type="text" name="position" class="form-control"
                                            placeholder="{{ __('keywords.position') }}" value="{{ $member->position }}">
                                        <x-validation-error field="position"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <x-form-label field="image"></x-form-label>

                                        <input type="file" name="image" class="form-control-file"
                                        value="{{ $member->image }}">
                                        <x-validation-error field="image"></x-validation-error>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <x-form-label field="facebook"></x-form-label>

                                        <input type="text" name="facebook" class="form-control"  value="{{ $member->facebook }}" placeholder="{{ __('keywords.facebook') }}">
                                        <x-validation-error field="facebook"></x-validation-error>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <x-form-label field="twitter"></x-form-label>

                                        <input type="text" name="twitter"  value="{{ $member->twitter }}" class="form-control" placeholder="{{ __('keywords.twitter') }}">
                                        <x-validation-error field="twitter"></x-validation-error>

                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <x-form-label field="linkedin"></x-form-label>

                                        <input type="text" name="linkedin"  value="{{ $member->linkedin }}" class="form-control" placeholder="{{ __('keywords.linkedin') }}">
                                        <x-validation-error field="linkedin"></x-validation-error>

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
