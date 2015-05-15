<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Promopoint - Criar novo ticket</title>
</head>

<body>
	<form action="validarcriarpromocao.php" method="post" id="promoform">
    	Nome:<input type="text" name="nome"><br>
        Preço:<input type="text" name="preco"><br>
        Descrição:<br><textarea rows="4" cols="50" name="descricao" form="promoform"> </textarea><br>
        <input type="submit" value="Criar">
    </form>
</body>
</html>