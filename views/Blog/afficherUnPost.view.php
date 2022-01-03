<div>
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">AFFICHER UN ARTICLE</h1>
</div>

<div class="row ">
    <div class="col-6 center">
    <img src="<?= URL ?>public/Assets/images/blog/<?= $post->getImage(); ?> ">
    </div>
    <div class="col-6">
        <p>Title : <?= $post->getTitle(); ?></p>
        <p>Content: <?= $post->getContent(); ?></p>
        <br>
        <p>Author : <?= $post->getAuthor(); ?></p>
        <p> Created_at: <?= $post->getCreated_at(); ?></p>
    </div>
</div>
