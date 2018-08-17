

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script type="text/javascript">


  function call_filter(filter, value){
    console.log('filter: '+filter+' :: '+value);
  }

  $('.do_filter').click( function(event){
    filter= $(this).attr('data-filter');
    name= $(this).attr('data-name');
    value= $(this).attr('data-value');

    dropdown= '#dropdown-'+filter;

    $(dropdown).html( name+' <span class="caret"></span>');
    $(dropdown).attr('data-value', value);


    console.log(' '+filter+' '+value);

    // recreate the whole filter string  ex: '.country.method.audience'
    // this will match casestudies that have ANY of these filters
    filters='';
    $('.filters-dropdown').each(function(index) {
      filters += $(this).attr('data-value');
    });

    console.log('filters: '+filters);

    $grid.isotope({ filter: filters });  //apply the new filter to the grid

  });

  /* initialize the masonry grid */
  var $grid= $('.grid').isotope({
    itemSelecter: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer',
      horizontalOrder: true,
      gutter: 10
    }
  });


  // update the filters when a selection is changed
  $('.filters-select').on( 'change', function( event ) {

    var filterValue= this.value;  //get the value this single filter was just set to

    // recreate the whole filter string  ex: '.country.method.audience'
    // this will match casestudies that have ANY of these filters
    filters='';
    $('.filters-select').each(function(index) {
      filters += slugify(this.value);
    });

    $grid.isotope({ filter: filters });  //apply the new filter to the grid
    console.log('filters: '+filters);
  });


  function slugify(str) {
    var $slug = '';
    var trimmed = $.trim(str);
    $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
    replace(/-+/g, '-').
    replace(/^-|-$/g, '');
    return $slug.toLowerCase();
  }

</script>
