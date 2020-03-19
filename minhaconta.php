<?php session_start();
if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
	 ?><html>
<head>
  <meta charset="UTF-8">
  <title> Minha Conta</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  </head>
 <?php include('cabecalho.php');?>
<br>
<br>
<div id="fieldmc" >
    <a href="meuspedidos.php">Meus Pedidos</a>
    <br><br>
    
    <a href="pessoal.php">Dados Pessoais</a>
    <br><br>
    <a href="novasenha.php">Trocar Senha</a>
</div>
 </body>
</html>