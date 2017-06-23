<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          @foreach ($boxes as $box)
            $('#{{ $box }}').summernote({
              height:300,
              toolbar: [
                // [groupName, [list of button]]
                ['font', ['fontname']],
                ['fontsize', ['fontsize']],
                ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript']],
                ['para', ['ul', 'ol']]
              ]
            });
          @endforeach
        });
    </script>
