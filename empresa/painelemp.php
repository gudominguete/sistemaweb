<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Empresa - Painel Administrativo</title>
<link rel=”stylesheet” type=”text/css” href='empresa.css' />
</head>
<body>
    <a href="criarregrapontuacao.php">Criar regra de pontuação</a><br>
    <a href="verificarcompras.php"> Verificar compras pontos</a><br>
	<a href="atribuirpontos.php">Atribuir pontos</a><br>
    <a href="criarnovapromocao.php">Criar nova promoção</a><br>
    <a href="comprarpontos.php">Comprar pontos</a><br>
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
				echo "<h1>". $_COOKIE['empmensagem']."</h1>";
				setcookie('empmensagem','');
			}
		    $login =  $_COOKIE['emplogin'];
		    echo "Login: " . $login . "<br>"; 
			$query = "SELECT * FROM Empresa WHERE Login = '" . $login . "'";
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
			$query = "SELECT COUNT(*) as total FROM Compra WHERE Promocao_Empresa_CNPJ='".$_COOKIE['empcnpj']."';";
			$result = mysql_query($query);
			$row = mysql_fetch_assoc($result);
			echo "Você tem:". $row['total'] ." compras para aprovar!<br>";
			$query = "SELECT * FROM Promocao WHERE Empresa_CNPJ='".$_COOKIE['empcnpj']."'";
	    	$result = mysql_query($query);
		    while($row = mysql_fetch_array($result))
		    {
		    	echo "<div class='painelpromocao'>Nome:". $row['Nome'] ;
		    	echo " - Pontos: ".$row['Pontos']." - Quantidade: ". $row['Quantidade'] ;
		    	echo " - Data Limite: ".$row['DataFinal'] ." - Descrição: " . $row['Descricao'] ." - Tokens:".$row['ValorTokens']."<button onclick=VerPromocao(". $row['idPromocao'].")>Ver Promoção</button></div>";
		    }
			
			echo"<h1> Regras de pontuação</h1><br>";
			$query = "SELECT * FROM RegraDePontuacao WHERE Empresa_CNPJ='".$_COOKIE['empcnpj']."';";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result))
			{
				echo "<div>A cada : ".$row['Preco']." reais o cliente ganha: ".$row['Pontos']." pontos de experiencia e ".$row['Tokens']." Tokens
				|<button onclick=EditarRegra(". $row['idRegraDePontuacao'].")>Editar regra</button>|<button onclick=DeletarRegra(". $row['idRegraDePontuacao'].")>Deletar regra</button></div><br>";
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
	function EditarRegra(id)
	{
		location.href="editarregra.php?id="+id;
	}
	function DeletarRegra(id)
	{
		if (confirm('Tem certeza que quer deletar essa regra?')) {
    	    location.href ="deletarregraa.php?id="+id;
		} else {
    	// Do nothing!
		}
	}
	function VerPromocao(id)
	{
		location.href="verpromocao.php?id="+id;
	}
	</script>
</body>
</html>