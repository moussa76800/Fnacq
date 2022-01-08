

<form method="POST" action="<?= URL ?>livres/validationAjout" enctype="multipart/form-data">
    <div class="form-group"style="font-weight: bold">
        <label for="title">Title : </label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group"style="font-weight: bold">
        <label for="author">Author : </label>
        <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="form-group"style="font-weight: bold">
        <label for="numbersOfPages">Numbers of pages : </label>
        <input type="number" class="form-control" id="numbersOfPages" name="numbersOfPages">
    </div>
    <div class="form-group"style="font-weight: bold">
        <label for="price">Price: </label>
        <input type="float" class="form-control" id="price" name="price">
    </div>
    <br>
    <div class="form-group"style="font-weight: bold">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <br>  
    <button type="submit" class="btn btn-primary"style="font-weight: bold">Add book</button>
</form>

