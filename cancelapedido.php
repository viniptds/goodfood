<?php require "conexao.php";?>
	<html>
	    <head>
	        <script type="text/javascript">
	        </script>
	    </head>
	    <link rel="shortcut icon" href="favico.ico" type="image/x-icon" />
	<body>
	<h3>
<?php
$ped=$_GET['ped'];
$sql="select STATUS from pedido where COD_PED=$ped and STATUS='Cancelado' limit 1";
$res=mysqli_query($conexao,$sql);
$row=mysqli_num_rows($res);
if($row!=0){
echo "Pedido já cancelado pelo usuário!";
} 
else {
$sql="update pedido set STATUS='Cancelado' where COD_PED='$ped'";
$res=mysqli_query($conexao,$sql);
echo "Pedido cancelado com sucesso!";
}
	?>
<script>setTimeout("window.location='meuspedidos.php?sts=realizado'", 1000);</script>
	 </h3>
	 </body>
	 </html>