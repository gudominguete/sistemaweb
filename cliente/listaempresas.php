<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Rabbat - Listagem de cidades</title>
	</head>
	<body>
		<?php
			include "../connect.php";
			$query = "SELECT * FROM Empresa WHERE Cidade LIKE'%". $_POST['procuraremrpesa']."%';";

			$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
		    {
		    	echo "<div>";
		    	echo "Nome: ".$row['Nome'] ." - Endereço: ".$row['Endereco']. " - Bairro: " .$row['Bairro']. "- Telefone: ".$row['Telefone']."<br>";
		    	echo "<button onclick=E". $row['CNPJ'].")>Ver Empresa</button>";
		    	echo "</div><br>";
		    }	
		?>
	</body>
</html>