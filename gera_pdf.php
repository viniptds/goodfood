<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
include ("dompdf/dompdf_config.inc.php");
//cria o objeto PDF
$dompdf = new DOMPDF();
require("conexao.php");
$ped=$_GET['ped'];
$sql="select pedido.DATA_PED,(select NOME from cliente where pedido.COD_CLI=cliente.COD_CLI) as'NOMECLI', (select parceiro.NOME from parceiro inner join pedido on pedido.COD_PAR=parceiro.COD_PAR where parceiro.COD_PAR=(select COD_PAR from pedido where COD_PED='$ped') limit 1) as 'NOMEPAR', TOTAL_PED from pedido where COD_PED='$ped'";
$res=mysqli_query($conexao,$sql);
$row=mysqli_fetch_assoc($res);

//gera o conteudo da folha
$script=
	"<html>
		<body>
		<div id='top' style='position:relative; left:70px; width:300px;'>
			<h1>Pedido N&ordm; ".$ped."<br>".$row["NOMECLI"]."<br>".$row["NOMEPAR"]."<br></h1>
			</div><br>
			Efetuado em: ".$row["DATA_PED"]."<BR>
			<table style='border:1px solid black; width:50%;'>
 <thead>
<tr>
<th width=>Produto</th>
<th width=20%>Quantidade</th>
<th width=20% align='center'>Total</th> 
 </tr>
        </thead>
		<tbody>";
		$sql = "SELECT pedido.ENDERECO,pedido.TOTAL_PED,pedido.FORMA_PAG,pedido.OBS, produto.NOME, cliente_produto.QUANT_PRO as 'QUANT_PRO'from pedido inner join cliente_produto on cliente_produto.COD_PED=pedido.COD_PED inner join cliente on pedido.COD_CLI=cliente.COD_CLI inner join produto on cliente_produto.COD_PRO=produto.COD_PRO where pedido.COD_PED='$ped' group by NOME";
        $qr    = mysqli_query($conexao,$sql) or die;
        while($ln = mysqli_fetch_assoc($qr)){
                                 
        $nome  = $ln['NOME'];
		$qtd = $ln['QUANT_PRO'];
		$end=$ln['ENDERECO'];
		$fpag=$ln['FORMA_PAG'];
		$total=$ln['TOTAL_PED'];
     	$script.="<tr><td>".$nome."</td><td align='center'>".$qtd."</td></tr>";
		}
		$total = number_format($total, 2, ',', '.');
			$script.="<tr><td align='center' colspan=2><b>Total</b><td align='center'>R$ ".$total."</td></tr></tbody></table>";
			$script.="<br><h3>Endereço para entrega: ".$end; 
			$script.="<br>Forma de Pagamento: <b>".$fpag."</b></h3>";
            $script.="<br>Obs. ".$ln["OBS"];
	$script.="</body>
	 </html>";
	 

//gera o nome do arquivo
$arquivo=$row['NOMEPAR']."pedido".$ped.".pdf";
$script = preg_replace('/>\s+</', '><', $script);
$dompdf->load_html($script);
// var_dump($script);
// die;
$dompdf->render();
$dompdf->stream($arquivo,array("Attachment" => false));

//gatilho para troca de status - apos permitir a impressao, o status altera de 'Realizado' para 'Em Preparo'
$sql="update pedido set STATUS='Em Preparo' where pedido.COD_PED='$ped'";
$res1=mysqli_query($conexao,$sql) or die;
exit();
?>