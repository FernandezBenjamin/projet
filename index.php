<?php
session_start();
require_once "tools/functions.php";
include "header.php";


echo "<br><button class='test_button' onclick=\"refresh_popular_movies_db('$client_id','1')\">test</button><br>";


include "footer.php";