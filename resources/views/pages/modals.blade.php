<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Create A New Notebook</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('notebooks') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" name="title" placeholder="Notebook Title" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-block btn-success">Create Notebook</button>
                </form>
            </div>
        </div>
    </div>
</div>
