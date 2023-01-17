<?PHP
$user="root";
$pass="123456";
$banco="good_food";
$host="localhost";
$conexao=mysqli_connect($host,$user,$pass, $banco) or die (mysql_error());
?>