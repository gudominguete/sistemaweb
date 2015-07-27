<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Editar regra de pontuação</title>
<link rel=”stylesheet” type=”text/css” href='empresa.css' />
</head>
<body>
    <?php
        include "../connect.php";
        $query = "SELECT * FROM RegraDePontuacao WHERE idRegraDePontuacao=".$_GET['id']." AND Empresa_CNPJ = '". $_COOKIE['empcnpj'] ."';"; 
        $result = mysql_query($query);
		$row = mysql_fetch_assoc($result);
		
	?>
	<h1>Regra de pontuação</h1>
	<form action="validareditarregra.php" method="post">
	Pontos: <input type="number" min="0" name="regraponto" value='<?php echo $row['Pontos'];?>'><br>
	Tokens: <input type="number" min="0" name="regratoken" value='<?php echo $row['Tokens'];?>'><br>
	A cada: <input type="number" min="0" name="regrapreco" value='<?php echo $row['Preco'];?>'><br>
	<input type="hidden" name='regraid' value='<?php echo $row['idRegraDePontuacao'];?>'>
	<input type="submit" value="Confirmar"> 
	</form>
</body>
</html>