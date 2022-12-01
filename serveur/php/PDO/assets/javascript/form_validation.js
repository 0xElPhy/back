const inputs = document.querySelectorAll('input');

const patterns = {
  titre: /(\w?\d?)+/i,
  annee: /^\d{4}$/,
  url: /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/i,
  prix: /^\d+([,.]\d{1,2})?$/i
};

inputs.forEach((input) => {
  input.addEventListener('keyup', (e) => {
    validate(e.target, patterns[e.target.attributes.name.value]);
  });
});

function validate(field, regex) {
  console.log(field.value);
  const currentYear = new Date().getFullYear();
  const origin = new Date("1860-04-09").getFullYear();
  console.log(field.value<origin);
  if (regex.test(field.value)) { 
    if (field.name == "annee" && (field.value>currentYear || field.value<origin)){
      return false;
    } 
    field.className = 'champs ' + field.name + ' valide';
  } else {
    field.className = 'champs ' + field.name + ' invalide';
  }
}

var check = document.getElementById("disc_form");
check.addEventListener("click", function() {
  let infos = document.getElementsByClassName("infos");

  if (document.myForm.Name.value == "") {
    alert( "Please provide your name!" );
    document.myForm.Name.focus() ;
    return false;
  }
  if (document.myForm.EMail.value == "") {
    alert( "Please provide your Email!" );
    document.myForm.EMail.focus() ;
    return false;
  }
  if (document.myForm.Zip.value == "" || isNaN(document.myForm.Zip.value) ||
    document.myForm.Zip.value.length != 5 ) {
    
    alert("Please provide a zip in the format #####.");
    document.myForm.Zip.focus() ;
    return false;
  }
  if (document.myForm.Country.value == "-1") {
    alert( "Please provide your country!" );
    return false;
  }
  form.submit();
  window.alert("Formulaire envoyé");
  return true;
});