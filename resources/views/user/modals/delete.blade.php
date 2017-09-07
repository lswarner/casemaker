
<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="gridSystemModalLabel">Permanently Delete User Account</h2>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <h3 class="text-danger">Are you sure you want to delete "<span id="casestudy-title">{{$user->name ?: "this account"}}</span>"?</h4>
            <p>
              Deleting a user account is a <b>permanent action</b> and <b>cannot be undone</b>. The user will be removed from any case studies
              that she or he was connected to, but the case studies will not be deleted.
            </p>
            <p>&nbsp;</p>
          </div>

          <div class="col-sm-12">

            {!! Form::open(['action'=>['UserController@destroy', $user], 'method' => 'delete', 'class'=>'form-horizontal']) !!}
              <div class="row">

                <div class="col-md-4 col-sm-4">
                  <button type="button" class="btn btn-urc btn-default" data-dismiss="modal">Cancel</button>
                </div>
                <div class="col-md-6 col-md-offset-2 col-sm-8">
                  <input type="submit" id="delete" class="btn btn-urc-danger" value="Delete User Account"/>
                </div>

              </div>
            {!! Form::close() !!}

          </div>

        </div>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
