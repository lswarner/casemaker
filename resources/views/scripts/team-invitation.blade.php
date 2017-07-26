<script>

    $("#invite-team-member").click( function(event){
      event.preventDefault();

      var email= $(".filterinput").val();
      //console.log('sending '+email+' to {{ $url}}');

      $.ajax({
        url: "{{ $url }}",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: "POST",
        data: { "email":email,'user_id':"{{ Auth::user()->id }}" },
        success: function(data) {
          var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
          //console.log(jqObj);

          // Now show them we saved and when we did
          $('#invitation-message').html(email+' has been invited to join your case study').addClass('text-success');
          $('#invitation-message').removeClass('text-danger');

          addInvitedMemberToBar(email);
        },
        error: function(data) {
          var jqObj= jQuery(data);
          //console.log(jqObj[0].responseJSON);

          if(jqObj[0].status == 400){
            message= "This email has already been invited to this case study.";
          }
          else if(jqObj[0].status == 401){
            message= "You don't have permission to invite anyone to join this case study.";
          }
          else if(jqObj[0].status == 409){
            message= "This email belongs to a registered user.";
          }
          else if(jqObj[0].status == 422){
            message= "A valid email address is required to send an invitation.";
          }
          else {
            message= jqObj[0].responseJSON;
          }

          $('#invitation-message').html('Error: '+message);
          $('#invitation-message').addClass('text-danger').removeClass('text-success');
        }
      });
    });

    function addInvitedMemberToBar(email){
      var newli = $("<li>").html(email+' (invited)').addClass('text-muted');
      $(".team-member-list").append(newli);
    }

</script>
