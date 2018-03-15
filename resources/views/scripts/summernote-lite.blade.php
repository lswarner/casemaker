<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {

          @foreach ($boxes as $box)
            $('#{{ $box["name"] }}').summernote({
              height:"{{ $box['height'] }}",
              toolbar: [
                // [groupName, [list of button]]
                ['style', ['style']],
                ['font', ['fontname', 'fontsize']],
                ['style', ['bold', 'italic', 'underline', 'superscript','link','h1']],
                ['para', ['ul', 'ol']],
                ['ctrl', ['undo', 'redo']],
              ],
              styleTags: ['p', 'h3'],
              fontNames: ['Arial', 'Roboto', 'Source Sans Pro'],
              fontNamesIgnoreCheck: ['Roboto', 'Source Sans Pro'],

              disableDragAndDrop: true,

            });
          @endforeach

        });

    </script>
