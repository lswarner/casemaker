

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script type="text/javascript">

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

    var filterValue= this.value;  //get the value this single filte was just set to

    // recreate the whole filter string  ex: '.country.method.audience'
    // this will match casestudies that have ANY of these filters
    filters='';
    $('.filters-select').each(function(index) {
      filters += this.value;
    });

    $grid.isotope({ filter: filters });  //apply the new filter to the grid

  });

</script>
