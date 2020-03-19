<?php session_start();
		 if(isset($_GET["act"])){
	 if($_GET["act"]=="logout"){
session_destroy();
header("location: index.php");
exit;
}
	 }
	 if(!isset($_SESSION['carrinho'])){
	     header("location: minhaconta.php");
	 }
	require ("conexao.php");
	?>
	<html lang="en">
	 <head>
	  <meta charset="UTF-8">
	  <title>Pedido Efetuado!</title>
	  <link rel="stylesheet" type="text/css" href="/s1/style.css"/>
	  <script type="text/javascript">
	  function loginfail()
	{
		setTimeout("window.location='carrinho.php'", 5000); 
	}
	</script>
	</head>
	 <?php include "cabecalho.php";?>
	<?php
	//chama as infos na URL
	$fpag=$_GET['pag'];

	//CHAMA SESSAO
	$carrinho=$_SESSION['carrinho'];
	$user=$_SESSION['user'];
	
	//PEGA O CODIGO DO PRODUTO EXISTENTE NA SESSAO
	$codpro=array_keys ($carrinho);
	
	//PEGA A QUANTIDADE DE CADA ITEM NA SESSAO
	$qtd=array_values($carrinho);
	
	// ENCONTRA O COD DO CLIENTE QUE REALIZA A COMPRA
	$sql="select COD_CLI from cliente where USER='$user'";
	$res=mysqli_query($conexao,$sql);
	while($row=mysqli_fetch_assoc($res))
		{
		$codcli=$row['COD_CLI'];
	}

	//inicia variaveis com valor 0 ou nulo para dar inicio ao "pedido"
	$total="";
	$parc="";
	$codped="";
	//cria o pedido para inicio - inserir dados

	if(isset($_SESSION['carrinho'])){
	    if(isset($_GET['end'])){
	    $end=$_GET['end'];
	$sql="insert into pedido (COD_CLI, COD_PAR, DATA_PED, FORMA_PAG, TOTAL_PED, ENDERECO, STATUS) values ('$codcli', '$parc', NOW(), '$fpag', '$total', '$end', 'Realizado')";
	$res=mysqli_query($conexao, $sql);
	 if(!$res)
 {
	 echo "<h2>Falha durante a realização do pedido!</h2>";
	 echo "<script>loginfail()</script>";
 }
 else
 {
	 //usa o insert_id para buscar o ultimo id/COD_PAR adicionado
	 $codped=mysqli_insert_id($conexao);
	
	//COMECA A COMPARAR O ARRAY DO CARRINHO
	foreach($codpro as $val)
		{
			$valor=$val;
			$quant=$_SESSION['carrinho'][$val];
			$sql="select COD_PAR from produto WHERE COD_PRO='$valor'";
			$res=mysqli_query($conexao, $sql);
			while($linha=mysqli_fetch_assoc($res))
				{
				$par=$linha['COD_PAR'];
	//INSERE ENQUANTO EXISTIR ITENS
	$sql1="insert into cliente_produto values ('$user', '$valor', '$par', $quant, '$codped', NOW())";
	$res1=mysqli_query($conexao,$sql1) or die (mysql_error()); 
				}
			}
			$sql="select sum(produto.PRECO*cliente_produto.QUANT_PRO) as 'TOTAL' from produto inner join cliente_produto on cliente_produto.COD_PRO=produto.COD_PRO inner join pedido on pedido.COD_PED=cliente_produto.COD_PED where pedido.COD_PED='$codped'";
	$res=mysqli_query($conexao, $sql) OR DIE;
	while($linha=mysqli_fetch_assoc($res))
		{
			$total=$linha['TOTAL'];
		}
	//ATUALIZANDO OS DADOS QUE ANTES ESTAVAM VAZIOS OU NULOS
	//define o parceiro que realizou a venda
	$sql="update pedido set pedido.COD_PAR='$par' where COD_PED='$codped'";
	$res=mysqli_query($conexao,$sql) or die;

	//define valor para o total do pedido na tabela de pedido
	$sql="update pedido set TOTAL_PED= '$total' where COD_PED='$codped'";
	$res=mysqli_query($conexao,$sql) or die;	
	}
		}
		else if(isset($_GET['end2'])){
		    $end2=$_GET['end2'];
		    $sql="insert into pedido (COD_CLI, COD_PAR, DATA_PED, FORMA_PAG, TOTAL_PED, ENDERECO, STATUS) values ('$codcli', '$parc', NOW(), '$fpag', '$total', '$end2', 'Realizado')";
	$res=mysqli_query($conexao, $sql);
	 if(!$res)
 {
	 echo "<h2>Falha durante a realização do pedido!</h2>";
	 echo "<script>loginfail()</script>";
 }
 else
 {
	 //usa o insert_id para buscar o ultimo id/COD_PAR adicionado
	 $codped=mysqli_insert_id($conexao);
	
	//COMECA A COMPARAR O ARRAY DO CARRINHO
	foreach($codpro as $val)
		{
			$valor=$val;
			$quant=$_SESSION['carrinho'][$val];
			$sql="select COD_PAR from produto WHERE COD_PRO='$valor'";
			$res=mysqli_query($conexao, $sql);
			while($linha=mysqli_fetch_assoc($res))
				{
				$par=$linha['COD_PAR'];
	//INSERE ENQUANTO EXISTIR ITENS
	$sql1="insert into cliente_produto values ('$user', '$valor', '$par', $quant, '$codped', NOW())";
	$res1=mysqli_query($conexao,$sql1) or die (mysql_error()); 
				}
			}
			$sql="select sum(produto.PRECO*cliente_produto.QUANT_PRO) as 'TOTAL' from produto inner join cliente_produto on cliente_produto.COD_PRO=produto.COD_PRO inner join pedido on pedido.COD_PED=cliente_produto.COD_PED where pedido.COD_PED='$codped'";
	$res=mysqli_query($conexao, $sql) OR DIE;
	while($linha=mysqli_fetch_assoc($res))
		{
			$total=$linha['TOTAL'];
		}
		//ATUALIZANDO OS DADOS QUE ANTES ESTAVAM VAZIOS OU NULOS
	//define o parceiro que realizou a venda
	$sql="update pedido set pedido.COD_PAR='$par' where COD_PED='$codped'";
	$res=mysqli_query($conexao,$sql) or die;

	//define valor para o total do pedido na tabela de pedido
	$sql="update pedido set TOTAL_PED= '$total' where COD_PED='$codped'";
	$res=mysqli_query($conexao,$sql) or die;
	}
		}
	}
	//coloca obsevações do pedido
	if(isset($GET['troco'])){
	$troco=$GET['troco'];
	$sql="update pedido set OBS='Troco para R$ $troco' where COD_PED='$codped'";
	$res=mysqli_query($conexao,$sql) or die;
	}
	
	
	/*
	$sql="select cliente.* from cliente inner join pedido on pedido.COD_CLI=cliente.COD_CLI where pedido.COD_PED='$codped'";
	$res=mysqli_query($conexao, $sql);
	while($linha=mysqli_fetch_assoc($res))
		{
		$nome=$linha["NOME"];
		$email=$linha["EMAIL"];
		$end=$linha["ENDERECO"];
		$to  = $email;
		$subject = 'GOOD FOOD - Pedido efetuado!';
		$message = 'Seu pedido nº '.$codped." foi efetuado com sucesso!";
		$headers .= 'To: '.$nome.' <'.$email.'>' . "\r\n";
		$headers .= 'From: TCC <quatainformatica216@gmail.com>' . "\r\n";
		$headers .= 'Cc: quatainformatica216@gmail.com' . "\r\n";
		$headers .= 'Bcc: quatainformatica216@gmail.com' . "\r\n";
		mail($to, $subject, $message);
		*/
