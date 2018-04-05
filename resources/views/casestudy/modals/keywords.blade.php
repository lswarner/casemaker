
<div id="keywords-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="gridSystemModalLabel">Add a keyword to your Case Study</h2>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <h4>Choose the keyword(s) which apply to this Case Study.</h4>
          </div>

          <div class="col-sm-12">
            <ul id="keyword-list">

              @foreach($keyword_suggestions as $k)
                <li>
                    <a class="btn btn-urc-account add-keyword" data-id="{{$k->id}}" data-name="{{$k->keyword}}">
                      <div class="col-sm-11 keyword-name">{{ $k->keyword }}</div>
                      <div class="col-sm-1"><i class="fa fa-plus-circle pull-right" aria-hidden="true"></i></div>
                    </a>
                </li>
              @endforeach

            </ul>
          </div>


        </div>

      </div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
