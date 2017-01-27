@extends('hidden.partials.master')
@section('content')
    @if (Auth::guest())
        <p class="text">Bạn chưa đăng nhập vào ứng dụng.</p>
        <center>
            <a href="{{ route('link.redirect') }}" class="btn btn-fill btn-info">
                <i class="fa fa-facebook"></i> Đăng nhập
            </a>
        </center>
        <p class="text">Click vào nút phía trên để đăng nhập.</p>
    @else
        <div class="col-sm-4 col-sm-offset-2">
            <div class="choice" data-toggle="wizard-checkbox">
                <a href="{{ route('link.create') }}">
                    <div class="card card-checkboxes card-hover-effect">
                        <i class="ti-ruler-pencil"></i>
                        <p>Create</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="choice" data-toggle="wizard-checkbox">
                <a href="{{ route('link.edit') }}">
                    <div class="card card-checkboxes card-hover-effect">
                        <i class="ti-eraser"></i>
                        <p>Edit / Update</p>
                    </div>
                </a>
            </div>
        </div>
    @endif
@endsection