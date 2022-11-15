function artist_card_anim(evt, card_id) {
  //var nom_class  = "card id_" + card_id;
  var infos = document.getElementsByClassName("infos");
  var card = document.getElementsByClassName("card");

  if (evt.currentTarget.className.slice(-6) == "active") {
    for (var i = 0; i < infos.length; i++) {
      infos[i].style.display = "none";
    }
    
    for (var j = 0; j < card.length; j++) {
      card[j].className = card[j].className.replace(" active", "");
    }
    return;
  }

  for (var i = 0; i < infos.length; i++) {
    infos[i].style.display = "none";
  }

  for (var j = 0; j < card.length; j++) {
    card[j].className = card[j].className.replace(" active", "");
  }

  document.getElementById(card_id).style.display = "flex";
  evt.currentTarget.className += " active";
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