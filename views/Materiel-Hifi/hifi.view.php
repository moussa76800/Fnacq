
<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">LISTE DU MATERIELS HIFI</h1>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Article</th>
        <th>Marque</th>
        <th>Prix</th>
        <th colspan="3">Actions</th>
    </tr>

    <?php
         
         
        
         for ($i=0; $i< count($hifi); $i++) : ?>
       
        <tr>
            <td class="align-middle"><img src="public/Assets/images/materielsHifi/<?= $hifi[$i]->getImage();?>" width="60px;"></td>
            <td class="align-middle"><a href="<?= URL ?>materielsHifi/display/<?= $hifi[$i]->getId(); ?>"><?= $hifi[$i]->getArticle(); ?></a></td>
            <td class="align-middle"><?=$hifi[$i]->getMarque();?></td>
            <td class="align-middle"><?=$hifi[$i]->getPrice();?> Euros</td>
           
                <form> 
             <td class="align-middle"><a href="<?= URL ?>materielsHifi/buy/<?= $hifi[$i]->getId(); ?>" class="btn btn-info">Buy</a></td>
        </td></form>
           
        </tr>
        <?php endfor; ?>
 </table>

 
