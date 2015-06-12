<?php
    include "../connect.php";
	
    $login = $_POST['clientelogin'];
	$cpf = $_POST['clientecpf'];
	$email = $_POST['clienteemail'];
	$nome = $_POST['clientenome'];
	$telefone = $_POST['clientetelefone'];
	$datanascimento = $_POST['clientedatanasc'];
	
	$query = "INSERT INTO Usuario(idFacebookUsuario,CPF,Email,Nome,Telefone,DataNascimento,Nivel,Experiencia)
            	VALUES ('".$login."','".$cpf."','".$email."','".$nome."','".$telefone."',STR_TO_DATE('$datanascimento', '%Y-%m-%d'),1,0);";
	mysql_query($query)or die(mysql_error());
	
	setcookie("clientelogado",true);
	setcookie("clientelogin",$login);
	setcookie("clientecpf",$cpf);
	setcookie("clienteemail",$email);
	setcookie("clientenome",$nome);
	setcookie("clientetelefone",$telefone);
	setcookie("clientedatanasc",$datanascimento);
	setcookie("clientenivel",1);
	setcookie("clienteexperiencia",0);
	setcookie("clientepainelmensagem", "Conta criada com sucesso!");
	header("Location: index.php");
?>