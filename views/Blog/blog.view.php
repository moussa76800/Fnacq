<div>
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">Welcome to the blog</h1>

    <br>

    <form method="POST" action="<?= URL ?>blog">
        <div class="input-group">
            <input type="search" class="form-control rounded text-center" name="findPost" height="50px" placeholder="Search the title of post" aria-label="Search" aria-describedby="search-addon" />
            <button name="submit" class="btn btn-primary"  style="font-weight: bold">Search</button>
            
        </div>
    </form>
        <br>
    <TITLE>The blog</TITLE>


    <table class="table text-center">
        <tr class="table-dark">
            <th>IMAGE</th>
            <th>TITLE</th>
            <th>AUTHORS</th>
            <th>CREATED_AT</th>
            <th colspan="2">ACTIONS</th>
        </tr>


        <?php for ($i = 0; $i < count($posts); $i++) : ?>

            <tr>
                <td class="align-middle"><img src="public/Assets/images/blog/<?= $posts[$i]->getImage(); ?>" width="250px;"></td>
                <td class="align-middle"><a href="<?= URL ?>blog/afficherUnPost/<?= $posts[$i]->getId(); ?>"><?= $posts[$i]->getTitle(); ?></a></td>
                <td class="align-middle"><?= $posts[$i]->getAuthor(); ?></td>
                <td class="align-middle"><?= $posts[$i]->getCreated_at(); ?></td>            
            </tr>
        <?php endfor; ?>
    </table>
