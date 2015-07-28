<?php
    try
    {
    	$quebra_linha = "\n";
    	$emailsender = "noreply@petasoft.com.br";
    	$nomeremetente = "Petasoft";
    	$emaildestinatario = "teste@petasoft.com.br";
    	$comcopia = "";
    	$comcopiaoculta = "";
    	$assunto = "Teste";
    	$mensagem = "Conteudo";
    	$mensagemHTML= "";


    	$headers  = "MIME-Version: 1.1".$quebra_linha;
    	$headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
    	$headers .= "From: ".$emailsender.$quebra_linha;
    	$headers .= "Return-Path: ".$emailsender.$quebra_linha;
    	$headers .= "Cc: ".$comcopia.$quebra_linha;
    	$headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
    	$headers .= "Reply-To: ".$emailsender.$quebra_linha;

    	mail($emaildestinatario,$assunto, $mensagem, $headers, "-r".$emailsender);
    	print "E-mail enviado com sucesso!";
	}
	catch(Exception $e)
	{
		echo $e->GetMessage();
//		header("Location: editaremp.php");
		
	}

    //header("Location: index.php");
?>