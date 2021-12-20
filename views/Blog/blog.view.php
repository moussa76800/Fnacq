

<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">BIENVENUE DANS LE BLOG</h1>
<br>



<TITLE>Le blog</TITLE>

<form method="POST" action="<?= URL ?>blog">

    <div class="mb-3">
        <label for="user" class="form-label">Pseudo :</label>
        <input type="text" class="form-control" name="user" placeholder="Indiquez votre pseudo...">
    </div>
    <br>
    <div class="mb-3">
        <label for="titre" class="form-label">Titre :</label>
        <input type="text" class="form-control" name="titre" placeholder="Indiquez le titre de votre article...">
    </div>
    <br>
    <div class="form-group">
        <label for="message">Contenu de l'article :</label>
        <textarea name="contenu" class="form-control" cols="30" rows="10" placeholder="Indiquez le contenu de l'article..."></textarea>
    </div>
    <br>
    <div>
        <button type="reset" class="btn btn-primary">Reinnilisatier le formulaire</button>
        <button name="submit" class="btn btn-primary">Send</button>
    </div>

    <div class="input-group">
        <div class="form-outline">
            <input type="search" id="form1" class="form-control" />
            <label class="form-label" for="form1">Search</label>
        </div>
        <button type="button" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </div>

</form>

<?php foreach($articles as $article) :?>
    
    <div>
        <table>
            <tr>
                <td class="align-middle"><?= $article[$i]->$id; ?></td>
                <td class="align-middle"><?= $article[$i]->$user; ?></td>
                <td class="align-middle"><?= $article[$i]->$titre; ?></td>
                <td class="align-middle"><?= $article[$i]->$contenu; ?></td>
                <td class="align-middle"><?= $article[$i]->$date_time_publication; ?></td>
            </tr>
        </table>
    </div>
<?php endforeach; ?>