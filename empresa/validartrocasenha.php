<?php
    include "../connect.php";

    $query = "SELECT * FROM Empresa WHERE email='".$_POST['usermail']."' AND CodigoConfirmacao='".$_POST['codigo']."'";

    $result = mysql_query($query);
	
	$row = mysql_fetch_assoc($result);
	
	$num_row = mysql_num_rows($result);

	if($num_row>0)
	{

	    $senha = hash("sha512",$_POST['newpass']);
	    $query = "UPDATE Empresa SET Senha='".$senha."', CodigoConfirmacao='' WHERE CNPJ='".$row['CNPJ']."'";
	    mysql_query($query) or die(mysql_error());
		setcookie("empmansage","Senha redefinida com sucesso!!");
		header("Location: index.php");
	}
	else
	{
		setcookie("empmansage","Combinação de e-mail e código não existente!!");
		header("Location: index.php");
	}
?>