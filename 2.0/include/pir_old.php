 <?
require 'conexao.php';
require 'funcoes.php';
require 'funcoes_aux.php';
session_start();
$nome_usuario_logado = $_SESSION['id_usuario'];
//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){
cad (	
	converte_data2($_REQUEST['data']),
	utf8_decode($_REQUEST['produto']),
	$_REQUEST['quantidade'],
	utf8_decode($_REQUEST['fornecedor']),
	utf8_decode($_REQUEST['lote']),
	$_REQUEST['av_resistencia'],
	$_REQUEST['av_coloracao'],
	$_REQUEST['av_higiene'],
	$_REQUEST['av_dizeres'],
	$_REQUEST['loja']
);
	echo"
	<script type=\"text/javascript\">	
		alert(\" Cadastro efetuado com sucesso.\");
		window.history.back();
	</script>";
}

function cad(
	$data,
	$produto,
	$quantidade,
	$fornecedor,
	$lote,
	$av_resistencia,
	$av_coloracao,
	$av_higiene,
	$av_dizeres,
	$loja
	){

		$sql = "insert into pir (
			data,
			produto,
			quantidade,
			fornecedor,
			lote,
			av_resistencia,
			av_coloracao,
			av_higiene,
			av_dizeres,
			id_loja,
			usuario_cad,
			data_cad
		) values (
			'$data',
			'$produto',
			'$quantidade',
			'$fornecedor',
			'$lote',
			'$av_resistencia',
			'$av_coloracao',
			'$av_higiene',
			'$av_dizeres',
			'$loja',
			'$nome_usuario_logado',
			now()
		)";
		mysql_query($sql);
	}// Fim função cad
	
//************************************ FIM CADASTRA *******************************************************

//************************************ INICIO UPDATE *******************************************************	

if($funcao == "alt"){
	$id = $_GET['id'];

	alt(
		converte_data2($_REQUEST['data']),
		utf8_decode($_REQUEST['produto']),
		$_REQUEST['quantidade'],
		utf8_decode($_REQUEST['fornecedor']),
		utf8_decode($_REQUEST['lote']),
		$_REQUEST['av_resistencia'],
		$_REQUEST['av_coloracao'],
		$_REQUEST['av_higiene'],
		$_REQUEST['av_dizeres'],
		$_REQUEST['loja'],
		$id
	);

	echo"
	<script type=\"text/javascript\">	
		alert(\" Registro Alterado com sucesso.\");
		window.history.back();
	</script>";

}
function alt(
	$data,
	$produto,
	$quantidade,
	$fornecedor,
	$lote,
	$av_resistencia,
	$av_coloracao,
	$av_higiene,
	$av_dizeres,
	$loja,
	$id
	){
		$sql = (" UPDATE pir SET 
			data='$data',
			produto='$produto',
			quantidade='$quantidade',
			fornecedor='$fornecedor',
			lote='$lote',
			av_resistencia='$av_resistencia',
			av_coloracao='$av_coloracao',
			av_higiene='$av_higiene',
			av_dizeres='$av_dizeres',
			id_loja='$loja',
			usuario_alt='$nome_usuario_logado'
			WHERE id='$id'
		");
		mysql_query($sql);
	}


		
//************************************ FIM UPDATE *******************************************************	
//************************************ INICIO EXCLUSAO *******************************************************

if($funcao == "exclui"){
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql 		= ("DELETE FROM pir WHERE id IN ($excluir)");
	mysql_query($sql);
	
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pir.php?pg=con'>
	<script type=\"text/javascript\">	
		alert(\" Registros Excluidos com sucesso.\");
	</script>";
}
//************************************ FIM EXCLUSAO *******************************************************

?>