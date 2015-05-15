<?php
    include "../connect.php";
	
	$query = "SELECT Quantidade FROM promocao WHERE idPromocao =". $_GET['id'].";";
	
	$result = mysql_query($query);
	
	$row = mysql_fetch_assoc($result);
	
	$quantidade = $row['Quantidade'];
	
	$query = "SELECT QuantidadeTicket FROM empresa WHERE CNPJ ='". $_COOKIE['empcnpj'] ."';";
	
	$result = mysql_query($query);
	
	$row = mysql_fetch_assoc($result);
	
	$quantidade = $quantidade + $row['QuantidadeTicket'];
	
	$query = "UPDATE empresa SET QuantidadeTicket =". $quantidade . " WHERE CNPJ='". $_COOKIE['empcnpj'] ."';";
	
	mysql_query($query);
	
    $query = "DELETE FROM promocao WHERE idPromocao =". $_GET['id']. " AND Empresa_CNPJ ='" . $_COOKIE['empcnpj'] ."';";
	
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem", "Promoção removida com sucesso!!");
	header("Location: painelemp.php");
?>