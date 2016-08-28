@extends('master')

@section('content')

    <div class="container" v-cloak>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h3>Notebooks</h3>
                    <hr>
                    <a href="{{ url('notebooks/create') }}" class="btn btn-success btn-block" v-if="notebooks.length == 0">Create A New Notebook</a>
                    <p>
                        <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">Create A New Notebook</a>
                    </p>
                    @include('pages.modals')
                    <div class="panel panel-success" v-for="notebook in notebooks">
                        <div class="panel-heading">
                            <h3 class="panel-title">@{{ notebook.title }}</h3>
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-success btn-block" @click="fetchNotes(notebook.id)">Fetch Notes</button>
                            <a class="btn btn-warning btn-block" href="{{ url('notes/create') }}/@{{ notebook.id }}">Create A New Note</a>
                            <hr>
                            <p>
                            <form action="{{ url('notebooks') }}/@{{ notebook.id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-block">Delete Notebook</button>
                            </form>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <h3>Notes</h3>
                    <hr>
                    <div class="alert alert-danger" role="alert" v-if="notes.length == 0">Oh Snaps! No notes yet. Why not write one?</div>
                    <div class="list-group">
                        <a href="{{ url('notes') }}/@{{ note.id }}" class="list-group-item" v-for="note in notes">
                            <h4 class="list-group-item-heading">@{{ note.title }}</h4>
                            <span class="label label-success">Created At : @{{ note.created_at }}</span>
                            <span class="label label-warning">Updated At : @{{ note.updated_at }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection