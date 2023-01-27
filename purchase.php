<?php
session_start();
if (!isset($_SESSION['User'])) {
    header("Location: index.php?page=0");
}

if (!$_SESSION['achat']) {
    header("Location: index.php?page=0");
}
unset($_SESSION['achat']);

if ($_GET['offre'] == "PermisB") {
    $leprix = intval($_SESSION['total_PermisB'], 10);
}

if ($_GET['offre'] == "PermisA") {
    $leprix = intval($_SESSION['total_PermisA'], 10);
}

if ($_GET['offre'] == "Code") {
    $leprix = intval($_SESSION['total_Code'], 10);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat | Val'auto</title>
    <link rel="stylesheet" href="./css/purchase.css">
</head>

<body>
    <div id="flash">
        <p>Merci pour votre achat, vous allez être redirigé dans un instant...</p>
    </div>

    <div class="body">
        <div class="container">
            <form action="">
                <div class="header">
                    <h3>Paiement en ligne</h3>
                </div>
                <div class="main">
                    <div class="cards">
                        <img src="./images/visa.png" width="50px" height="18px" alt="">
                        <img class="mastercard" src="./images/mastercard.png" width="50px" alt="">
                    </div>
                    <h2>Montant du paiement</h2>
                    <p id="montant"><?php if ($leprix != 0) {
                                        echo $leprix;
                                    } else {
                                        header("Location: index.php?page=4");
                                    } ?>€</p>

                    <label for="inputNom">Nom sur la carte :</label>
                    <input type="text" name="nom" id="inputNom">



                    <label for="inputNum">Numéro de carte :</label>
                    <input type="text" name="num" id="inputNum" class="inputNum" onkeyup="formatCardNumber(this)" maxlength="19">

                    <div class="d-flex-label">
                        <label for="inputDate">Date d'éxpiration</label>
                        <label for="inputCVV">CVV</label>
                    </div>
                    <div class="d-flex input">
                        <input type="text" placeholder="MM/YY" id="inputDate" name="dateExpi" maxlength="5">
                        <input type="number" min="100" max="999" id="inputCVV" name="cvv">
                    </div>
                    <button type="submit" name="submitPurchase" id="submit">
                        <p id="textbtnSublit">payer</p><img id="gif" src="./images/loading.gif" alt="">
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="./Js/purchase.js"></script>
</body>

</html>
<script>
    function formatCardNumber(input) {
        // Récupère la valeur de l'input
        var value = input.value;
        // Remplace les espaces par des vides
        value = value.replace(/\s+/g, '');
        // Boucle sur chaque 4 caractères pour ajouter un espace
        value = value.match(/.{1,4}/g).join(" ");
        // Met à jour la valeur de l'input avec les espaces
        input.value = value;
    }
</script>