<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Administrador</title>
</head>

	<body>

 		<form action="validarloginadm.php" method="post">
            Login:<input type="text" name="adminlog"><br>
            Senha:<input type="password" name="adminpass"><br>
            <input type="submit" value="Login"><br />
        </form>
        <a href="newadminacount.php">Criar nova conta de administrador</a><br>
		<?php
		if(isset($_COOKIE['adminmensagem']))
		{
			echo $_COOKIE['adminmensagem'];
			setcookie("adminmensagem","");
		}
		?>
	</body>
</html>