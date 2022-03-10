
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
							<?=$_SESSION['profil']['login'] ?>
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
										<th>Total</th>
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
												<button rel="tooltip" class="btn btn-default"><i class="fa fa-pencil"></i></button>
												<a href="#" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>
												<input type="hidden" name="id" value="<?= $livree->getId(); ?>">
												<input type="submit" value="Acheter">
											</form>
										</td>
										<td><?=number_format(  $livree->getPrice(),2,',',' '); ?> Euros</td>
										<td><?= $livree->getPrice(); ?> Euros</td>
									</tr>

									<tr>
										<td colspan="6">&nbsp;</td>
									</tr>
									<tr>
										<td colspan="4" class="text-right">Total Product</td>
										<td><?= number_format(  $livree->getPrice(),2,',',' '); ?> Euros</td>
									</tr>
									
									<tr>
										<td colspan="4" class="text-right"><strong>Total</strong></td>
										<td> Euros</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<a href="<?= URL ?>livres" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span>Continue Shopping</a>
				<a href="<?= URL ?>panier" class="btn btn-primary pull-right">Panier<span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
	</div>
</div>























































