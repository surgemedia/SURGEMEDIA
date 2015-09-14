/*===============================
=            ISOTOPE            =
===============================*/
 var $grid = $('.grid').isotope({
    itemSelector: '.grid-item',
    layoutMode: 'fitRows'
  });
// filter .metal items
$grid.isotope({ filter: '.hosting' });

// // filter .alkali OR .alkaline-earth items
// $grid.isotope({ filter: '.alkali, .alkaline-earth' });

// // filter .metal AND .transition items
// $grid.isotope({ filter: '.metal.transition' });

// // show all items
// $grid.isotope({ filter: '*' });