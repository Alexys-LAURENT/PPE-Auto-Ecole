<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="conteneur" id="conteneur">

    <div class="form-conteneur register-conteneur">
      <form action="#">
        <h1>Register hire.</h1>
        <div class="rowInputs">
          <input type="text" placeholder="Nom" name="nom">
          <input type="text" placeholder="Prénom" name="prenom">
        </div>
        <select name="sexe" id="">
          <option value="">Sexe</option>
          <option value="M">Homme</option>
          <option value="F">Femme</option>
        </select>
        <input type="text" placeholder="Adresse" name="adr">
        <div class="rowInputs">
          <input type="text" placeholder="Ville" name="ville">
          <input type="text" placeholder="Code postal" name="cp">
        </div>
        <div class="rowInputs">
          <input type="text" placeholder="Téléphone" name="tel" maxlength="10">
          <input type="date" placeholder="" name="date">
        </div>
        <input type="email" placeholder="Email" name="email">
        <input type="password" placeholder="Mot de passe" name="mdp">
        <div class="rowInputs">
          <select name="security_question" id="">
            <option value="">Question de sécurité</option>
            <option value="Quelle est votre couleur préférée ?">Quel est votre couleur préférée ?</option>
            <option value="Quel est votre genre de film préféré ?">Quel est votre genre de film préféré ?</option>
            <option value="Quel est votre livre préféré?">Quel est votre livre préféré?</option>
            <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>
            <option value="Quelle était ta nourriture préférée étant enfant ?">Quelle était votre nourriture préférée étant enfant ?</option>
          </select>
          <input type="text" placeholder="Réponse de sécurité" name="security_answer">
        </div>
        <button type="submit" name="Register" value="Register">S'inscrire</button>
      </form>
    </div>

    <div class="form-conteneur login-conteneur">
      <form action="#">
        <h1>Login hire.</h1>
        <input type="email" placeholder="Email">
        <input type="password" placeholder="Password">
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" name="checkbox" id="checkbox">
            <label>Remember me</label>
          </div>
          <div class="pass-link">
            <a href="#">Forgot password?</a>
          </div>
        </div>
        <button>Login</button>
      </form>
    </div>

    <div class="overlay-conteneur">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1 class="title">Hello <br> friends</h1>
          <p>if Yout have an account, login here and have fun</p>
          <button class="ghost" id="login">Login
            <i class="lni lni-arrow-left login"></i>
          </button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1 class="title">Start yout <br> journy now</h1>
          <p>if you don't have an account yet, join us and start your journey.</p>
          <button class="ghost" id="register">Register
            <i class="lni lni-arrow-right register"></i>
          </button>
        </div>
      </div>
    </div>

  </div>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins");

    * {
      box-sizing: border-box;
    }

    .rowInputs {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .rowInputs input,
    .rowInputs select {
      width: 48%;
    }

    body {
      background-color: #f6f5f7;
      font-family: "Poppins", sans-serif;
      overflow: hidden;
      height: 100vh;
      margin: 0px;
    }

    h1 {
      font-weight: 700;
      letter-spacing: -1.5px;
      margin: 0;
      margin-bottom: 15px;
    }

    h1.title {
      font-size: 45px;
      line-height: 45px;
      margin: 0;
      text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
    }

    p {
      font-size: 14px;
      font-weight: 100;
      line-height: 20px;
      letter-spacing: 0.5px;
      margin: 20px 0 30px;
      text-shadow: 0 0 10px rgba(16, 64, 74, 0.5);
    }

    span {
      font-size: 14px;
      margin-top: 25px;
    }

    a {
      color: #333;
      font-size: 14px;
      text-decoration: none;
      margin: 15px 0;
      transition: 0.3s ease-in-out;
    }

    a:hover {
      color: #4bb6b7;
    }

    .content {
      display: flex;
      width: 100%;
      height: 50px;
      align-items: center;
      justify-content: space-around;
    }

    .content .checkbox {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .content input {
      accent-color: #333;
      width: 12px;
      height: 12px;
    }

    .content label {
      font-size: 14px;
      user-select: none;
      padding-left: 5px;
    }

    button {
      position: relative;
      border-radius: 20px;
      border: 1px solid #4bb6b7;
      background-color: #4bb6b7;
      color: #fff;
      font-size: 15px;
      font-weight: 700;
      margin: 10px;
      padding: 12px 80px;
      letter-spacing: 1px;
      text-transform: capitalize;
      transition: 0.3s ease-in-out;
    }

    button:hover {
      letter-spacing: 3px;
    }

    button:active {
      transform: scale(0.95);
    }

    button:focus {
      outline: none;
    }

    button.ghost {
      background-color: rgba(225, 225, 225, 0.2);
      border: 2px solid #fff;
      color: #fff;
    }

    button.ghost i {
      position: absolute;
      opacity: 0;
      transition: 0.3s ease-in-out;
    }

    button.ghost i.register {
      right: 70px;
    }

    button.ghost i.login {
      left: 70px;
    }

    button.ghost:hover i.register {
      right: 40px;
      opacity: 1;
    }

    button.ghost:hover i.login {
      left: 40px;
      opacity: 1;
    }

    form {
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 100px;
      height: 100%;
      text-align: center;
    }

    input,
    select {
      background-color: #eee;
      border-radius: 7px;
      border: none;
      padding: 8px 15px;
      margin: 8px 0;
      width: 100%;
      outline: none;
      color: #757575;
    }

    select {
      display: block;
      width: 100%;
      padding: .375rem 2.25rem .375rem .75rem;
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
      background-repeat: no-repeat;
      background-position: right .75rem center;
      background-size: 16px 12px;
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    input:focus,
    select:focus {
      outline: 2px solid rgba(0, 0, 0, 0.3);
    }

    select {
      cursor: pointer;
    }

    .conteneur {
      background-color: #fff;
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
      position: relative;
      overflow: hidden;
      height: 100vh;
    }

    .form-conteneur {
      position: absolute;
      top: 0;
      height: 100%;
      transition: all 0.6s ease-in-out;
    }

    .login-conteneur {
      left: 0;
      width: 50%;
      z-index: 2;
    }

    .conteneur.right-panel-active .login-conteneur {
      transform: translateX(100%);
    }

    .register-conteneur {
      left: 0;
      width: 50%;
      opacity: 0;
      z-index: 1;
    }

    .conteneur.right-panel-active .register-conteneur {
      transform: translateX(100%);
      opacity: 1;
      z-index: 5;
      animation: show 0.6s;
    }

    @keyframes show {

      0%,
      49.99% {
        opacity: 0;
        z-index: 1;
      }

      50%,
      100% {
        opacity: 1;
        z-index: 5;
      }
    }

    .overlay-conteneur {
      position: absolute;
      top: 0;
      left: 50%;
      width: 50%;
      height: 100%;
      overflow: hidden;
      transition: transform 0.6s ease-in-out;
      z-index: 100;
    }

    .conteneur.right-panel-active .overlay-conteneur {
      transform: translate(-100%);
    }

    .overlay {
      background-color: #2b8c52;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: 0 0;
      color: #fff;
      position: relative;
      left: -100%;
      height: 100%;
      width: 200%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay::before {
      content: "";
      position: absolute;
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      background: linear-gradient(to top,
          rgba(46, 94, 109, 0.4) 40%,
          rgba(46, 94, 109, 0));
    }

    .conteneur.right-panel-active .overlay {
      transform: translateX(50%);
    }

    .overlay-panel {
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      padding: 0 40px;
      text-align: center;
      top: 0;
      height: 100%;
      width: 50%;
      transform: translateX(0);
      transition: transform 0.6s ease-in-out;
    }

    .overlay-left {
      transform: translateX(-20%);
    }

    .conteneur.right-panel-active .overlay-left {
      transform: translateX(0);
    }

    .overlay-right {
      right: 0;
      transform: translateX(0);
    }

    .conteneur.right-panel-active .overlay-right {
      transform: translateX(20%);
    }

    .social-conteneur {
      margin: 20px 0;
    }

    .social-conteneur a {
      border: 1px solid #dddddd;
      border-radius: 50%;
      display: inline-flex;
      justify-content: center;
      align-items: center;
      margin: 0 5px;
      height: 40px;
      width: 40px;
      transition: 0.3s ease-in-out;
    }

    .social-conteneur a:hover {
      border: 1px solid #4bb6b7;
    }
  </style>

  <script>
    const registerButton = document.getElementById("register");
    const loginButton = document.getElementById("login");
    const conteneur = document.getElementById("conteneur");

    registerButton.addEventListener("click", () => {
      conteneur.classList.add("right-panel-active");

    });

    loginButton.addEventListener("click", () => {
      conteneur.classList.remove("right-panel-active");
    });
  </script>

</body>

</html>