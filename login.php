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
                    <a href="#">Forgot your password ?</a> <br>
                    <button type="submit" name="SeConnecter" value="SeConnecter">Se connecter</button>
                </center>
            </form>
        </div>
        <div class="slide-panel">

        </div>
    </div>
</body>

</html>