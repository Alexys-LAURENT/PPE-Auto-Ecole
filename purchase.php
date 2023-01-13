<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: index.php?page=0");
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
                    <p id="montant"><?php if ($_SESSION['total_PermisB'] != 0) {
                                        echo $_SESSION['total_PermisB'];
                                    } else {
                                        header("Location: index.php?page=0");
                                    } ?>€</p>

                    <label for="">Nom sur la carte :</label>
                    <input type="text" name="nom" id="inputNom">



                    <label for="">Numéro de carte :</label>
                    <input type="text" name="num" id="inputNum">

                    <div class="d-flex-label">
                        <label for="">Date d'éxpiration</label>
                        <label for="">CVV</label>
                    </div>
                    <div class="d-flex input">
                        <input type="text" placeholder="MM/YY" id="inputDate" name="dateExpi">
                        <input type="number" maxlength="3" id="inputCVV" name="cvv">
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