@extends('layouts.master')

@section('header')
    <script>alert('This is supposed to be logo ar')</script>
    @include('customer.common-views.heads.ar-views-head')
@endsection

@section('content')
    @include('customer.common-views.other-partials.ar-view-buttons')
    <iframe src="https://keraverse.diligentsmart.com" class="default-iframe" id="ar-view-frame" allow="camera;gyroscope;accelerometer;magnetometer;xr-spatial-tracking;microphone;"></iframe>
@endsection
