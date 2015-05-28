<?php
    include "../connect.php";
	
	$query = "SELECT * FROM administrador WHERE Login='". $_POST['adminlog']."'";
	
	$result = mysql_query($query);
	if(!$result)
	{
		die('Invalid query: ' . mysql_error());
	}
	else if(mysql_num_rows($result) == 0)
	{
		setcookie('adminmensagem', "Não foi possivel realizar o login, verifica seu login e senha!");
		header("Location:index.php");
	}
	$row = mysql_fetch_assoc($result);
	$senha = hash("sha512",$_POST['adminpass']);
	if($senha == $row['senha'])
	{
		setcookie("adminname",$row['Nome']);
		setcookie("adminemail",$row['email']);
		setcookie("adminlogin",$row['Login']);
		setcookie("adminlogado",true);
		header("Location:paineladm.php");
	}
	else
	{
		setcookie('adminmensagem', "Não foi possivel realizar o login, verifica seu login e senha!");
		header("Location:index.php");
	}
?>