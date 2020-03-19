<?php 
echo'<script type="text/javascript">
  function carregapag(){
      document.getElementById("load").style.display="none";
      document.getElementById("all").style.display="block";
  }
  </script>
  <link rel="shortcut icon" href="favico.ico" type="image/x-icon" />
<body id="corpo" onload="carregapag()">
 <div id="load">
	     <br>
	     <br>
	     <br>
	     <br>
	     <center><img src="ajax-loader.gif">
	     </center>
	     </div>
	     
<div id="all" style="display:none;">
<div id="topo">';
	 if(!isset($_SESSION['user']) && !isset($_SESSION['senha']) && !isset($_SESSION['tipo']))
	 {
		echo '  
		<!-- BOTÃO LOGIN -->
		<div id="login">
		<a href="login.php" class="bt">Entrar</a>
		<a href="Cadastro.php" class="bt" align="right">Cadastrar</a>

		</div>
		</div>

	 <div id="menu">

    <a href="index.php"> Início <img src="imagens/home.png" style="float:left"  alt=""/></a> </div>';
		
} 
	if(isset($_SESSION['user']) && isset($_SESSION['tipo']) == 'Cliente'){
	if($_SESSION['tipo']== 'Cliente'){
	echo'
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
	 <a href="minhaconta.php" class="bt">Ol&aacute;, <b>'.$_SESSION["user"].'</b>!</a>
	 </div>
	 </div>

	 <div id="menu">
     <a href="index.php"> Início <img src="imagens/home.png" style="float:left"  alt=""/></a> 
	 <div id="carrinho">
 <a href="carrinho.php" ><img src="imagens/carrinho.png" style="float:left"  alt=""/></a> 
	 </div>';
	 	 include 'mostralugares.php';

}
else 
	if($_SESSION['tipo'] == 'Parceiro'){
	echo'<div id="login">
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
     <a href="portalparceiro.php"> Início <img src="imagens/home.png" style="float:left"  alt=""/></a></div>
	 <div id="cont" align="center"><a href="pedidos.php?stats=real" class="botaopedido"></a></div>';
}
	}
?>