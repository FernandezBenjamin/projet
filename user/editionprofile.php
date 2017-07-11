<?php
	session_start();
	require "../conf.inc.php";
	require "../functions.php";


	$db = connectDB();

	if ( isConnected() ){

		include "../header.php";
		$requser = $db -> prepare('SELECT * FROM users WHERE email=:email AND token=:token');
		$requser -> execute([
				"email"=>$_SESSION['email'],
				"token"=>$_SESSION['token']
			]);
		$user = $requser -> fetch();


?>

<section class="edition">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12" align="center">
					<h2 align="center">Editer mon profil | Actualiser mes informations</h2>
					<br>
					<br>

					<?php
						if ($_GET['modif'] == 1){
							?>
							<p>Modification bien prise en compte</p>
							<?php
						}
					?>
					<form action="refresh_info.php" method="POST">
						<label>
							Adresse mail :
							<input type="text" name="newmail" placeholder="Adresse mail" value="<?php echo $user['email']; ?>">
						</label>

						<br>

						<label>
							Numéro de téléphone :
							<input type="number" name="newphone" placeholder="Numéro de téléphone"  value="<?php echo $user['phone']; ?>">
						</label>

						<br>

						<label>
							Pays :
							<select name="country">
								<?php

									foreach ($listOfCountry as $key => $country) {
										echo 	"<option value=\"".$key."\">".$country."</option>";
									}

								?>

							</select>
						</label>

						<br>

						<label>
							Mot de passe :
							<input type="password" name="newpwd1" placeholder="Mot de passe">
						</label>

						<br>

						<label>
							Confirmation mot de passe :
							<input type="password" name="newpwd2" placeholder="Confirmation mot de passe">
						</label>

						<br>
						<br>
						<label>
							<input type="submit" value="Mettre à jour mes informations">
						</label>
					</form>
					
				</div>
			</div>
		</div>
	</div>
</section>







<?php

	include "../footer.php";

} else {
	die("Access denied, we know who you are and where you live :".$_SERVER["REMOTE_ADDR"]);
}

?>
