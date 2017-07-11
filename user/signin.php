<?php
	session_start();
	require "../tools/conf.inc.php";
	require "../tools/functions.php";
	include "../header.php";
?>


<section class="signup">
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12" align="center">



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
	<h1 align="center">Inscription</h1>
					<br>


					<form method="POST" action="saveUser.php">

		<?php
			foreach ($listOfGender as $key => $gender) {
				echo 	"<label class='gender'>
							".$gender." : <input type=\"radio\" name=\"gender\" value=\"".$key."\">

							</label>";
						}

						?>





						<br>

						<input type="text" name="pseudo" placeholder="Votre pseudo" required="required" value="<?php echo (isset($data["pseudo"]))?$data["pseudo"]:"" ?>">
						<br>
						<input type="text" name="name" placeholder="Votre nom" required="required" value="<?php echo (isset($data["name"]))?$data["name"]:"" ?>">
						<br>
						<input type="text" name="surname" placeholder="Votre prénom" required="required" value="<?php echo (isset($data["surname"]))?$data["surname"]:"" ?>">
						<br>
						<input type="date" name="birthday" placeholder="Votre date de naissance" max="2017-01-25" required="required" value="<?php echo (isset($data["birthday"]))?$data["birthday"]:"" ?>">
						<br>

						<input type="email" name="email" placeholder="Votre Email" required="required" value="<?php echo (isset($data["email"]))?$data["email"]:"" ?>">
						<br>
						<input type="password" name="pwd" placeholder="Votre mot de passe" required="required">
						<br>
						<input type="password" name="pwd2" placeholder="Confirmation" required="required">
						<br>







						<select name="country">
							<?php

							foreach ($listOfCountry as $key => $country) {
								echo 	"<option value=\"".$key."\">".$country."</option>";
							}

							?>

						</select>
						<br>
						<input type="number" name="phone" placeholder="Votre téléphone" value="<?php echo (isset($data["phone"]))?$data["phone"]:"" ?>">
						<br>
						<input type="text" name="job" placeholder="Votre profession" value="<?php echo (isset($data["job"]))?$data["job"]:"" ?>">
						<br>

						<label>
							J'accepte les CGUs
							<input type="checkbox" name="cgu" required="required">
						</label>
						<br>
						<img src="/projet/user/captcha.php">
						<br><br>

						<input type="text" name="captcha" required="required" placeholder="Saisir le captcha">
						<br>
						<br>
						<br>
						

						<center><input type="submit" value="S'inscrire"></center>
						<br>
						<br>


				</form>
			</div>
		</div>
	</div>
</div>



</section>


<?php
	include "../footer.php"
?>
