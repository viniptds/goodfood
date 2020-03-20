<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="./s1/style.css"/>
  <script src='https://www.google.com/recaptcha/api.js'></script>
 <script type="text/javascript">
function valida()
{
	if (document.form1.user.value=="" || document.form1.senha.value=="")
	{
		alert("Preencha os campos");
		return false;
	}
	else
    if(document.form1.senha.value.length<8)
	{
	    alert("Campo SENHA menor que 8 caracteres");
	    return false;
	}
	else{
	    document.form1.submit();
		return true;
	}
} </script>
  </head>
<?php include "./view/_includes/header.php";?>

<br>
<br>
<br>
<div class="formlogin">
    <fieldset  style="width:200px; border-color:#bb2026; border-radius:10px">
        
	 <form name="form1" action="entrando.php" method="post" onsubmit="return valida();">
	 <label for="login" >Tipo Usuario: </label>
	 <select name="tipo" style="height:25px; width:80px; font-size:15px;"">
	 <option>Cliente</option>
	 <option>Parceiro</option>
	 </select>
	 <br><BR>
	  
		<label for="login">Login: </label>
		<input type="text" name="user">
		<br><BR>
		<label for="pass">Senha: </label>
		<input type="password" name="senha">
		<BR><br>
		<div id="bot">
		    <input type="reset" value="Limpar" style="font-size:15px;;width:70px; height:30px;">
			<input type="submit" id='sub' value="Entrar" onclick="validar()"  style="width:70px; height:30px; font-size:15px;">  
			<br><br>
	</form>
	<div id="nv">
			<a href="esqueci.php"> Esqueci minha senha</a>
		</div>
	<br>
	<br>	<div id="pg">
		 <a href="index.php"> Página Inicial</a>
	</div>
	<br>
	<div id="cd">
		<a href="cadastro.php">Cadastrar</a>
	</div>

	</fieldset>
	<br>
</div>
 </div>
 </body>
</html>
