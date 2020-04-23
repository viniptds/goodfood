<?php 
	if( !defined("ABSPATH")) 
		exit; 
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
		<title>
			<?php echo $this->title; ?>
		</title>
        <link rel="stylesheet" type="text/css" href='/_includes/style.css'/>
    </head>
	<script type="text/javascript">
  		function carregapag(){
      		document.getElementById("load").style.display="none";
      		document.getElementById("all").style.display="block";
  		}
	</script>
	  
	<link rel="shortcut icon" href="favico.ico" type="image/x-icon" />
	  
	<body id="corpo" onload="carregapag()">

 	<div id="load">		
		<img src="assets/load-icon.svg">		
	</div> 

	<div id="all">
		<div id="topo">

<?php
	if(!isset($_SESSION['user']) && !isset($_SESSION['senha']) && !isset($_SESSION['tipo']))
	{
?>  
		<!-- BOTÃO LOGIN -->
		<div id="login">
			<a href="./login" class="bt">Entrar</a>
			<a href="./login/cadastro" class="bt" >Cadastrar</a>
		</div>
		</div>	

	 	<div id="menu">
			<a href="home"> 
				Início <img src="imagens/home.png" style="float:left"  alt=""/>
			</a> 
		</div>
<?php
	} 
	if(isset($_SESSION['user']) && isset($_SESSION['tipo']) == 'Cliente')
	{
		if($_SESSION['tipo']== 'Cliente')
		{
?>
			<!-- BOTÃO SAIR -->
			<div id="login">
			<a href="index.php?act=logout" class="bt">Sair</a>
			</div>

			<!-- Menu do usuario-->
			<div id="usuario">
				<a href="minhaconta.php" class="bt"> Minha Conta </a>
				<a href="meuspedidos.php" class="bt" > Meus Pedidos </a> 
			</div>

			<div id="bemvindo">
				<a href="minhaconta.php" class="bt">Ol&aacute;, <b> <?php $_SESSION["user"] ?></b>!</a>
			</div>
			</div>

			<div id="menu">
				<a href="index.php"> Início <img src="imagens/home.png" style="float:left"  alt=""/></a> 
				<div id="carrinho">
				<a href="carrinho.php" ><img src="imagens/carrinho.png" style="float:left"  alt=""/></a> 
			</div>

<?php
	include 'mostralugares.php';
		}
		else 
			if($_SESSION['tipo'] == 'Parceiro'){
?>
				<div id="login">
					<a href="index.php?act=logout" class="bt">Sair</a>
				</div>

				<!-- Menu do usuario-->
				<div id="usuario">
					<a href="parcadm.php" class="bt"> Minha Conta </a>
					<a href="pedidos.php" class="bt" > Meus Pedidos </a> 
				</div>

				<div id="bemvindo">
					<a href="parcadm.php" class="bt">Ol&aacute;, <b>'.$_SESSION["user"].'</b>!</a>
				</div>
				</div>
				<div id="menu">
					<a href="portalparceiro.php"> Início <img src="imagens/home.png" style="float:left"  alt=""/></a>
				</div>
				<div id="cont" align="center">
					<a href="pedidos.php?stats=real" class="botaopedido"></a>
				</div>
<?php
			}
	}
?>