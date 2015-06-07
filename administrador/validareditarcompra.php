<?php
    include "../connect.php";
	try{
		$id = $_POST['idcompraponto'];
		$estado = $_POST['status'];
	
		$query = "UPDATE comprapontos SET Estado = '". $estado ."', Administrador_Login='". $_COOKIE['adminlogin']."' WHERE idCompraPontos=".$id.";";
		mysql_query($query);

		if($estado == 'C')
		{
			$query = "UPDATE empresa SET QuantidadeTicket = QuantidadeTicket+".$_POST['QuantidadePontos']." WHERE CNPJ='".$_POST['empresacnpj']."';";
			mysql_query($query);
		}
	
		setcookie("paineladmmsg", "Compra alterada com sucesso!");
		header("Location: paineladm.php");
	}
	catch(Exception $e)
	{
		setcookie("paineladmmsg", $e->GetMessage());
		header("Location: paineladm.php");
		
	}
?>