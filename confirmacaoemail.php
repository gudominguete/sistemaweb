<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Rabbat - Confimação de E-mail de Empresa</title>
	</head>
    <body>
    	<?php
    	    include "connect.php";
    	    $codigo = $_GET['id'];

    	    $query = "SELECT *, Count(*) as total FROM Empresa WHERE CodigoConfirmacao='".$codigo."'";
    	    $result = mysql_query($query);
            $row = mysql_fetch_assoc($result);
    	    if($row['total']>0){
                if($row['Confirmado']=='N')
                {
        	    	$query = "UPDATE Empresa SET Confirmado='S' WHERE CNPJ='".$row['CNPJ']."';";
        	    	mysql_query($query);

        	    	echo "E-mail confirmado com sucesso!";
                }
                else
                {
                    echo "E-mail já confirmado!";
                }
    	    }
			else
			{
				echo "Codigo de confirmação não existente";	
			}
    	?>
    	<a href="empresa/index.php">Tela de login</a>
    	<a href="index.php"> Tela inicial</a>
    </body>
</html>