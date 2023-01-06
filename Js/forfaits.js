const nbCours = document.getElementsByName('nbCours');
const typeBoite = document.getElementsByName('typeBoite');
const typePermis = document.getElementsByName('typePermis');
const Montant_Display = document.getElementById("Montant-Display");
let ChampGauche = 0;
let ChampMilieu = 0;
let ChampDroite = 0;
Montant_Display.innerHTML = "0€";

for (let i = 0; i < nbCours.length; i++) {
    nbCours[i].addEventListener('change', function () {
        ChampDroite = nbCours[i].value;
        Calculer();
        console.log(ChampDroite);
    });
}

for (let i = 0; i < typeBoite.length; i++) {
    typeBoite[i].addEventListener('change', function () {
        ChampMilieu = typeBoite[i].value;
        Calculer();
    });
}


for (let i = 0; i < typePermis.length; i++) {
    typePermis[i].addEventListener('change', function () {
        ChampGauche = typePermis[i].value;
        Calculer();
    });
}

function Calculer() {
    Montant_Display.innerHTML = parseInt(ChampGauche) + parseInt(ChampMilieu) + parseInt(ChampDroite) + " €";
    console.log(parseInt(ChampGauche) + parseInt(ChampMilieu) + parseInt(ChampDroite) + " €");
}
