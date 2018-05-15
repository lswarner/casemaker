

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
<script type="text/javascript">

  $('.grid').isotope({
    itemSelecter: '.grid-item',
    percentPosition: true,
    masonry: {
      columnWidth: '.grid-sizer',
      horizontalOrder: true,
      gutter: 10
    }
  });

</script>
