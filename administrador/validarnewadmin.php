<?php
    include "../connect.php";
	$nome = $_POST["adminname"];
	$login = $_POST["newlogin"];
	$senha = $_POST["newpass"];
	$email = $_POST["adminmail"];
	
	$senha = hash("sha512",$senha);
	
	$query = "INSERT INTO Administrador(Login,senha,Nome,email) VALUES('".$login."','".$senha."','".$nome."','".$email."')";
	mysql_query($query) or die(mysql_error());
	
	setcookie("adminmensagem","Administrador criado com sucesso!");
	header("Location: index.php");
?>