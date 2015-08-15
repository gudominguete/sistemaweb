<!DOCTYPE html>
<body>
<?php
	include "../connect.php";
	$query = "SELECT * FROM CompraProduto INNER JOIN Usuario ON CompraProduto.Usuario_idFacebookUsuario = Usuario.idFacebookUsuario WHERE Empresa_CNPJ = '".$_COOKIE['empcnpj']."';";

	$result = mysql_query($query);

	while($row = mysql_fetch_array($result))
	{
		echo "Numero da compra: ".$row['idCompraProduto']." <br>Preco: ".$row['Preco']." <br>Data: ".$row['Data']." <br>Nome do cliente: ".$row['Nome']." <br>Email: ".$row['Email']."<br><br>";
	}
?>
</body>
</html>