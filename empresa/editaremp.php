<!DOCTYPE html>
<?php
    $nome = $_COOKIE['empnome'];
	$tel1 = $_COOKIE['emptel1'];
	if(isset($_COOKIE['emptel2']))
	{
	    $tel2 = $_COOKIE['emptel2'];
	}
	else $tel2 = "";
	$cidade = $_COOKIE['empcity'];
	$end = $_COOKIE['empend'];
	$bairro = $_COOKIE['empbairro'];
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Promopoint - Editar Empresa</title>
</head>

<body>
	<p>Editar cadastro empresa</p>
        <form action="validareditaremp.php" method="post" name="formulario" onSubmit="ValidarEditarEmpresa()">
        	Nome:<input type="text" name="empname" id="empname" value='<?php echo $nome; ?>'><br>
            Telefone:<input type="tel" name="emptel1" id="emptel1" value='<?php echo $tel1; ?>'><br>
            Telefone 2:<input type="tel" name="emptel2" id="emptel2" value='<?php echo $tel2; ?>'><br>
            Cidade:<input type="text" name="empcity" id="empcity" value='<?php echo $cidade; ?>'><br>
            Endereço<input type="text" name="empend" id="empend" value='<?php echo $end; ?>'><br>
            Bairro<input type="text" name="empbairro" id="empbairro" value='<?php echo $bairro; ?>'><br>
        	<input type="submit" value="Enviar">
        </form>
        
    <?php 
		if(isset($_COOKIE['uptemplog']))
		{
			echo $_COOKIE['uptemplog'];
		}
	?>
        <script>
		
		jQuery(function($){
			$('form').submit(function(){
				if(!ValidarEditarEmpresa())
				{
				    return false;	
				}
			});
		});
		
		function ValidarEditarEmpresa()
		{
			var error = document.getElementById("error");
			error.innerHTML ="";
			var strerror="<p>O(s) campo(s) estão vazios:</p>";
			var flag = true;
			if ($.trim($("#empname").val()).length == 0)
			{
				strerror += "<p>Nome</p>";
				flag =false;
			}
			if ($.trim($("#empcnpj").val()).length == 0)
			{
				strerror += "<p>CNPJ</p>";
				flag =false;
			}
			if($.trim($("#empnewlogin").val()).length == 0)
			{
				strerror+="<p>Login</p>";
				flag =false;
			}
			if($.trim($("#empmail").val()).length == 0)
			{
				strerror+="<p>E-mail</p>";
				flag =false;
			}
			if($.trim($("#empnewmail").val()).length == 0)
			{
				strerror+="<p>Repetir e-mail</p>";
				flag =false;
			}
			if($.trim($("#emptel1").val()).length == 0)
			{
				strerror+="<p>Telefone 1:</p>";
				flag =false;
			}
			if($.trim($("#empcity").val()).length == 0)
			{
				strerror+="<p>Cidade</p>";
				flag =false;
			}
			if($.trim($("#empend").val()).length == 0)
			{
				strerror+="<p>Endereço</p>";
				flag =false;
			}
			if($.trim($("#empbairro").val()).length == 0)
			{
				strerror+="<p>Bairro</p>";
				flag =false;
			}
			
			error.innerHTML=strerror;
			return flag;
			
		}
		</script>
</body>
</html>