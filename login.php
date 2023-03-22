<?php

if (isset($_POST['btnResetPassword'])) {
  $email = $_POST['email_reset'];
  $questionSecrete = $unControleur->selectWhere("user", "email_u", $email)['security_question'];
  $reponseSecrete = $unControleur->selectWhere("user", "email_u", $email)['security_answer'];


  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Adresse email invalide";
    exit;
  }


  if ($_POST['security_answer'] !== $reponseSecrete) {
    echo "Réponse de sécurité incorrecte";
    exit;
  }


  $nouveauMotDePasse = $_POST['new_password'];
  $unControleur->setTable("user");
  $tab = array("mdp_u" => $nouveauMotDePasse);
  $unControleur->update($tab, "email_u", $email);

  echo "Mot de passe mis à jour avec succès";
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

        <form action="" method="post" id="formPasswordReset">

          <input type="hidden" name="currentStep" id="currentStep" value="1">



          <div id="step1">

            <p><strong>Veuillez entrer votre adresse email pour réinitialiser votre mot de passe :</strong></p>

            <div class="form-group">

              <label for="email">Email :</label>

              <input type="email" class="form-email-control" id="email_reset" name="email_reset">

            </div>

          </div>



          <div id="step2" style="display: none;">

            <p>Veuillez répondre à votre question de sécurité :</p>

            <div class="form-group">

              <label for="security_answer">Question :</label>

              <select name="Reset_security_question" id="Reset_security_question">

                <option value="Quelle est votre couleur préférée ?">Quel est votre couleur préférée ?</option>

                <option value="Quel est votre genre de film préféré ?">Quel est votre genre de film préféré ?</option>

                <option value="Quel est votre livre préféré?">Quel est votre livre préféré?</option>

                <option value="Dans quelle ville êtes-vous né ?">Dans quelle ville êtes-vous né ?</option>

                <option value="Quelle était ta nourriture préférée étant enfant ?">Quelle était votre nourriture préférée étant enfant ?</option>

              </select>

              <input type="text" class="form-answer-control" id="Reset_security_answer" name="Reset_security_answer">

            </div>

          </div>



          <div id="step3" style="display: none;">

            <p>Veuillez choisir un nouveau mot de passe :</p>

            <div class="form-group">

              <label for="new_password">Nouveau mot de passe :</label>

              <input type="password" class="form-mdp-control" id="new_password" name="new_password">

            </div>

            <div class="form-group">

              <label for="confirm_password">Confirmer le nouveau mot de passe :</label>

              <input type="password" class="form-mdp-control" id="confirm_password" name="confirm_password">

            </div>

          </div>



          <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

            <button type="button" class="btn btn-primary" id="btnNextStep" name="btnNextStep">Suivant</button>

            <button type="submit" class="btn btn-primary" id="btnResetPassword" name="btnResetPassword" style="display: none;">Réinitialiser</button>

          </div>

        </form>

      </div>

    </div>

  </div>

</div>

<script src="./Js/Sign_in.js"></script>

</body>



</html>



<script>
  if (window.history.replaceState) {

    window.history.replaceState(null, null, window.location.href);

  }
</script>