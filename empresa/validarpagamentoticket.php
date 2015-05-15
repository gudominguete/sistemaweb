<?php
    include "../connect.php";
	$query = "INSERT INTO compraticket(Empresa_CNPJ, Administrador_Login, QuantidadeTicket, Valor,Data,Estado) VALUES ('".$_COOKIE["empcnpj"]."','gudominguete',".$_POST["group"].",'". date("Y-m-d H:i:s") . "','A')";
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensage", "Compra feita com sucesso, esperando a aprovação do pagamento!");
	
	header("Location: painelemp.php");
?>