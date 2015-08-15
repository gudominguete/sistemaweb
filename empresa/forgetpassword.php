<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rabbat - Recuperação de Senha</title>
</head>

	<body>
		<form action="envioemailforgotpass.php" method="post">
        	E-mail:<input type="email" name="usermail"><br>
            <input type="submit" value="Enviar"><br />
         </form>
         <?php
            if(isset($_COOKIE['empmensage']))
			{
				echo $_COOKIE['empmensage'];
				setcookie('empmensage',"");
			}
         ?>
	</body>
</html>