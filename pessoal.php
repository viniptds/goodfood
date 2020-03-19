<?php session_start();
if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
require "conexao.php";
?>
<html>
<head>
  <meta charset="UTF-8">
  <title> Minha Conta</title>
   <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  </head>
  <body>

  <?php include('cabecalho.php');?>

<?php
$user=$_SESSION['user'];
$mostra="select COD_CLI,NOME,date_format(DATA_N,'%d/%m/%Y') as DATA_N,EMAIL,ENDERECO,CEP,TEL,CPF from cliente where USER = '$user'";
$result=mysqli_query($conexao,$mostra) or die;
while($row= mysqli_fetch_assoc($result)){
	echo "<fieldset style='top:60px; width:260px;'><center><h2>Dados Pessoais</h2></center><br>
	<b>Cliente N&ordm;: </b>".$row['COD_CLI'];
	echo "<br><br>";
	echo "<b>Nome: </b>". $row["NOME"];
	echo "<br><br>";
    echo "<b>Data de Nascimento: </b>".$row["DATA_N"];
    echo "<br><br>";
    echo "<b>Email: </b>".$row["EMAIL"];
	echo "<br><br>";
    echo "<b>Endere&ccedil;o: </b>".$row["ENDERECO"];
	echo "<br><br>";
	echo "<b>CEP: </b>".$row["CEP"];
	echo "<br><br>";
    echo "<b>Telefone: </b>".$row["TEL"];
	echo "<br><br>";
	echo "<b>CPF: </b>".$row["CPF"];
	echo "<br></fieldset>";
}
?>
 </body>
 </html>