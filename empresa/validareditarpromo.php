<?php
    include "../connect.php";
	
	try{
		$id = $_POST["id"];
		$nome = $_POST["nome"];
		$preco = $_POST["preco"];
		$descricao = $_POST["descricao"];
		
		$query = "UPDATE promocao SET Preco=".$preco.", Nome='".$nome."', Descricao='". $descricao ."' WHERE idPromocao=".$id.";";
		mysql_query($query) or die(mysql_error());
		setcookie("empmensagem", "Promocao editada com sucesso!");
		header("Location: painelemp.php");
	}catch(Exception $e)
	{
		setcookie("uptpromo", $e->GetMessage());
		header("Location: editaremp.php");
	}
?>