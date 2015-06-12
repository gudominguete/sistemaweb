<?php 
	include "../connect.php";
	
	$query = "INSERT INTO RegraDePontuacao(Empresa_CNPJ,Pontos,Preco,Tokens)
	VALUES ('".$_COOKIE['empcnpj']."',".$_POST['regraponto'].",".$_POST['regrapreco'].",".$_POST['regratoken'].");";
	
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem","Regra de pontuação criada com sucesso!!");
	header("Location: painelemp.php");
?>