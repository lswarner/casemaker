<script>
  (function ($) {
  // custom css expression for a case-insensitive contains()
  jQuery.expr[':'].Contains = function(a,i,m){
      return ( (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0) || /* compare name... */
         /* (( a.children(".account-name") || "").toUpperCase().indexOf(m[3].toUpperCase())>=0) || */
       ( (a.getAttribute('data-email') || "").toUpperCase().indexOf(m[3].toUpperCase())>=0 );        /* ... or email address */
  };


  function listFilter(header, list) { // header is any element, list is an unordered list
    // create and add the filter form to the header
    /*
    var form = $("<form>").attr({"class":"filterform","action":"#"}),
        input = $("<input>").attr({"class":"filterinput","type":"text"});
    $(form).append(input).appendTo(header);
    */

    $(".filterinput")
      .change( function () {
        var filter = $(this).val();
        if(filter) {
          // this finds all links in a list that contain the input,
          // and hide the ones not containing the input while showing the ones that do
          $(list).find("a:not(:Contains(" + filter + "))").parent().hide();
          $(list).find("a:Contains(" + filter + ")").parent().show();
        } else {
          $(list).find("li").show();
        }
        return false;
      })
    .keyup( function () {
        // fire the above change event after every letter
        $(this).change();
    });
  }

  //$(".{{$add_action}}").click( function(event) {
  $("#team-list").on("click", "li > .{{$add_action}}", function(event) {
    event.preventDefault();

    var obj_id= $(this).attr('id');
    //var obj_name= $(this).children(".account-name").html();
    var obj_name= $(this).attr('data-name');
    var obj_email= $(this).attr('data-email');
    //console.log(obj_name);

    //hide the user to show that they are being added to the team
    $(this).slideUp();

    $.ajax({
      url: "{{ $add_url }}",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: "PATCH",
      data: { "{{$add_action}}_id":obj_id, 'user_id':"{{ Auth::user()->id }}" },
      success: function(data) {
        var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
        //console.log(jqObj);

        // Now show them we saved and when we did
        $('#{{$add_action}}-message').html('team member added');
        $('#{{$add_action}}-message').removeClass('text-danger');

        addMemberToBar(obj_id, obj_name, obj_email);
      },
      error: function(data) {
        var jqObj= jQuery(data);

        //show the oUser, since there was an error
        $(this).slideDown();

        $('#{{$add_action}}-message').html('Error.');
        $('#{{$add_action}}-message').addClass('text-danger');
      }
    });
  });



  $(".team-member-list").on("click", ".{{$remove_action}}", function(event) {
    event.preventDefault();

    var obj_id= $(this).attr('data-id');
    //var obj_name= $(this).parent("li").html();
    var obj_name= $(this).attr('data-name');
    var obj_email= $(this).attr('data-email');

    //console.log(obj_name);

    //hide the user to show that they are being removed from the team
    $(this).parent('li').slideUp();

    $.ajax({
      url: "{{ $remove_url }}",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: "PATCH",
      data: { "{{$remove_action}}_id":obj_id, 'user_id':"{{ Auth::user()->id }}" },
      success: function(data) {
        var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
        //console.log(jqObj);

        // Now show them we saved and when we did
        $('#{{$remove_action}}-message').html('team member removed');
        $('#{{$remove_action}}-message').removeClass('text-danger');

        addMemberToList(obj_id, obj_name, obj_email);
      },
      error: function(data) {
        var jqObj= jQuery(data);

        //show the User, since there was an error
        $(this).show();

        $('#{{$remove_action}}-message').html('Error.');
        $('#{{$remove_action}}-message').addClass('text-danger');
      }
    });
  });


  $(".team-member-list").on("mouseenter","li", function(event){ //hover in
      //console.log(this);
      $(this).children("i").css('visibility', 'visible');
    });

    $(".team-member-list").on("mouseleave","li", function(event){ //hover out
      $(this).children("i").css('visibility', 'hidden');
  });


  function addMemberToBar(id, name, email){
    var newli = $("<li>").html(name+'&nbsp;&nbsp;&nbsp;<i data-id="'+id+'" data-name="'+name+'" data-email="'+email+'" class="remove-user fa fa-close text-danger" aria-hidden="true"></i>');
    $(".team-member-list").append(newli);
    $(".team-member-list > li").children("i").css('visibility', 'hidden');
  }

  function addMemberToList(id, name, email){

    var newli= $("<li>").html('<a id="'+id+'" class="btn btn-urc-account blue add-user" data-name="'+name+'" data-email="'+email+'">'+
            '<div class="col-sm-11 account-name">'+name+'</div>'+
            '<div class="col-sm-1"><i class="fa fa-plus-circle pull-right" aria-hidden="true"></i></div>'+
          '</a>');
    $("#team-list").append(newli);
  }


  //ondomready
  $(function () {
    listFilter($("#header"), $("#team-list"));
    $(".team-member-list > li").children("i").css('visibility', 'hidden');
  });
}(jQuery));

</script>
