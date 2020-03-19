<?php session_start();
if(!isset($_SESSION['user']))
	 {
 header('location: login.php');
 echo "<script>alert('Faça LOGIN para visualizar o cardápio!');</script>";
 }
 if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
	 
	 if(isset($_SESSION['user']) && (isset($_SESSION['senha']))) {
	//cria array para carrinho
	if(!isset($_SESSION['carrinho']))
		{
			$_SESSION['carrinho']=array();
		}
		if(isset($_GET['act']))
			{
				if($_GET['act']=='add')
					{
						$id=intval($_GET[id]);
						if(!isset($_SESSION['carrinho'][$id])){
							$_SESSION['carrinho']['$id']=1;
							
						}
						//tratamento para não existir itens de parceiros diferentes
						//não concluído
						else 
							{
								$_SESSION['carrinho']['$id']+=1;
							}
					}
			  }
 }?>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Produtos</title>
  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
  <script type="text/javascript">
  function mostralugares(){
      document.getElementById('dropdown').getElementsByClassName('dropdown-content').display='block';
  }
  </script>
 </head>

 <?php include('cabecalho.php');?>
   	<!-- CARDAPIO-->
	<?php
	if (!isset($_GET['par'])){
	 echo '<script>alert("Por favor, utilize a guia Lugares para selecionar um de nossos PARCEIROS");</script>';
	 echo'<script>mostralugares()</script>';
 }
 else if(isset($_GET['par']) && !isset($_GET['gen'])){
     $par=$_GET['par'];

	//voltar para todos produtos - elimina sessao de determinado parceiro

	
	// cardapio canto esquerdo  - -  pega nome do parceiro e lista no canto esquerdo
	echo'<ul id="cardapio" style="padding-left: 0px;">';
	$sql="select NOME from parceiro where COD_PAR='$par'";
	$resul=mysqli_query($conexao,$sql) or die(mysql_error());
	while($row=mysqli_fetch_assoc($resul))
		{
			echo'<li><a class="active">Cardápio '.$row['NOME'].'</a></li>';
		}

		//agrupa os tipos dos produtos de cada parceiro
    $sql="select GENERO, parceiro.NOME from produto, parceiro WHERE produto.COD_PAR='$par' GROUP BY GENERO";
	$resul=mysqli_query($conexao,$sql) or die(mysql_error());
	while($row=mysqli_fetch_assoc($resul))
		{
		echo'
		<li><a href="produtos.php?par='.$par.'&gen='.$row["GENERO"].'">'.$row["GENERO"].'</a></li>';
		}
		echo'</ul>
		';

	//a partir do parceiro escolhido, os produtos pertencentes aparecerão
	$sql="select * from produto where COD_PAR = '$par' order by NOME";
	$resul=mysqli_query($conexao,$sql) or die;
			  if(mysqli_num_rows($resul)<=0)
				{
				  echo"Nenhum produto encontrado!";
			        }
					else
					{
						echo'<div id="mercadorias">';
					 while($row=mysqli_fetch_assoc($resul))
						 {

							 $cod=$row['COD_PRO'];
							 $nome=$row['NOME'];
							 $descr=$row['DESCR'];
							 $preco=$row['PRECO'];
							 echo
	'<div id="M">
	<form name="form1" method="get" action="carrinho.php">
	<a href="carrinho.php?act=add&id='.$cod.'"><button type="button" name="" value="" class="css3button1">Adicionar ao Carrinho</button></a>
	</form>

	<div id="descricao">
	<img src="imagens/oi.png">
    </div> 
	
	<div id="textoproduto">
	<center> 
	<h2>'.$nome.'<h2/>
	 <h2>R$ '.$preco.'</h2> 
	 <h3>'.$descr.'</h3>
	</center>
	</div>
    </div>';
	}
						 echo'</div>';
	 }
	}


//especifica os produtos deste parceiro e deste genero
	if(isset($_GET['par']) && isset($_GET['gen']))
	{

		$par=$_GET['par'];
		$gen=$_GET['gen'];
		//agrupa os tipos dos produtos de cada parceiro
		echo'<ul id="cardapio" style="padding-left: 0px;">';
	$sql="select NOME from parceiro where COD_PAR='$par'";
	$resul=mysqli_query($conexao,$sql) or die(mysql_error());
	while($row=mysqli_fetch_assoc($resul))
		{
			echo'<li><a class="active">Cardápio '.$row['NOME'].'</a></li>';
		}

    $sql="select GENERO, parceiro.NOME from produto, parceiro WHERE produto.COD_PAR='$par' GROUP BY GENERO";
	$resul=mysqli_query($conexao,$sql) or die(mysql_error());
	while($row=mysqli_fetch_assoc($resul))
		{
		echo'
		<li><a href="produtos.php?par='.$par.'&gen='.$row["GENERO"].'">'.$row["GENERO"].'</a></li>';
		}
		echo'<li><a href="produtos.php?par='.$par.'">Voltar</a></ul>';

		//a partir do parceiro escolhido, os produtos pertencentes aparecerão
	$sql="select * from produto where COD_PAR='$par' and GENERO='$gen' order by NOME";
	$resul=mysqli_query($conexao,$sql) or die(mysql_error());
			  if(mysqli_num_rows($resul)<=0)
				{
				  echo"Nenhum produto encontrado!";
			        }
					else
					{

						echo'<div id="mercadorias">';
					 while($row=mysqli_fetch_assoc($resul))
						 {

							 $cod=$row['COD_PRO'];
							 $nome=$row['NOME'];
							 $descr=$row['DESCR'];
							 $preco=$row['PRECO'];
							 echo
	'<div id="M">
	
	<a href="carrinho.php?act=add&id='.$cod.'"><button type="button" name="" value="" class="css3button1">Adicionar ao Carrinho</button></a>
	
	<div id="descricao">
	<img src="imagens/oi.png">
    </div> 
	
	<div id="textoproduto">
	<center> 
	<h1>'.$nome.'<h1/>
	 <h2>R$ '.$preco.'</h2> 
	 <h3>'.$descr.'</h3>
	</center>
	</div>
    </div>';
						 }
    echo'</div>';
					}
	}
	
	 ?>
	   
 </body>
</html>