@extends('layouts.master')

@section('header')
    @include('admin.partials.head')

    <script>
        $(document).ready(function () {
            $('#verse-management-card').click(function () {
                window.location.href = "{{ route('admin.verses.managment') }}";
            });
        });
    </script>
@endsection


@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="home-action-tool-buttons" class="row mt-5">
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Sync shopify products
                            </div>
                            <div class="card-body">
                                <div class="hoverable-gif-view">
                                    <img class="static" src="{{ asset('assets/images/animations/server_sync.jpg') }}" class="card-img-top" alt="Sync products from shopify">
                                    <img class="moving" src="{{ asset('assets/images/animations/server_sync.gif') }}" class="card-img-top" alt="Sync products from shopify">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div id="verse-management-card" class="card" style="width: 18rem;">
                            <div class="card-header">
                                Add new verse
                            </div>
                            <div class="card-body">
                                <div class="hoverable-gif-view">
                                    <img class="position-absolute" src="{{ asset('assets/images/icons/add-button.png') }}" class="card-img-top" alt="Sync products from shopify">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header">
                                Manage orders
                            </div>
                            <div class="card-body">
                                <div class="hoverable-gif-view">
                                    <img class="position-absolute" src="{{ asset('assets/images/icons/management_icon.jpg') }}" class="card-img-top" alt="Sync products from shopify">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
