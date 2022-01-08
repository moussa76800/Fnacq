<div>
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Listing a post</h1>
</div>
<div class="row ">
    <div class="col-6 center">
        <img src="<?= URL ?>public/Assets/images/blog/<?= $post->getImage(); ?> ">
    </div>
    <div class="col-6">
        <p><b>Title :</b> <?= $post->getTitle(); ?></p>
        <p><b>Content:</b> <?= $post->getContent(); ?></p>
        <br>
        <p><b>Author :</b> <?= $post->getAuthor(); ?></p>
        <p> <b>Created_at :</b> <?= $post->getCreated_at(); ?></p>
    </div>
</div>



<div style="background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px; margin-top: 20px">

    <h3><b>React to this publication :</b></h3>

    <br>


    <form method="POST" action="<?= URL ?>blog/validationAjoutComment" enctype="multipart/form-data">

        <!-- <div class="form-group" style="font-weight: bold">

            <label for="author" class="form-label">Author :</label>
            <br>
            <input type="text" class="form-control" name="author" placeholder="Indiquez votre pseudo...">
        </div> -->
        <br>
        <div class="form-group" style="font-weight: bold">
        <label for="message">Comment :</label>
            <textarea class="form-control" name="comment" rows="4" placeholder="Écrivez-votre commentaire ..."></textarea>
        </div>
        <div>

            <input type="hidden" name="idPost" value="<?php echo $post->getId(); ?>">
        </div>

        <div>
            <button type="reset" class="btn btn-primary" style="font-weight: bold">Reset form</button>
            <button name="submit" class="btn btn-primary" style="font-weight: bold">Publish</button>
        </div>
    </form>
</div>



<div style="background: white; box-shadow: 0 5px 15px rgba(0, 0, 0, .15); padding: 5px 10px; border-radius: 10px; margin-top: 20px">

    <h3><b>Comments</b></h3>



    <?php
     
    for ($i = 0; $i < count($comment); $i++) : ?>
        <div style="background: #eee; margin-top: 20px; padding: 5px 10px; border-radius: 10px">

            <td class="align-middle">Author :<?= $comment[$i]->getAuthor(); ?></td>
            <td class="align-middle">Comment :<?= $comment[$i]->getComment(); ?></td>
            <div style="text-align: right; font-size: 12px; color: #665">Created_at<?= $comment[$i]->getCreated_at(); ?></div>
        </div>
    <?php endfor;
     ?>


</div>