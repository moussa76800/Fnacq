<div>
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">MODIFIER UN ARTICLE</h1>
</div>
<br>

<form method="POST" action="<?= URL ?>blog/validationModif" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Title : </label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $post->getTitle() ?>">
    </div>

    <div class="form-group">
        <label for="author">Author : </label>
        <input type="text" class="form-control" id="author" name="author" value="<?= $post->getAuthor() ?>">
    </div>

    <div class="form-group">
        <label for="comment">Comment : </label>
        <input type="text" class="form-control" id="comment" name="comment" value="<?= $post->getComment() ?>">
    </div>

    <div class="form-group">
        <label for="Created_at">Created_at: </label>
        <input type="date" class="form-control" id="created_at" name="created_at" value="<?= $post->getCreated_at() ?>">
    </div>

    <h3>Image : </h3><br>
    <img src="<?= URL ?>public/Assets/images/blog/<?= $post->getImage() ?> " width="130px;">
    <div class="form-group"><br>
        <label for="image">Changer l'image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>

    <input type="hidden" name="identifiant" value="<?= $post->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

