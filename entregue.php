<?php
require "conexao.php";
$ped=$_GET['ped'];
$sql="update pedido set STATUS='Entregue', DATA_ENTR=now() where pedido.COD_PED='$ped'";
$res1=mysqli_query($conexao,$sql) or die;
header("location:pedidos.php");
?>