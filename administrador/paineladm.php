<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>PromoPoint - Painel do administrador</title>
</head>
<body>
<?php
    if(isset($_COOKIE["paineladmmsg"]))
	{
		echo $_COOKIE["paineladmmsg"];
		setcookie("paineladmmsg","");
	}
    include "../connect.php";
	
    $query = "SELECT * FROM comprapontos WHERE Estado = 'A'";
	$result = mysql_query($query);
	
	while($row = mysql_fetch_array($result))
	{
		echo "<div>ID: ".$row['idCompraPontos']." CNPJ: ". $row['Empresa_CNPJ'] ." 
		Quantidade pontos: ".$row['QuantidadePontos']." Valor: ".$row['Valor']." Data: ".$row['Data']." Estado: ". $row['Estado']."
		<form name='compra".$row['idCompraPontos']."' action='validareditarcompra.php' method='post'>
		<input type='hidden' name='empresacnpj' value=".$row['Empresa_CNPJ'].">
		<input type='hidden' name='QuantidadePontos' value=".$row['QuantidadePontos'].">
		<input type='hidden' name='idcompraponto' value=".$row['idCompraPontos'].">
		<select name='status' >
			<option value='C'>Confirmado</option>
			<option value='A'>Aguardando</option>
			<option value='R'>Cancelado</option>
<		</select>
        <input type='submit' value='Confirmar'>
		</form></div><br>";
	}
?>
   <a href="validarlogout.php">Logout</a>
</body>
</html>