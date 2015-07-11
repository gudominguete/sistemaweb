<?php
    include "../connect.php";
    $nome = $_POST['nome'];
	$pontos = $_POST['pontos'];
	$tokens = $_POST['tokens'];
	$descricao = $_POST['descricao'];
	$datafinal = $_POST['datalimite'];
	$quantidade = $_POST['quantidade'];
	$query = "SELECT QuantidadeTicket FROM Empresa WHERE CNPJ='".$_COOKIE['empcnpj']."'";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$total = $pontos * $quantidade;
	if($row["QuantidadeTicket"] >= $total)
	{
		$query = "UPDATE Empresa SET QuantidadeTicket=QuantidadeTicket-".$total." WHERE CNPJ='".$_COOKIE['empcnpj']."'";
		mysql_query($query) or die(mysql_error());
		$query = "INSERT INTO Promocao(Pontos,Quantidade,Empresa_CNPJ,Nome,Descricao,ValorTokens, DataFinal) VALUES (". $pontos.",".$quantidade.",'". $_COOKIE['empcnpj']."','". $nome."','".$descricao ."',".$tokens.",STR_TO_DATE('".$datafinal."', '%Y-%m-%d'))";
		mysql_query($query) or die(mysql_error());
	
		setcookie("empmensagem","Promoção criada com sucesso!");
		header("Location: painelemp.php");
	}
	else{
		setcookie("empmensagem","Pontos insuficientes para a criação da promoção!");
		header("Location: painelemp.php");
	}
?>