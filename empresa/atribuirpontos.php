<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Atribuir pontos ao cliente</title>
<link rel=”stylesheet” type=”text/css” href='empresa.css' />
</head>
	<body>
	<?php
	    if(isset($_COOKIE['empmensagem']))
		{
			echo $_COOKIE['empmensagem'];
			setcookie("empmensagem","");
		}
	?>
		Atribuir pontos ao cliente
		<form action="validaratribuirpontos.php" method="post">
			E-mail do cliente:<input type="email" name="clienteemail"><br>
			Preço da compra:<input type="number" name="precocliente" min="0" step="0.1"><br>
			<input type="submit" value="Confirmar">
		</form>
	</body>
</html>