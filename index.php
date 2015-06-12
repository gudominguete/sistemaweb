<?php
    include "setcookie.php";
	include "connect.php";
?>
<!DOCTYPE html>
<html >
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint</title>
	</head>
	<body>
    	<!--<a href="administrador/index.php">Página do Administrador</a><br>-->
        <a href="empresa/index.php">Página do empresario</a><br>
		<br>
		<form action="validarlogincliente.php" method="post">
		Login:<input type="text" name="login">
		<input type="submit" value="Login com Facebook">
		</form>
		
        
	</body>
</html>