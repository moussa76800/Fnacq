<<<<<<< HEAD


<div class="text-center">
=======
<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-dark">Profil de </h1>
 </h1>
   




<div style="background: white ; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px; margin-top: 20px">

    <table class="table text-center">
        <tr class="table-info">
            <th style="font-weight: bold">EMAIL</th>
            <th style="font-weight: bold">IMAGE</th>
            <th style="font-weight: bold">NOM</th>
            <th style="font-weight: bold">PRENOM</th>
            <th style="font-weight: bold">ADRESSE</th>
            <th style="font-weight: bold">CODE POSTAL</th>
            <th style="font-weight: bold">DATE DE NAISSANCE</th>
        </tr>


        <?php

        for ($i = 0; $i < count($profil); $i++) : ?>



            <tr>

                <td class="align-middle"><?= $profil[$i]['email'] ?></td>
                <td class="align-middle"><?= $profil[$i]['image'] ?></td>
                <td class="align-middle"><?= $profil[$i]['nom'] ?></td>
                <td class="align-middle"><?= $profil[$i]['prenom'] ?></td>
                <td class="align-middle"><?= $profil[$i]['adresse'] ?></td>
                <td class="align-middle"><?= $profil[$i]['code_postal'] ?></td>
                <td class="align-middle"><?= $profil[$i]['date_de_naissance'] ?></td>
</div>
</tr>
<?php endfor;
?>
</table>

</div>
<!-- <div class="text-center">
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
 
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Bienvenue dans ta page de profil,<?= $utilisateur[0]['login'] ?></h1>

    <div>
        <div>
            <img src="<?= URL; ?>public/Assets/images/<?= $utilisateur[0]['image'] ?>" width="100px" alt="photo de profil" />
        </div>
        <form method="POST" action="<?= URL ?>compte/validation_modificationImage" enctype="multipart/form-data">
            <label for="image">Changer l'image du profil :</label><br>
            <br>
            <input type="file" class="form-control-file" id="image" name="image" onchange="submit();" />
        </form>
    </div>
    <br>
    <div id="email">
        Email : <?= $utilisateur[0]['email'] ?>
        <button class="btn btn-primary" id="btnModifMail">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
        </svg>
    </button>
    </div>
    <div id="modificationMail" class="d-none">
    <form method="POST" action="<?= URL; ?>compte/validation_modificationMail">
        <div class="row">
            <label for="email" class="col-2 col-form-label">Email :</label>
            <div class="col-8">
                <input type="mail" class="form-control" name="email" value="<?= $utilisateur[0]['email'] ?>" />
            </div>
            <div class="col-2">
                <button class="btn btn-success" id="btnValidModifMail" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>
    <br>
    <div>
        <a href="<?= URL ?>compte/modificationPostal" class="btn btn-warning">Changer le code postal</a>
        <a href="<?= URL ?>compte/modificationPassword" class="btn btn-warning">Changer le mot de passe</a>
        <a href="<?= URL ?>compte/ validation_suppressionCompte" class="btn btn-danger">Supprimer son compte</a>

    </div>
<<<<<<< HEAD
</div>



        
=======
</div> -->
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
