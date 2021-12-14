
<br>

<form method="POST" action="<?= URL ?>livres/validationModif" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title : </label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $livre->getTitle() ?>">
    </div>

    <div class="form-group">
        <label for="author">Author : </label>
        <input type="text" class="form-control" id="author" name="author" value="<?= $livre->getAuthors() ?>">
    </div>

    <div class="form-group">
        <label for="numbersOfPages">Numbers of pages : </label>
        <input type="number" class="form-control" id="numbersOfPages" name="numbersOfPages" value="<?= $livre->getNumbersOfPages() ?>">
    </div>

    <div class="form-group">
        <label for="price">Price: </label>
        <input type="float" class="form-control" id="price" name="price" value="<?= $livre->getPrice() ?>">
    </div>

    <h3>Image : </h3><br>
    <img src="<?= URL ?>public/Assets/images/livres/<?= $livre->getImage() ?> " width="130px;">
    <div class="form-group"><br>
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <input type="hidden" name="identifiant" value="<?= $livre->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

