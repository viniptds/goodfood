<?php session_start(); 
	 if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
	 if(!isset($_SESSION['carrinho'])){ 
	$_SESSION['carrinho'] = array(); 
}
else
	if(isset($_GET['act'])){
		if($_GET['act'] == 'add'){ 
			$id = intval($_GET['id']); 
			if(!isset($_SESSION['carrinho'][$id])){
			$_SESSION['carrinho'][$id] = 1;	
			header('location: carrinho.php');
			}
				else{ 
					$_SESSION['carrinho'][$id] += 1;
					header('location: carrinho.php');
			}
			}
		if($_GET['act'] == 'del'){ 
		$id = intval($_GET['id']);
			if(isset($_SESSION['carrinho'][$id])){ 
				unset($_SESSION['carrinho'][$id]);
		} 
		}
          }
          ?> 
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Meu Carrinho - GOOD FOOD</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
 </head>
 
	 	<?php 
		include ("cabecalho.php");	?>
	<?php
    if(count($_SESSION['carrinho']) == 0)
	{
    echo '<script>alert("Não há produto no carrinho!\nVocê será redirecionado para a página de PRODUTOS");</script>';
	echo '<script>window.location.href = "produtos.php";</script>';
	}
	else{
		echo'
	<table align="center" style="background: rgba(0,0,0,0.1); position:relative; border-collapse:collapse; width:934px; top:60px;">
<caption><h2>Carrinho de Compras</h2></caption>
<thead>
<tr>
<th width="244">Produto</th>
<th width="79">Quantidade</th>
<th width="89">Pre&ccedil;o</th> 
<th width="100">Subtotal</th>
<th width="64">Remover</th>
<th width="100">Total</th>

 </tr>
        </thead>
<form action="?act=up" method="post">
<tfoot>
<tr> 
<td colspan="5"><a href="javascript:window.history.go(-1)" style="text-decoration:none;">Continuar Comprando</a></td>
<td bgcolor="#bb2026"><a href="finaliza.php" style="text-decoration:none;"> Finalizar Pedido</a></td>
 </form>
        </tfoot>
<tbody>';
                   
                                  $total = 0;
                            foreach($_SESSION['carrinho'] as $id => $qtd){
                                  $sql   = "SELECT *  FROM produto WHERE COD_PRO= '$id'";
                                  $qr    = mysqli_query($conexao,$sql) or die(mysql_error());
                                  
								  while($ln = mysqli_fetch_assoc($qr)){
                                  
                                  $nome  = $ln['NOME'];
                                  $preco = number_format($ln['PRECO'], 2, ',', '.');
                                  $sub   = number_format($ln['PRECO'] * $qtd, 2, ',', '.');                                   
                                  $total += $ln['PRECO'] * $qtd;
                                
                             
							   echo '<tr><td>'.$nome.'</td>
							   <td>'.$qtd.'</td>
							   <td>R$ '.$preco.'</td>
							   <td>R$ '.$sub.'</td>
							   <td><a href="?act=del&id='.$id.'" style="text-decoration:none;">Remove</a></td>';
								  
								
                               
								  }
							}
							
								  $total = number_format($total, 2, ',', '.');							 
                               echo '<td>R$ '.$total.'</td></tr>';
                         }
                   ?>
         </tbody> 
    </table>
	</body>
</html>