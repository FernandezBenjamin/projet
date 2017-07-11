<?php
session_start();
header("Content-type: image/png");


$image = imagecreate(250, 100);

$back = imagecolorallocate($image, rand(0,100), rand(0,100), rand(0,100));
$color = imagecolorallocate($image, rand(150,255), rand(150,255), rand(150,255));

// Créer une chaine aléatoire de chiffre et de lettres d'une longueur aléatoire entre 4 et 6
$charAutorized = "azertyuiopqsdfghjklmwxcvbn0987654321";
$charAutorized =  str_shuffle($charAutorized);

$length = rand(4,6);

$captcha = substr($charAutorized, 0, $length);
$_SESSION["captcha"] = $captcha;


$listOfFonts = glob("fonts/*.ttf");


shuffle($listOfFonts);
$font = $listOfFonts[0];

$angle = rand(-20,30);

imagettftext($image, 26, $angle, 70, 50, $color, $font, $captcha);


$x1 = rand(0,100);
$x2 = rand(100,200);

$y1 = rand(0,40);
$y2 = rand(40,80);

$x3 = rand(0,100);
$x4 = rand(100,200);

$y3 = rand(0,40);
$y4 = rand(40,80);


$height = rand(0,120);
$width = rand(0,220);

// Ajouter une ligne a une position aléatoire
imageline($image, $x3, $y3, $x4, $y4, $color);

// Ajouter une ellipse a une position aléatoire
imageellipse($image, $y1, $y2, $width, $height, $color);

// Ajouter une rectangle a une position aléatoire
imagerectangle($image, $x1, $y1, $x2, $y2, $color);



imagepng($image);
