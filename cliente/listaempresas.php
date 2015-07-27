<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Rabbat - Listagem de cidades</title>
	</head>
	<body onload="checkLoginState(1)">
		<?php
			include "../connect.php";
			$query = "SELECT * FROM Empresa WHERE Cidade LIKE'%". $_POST['procuraremrpesa']."%' OR Nome LIKE'%". $_POST['procuraremrpesa']."%';";

			$result = mysql_query($query);

			while($row = mysql_fetch_array($result))
		    {
		    	echo "<div>";
		    	echo "Nome: ".$row['Nome'] ." - Endereço: ".$row['Endereco']. " - Bairro: " .$row['Bairro']. "- Telefone: ".$row['Telefone']."<br>";
		    	echo "<button onclick=VerEmpresa('". $row['Login']."')>Ver Empresa</button>";
		    	echo "</div><br>";
		    }	
		?>

		<script>
		function VerEmpresa(login)
		{
			location.href="empresa.php?id="+login;
		}
		</script>
		
    <script src="../script/index.js"></script>
	</body>
</html>