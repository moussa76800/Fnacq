<<<<<<< HEAD
<?php
     // à mettre tout en haut de la page
    //.... autres scripts
    $achat = array("fruit", "céréale", "légumes");
    $_SESSION['mesAchats'] = $achat; // on enregistre le tableau $achat dans la session
    ?>

=======
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
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
<<<<<<< HEAD
						 <h3>
							 <img class="img-circle img-thumbnail" src="<?= URL; ?>public/Assets/images/profil/<?= $_SESSION['profil']['image'] ?>" width="100px" alt="photo de profil"><br>
							<?=$_SESSION['profil']['login'] ?>
						</h3> 
=======
						<h3>
							<img class="img-circle img-thumbnail" src="<?= URL; ?>public/Assets/images/profil/<?= $_SESSION['profil']['image'] ?>" width="100px" alt="photo de profil"><br>
							<?= $_SESSION['profil']['login'] ?>
						</h3>
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
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
<<<<<<< HEAD
										<th>Total</th>
									</tr>
								</thead>


=======
										<th colspan="2">Total</th>
									</tr>
								</thead>
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
								<tbody>
									<tr>
										<td><img src="<?= URL ?>public/Assets/images/livres/<?= $livree->getImage(); ?>" class="img-cart"></td>
										<td><strong>Product </strong>
											<p><a href="<?= URL ?>livres/display/<?= $livree->getId(); ?>"><?= $livree->getTitle(); ?></a></p>
										</td>
										<td>
<<<<<<< HEAD
											<form class="form-inline">
												<input class="form-control" type="text" value="1">
												<button rel="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></button>
												<a href="#" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>
											</form>
										</td>
										<td><?= $livree->getPrice(); ?> Euros</td>
										<td><?= $livree->getPrice(); ?> Euros</td>
=======
											<form method="POST" class="form-inline">
												<input class="form-control" name="quantity" type="int" value="1">
												<input type="hidden" name="id" value="<?= $livree->getId(); ?>">											
										</td>
										<td><?= number_format($livree->getPrice(), 2, ',', ' '); ?> Euros</td>
										<td><?= $livree->getPrice(); ?> Euros</td>
										<td><button type="submit" class="btn btn-outline-primary" name='addPanier'>Ajouter au panier</button></td>
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
									</tr>

									<tr>
										<td colspan="6">&nbsp;</td>
									</tr>
<<<<<<< HEAD
									<tr>
										<td colspan="4" class="text-right">Total Product</td>
										<td><?= $livree->getPrice(); ?> Euros</td>
									</tr>
									<tr>
										<td colspan="4" class="text-right">Total Shipping</td>
										<td>$2.00</td>
									</tr>
									<tr>
										<td colspan="4" class="text-right"><strong>Total</strong></td>
										<td><?= $livree->getPrice(); ?> Euros</td>
									</tr>
=======
									<!-- <tr>
										<td colspan="4" class="text-right">Total Product</td>
										<td><?= number_format($livree->getPrice(), 2, ',', ' '); ?> Euros</td>
									</tr>

									<tr>
										<td colspan="4" class="text-right"><strong>Total</strong></td>
										<td> Euros</td>
									</tr> -->
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
								</tbody>
							</table>
						</div>
					</div>
				</div>
<<<<<<< HEAD
				<a href="<?= URL ?>livres" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>Continue Shopping</a>
				<a href="#" class="btn btn-primary pull-right">Next<span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
</div>

























































<!-- <style>
	.table>tbody>tr>td,
	.table>tfoot>tr>td {
		vertical-align: middle;
	}

	@media screen and (max-width: 600px) {
		table#cart tbody td .form-control {
			width: 20%;
			display: inline !important;
		}

		.actions .btn {
			width: 36%;
			margin: 1.5em 0;
		}

		.actions .btn-info {
			float: left;
		}

		.actions .btn-danger {
			float: right;
		}

		table#cart thead {
			display: none;
		}

		table#cart tbody td {
			display: block;
			padding: .6rem;
			min-width: 320px;
		}

		table#cart tbody tr td:first-child {
			background: #333;
			color: #fff;
		}

		table#cart tbody td:before {
			content: attr(data-th);
			font-weight: bold;
			display: inline-block;
			width: 8rem;
		}



		table#cart tfoot td {
			display: block;
		}

		table#cart tfoot td .btn {
			display: block;
		}

	}
</style>






<div class="container">
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
			</tr>
		</thead>

	</table>

	 <?php for ($i = 0; $i < count($livre); $i++) : ?> 

		<tbody>
			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-2 hidden-xs"><img src="public/Assets/images/livres/<?= $livre[$i]->getImage(); ?>" width="10px;" alt="..." class="img-responsive" /></div>
						<div class="col-sm-10">
							<h4 class="nomargin"><?= $livre[$i]->getId(); ?></h4>
							<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
						</div>
					</div>
				</td>
				<td data-th="Price"><?= $livre[$i]->getPrice(); ?></td>
				<td data-th="Quantity">
					<input type="number" class="form-control text-center" value="1">
				</td>
				<td data-th="Subtotal" class="text-center"><?= $livre[$i]->getPrice(); ?></td>
				<td class="actions" data-th="">
					<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
					<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr class="visible-xs">
				<td class="text-center"><strong><?= $livre[$i]->getPrice(); ?></strong></td>
			</tr>
			<tr>
				<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="hidden-xs text-center"><strong><?= $livre[$i]->getPrice(); ?></strong></td>
				<td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
			</tr>
		</tfoot>
	<?php endfor; ?>
	</table>
</div> --> -->
=======
<br>
				<a href="<?= URL ?>livres" class="btn btn-outline-success"><span class="glyphicon glyphicon-arrow-left"></span>Continue Shopping</a>
				<a href="<?= URL ?>panier" class="btn btn-outline-success pull-right ">Voir le panier</a>
				<!-- <button type="submit" class="btn btn-primary" name='addPanier'>Ajouter panier</button> -->
				
				

				</form>

			</div>
		</div>
	</div>
</div>
>>>>>>> 452b56c6bfadca54e57a47b527ca1798558e8a69
