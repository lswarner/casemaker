<script type="text/javascript">
    $(document).ready(function() {
      @foreach ($boxes as $box)
          $('#{{ $box["id"] }}').summernote({
            toolbar: false,
            height:"{{ $box['height'] }}",
            hint: {
              words: {!! $box["suggestions"] !!},
              match: /\b(\w{1,})$/,
              search: function (keyword, callback) {
                callback($.grep(this.words, function (item) {
                  return item.indexOf(keyword) === 0;
                }));
              }
            },
            disableDragAndDrop: true,
            placeholder: "{{ $box['placeholder'] }}",
            /* Add autosave callback using script in scripts/autosave */
            callbacks: {
              onChange: function(contents, $editable) {

                //first, update the underlying textarea the summernote replaces
                $('#{{ $box["id"] }}').text( contents );

                //then, notify our auto saver script
                autoSave();
              }
            }
          });
      @endforeach
    });
</script>
