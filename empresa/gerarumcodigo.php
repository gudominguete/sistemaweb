<?php
    include "../connect.php";
	
	
	$query = "SELECT * FROM promocao WHERE EMPRESA_CNPJ='".$_COOKIE['empcnpj']."' AND idPromocao=". $_GET['id'].";";
	$result = mysql_query($query);
	$row= mysql_fetch_assoc($result);
	if($row['Quantidade']>0)
	{ 
		$qtd = $row['Quantidade'];
		$qtd = $qtd -1;
	    setcookie("compramensage",$qtd);
		$query = "UPDATE promocao SET Quantidade=".$qtd." WHERE EMPRESA_CNPJ='".$_COOKIE['empcnpj']."' AND idPromocao=". $_GET['id'].";";
		mysql_query($query);
		$cod = "";
		for($cont =1;$cont<=16;$cont++)
		{
			$cod = $cod. rand(0,9);
		}
		$query = "INSERT INTO compra(Promocao_idPromocao,Promocao_Empresa_CNPJ,Codigo) VALUES (". $_GET['id'].", ".$_COOKIE['empcnpj'].", ". $cod.");";
		mysql_query($query) or die(mysql_error());
		setcookie("compramensage", "Código gerado com sucesso!");
	}
	else
	{
		setcookie("compramensage", "Não foi possivel gerar o código!");
	}
	
	header("Location: verpromocao.php?id=".$_GET['id']);
?>