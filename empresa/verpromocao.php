<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Promoção</title>
</head>

<body>
<?php
    include "../connect.php";
	$query = "SELECT * FROM promocao WHERE idPromocao=". $_GET['id'] ." AND Empresa_CNPJ=". $_COOKIE['empcnpj'].";";
	$result = mysql_query($query);
	
	$row = mysql_fetch_assoc($result);
	echo "Nome: ". $row['Nome']."<br>";
	echo "Preço: ". $row['Preco']."<br>";
	echo "Descrição: ". $row['Descricao']."<br>";
	echo "Quantidade: ". $row['Quantidade']."<br>";
	echo "Tickets:<br>";
	$query = "SELECT * FROM compra WHERE Promocao_idPromocao =". $_GET['id'].";";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		echo $row['Codigo']."<br>";		
	}
	echo "<button onclick=AdicionarTickets(". $_GET['id'].");>Adicionar ou remover Tickets</button><br>";
	echo "<button onclick=EditarPromocao(". $_GET['id'].");>Editar</button><br>";
	echo "<button onclick=ConfirmaCancelar(". $_GET['id'].");>Deletar</button><br>";
	if(isset($_COOKIE['compramensage']))
	{
		echo $_COOKIE['compramensage'];
		setcookie('compramensage', "");
	}
?>
    <button onclick=<?php echo "Gerar1codigo(".$_GET['id'].")"?>>Gerar 1 código</button>
    <button onclick=<?php echo "Gerarvarioscodigos(".$_GET['id'].")"?>>Gerar todos os códigos</button>
    
    
    <script>
	function ConfirmaCancelar(id)
	{
		if (confirm('Tem certeza que quer deletar essa promoção?')) {
    	    location.href ="cancelarpromocao.php?id="+id;
		} else {
    	// Do nothing!
		}
		
	}
    function EditarPromocao(id)
	{
		location.href="editarpromocao.php?id="+id;
	}
	function AdicionarTickets(id)
	{
		location.href="adicionarticketspromocao.php?id="+id;
	}
	function Gerar1codigo(id)
	{
		location.href="gerarumcodigo.php?id="+id;
	}
	function Gerarvarioscodigos(id,quantidade)
	{
		location.href="gerarvarioscodigos.php?id="+id;
	}
	</script>
</body>
</html>