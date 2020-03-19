<?php
session_start();
	 if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
?>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Finalizando Pedido</title>
    <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  <script type="text/javascript" src="busca.js"></script>
  
  <style type="text/css">
  #texto {
  visibility:hidden;
  }
  #troco {
  visibility:hidden;
width:50px;  
  }
  </style>
  
<script type="text/javascript">
function valida(){
    if(document.fim.end.checked==false){
        window.alert("Escolha o endereço!");
        return false;
    }
    else if(document.fim.pag.selectedIndex==0){
        window.alert("Selecione a Forma de Pagamento");
        return false;
    }
    
}
function pedeTroco(){	
	 if (document.fim.pag.value != "Dinheiro")
		 {
			 document.getElementById("texto").style.visibility = "hidden";
			document.getElementById("troco").style.visibility = "hidden";
		 }
		 else{
			 document.getElementById("texto").style.visibility = "visible";
			document.getElementById("troco").style.visibility = "visible";
		 }
  }
</script>
 </head>
 <?php include "cabecalho.php";
 require "conexao.php"; ?>
 <table border=3 align="center" style='width:935px;'>
   <caption> <h2> Resumo da Compra</h2></caption>
 <thead>
<tr>
<th width="44">Produto</th>
<th width="79">Quantidade</th>
<th width="89">Total</th> 

 </tr>
        </thead>
		<tbody>
		<?php 
		$total = 0;
		$codpro=array_keys ($_SESSION['carrinho']);

        foreach($_SESSION['carrinho'] as $id => $qtd)
			{
        $sql   = "SELECT *  FROM produto WHERE COD_PRO= '$id'";
        $qr    = mysqli_query($conexao,$sql) or die;
        while($ln = mysqli_fetch_assoc($qr)){
                                  
        $nome  = $ln['NOME'];
		$total += $ln['PRECO'] * $qtd;
				echo 
					'<tr>
				<td>'.$nome.'</td>
				<td><input type="text" readonly="true" size="3" name="prod['.$id.']" value="'.$qtd.'"></td>';
		
		}
			}
			$total = number_format($total, 2, ',', '.');
			echo '<td colspan=4>R$ '.$total.'</td>';
                   ?>
         </tbody>
    </table>
	<br><br><div align="center" style="">
	<div id='fpag' align="center">
 <form name="fim" id="fim" action="confirma.php" method='get' onsubmit="return valida();">
 <label style=" position:relative; left:50px;">Forma de Pagamento: </label><label name="texto" id='texto' style="position: relative;
    left: 50px;">Troco para: R$</label><br>
 <select name="pag" style="position: relative;
    left: 8px;" form="fim" onchange='pedeTroco()'>
     <option></option>
 <option value="Dinheiro" name="forma" id="forma">Dinheiro</option>

<option value="Cartao" name="forma" id="forma">Cartão de Crédito</option>
</select>
<input type='text' name='troco' style="position: relative;left: 40px;" id='troco'>
</div>



<div id="ender" align='center'>
<label style="position:relative; right: 123px;">Endereço:</label><br>
<?php
$us=$_SESSION['user'];
$sql="select ENDERECO from cliente where USER = '".$us."'";
$res=mysqli_query($conexao,$sql) or die;
while($row=mysqli_fetch_assoc($res)){
	$end=$row['ENDERECO'];
	echo'<fieldset style="width:900px; left:300px; text-align: left; border-color:#bb2026; border-radius:10px">';
	if(!isset($_POST['end'])){
	echo "<input type='radio' VALUE='$end' name='end'>".$end;
	echo"<br><h5>Este não é seu endereço? Altere-o clicando <a href='mudaend.php'>aqui</a></h5>";
	echo"</fieldset>";
	}
	else if(isset($_POST['end'])){
	$end2=$_POST['end'];
	echo"<input type='radio' VALUE='$end2' name='end'>".$end2;
	echo"<br><h5>Este não é seu endereço? Altere-o clicando <a href='mudaend.php'>aqui</a></";
	echo"</fieldset>";
	}
}
echo'</div>';

echo "<br><br><br><br>";
?>
<input align='center' style='width:160px; height:30px; font-size:15px;' type="submit" value="Realizar Compra" name="submit">
</form>
</div>
 </body>
</html>
      