<div class="well well-masonry">


    <div class="photo-container img">

      <img src="{{ $item->thumbnail }}" class="photo-masonry">

      <div class="overlay">
          <div class="overlay-top">
            <a class="close-overlay hidden pull-right">x</a>
            <h3 id="item-title{{$item->id}}" class="item-title">{{ str_limit($item->title, 40) }}</h3>
          </div>

          <div id="overlay-content{{$item->id}}" class="overlay-content  hidden-sm hidden-xs">
            {{ str_limit($item->description, 128) }}
          </div>

          <div id="overlay-contact{{$item->id}}" class="overlay-contact" >

          </div>

            <div class="overlay-bottom">

              <div class="contact-icon">
                <a href="{{ url('item', $item->id) }}" class="glyphicon glyphicon-th-list glyphicon-contact" aria-hidden="true"></a><br />
                Details
              </div>

            </div>
      </div>

    </div>


</div>  <!--  / .well .well-masonry -->
