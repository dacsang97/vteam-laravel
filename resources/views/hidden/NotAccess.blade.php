@extends('hidden.partials.master')
@section('content')
    <center>
        <img src="{{ asset('hidden-link/img/oops.jpg') }}" alt="" width="300" class="img-responsive">
    </center>
    <h3 class="info-text">
        {{ $message }}
    </h3>
@endsection