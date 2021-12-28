<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-warning"> Bienvenue dans ta page de profil,<?= $visiteurProfil['login'] ?></h1>

<div>
    <div>
        <img src="<?= URL ?>public/Assets/images/<?= $visiteur['image'] ?>" width="100px" alt="photo de profil" />
    </div>
    <form>

    </form>
</div>
<div id="email">
    Email : <?= $visiteurProfil['email'] ?>
</div>