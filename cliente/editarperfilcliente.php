<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint - Editar Cadastro</title>
	</head>
	<body>
	<?php 
	    echo $_COOKIE['clientenewlogin'];
	?>
	<br>
	<form action="validareditarcliente.php" method="post">
	CPF:<input type="text" name="clientecpf" value='<?php echo $_COOKIE['clientecpf'] ?>'><br>
	Nome:<input type="text" name="clientenome" value='<?php echo $_COOKIE['clientenome'] ?>'><br>
	E-mail:<input type="text" name="clienteemail" value='<?php echo $_COOKIE['clienteemail'] ?>'><br>
	Telefone:<input type="text" name="clientetelefone" value='<?php echo $_COOKIE['clientetelefone'] ?>'><br>
	Data nascimento:<input type="date" name="clientedatanasc" value='<?php echo $_COOKIE['clientedatanasc'] ?>'><br>
	<input type="hidden" name="clientelogin" value='<?php echo $_COOKIE['clientenewlogin'];?>'>
	<input type="submit" value="Enviar">
	</form>
	</body>
</html>