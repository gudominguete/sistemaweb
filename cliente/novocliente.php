<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>PromoPoint - Novo login</title>
		<script type="text/javascript" src="../script/jquery.js"></script>
   		<script src="../script/index.js"></script>
	</head>
	<body onload="testAPI2();">
	<?php 
	    echo $_COOKIE['clientenewlogin'];
	?>
	<br>

	<form action="validarnovologincliente.php" method="post">
	<input type="hidden" id="idUsuarioFacebook" name="idUsuarioFacebook"><br>
	Nome:<div id="nome2UsuarioFacebook"></div>
	<input type="hidden" id="nomeUsuarioFacebook" name="clientenome"><br>
	E-mail:<div id="email2UsuarioFacebook"></div>
	<input type="hidden" id="emailUsuarioFacebook" name="clienteemail"><br>
	<input type="hidden" id="genderUsuarioFacebook" name="genderUsuarioFacebook"><br>
	CPF:<input type="text" name="clientecpf"><br>

	Telefone:<input type="text" name="clientetelefone"><br>
	Data nascimento:<input type="date" name="clientedatanasc"><br>
	<input type="hidden" name="clientelogin" value='<?php echo $_COOKIE['clientenewlogin'];?>'>
	<input type="submit" value="Enviar">
	</form>
	
    <button onclick="testAPI();">Teste</button>
    <script>
    var id;

    function testAPI2(){
   	FB.getLoginStatus(function(response) {
        statusChangeCallback2(response);
        FB.api('/me', function(response) {
		document.getElementById("idUsuarioFacebook").value = response.id;
		document.getElementById("emailUsuarioFacebook").value = response.email;
		document.getElementById("email2UsuarioFacebook").innerHTML = response.email;
		document.getElementById("nome2UsuarioFacebook").innerHTML = response.name;
		document.getElementById("nomeUsuarioFacebook").value = response.name;
		document.getElementById("genderUsuarioFacebook").value = response.gender;
	    });
    });

	}
    </script>


	</body>
</html>