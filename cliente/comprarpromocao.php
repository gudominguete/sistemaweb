<?php
    include "../connect.php";
    $idpromocao = $_GET['id'];
    $cnpj = $_GET['cnpj'];
    $clientelogin = $_COOKIE['clientelogin'];

			$query = "SELECT Token FROM Compraporempresa WHERE Usuario_idFacebookUsuario ='". $_COOKIE['clientelogin'] ."' AND Empresa_CNPJ = '". $cnpj."';";
			$result = mysql_query($query);
			$num_rows = mysql_num_rows($result);
	        if($num_rows === 0)
	        {
	        	setcookie("usermensage","Você não tem pontos suficientes para comprar a promoção!");
	        	header("Location: index.php");
	        }
	        else{
	        	$row = mysql_fetch_assoc($result);
	        	$pontos = $row['Token'];
	        	$query = "SELECT ValorTokens FROM Promocao WHERE idpromocao=".$idpromocao.";";
                $result = mysql_query($query);
	        	$row = mysql_fetch_assoc($result);
	        	$qtdadetokens = $row['ValorTokens'];
	        	if($pontos < $qtdadetokens)
	        	{
	        		setcookie("usermensage","Você não tem pontos suficientes para comprar a promoção!");
	        	    header("Location: index.php");
	        	}
	        	else
	        	{
	        		    $query = "INSERT INTO Compra(Usuario_idFacebookUsuario,Promocao_idPromocao,Promocao_Empresa_CNPJ, DataCompra, Estado) 
                        Values('".$clientelogin."',".$idpromocao.",'".$cnpj."',CURDATE(),'A');";
                        mysql_query($query) or die(mysql_error());
                        $query = "UPDATE Compraporempresa SET Token=Token-".$qtdadetokens." WHERE Usuario_idFacebookUsuario ='". $_COOKIE['clientelogin'] ."' AND Empresa_CNPJ = '". $cnpj."';";
                        mysql_query($query) or die(mysql_error());
                        $query = "UPDATE Promocao SET Quantidade=Quantidade-1 WHERE idPromocao=".$idpromocao.";";
                        mysql_query($query) or die(mysql_error());
                        setcookie("usermensage", "Compra efetuada com sucesso, por favor esperar a empresa confirmar a compra!");
                        header("Location: index.php");
	        	}
	        }
    header("Location: index.php");

?>