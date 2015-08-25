<?php 
    include "../connect.php";
	
	$query = "DELETE FROM RegraDePontuacao WHERE idRegraDePontuacao =". $_GET['id']. " AND Empresa_CNPJ ='" . $_COOKIE['empcnpj'] ."';";
	$num = mysql_num_rows($result);
	if($num == 0)
	{
		header("Location: ../permissaonegada.php");
	}
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem", "Promoção removida com sucesso!!");
	header("Location: painelemp.php")
?>