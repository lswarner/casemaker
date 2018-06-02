
<div id="thematic-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="gridSystemModalLabel">Add a thematic area to your Case Study</h2>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <h4>Choose the thematic area(s) which apply to this Case Study.</h4>
          </div>

          <div class="col-sm-12">
            <ul id="thematic-list">

              @foreach($thematic_suggestions as $m)
                <li>
                    <a class="btn btn-urc-account add-thematic" data-id="{{$m->id}}" data-name="{{$m->name}}">
                      <div class="col-sm-11 thematic-name">{{ $m->name }}</div>
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
