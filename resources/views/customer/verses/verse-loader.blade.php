@extends('layouts.master')

@section('header')
    @include('customer.common-views.heads.ar-views-head')
@endsection

@section('content')
    @include('customer.common-views.other-partials.ar-view-buttons')
    <iframe src="{{ $verseURL }}" class="default-iframe" id="my-iframe" allow="camera;gyroscope;accelerometer;magnetometer;xr-spatial-tracking;microphone;"></iframe>
@endsection
