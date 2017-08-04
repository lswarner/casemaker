<script>
  $('.btn-icon').on('click', function(e) {
   $('#delete-modal').modal('toggle', $(this));
   return false; /* the <a> get's clicked as well, so don't follow it */
  });


  $('#delete-modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var action= button.data('action')
    var title= button.data('title')

    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('#casestudy-title').text(title)
    modal.find('#form-delete').attr('action', action);
  })
</script>
