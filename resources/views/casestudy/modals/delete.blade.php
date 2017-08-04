@section('scripts')
  @include('scripts.delete-modal')
@endsection

<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="gridSystemModalLabel">Permanently Delete Case Study</h2>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <h3 class="text-danger">Are you sure you want to delete "<span id="casestudy-title"></span>"?</h4>
            <p>
              Deleting a case study is a <b>permanent action</b> and <b>cannot be undone</b>. If there is any information that
              you have not saved elsewhere, you might want to consider saving this information before you click the delete button.
            </p>
            <p>&nbsp;</p>
          </div>

          <div class="col-sm-12">

            <form id="form-delete" method="POST" action="#" accept-charset="UTF-8" class="form-horizontal">
              <input name="_method" type="hidden" value="DELETE">
              {{ csrf_field() }}
              <div class="row">

                <div class="col-md-4 col-sm-6">
                  <button type="button" class="btn btn-urc btn-default" data-dismiss="modal">Cancel</button>
                </div>
                <div class="col-md-4 col-md-offset-4 col-sm-6">
                  <input type="submit" id="delete" class="btn btn-urc-danger" value="Delete Case Study"/>
                </div>

              </div>
            </form>

          </div>

        </div>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
