<?php
if (isset($_SESSION['User']) && $_SESSION['User'] != null) {
    $profil = array(
        "nom" => $_SESSION['User']['nom_e'],
        "prenom" => $_SESSION['User']['prenom_e'],
        "email" => $_SESSION['User']['email_e'],
        "tel" => $_SESSION['User']['tel_e'],
        "adresse" => $_SESSION['User']['adresse_e'],
        "ville" => $_SESSION['User']['ville_e'],
        "codepostal" => $_SESSION['User']['codepos_e'],
        "dateprofil" => $_SESSION['User']['dateinscrip_e'],
        "id" => $_SESSION['User']['id_e'],
    );
} elseif (isset($_SESSION['Moniteur']) && $_SESSION['Moniteur'] != null) {
    $profil = array(
        "nom" => $_SESSION['Moniteur']['nom_m'],
        "prenom" => $_SESSION['Moniteur']['prenom_m'],
        "email" => $_SESSION['Moniteur']['email_m'],
        "tel" => $_SESSION['Moniteur']['tel_m'],
        "adresse" => $_SESSION['Moniteur']['adresse_m'],
        "ville" => $_SESSION['Moniteur']['ville_m'],
        "codepostal" => $_SESSION['Moniteur']['codpos_m'],
        "dateprofil" => $_SESSION['Moniteur']['dateembauche_m'],
        "id" => $_SESSION['Moniteur']['id_m'],
    );
} else {
    header("Location: index.php?page=0");
}

$date = date("d M Y", strtotime($profil['dateprofil']));

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

    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($profil['email']))) . "?d=" . urlencode($default);
    require_once("views/_navbar.php");
    ?>
    <div class="body d-flex justify-content-center">
        <div class="main">
            <div class="profil-container">
                <div class="profil-img">
                    <img class="rounded-circle" src="<?php echo $grav_url; ?>" alt="">
                </div>
                <div class="profil-name">
                    <p class="nom-prenom"><?php echo $profil['nom'] . ' ' . $profil['prenom'] ?></p>
                    <p class="date-inscri">Actif depuis le <?php echo $date ?></p>
                    <button class="btn-reset-password">Reset password</button>
                </div>
            </div>

            <div class="infos-container">
                <div class="ligne">
                    <div class="label">
                        <p>Nom Complet</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['nom'] . ' ' . $profil['prenom'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Email</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['email'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Téléphone</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['tel'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Adresse</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['adresse'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Ville</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['ville'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Code Postal</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['codepostal'] ?></p>
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