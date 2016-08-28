@extends('master')

@section('content')

    <div class="container">
        <p style="padding: 1em;">
            <a href="{{ url('dashboard') }}">
                &larr; Dashboard
            </a>
        </p>
        <h3>Write A New Note</h3>
        <hr>
        <form action="{{ url('notes') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Note Title" required="required">
            </div>
            <input type="hidden" value="{{ $id }}" name="nbid">
            <div class="form-group">
                <textarea name="body" id="tiny-body"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Save Note</button>
            </div>
        </form>
    </div>

@endsection