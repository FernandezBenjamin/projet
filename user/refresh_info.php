<?php
  session_start();
  require "../conf.inc.php";
  require "../functions.php";


if( isset($_POST['newmail']) 
  && isset($_POST['newphone'])
  && isset($_POST['country'])
  && isset($_POST['newpwd1'])
  && isset($_POST['newpwd2']) ){


  if (strlen($_POST["newpwd1"])<8 || strlen($_POST["newpwd1"])>25) {
      $error = true;
      $listOfErrors[]=4;
    }

    // pwd : égale à pwd
    if ($_POST["newpwd2"] != $_POST["newpwd1"]){
      $error = true;
      $listOfErrors[]=5;
    }



  $db = connectDB();



  $query = $db->prepare('UPDATE users SET email=:email, phone=:phone, country=:country WHERE id=:id');
  $query->execute([
    "email"=>$_POST['newmail'],
    "phone"=>$_POST['newphone'],
    "country"=>$_POST['country'],
    "id"=>$_SESSION['id']
  ]);



  header('Location: editionprofile.php?modif=1')


} else {
  http_response_code(400);
}



 ?>