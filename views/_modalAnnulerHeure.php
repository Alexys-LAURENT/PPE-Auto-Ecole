<!-- Modal Annuler Heure -->
<div class="modal fade" id="modalAnnulerHeure" tabindex="-1" aria-labelledby="modalAnnulerHeure" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Annuler une heure de conduite</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="FormAnnulerHeure" action="" method="POST">
            <select name="motif" id="">
                <option value="1">L'élève ne s'est pas présenter</option>
                <option value="1">Le moniteur ne s'est pas présenter</option>
                <option value="1">Accident / véhicule déféctueux</option>
                <option value="1">Autre</option>
            </select>
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button id="BtnAnnulerHeure" type="button" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>



<script>
    document.getElementById("BtnAnnulerHeure").addEventListener("click", function(){
        document.getElementById("FormAnnulerHeure").submit();
    });
</script>