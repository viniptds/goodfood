<?php 
 session_start();
 	 if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }?>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Meus Pedidos - GOOD FOOD</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>     
        <script type="text/javascript">
        function atualizarTarefas() {
           // aqui voce passa o id do usuario para monitorar a situacao dos pedidos
           var url="get.php?user='<?php echo $_SESSION['user'];?>'";
            jQuery("#cont").load(url);
        }
        setInterval("atualizarTarefas()", 3000);
        </script>    
 </head>

 <body>
  <?php
include "cabecalho.php";
require "conexao.php";
?>
<br><br>
<!-- aqui mostra os pedidos gerais deste cliente -->
<?php
$us=$_SESSION["user"];
//verifica se algum tipo de pedido/status já foi selecionado
if(!isset($_GET['sts'])){
echo"<div id='fieldmc'>";
echo '<a href="meuspedidos.php?sts=realizado">Pedidos Realizados: '; ##num de compras não visualizados pelo parceiro
$sql="select count(pedido.COD_PED) as NPED from pedido where pedido.COD_CLI=(select COD_CLI from cliente where USER='$us') and pedido.STATUS='Realizado'";
$res=mysqli_query($conexao, $sql) or die;
$row=mysqli_fetch_assoc($res);
echo "<b>".$row['NPED']."</b></a>";
echo "<BR><br>";

echo "<a href='meuspedidos.php?sts=emprep'>Pedidos Em Preparo: "; ##num de compras visualizados pelo parceiro
$sql="select count(COD_PED) as NPED from pedido where pedido.COD_CLI=(select COD_CLI from cliente where USER='$us') and pedido.STATUS='Em Preparo'";
$res=mysqli_query($conexao, $sql) or die;
$row=mysqli_fetch_assoc($res);
echo "<b>".$row['NPED']."</b></a>";
echo "<BR><br>";

echo "<a href='meuspedidos.php?sts=entregue'>Pedidos Entregues: "; ##num de compras entregues a esse cliente
$sql="select count(COD_PED) as NPED from pedido where pedido.COD_CLI=(select COD_CLI from cliente where USER='$us') and pedido.STATUS='Entregue'";
$res=mysqli_query($conexao, $sql) or die;
$row=mysqli_fetch_assoc($res);
echo "<b>".$row['NPED']."</b></a>";
echo "<BR>
</div>";
}
else 
	//caso já tenha sido selecionado
	if(isset($_GET['sts'])){
		if($_GET['sts']=='entregue')
			{
				echo'<div id="pedidos">';
	$sql="select pedido.COD_PED, pedido.TOTAL_PED,DATE_FORMAT(pedido.DATA_PED,'%T - %d de %M de %Y') as DATA_PED, pedido.STATUS,DATE_FORMAT(pedido.DATA_ENTR,'%T - %d de %M de %Y') as 'DATA_ENTR', parceiro.NOME as NOMEPAR from pedido inner join parceiro on parceiro.COD_PAR=pedido.COD_PAR where pedido.COD_CLI=(select COD_CLI from cliente where USER='$us') and pedido.STATUS='Entregue' order by pedido.DATA_PED desc";
		$res=mysqli_query($conexao,$sql) or die;
		while ($row=mysqli_fetch_assoc($res))
			{
			    $total=$row['TOTAL_PED'];
			    $total = number_format($total, 2, ',', '.');
		echo '<fieldset  style="width:540px;border-radius:10px; border-style:inset; border-color: #bb2026;">
			<a href="consultapdf.php?ped='.$row['COD_PED'].'">Pedido Nº '.$row['COD_PED'].'</a> - Status: <b>'.$row['STATUS'].'</b> em: '.$row['DATA_ENTR'].'<br><br> <b>Realizado em</b>: '.$row['DATA_PED'].'<br><b>Parceiro:</b> <b><i>'.$row['NOMEPAR'].'</b></i><br><b>Total do Pedido</b>: R$ '.$total.'<br></fieldset>';
			}
			echo"</div>";
		}
		if($_GET['sts']=='emprep')
			{
				
				echo'<div id="pedidos">';
	$sql="select pedido.COD_PED, pedido.TOTAL_PED,DATE_FORMAT(pedido.DATA_PED,'%T - %d de %M de %Y') as DATA_PED, pedido.STATUS, parceiro.NOME as NOMEPAR from pedido inner join parceiro on parceiro.COD_PAR=pedido.COD_PAR where pedido.COD_CLI=(select COD_CLI from cliente where USER='$us') and pedido.STATUS='Em Preparo' order by pedido.DATA_PED desc";
		$res=mysqli_query($conexao,$sql) or die;
		while ($row=mysqli_fetch_assoc($res))
			{
			    $total=$row['TOTAL_PED'];
			    $total = number_format($total, 2, ',', '.');
		echo '<fieldset  style="width:300px;border-radius:10px; border-style:inset; border-color: #bb2026;">
			<a href="consultapdf.php?ped='.$row['COD_PED'].'">Pedido Nº '.$row['COD_PED'].'</a> - Status: <b>'.$row['STATUS']."</b> ".$row['DATA_PED'].'<br>'.
			$row['NOMEPAR'].'<br>
			Total do Pedido: R$ '.$total.'<br></fieldset>';
			}
                echo"</div>";
		}
				
	if($_GET['sts']=='realizado')
		{
		//sub string (select cliente.ENDERECO from cliente inner join pedido on pedido.COD_CLI=cliente.COD_CLI where pedido.COD_PED='$ped') as ENDERECO, produto.NOME, cliente_produto.QUANT_PRO as 'QUANT_PRO' from cliente, produto inner join cliente_produto on cliente_produto.COD_PRO=produto.COD_PRO where cliente.COD_CLI=1 and pedido.STATUS='Realizado' 
		echo'<div id="pedidos">';
	$sql="select pedido.COD_PED, pedido.TOTAL_PED,DATE_FORMAT(pedido.DATA_PED,'%T - %d de %M de %Y') as DATA_PED, pedido.STATUS, parceiro.NOME as NOMEPAR from pedido inner join parceiro on parceiro.COD_PAR=pedido.COD_PAR where pedido.COD_CLI=(select COD_CLI from cliente where USER='$us') and pedido.STATUS='Realizado' order by pedido.DATA_PED desc";
		$res=mysqli_query($conexao,$sql) or die;
		while ($row=mysqli_fetch_assoc($res)){
		    $total=$row['TOTAL_PED'];
			    $total = number_format($total, 2, ',', '.');
			echo '<fieldset  style="width:300px;border-radius:10px; border-style:inset; border-color: #bb2026;">
			<a href="consultapdf.php?ped='.$row['COD_PED'].'"style="text-decoration:none;color:blue;">Pedido Nº '.$row['COD_PED'].'</a> - Status: <b>'.$row['STATUS']."</b> ".$row['DATA_PED'].'<br>'.
			$row['NOMEPAR'].'<br>
			Total do Pedido: R$ '.$row['TOTAL_PED'].'<br><br>
			<A HREF="cancelapedido.php?ped='.$row['COD_PED'].'" style="text-decoration:none;color:blue;">Cancelar Pedido</a></fieldset>';
		}
			echo"</div>";		
	}
	
	}
		?>

 </body>
</html>