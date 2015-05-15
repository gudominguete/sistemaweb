<?php
    include "../connect.php";
    $nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	
	$query = "INSERT INTO promocao(Preco,Quantidade,Empresa_CNPJ,Nome,Descricao) VALUES (". $preco.",0,'". $_COOKIE['empcnpj']."','". $nome."','".$descricao ."')";
	mysql_query($query) or die(mysql_error());
	
	setcookie("empmensagem","Promoção criada com sucesso!");
	header("Location: painelemp.php");
?>