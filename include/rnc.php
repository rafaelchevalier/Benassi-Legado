 <?
require 'conexao.php';
require 'funcoes.php';
require 'funcoes_aux.php';
//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){//Cadastra
if ( $_REQUEST['num_rnc'] != "" and $_REQUEST['data_rnc'] != "" and $_REQUEST['tipo'] != "" and $_REQUEST['processo'] != ""){

cad (
	utf8_decode($_REQUEST['num_rnc']),
	converte_data($_REQUEST['data_rnc']),
	utf8_decode($_REQUEST['tipo']),
	utf8_decode($_REQUEST['processo']),
	utf8_decode($_REQUEST['descricao']),
	utf8_decode($_REQUEST['disposicao']),
	utf8_decode($_REQUEST['causa']),
	utf8_decode($_REQUEST['eficiencia_decisao']),
	converte_data($_REQUEST['eficiencia_data']),
	utf8_decode($_REQUEST['eficiencia_responsavel']),
	utf8_decode($_REQUEST['eficiencia_novo_rnc']),
	utf8_decode($_REQUEST['usuario'])
);
	for($b=0; $b<=40; $b ++){
		if( $_REQUEST['data_acao'.$b] != "" and  $_REQUEST['responsavel'.$b] != "" and  $_REQUEST['descricao'.$b] != ""){
		cad_acao_rn(
			utf8_decode($_REQUEST['acao'.$b]),
			converte_data($_REQUEST['data_acao'.$b]),
			utf8_decode($_REQUEST['responsavel'.$b]),
			utf8_decode($_REQUEST['descricao'.$b]),
			utf8_decode($_REQUEST['num_rnc']),
			utf8_decode($_REQUEST['usuario'])
		);
			}
	}// fim for($b=0 ; $b<=$i ; $b ++){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rnc.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro efetuado com sucesso.\");
	</script>";
}
if ( $_REQUEST['num_rnc'] == "" and $_REQUEST['data_rnc'] == "" and $_REQUEST['tipo'] == "" and $_REQUEST['processo'] == ""){ 
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rnc.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Todos os campos obrigat&oacute;rios devem ser preenchidos.\");
	</script>";
	}
}

function cad($num_rnc,$data_rnc,$tipo,$processo,$descricao,$disposicao,$causa,$eficiencia_decisao,$eficiencia_data,$eficiencia_responsavel,$eficiencia_novo_rnc,$usuario){// Cadastra
	$sql = "insert into rnc (
	num_rnc,
	data_rnc,
	tipo,
	processo,
	descricao,
	disposicao,
	causa,
	eficiencia_decisao,
	eficiencia_data,
	eficiencia_responsavel,
	eficiencia_novo_rnc,
	usuario_cad,
	data_cad,
	hora_cad
	) values (
	'$num_rnc',
	'$data_rnc',
	'$tipo',
	'$processo',
	'$descricao',
	'$disposicao',
	'$causa',
	'$eficiencia_decisao',
	'$eficiencia_data',
	'$eficiencia_responsavel',
	'$eficiencia_novo_rnc',
	'$usuario',
	now(),
	now()
	)";
	mysql_query($sql);
	}// Fim função cad
	
function cad_acao_rn($acao,$data_acao,$responsavel,$descricao,$num_rnc,$usuario){// Cadastra
	$sql2 = "insert into acao_rnc (
	acao,
	data_acao,
	responsavel,
	descricao,
	num_rnc,
	usuario_cad,
	data_cad,
	hora_cad
	) values (
	'$acao',
	'$data_acao',
	'$responsavel',
	'$descricao',
	'$num_rnc',
	'$usuario',
	now(),
	now()
	)";
	mysql_query($sql2);
	}// Fim função cad_acao_rn
