<?php
    include "../connect.php";

	function randString($size){
        //String com valor possíveis do resultado, os caracteres pode ser adicionado ou retirados conforme sua necessidade
        $basic = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $return= "";

        for($count= 0; $size > $count; $count++){
            //Gera um caracter aleatorio
            $return.= $basic[rand(0, strlen($basic) - 1)];
        }

        return $return;
    }

    $query = "SELECT * FROM Empresa WHERE email='".$_POST['usermail']."'";

    $result = mysql_query($query);
	
	$row = mysql_fetch_assoc($result);
	
	$num_row = mysql_num_rows($result);
	if($num_row >0)
	{
		//TODO enviar e-mail
		$codigoconfirmacao = randString(20);
		$query = "UPDATE Empresa SET CodigoConfirmacao='".$codigoconfirmacao."' WHERE email='".$_POST['usermail']."'";
		mysql_query($query) or die(mysql_error());
		$quebra_linha = "\n";
	    $emailsender = "noreply@petasoft.com.br";
	    $nomeremetente = "Petasoft";
	    $emaildestinatario = $_POST['usermail'];
	    $comcopia = "";
	    $comcopiaoculta = "";
	    $assunto = "Recuperação de senha do aplicativo Rabbat";
	    $mensagem = "<p>Ola,<p>";
	    $mensagem .= "<p>Para finalizar trocar a senha de sua conta basta clicar no link abaixo e seguir os procedimentos indicado no site:<p>";
	    $mensagem .= "<p><a href='http://www.petasoft.com.br/empresa/recuperacaosenha.php?id=".$codigoconfirmacao."'>Recuperacao de Senha</a></p>";
	    $mensagem .= "<p>Agradecemos o uso de nosso site.</p>";

	    $headers  = "MIME-Version: 1.1".$quebra_linha;
	    $headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
	    $headers .= "From: ".$emailsender.$quebra_linha;
	    $headers .= "Return-Path: ".$emailsender.$quebra_linha;
	    $headers .= "Cc: ".$comcopia.$quebra_linha;
	    $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
	    $headers .= "Reply-To: ".$emailsender.$quebra_linha;

	    mail($emaildestinatario,$assunto, $mensagem, $headers, "-r".$emailsender);

        setcookie("empmensage","E-mail para recuperação de senha enviado, favor seguir os passos indicados nele.");
		header("Location: forgetpassword.php");         
	}
	else
	{
		setcookie("empmensage","E-mail não existe no sistema!");
		header("Location: forgetpassword.php");
	}

?>