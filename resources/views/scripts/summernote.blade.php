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
              ]
            });
          @endforeach
        });
    </script>
