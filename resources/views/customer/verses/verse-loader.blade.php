@extends('layouts.master')

@section('header')
    @include('customer.common-views.heads.ar-views-head')
@endsection

@section('content')
    @include('customer.common-views.other-partials.ar-view-buttons')
    @include('customer.common-views.other-partials.bechi-splash-screen')
    <iframe src="{{ $verseURL }}" class="default-iframe" id="ar-view-frame" allow="camera;gyroscope;accelerometer;magnetometer;xr-spatial-tracking;microphone;"></iframe>
@endsection
