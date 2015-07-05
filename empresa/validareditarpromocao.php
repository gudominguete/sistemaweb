<?php
    include "../connect.php";
    try{
	    $id = $_POST['id'];
	    $estado = $_POST['estado'];
	    $usuario = $_POST['usuario'];
	    $idPromocao = $_POST['idpromocao'];
	    $query = "UPDATE Compra SET Estado='".$estado."' WHERE idCompra=".$id;
		mysql_query($query) or die(mysql_error());
		$query = "SELECT * FROM Promocao WHERE idPromocao=".$idPromocao.";";
	    $result = mysql_query($query);
	    $row = mysql_fetch_assoc($result);
	    if($estado == "C")
	    {
	    	
	        $query = "UPDATE CompraporEmpresa SET Experiencia=Experiencia+".$row['Pontos']." WHERE Usuario_idFacebookUsuario='".$usuario."' AND Empresa_CNPJ='".$_COOKIE['empcnpj']."'";
	        mysql_query($query) or die(mysql_error());
	        setcookie("empmensagem", "Compra aprovada com sucesso!");
		    header("Location: painelemp.php");
	    }
	    else if($estado == "X")
	    {
	    	$query = "UPDATE CompraporEmpresa SET Token=Token+".$row['ValorTokens']." WHERE Usuario_idFacebookUsuario='".$usuario."' AND Empresa_CNPJ='".$_COOKIE['empcnpj']."'";
	    	$result = mysql_query($query);
	        setcookie("empmensagem", "Compra cancelada com sucesso!");
		    header("Location: painelemp.php");
	    }
    }
	catch(Exception $e)
	{
		setcookie("empmensagem", $e->GetMessage());
		header("Location: painelemp.php");
	}
?>