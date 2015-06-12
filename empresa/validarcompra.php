<?php
    include "../connect.php";
	date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
	
	$valor = $_POST['quantidade'] *0.01;
	$query = "INSERT INTO CompraPontos (Empresa_CNPJ,QuantidadePontos, Valor,Data,Estado) VALUES('". $_COOKIE['empcnpj']."',".$_POST['quantidade'].",".$valor.",CURDATE(),'A')";

	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem", "Compra realizada com sucesso, por favor aguarde a confirmação do pagamento!");
	
	header("Location: painelemp.php");
?>