<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<title></title>
</head>
<body>

<?php
function Guvenlik($Deger){
	$BoslukSil			=	trim($Deger);
	$TaglariTemizle		=	strip_tags($BoslukSil);
	$EtkisizYap			=	htmlspecialchars($TaglariTemizle, ENT_QUOTES);
	$Sonuc				=	$EtkisizYap;
	return $Sonuc;
}

if(isset($_POST["Ad"])){
	$gelenAd		=	Guvenlik($_POST["Ad"]);
}else{
	$gelenAd		=	"";
}

if(isset($_POST["Soyad"])){
	$gelenSoyad		=	Guvenlik($_POST["Soyad"]);
}else{
	$gelenSoyad		=	"";
}

if(!$_POST){
	$token=md5(uniqid(mt_rand(),true));
	$_SESSION["token"]=$token;
?>
<div class="d-flex justify-content-center">
	<div class="card bg-light shadow-sm">
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="mb-3">
				<label class="form-label">Adınız:</label>
				<input class="form-control " type="text" name="Ad">
			</div>
			<div class="mb-3">
				<label class="form-label">Soyadınız:</label>
				<input class="form-control " type="text" name="Soyad">
			</div>
			<div class="d-grid">
				<input type="hidden" name="token" value="<?php echo $token; ?>">
			</div>
			<div class="d-grid">
				<input class="form-group btn btn-success btn-lg" type="submit" value="Send">
			</div>
		</form>
	</div>
</div>
<?php

}else{

	if ($_POST["token"]!==$_SESSION["token"]) {
		echo "Yetkisiz Giriş";
	}else{
		echo "Hoşgeldiniz. <br>";
		echo $gelenAd ." ". $gelenSoyad;
	}
}
?>

</body>
</html>