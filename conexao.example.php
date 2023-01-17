<?PHP
$user = "";
$pass = "";
$banco = "";
$host = "";

$conexao = mysqli_connect($host,$user,$pass, $banco) or die (mysql_error());
?>