<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint - Painel Cliente</title>
	</head>
	<body onload="checkLoginState(1)">
		<form action="listaempresas.php" method="post" id="pesquisa">
			Procurar: <input type="Text" name="procuraremrpesa">
			<input type='submit' value="Procurar">
		</form>
		<a href="editarperfilcliente.php">Editar Perfil</a><br>
		<a href="../index.php">Logout</a><br>
		<?php
			echo "Login: ". $_COOKIE['clientelogin']."<br>";
			echo "CPF:" . $_COOKIE['clientecpf']."<br>";
			echo "E-mail: ". $_COOKIE['clienteemail']."<br>";
			echo "Nome: ". $_COOKIE['clientenome']."<br>";
			echo "Telefone: ".$_COOKIE['clientetelefone']."<br>";
			echo "Data de nascimento:" . $_COOKIE['clientedatanasc']."<br>";
			echo "Nivel: " .$_COOKIE['clientenivel']."<br>";
			echo "Experiencia: ". $_COOKIE['clienteexperiencia']."<br>";

   		if(isset($_COOKIE['usermensage']))
		{
			echo $_COOKIE['usermensage'];
			setcookie("usermensage","");
		}		
		?>
		<script src="../script/index.js"></script>
	</body>
</html>