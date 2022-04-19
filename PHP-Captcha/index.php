<?php
session_start(); 
@$code=$_SESSION["code"];  
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

if($_POST){
	if(isset($_POST["email"])){
		$gelenEmail		=	Guvenlik($_POST["email"]);
	}else{
		$gelenEmail		=	"";
	}
	if(isset($_POST["security"])){
		$gelenGuvenlik		=	Guvenlik($_POST["security"]);
	}else{
		$gelenGuvenlik		=	"";
	}

	if($gelenGuvenlik!=$code){
		echo("Girilen kod hatalı");
	}else{
		echo("Girilen kod doğru <br>");
		echo $gelenEmail;
	}
}else{
?>
<div class="d-flex justify-content-center">
	<div class="card bg-light shadow-sm">
		<form action="index.php" method="POST">
			<div class="mb-3">
				<label class="form-label">Email Adresiniz:</label>
				<input class="form-control " type="email" name="email">
			</div>
			<div class="mb-3">
				<label class="form-label">Güvenlik Kodu:</label><img src="security.php">
				<input class="form-control " type="text" name="security">
			</div>
			<div class="d-grid">
				<input class="form-group btn btn-success btn-lg" type="submit" value="Send">
			</div>
		</form>
	</div>
</div>
<?php
}
?>

</body>
</html>