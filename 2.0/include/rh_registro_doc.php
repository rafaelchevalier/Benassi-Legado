<?
require 'conexao.php';
require'funcoes.php';
require'funcoes_aux.php';
$funcao ="";
$funcao = $_GET['funcao'];

//************************************ INICIO Cadastro PESQ*******************************************************

if($funcao == "cad"){//Adiciona Cabeçalho Registro de documentop RH
cad (	converte_data($_REQUEST['data']),
		utf8_decode($_REQUEST['remetente']),
		utf8_decode($_REQUEST['id_remetente']),
		utf8_decode($_REQUEST['destinatario']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_registro_doc.php?pg=consulta'>
	<script type=\"text/javascript\">	
		alert(\"Cadastro efetuado com sucesso.\");
	</script>";
}// Fim teste funcao=cad

function cad($data,$remetente,$id_remetente,$id_destinatario){// Cadastra Documentos do registro de documentos RH
	$destinatario = busca_nome_usuario($id_destinatario);
	$sql = "insert into rh_cab_circulacao_de_documentos 
			(data,remetente,id_remetente,destinatario,id_destinatario) 
		values 
			('$data','$remetente','$id_remetente','$destinatario','$id_destinatario')";
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
		for ($i=0; $i <= 100; $i++){
			if($_REQUEST['documento'.$i] != ""){
cad_doc (	utf8_decode($_REQUEST['empresa'.$i]),
			utf8_decode($_REQUEST['funcionario'.$i]),
			utf8_decode($_REQUEST['documento'.$i])
			,$ultimo_id);	
		}}
	}// Fim função cad

function cad_doc($empresa,$funcionario,$documento,$ultimo_id){
	$cad_doc = "insert into rh_doc_circulacao_de_documentos 
			(id_empresa,funcionario,documento,id_cab) 
		values 
			('$empresa','$funcionario','$documento','$ultimo_id')";
	mysql_query($cad_doc);
}
if (!function_exists('busca_situacao')) {
	function busca_situacao($id){
		$sql = mysql_query("
				SELECT * FROM rh_doc_circulacao_de_documentos  
				WHERE id_cab = '$id'
				and situacao = '1'
			");
		$cont = mysql_num_rows($sql);
		return($cont);
	}
}
/****************************************************************************************************************
										Exclusão
****************************************************************************************************************/
if($funcao == "exclui_cab"){	
	$excluir = $_GET['id'];
	$cont = busca_situacao($excluir);
	if($cont == 0){
		$sql = "delete from rh_cab_circulacao_de_documentos 
				WHERE id IN ($excluir) ";
		mysql_query($sql);
	}
	if($cont > 0){
		echo "
			<script type=\"text/javascript\">	
				alert(\"Esse registro já tem $cont documentos confirmados. Serão excluidos somente documento ainda não confirmados!\");
			</script>
		";
	}
	$sql_doc = "delete from rh_doc_circulacao_de_documentos 
			WHERE id_cab IN ($excluir) 
			and situacao = '0'
			";
	mysql_query($sql_doc);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_registro_doc.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}

//Exclui somente documento sozinho

if($funcao == "exclui_doc"){	
	$excluir = $_GET['id'];
	$cont = verifica_situacao_doc($excluir);
	if($cont > 0){
		$sql_doc = "delete from rh_doc_circulacao_de_documentos 
			WHERE id IN ($excluir) 
			and situacao = '0'
			";
		mysql_query($sql_doc);
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../rh_registro_doc.php?pg=consulta'>
			<script type=\"text/javascript\">	
				alert(\"Documento excluído com sucesso!\");
			</script>";	
	}
	if($cont == 0){
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../rh_registro_doc.php?pg=consulta'>
			<script type=\"text/javascript\">	
				alert(\"Documento não pode ser excluído, pois já foi confirmado pelo usuário!\");
			</script>";
	}
}
/****************************************************************************************************************
										Fim Exclusão
****************************************************************************************************************/
/****************************************************************************************************************
										Confirma documento
****************************************************************************************************************/
if($funcao == "confirma_doc"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "UPDATE rh_doc_circulacao_de_documentos 
			SET situacao='1' 
			WHERE id IN ($excluir) ";
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../rh_registro_doc.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";
}
/****************************************************************************************************************
										Fim Confirma documento
****************************************************************************************************************/
?>