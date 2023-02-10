<?php
if (isset($_SESSION['User']) && $_SESSION['User'] != null) {
    $profil = array(
        "nom" => $_SESSION['User']['NOM_U'],
        "prenom" => $_SESSION['User']['PRENOM_U'],
        "email" => $_SESSION['User']['EMAIL_U'],
        "tel" => $_SESSION['User']['TEL_U'],
        "adresse" => $_SESSION['User']['ADRESSE_U'],
        "ville" => $_SESSION['User']['VILLE_U'],
        "codepostal" => $_SESSION['User']['CODEPOS_U'],
        "dateprofil" => $_SESSION['User']['DATEINSCRIPTION_U'],
        "id" => $_SESSION['User']['ID_U'],
    );
} elseif (isset($_SESSION['Moniteur']) && $_SESSION['Moniteur'] != null) {
    $profil = array(
        "nom" => $_SESSION['Moniteur']['NOM_U'],
        "prenom" => $_SESSION['Moniteur']['PRENOM_U'],
        "email" => $_SESSION['Moniteur']['EMAIL_U'],
        "tel" => $_SESSION['Moniteur']['TEL_U'],
        "adresse" => $_SESSION['Moniteur']['ADRESSE_U'],
        "ville" => $_SESSION['Moniteur']['VILLE_U'],
        "codepostal" => $_SESSION['Moniteur']['CODEPOS_U'],
        "dateprofil" => $_SESSION['Moniteur']['DATEEMBAUCHE_U'],
        "id" => $_SESSION['Moniteur']['ID_U'],
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
                    <button class="btn-reset-password" data-bs-toggle="modal" data-bs-target="#exampleModal">Reset password</button>
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
    if (isset($_POST['userPasswordReset'])) {
        if (empty($_POST['old_password']) || empty($_POST['new_password'])) {
            echo "<div class='col-md-3 alert alert-danger'>L'ancien et le nouveau mot de passe sont obligatoires.<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
            <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
            </svg> </span> </div>";
        } else {
            $unControleur->setTable("eleve");
            $old_password = $_POST['old_password'];
            $new_password = $_POST['new_password'];
            $currentPassword = $_SESSION['User']['mdp_e'];
            if ($old_password != $currentPassword) {
                echo "<div class='col-md-3 alert alert-danger'>Ancien mot de passe est incorrect.<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                </svg> </span> </div>";
            } else {
                $tab = array("mdp_e" => $new_password);
                $unControleur->update($tab, 'id_e', $_SESSION['User']['id_e']);
                $_SESSION['User'] = $unControleur->verifConnection($_SESSION['User']['email_e'], $new_password);
                echo "<div class='col-md-3 alert alert-success'>Votre mot de passe a été modifié avec succes !<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                </svg> </span> </div>";
            }
        }
    }
    ?>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Réinitialisation du mot de passe</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Ancien mot de passe" aria-label="Ancien mot de passe" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">
                                    <svg id="old_eye" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                    <svg id="old_eye_slash" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                    </svg></button>

                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Nouveau mot de passe" aria-label="Nouveau mot de passe" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="myFunction2()">
                                    <svg id="old_eye2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>
                                    <svg id="old_eye_slash2" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                    </svg></button>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="Close" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="Submit" class="btn btn-primary" id="userPasswordReset" name="userPasswordReset">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    require_once("views/_footer.php");
    ?>
</body>
<script src="./Js/profil.js"></script>

</html>