function artist_card_anim(evt, card_id) {
  var infos = document.getElementsByClassName("infos");
  var card = document.getElementsByClassName("card");

  for (var i = 0; i < infos.length; i++) {
    infos[i].style.display = "none";
  }

  for (var j = 0; j < infos.length; j++) {
    infos[j].className = infos[j].className.replace(" active", "");
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