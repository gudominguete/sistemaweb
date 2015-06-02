<?php 
    setcookie("adminlogado", false);
	setcookie("adminmensagem", "Logout realizado com sucesso!");
	header("Location: index.php");
?>