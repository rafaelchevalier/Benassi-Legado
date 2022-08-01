 <?
include 'conexao.php';

//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){//Cadastra
if ( $_REQUEST['origem'] != "" and $_REQUEST['transporte'] != ""){
cad (
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
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}
if ( $_REQUEST['origem'] == "" or $_REQUEST['transporte'] == ""){ 
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Todos os campos obrigat&oacute;rios devem ser preenchidos.\");
	</script>";
	}
}

function cad($origem,$cabine_limpeza,$cabine_integridade,$bau_limpeza,$bau_integridade,$pneu,$uniforme_completo,$uniforme_limpo,$asseio,$comportamento,$usuario,$transporte){// Cadastra
	$sql = "insert into pat (
	origem,
	cabine_limpeza,
	cabine_integridade,
	bau_limpeza,
	bau_integridade,
	pneu,
	uniforme_completo,
	uniforme_limpo,
	asseio,
	comportamento,
	transporte_id,
	usuario_cad,
	data_pat,
	data_cad,
	hora_cad
	) values (
	'$origem',
	'$cabine_limpeza',
	'$cabine_integridade',
	'$bau_limpeza',
	'$bau_integridade',
	'$pneu',
	'$uniforme_completo',
	'$uniforme_limpo',
	'$asseio',
	'$comportamento',
	'$transporte',
	'$usuario',
	now(),
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
	$id = $_GET['id'];
	$sql = ("DELETE FROM pat where id='$id' limit 1");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../pat.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

?>