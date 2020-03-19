<?php session_start();
	if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }?>
<html lang="en">
 <head>
     <meta http-equiv="refresh" content="180">
  <meta charset="UTF-8">
  <title>PORTAL PARCEIRO - GOOD FOOD</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  <script type="text/javascript">
	function loginfail()
	{
		setTimeout("window.location='login.php'", 3000); 
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
        setInterval("atualizarTarefas()", 2000);
        function atualizaPed() {
            var url="newped.php?user='<?php echo $_SESSION['user']; ?>'";
            jQuery("#pedidos").load(url);
        }
        setInterval("atualizaPed()",2000)
        </script>
		</head>

								<!-- MENU DO PARCEIRO -->
	 <?php require ("conexao.php");
	 include 'cabecalho.php';
	 ?> 
      
<?php echo'<div id="ped" style="position: relative; margin: auto;">'; ?>
<fieldset style="width:200px;">
<center>Total de Vendas: <?php ##num de vendas gerais
$nparc=$_SESSION['user'];
$sql="select count(COD_PED) as NPED from pedido where STATUS='Entregue' and pedido.COD_PAR=(SELECT COD_PAR FROM parceiro where USER='$nparc')";
$res=mysqli_query($conexao, $sql) or die;
	while($row=mysqli_fetch_assoc($res)){
		echo "<b>".$row['NPED']."</b>";
	}
?>
<br>
Vendas no mês: <?php ##num de vendas do mês atual
$sql="SELECT count(COD_PED) as 'NPED' FROM pedido WHERE MONTH(DATA_ENTR)=MONTH(CURDATE()) AND YEAR(DATA_ENTR)=YEAR(CURDATE()) and COD_PAR=(SELECT COD_PAR FROM parceiro where USER='$nparc') and STATUS='Entregue'";
$res=mysqli_query($conexao, $sql) or die;
	while($row=mysqli_fetch_assoc($res)){
		echo "<b>".$row['NPED']."</b>";
	}
	?>
<br>
<!--Vendas pendentes: <?php ##vendas nâo visualizadas ainda
/*$sql="select count(COD_PED) as 'NPED' from pedido where COD_PAR=(SELECT COD_PAR FROM parceiro where USER='$nparc') and STATUS='Realizado'";
$res=mysqli_query($conexao, $sql) or die;
	while($row=mysqli_fetch_assoc($res)){
		echo "<a href='pedidos.php?sts=pend'><b>".$row['NPED']."</a></b>";
	}
	*/?>
	-->
	<br>
<a href=pedidos.php>Todos os Pedidos</a>
</fieldset>
</center>
</div>
<?php
//status existentes do pedido: Realizado, Visualizado, Enviado, Entregue
    echo"<div id='pedidos' align='center'>";
?>
 </body>
</html>