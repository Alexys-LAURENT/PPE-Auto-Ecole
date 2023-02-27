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
            <select name="motif" id="selectMotif">
                <option value="L'élève ne s'est pas présenter">L'élève ne s'est pas présenter</option>
                <option value="Le moniteur ne s'est pas présenter">Le moniteur ne s'est pas présenter</option>
                <option value="Accident / véhicule déféctueux">Accident / véhicule déféctueux</option>
                <option value="Autre">Autre</option>
            </select>
            <input type="text" class="form-control" name="motifAutre" placeholder="Autre motif" id="inputAutre">
        </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button id="BtnAnnulerHeure" type="button" class="btn btn-primary">Valider</button>
      </div>
    </div>
  </div>
</div>

<style>
    #inputAutre{
        display: none;
    }
</style>


<script>
    document.getElementById("BtnAnnulerHeure").addEventListener("click", function(){
        document.getElementById("FormAnnulerHeure").submit();
    });

    document.getElementById("selectMotif").addEventListener("change", function(){
        if(this.value == "Autre"){
            document.getElementById("inputAutre").style.display = "block";
        }else{
            document.getElementById("inputAutre").style.display = "none";
            document.getElementById("inputAutre").value = "";
        }
    });
</script>