@extends('admin.master')
@section('title', __('keywords.companies'))
@section('content')
    <div class="container-fluid ">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-content-center mb-3 ">
                    <h2 class="page-title h5">{{ __('keywords.companies') }}</h2>

                    <x-action-button href="{{ route('admin.companies.create') }}" type="create"></x-action-button>

                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <x-success-alert></x-success-alert>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th class="text-center" width="75%">{{ __('keywords.image') }}</th>
                                    <th width="20%">{{ __('keywords.actions') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($companies) > 0)
                                    @foreach ($companies as $key => $company)
                                        <tr>
                                            <td>{{ $companies->firstItem() + $loop->index }}</td>

                                            <td class="text-center">
                                                <img width="50px" src="{{ asset("storage/companies/$company->image") }}"
                                                    alt="">

                                            </td>

                                            <td>

                                                <x-action-button
                                                    href="{{ route('admin.companies.edit', ['company' => $company]) }}"
                                                    type="edit"></x-action-button>


                                                <x-action-button
                                                    href="{{ route('admin.companies.show', ['company' => $company]) }}"
                                                    type="show"></x-action-button>

                                                <x-delete-button
                                                    href="{{ route('admin.companies.destroy', ['company' => $company]) }}"
                                                    id="{{ $company->id }}"> </x-delete-button>
                                            </td>


                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif


                            </tbody>
                        </table>
                        {{ $companies->render('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
