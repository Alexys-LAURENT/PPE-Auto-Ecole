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





const typePermisA = document.getElementsByName('typePermisA');
const Montant_Display2 = document.getElementById("Montant-Display2");
Montant_Display2.innerHTML = "0€";
for (let i = 0; i < typePermisA.length; i++) {
    typePermisA[i].addEventListener('change', function () {
        Montant_Display2.innerHTML = parseInt(typePermisA[i].value) + " €";
    });
}






const Code = document.getElementsByName('Code');
const Montant_Display3 = document.getElementById("Montant-Display3");
Montant_Display3.innerHTML = "0€";
for (let i = 0; i < typePermisA.length; i++) {
    Code[i].addEventListener('change', function () {
        Montant_Display3.innerHTML = parseInt(Code[i].value) + " €";
    });
}








function Display_PermisB() {
    document.getElementById("form-PermisB").style.display = "flex";
    document.getElementById("form-PermisA").style.display = "none";
    document.getElementById("form-Code").style.display = "none";

    document.getElementById("validate-PermisB").style.display = "flex";
    document.getElementById("validate-PermisA").style.display = "none";
    document.getElementById("validate-Code").style.display = "none";
}

function Display_PermisA() {
    document.getElementById("form-PermisB").style.display = "none";
    document.getElementById("form-PermisA").style.display = "flex";
    document.getElementById("form-Code").style.display = "none";

    document.getElementById("validate-PermisB").style.display = "none";
    document.getElementById("validate-PermisA").style.display = "flex";
    document.getElementById("validate-Code").style.display = "none";
}

function Display_Code() {
    document.getElementById("form-PermisB").style.display = "none";
    document.getElementById("form-PermisA").style.display = "none";
    document.getElementById("form-Code").style.display = "flex";

    document.getElementById("validate-PermisB").style.display = "none";
    document.getElementById("validate-PermisA").style.display = "none";
    document.getElementById("validate-Code").style.display = "flex";
}