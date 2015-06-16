<?php
    include "connect.php";
    $query = "SELECT * FROM Empresa WHERE Login ='". $_GET['id']."';";
    $result = mysql_query($query);
    $row = mysql_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint - <?php echo $row['Nome'];?></title>
	</head>
	<body>
		<?php 
			echo $row['Nome']."<br>";
			echo "E-mail: ".$row['email']."<br>";
			echo "Telefone: ".$row['Telefone']."<br>";
			echo "Telefone 2: ".$row['Telefone2']."<br>";
			echo "Cidade: ".$row['Cidade']."<br>";
			echo "Endereço: ". $row['Endereco']."<br>";
			echo "Bairro: ". $row['Bairro']."<br>";
			$cnpj = $row['CNPJ'];
			$query = "SELECT * FROM Promocao WHERE Empresa_CNPJ='".$cnpj."';";
			$result = mysql_query($query);

			while($row2 = mysql_fetch_array($result))
			{
				if($row2['Quantidade']> 0)
				{
				    echo "Nome: ".$row2['Nome']. "<br>";
				    echo "Descrição: ". $row2['Descricao']."<br>";
				    echo "Quantidade: ". $row2['Quantidade']."<br>";
				    echo "Tokens necessários: ". $row2['ValorTokens']."<br>";
				    echo "Pontos recebidos: ". $row2['Pontos']."<br>";
				    echo "<button>Comprar</button>";
				}
			}
		?>
	</body>
</html>