<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Promoção</title>
</head>

<body>
<?php
    include "../connect.php";
	$query = "SELECT * FROM Promocao WHERE idPromocao=". $_GET['id'] ." AND Empresa_CNPJ=". $_COOKIE['empcnpj'].";";
	$result = mysql_query($query);
	if(isset($_COOKIE['empmensagem']))
	{
		echo "<h1>". $_COOKIE['empmensagem']."</h1>";
    	setcookie('empmensagem','');
	}
	$num = mysql_num_rows($result);
	if($num == 0)
	{
		header("Location: ../permissaonegada.php");
	}
	$row = mysql_fetch_assoc($result);
	echo "Nome: ". $row['Nome']."<br>";
	echo "Pontos: ". $row['Pontos']."<br>";
	echo "Tokens: ". $row['ValorTokens']."<br>";
	echo "Descrição: ". $row['Descricao']."<br>";
	echo "Quantidade: ". $row['Quantidade']."<br>";
	echo "Data limite: ". $row["DataFinal"]."<br>";
	echo "Compras de usuário:<br>";
	$query = "SELECT * FROM Compra INNER JOIN Usuario ON Compra.Usuario_idFacebookUsuario = Usuario.idFacebookUsuario WHERE Compra.Promocao_idPromocao =". $_GET['id']." AND Compra.Estado<>'C';";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		echo "Nome: ". $row['Nome']."<br>";
		echo "Data da compra: ".$row['DataCompra']."<br>";
        echo "Estado: ".$row['Estado']."<br>";
        echo "<form action='validareditarpromocao.php' method='post'>";
        echo "<select name='estado'>";
        echo "<option value='C'>Concluido</option>";
        echo "<option value='A'>Aguardar</option>";
        echo "<option value='X'>Cancelar</option>";
        echo "</select><br>";
        echo "<input type='hidden' name='id' value=".$row['idCompra'].">";
        echo "<input type='hidden' name='usuario' value=".$row['Usuario_idFacebookUsuario'].">";
        echo "<input type='hidden' name='idpromocao' value=".$_GET['id'].">";
        echo "<input type='submit' value='Editar compra'><br>";
        echo "</form>";
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