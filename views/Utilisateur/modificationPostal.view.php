<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Modification du Code Postal - <?= $_SESSION['profil']['login']?></h1>


<form method="POST" action="<?=URL ?>compte/validation_modificationCodePostal">

    <div class="mb-3">
            <label for="oldPostal" class="form-label"> OLD POSTAL</label>
            <input type="int" class="form-control" id="oldPostal" name="oldPostal" required >
        </div>

        <div class="mb-3">
            <label for="newPostal" class="form-label">NEW POSTAL</label>
            <input type="int" class="form-control" id="newPostal" name="newPostal" required >
        </div>
        <div class="alert alert-danger d-none" id="erreur">
            Les codes postales sont identiques,pourquoi changer !!!!
        </div>
        
        
        <button type="reset" class="btn btn-primary">REINITIALISER LE FORMULAIRE</button>
        <button type="submit" class="btn btn-primary" id="btnPass" disabled> VALIDER</button>
</form>