<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil | Val'auto</title>
    <link rel="stylesheet" href="./css/profil.css">
</head>

<body>
    <?php
    require_once("views/_navbar.php");
    ?>
    <div class="body d-flex justify-content-center">
        <div class="main">
            <div class="profil-container">
                <div class="profil-img">
                    <img src="./images/profil-img.png" alt="">
                </div>
                <div class="profil-name">
                    <p class="nom-prenom">Nom Prénom</p>
                    <p class="date-inscri">Inscrit depuis le XX</p>
                    <button class="btn-reset-password">Reset password</button>
                </div>
            </div>

            <div class="infos-container">
                <div class="ligne">
                    <div class="label">
                        <p>Full Name</p>
                    </div>
                    <div class="value">
                        <p>Nom Prénom</p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Email</p>
                    </div>
                    <div class="value">
                        <p>fip@gmail.com</p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Téléphone</p>
                    </div>
                    <div class="value">
                        <p>+(33)631254993</p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Adresse</p>
                    </div>
                    <div class="value">
                        <p>36 bis route de claye</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require_once("views/_footer.php");
    ?>
</body>

</html>