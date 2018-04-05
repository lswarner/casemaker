
<div id="team-member-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="gridSystemModalLabel">Add a team member</h2>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-sm-12">
            <h4>Type the name or email address of the person you want to add as a new team member for this case study.</h4>
            <ul>
                <li>If this person already has a CaseMaker account, just click on their name and they'll be added as a new team member.</li>
                <li>If the person you want to add doesn't appear in the list, you can invite them to join CaseMaker by typing their full email address and clicking the "Email an Invitation" button.</li>
            </ul>
            <div id="invitation-message"></div>
          </div>

          <div class="col-sm-12">
            <div class="row">
              <form class="filterform form-horizontal">
                <div class="col-md-8">
                    <input type="text" class="filterinput form-control" placeholder="Type a name or email address...">
                </div>
                <div class="col-md-4">
                  <button id="invite-team-member" class="btn btn-block btn-email">Email an Invitation</button>
                </div>
              </form>
            </div>
          </div>

          <div class="col-sm-12">
            <ul id="team-list">

              @foreach($team_suggestions as $u)
                <li>
                    <a id="{{$u->id}}" class="btn btn-urc-account secondary add-user" data-name="{{$u->name}}" data-email="{{$u->email}}">
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
