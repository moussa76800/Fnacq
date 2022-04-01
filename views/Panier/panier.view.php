<style>
	.img-cart {
		display: block;
		max-width: 50px;
		height: auto;
		margin-left: auto;
		margin-right: auto;
	}

	table tr td {
		border: 1px solid #FFFFFF;
	}

	table tr th {
		background: #eee;
	}

	.panel-shadow {
		box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
	}
</style>

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
<div class="container bootstrap snippets bootdey">
	<div class="col-md-9 col-sm-8 content">
		<div class="row">
			<div class="col-md-12">
				<ol class="breadcrumb">

				</ol>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-info panel-shadow">
					<div class="panel-heading">
						<h3>
							<img class="img-circle img-thumbnail" src="<?= URL; ?>public/Assets/images/profil/<?= $_SESSION['profil']['image'] ?>" width="100px" alt="photo de profil"><br>
							<?= $_SESSION['profil']['login'] ?>
						</h3>
					</div>
					<br>
					<br>
					<h1 class="rounded border border-dark p-2 m-2 text-center text-white bg-success">LE PANIER</h1>
					<table class="table text-center">
						<tr class="table-dark">
							<th>IMAGE</th>
							<th>TITLE</th>
							<th>PRICE</th>
							<th>QUANTITY</th>
							<th>TOTAL PRICE</th>
						</tr>
						<?php foreach ($result as $key => $value) { ?>
							<tr>
								<td class="align-middle"><img src="public/Assets/images/livres/<?= $value['Valeur_Image']; ?>" width="60px;"></td>
								<td class="align-middle"><?= $value['Valeur_Title']; ?></a></td>
								<td class="align-middle"><?= $value['Valeur_Price']; ?> Euros</td>
								<td class="align-middle"><?= $value['Valeur_Quantity']; ?> quantity</td>
								<td class="align-middle"><?= intval($value['Valeur_Quantity']) * intval($value['Valeur_Price']); ?> Euros</td>
							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>