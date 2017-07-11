<?php
	session_start();
	require "../tools/conf.inc.php";
	require "../tools/functions.php";

	logout($_SESSION['email'], true);