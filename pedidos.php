<?php
session_start();
if(isset($_GET["act"])){
	if($_GET["act"]=="logout"){
		session_destroy();
		header("location: index.php");
		exit;
	}
}
require "conexao.php";
include 'config.php';

?>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Meus Pedidos - PORTAL PARCEIRO</title>
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/s1/style.css"/> 

  <script type="text/javascript">
  function entrega()
  {
	  
  }
	function loginfail()
	{
		setTimeout("window.location='login.php'", 5000); 
	}
</script>
<!-- // chama o JQUERY para atualizar as notificacoes -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>     
        <script type="text/javascript">
        function atualizarTarefas() {
           // aqui voce passa o id do usuario
           var url="get.php?user='<?php echo $_SESSION['user']; ?>'";
            jQuery("#cont").load(url);
        }
        setInterval("atualizarTarefas()", 1000);
        </script>
 </head>
 <!--
 MENU DO PARCEIRO
 -->
<?php include "cabecalho.php";

$user=$_SESSION['user'];
	if(isset($_GET['stats'])){
	    
	##pedidos realizados
	if($_GET['stats'] == 'real'){
	    echo"<div id='pedidos'>";
$sql="select * from pedido where STATUS='Realizado' and COD_PAR=(select COD_PAR from parceiro where USER='$user')";
$res=mysqli_query($conexao, $sql) or die;
while($row=mysqli_fetch_assoc($res)){
	$ped=$row['COD_PED'];
	echo "<fieldset style='width:300px;border-radius:10px; border-style:inset; border-color: #bb2026; float:left;'>
	Pedido N&ordm; ".$row['COD_PED']."<br>
	<a href='gera_pdf.php?ped=".$row['COD_PED']."'>Visualizar</a></fieldset>";
}
echo"</div>";
	}

	##pedidos em preparo -- possibilidade de trocar para Entregue
	if($_GET['stats'] == 'emprep'){
	    echo"<div id='pedidos'>";
		$sql="select * from pedido where STATUS='Em Preparo' and COD_PAR=(select COD_PAR from parceiro where USER='$user')";
$res=mysqli_query($conexao, $sql) or die;
while($row=mysqli_fetch_assoc($res)){
	$ped=$row['COD_PED'];
	echo "<fieldset style='width:300px;border-radius:10px; border-style:inset; border-color: #bb2026; float:left;'>
	Pedido N&ordm; ".$ped."<br><br>
	<a href='consultapdf.php?ped=".$ped."'>Visualizar</a><br><br>
	<a href='entregue.php?ped=".$ped."'>Entregue</a>
	</fieldset>";
}
echo"</div>";
	}

	##pedidos entregues
	if($_GET['stats'] == 'entr'){
	    echo"<div id='pedidos'>";
$sql="select * from pedido where STATUS='Entregue' and COD_PAR=(select COD_PAR from parceiro where USER='$user')";
$res=mysqli_query($conexao, $sql) or die;
while($row=mysqli_fetch_assoc($res)){
	$ped=$row['COD_PED'];
	echo "<fieldset style='width:300px;border-radius:10px; border-style:inset; border-color: #bb2026; float:left;'>
	Pedido N&ordm; ".$ped."<br>
	<a href='consultapdf.php?ped=".$ped."'>Visualizar</a></fieldset>";
}
echo"</div>";
	}

}
else
	{
	    echo"<div id='fieldmc'>";
echo "<br><center><label>Meus Pedidos</label></center>
<a href='pedidos.php?stats=real'>Realizados</a><br>";
echo "<a href='pedidos.php?stats=emprep'>Em Preparo</a><br>";
echo "<a href='pedidos.php?stats=entr'>Entregue</a><br></div>";
}
?>
 </body>
</html>