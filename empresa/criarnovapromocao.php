<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Promopoint - Criar novo ticket</title>
</head>

<body>
	<form action="validarcriarpromocao.php" method="post" id="promoform">
    	Nome:<input type="text" name="nome"><br>
        Quantidade de tokens necessários para a compra:<input type="number" name="tokens" min="0"><br>
		Quantidade de pontos ganhos pela compra:<input type="number" name="pontos" min="0"><br>
        Descrição:<br><textarea rows="4" cols="50" name="descricao" form="promoform"> </textarea><br>
        <input type="submit" value="Criar">
    </form>
</body>
</html>