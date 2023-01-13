const nomCarte = document.getElementById('inputNom');
const numeroCarte = document.getElementById('inputNum');
const dateCarte = document.getElementById('inputDate');
const cvvCarte = document.getElementById('inputCVV');

document.getElementById('submit').addEventListener('click', function () {

    if (nomCarte.value == '') {
        nomCarte.style.cssText = 'border : 1px solid red;';
    }

    if (numeroCarte.value == '') {
        numeroCarte.style.cssText = 'border : 1px solid red;';
    }


    if (dateCarte.value == '') {
        dateCarte.style.cssText = 'border : 1px solid red;';
    }


    if (cvvCarte.value == '') {
        cvvCarte.style.cssText = 'border : 1px solid red;';
    }

});
