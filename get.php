<?php session_start();
    require ("conexao.php");
    $id=$_SESSION['user'];

    $sql = "select COUNT(pedido.COD_PED) as 'NPED' from pedido inner join parceiro on parceiro.COD_PAR=pedido.COD_PAR where parceiro.USER = '$id' and pedido.STATUS='Realizado'";
    $query = mysqli_query($conexao, $sql);
    $res = mysqli_fetch_assoc($query);
        $retorna = $res['NPED'];
		echo '<a href="pedidos.php?stats=real" class="botaopedido">'.$retorna.'</a>';
?>