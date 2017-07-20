<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          @foreach ($boxes as $box)
            $('#{{ $box["name"] }}').summernote({
              height:"{{ $box['height'] }}",
              toolbar: [
                // [groupName, [list of button]]
                ['font', ['fontname']],
                ['fontsize', ['fontsize']],
                ['style', ['bold', 'italic', 'underline']],
                ['para', ['ul', 'ol']]
              ],
              fontNames: ['Arial', 'Roboto', 'Source Sans Pro'],
              fontNamesIgnoreCheck: ['Roboto', 'Source Sans Pro'],

              disableDragAndDrop: true,
              /* Add autosave callback using script in scripts/autosave */
              callbacks: {
                onChange: function(contents, $editable) {

                  //first, update the underlying textarea the summernote replaces
                  $('#{{ $box["name"] }}').text( contents );

                  //then, notify our auto saver script
                  autoSave();
                }
              }

            });

          @endforeach
        });

    </script>
