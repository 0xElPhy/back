$( ".onglet_artistes" ).click(function() {
    $( ".onglet_artistes" ).css('background', 'green');
    $( ".onglet_disc" ).css('background', 'yellow');
  });

  $( ".onglet_disc" ).click(function() {
    $( ".onglet_disc" ).css('background', 'green');
    $( ".onglet_artistes" ).css('background', 'yellow');
  });