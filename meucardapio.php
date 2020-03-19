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
        setInterval("atualizarTarefas()", 2000);
        </script>    
 </head>

  <?php
include "cabecalho.php";
require "conexao.php";
?>
<br><br><br><br>
<?php
$us=$_SESSION["user"];
echo"<div id='pedidos'>";
$sql="select produto.NOME, produto.GENERO, produto.PRECO,produto.DESCR from produto where COD_PAR=(select COD_PAR from parceiro where USER='$us') order by NOME,GENERO";
$res=mysqli_query($conexao, $sql) or die;
	while($row=mysqli_fetch_assoc($res)){
		echo'<fieldset style="width:300px;border-radius:10px; height:130px; border-style:inset; border-color: #bb2026; float:left;">Item: <b>'.$row['NOME'].'<br></b>
		<i>'.$row['DESCR'].'</i><br>
		Preço: <b>R$'.$row['PRECO'].'</b><br>
		G&ecirc;nero: <i>'.$row['GENERO'].'</i>
		</fieldset>';
	}
	?>
	</div>
	</body>
	</html>