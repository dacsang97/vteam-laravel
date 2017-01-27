@extends('hidden.partials.master')
@section('content')
    <div class="col-sm-12">
        <table class="table table-hover table-striped ">
            <thead>
                <tr>
                    <th class="col-sm-1">ID</th>
                    <th >Hide link</th>
                    <th >Post link</th>
                    <th >Comments lock</th>
                    <th >Reactions lock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($links as $link)
                <tr>
                    <td class="col-sm-1">{{ $link->id }}</td>
                    <td><input type="text" value="{{ $link->hide_link }}"></td>
                    <td><input type="text" value="{{ $link->post_link }}"></td>
                    <td>{{ $link->comments_lock }}</td>
                    <td>{{ $link->reactions_lock }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection