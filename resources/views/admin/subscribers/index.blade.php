@extends('admin.master')
@section('title', __('keywords.subscribers'))
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-content-center mb-3 ">
                    <h2 class="page-title h5">{{ __('keywords.subscribers') }}</h2>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <x-success-alert></x-success-alert>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th class="text-center" width="80%">{{ __('keywords.email') }}</th>
                                    <th width="15%">{{ __('keywords.actions') }}</th>

                                </tr>
                            </thead>
                            <tbody>
                                @if (count($subscribers) > 0)
                                    @foreach ($subscribers as $key => $subscriber)
                                        <tr class="text-center">
                                            <td>{{ $subscribers->firstItem() + $loop->index }}</td>
                                            <td>{{ $subscriber->email }}</td>
                                            <td class="text-center">
                                                <x-delete-button
                                                    href="{{ route('admin.subscribers.destroy', ['subscriber' => $subscriber]) }}"
                                                    id="{{ $subscriber->id }}"> </x-delete-button>
                                            </td>


                                        </tr>
                                    @endforeach
                                @else
                                    <x-empty-alert></x-empty-alert>
                                @endif


                            </tbody>
                        </table>
                        {{ $subscribers->render('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
