@extends('hidden.partials.master')
@section('content')
    <form action="{{route('link.store')}}" method="POST">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="form-group">
                <label for="">Hide link</label>
                <input type="text" class="form-control" name="hide_link">
            </div>
            <div class="form-group">
                <label for="">Post link</label>
                <input type="text" class="form-control" name="post_link">
            </div>
        </div>
        <div class="col-sm-5 col-sm-offset-1">
            <div class="form-group">
                <label for="">Comments lock</label>
                <input type="number" class="form-control" name="comments_lock">
            </div>
        </div>
        <div class="col-sm-5">
            <div class="form-group">
                <label for="">Reactions lock</label>
                <input type="number" class="form-control" name="reactions_lock">
            </div>
        </div>
        {{ csrf_field() }}
        <div class="col-sm-10 col-sm-offset-1">
            <hr>
            <center>
                <div class="btn-group">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <a class="btn btn-primary" href="{{ route('link.index') }}">Cancel</a>
                </div>
            </center>
        </div>
    </form>
@endsection