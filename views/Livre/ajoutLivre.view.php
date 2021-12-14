

<form method="POST" action="<?= URL ?>livres/validationAjout" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title : </label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group">
        <label for="author">Author : </label>
        <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="form-group">
        <label for="numbersOfPages">Numbers of pages : </label>
        <input type="number" class="form-control" id="numbersOfPages" name="numbersOfPages">
    </div>
    <div class="form-group">
        <label for="price">Price: </label>
        <input type="float" class="form-control" id="price" name="price">
    </div>
    <div class="form-group">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

