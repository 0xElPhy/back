const inputs = document.querySelectorAll('input');

const patterns = {
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
  if (regex.test(field.value)) {
    if (field.name == "annee" && field.value>currentYear){
      const currentYear = new Date().getFullYear();
      if (field.value>currentYear) {
        return false;
      }
    } 
    field.className = 'champs annee valide';
  } else {
    field.className = 'champs annee invalide';
  }
}
