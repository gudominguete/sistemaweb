<?php
	include "../connect.php";
	$login = $_POST["userlog"];
	$pass = $_POST["userpass"];
	$pass = hash("sha512",$pass);
	$query = "SELECT * FROM Empresa WHERE Login = '" . $login . "'";
	
	$result = mysql_query($query);
	
	if(!$result)
	{
		die('Invalid query: ' . mysql_error());
	}
	$num_rows = mysql_num_rows($result);
	if($num_rows === 0)
	{
		setcookie('empmensage',"Login ou senha errados!");
		header("Location: index.php");
	}
	$row = mysql_fetch_assoc($result);
	if($row['Confirmado']=='S')
	{
		if($row['Senha'] == $pass)
		{
			echo "Login efetuado com sucesso!";
			setcookie("emplogado", true, time()+3600*24);
			setcookie("emplogin",$row['Login']);
			setcookie("empcnpj", $row['CNPJ']);
			header("Location: painelemp.php");
		}
		else
		{
			setcookie('empmensage',"Login ou senha errados!");
			header("Location: index.php");
		}
    }
    else
    {
    	setcookie('empmensage',"E-mail ainda não foi confirmado!");
		header("Location: index.php");
    }
?>