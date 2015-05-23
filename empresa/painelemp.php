<?php
    
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Empresa - Painel Administrativo</title>
<link rel=”stylesheet” type=”text/css” href='empresa.css' />
</head>
<body>
    <a href="#"> Verificar compras pontos</a><br>
    <a href="criarnovapromocao.php">Criar nova promoção</a><br>
    <a href="#">Comprar pontos</a><br>
    <a href="editaremp.php">Editar perfil</a><br>
    <a href="logoutemp.php">Logout </a><br>
<?php
	include "../connect.php";
    if(isset($_COOKIE['emplogado']))
	{
        $logado = $_COOKIE['emplogado'];
	    if($logado == true)
	    {
			if(isset($_COOKIE['empmensagem']))
			{
				echo $_COOKIE['empmensagem'];
				setcookie('empmensagem','');
			}
		    $login =  $_COOKIE['emplogin'];
		    echo "Login: " . $login . "<br>"; 
			$query = "SELECT * FROM empresa WHERE Login = '" . $login . "'";
			$result = mysql_query($query);
			if(!$result)
	        {
				setcookie('emploginerror',true);
				setcookie('emplogado',false);
	        	die('Invalid query: ' . mysql_error());
	        }
	        $num_rows = mysql_num_rows($result);
	        if($num_rows === 0)
	        {
		        setcookie('emploginerror',true);
		    	setcookie("emplogado",false);
		        header("Location: index.php");
	        }
			$row = mysql_fetch_assoc($result);
			setcookie("emplogado", true, time()+3600*24);
		    setcookie("emplogin",$row['Login']);
		    setcookie("empnome",$row['Nome']);
			echo "Nome: ". $row['Nome'] . "<br>";
	     	setcookie("empcnpj",$row['CNPJ']);
			echo "CNPJ: ". $row['CNPJ'] . "<br>"; 
		    setcookie("empticket",$row['QuantidadeTicket']);
			echo "Tickets disponíveis: ". $row['QuantidadeTicket'] . "<br>";
		    setcookie("empemail", $row['email']);
			echo "E-mail: ". $row['email'] . "<br>";
		    setcookie("emptel1",$row['Telefone']);
			echo "Telefone: ". $row['Telefone'] . "<br>";
		    setcookie("emptel2",$row['Telefone2']);
			echo "Telefone2: ". $row['Telefone2'] . "<br>";
		    setcookie("empcity",$row['Cidade']);
			echo "Cidade: ". $row['Cidade'] . "<br>";
		    setcookie("empend",$row['Endereco']);
			echo "Endereço: ". $row['Endereco'] . "<br>";
		    setcookie("empbairro",$row['Bairro']);
			echo "Bairro: ". $row['Bairro'] . "<br>";
			$query = "SELECT * FROM promocao WHERE Empresa_CNPJ='".$_COOKIE['empcnpj']."'";
	    	$result = mysql_query($query);
		    while($row = mysql_fetch_array($result))
		    {
		    	echo "<div class='painelpromocao'>Nome:". $row['Nome'] ." - Pontos: ".$row['Pontos']." - Quantidade: ". $row['Quantidade'] .
				" - Descrição: " . $row['Descricao'] ." - Tokens:".$row['ValorTokens']."<button onclick=VerPromocao(". $row['idPromocao'].")>Ver Promoção</button></div>";
		    }
			
	    }
		else
		{
			
			setcookie("emplogado",false);
			header("Location: index.php");
		}
	}
	else
	{
		header("Location: index.php");
	}    
	?>
    <script>
	function VerPromocao(id)
	{
		location.href="verpromocao.php?id="+id;
	}
	</script>
</body>
</html>