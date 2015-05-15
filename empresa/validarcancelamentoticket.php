<?php
    include "../connect.php";
    $query = "DELETE FROM compraticket WHERE idCompraTicket = " . $_GET['id'];
	
	mysql_query($query) or die(mysql_error());
	header("Location: painelemp.php");
?>