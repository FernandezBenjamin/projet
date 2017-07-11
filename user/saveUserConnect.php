<?php

	session_start();
	require "../tools/conf.inc.php";
	require "../tools/functions.php";



	if(count($_POST) == 2
		&& !empty($_POST["emailconnect"])
		&& !empty($_POST["pwdconnect"]) ) {


			$error = false;
			$listOfErrors;


			$_POST["emailconnect"] = trim($_POST["emailconnect"]);
			$pwd = $_POST['pwdconnect'];


			if ((!filter_var($_POST["emailconnect"], FILTER_VALIDATE_EMAIL)) || strlen($_POST["pwdconnect"])<8 || strlen($_POST["pwdconnect"])>25) {
				$error = true;
				$listOfErrors[]=17;
			}



			if ($error){
				$_SESSION["errors_form"] = $listOfErrors;
				$_SESSION["data_form"] = $_POST;
				header("Location: connection.php");
			} else {


				$db = connectDB();




				// Préparer la requête
				$query = $db->prepare("SELECT * FROM users WHERE email=:email");


				// Executer la requête avec les valeurs
				$query -> execute([
						'email' => $_POST['emailconnect']
					]);

				// Récupération de l'élément
				$data = $query->fetch();


				// Test de l'élément récupéré
				if (password_verify($_POST['pwdconnect'],$data['pwd'])){

					$_SESSION["token"] = regenerateAccessToken($_POST["emailconnect"]);
					$_SESSION["email"] = $_POST["emailconnect"];
					$_SESSION['pseudo'] = $data['pseudo'];
					$_SESSION['notif'] = 0;
					$_SESSION['id'] = $data['id'];

					if ($data['first_connection'] == 1){
						header('Location: first_connection.php');
					}else {
						header('Location: profil.php');
					}
					
					

				} else {
					$error = true;
					$listOfErrors[]=17;
				}

				if ($error){
					$_SESSION["errors_form"] = $listOfErrors;
					$_SESSION["data_form"] = $_POST;
					header("Location: connection.php");
				}


			}



		} else {
			die("Access denied, we know who you are and where you live :".$_SERVER["REMOTE_ADDR"]);
		}
