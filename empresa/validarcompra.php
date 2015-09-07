<?php
    include "../connect.php";
	date_default_timezone_set('America/Sao_Paulo');
    $data = date('Y-m-d');
	
	$valor = ($_POST['quantidade'] *0.1)+3;
	$valorboleto = ($_POST['quantidade']/10)+300;
    
    $query = "SELECT * FROM Empresa WHERE CNPJ='". $_COOKIE['empcnpj']."'";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);

	
    $url = "https://go.gerencianet.com.br/teste/api/pagamento/xml";
    $token = "AA0351B94F9315330973E0AB0D7EB4DE72B62E1A";
 
	$xml = "<?xml version='1.0' encoding='utf-8'?>
	 <integracao>
	 <itens>
	 <item>
	 <itemValor>$valorboleto</itemValor>
	 <itemDescricao>Compra de pontos no sistema Rabbat</itemDescricao>
	 </item>
	 </itens>
	 <cliente>
	 <nome>".$row['Nome']."</nome>
	 <cpf>".$row['CNPJ']."</cpf>
	 <email>".$row['email']."</email>
	 <nascimento>".$row['DataCriacao']."</nascimento>
	 <celular>".$row['Telefone']."</celular>
	 <logradouro>".$row['Endereco']."</logradouro>
	 <numero>".$row['Numero']."</numero>
	 <bairro>".$row['Bairro']."</bairro>
	 <cidade>".$row['Cidade']."</cidade>
	 <cep>".$row['CEP']."</cep>
	 <estado>".$row['Estado']."</estado>
	 </cliente>
	 </integracao>";
	 
	$xml = str_replace(array("\n", "\r", "\t"), '', $xml);
	 
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	$data = array("token" => $token, "dados" => $xml);
	 
	curl_setopt($ch, CURLOPT_POST, true);
	 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	 
	curl_close($ch);

	$xml = simplexml_load_string($response);

    //header("Location:". $xml->resposta->link);

	$query = "INSERT INTO CompraPontos (Empresa_CNPJ,QuantidadePontos, Valor,Data,Estado, Link) VALUES('". $_COOKIE['empcnpj']."',".$_POST['quantidade'].",".$valor.",CURDATE(),'A','".$xml->resposta->link."')";

	mysql_query($query) or die(mysql_error());
	setcookie("empmensagem", "Compra realizada com sucesso, por favor aguarde a confirmação do pagamento!");
	setcookie("boletolink",$xml->resposta->link);
	header("Location: boleto.php");
?>