// BETA_INDEX.PHP
function openTab(container) {
    console.log(container);
    var x = document.getElementsByClassName("container");
    for (var i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById(container).style.display = "block";
  }