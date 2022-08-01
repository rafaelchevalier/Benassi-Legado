 <?
require 'conexao.php';
require 'funcoes.php';

//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){//Cadastra
cad (
converte_data($_REQUEST['data']),
strtoupper(utf8_decode($_REQUEST['hora'])),
strtoupper(utf8_decode($_REQUEST['placa'])),
strtoupper(utf8_decode($_REQUEST['motorista'])),
strtoupper(utf8_decode($_REQUEST['tipo'])),
strtoupper(utf8_decode($_REQUEST['origem'])),
strtoupper(utf8_decode($_REQUEST['cabine_limpeza'])),
strtoupper(utf8_decode($_REQUEST['cabine_limpeza_obs'])),
strtoupper(utf8_decode($_REQUEST['cabine_integridade'])),
strtoupper(utf8_decode($_REQUEST['cabine_integridade_obs'])),
strtoupper(utf8_decode($_REQUEST['bau_limpeza'])),
strtoupper(utf8_decode($_REQUEST['bau_limpeza_obs'])),
strtoupper(utf8_decode($_REQUEST['bau_integridade'])),
strtoupper(utf8_decode($_REQUEST['bau_integridade_obs'])),
strtoupper(utf8_decode($_REQUEST['pneu'])),
strtoupper(utf8_decode($_REQUEST['pneu_obs'])),
strtoupper(utf8_decode($_REQUEST['uniforme_completo'])),
strtoupper(utf8_decode($_REQUEST['uniforme_completo_obs'])),
strtoupper(utf8_decode($_REQUEST['uniforme_limpo'])),
strtoupper(utf8_decode($_REQUEST['uniforme_limpo_obs'])),
strtoupper(utf8_decode($_REQUEST['asseio'])),
strtoupper(utf8_decode($_REQUEST['asseio_obs'])),
strtoupper(utf8_decode($_REQUEST['comportamento'])),
strtoupper(utf8_decode($_REQUEST['comportamento_obs'])),
utf8_decode(utf8_decode($_REQUEST['obs']))
);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}

function cad(
$data,
$hora,
$placa,
$motorista,
$tipo,
$origem,
$cabine_limpeza,
$cabine_limpeza_obs,
$cabine_integridade,
$cabine_integridade_obs,
$bau_limpeza,
$bau_limpeza_obs,
$bau_integridade,
$bau_integridade_obs,
$pneu,
$pneu_obs,
$uniforme_completo,
$uniforme_completo_obs,
$uniforme_limpo,
$uniforme_limpo_obs,
$asseio,
$asseio_obs,
$comportamento,
$comportamento_obs,
$obs
){// Cadastra
$usuario_cad = $_SESSION['login_usuario'];
	$sql = "insert into pat (
	data_pat,
	hora_pat,
	placa,
	motorista,
	tipo,
	origem,
	cabine_limpeza,
	cabine_limpeza_obs,
	cabine_integridade,
	cabine_integridade_obs,
	bau_limpeza,
	bau_limpeza_obs,
	bau_integridade,
	bau_integridade_obs,
	pneu,
	pneu_obs,
	uniforme_completo,
	uniforme_completo_obs,
	uniforme_limpo,
	uniforme_limpo_obs,
	asseio,
	asseio_obs,
	comportamento,
	comportamento_obs,
	obs,
	usuario_cad,
	data_cad,
	hora_cad
	) values (
	'$data',
	'$hora',
	'$placa',
	'$motorista',
	'$tipo',
	'$origem',
	'$cabine_limpeza',
	'$cabine_limpeza_obs',
	'$cabine_integridade',
	'$cabine_integridade_obs',
	'$bau_limpeza',
	'$bau_limpeza_obs',
	'$bau_integridade',
	'$bau_integridade_obs',
	'$pneu',
	'$pneu_obs',
	'$uniforme_completo',
	'$uniforme_completo_obs',
	'$uniforme_limpo',
	'$uniforme_limpo_obs',
	'$asseio',
	'$asseio_obs',
	'$comportamento',
	'$comportamento_obs',
	'$obs',
	'$usuario_cad',
	now(),
	now()
	
	)";
	mysql_query($sql);
	}// Fim função cad
//************************************ INICIO Altera aferição *******************************************************	
if($funcao == "alt"){
$id = $_GET['id'];
if ( $_REQUEST['origem'] != "" and $_REQUEST['transporte'] != ""){
alt(
utf8_decode($_REQUEST['origem']),
utf8_decode($_REQUEST['cabine_limpeza']),
utf8_decode($_REQUEST['cabine_integridade']),
utf8_decode($_REQUEST['bau_limpeza']),
utf8_decode($_REQUEST['bau_integridade']),
utf8_decode($_REQUEST['pneu']),
utf8_decode($_REQUEST['uniforme_completo']),
utf8_decode($_REQUEST['uniforme_limpo']),
utf8_decode($_REQUEST['asseio']),
utf8_decode($_REQUEST['comportamento']),
utf8_decode($_REQUEST['usuario']),
utf8_decode($_REQUEST['transporte']));

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}
if ( $_REQUEST['origem'] == "" or $_REQUEST['transporte'] == ""){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=alt&id=$id'>
	<script type=\"text/javascript\">	
	alert(\" Todos os campos obrigat&oacute;rios devem ser preenchidos.\");
	</script>";
	}
}
function alt($origem,$cabine_limpeza,$cabine_integridade,$bau_limpeza,$bau_integridade,$pneu,$uniforme_completo,$uniforme_limpo,$asseio,$comportamento,$usuario,$transporte){
		$id = $_GET['id'];
	$sql = (" UPDATE pat SET 
	origem='$origem',
	cabine_limpeza='$cabine_limpeza',
	cabine_integridade='$cabine_integridade',
	bau_limpeza='$bau_limpeza',
	bau_integridade='$bau_integridade',
	pneu='$pneu',
	uniforme_completo='$uniforme_completo',
	uniforme_limpo='$uniforme_limpo',
	asseio='$asseio',
	comportamento='$comportamento',
	transporte_id='$transporte',
	usuario_alt='$usuario',
	data_alt= now(),
	hora_alt= now()
	where id='$id'");
	mysql_query($sql);
	}


//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from pat WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>