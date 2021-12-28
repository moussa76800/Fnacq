<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Modification du mot de passe - <?= $_SESSION['profil']['login']?></h1>


<form method="POST" action="<?=URL ?>compte/validation_modificationPassword">

    <div class="mb-3">
            <label for="oldPassword" class="form-label"> OLD PASSWORD</label>
            <input type="password" class="form-control" id="oldPassword" name="oldPassword" required >
        </div>

        <div class="mb-3">
            <label for="newPassword" class="form-label">NEW PASSWORD</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required >
        </div>
        <div class="mb-3">
            <label for="confirmNewPassword" class="form-label">CONFIRM PASSWORD</label>
            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" required >
        </div>
        <div class="alert alert-danger d-none" id="erreur">
            Les mots de passes ne sont pas identiques !!!!
        </div>

        
        <button type="reset" class="btn btn-primary">REINITIALISER LE FORMULAIRE</button>
        <button type="submit" class="btn btn-primary" id="btnPass" disabled> VALIDER</button>
</form>