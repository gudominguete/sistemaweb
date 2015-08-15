<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Rabbat - Recuperação de Senha</title>
</head>

	<body>
		<form action="validartrocasenha.php" method="post">
        	E-mail:<input type="email" name="usermail"><br>
        	Senha:<input type="password" name="newpass" id="newpass"><br>
        	Repita a senha:<input type="password" name="newreppass" id="newreppass"><br>
        	<?php echo "<input type='hidden' name='codigo' value='".$_GET['id']."'>"; ?>
            <input type="submit" value="Enviar"><br />
         </form>
	</body>
</html>