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
                },

              @isset($box['word_count'])
                onKeydown: function (e) {
                  //var t = e.currentTarget.innerText;

                  var max_words= {{ $box['word_count'] }};

                  if( $('#{{ $box["name"] }}').summernote('isEmpty') ) {
                    var t= "";
                    var t_length= 0;
                    console.log('its empty');
                  }
                  else {
                    //var t= $('#{{ $box["name"] }}').text().substring(3).slice(0, -4);
                    var t= $('#{{ $box["name"] }}').text();
                    var t_length= t.split(/[\s]+/).length;
                  }

                  console.log(t_length);

                  var remaining= max_words - t_length;

                  $('#{{ $box["name"] }}_length').text(remaining+' words remaining');
                  //console.log(remaining+' words remaining');

                  if(remaining == 0){
                    $('#{{ $box["name"] }}_length').addClass('text-sunset');
                  }
                  else {
                    $('#{{ $box["name"] }}_length').removeClass('text-sunset');
                  }

                  //let the user finish the last word, but not start a new one (with a whitespace character)
                  if (t_length >= max_words && (e.keyCode == 9 || e.keyCode == 13 || e.keyCode == 32) ) {

                    //delete key
                    if (e.keyCode == 46 || e.keyCode != 8)
                      e.preventDefault();
                  }

                },
                onPaste: function (e) {

                    var max_words= {{ $box['word_count'] }};

                    //var t = e.currentTarget.innerText;
                    if( $('#{{ $box["name"] }}').summernote('isEmpty') ) {
                      var t= "";
                      var t_length= 0;
                      console.log('its empty');
                    }
                    else {
                      //var t= $('#{{ $box["name"] }}').text().substring(3).slice(0, -4);
                      var t= $('#{{ $box["name"] }}').text();
                      var t_length= t.split(/[\s]+/).length;
                    }

                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    var b_length= bufferText.split(/[\s]+/).length;
                    //console.log('paste length: '+b_length+', '+t_length);


                    var remaining= max_words - t_length;

                    if (t_length + b_length >= max_words) {
                        e.preventDefault();
                        var bufferTextAllowed = bufferText.trim().substring(0, max_words - t.length);
                        setTimeout(function() { // wrap in a timer to prevent issues in Firefox
                            document.execCommand('insertText', false, bufferTextAllowed);
                            $('#{{ $box["name"] }}_length').addClass('text-sunset');
                            $('#{{ $box["name"] }}_length').text('The text you want to paste exceeds the maximum word count: '+remaining+' words remaining');

                        }, 10)
                    }
                }
              @endisset

              }

            });

          @endforeach
        });

    </script>
