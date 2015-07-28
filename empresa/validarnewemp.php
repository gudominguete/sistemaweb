<?php
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

    function enviarEmail($codigo, $email)
    {
    	
    }


    include "../connect.php";
	$nome = $_POST["empname"];
	$login = $_POST["empnewlogin"];
	$email = $_POST["empmail"];
	$tel1 = $_POST["emptel1"];
	$tel2 = $_POST["emptel2"];
	$cidade = $_POST["empcity"];
	$end = $_POST["empend"];
	$bairro = $_POST["empbairro"];
	$senha = $_POST["newpass"];
	$cnpj = $_POST["empcnpj"];
	
	$senha = hash("sha512",$senha);


    $codigoconfirmacao = randString(20);
    $quebra_linha = "\n";
    $emailsender = "noreply@petasoft.com.br";
    $nomeremetente = "Petasoft";
    $emaildestinatario = $email;
    $comcopia = "";
    $comcopiaoculta = "";
    $assunto = "Confirmacao de cadastro no aplicativo Rabbat";
    $mensagem = "<p>Ola,<p>";
    $mensagem .= "<p>Para finalizar o cadastro de sua empresa baste confirmar seu e-mail clicando no link abaixo:<p>";
    $mensagem .= "<p><a href='http://www.petasoft.com.br/confirmacaoemail.php?id=".$codigoconfirmacao."'>http://www.petasoft.com.br/confirmacaoemail.php?id=".$codigoconfirmacao."</a></p>";
    $mensagem .= "<p>Agradecemos o cadastro.</p>";

    $headers  = "MIME-Version: 1.1".$quebra_linha;
    $headers .= "Content-type: text/html; charset=iso-8859-1".$quebra_linha;
    $headers .= "From: ".$emailsender.$quebra_linha;
    $headers .= "Return-Path: ".$emailsender.$quebra_linha;
    $headers .= "Cc: ".$comcopia.$quebra_linha;
    $headers .= "Bcc: ".$comcopiaoculta.$quebra_linha;
    $headers .= "Reply-To: ".$emailsender.$quebra_linha;

    mail($emaildestinatario,$assunto, $mensagem, $headers, "-r".$emailsender);

	$query = "INSERT INTO Empresa(CNPJ, Login,email, Telefone,Telefone2,Cidade,Endereco,Bairro,Nome, Senha,QuantidadeTicket, Confirmado, CodigoConfirmacao) 
	VALUES ('". $cnpj ."','". $login . "','" . $email . "','" . $tel1 . "','" . $tel2 . "','" . $cidade . "','" . $end . "','" . $bairro . "','" . $nome . "','" . $senha . "',0,'N','".$codigoconfirmacao."')";
	mysql_query($query) or die(mysql_error());
	


	setcookie("empcriarlogin",true);
	
	header("Location: index.php");
?>
