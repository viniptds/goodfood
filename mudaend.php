<?php session_start();
	 if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
require 'conexao.php'?>
<html lang="en">
<meta charset="UTF-8">
 <head>
 <title>Alterando meu Endereço</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  </head>
<?php include "cabecalho.php";?>
<br><br><br><br>
<?php 
$user=$_SESSION['user'];
$sql="select * from cliente where USER='$user'";
$resul=mysqli_query($conexao,$sql) or die(mysql_error());
	while($row=mysqli_fetch_assoc($resul))
		{
			echo"<script>alert('Insira seu novo ENDEREÇO');</script>";
			echo"Endereço antigo: ".$row['ENDERECO']."<br>";
		}
		?>
		<form action='finaliza.php' name="form1" method='post'>Novo endereço: <input type='text' name='end'><br>
		<button style="width:80px; height:30px;"id='sub' type="submit" value="Enviar" ></form>
		