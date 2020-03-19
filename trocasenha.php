<html lang="en">
<head>
<meta charset="UTF-8">
<title>Trocando a senha...</title>
<script type="text/javascript">
	function loading()
	{
	}
	function passwsucess()
	{
		setTimeout("window.location='login.php'", 5000);
	}
	function passwfail()
	{
		setTimeout("window.location='minhaconta.php'", 5000); 
	}
</script>
</head>

<?php
require "conexao.php";
$user=$_POST['user'];
//$senha= $_POST['senha'];
$nsenha= $_POST['newpass'];

/*$teste="select * from cliente where USER = '$user' and SENHA = '$senha'";
$res=mysqli_query($conexao,$teste);
if(!$res)
{
echo "Falha durante a troca de senha! Senha antiga não corresponde.";
echo "<script>passwfail()</script>";
}
else
	{
		*/
$sql=("update cliente set SENHA = '$nsenha' where USER = '$user'");
$resultado=mysqli_query($conexao,$sql) OR DIE(mysql_error());
	if(!$resultado)
		{
			echo "Falha durante a troca de senha!";
			echo "<script>passwfail()</script>";
		}
			 else
			{
	  echo "Senha alterada com sucesso!";
	  echo "<script>passwsucess()</script>";
			}
?>
</body>
</html>