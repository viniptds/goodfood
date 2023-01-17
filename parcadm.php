<?php
session_start();
if(isset($_GET["act"])){
	if($_GET["act"]=="logout"){
		session_destroy();
		header("location: index.php");
		exit;
	}
}

include 'config.php';
?>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <title>Controle Administrativo - GOOD FOOD</title>
  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/s1/style.css"/>
  <script type="text/javascript">
	function loginfail()
	{
		setTimeout("window.location='login.php'", 5000); 
	}
</script>

<!-- // chama o JQUERY para atualizar as notificacoes -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>     
        <script type="text/javascript">
        function atualizarTarefas() {
           // aqui voce passa o id do usuario
           var url="get.php?user='<?php echo $_SESSION['user']; ?>'";
            jQuery("#cont").load(url);
        }
        setInterval("atualizarTarefas()", 2000);
        </script>
		</head>

								<!-- MENU DO PARCEIRO -->
	 <?php require ("conexao.php");
	 include 'cabecalho.php';
	 ?>
	 <?php 
	 $us=$_SESSION['user'];
	 if(!isset($_GET['op'])){
		echo"
		<div id='fieldmc' style='height:150px; top:10px;'><br><label style='left:50px;'>Controle: </label><br>
		<a href='pedidos.php'>Meus Pedidos</a><br><br>
		<a href='meucardapio.php'>Meu Cardápio</a><br><br>
		<a href='parcadm.php?op=add'>Cadastrar Item</a><br>
		<!--<a href='parcadm.php?op=ed'>Editar Item</a>-->
		</div>";
	 }
	 if(isset($_GET['op'])){
			if($_GET['op']=='add'){
				echo'<br><br>
<fieldset style="width:300px;border-radius:10px; border-style:inset; border-color: #bb2026;><div id="top">
<h3>Produto a ser Cadastrado</h3>
</center>

  <form action="caditem.php" method="post" name="fpro">
    <label for="fname">Nome</label>
    <input type="text" id="nome" name="nome" placeholder="Ex... X-Salada" maxlength=50>
	<br><br>
    <label for="lname">Descri&ccedil;&atilde;o/Ingredientes</label>
    <input type="text" style="width:219.5px;" id="descr" name="descr" placeholder="Pao, Musarela, Ovo, Tomate...">
	<br><br>
    <label>G&ecirc;nero</label>
    <select id="gen" name="gen">
	  <option></option>
      <option value="Lanche">Lanches</option>
      <option value="Pastel">Past&eacute;is</option>
      <option value="Pizza">Pizzas</option>
      <option value="Porcao">Por&ccedil;&otilde;es</option>
	  <option value="Bebida">Bebidas</option>
    </select><br><br>
	<label>Valor</label>
	<input type="text" name="preco" size=3 maxlength=5><br><br>
    <center><input type="submit" value="Cadastrar"></center>
  </fieldset>
  </form>
</div>';
}
			}
			/*if($_GET['op']=='ed'){
				$sql="select * from produto where COD_PAR=(select COD_PAR from parceiro where USER='$us')";
				$res=mysqli_query($conexao, $sql) or die;
				while($row=mysqli_fetch_assoc($res)){
					echo"<form name='alt' method='post' action='parcadm.php'>
					<fieldset>Produto ".$row['COD_PRO']." - ".$row['NOME']."<br>
					Ingredientes: ".$row['DESCR']."<br>
					G&ecirc;nero <i><label>".$row['GENERO']."<BR>
					Valor: R$ <input type=text size=2 name='preco' id='preco' value=".$row['PRECO']."> 
					<button type='submit' id='alt' value='Alterar'></fieldset></form>";	
				if(isset($_POST['preco'])){
					$cod=$row['COD_PRO']
					$preco=$_POST['preco'];
					$sql="update produto set PRECO='$preco' where COD_PRO='$cod'";
					$res=mysqli_query($conexao, $sql) or die;
					if(!$res){
						
				}
				}
			}*/
		?>
</body>
</html>