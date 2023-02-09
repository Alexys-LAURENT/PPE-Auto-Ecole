<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/Sign_In_style.css">
    <title>Register/Login</title>
    <script src="./Js/Sign_in.js"></script>
</head>

<body>
    <div id="container">
        <div class="back">
            <a href="index.php?page=0">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg>
            </a>
        </div>
        <div class="gauche">
            <center>
                <img src="Val'auto.png" alt="">
                <h1>Bon retour !</h1>
                <p>Pour vous connecter, rentrez vos informations de connexion</p>
                <button id="change" onclick="myFun()">Se connecter</button><br><br>
            </center>
        </div>
        <div class="gauche-droite">
            <form action="" method="POST">
                <center>
                    <h1>Créez votre compte</h1>
                    <p>remplissez les informations nécéssaires</p>
                    <input type="text" placeholder="Nom" name="nom"><br>
                    <input type="text" placeholder="Prénom" name="prenom"><br>
                    <input type="email" placeholder="Email" name="email"><br>
                    <input type="text" placeholder="adresse" name="adr"><br>
                    <input type="text" placeholder="ville" name="ville"><br>
                    <input type="text" placeholder="code postal" name="cp"><br>
                    <input type="text" placeholder="Téléphone" name="tel" maxlength="10"><br>
                    <input type="date" placeholder="Name" name="date"><br>
                    <input type="password" placeholder="Password" name="mdp"><br>
                    <select name="sexe" id="">
                        <option value="M">Homme</option>
                        <option value="F">Femme</option>
                    </select> <br>
                    <select name="security_question" id="">
                        <option value="Quelle est votre couleur préférée ?">Quel est votre couleur préférée ?</option>
                        <option value="Quel est votre genre de film préféré ?">Quel est votre genre de film préféré ?</option>
                        <option value="Quel est votre livre préféré?">Quel est votre livre préféré?</option>
                        <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>
                        <option name =" "value="Quelle était ta nourriture préférée étant enfant ?">Quelle était ta nourriture préférée étant enfant ?</option>
                    </select> <br>
                    <input type="text" placeholder="Security Answer" name="security_answer"><br>
                    <button type="submit" name="Register" value="Register">S'inscrire</button>
                </center>
            </form>
        </div>
        <div class="droite">
            <center>
                <img class="img-droite" src="Val'auto.png" alt="">
                <h1>Bonjour !</h1>
                <p>Entrez vos informations personnel pour créer un compte chez nous</p>
                <button id="change" onclick="lafun()">S'inscrire</button>
            </center>
        </div>
        <div class="droite-gauche">
            <form action="" method="POST">
                <center>
                    <h1>Connectez-vous</h1>
                    <p class="p_droite_gauche">utilisez votre email et mot de passe</p>
                    <input type="text" placeholder="Email" name="email"><br>
                    <input class='password' type="password" placeholder="Password" name="mdp"><br>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Mot de passe oublié ?</a> <br>
                    <button type="submit" name="SeConnecter" value="SeConnecter">Se connecter</button>
                </center>
            </form>
        </div>
        <div class="slide-panel">

        </div>
    </div>

    <?php
    if (isset($_POST['userPasswordModify'])) {
        $email = $_POST['email'];
        $security_question = $_POST['security_question'];
        $security_answer = $_POST['security_answer'];
        $password = $_POST['mdp'];
    
        $eleve = $controller->selectWhere("eleve", "email", $email);
    
        if ($eleve) {
            if ($security_question == $eleve['security_question'] && $security_answer == $eleve['security_answer']) {
                $data = [
                    "password" => password_hash($password, PASSWORD_BCRYPT)
                ];
                $controller->update("eleve", "email", $email, $data);
                echo 'Votre mot de passe a été modifié avec succès !';

            } else {
                echo 'votre question de sécurité & réponse est incorrect !';
            }
        } else {
            echo 'Votre email est incorrect !';
        }
    }
    ?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Mot de passe oublié ?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
      <div class="input-group mb-3">
        <input type="email" class="form-email-reset" id="email" name="email" placeholder="Email" aria-label="Email" aria-describedby="basic-addon2" required>
        <div class="input-group-append">
      </div>
</br>
      <select name="security_question" id="">
                        <option value="Quelle est votre couleur préférée ?">Quel est votre couleur préférée ?</option>
                        <option value="Quel est votre genre de film préféré ?">Quel est votre genre de film préféré ?</option>
                        <option value="Quel est votre livre préféré?">Quel est votre livre préféré?</option>
                        <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>
                        <option value="Quelle était ta nourriture préférée étant enfant ?">Quelle était ta nourriture préférée étant enfant ?</option>
                    </select> 
</br>
        <input type="text" placeholder="Security Answer" name="security_answer">
</br>
<br>
<div class="input-group mb-3">
    <br>
        <input type="password" class="form-password-reset mb-2" id="password" name="mdp" placeholder="Mot de passe" aria-label="Mot de passe" aria-describedby="basic-addon2" required>
        <div class="input-group-append">
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary" id="userPasswordModify" name="userPasswordModify">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>

<style>
</style>

</body>

</html>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>