function artist_card_anim(evt, card_id) {
  var nom_class  = "card id_" + card_id;
  var infos = document.getElementsByClassName("infos");
  var picture = document.getElementsByClassName("picture");
  var card = document.getElementsByClassName("nom_class");

  for (var i = 0; i < infos.length; i++) {
    infos[i].style.display = "none";
  }

  for (var j = 0; j < picture.length; j++) {
    picture[j].className = picture[j].className.replace(" active", "");
  }

  document.getElementById(card_id).style.display = "flex";
  evt.currentTarget.className += " active";
  //card.currentTarget.className += " active";
}

function openTab(container) {
 //var obj = JSON.parse('<?php echo json_encode($test) ?>');
    console.log(container);
    var x = document.getElementsByClassName("container");
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    document.getElementById(container).style.display = "block";
}