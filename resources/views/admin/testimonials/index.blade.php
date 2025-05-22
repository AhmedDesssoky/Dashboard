@extends('admin.master')
@section('title', __('keywords.testimonials'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-content-center mb-3 ">
                    <h2 class="page-title h5">{{ __('keywords.testimonials') }}</h2>

                    <x-action-button href="{{ route('admin.testimonials.create') }}" type="create"></x-action-button>

                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <x-success-alert></x-success-alert>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>{{ __('keywords.name') }}</th>
                                    <th>{{ __('keywords.position') }}</th>
                                    <th>{{ __('keywords.image') }}</th>
                                    <th>{{ __('keywords.actions') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($testimonials) > 0)
                                    @foreach ($testimonials as $key => $testimonial)
                                        <tr>
                                            <td>{{ $testimonials->firstItem() + $loop->index }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->position }}</td>
                                            <td>
                                                <img width="50px" src="{{ asset("storage/testimonials/$testimonial->image") }}"
                                                    alt="">

                                            </td>

                                            <td>

                                                <x-action-button
                                                    href="{{ route('admin.testimonials.edit', ['testimonial' => $testimonial]) }}"
                                                    type="edit"></x-action-button>


                                                <x-action-button
                                                    href="{{ route('admin.testimonials.show', ['testimonial' => $testimonial]) }}"
                                                    type="show"></x-action-button>

                                                <x-delete-button
                                                    href="{{ route('admin.testimonials.destroy', ['testimonial' => $testimonial]) }}"
                                                    id="{{ $testimonial->id }}"> </x-delete-button>
                                            </td>


                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif


                            </tbody>
                        </table>
                        {{ $testimonials->render('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
