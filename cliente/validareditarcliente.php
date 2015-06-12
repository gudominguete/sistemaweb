<?php
    include "../connect.php";
	
	setcookie("clientecpf",$_POST['clientecpf']);
	setcookie("clienteemail",$_POST['clienteemail']);
	setcookie("clientenome",$_POST['clientenome']);
	setcookie("clientetelefone",$_POST['clientetelefone']);
	setcookie("clientedatanasc",$_POST['clientedatanasc']);
	$datanascimento = $_POST['clientedatanasc'];
	
	$query = "UPDATE Usuario SET CPF='".$_POST['clientecpf']."', Email='".$_POST['clienteemail']."', Nome='".$_POST['clientenome']."', 
	Telefone='".$_POST['clientetelefone']."', DataNascimento=STR_TO_DATE('$datanascimento', '%Y-%m-%d') WHERE idFacebookUsuario='".$_COOKIE['clientenewlogin']."'";
	
	mysql_query($query)or die(mysql_error());
	
	setcookie("usermensage","Cadastro editado com sucesso!");
	header("Location: index.php");
?>