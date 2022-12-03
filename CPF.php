<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once('./views/_navbar.php') ?>
    <div class="banner">
        <div class="banner-first-row">
            <div class="h1">
                <h1>Avec le CPF, votre formation <br> financé à 100%</h1>
            </div>
            <div class="img">
                <img src="./images/cpf.png" alt="">
            </div>
        </div>
        <div class="banner-second-row">
            <h2>Financez intégralement votre permis avec Val'Auto,<br> l'auto école agréée CPF</h2>
            <div class="eligibilite">
                <a href="">Vérifiez votre éligibilité</a>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="main">
            <div class="titre-main">
                <h1>Fonctionnement du Permis CPF</h1>
            </div>
            <div class="avis">
                <div class="unavi">
                    <div class="compteur">
                        <h2>1</h2>
                    </div>
                    <div class="contenu">
                        <h3>Val'auto une auto école agréée CPF</h3>
                        <p>Val’auto est une auto-école de qualité, agréée par les préfectures et certifiée Qualiopi par l’AFNOR. En tant qu’organisme de formation Qualiopi, notre auto-école répond aux 21 critères de qualité exigés pour être éligible au financement CPF. Notre auto-école est ainsi référencée dans le catalogue du site moncompteformation. Ainsi, avec Val’auto, jusqu’à 100% du prix de votre formation peut être financé par le biais du CPF.</p>
                    </div>
                </div>
            </div>
            <div class="unavi">
                <div class="compteur">
                    <h2>2</h2>
                </div>
                <div class="contenu">
                    <h3>Le CPF, c’est pour qui ?</h3>
                    <p>Si vous êtes : salariés, personnes en recherche d’emploi ou travailleurs indépendants, avec Val’auto, l’intégralité de votre formation au permis de conduire peut être financée par votre Compte Professionnel de Formation (CPF). <br><br>

                        Pour être guidé dans vos démarches, il vous suffit de prendre un rendez-vous téléphonique avec un de nos experts Permis CPF. Pour plus de simplicité, ce conseiller vous assistera dans toutes vos démarches jusqu’à l’acceptation du financement de votre permis. En quelques minutes, ils peuvent vérifier votre compte avec vous et activer votre formation.</p>
                </div>
            </div>
            <div class="unavi">
                <div class="compteur">
                    <h2>3</h2>
                </div>
                <div class="contenu">
                    <h3>Passer votre permis pour 0€</h3>
                    <p>Dès que vous avez accepté sur le site du CPF notre proposition de formation, vous aurez immédiatement accès à notre plateforme. Vous pourrez révisez votre Code de la route ou réserver vos cours de conduite en ligne dans plus de 600 localités en France. Si vous avez besoin d’aide un coach suit en permanence l’avancée de votre formation.</p>
                    <div class="sinscrire"><a href="">S'inscrire</a></div>
                </div>
            </div>
            <div class="notes">
                <h1>Plus de 500 000 retours positifs !</h1>
                <img class="trustpilot" src="./images/trustpilot.png" alt="">
                <img class="stars" src="./images/Stars.png" alt="">
            </div>
            <div class="deuxavis">
                <div class="avis-gauche">
                    <div class="avis-gauche-texte">
                        <p>Super accompagnement !
                            Un suivi de qualité.</p>
                    </div>
                    <div class="avis-gauche-note-container">
                        <div class="avis-gauche-note">
                            <img src="./images/Stars.png" alt="">
                        </div>
                        <div class="avis-gauche-nom">
                            <p>Cristophe</p>
                        </div>
                    </div>
                </div>
                <div class="avis-droite">
                    <div class="avis-droite-texte">
                        <p>Parfait, permis obtenu dès le premier essai !</p>
                    </div>
                    <div class="avis-droite-note-container">
                        <div class="avis-droite-note">
                            <img src="./images/Stars.png" alt="">
                        </div>
                        <div class="avis-droite-nom">
                            <p>Bilel</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="pre-footer">
            <div class="packs"><a href="">Voir tous les packs CPF</a></div>
        </div>
        <?php require_once('./views/_footer.php') ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    .banner {
        width: 100%;
        height: 60vh;
        background-color: #2B8C52;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .banner-first-row {
        margin-top: 80px;
        width: 80%;
        max-width: 1200px;
        display: flex;
        position: relative;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .banner-first-row .h1 {
        width: 80%;
        display: flex;
        align-items: center;
    }

    .banner-first-row h1 {
        color: white;
        font-family: 'Karla', sans-serif;
        font-weight: bolder;
        font-size: 48px;
    }

    .banner-first-row .img {
        width: 20%;
        height: auto;
    }

    .banner-first-row img {
        width: 100%;
        height: auto;
    }

    .banner-second-row {

        width: 80%;
        max-width: 1000px;
        display: flex;
        flex-direction: column;
        position: relative;
        text-align: center;
        align-items: center;
    }

    .banner-second-row h2 {
        font-family: 'Karla', sans-serif;
        color: white;
        font-weight: bolder;
        margin-bottom: 20px;
        font-size: 32px;
    }

    .eligibilite {
        background-color: #000F98;
        width: 210px;
        height: 50px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        border-radius: 40px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .eligibilite a {
        color: white;
        text-decoration: none;
        font-family: 'Karla', sans-serif;
        font-weight: bold;
    }

    .body {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .main {
        width: 90%;
        margin-left: 5%;
        margin-right: 5%;
        max-width: 1200px;
    }

    .titre-main {
        margin-top: 30px;
        margin-bottom: 10px;
        width: 100%;
        height: 50px;
        display: flex;
        text-align: center;
        justify-content: center;
    }


    .unavi {
        display: flex;
        margin-top: 40px;
    }

    .compteur {
        background-color: #2B8C52;
        width: 45px;
        height: 45px;
        border-radius: 50px;
    }

    .compteur h2 {
        position: relative;
        left: 15px;
        top: 2px;
        width: 45px;
        height: 45px;
    }

    .contenu {
        margin-left: 5px;
    }

    .contenu p {
        background-color: #D9D9D9;
        padding: 15px;
        border-radius: 10px;
    }

    .sinscrire {
        background-color: #000F98;
        width: 110px;
        height: 50px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        border-radius: 400px;
        padding-left: 15px;
        padding-right: 15px;
    }


    .sinscrire a {
        color: white;
        font-weight: bold;
        text-decoration: none;
    }

    .notes {
        margin-top: 50px;
        display: flex;
        text-align: center;
        align-items: center;
        flex-direction: column;
    }

    .notes h1 {
        font-size: 70px;
        font-family: 'Karla', sans-serif;
        font-weight: bolder;
    }

    .trustpilot {
        width: 20%;
        height: auto;
        position: relative;
        top: -20px;
    }

    .stars {
        width: 70%;
        height: auto;
    }

    .deuxavis {
        display: flex;
        justify-content: space-between;
        margin-top: 70px;
    }

    .avis-gauche {
        margin-left: 30px;
        background-color: #2B8C52;
        width: 35%;
        padding: 20px;
        border-radius: 15px;
    }

    .avis-gauche-texte {
        font-family: 'Karla', sans-serif;
        font-size: 20px;
        color: white;
        font-weight: bold;
    }

    .deuxavis img {
        width: 100px;
    }

    .avis-droite {
        margin-right: 30px;
        background-color: #2B8C52;
        width: 35%;
        padding: 20px;
        border-radius: 15px;
    }

    .avis-droite-texte {
        font-family: 'Karla', sans-serif;
        font-size: 20px;
        color: white;
        font-weight: bold;
    }

    .avis-gauche-note-container {
        display: flex;
        height: 30px;
    }

    .avis-gauche-note-container p {
        position: relative;
        top: 2px;
        left: 10px;
        color: white;
    }


    .avis-droite-note-container {
        display: flex;
        height: 30px;
    }

    .avis-droite-note-container p {
        position: relative;
        top: 2px;
        left: 10px;
        color: white;
    }

    .pre-footer {
        margin-top: 40px;
        width: 100%;
        background-color: #F9F9F9;
        display: flex;
        text-align: center;
        align-items: center;
        justify-content: center;
        height: 100px;
    }

    .packs {
        background-color: #000F98;
        width: 210px;
        height: 50px;
        display: flex;
        align-items: center;
        text-align: center;
        justify-content: center;
        border-radius: 40px;
        padding-left: 15px;
        padding-right: 15px;
    }

    .packs a {
        color: white;
        text-decoration: none;
        font-family: 'Karla', sans-serif;
        font-weight: bold;
    }

    @media screen and (max-width:1250px) {
        .notes h1 {
            font-size: 60px;
        }
    }

    @media screen and (max-width:1100px) {
        .notes h1 {
            font-size: 50px;
        }
    }

    @media screen and (max-width:900px) {
        .notes h1 {
            font-size: 40px;
        }
    }

    @media screen and (max-width:700px) {
        .banner-first-row {
            margin-top: 0px;
            flex-direction: column;
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .banner-first-row .h1 {
            height: 100px;
            width: 100%;
            display: flex;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .banner-first-row .img {
            height: 150px;
            width: 100%;
            top: 0px;
            margin-bottom: 10px;
        }

        .banner-first-row img {
            width: 150px;
        }

        .banner-first-row h1 {
            font-size: 28px;
            top: 0px;
        }

        .banner-second-row h2 {
            font-size: 22px;
        }

        .notes h1 {
            font-size: 30px;
        }

        .avis-droite-texte {
            font-size: 15px;
        }

        .avis-gauche-texte {
            font-size: 15px;
        }

        .avis-droite-note-container {
            flex-direction: column;
            margin-bottom: 10px;
        }

        .avis-droite-note-container p {
            left: 0;
        }

        .avis-gauche-note-container p {
            left: 0;
        }

        .avis-gauche-note-container {
            flex-direction: column;
        }
    }

    @media screen and (max-width:490px) {
        .avis-droite {
            margin-right: 0px;
            width: 48%;
        }

        .avis-gauche {
            margin-left: 0px;
            width: 48%;
        }

        .avis-droite-note-container {
            position: relative;
            top: 0px;

        }

        @media screen and (max-width:400px) {

            .banner-first-row .img {
                height: 70px;
                width: 100%;
                top: 0px;
                margin-bottom: 10px;
            }

            .banner-first-row img {
                width: 70px;
            }

            .avis-droite {
                margin-right: 0px;
                width: 48%;
            }

            .avis-gauche {
                margin-left: 0px;
                width: 48%;
            }

            .avis-droite-note-container {
                position: relative;
                top: 24px;
                margin-bottom: 30px;
            }
        }
    }
</style>