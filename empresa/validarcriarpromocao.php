<?php
    include "../connect.php";
    $nome = $_POST['nome'];
	$pontos = $_POST['pontos'];
	$tokens = $_POST['tokens'];
	$descricao = $_POST['descricao'];
	
	$query = "INSERT INTO promocao(Pontos,Quantidade,Empresa_CNPJ,Nome,Descricao,ValorTokens) VALUES (". $pontos.",0,'". $_COOKIE['empcnpj']."','". $nome."','".$descricao ."',".$tokens.")";
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem","Promoção criada com sucesso!");
	header("Location: painelemp.php");
?>