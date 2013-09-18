<?php 
session_start(); 
//$text = rand(10000,99999); 
$md5_hash = md5(rand(0,999)); 
$text = substr($md5_hash, 15, 7); 
$_SESSION["vercode"] = $text; 
$height = 20; 
$width = 100; 
  
$image_p = imagecreate($width, $height); 
$black = imagecolorallocate($image_p, 195, 195, 195); 
$white = imagecolorallocate($image_p, 255, 255, 255); 
$font_size = 5; 
  
imagestring($image_p, $font_size, 20, 3, $text, $white); 
imagejpeg($image_p, null, 40); 
?>
<div style="color:gray"></div>