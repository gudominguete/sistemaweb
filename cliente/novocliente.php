<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint - Novo login</title>
	</head>
	<body>
	<?php 
	    echo $_COOKIE['clientenewlogin'];
	?>
	<br>
	<form action="validarnovologincliente.php" method="post">
	CPF:<input type="text" name="clientecpf"><br>
	Nome:<input type="text" name="clientenome"><br>
	E-mail:<input type="text" name="clienteemail"><br>
	Telefone:<input type="text" name="clientetelefone"><br>
	Data nascimento:<input type="date" name="clientedatanasc"><br>
	<input type="hidden" name="clientelogin" value='<?php echo $_COOKIE['clientenewlogin'];?>'>
	<input type="submit" value="Enviar">
	</form>
	</body>
</html>