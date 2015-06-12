<?php 
    include "../connect.php";
	try{
		$query = "UPDATE RegraDePontuacao SET Pontos=".$_POST['regraponto'].", Preco=".$_POST['regrapreco'].", Tokens=".$_POST['regratoken']." WHERE idRegraDePontuacao=".$_POST['regraid'].";";
		mysql_query($query) or die(mysql_error());
		setcookie("empmensagem", "Regra editada com sucesso!");
		header("Location: painelemp.php");
	}
	catch(Exception $e)
	{
		setcookie("empmensagem", $e->GetMessage());
		header("Location: painelemp.php");
	}
?>