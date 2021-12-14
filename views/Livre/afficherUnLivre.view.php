
<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">AFFICHAGE D'UN LIVRE</h1>



<div class="row">
    <div class="col-6">
    <img src="<?= URL ?>public/Assets/images/livres/<?= $livre->getImage(); ?>">
    </div>
    <div class="col-6">
        <p>Title : <?= $livre->getTitle(); ?></p>
        <p>Author : <?= $livre->getAuthors(); ?></p>
        <p>numbers Of Pages : <?= $livre->getNumbersOfPages(); ?></p>
        <p>Price : <?= $livre->getPrice()." Euros"; ?></p>
    </div>
</div>