//************************************ INICIO ALTERA*******************************************************	
if($funcao == "alt"){//ALTERA
if ( $_REQUEST['num_rnc'] != "" and $_REQUEST['data_rnc'] != "" and $_REQUEST['tipo'] != "" and $_REQUEST['processo'] != ""){

	alt (
		utf8_decode($_REQUEST['num_rnc']),
		converte_data($_REQUEST['data_rnc']),
		utf8_decode($_REQUEST['tipo']),
		utf8_decode($_REQUEST['processo']),
		utf8_decode($_REQUEST['descricao']),
		utf8_decode($_REQUEST['disposicao']),
		utf8_decode($_REQUEST['causa']),
		utf8_decode($_REQUEST['eficiencia_decisao']),
		converte_data($_REQUEST['eficiencia_data']),
		utf8_decode($_REQUEST['eficiencia_responsavel']),
		utf8_decode($_REQUEST['eficiencia_novo_rnc']),
		utf8_decode($_REQUEST['usuario'])
	);
	$itens_incluidos = 0;
	for($i=0; $i<=40; $i ++){
		if( $_REQUEST['data_acao'.$i] != "" and  $_REQUEST['responsavel'.$i] != "" and  $_REQUEST['descricao'.$i] != "" and $_REQUEST['id_item_alt'.$i] == ""){
		$itens_incluidos = 0;
		cad_acao_rn
		(
			utf8_decode($_REQUEST['acao'.$i]),
			converte_data($_REQUEST['data_acao'.$i]),
			utf8_decode($_REQUEST['responsavel'.$i]),
			utf8_decode($_REQUEST['descricao'.$i]),
			utf8_decode($_REQUEST['num_rnc']),
			utf8_decode($_REQUEST['usuario'])
		);
			}
	}// fim for($b=0 ; $b<=$i ; $b ++){
	$itens_alterados = 0;
	for($a=0; $a<=40; $a ++){
		if( $_REQUEST['data_acao_alt'.$a] != "" and  $_REQUEST['responsavel_alt'.$a] != "" and  $_REQUEST['descricao_alt'.$a] != "" and $_REQUEST['id_item_alt'.$a] != ""){
		$itens_alterados ++;
		alt_acao_rn
		(
			converte_data($_REQUEST['data_acao_alt'.$a]),
			utf8_decode($_REQUEST['responsavel_alt'.$a]),
			utf8_decode($_REQUEST['descricao_alt'.$a]),
			utf8_decode($_REQUEST['num_rnc']),
			utf8_decode($_REQUEST['usuario']),
			$_REQUEST['id_item_alt']
		);
			}
	}// fim for($b=0 ; $b<=$i ; $b ++){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rnc.php?pg=alt&id=$id'>
	<script type=\"text/javascript\">	
	alert(\" Alteração efetuada com sucesso. [Itens Incluidos = $itens_incluidos], [Itens Alterados = $itens_alterados] \");
	</script>";
}
if ( $_REQUEST['num_rnc'] == "" and $_REQUEST['data_rnc'] == "" and $_REQUEST['tipo'] == "" and $_REQUEST['processo'] == ""){ 
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rnc.php?pg=cad'>
	<script type=\"text/javascript\">	
	alert(\" Todos os campos obrigat&oacute;rios devem ser preenchidos.\");
	</script>";
	}
}


function alt($num_rnc,$data_rnc,$tipo,$processo,$descricao,$disposicao,$causa,$eficiencia_decisao,$eficiencia_data,$eficiencia_responsavel,$eficiencia_novo_rnc,$usuario){// Cadastra
	$id = $_GET['id'];
	$sql = 
	(" 
		UPDATE rnc SET 
			num_rnc='$num_rnc',
			data_rnc='$data_rnc',
			tipo='$tipo',
			processo='$processo',
			descricao='$descricao',
			disposicao='$disposicao',
			causa='$causa',
			eficiencia_decisao='$eficiencia_decisao',
			eficiencia_data='$eficiencia_data',
			eficiencia_responsavel='$eficiencia_responsavel',
			eficiencia_novo_rnc='$eficiencia_novo_rnc',
			usuario_alt='$usuario',
			data_alt=now(),
			hora_alt=now() 
		WHERE 
			id='$id'
	");
	mysql_query($sql);
	}// Fim função cad

function alt_acao_rn($data_acao,$responsavel,$descricao,$num_rnc,$usuario,$id_acao_rnc){// Cadastra
	var_dump($data_acao);
	
	$sql2 = 
	("
		UPDATE acao_rnc SET 
			data_acao='$data_acao',
			responsavel='$responsavel',
			descricao='$descricao',
			num_rnc='$num_rnc',
			usuario_alt='$usuario',
			data_alt=now(),
			hora_alt=now() 
		WHERE 
			id = '$id_acao_rnc'
		AND 
			num_rnc = '$num_rnc'
	") ;
	mysql_query($sql2);
	}// Fim função cad_acao_rn



//************************************ INICIO EXCLUIR *******************************************************
if($funcao == "exclui"){
	$id = $_GET['id'];
	$num_rnc = busca_num_rnc_id($id);
	$sql = ("DELETE FROM rnc where id='$id' limit 1");
	$sql_acao_rnc = ("DELETE FROM acao_rnc where num_rnc='$num_rnc' limit 1000  ");
	mysql_query($sql);
	mysql_query($sql_acao_rnc);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rnc.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}


?>