<?php
if (!isset($_SESSION['User'])) {
    header("Location: index.php?page=0");
}

$date = date("d M Y", strtotime($_SESSION['User']['dateinscrip_e']));

?>

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
    $default = "https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_960_720.png";

    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($_SESSION['User']['email_e']))) . "?d=" . urlencode($default);
    require_once("views/_navbar.php");
    ?>
    <div class="body d-flex justify-content-center">
        <div class="main">
            <div class="profil-container">
                <div class="profil-img">
                    <img class="rounded-circle" src="<?php echo $grav_url; ?>" alt="">
                </div>
                <div class="profil-name">
                    <p class="nom-prenom"><?php echo $_SESSION['User']['nom_e'] . ' ' . $_SESSION['User']['prenom_e'] ?></p>
                    <p class="date-inscri">Inscrit depuis le <?php echo $date ?></p>
                    <button class="btn-reset-password">Reset password</button>
                </div>
            </div>

            <div class="infos-container">
                <div class="ligne">
                    <div class="label">
                        <p>Full Name</p>
                    </div>
                    <div class="value">
                        <p><?php echo $_SESSION['User']['nom_e'] . ' ' . $_SESSION['User']['prenom_e'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Email</p>
                    </div>
                    <div class="value">
                        <p><?php echo $_SESSION['User']['email_e'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Téléphone</p>
                    </div>
                    <div class="value">
                        <p><?php echo $_SESSION['User']['tel_e'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Adresse</p>
                    </div>
                    <div class="value">
                        <p><?php echo $_SESSION['User']['adresse_e'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Ville</p>
                    </div>
                    <div class="value">
                        <p><?php echo $_SESSION['User']['ville_e'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Code Postal</p>
                    </div>
                    <div class="value">
                        <p><?php echo $_SESSION['User']['codepos_e'] ?></p>
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