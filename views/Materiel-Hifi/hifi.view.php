
<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">LISTE DU MATERIELS HIFI</h1>

<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
<<<<<<< HEAD
        <th>Titre</th>
=======
        <th>Article</th>
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
        <th>Marque</th>
        <th>Prix</th>
        <th colspan="3">Actions</th>
    </tr>

<<<<<<< HEAD
    <tr>
        <td class="align-middle"><img src="public/Assets/images/materielsHifi/casque.jpg" width="60px;"></td>
        <td class="align-middle">Casque Bluetooth</td>
        <td class="align-middle">Yamaha</td>
        <td class="align-middle">49 Euros</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        <td class="align-middle"><a href="" class="btn btn-info">Acheter</a></td>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/Assets/images/materielsHifi/enceinteBluetooth.jpg" width="60px;"></td>
        <td class="align-middle">Enceinte Bluetooth</td>
        <td class="align-middle">Sony</td> 
        <td class="align-middle">99 Euros</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        <td class="align-middle"><a href="" class="btn btn-info">Acheter</a></td>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/Assets/images/materielsHifi/homeCinema.jpg" width="60px;"></td>
        <td class="align-middle">Home Cinema</td>
        <td class="align-middle">Philips</td>
        <td class="align-middle">158 Euros</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        <td class="align-middle"><a href="" class="btn btn-info">Acheter</a></td>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/Assets/images/materielsHifi/microChaine.jpg" width="60px;"></td>
        <td class="align-middle">Micro Chaine</td>
        <td class="align-middle">Grundig</td>
        <td class="align-middle">149 Euros</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        <td class="align-middle"><a href="" class="btn btn-info">Acheter</a></td>
    </tr>
    <tr>
        <td class="align-middle"><img src="public/Assets/images/materielsHifi/miniAmplificateur.jpg" width="60px;"></td>
        <td class="align-middle">Mini Amplificateur</td>
        <td class="align-middle">Samsung</td>
        <td class="align-middle">200 Euros</td>
        <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
        <td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>
        <td class="align-middle"><a href="" class="btn btn-info">Acheter</a></td>
    </tr>  
</table>

<a href=""class="btn btn-success d-block">Ajouter</a>
=======
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

 
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
