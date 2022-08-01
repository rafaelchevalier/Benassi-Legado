 <?
require 'conexao.php';
require 'funcoes.php';

$funcao = $_REQUEST['funcao'];
$id = $_REQUEST['id'];

//************************************ INICIO CADASTRA AFERIÇÃO *******************************************************

if($funcao == "cad"){//Cadastra nova aferição
    $qt = 0;
   if ($_POST['qt'] =="" or $_POST['qt'] > "1000" ){$_POST['qt'] = 100; }
   for($i=0; $i < $_POST['qt']; $i++){
	$qt ++;
		if($_POST['contagem'.$i] != "" and $_POST['caixa'.$i]){
			$filiais_cadstradas = 
			cad (
				converte_data($_POST['data']),
				utf8_decode($_POST['usuario']),
				$_POST['caixa'.$i],
				$_POST['id_mercado'.$i],
				$_POST['cod_mercado'.$i],
				$_POST['filial_mercado'.$i],
				$_POST['fantasia_mercado'.$i],
				$_POST['razao_mercado'.$i],
				$_POST['saldo_oficial'.$i],
				$_POST['recebido'.$i],
				$_POST['enviado'.$i],
				$_POST['contagem'.$i]);
		}
		//sleep(1);
	}
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../cont_caixas.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\"Contagem realizada com sucesso.\");
	</script>";
}// Fim teste funcao=cad

function cad($data_cad,$usuario_cad,$cod_caixa,$id_mercado,$cod_mercado,$filial_mercado,$fantasia_mercado,$razao_mercado,$saldo_oficial,$recebido,$enviado,$contagem){// Cadastra
	
	$saldo_oficial = $saldo_oficial + $recebido - $enviado;//Calcula saldo oficial com caixas recebidas e enviadas.
	
	$sql = "insert into cont_caixas (data_cad,usuario_cad,cod_caixa,id_mercado,cod_mercado,filial_mercado,fantasia_mercado,razao_mercado,saldo_oficial,recebido,enviado,contagem) values 
	('$data_cad','$usuario_cad','$cod_caixa','$id_mercado','$cod_mercado','$filial_mercado','$fantasia_mercado','$razao_mercado','$saldo_oficial','$recebido','$enviado','$contagem')";
	mysql_query($sql);
	}// Fim função cad

//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM cont_caixas where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../cont_caixas.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from cont_caixas WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../cont_caixas.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";
}

?>