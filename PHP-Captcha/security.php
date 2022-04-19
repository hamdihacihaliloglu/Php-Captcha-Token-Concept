<?php
/*
imagecreate() fonksiyonunu kullanabilmek için 
php.ini dosyasında ;extension=gd satırını extension=gd olarak değiştirdiğinizden emin olun.
*/
	session_start();
	header('Content-type: image/jpeg');

	$code=substr(md5(mt_rand(0,9999999)),0,6);
	$_SESSION["code"]=$code;


	$image = imagecreate(100,30);
	$bg_color=imagecolorallocate($image ,135,206,250);
	$text_color= imagecolorallocate($image ,14,14,14);


	imagestring($image,25,18,13,$code,$text_color);

	imagejpeg($image,NULL,100);

	imagedestroy($image);


?>


