<?php 
	include "connect.php";
	
	$query = "SELECT * FROM usuario WHERE idFacebookUsuario ='". $_POST['login']."';";
	
	$result = mysql_query($query);
	
	$num_rows = mysql_num_rows($result);
	if($num_rows>0)
	{
		
	    $row = mysql_fetch_assoc($result);
		setcookie("clientenewlogin",$_POST['login']);
		setcookie("clientelogado",true);
    	setcookie("clientelogin",$row['idFacebookUsuario']);
	    setcookie("clientecpf",$row['CPF']);
	    setcookie("clienteemail",$row['Email']);
		setcookie("clientenome",$row['Nome']);
		setcookie("clientetelefone",$row['Telefone']);
		setcookie("clientedatanasc",$row['DataNascimento']);
		setcookie("clientenivel",$row['Nivel']);
		setcookie("clienteexperiencia",$row['Experiencia']);
		header("Location: cliente/index.php");
	}
	else
	{	
		setcookie('clientenewlogin',$_POST['login']);
		header("Location: cliente/novocliente.php");
	}
?>