<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Verificar compra de ticket</title>
</head>
	<body>
    <form action="validarcancelamentoticket.php" method="post">
    <table border="1">
    <tr><td>Quantidade Ticket</td><td> Valor</td><td>Data</td><td>Estado</td><td>Cancelar</td></tr>
<?php
	$empcnpj = $_COOKIE['empcnpj'];
	
    include "../connect.php";
	
	$query = "SELECT * FROM CompraTicket WHERE Empresa_CNPJ = '" . $empcnpj . "'";
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		echo "<tr><td>". $row['QuantidadeTicket'] ."</td><td>". $row['Valor']."</td><td>". $row['Data']."</td><td>". $row['Estado']."</td>";
		if($row['Estado'] == 'A')
		{
			echo "<td><a href='validarcancelamentoticket.php?id=".$row['idCompraTicket'] ."'>Cancelar</a></td>";
		}
		echo "</tr>";
	}
	
?>
</table>
<a href="painelemp.php"> Voltar</a>
	</body>
</html>