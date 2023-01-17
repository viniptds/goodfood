<?php 
session_start(); 

require "conexao.php";
include 'config.php';

?>
<html lang="en">
  <meta charset="UTF-8">
 <head>
  <title>Trocar Minha Senha</title>
   <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/s1/style.css"/>
 <script type="text/javascript">
function validar()
{
	if (document.form1.newpass.value=="" || document.form1.newpass2.value=="")
	{
		alert("Preencha o(s) campo(s)")
		return false;
	}
	else if(document.form1.newpass.length<8 || document.form1.newpass2.length<8){
	    alert("Campo SENHA deve conter pelo menos 8 caracteres!");
	    return false;
	}
	else
	if(document.form1.newpass.value != document.form1.newpass2.value)
	{
		alert("Campos não coincidem!")
		return false;
	}
}
 </script>
  </head>
  <?php
	include ("cabecalho.php");
  ?>
  <br><br><br>
     <form name="form1" action="trocasenha.php" method="post" onsubmit="return validar();">
	<?php
	if(isset($_POST['email'])){
		$email=$_POST['email'];
	$sql="select * from cliente where EMAIL = '$email'";
	$resul=mysqli_query($conexao,$sql) or die;
	$ln=mysqli_num_rows($res);
		if($ln=0){
	    echo"Email incorreto!";
	    echo"<script>setTimeout('window.location=('novasenha.php'),2000);</script>";
	}
	else{
	while($row=mysqli_fetch_array($resul)){
	    echo"<fieldset style='width:300px;'>";
		echo "<center>Cliente <i><b>".$row['NOME']."</b></i></center>";
		echo "<br>Usu&aacute;rio <input type='text' name='user' readonly value=".$row['USER'].">";
	}
		echo'<br><BR>
				Nova Senha: <br><input required type="password" name="newpass">
				<br><BR>
				Confirma Nova Senha: <br><input required type="password" name="newpass2"> 
				<br><BR>';
				echo'<center><input type="submit" value="Trocar Senha" onclick="validar()"></center> <br><br>
		</form> 	
<a href="login.php"><font size=3 >Login</font></a><br>
<a href="index.php"><font size=3>Página Inicial</a>
</fieldset>';
	}
	}
	else if(!isset($_POST['email']))
	{ 
		$user=$_SESSION['user'];
	$sql="select * from cliente where USER = '$user'";
	$resul=mysqli_query($conexao,$sql) or die;
	while($row= mysqli_fetch_array($resul)){
		$n=$row['NOME'];
		$us=$row['USER'];
		echo"<fieldset style='width:300px;'>";
		echo "<center>Cliente <i><b>".$n."</b></i></center><br><br>";
		echo "Usu&aacute;rio <br><input type='text' name='user' readonly value=".$us.">";
		}
				echo'<br><BR>
				Senha Antiga: <br><input required type="password" name="senha"> 
				<br><BR>
				Nova Senha: <br><input required type="password" name="newpass">
				<br><BR>
				Confirma Nova Senha: <br><input required type="password" name="newpass2"> 
				<br><BR>';
					echo'<center><input type="submit" value="Trocar Senha" onclick="validar()"style="font-size:15px;width:107px; height:30px;"><br>
					<br>
		</form> 	
<a href="login.php" " style=text-decoration:none;color:#000;"><font size=3 >Login</font></a><br><br>
<a href="index.php" style=text-decoration:none;color:#000;><font size=3>Página Inicial</a>
</center></fieldset>';
	}
				?>
   
 </body>
</html>