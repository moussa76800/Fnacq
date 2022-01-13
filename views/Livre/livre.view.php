

<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">List of book</h1>
    <table class="table text-center">
    <tr class="table-dark">
        <th>IMAGE</th>
        <th>TITLE</th>
        <th>AUTHORS</th>
        <th>NUMBERS OF PAGES</th>
        <th>PRICE</th>
        <th colspan="3">ACTIONS</th>
    </tr>

    
     
    <?php
         
         
        
         for ($i=0; $i< count($livres); $i++) : ?>
       
        <tr>
            <td class="align-middle"><img src="public/Assets/images/livres/<?= $livres[$i]->getImage();?>" width="60px;"></td>
            <td class="align-middle"><a href="<?= URL ?>livres/display/<?= $livres[$i]->getId(); ?>"><?= $livres[$i]->getTitle(); ?></a></td>
            <td class="align-middle"><?=$livres[$i]->getAuthors();?></td>
            <td class="align-middle"><?=$livres[$i]->getNumbersOfPages();?></td>
            <td class="align-middle"><?=$livres[$i]->getPrice();?> Euros</td>
            <td class="align-middle"><a href="<?= URL ?>livres/modify/<?= $livres[$i]->getId(); ?>" class="btn btn-warning">Edit</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>livres/delete/<?= $livres[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
             <button class = "btn btn-danger" type="submit">Delete</button>
             <td class="align-middle"><a href="<?= URL ?>livres/buy/<?= $livres[$i]->getId(); ?>" class="btn btn-info">Buy</a></td>
        </form></td>
           
        </tr>
        <?php endfor; ?>
 </table>

 <a href="<?= URL ?>livres/add" class="btn btn-success d-block">Add book</a>

      
 