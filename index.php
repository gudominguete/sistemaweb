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

		<div  class="fb-like" data-share="true" data-width="450" data-show-faces="true">
       </div>

		<div>
		</div>
	<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '928328460534156',
           xfbml      : true,
           version    : 'v2.3'
        });
      };

    (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
        
	</body>
</html>