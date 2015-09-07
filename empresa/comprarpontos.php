<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Promopoint - Comprar pontos</title>
        <script type="text/javascript" language="javascript" src="../script/jquery.js"></script>
	</head>
    <body>
	<form action="validarcompra.php" method="post" onSubmit="ValidarCompra()" >
	    Quantidade de pontos:<input id="quantidadepontos" type="number" name="quantidade" min="0" onchange="CalcularPreco()"><br>
		Valor:<input id="valorpontos" type="text" name="valor" disabled><br>
		<input type="submit" value="Confirmar">
	</form>
	<div id="error"></div>
	<script>
	function CalcularPreco()
	{
		var quantidade = parseInt(document.getElementById("quantidadepontos").value);
		var valor = quantidade * 0.1;
		var arredondado = parseFloat(valor.toFixed(2));
		document.getElementById("valorpontos").value = arredondado;
	}
	jQuery(function($){
			$('form').submit(function(){
				if(!ValidarCompra())
				{
				    return false;	
				}
			});
		});
	function ValidarCompra()
	{
		var flag =0;
		var error = document.getElementById("error");
		error.innerHTML ="";
		var strerror="<p>O(s) campo(s) estão vazios:</p>";
		if (document.getElementById("quantidadepontos").value.length <=0)
		{
			strerror += "<p>Quantidade de pontos</p><br>";
			flag =1;
		}
		
		
		if(flag==1)
		{
			error.innerHTML=strerror;
			return false;
		}
		else
		{
			return true;
		}
	}
	</script>
	</body>
</html>