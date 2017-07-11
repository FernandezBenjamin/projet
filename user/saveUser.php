<?php
	session_start();
	require "../tools/conf.inc.php";
	require "../tools/functions.php";



	// Vérifier que l'on a 11 valeurs dans $_POST
	// Vérifier qu'une variable existe
	// on pourra vérifier que $_POST["name"] existe bien
	if(count($_POST) == 13
		&& !empty($_POST["gender"])
		&& !empty($_POST["pseudo"])
		&& !empty($_POST["name"])
		&& !empty($_POST["surname"])
		&& !empty($_POST["birthday"])
		&& !empty($_POST["email"])
		&& !empty($_POST["pwd"])
		&& !empty($_POST["pwd2"])
		&& !empty($_POST["country"])
		&& isset($_POST["phone"])
		&& isset($_POST["job"])
		&& !empty($_POST["cgu"])
		&& !empty($_POST["captcha"])) {

		$error = false;
		$listOfErrors;

		$_POST["pseudo"] = trim($_POST["pseudo"]);
		$_POST["name"] = trim($_POST["name"]);
		$_POST["surname"] = trim($_POST["surname"]);
		$_POST["birthday"] = trim($_POST["birthday"]);
		$_POST["email"] = trim($_POST["email"]);
		$_POST["phone"] = trim($_POST["phone"]);
		$_POST["job"] = trim($_POST["job"]);


		if (strlen($_POST["pseudo"])<4 || strlen($_POST["pseudo"])>150) {
			$error = true;
			$listOfErrors[]=1;
		}

		// Name : min 2 caractères, max 50

		if (strlen($_POST["name"])<2 || strlen($_POST["name"])>50) {
			$error = true;
			$listOfErrors[]=2;
		}

		// Surname : min 2 caractères, max 50
		if (strlen($_POST["surname"])<2 || strlen($_POST["surname"])>50) {
			$error = true;
			$listOfErrors[]=3;
		}

		// pwd : min 8 caractères, max 25
		if (strlen($_POST["pwd"])<8 || strlen($_POST["pwd"])>25) {
			$error = true;
			$listOfErrors[]=4;
		}

		// pwd : égale à pwd
		if ($_POST["pwd2"] != $_POST["pwd"]){
			$error = true;
			$listOfErrors[]=5;
		}

		// phone : $_POST["phone"] != 0 et !=10 et que ce n'est pas un numérique
		if (!(strlen($_POST["phone"]) == 0 || (strlen($_POST["phone"]) == 10 && is_numeric($_POST["phone"])))) {
			$error = true;
			$listOfErrors[]=6;
		}


		// job : min 3 caractères, max 50 mais peut-être vide
		if (!empty($_POST["job"]) && strlen($_POST["job"])<3 || strlen($_POST["job"])>50) {
			$error = true;
			$listOfErrors[]=7;
		}

		// Email
		if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
			$error = true;
			$listOfErrors[]=8;
		}



		// country : array key exists
		if (!array_key_exists($_POST["country"], $listOfCountry)){
			$error = true;
			$listOfErrors[]=9;
		}



		// gender : array key exists
		if (!array_key_exists($_POST["gender"], $listOfGender)){
			$error = true;
			$listOfErrors[]=10;
		}



		//birthday

		if( strlen($_POST["birthday"])==10 ){

			if(substr_count ( $_POST["birthday"] , "-") == 2){
				$arrayBirthday = explode("-", $_POST["birthday"]);

				$year = $arrayBirthday[0];
				$month = $arrayBirthday[1];
				$day = $arrayBirthday[2];

			}else if(substr_count ( $_POST["birthday"] , "/") == 2){
				$arrayBirthday = explode("/", $_POST["birthday"]);

				$year = $arrayBirthday[2];
				$month = $arrayBirthday[1];
				$day = $arrayBirthday[0];

			}else{
				$error = true;
				$listOfErrors[]=11;
			}

		}else{
			$error = true;
			$listOfErrors[]=12;
		}


		if(!empty($year) && !empty($month) && !empty($day) && checkdate ($month ,$day ,$year )){

			//entre 16 et 70
			$oneYear = 365*24*60*60;
			$oldTime = time()-$oneYear*70;
			$youngTime = time()-$oneYear*16;
			$birthdayTime = strtotime($year."-".$month."-".$day);

			if($birthdayTime<$oldTime || $birthdayTime>$youngTime ){
				$error = true;
				$listOfErrors[]=13;
			}
		} else{
			$error = true;
			$listOfErrors[]=14;
		}




		// Vérifier le captcha

		if (strtolower($_POST["captcha"]) != $_SESSION["captcha"]){
			$error = true;
			$listOfErrors[]=15;
		}



		if ($error){

			$_SESSION["errors_form"] = $listOfErrors;
			$_SESSION["data_form"] = $_POST;
			header("Location: signin.php");
		} else {
			// Se connecter a la bdd
			// mysqli_connect -> a oublier
			// PDO = permet de communiquer avec tous les SGBDs


			$db = connectDB();



			// Préparer la requête
			$email = $db->prepare("SELECT id FROM users WHERE email=:email limit 1");

			// Executer la requête avec les valeurs
			$email -> execute([
					'email' => $_POST['email']
				]);

			// Test de l'élément récupéré
			if (!empty( $email->fetch() )){
					$error = true;
					$listOfErrors[]=16;

			} else {

				// Préparer la requête
				$query = $db->prepare("INSERT INTO users
										(gender, pseudo, name, surname,
										birthday, email, pwd,
										country, phone, job)
										VALUES
										(:gender, :pseudo, :name, :surname,
										:birthday, :email, :pwd,
										:country, :phone, :job)");

				//cryptage password
				$pwd = password_hash($_POST["pwd"], PASSWORD_DEFAULT);

				//Executer la requete avec les valeurs

				$query->execute([
						"gender"=>$_POST["gender"],
						"pseudo"=>$_POST["pseudo"],
						"name"=>$_POST["name"],
						"surname"=>$_POST["surname"],
						"birthday"=>$year."-".$month."-".$day,
						"email"=>$_POST["email"],
						"pwd"=>$pwd,
						"country"=>$_POST["country"],
						"phone"=>$_POST["phone"],
						"job"=>$_POST["job"]
					]);


				// Insertion de l'utilisateur


				header('Location: connection.php');
			}
			if ($error){

				$_SESSION["errors_form"] = $listOfErrors;
				$_SESSION["data_form"] = $_POST;
				header('Location: signin.php');
			}

		}


	} else {
		die("Access denied, we know who you are and where you live :".$_SERVER["REMOTE_ADDR"]);
	}
