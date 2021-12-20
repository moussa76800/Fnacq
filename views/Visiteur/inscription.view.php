<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">PAGE D'INSCRIPTION</h1>
<br>
<br>


<form method="POST" action="validation_inscription">
    <div class="mb-3">
        <label for="login" class="form-label">LOGIN</label>
        <input type="text" class="form-control" id="login" name="login">

        <div class="mb-3">
            <label for="password" class="form-label">PASSWORD</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">EMAIL</label>
            <input type="mail" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="nom" class="form-label">NOM</label>
            <input type="text" class="form-control" id="nom" name="nom">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">PRENOM</label>
            <input type="text" class="form-control" id="prenom" name="prenom">
        </div>
        <div class="mb-3">
            <label for="adresse" class="form-label">ADRESSE</label>
            <input type="text" class="form-control" id="adresse" name="adresse">
        </div>
        <div class="mb-3">
            <label for="code_postal" class="form-label">CODE POSTAL</label>
            <input type="int" class="form-control" id="code_postal" name="code_postal">
        </div>
        <div class="mb-3">
            <label for="date_de_naissance" class="form-label">DATE DE NAISSANCE</label>
            <input type="date" class="form-control" id="date_de_naissance" name="date_de_naissance">
        </div>


        <button type="reset" class="btn btn-primary">REINITIALISER LE FORMULAIRE</button>
        <button type="submit" class="btn btn-primary">INSCRIPTION</button>
</form>