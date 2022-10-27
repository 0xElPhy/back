
var liste = document.getElementById("tab_prog");
liste.addEventListener("change", function() {

    texte = liste.options[liste.selectedIndex].value;
    console.log(texte);
    return document.getElementById('txt_area_2').defaultValue = texte;
});

var check = document.getElementById("valide");
check.addEventListener("click", function() {

// Input Société //

    let societe = document.getElementById("societe");
        const societeFormat = /\w+/gm;
        let S = societeFormat.test(societe.value);
        let modLegendeS = document.getElementById("legende_s");

        if (S==false) {
            modLegendeS.removeAttribute("hidden");
            societe.style.backgroundColor = '#F3FF93';

            if(societe.value=="") {
                modLegendeS.innerHTML = `Saisie obligatoire`;
            }
            else {
                modLegendeS.innerHTML = `Saisie non-valide : caractère(s) interdit(s)`;
            }
        }
        else if (S==true && societe.style.backgroundColor == 'rgb(243, 255, 147)') {
            modLegendeS.setAttribute("hidden","");
            societe.style.backgroundColor = '#EBF4FF';
        }
    

// Input Personne à contacter //

    let personne = document.getElementById("personne");
        const personneFormat = /^[a-z ,.'-]+$/i;
        let P = personneFormat.test(personne.value);
        let modLegendeP = document.getElementById("legende_p");

        if (P==false) {
            modLegendeP.removeAttribute("hidden");
            personne.style.backgroundColor = '#F3FF93';

            if(personne.value=="") {
                modLegendeP.innerHTML = `Saisie obligatoire`;
            }
            else {
                modLegendeP.innerHTML = `Saisie non-valide : caractère(s) interdit(s)`;
            }
        }
        else if (P==true && personne.style.backgroundColor == 'rgb(243, 255, 147)') {
            modLegendeP.setAttribute("hidden","");
            personne.style.backgroundColor = '#EBF4FF';
        }


// Input Code Postal // 

    let codePostal = document.getElementById("cp");
        const cpFormat = /^\d{5}$/
        let CP = cpFormat.test(codePostal.value);
        let modLegendeCP = document.getElementById("legende_cp");

        if (CP==false) {
            modLegendeCP.removeAttribute("hidden");
            codePostal.style.backgroundColor = '#F3FF93';

            if(codePostal.value=="") {
                modLegendeCP.innerHTML = `Saisie obligatoire`;
            }
            else {
                modLegendeCP.innerHTML = `Saisie non-valide : caractère(s) interdit(s)`;
            }
        }
        else if (CP==true && codePostal.style.backgroundColor == 'rgb(243, 255, 147)') {
            modLegendeCP.setAttribute("hidden","");
            codePostal.style.backgroundColor = '#EBF4FF';
        }


// Input Ville //

    let ville = document.getElementById("ville");
        const villeFormat = /^[a-z ,'-]+$/i;
        let V = villeFormat.test(ville.value);
        let modLegendeV = document.getElementById("legende_v");

        if (V==false) {
            modLegendeV.removeAttribute("hidden");
            ville.style.backgroundColor = '#F3FF93';

            if(ville.value=="") {
                modLegendeV.innerHTML = `Saisie obligatoire`;
            }
            else {
                modLegendeV.innerHTML = `Saisie non-valide : caractère(s) interdit(s)`;
            }
        }
        else if (V==true && ville.style.backgroundColor == 'rgb(243, 255, 147)') {
            modLegendeV.setAttribute("hidden","");
            ville.style.backgroundColor = '#EBF4FF';
        }


// Input Email //

    let email = document.getElementById("email");
        const emailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let E = emailFormat.test(email.value);
        let modLegendeE = document.getElementById("legende_e");

        if (E==false) {
            modLegendeE.removeAttribute("hidden");
            email.style.backgroundColor = '#F3FF93';

            if(email.value=="") {
                modLegendeE.innerHTML = `Saisie obligatoire`;
            }
            else {
                modLegendeE.innerHTML = `Saisie non-valide : caractère(s) interdit(s)`;
            }
        }
        else if (E==true && email.style.backgroundColor == 'rgb(243, 255, 147)') {
            modLegendeE.setAttribute("hidden","");
            email.style.backgroundColor = '#EBF4FF';
        }


// Input Téléphone //

    let telephone = document.getElementById("tel");
        const telFormat = /^((\+33[-. ]?\d)|(0\d))([-. ]?\d{2}){4}$/; //numérotation internationale
                                    //    /^0[1-9]([-. ]?\d{2}){4}$/; //numérotation classique
        let T = Boolean(telephone.value.match(telFormat) || telephone.value == "");
        let modLegendeT = document.getElementById("legende_t");

        if (T==false) {
            modLegendeT.removeAttribute("hidden");
            modLegendeT.innerHTML = `Saisie non-valide : caractère(s) interdit(s)`;
            telephone.style.backgroundColor = '#F3FF93';
        }
        else if (T==true && telephone.style.backgroundColor == 'rgb(243, 255, 147)') {
            modLegendeT.setAttribute("hidden","");
            telephone.style.backgroundColor = '#EBF4FF';
        }


//Input Envoyer le formulaire //

    let form = document.getElementById("form1");

    if (S && P && CP && V && E && T) {
        form.submit();
        window.alert("Formulaire envoyé");
        return true;
    }
    else {
        //window.alert("Erreur formulaire.\nVeuillez corriger les champs en jaune");
        return false;
    }
});