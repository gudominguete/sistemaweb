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
	<body >
        <a href="empresa/index.php">Página do empresario</a><br>
		<br>
	<!--	<form action="validarlogincliente.php" method="post">
		Login:<input type="text" name="login">
		<input type="submit" value="Login com Facebook">
		</form>-->

		<div  class="fb-like" data-share="true" data-width="450" data-show-faces="true">
       </div>

		<div>
		</div>

    
    <fb:login-button scope="public_profile,email" onlogin="checkLoginState(0);">
    </fb:login-button>

    <div id="status">
    </div>

    <button onclick="testAPI()">Teste</button>
    <!-- Incluir arquivo de scripts -->
    <script type="text/javascript" src="script/jquery.js"></script>
    <script src="script/index.js"></script>
	</body>
</html>