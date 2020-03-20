<?php

$user = "root";
$pass = "";

try 
{
    $con = new PDO('mysql:host=localhost;dbname=id2458163_tcc', $user, $pass);

} 
catch (PDOException $e) 
{
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>