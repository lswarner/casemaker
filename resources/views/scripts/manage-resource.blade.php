<script>



  $(".{{$resource}}-list").on("mouseenter","li", function(event){ //hover in
      //console.log(this);
      $(this).children("i").css('visibility', 'visible');
  });

  $(".{{$resource}}-list").on("mouseleave","li", function(event){ //hover out
      $(this).children("i").css('visibility', 'hidden');
  });



  function addResourceToBar(id, name){
    var newli = $("<li>").html(name+'&nbsp;&nbsp;&nbsp;<i data-id="'+id+'" data-name="'+name+'" class="remove-{{$resource}} fa fa-close text-danger" aria-hidden="true"></i>');
    $(".{{$resource}}-list").append(newli);
    $(".{{$resource}}-list > li").children("i").css('visibility', 'hidden');
  }

  function addResourceToList(id, name){

    var newli= $("<li>").html('<a href="http://espn.com" id="'+id+'" class="btn btn-urc-account sunset add-{{$resource}}" data-name="'+name+'" >'+
            '<div class="col-sm-11 {{$resource}}-name">'+name+'</div>'+
            '<div class="col-sm-1"><i class="fa fa-plus-circle pull-right" aria-hidden="true"></i></div>'+
          '</a>');
    $("#{{$resource}}-list").append(newli);
  }


  //ondomready
  $(function () {
    $(".{{$resource}}-list > li").children("i").css('visibility', 'hidden');
    console.log('go');

    addResourceToBar('17','Phillip Rivers');
    addResourceToList('21', "LaDainian Tomlinson");
  });







</script>
