<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Esqueci Minha Senha</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
 <script type="text/javascript">
function validar()
{
	if (document.form1.email.value=="" || document.form1.email2.value=="")
	{
		alert("Preencha o(s) campo(s)")
		return false;
	}
	else
	if(document.form1.email.value != document.form1.email2.value)
	{
		alert("Campos não coincidem!")
		return false;
	}
}
 </script>
 <link rel="shortcut icon" href="favico.ico" type="image/x-icon" />
  </head>
 <?php include('cabecalho.php');?>
<br><br><br><br><fieldset style="width:300px;">
 Digite seu email para trocar sua senha!
    <br>
    <br>
     <form name="form1" action="novasenha.php" method="post">
		E-mail:<br>
		<input type="text" name="email" size=35> 
				<br><BR>
				Confirma e-mail: <br>
				<input type="text" name="email2" size=35> <br><br>
		<center><input type="submit" value="Entrar" onclick="validar()"></center><br>
		   <a href="login.php"><font size=3 >Login</font></a><br>
		   <a href="index.php"><font size=3 >Página Inicial</a>
   </form> 	
    </fieldset>
 </body>
</html>
