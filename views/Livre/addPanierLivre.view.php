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
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th>Product</th>
										<th>Description</th>
										<th>Qty</th>
										<th>Price</th>
										<th colspan="2">Total</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><img src="<?= URL ?>public/Assets/images/livres/<?= $livree->getImage(); ?>" class="img-cart"></td>
										<td><strong>Product </strong>
											<p><a href="<?= URL ?>livres/display/<?= $livree->getId(); ?>"><?= $livree->getTitle(); ?></a></p>
										</td>
										<td>
											<form method="POST" class="form-inline">
												<input class="form-control" name="quantity" type="int" value="1">
												<input type="hidden" name="id" value="<?= $livree->getId(); ?>">											
										</td>
										<td><?= number_format($livree->getPrice(), 2, ',', ' '); ?> Euros</td>
										<td><?= $livree->getPrice(); ?> Euros</td>
										<td><button type="submit" class="btn btn-outline-primary" name='addPanier'>Ajouter au panier</button></td>
									</tr>

									<tr>
										<td colspan="6">&nbsp;</td>
									</tr>
									<!-- <tr>
										<td colspan="4" class="text-right">Total Product</td>
										<td><?= number_format($livree->getPrice(), 2, ',', ' '); ?> Euros</td>
									</tr>

									<tr>
										<td colspan="4" class="text-right"><strong>Total</strong></td>
										<td> Euros</td>
									</tr> -->
								</tbody>
							</table>
						</div>
					</div>
				</div>
<br>
				<a href="<?= URL ?>livres" class="btn btn-outline-success"><span class="glyphicon glyphicon-arrow-left"></span>Continue Shopping</a>
				<a href="<?= URL ?>panier" class="btn btn-outline-success pull-right ">Voir le panier</a>
				<!-- <button type="submit" class="btn btn-primary" name='addPanier'>Ajouter panier</button> -->
				
				

				</form>

			</div>
		</div>
	</div>
</div>