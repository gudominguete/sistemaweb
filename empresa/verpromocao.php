<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Promoção</title>
</head>

<body>
<?php
    include "../connect.php";
	$query = "SELECT * FROM promocao WHERE idPromocao=". $_GET['id'] ." AND Empresa_CNPJ=". $_COOKIE['empcnpj'].";";
	$result = mysql_query($query);
	
	$row = mysql_fetch_assoc($result);
	echo "Nome: ". $row['Nome']."<br>";
	echo "Pontos: ". $row['Pontos']."<br>";
	echo "Tokens: ". $row['ValorTokens']."<br>";
	echo "Descrição: ". $row['Descricao']."<br>";
	echo "Quantidade: ". $row['Quantidade']."<br>";
	echo "Compras de usuário:<br>";
	$query = "SELECT * FROM compra WHERE Promocao_idPromocao =". $_GET['id'].";";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		echo $row['Usuario_idFacebookUsuario']."<br>";
		echo $row['DataCompra']."<br>";		
	}
	echo "<button onclick=EditarPromocao(". $_GET['id'].");>Editar</button><br>";
	echo "<button onclick=ConfirmaCancelar(". $_GET['id'].");>Deletar</button><br>";
	if(isset($_COOKIE['compramensage']))
	{
		echo $_COOKIE['compramensage'];
		setcookie('compramensage', "");
	}
?>
 
    
    <script>
	function ConfirmaCancelar(id)
	{
		if (confirm('Tem certeza que quer deletar essa promoção?')) {
    	    location.href ="cancelarpromocao.php?id="+id;
		} else {
    	// Do nothing!
		}
		
	}
    function EditarPromocao(id)
	{
		location.href="editarpromocao.php?id="+id;
	}

	</script>
</body>
</html>