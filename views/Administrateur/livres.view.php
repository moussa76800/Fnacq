

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
           $livre=json_encode($livres,true);
           
          for ($i=0; $i< count($livre); $i++) : ?>
          
       
        <tr>
        <td class="align-middle"><img src="public/Assets/images/livres/<?= $livre->getImage();?>" width="60px;"></td>
            <td class="align-middle"><a href="<?= URL ?>administration/display/<?= $livre[$i]->getId(); ?>"><?= $livre[$i]->getTitle(); ?></a></td>
            <td class="align-middle"><?=$livre[$i]->getAuthors();?></td>
            <td class="align-middle"><?=$livre[$i]->getNumbersOfPages();?></td>
            <td class="align-middle"><?=$livre[$i]->getPrice();?> Euros</td>
            <td class="align-middle"><a href="<?= URL ?>administration/modify/<?= $livre[$i]->getId(); ?>" class="btn btn-warning">Edit</a></td>
            <td class="align-middle">
                <form method="POST" action="<?= URL ?>administration/delete/<?= $livre[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
             <button class = "btn btn-danger" type="submit">Delete</button>
             
        </form></td>
           
        </tr
        <?php endfor; ?>
 </table>
 <a href="<?= URL ?>administration/add" class="btn btn-success d-block">Add book</a>
 

      
 