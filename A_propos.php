<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once("./views/_navbar.php");
    ?>
    <div class="banner mb-5 position-relative">
        <div class="container-xs">
            <h1 class="slogan my-5 text-center">À propos de nous!</h1>
        </div>
        <!-- <div class="messageBox bg-white position-absolute p-2">
            <p>Je suis un texteJe suis un texteJe suis un texteJe suis Je suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteun texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texteJe suis un texte</p>
        </div> -->
        <div class="voiture position-absolute">
            <img src="images/voiture.avif" alt="" width="100px" height="100px" class="position-relative">
        </div>
    </div>
</body>

</html>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    html,
    body {
        font-family: 'Karla';
        overflow: hidden;
    }

    .banner {
        background-color: #2B8C52;
        width: 100%;
        min-height: 60vh;
    }

    .slogan {
        color: white;
        font-weight: 900;
        font-size: 80px;
    }

    .voiture {
        bottom: -25px;
        animation: voiture 10s infinite;
    }

    @keyframes voiture {
        0% {
            transform: translateX(-10vw);
        }

        20% {
            transform: translateX(45vw);
        }

        60% {
            transform: translateX(45vw);
        }

        100% {
            transform: translateX(120vw);
        }
    }

    .voiture::after {
        content: ' ';
        position: absolute;
        left: 50px;
        bottom: 80px;
        border: 32px solid;
        border-color: transparent transparent transparent white;
        transform: scale(0);
        animation: popUp 10s infinite;
    }

    .voiture::before {
        z-index: 1;
        content: "Nous sommes une auto-école!";
        position: absolute;
        width: 150px;
        height: 80px;
        bottom: 100px;
        left: 50px;
        font-size: 16px;
        padding: 10px;
        display: block;
        transform: scale(0);
        animation: popUp 10s infinite;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0px 0px 10px gray;
    }

    @keyframes popUp {
        0% {
            transform: scale(0);
        }

        17.5% {
            transform: scale(0);
        }

        25% {
            transform: scale(1);
        }

        60% {
            transform: scale(1);
        }

        65% {
            transform: scale(0);
        }

        100% {
            transform: scale(0);
        }
    }
</style>
<script>
    const voiture = document.querySelector('.voiture');
    voiture.addEventListener('dragstart', (e) => {
        e.preventDefault();
    });
</script>