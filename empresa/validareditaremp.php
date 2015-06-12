<?php
    include "../connect.php";
	
    try{
    	$nome = $_POST['empname'];
		$cnpj = $_COOKIE['empcnpj'];
		$tel1 = $_POST['emptel1'];
		$tel2 = $_POST['emptel2'];
		$cidade = $_POST['empcity'];
		$end = $_POST['empend'];
		$bairro = $_POST['empbairro'];
		
		$query = "UPDATE Empresa SET Nome='". $nome."', Telefone='".$tel1."',Telefone2='".$tel2 ."', Cidade='".$cidade . "', Endereco='".$end ."', Bairro='". $bairro ."' WHERE CNPJ = '".$cnpj ."';";
		mysql_query($query);
		
		setcookie("empmensagem", "Cadastro editado com sucesso!");
		header("Location: painelemp.php");
	}catch(Exception $e)
	{
		setcookie("uptemplog", $e->GetMessage());
		header("Location: editaremp.php");
		
	}
	
?>