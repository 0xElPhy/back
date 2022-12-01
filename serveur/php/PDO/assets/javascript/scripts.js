var action = document.getElementsByClassName("card");

for(let i = 0; i < action.length; i++) {
  action[i].addEventListener("mouseover", function() {
    action[i].style.backgroundPosition = "left top";
  });

  action[i].addEventListener("click", function() {
    action[i].style.backgroundPosition = "left top";
  });

  action[i].addEventListener("mouseout", function() {
    if (action[i].className.slice(-6) == "active"){
      return true;    
    }
    else {
      action[i].style.backgroundPosition = "center top";
    }
  });
}

function artist_card_anim(evt, card_id) {
  //var nom_class  = "card id_" + card_id;
  let infos = document.getElementsByClassName("infos");
  let card = document.getElementsByClassName("card");

  if (evt.currentTarget.className.slice(-6) == "active") {
    for (let i = 0; i < infos.length; i++) {
      infos[i].style.display = "none";
    }
    
    for (let j = 0; j < card.length; j++) {
      card[j].className = card[j].className.replace(" active", "");
    }
    return;
  }

  for (let i = 0; i < infos.length; i++) {
    infos[i].style.display = "none";
  }

  for (let j = 0; j < card.length; j++) {
    card[j].className = card[j].className.replace(" active", "");
    card[j].style.backgroundPosition = "center top";
  }

  document.getElementById(card_id).style.display = "flex";
  evt.currentTarget.className += " active";
}