<?php


	define("DB_USER", "root");
	define("DB_PWD", "root");
	define("DB_NAME", "replex");
	define("DB_HOST", "localhost");




	$listOfCountry = 	[
							"fr" => "France",
							"pl" => "Pologne",
							"ru" => "Russie",
							"it" => "Italie"
						];

	$listOfGender = 	[
							"m" => "Mr",
							"w" => "Mme",
							"g" => "Mlle",
							"o" => "Autres"
						];


	$listOfErrorsMsg = 		[
							1=>"Le pseudo doit faire entre 4 et 150 caractères",
							2=>"Le nom doit faire entre 2 et 50 caractères",
							3=>"Le prénom doit faire entre 2 et 50 caractères",
							4=>"Le mot de passe doit faire entre 8 et 25 caractères",
							5=>"Le mot de passe de confirmation ne correspond pas",
							6=>"Le numéro de téléphone doit faire 10 chiffres",
							7=>"Le métier doit faire entre 3 et 50 caractères",
							8=>"L'email n'est pas valide",
							9=>"Le pays ne correspond pas",
							10=>"Le genre n'est pas correct",
							11=>"Le format de date n'est pas correct",
							12=>"Le format de date doit faire 10 caractères",
							13=>"Vous devez avoir entre 16 et 70 ans",
							14=>"Le format de date n'est pas correct",
							15=>"Le captcha n'est pas correct",
							16=>"L'adresse email est déjà utilisé",
							17=>"L'adresse mail ou le mot de passe ne sont pas valide"
						];

	$month = [
							"01"=>"Janvier",
							"02"=>"Février",
							"03"=>"Mars",
							"04"=>"Avril",
							"05"=>"Mai",
							"06"=>"Juin",
							"07"=>"Juillet",
							"08"=>"Août",
							"09"=>"Septembre",
							"10"=>"Octobre",
							"11"=>"Novembre",
							"12"=>"Décembre"
	];

	$client_id = "201890f6f284647ffe927b318d8bca47";
	$lang = "fr-FR";

	$based_url = "https://image.tmdb.org/t/p/original";

	$youtube_based_url = "https://www.youtube.com/watch?v=";
