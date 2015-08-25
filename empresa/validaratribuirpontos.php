<?php
    include "../connect.php";
	$cnpj = $_COOKIE['empcnpj'];
	$email = $_POST['clienteemail'];
	$preco = $_POST['precocliente'];
	$precototal = $preco;
	$pontos = 0;
	$tokens = 0;
	// Verificar se possui pontuação

	$query = "SELECT QuantidadeTicket FROM Empresa WHERE CNPJ='".$cnpj."';";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	$qtdadepontos = $row['QuantidadeTicket'];
	
	$query = "SELECT * FROM RegraDePontuacao WHERE Empresa_CNPJ='".$cnpj."' ORDER BY preco DESC;";
	$result = mysql_query($query);
	$num = mysql_num_rows($result);
	if($num==0)
	{
		setcookie("empmensagem","Não possui regras de pontuação!");
		header("Location: atribuirpontos.php");

	}
	while($row = mysql_fetch_array($result))
	{
		$mult = (int)($preco/$row['Preco']);
	    $pontos = $pontos + ($mult*$row['Pontos']);
		$preco = $preco % $row['Preco'];
		$tokens = $tokens + ($mult*$row['Tokens']);
	}
	if($qtdadepontos>=$pontos)
	{
		// Decrementar a pontuação no saldo da empresa
		$query = "UPDATE Empresa SET QuantidadeTicket = QuantidadeTicket-".$pontos." WHERE CNPJ='".$cnpj."';";
		mysql_query($query) or die(mysql_error());

		// Incrementar a pontuação no saldo do cliente
		$query = "UPDATE Usuario SET Experiencia = Experiencia+".$pontos." WHERE Email='".$email."';";
		mysql_query($query) or die(mysql_error());
		$query = "SELECT * FROM Usuario WHERE Email='".$email."';";
		$result = mysql_query($query);
		$row = mysql_fetch_assoc($result);

		// TODO VERIFICAR SE EXISTE UMA LINHA NA TABELA Compraporempresa

		$query = "SELECT COUNT(*) as total FROM Compraporempresa WHERE Empresa_CNPJ='".$cnpj."' AND Usuario_idFacebookUsuario='".$row['idFacebookUsuario']."'";
		$result = mysql_query($query);
		$row2 = mysql_fetch_assoc($result);

        // Se tiver, atualizar a linha com o valor da compra
        if($row2['total'] > 0)
        {
        	$query = "UPDATE Compraporempresa Set Experiencia=Experiencia+".$pontos.", Token=Token+".$tokens." 
        	WHERE Empresa_CNPJ='".$cnpj."' AND Usuario_idFacebookUsuario='".$row['idFacebookUsuario']."'";
		    mysql_query($query) or die(mysql_error());
        }
        // Se não tiver, inserir uma linha nova
        else
        {
            $query = "INSERT INTO Compraporempresa(Usuario_idFacebookUsuario,Empresa_CNPJ,Experiencia,Token) 
            VALUES ('".$row['idFacebookUsuario']."', '". $cnpj."',".$pontos.",".$tokens.");";
            mysql_query($query) or die(mysql_error());
        }
		// Quardar informações da compra
		$query = "INSERT INTO CompraProduto(Preco,Usuario_idFacebookUsuario,Empresa_CNPJ,Data) 
		VALUES (".$precototal.",'".$row['idFacebookUsuario']."','".$cnpj."',CURDATE())";
		mysql_query($query) or die(mysql_error());
		// TODO verificar se passou de nivel
		setcookie("empmensagem","Pontos atribuidos com sucesso!");
		header("Location: atribuirpontos.php");
	}
	else
	{
		setcookie("empmensagem","Saldo de pontos insuficiente!");
		header("Location: painelemp.php");
	}
	
?>