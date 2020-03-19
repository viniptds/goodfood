<?php
session_start();
    require ("conexao.php");
    $nparc=$_SESSION['user'];
$sql="select cliente.NOME,pedido.ENDERECO, pedido.* from cliente inner join pedido on pedido.COD_CLI=cliente.COD_CLI inner join parceiro on parceiro.COD_PAR=pedido.COD_PAR where parceiro.USER='$nparc' and pedido.STATUS='Realizado' order by pedido.COD_PED desc";
$resul = mysqli_query($conexao, $sql);
while($row=mysqli_fetch_assoc($resul)) {
echo 
	'<fieldset style="width:300px;border-radius:10px; border-style:inset; border-color: #bb2026; float:left;">
     <a href="gera_pdf.php?ped='.$row["COD_PED"].'">Pedido '.$row["COD_PED"].'</a><br>
     Cliente: <b>'.$row["NOME"].'</b><br>
     Endereço: <i>'.$row["ENDERECO"].'</i><br>
     </fieldset>';
}
?>