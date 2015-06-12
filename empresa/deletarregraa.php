<?php 
    include "../connect.php";
	
	$query = "DELETE FROM RegraDePontuacao WHERE idRegraDePontuacao =". $_GET['id']. " AND Empresa_CNPJ ='" . $_COOKIE['empcnpj'] ."';";
	
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem", "Promoção removida com sucesso!!");
	header("Location: painelemp.php")
?>