<!DOCTYPE html>
<body>
<?php 
    include "../connect.php";
    $query = "SELECT * FROM comprapontos WHERE Empresa_CNPJ = '".$_COOKIE['empcnpj']."'";
	
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		echo "Quantidade: ".$row['QuantidadePontos']." <br>Valor: ".$row['Valor']."<br>Data: ".$row['Data']."<br>Estado:".$row['Estado'];
	}
?>
</body>
</html>