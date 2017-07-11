<?php
	session_start();
	require "../tools/conf.inc.php";
	require "../tools/functions.php";
	include "../header.php";
	



?>

<?php

	// Si $_SESSION["errors_form"] existe alors
	// afficher une liste à puce listant toutes les erreurs

	if(isset($_SESSION["errors_form"])) {
		echo "<ul>";
		foreach ($_SESSION["errors_form"] as $error) {
			echo "<li>".$listOfErrorsMsg[$error];
		}
		echo "</ul>";
		$data = $_SESSION["data_form"];

		unset($_SESSION["errors_form"]);
	}



?>


<section class="connect">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<h1 align="center">Connexion</h1>
					<br>
					<form method="POST" action="saveUserConnect.php">

						<input type="email" name="emailconnect" placeholder="Votre Email" required="required" value="<?php echo (isset($data["email"]))?$data["email"]:"" ?>">
						<br>
						<input type="password" name="pwdconnect" placeholder="Votre mot de passe" required="required">
						<br>
						<a href="#">Mot de passe oublié ?</a>
						<br>




						<center><input type="submit" value="Se Connecter"></center>
						<br>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>

</section>


<?php
	include "../footer.php";
?>