/*		
require_once('phpmailer/class.phpmailer.php');
$mail = new PHPMailer(true);
 CORPO DO E-MAIL 
$body = "<h2>Pedido Realizado</h2>";
$body .= "Nome:  <br>";
$body .= "E-mail: ".$email." <br>";
$body .= "Mensagem:<br>";
$body .= "Seu pedido nº ".$codped." foi efetuado com sucesso!";
$body .= "<br>";
$body .= "----------------------------";
$body .= "<br>";
$body .= "Enviado em <strong>".date("h:m:i d/m/Y")." por ".$_SERVER['REMOTE_ADDR']."</strong>"; //mostra a data e o IP
$body .= "<br>";
$body .= "----------------------------";
 
$mail->IsSMTP(); //tell the class to use SMTP
$mail->SMTPDebug  = 2;
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = 587; //SMTP porta (as mais utilizadas são '25' e '587'
$mail->Host = "smtp.gmail.com"; // SMTP servidor
$mail->Username = "quatainformatica2016@gmail.com";  // SMTP  usuário
$mail->Password = "quata2016";  // SMTP senha
 
$mail->IsSendmail();  
$mail->SetFrom('quatainformatica2016@gmail.com', 'Teste TCC'); 
$mail->From = $email; //e-mail fornecido pelo cliente
$mail->FromName   = $nome; //nome fornecido pelo cliente
$mail->AddReplyTo("quatainformatica2016@gmail.com","TCC");

$to = $email; //Enviar para
$mail->AddAddress($to); 
$mail->Subject  = "PEDIDO REALIZADO GOOD FOOD"; //Assunto
$mail->WordWrap   = 80; // set word wrap
 
$mail->MsgHTML($body);
 
$mail->IsHTML(true); // send as HTML
 
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
		}*/
		//
	//	}
	//finaliza sessao de carrinho
	unset($_SESSION['carrinho']);
	?>
<br><br>
<div id="confirmatab" style="margin:auto; left:0px;"><label style="position:relative; left:30px; top:30px;">
	  <h2>Compra Efetuada!</h2>
	  Este é o número de seu Pedido - <b><?php echo $codped; ?></b><br>
	  Agradecemos a preferência!<br><br>
	  <a href="index.php" style="text-decoration:none;">Página Inicial</a><br>
	  <a href='consultapdf.php?ped=<?php echo $codped; ?>' style="text-decoration:none;">Ver Pedido</a></label>
	  </div>
<?php 
    $codped="";
    ?>
	 </body>
	</html>