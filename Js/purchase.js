const nomCarte = document.getElementById('inputNom');
const numeroCarte = document.getElementById('inputNum');
const dateCarte = document.getElementById('inputDate');
const cvvCarte = document.getElementById('inputCVV');

document.getElementById('submit').addEventListener('click', function () {

    if (nomCarte.value == '') {
        nomCarte.style.cssText = 'border : 1px solid red;';
    } else {
        nomCarte.style.cssText = 'border : 1px solid green;';
    }

    if (numeroCarte.value == '') {
        numeroCarte.style.cssText = 'border : 1px solid red;';
    } else {
        numeroCarte.style.cssText = 'border : 1px solid green;';
    }


    if (dateCarte.value == '') {
        dateCarte.style.cssText = 'border : 1px solid red;';
    } else {
        dateCarte.style.cssText = 'border : 1px solid green;';
    }


    if (cvvCarte.value == '') {
        cvvCarte.style.cssText = 'border : 1px solid red;';
    } else {
        cvvCarte.style.cssText = 'border : 1px solid green;';
    }

});


document.getElementById('submit').addEventListener('click', function () {
    if (nomCarte.value == '' || numeroCarte.value == '' || dateCarte.value == '' || cvvCarte.value == '') {
        event.preventDefault();
    } else {
        event.preventDefault();

        document.getElementById('textbtnSublit').style.display = 'none';
        document.getElementById('gif').style.display = 'block';
        document.getElementById('flash').style.display = 'block';

        setTimeout(function () {
            document.location.href = "index.php?page=2";
        }, 5000);


        // alert('Votre commande a bien été prise en compte');
    }
});