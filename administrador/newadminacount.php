<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PromoPoint - Nova conta do administrador</title>
    <script type="text/javascript" language="javascript" src="../script/jquery.js"></script>
</head>
	<body>
        <p>Nova conta de administrador</p>
        <form action="validarnewadmin.php" method="post"  name="formulario" onSubmit="ValidarNovoAdministrador()">
        Nome:<input type="text" name="adminname" id="adminname"><br>
        Nome do novo login:<input type="text" name="newlogin" id="newlogin"><br>
        E-mail:<input type="email" name="adminmail" id="adminmail"><br>
        Repita o e-mail:<input type="email" name="newadminmail" id="newadminmail"><br>
        Senha:<input type="password" name="newpass" id="newpass"><br>
        Repita a senha:<input type="password" name="newreppass" id="newreppass"><br>
        <input type="submit" value="Enviar">
        </form>
		
        <div id="error"></div>
        <script>
		jQuery(function($){
			$('form').submit(function(){
				if(!ValidarNovoAdministrador())
				{
				    return false;	
				}
			});
		});
		function ValidarNovoAdministrador()
		{
			var strerror="<p>O(s) campo(s) estão vazios:</p>";
			var error = document.getElementById("error");
			error.innerHTML ="";
		    var email = document.getElementById("adminmail").value;;
			var novoemail = document.getElementById("newadminmail").value;
			var senha = document.getElementById("newpass").value;
			var repitasenha =document.getElementById("newreppass").value;
			var flag =0;
			if ($.trim($("#adminname").val()).length == 0)
			{
				strerror += "<p>Nome</p>";
				flag =1;
			}
			if ($.trim($("#newlogin").val()).length == 0)
			{
				strerror += "<p>Login</p>";
				flag =1;
			}
			if ($.trim($("#adminmail").val()).length == 0)
			{
				strerror += "<p>E-mail</p>";
				flag =1;
			}
			if ($.trim($("#newadminmail").val()).length == 0)
			{
				strerror += "<p>Confirmação de e-mail</p>";
				flag =1;
			}
			if ($.trim($("#newpass").val()).length == 0)
			{
				strerror += "<p>Senha</p>";
				flag =1;
			}
			if ($.trim($("#newreppass").val()).length == 0)
			{
				strerror += "<p>Confirmação de senha</p>";
				flag =1;
			}
			if(flag ==0)
			{
			    if(!(email === novoemail))
			    {
				    strerror="<p> Os e-mails não estão identicos!</p>";
			    }
			    else 
			    {
			        if(!(senha===repitasenha))
				    {
					    strerror="<p> As senhas não estão identicas!</p>";
				    }
				    return true;
			    }
			}
			error.innerHTML=strerror;
			return false
		}
		</script>
		
	</body>
</html>