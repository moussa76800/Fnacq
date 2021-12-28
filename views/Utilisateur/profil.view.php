<div class="text-center">
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Bienvenue dans ta page de profil,<?= $utilisateur['login'] ?></h1>

    <div>
        <div>
            <img src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>" width="100px" alt="photo de profil" />
        </div>
        <form method="POST" action="<?= URL ?>compte/validation_modificationImage" enctype="multipart/form-data">
            <label for="image">Changer l'image du profil :</label><br>
            <br>
            <input type="file" class="form-control-file" id="image" name="image" onchange="submit();" />
        </form>
    </div>
    <br>
    <div id="email">
        Email : <?= $utilisateur['email'] ?>
    </div>
    <br>
    <div>
        <a href="<?= URL ?>compte/modificationPostal" class="btn btn-warning">Changer le code postal</a>
        <a href="<?= URL ?>compte/modificationPassword" class="btn btn-warning">Changer le mot de passe</a>
        <a href="<?= URL ?>compte/ validation_suppressionCompte" class="btn btn-danger">Supprimer son compte</a>

    </div>
</div>