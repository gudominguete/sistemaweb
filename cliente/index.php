<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint - Painel Cliente</title>
	</head>
	<body>
	<a href="editarperfilcliente.php">Editar Perfil</a>
	<?php
	echo $_COOKIE['clientelogin'];
	echo $_COOKIE['clientecpf'];
	echo $_COOKIE['clienteemail'];
	echo $_COOKIE['clientenome'];
	echo $_COOKIE['clientetelefone'];
	echo $_COOKIE['clientedatanasc'];
	echo $_COOKIE['clientenivel'];
	echo $_COOKIE['clienteexperiencia'];

    if(isset($_COOKIE['usermensage']))
	{
		echo $_COOKIE['usermensage'];
		setcookie("usermensage","");
	}		
	?>
	</body>
</html>