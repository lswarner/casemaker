
<div id="team-member-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Add Team Member</h4>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <h2 id="header">Add a team member</h2>
          </div>

          <div class="col-sm-12">
            <form class="filterform form-inline" action="#">
                <div class="form-group">
                  <input type="text" class="filterinput form-control">
                </div>
                <a class="btn" href="#">Email Invitation</a>
            </form>
          </div>

          <div class="col-sm-12">
            <ul id="team-list">

              @foreach($team_suggestions as $u)
                <li>
                    <a id="{{$u->id}}" class="btn btn-urc-account sky add-user" data-name="{{$u->name}}" data-email="{{$u->email}}">
                      <div class="col-sm-11 account-name">{{ $u->name }}</div>
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
