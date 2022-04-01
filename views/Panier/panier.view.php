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


<?php

use LDAP\Result;

if (isset($_COOKIE['panier'])){

	$result = unserialize($_COOKIE['panier']['livres']);
	var_dump($result);
}
?>
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
<br>
	<tr>
		
		<td class="align-middle"><img src="public/Assets/images/livres/<?php echo $result['image'];?>" width="60px;"></td>
		<td class="align-middle"><?php echo $result[0];?></a></td>
		<td class="align-middle"><?php echo $result[2];?> Euros</td>
		<td class="align-middle"><?php echo $result[3];?> quantity</td>
		<td class="align-middle"><?php echo intval($result[3])*intval($result[2]);?> Euros</td>
	</tr>
 </table>

					
		</div>
	</div>
</div>

























































