<?php
session_start();
$captcha = rand(1111, 9999);
$_SESSION["captcha"] = $captcha;
$im = imagecreatetruecolor(120, 40); 
$bg = imagecolorallocate($im, 0, 128, 0); 
$fg = imagecolorallocate($im, 255, 255, 255); 
imagefill($im, 0, 0, $bg);

// Calculate the position to center the text
$textWidth = imagefontwidth(5) * strlen($captcha);
$textHeight = imagefontheight(5);
$x = (imagesx($im) - $textWidth) / 2;
$y = (imagesy($im) - $textHeight) / 2;

imagestring($im, 5, $x, $y, $captcha, $fg); 
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
?>
