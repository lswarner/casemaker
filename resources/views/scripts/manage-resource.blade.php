<script>
  $(function() {
    console.log('loading {{$resource}} script');


    $("#{{ $resource }}-list").on("click", ".add-{{$resource}}", function(event) {
      event.preventDefault();

      var obj_id= $(this).attr('data-id');
      var obj_name= $(this).attr('data-name');
      console.log(obj_name);

      //hide the user to show that they are being added to the case study
      $(this).slideUp();

      $.ajax({
        url: "{{ $add_url }}",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: "PATCH",
        data: { "{{$resource}}_id":obj_id, 'user_id':"{{ Auth::user()->id }}" },
        success: function(data) {
          var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
          console.log(jqObj);

          addResourceToBar(obj_id, obj_name);
        },
        error: function(data) {
          var jqObj= jQuery(data);

          //show the oUser, since there was an error
          $(this).slideDown();

        }
      });
    });



    $("#{{$resource}}-bar").on("click", ".remove-{{$resource}}", function(event) {
      event.preventDefault();

      var obj_id= $(this).attr('data-id');
      var obj_name= $(this).attr('data-name');

      console.log(obj_name);

      //hide the user to show that they are being removed from the case study
      $(this).parent('li').slideUp();

      $.ajax({
        url: "{{ $remove_url }}",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: "PATCH",
        data: { "{{$resource}}_id":obj_id, 'user_id':"{{ Auth::user()->id }}" },
        success: function(data) {
          var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
          console.log(jqObj);

          // Now show them we saved and when we did
          $('#{{$resource}}-message').html('{{$resource}} removed');
          $('#{{$resource}}-message').removeClass('text-danger');

          addResourceToList(obj_id, obj_name);
        },
        error: function(data) {
          var jqObj= jQuery(data);

          //show the User, since there was an error
          $(this).show();

        }
      });
    });


    $("#{{$resource}}-bar").on("mouseenter","li", function(event){ //hover in
        //console.log(this);
        $(this).children("i").css('visibility', 'visible');
    });

    $("#{{$resource}}-bar").on("mouseleave","li", function(event){ //hover out
        $(this).children("i").css('visibility', 'hidden');
    });



    function addResourceToBar(id, name){
      var newli = $("<li>").html(name+'&nbsp;&nbsp;&nbsp;<i data-id="'+id+'" data-name="'+name+'" class="remove-{{$resource}} fa fa-close text-danger" aria-hidden="true"></i>');
      $("#{{$resource}}-bar").append(newli);
      $("#{{$resource}}-bar > li").children("i").css('visibility', 'hidden');
    }

    function addResourceToList(id, name){

      var newli= $("<li>").html('<a href="#" id="'+id+'" class="btn btn-urc-account add-{{$resource}}" data-name="'+name+'" >'+
              '<div class="col-sm-11 {{$resource}}-name">'+name+'</div>'+
              '<div class="col-sm-1"><i class="fa fa-plus-circle pull-right" aria-hidden="true"></i></div>'+
            '</a>');
      $("#{{$resource}}-list").append(newli);
    }


    $("#{{$resource}}-bar > li").children("i").css('visibility', 'hidden');

});


</script>
