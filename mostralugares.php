<?php 
require ("conexao.php");
echo'
<div class="dropdown">
     <button id="produtos" class="dropbtn">Lugares<img src="imagens/lugares.png" style="float:left"  alt=""/></button>
     <div class="dropdown-content">
	 <center>';


  $sql="select NOME, COD_PAR from parceiro";
  $res=mysqli_query($conexao,$sql);
  $cont=mysqli_num_rows($res);
  if ($cont<=0){
	  echo"Não há parceiros cadastrados!";
  }
	  else{
  while($row=mysqli_fetch_assoc($res)){
	  $nome=$row['NOME'];
	  $cod=$row['COD_PAR'];
	  echo '<a href="produtos.php?par='.$cod.'" >'.$nome.'</a>';
  }
	  }
	  echo'</center>
     </div>
     </div>
	 </div>
';
  ?>