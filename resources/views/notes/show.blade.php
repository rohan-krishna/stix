@extends('master')

@section('content')

    <div class="container">
        <p style="padding: 1em;">
            <a href="{{ url('dashboard') }}">&larr; Dashboard</a>
        </p>
        <h3>{{ $note->title }}</h3>
        <span class="label label-success">Created At : {{ $note->created_at }}</span>
        <span class="label label-warning">Last Updated At : {{ $note->updated_at }}</span>
        <hr>
        <form action="{{ url('notes') }}/{{ $note->id }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <textarea name="body" id="tiny-body" required>{{ decrypt($note->body) }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info">Update Note</button>
            </div>
        </form>
    </div>

@endsection