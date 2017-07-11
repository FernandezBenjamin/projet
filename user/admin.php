<?php
	session_start();
	require "../conf.inc.php";
	require "../functions.php";

	if ( isAdmin() && isConnected()){
	include "../header.php";
	



	$db = connectDB();



	if ( isset($_GET['admin']) && !empty($_GET['admin']) ){
		$admin = (int) $_GET['admin'];

		$req = $db -> prepare('UPDATE users SET admin = 1 WHERE id = ?');
		$req->execute([
				$admin
			]);
	}


	if ( isset($_GET['is_deleted']) && !empty($_GET['is_deleted']) ){
		$is_deleted = (int) $_GET['is_deleted'];

		$req = $db -> prepare('UPDATE users SET is_deleted = 1 WHERE id = ?');
		$req->execute([
				$is_deleted
			]);
	}


	if ( isset($_GET['reactive']) && !empty($_GET['reactive']) ){
		$reactive = (int) $_GET['reactive'];

		$req = $db -> prepare('UPDATE users SET is_deleted = 0 WHERE id = ?');
		$req->execute([
				$reactive
			]);
	}


	$membres = $db->query('SELECT * FROM users ORDER BY id DESC');
	$membres1 = $db->query('SELECT * FROM users ORDER BY id DESC');
	$membres2 = $db->query('SELECT * FROM users ORDER BY id DESC');
	$membres3 = $db->query('SELECT * FROM users ORDER BY id DESC');

?>

<div class="title" align="center">
	<h1>Administration</h1>
	<h2>Bonjour <?php echo $_SESSION['pseudo'] ?></h2>
</div>


<br>
<section class="accepted">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 align="center">Membres accepté</h2>
					<br>

					<table border="1" align="center">
						<tr>
							<th>Pseudo</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Mail</th>
							<th>Date de création</th>
							<th>Date de modification</th>
							<th>Action</th>
						</tr>


						<?php
							while($m = $membres->fetch()){
								if ( $m['is_deleted'] == 0 && $m['email']!=$_SESSION['email']){
									echo "<tr>
											<td>".$m['pseudo']."</td>
											<td>".$m['name']."</td>
											<td>".$m['surname']."</td>
											<td>".$m['email']."</td>
											<td>".$m['date_inserted']."</td>
											<td>".$m['date_updated']."</td>

											<td>"?><?php 
											if($m['is_deleted'] == 0){ ?> 
											<a href='admin.php?is_deleted=<?= $m['id']?>'><button class='delete'>Désactiver</button></a> 
											<?php } 
											if( empty($m['admin']) || $m['admin'] == 0 ){ ?> <a href='admin.php?admin=<?= $m['id']?>'><button class='admin'>Passer administrateur</button></a> <?php }?> <?php "</td>
										</tr>";

								}
							}
						?>


					</table>
				</div>
			</div>
		</div>
	</div>

</section>


<br>


<br>


<section class="disable">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 align="center">Compte désactivé</h2>
					<br>

					<table border="1" align="center">
						<tr>
							<th>Pseudo</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Mail</th>
							<th>Date de création</th>
							<th>Réactivation du compte</th>
						</tr>


						<?php
							while($m2 = $membres2->fetch()){
								if ( $m2['is_deleted'] == 1 ){
									echo "<tr>
											<td>".$m2['pseudo']."</td>
											<td>".$m2['name']."</td>
											<td>".$m2['surname']."</td>
											<td>".$m2['email']."</td>
											<td>".$m2['date_inserted']."</td>
											<td>"?><?php if( empty($m2['reactive']) || $m2['reactive'] == 0 ){ ?> <a href='admin.php?reactive=<?= $m2['id']?>'><button class='reactive'>Réactiver</button></a> <?php }?> <?php "</td>
										</tr>";

								}
							}
						?>


					</table>
				</div>
			</div>
		</div>
	</div>
	

</section>





<section class="admin">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 align="center">Compte Administrateur</h2>
					<br>

					<table border="1" align="center">
						<tr>
							<th>Pseudo</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Mail</th>
							<th>Date de création</th>
						</tr>


						<?php
							while($m1 = $membres1->fetch()){
								if ( $m1['admin'] == 1 ){
									echo "<tr>
											<td>".$m1['pseudo']."</td>
											<td>".$m1['name']."</td>
											<td>".$m1['surname']."</td>
											<td>".$m1['email']."</td>
											<td>".$m1['date_inserted']."</td>
										</tr>";

								}
							}
						?>


					</table>
				</div>
			</div>
		</div>
	</div>

	
<br>

<section class="all">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 align="center">Tout les comptes</h2>
					<br>

					<table border="1" align="center">
						<tr>
							<th>Pseudo</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Mail</th>
							<th>Date de création</th>
							<th>Date de Modification</th>
						</tr>

						<?php
							while($m3 = $membres3->fetch()){
									echo "<tr>
											<td>".$m3['pseudo']."</td>
											<td>".$m3['name']."</td>
											<td>".$m3['surname']."</td>
											<td>".$m3['email']."</td>
											<td>".$m3['date_inserted']."</td>
											<td>".$m3['date_updated']."</td>
										</tr>";
							}
						?>

					</table>
				</div>
			</div>
		</div>
	</div>
	

</section>



<?php

	include "../footer.php";

	} else {
			die("\nAccès refusé : Vous n'avez pas les droits nécessaire pour acceder à cette page.");
	}

?>
