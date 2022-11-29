@extends('backend.admin.layouts.app')

@section('styles')
    <!-- searchable selector -->
    <link href="{{ asset('backend/vendor/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
@endsection

@section('content')

    <div class="row justify-content-between">
        <div class="col-9">
            <h1 class="h3 mb-2 text-gray-800">{{ __('backend.subscribers_list.subscribers_list') }}</h1>
            <p class="mb-4">{{ __('backend.subscribers_list.subscribers_list_desc') }}</p>
        </div>
        <div class="col-3 text-right">
           
        </div>
    </div>

    <!-- Content Row -->
    <div class="row bg-white pt-4 pl-3 pr-3 pb-4">
        <div class="col-12">

            <div class="row">
                <div class="col-12 col-md-10">

                    <div class="row pb-2">
                        <div class="col-12">
                            
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr class="bg-info text-white">
                                        <th>{{ __('backend.subscribers_list.email') }}</th>
                                        <th>{{ __('backend.subscribers_list.active') }}</th>
                                        <!--<th>{{ __('backend.subscribers_list.action') }}</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($subscribers_list as $subscribers_key => $subscribers)
                                        <tr>
                                            <td>{{ $subscribers->email }}</td>
                                            <td><!--<{{ $subscribers->is_active }}-->
                                            @if($subscribers->is_active === 1)
                                                <span class="text-success">Active</span>
                                            @else 
                                             <span class="text-danger"> Non Active</span>
                                              
                                            @endif
                                            </td>
                                           
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            
                        </div>
                    </div>

                </div>

               

            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- searchable selector -->
    <script src="{{ asset('backend/vendor/bootstrap-select/bootstrap-select.min.js') }}"></script>
    @include('backend.admin.partials.bootstrap-select-locale')

    <script>
        $(document).ready(function() {
            // "use strict";
        });
    </script>
@endsection
