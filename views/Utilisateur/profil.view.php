<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Bienvenue dans ta page de profil,<?= $utilisateurProfil['login'] ?></h1>

<div id="email">
    Email : <?= $utilisateurProfil['email'] ?>
</div>

<div>
    <a href="<?= URL ?>compte/modificationPassword" class="btn btn-warning">Changer le mot de passe</a>
    <button id="btnSupCompte" class="btn btn-danger">Supprimer son compte</button>
</div>

<div id="suppCompte" class="d-none m-2">
    <div class="alert alert-danger">
        Veuillez confirmer la suppression du compte.
        <br />
        <a href=" <?= URL ?>compte/suppressionCompte" class="btn btn-danger">Je Souhaite supprimer mon compte définitivement !</a>
    </div>
</div>