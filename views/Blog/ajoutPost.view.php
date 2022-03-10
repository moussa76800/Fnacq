
<div>
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Add post</h1>
</div>

<form method="POST" action="<?= URL ?>blog/validationAjout" enctype="multipart/form-data">
    
   
    <div class="form-group" style="font-weight: bold">
        <label for="title">Title : </label>
        <input type="text" class="form-control" id="title" name="title">
    </div>
    <div class="form-group" style="font-weight: bold">
        <label for="author">Author : </label>
        <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="form-group"style="font-weight: bold">
        <label for="content">Content : </label>
        <input type="text" class="form-control" id="content" name="content">
    </div>
    <div class="form-group"style="font-weight: bold">
        <label for="created_at">created_at: </label>
        <input type="date" class="form-control" id="created_at" name="created_at">
    </div>
    <br>
    <div class="form-group"style="font-weight: bold">
        <label for="image">Image : </label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <br>
    <button type="submit" class="btn btn-primary" style="font-weight: bold">Create post</button>
</form>

