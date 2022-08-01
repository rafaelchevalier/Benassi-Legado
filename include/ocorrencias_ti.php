<?
include 'conexao.php';
require "funcoes.php";
//************************************ INICIO FUNÇÕES CHAMADO *******************************************************

if($funcao == "cad_ocorrencias_ti"){//Adiciona novo chamado
cad_ocorrencias_ti (utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['fornecedor']),utf8_decode($_REQUEST['servico']),utf8_decode($_REQUEST['descricao']),converte_data($_REQUEST['data_erro']),$_REQUEST['hora_erro'],converte_data($_REQUEST['data_solucao']),$_REQUEST['hora_solucao']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../ocorrencias_ti.php?pg=cad_ocorrencias'>
	<script type=\"text/javascript\">	
	alert(\" Ocorrência cadastrada com sucesso.\");
	</script>";
}// Fim adiciona novo chamado

function cad_ocorrencias_ti($nome, $fornecedor, $servico,$descricao,$data_erro,$hora_erro,$data_solucao,$hora_solucao){// Abre chamado
	$sql = "insert into ocorrencias_ti (usuario_cad,fornecedor,servico,descricao,data_erro,hora_erro,data_solucao,hora_solucao,data_cad,hora_cad) values ('$nome','$fornecedor','$servico','$descricao','$data_erro','$hora_erro','$data_solucao','$hora_solucao',now(),now())";
	mysql_query($sql);
	}// Fim abre chamado

//********************************** Inicio Chamado **********************************************
if($funcao == "fecha_ocorrencias_ti"){//Adiciona um novo usuário
$id = $_GET['id'];
fecha_ocorrencias_ti(utf8_decode($_REQUEST['nome_tecnico']),utf8_decode($_REQUEST['detalhe']),$_REQUEST['solucao']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../chamado.php?pg=chamado_aberto'>
	<script type=\"text/javascript\">	
	alert(\" Chamado fechado com sucesso.\");
	</script>";
}

	
function fecha_ocorrencias_ti($nome_tecnico,$detalhe,$solucao){
		$id = $_GET['id'];
	$sql = (" UPDATE ocorrencias_ti SET situacao='FECHADO',detalhe='$detalhe',atendido_por='$nome_tecnico',solucao='$solucao', hora_atendimento=now(), data_atendimento=now() where id='$id'");
	require"email/email_chamado_finaliza.php";
	require"email/email_chamado_atualiza_status.php";
	mysql_query($sql);
	}
//********************************** Fim Chamado **********************************************

if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from ocorrencias_ti WHERE id IN ($excluir) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../ocorrencias_ti.php?pg=consulta_ocorrencias'>
	<script type=\"text/javascript\">	
	</script>";
}
?>