<?php
session_start();
$us=$_SESSION['user'];
$codpar=0;
require "conexao.php";
	$sql="select COD_PAR from parceiro where USER='$us'";
$res=mysqli_query($conexao, $sql) or die;
$row=mysqli_fetch_assoc($res);
	$codpar=$row['COD_PAR'];
	$nome=$_POST['nome'];
	$descr=$_POST['descr'];
	$gen=$_POST['gen'];
	$preco=$_POST['preco'];
	$sql="insert into produto(COD_PRO,NOME,DESCR,PRECO,GENERO,COD_PAR) values(null,'$nome','$descr','$preco','$gen','$codpar')";
	$res=mysqli_query($conexao, $sql) or die;
	if(!$res){
		header("location:parcadm.php?op=add");
		echo'<script>alert("Produto não cadastrado! Por favor insira novamente");</script>';
	}
	else{
	    echo'<script>alert("Produto cadastrado com sucesso!");</script>';
		echo'<script>window.location("parcadm.php?op=add");</script>';
}
?>