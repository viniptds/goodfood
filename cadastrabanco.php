<html>
<head>
  <meta charset="UTF-8">
<title>Cadastrando...</title>
<script type="text/javascript">
function cadastrosucess() 
	{
		setTimeout("window.location='index.php'", 5000);
	}
	function cadastrofail()
	{
		setTimeout("window.location='Cadastro.php'", 5000); 
	}
</script>
<link rel="shortcut icon" href="favico.ico" type="image/x-icon" />
</head>

<body>
<?php
require ("conexao.php");

$us=$_POST['user'];
$nome= $_POST['nome'];
$idade= $_POST['idade'];
$endereco= $_POST['endereco'];
$tel= $_POST['tel'];
$cpf= $_POST['cpf'];
$email= $_POST['email'];
$senha= $_POST['senha'];
$cep= $_POST['cep'];

		$sql="select count(*) as 'C' from cliente where USER='$us'";
		$result=mysqli_query($conexao,$sql);
		$quan=mysqli_fetch_assoc($result);
		if($quan['C']>0){
			echo "<font color=#ff0000>Usu&aacute;rio j&aacute; cadastrado. Por favor digite outro.</font>";
		    echo "";
			}
			if(!$quan['C'] = 0){
$insere= "insert into cliente (USER,NOME, DATA_N,ENDERECO,TEL,CPF,EMAIL,SENHA,CEP) values ('$us','$nome','$idade','$endereco','$tel','$cpf','$email','$senha','$cep')";
 $resultado=mysqli_query($conexao,$insere);
 if(!$resultado)
 {
	 echo "Falha durante o cadastro!";
	 echo "<script>cadastrofail()</script>";
 }
 else
	 {
	  echo "<p>Cadastro feito com sucesso</p>";
	  echo "<script>cadastrosucess()</script>";
	 }
			} 
?>
</body>
</html>