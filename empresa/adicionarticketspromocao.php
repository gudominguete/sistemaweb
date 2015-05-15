<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Adicionar Tickets</title>
</head>

<body>
	<?php
    	include "../connect.php";
   		echo "Tickets disponíveis: ". $_COOKIE['empticket']; 
		
		$query = "SELECT * FROM promocao WHERE 	idPromocao =". $_GET['id'].";";
		
		$result = mysql_query($query);
		
		$row = mysql_fetch_assoc($result);
		
		$numero = $row['Quantidade'];
		echo "<br> Promoção:<br>";
		
		echo "Nome: ". $row['Nome'] ."<br>";
		echo "Preço: ". $row['Preco'] . "<br>";
		echo "Quantidade de tickets: ". $row['Quantidade']."<br>";
		echo "Descrição: ".$row['Descricao']."<br>";
	?>
    <p>Adicionar Tickets</p>   
	<form action="validaradicionarticket.php" method="post">
        <input type="hidden" name='id' value=' <?php echo $_GET['id']; ?>'>
        Quantidade:<input type="number" name="ticket" max='<?php echo $_COOKIE['empticket']; ?>' min="0">
        <input type="submit" value="Confirmar">
    </form>
    <p>Remover Tickets</p>
    <form action="validarremoverticket.php" method="post">
        <input type="hidden" name='id' value=' <?php echo $_GET['id']; ?>'>
        Quantidade:<input type="number" name="ticket" min="0" max='<?php echo $numero;?>'>
        <input type="submit" value="Confirmar">
    </form>
</body>
</html>