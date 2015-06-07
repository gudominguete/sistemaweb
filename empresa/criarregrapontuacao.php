<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Criar regra de pontuação</title>
<link rel=”stylesheet” type=”text/css” href='empresa.css' />
</head>
<body>
	<h1>Regra de pontuação</h1>
	<form action="validarnovaregra.php" method="post">
	Pontos: <input type="number" min="0" name="regraponto"><br>
	Tokens: <input type="number" min="0" name="regratoken"><br>
	A cada: <input type="number" min="0" name="regrapreco"><br>
	<input type="submit" value="Confirmar"> 
	</form>
</body>
</html>