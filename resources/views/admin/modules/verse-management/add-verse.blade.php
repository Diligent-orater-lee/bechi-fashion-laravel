@extends('layouts.master')

@section('header')
    @include('admin.partials.head')
@endsection


@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <div class="row h-100 align-items-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.verses.add') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="verseName">Verse name</label>
                              <input type="text" class="form-control" id="verseName" aria-describedby="verseName" placeholder="Enter Verse name">
                            </div>
                            <div class="form-group">
                              <label for="verseUrl">Verse handle name (Must be unique)</label>
                              <input type="text" class="form-control" id="verseUrl" aria-describedby="verseUrl" placeholder="Enter Verse name">
                            </div>
                            <div class="form-group">
                              <label for="eightWallURL">8th Wall project URL</label>
                              <input type="text" class="form-control" id="eightWallURL" aria-describedby="eightWallURL" placeholder="*th wall project URL">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
