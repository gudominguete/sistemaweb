<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Promopoint - Editar Promoção</title>
</head>

<body>
<?php
    include "../connect.php";
	$id = $_GET['id'];
	
	$query = "SELECT * FROM promocao WHERE idPromocao = ". $id .";";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_assoc($result);
	$nome = $row['Nome'];
	$pontos = $row['Pontos'];
	$tokens = $row['ValorTokens'];
	$descricao = $row['Descricao'];
	
?>
	<form action="validareditarpromo.php" method="post" id="promoform">
    	<input type="hidden" name="id" value='<?php echo $id ?>'/>
    	Nome:<input type="text" name="nome" value='<?php echo $nome ?>'><br>
        Pontos a ser recebidos na compra:<input type="number" name="pontos" value='<?php echo $pontos ?>' min='0'><br>
		Tokens necessários para a compra:<input type="number" name="tokens" value='<?php echo $tokens ?>' min='0'><br>
        Descrição:<br><textarea rows="4" cols="50" name="descricao" form="promoform" ><?php echo $descricao ?> </textarea><br>
        <input type="submit" value="Editar">
    </form>	
    
    <?php 
		if(isset($_COOKIE['uptpromo']))
		{
			echo $_COOKIE['uptptomo'];
		}
	?>
</body>
</html>