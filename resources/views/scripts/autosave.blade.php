<script>
  var timeoutId;

  $('form input, form textarea, #intro-context').on('input propertychange change', autoSave);

  function autoSave(){
    console.log('Text Change');

    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 1 second (1000 ms) after the last change
        postToDB();
    }, 1000);
  }

  function postToDB()
  {
      console.log('Saving to the db');
      form = $('form');


      $.ajax({
        url: "{{ url('casestudy/'.$casestudy->id) }}",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        type: "PATCH",
        data: form.serialize(), // serializes the form's elements.
        beforeSend: function(xhr) {
                // Let them know we are saving
          $('#autosave-message').html('Saving...');
          $('#autosave-message').removeClass('text-danger');
        },
        success: function(data) {
          var jqObj = jQuery(data); // You can get data returned from your ajax call here. ex. jqObj.find('.returned-data').html()
                // Now show them we saved and when we did
                var d = new Date();
                $('#autosave-message').html('Saved at ' + d.toLocaleTimeString());
        },
        error: function(data) {
          var jqObj= jQuery(data);

          $('#autosave-message').html('Uh oh, something is wrong with autosave.');
          $('#autosave-message').addClass('text-danger');
        }
      });

  }


</script>
