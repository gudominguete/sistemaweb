<?php
    try{
    	include "../connect.php";
		$query = "UPDATE promocao SET Quantidade = Quantidade - ". $_POST['ticket']." WHERE idPromocao =".$_POST['id'].";";
	
		mysql_query($query);
		$ticket = $_COOKIE['empticket'] + $_POST['ticket'];
	
		$query = "UPDATE empresa SET QuantidadeTicket=".$ticket. " WHERE CNPJ='".$_COOKIE['empcnpj']."';";
		mysql_query($query);
	
		setcookie("empmensagem", "Tickets removido com sucesso!");
		header("Location: painelemp.php");
	}
	catch(Exception $e)
	{
		echo $e->GetMenssage();
		header("Location: adicionarticketspromocao.php");
	}
?>