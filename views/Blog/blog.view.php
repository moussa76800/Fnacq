<div>
    <h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">BIENVENUE DANS LE BLOG</h1>

    <br>

    <div class="input-group">
        <input type="search" class="form-control rounded text-center" height="50px" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary">search</button>
    </div>
    <br>



    <TITLE>Le blog</TITLE>


    <table class="table text-center">
    <tr class="table-dark">
        <th>IMAGE</th>
        <th>TITLE</th>
        <th>AUTHORS</th>
        <th>CREATED_AT</th>
        <th colspan="2">ACTIONS</th>
    </tr>

    
     
    <?php
         
         
        
         for ($i=0; $i< count($posts); $i++) : ?>
       
        <tr>
            <td class="align-middle"><img src="public/Assets/images/blog/<?= $posts[$i]->getImage();?>" width="250px;"></td>
            <td class="align-middle"><a href="<?= URL ?>blog/afficherUnPost/<?= $posts[$i]->getId(); ?>"><?= $posts[$i]->getTitle(); ?></a></td>
            <td class="align-middle"><?=$posts[$i]->getAuthor();?></td>
            <td class="align-middle"><?=$posts[$i]->getCreated_at();?></td>
            <td class="align-middle"><a href="<?= URL ?>blog/modify/<?= $posts[$i]->getId(); ?>" class="btn btn-warning">Editer</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>blog/delete/<?= $posts[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
             <button class = "btn btn-danger" type="submit">Supprimer</button> 
        </form></td>
           
        </tr>
        <?php endfor; ?>
 </table>

 <a href="<?= URL ?>blog/add" class="btn btn-success d-block">Ajouter</a>

        
