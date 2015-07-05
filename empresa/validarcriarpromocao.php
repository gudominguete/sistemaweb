<?php
    include "../connect.php";
    $nome = $_POST['nome'];
	$pontos = $_POST['pontos'];
	$tokens = $_POST['tokens'];
	$descricao = $_POST['descricao'];
	$datafinal = $_POST['datalimite'];
	$query = "INSERT INTO Promocao(Pontos,Quantidade,Empresa_CNPJ,Nome,Descricao,ValorTokens, DataFinal) VALUES (". $pontos.",0,'". $_COOKIE['empcnpj']."','". $nome."','".$descricao ."',".$tokens.",STR_TO_DATE('".$datafinal."', '%Y-%m-%d'))";
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem","Promoção criada com sucesso!");
	header("Location: painelemp.php");
?>