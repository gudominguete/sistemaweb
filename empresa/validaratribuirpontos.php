<?php
    include "../connect.php";
	$cnpj = $_COOKIE['empcnpj'];
	$logincliente = $_POST['clientelogin'];
	$preco = $_POST['precocliente'];
	$precototal = $preco;
	$pontos = 0;
	
	// Verificar se possui pontuação

	$query = "SELECT QuantidadeTicket FROM empresa WHERE CNPJ='".$cnpj."';";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$qtdadepontos = $row['QuantidadeTicket'];
	
	$query = "SELECT * FROM RegraDePontuacao WHERE Empresa_CNPJ='".$cnpj."' ORDER BY preco DESC;";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
	    $pontos = $pontos + ($preco/$row['Preco']);
		$preco = $preco % $row['Preco'];
	}
	if($qtdadepontos>=$pontos)
	{
		// Decrementar a pontuação no saldo da empresa
		$query = "UPDATE Empresa SET QuantidadeTicket = QuantidadeTicket-".$pontos." WHERE CNPJ='".$cnpj."';";
		mysql_query($query) or die(mysql_error());
		// Incrementar a pontuação no saldo do cliente
		$query = "UPDATE Usuario SET Experiencia = Experiencia+".$pontos." WHERE idFacebookUsuario='".$logincliente."';";
		mysql_query($query) or die(mysql_error());
		// Quardar informações da compra
		$query = "INSERT INTO CompraProduto(Preco,Usuario_idFacebookUsuario,Empresa_CNPJ,Data) 
		VALUES (".$precototal.",'".$logincliente."','".$cnpj."',CURDATE())";
		mysql_query($query) or die(mysql_error());
		// TODO verificar se passou de nivel
		setcookie("empmensagem","Pontos atribuidos com sucesso!");
		header("Location: atribuirpontos.php");
	}
	else
	{
		setcookie("empmensagem","Saldo de pontos insuficiente!");
		header("Location: painelemp.php");
	}
	
?>