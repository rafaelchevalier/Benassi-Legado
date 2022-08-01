<?
//MÓDULO PLANO DE AÇÃO 
include 'conexao.php';
include 'funcoes.php';
//adiciona plano de ação
if($funcao == "adiciona_plano_de_acao"){//Adiciona plano de ação
adiciona_plano_de_acao (utf8_decode($_REQUEST['situacao_atual']), utf8_decode($_REQUEST['acao']), utf8_decode($_REQUEST['tipo_custo']),$_REQUEST['custo'],$_REQUEST['data_previsao'],utf8_decode($_REQUEST['meta']),utf8_decode($_REQUEST['status']),utf8_decode($_REQUEST['setor']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../planodeacao.php?pg=relplanodeacao'>
	<script type=\"text/javascript\">	
	alert(\" Seu plano de ação foi cadastrado com sucesso.\");
	</script>";
}

// Função adiciona plano de ação no banco de dados	
function adiciona_plano_de_acao($situacao_atual, $acao, $tipo_custo, $custo, $data_precisao, $meta, $status, $setor){
	$data_precisao2 = converte_data($data_precisao);
	$usuario_cad = $_SESSION['nome_usuario'];
	$sql = "insert into plano_de_acao(situacao_atual,acao,tipo_custo,custo,data_previsao,meta,status,setor,data_cad,hora_cad,usuario_cad) values 			('$situacao_atual','$acao','$tipo_custo','$custo','$data_precisao2','$meta','$status','$setor',now(),now(),'$usuario_cad')";
	mysql_query($sql);
	}

// Fim adiciona plano ação

//***************** Finaliza Plano de ação *****************************************
if($funcao == "finaliza"){
	$id = $_GET['id'];
	$sql = ("UPDATE plano_de_acao SET status='CONCLUIDO', data_conclusao=now() where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../planodeacao.php?pg=relplanodeacao'>
	<script type=\"text/javascript\">	
	</script>";
}


//***************** ecluir plano de ação *****************************************
if($funcao == "excluir_plano_de_acao"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM plano_de_acao where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../planodeacao.php?pg=relplanodeacao'>
	<script type=\"text/javascript\">	
	</script>";
}

//FUNÇÕES PLANO DE AÇÃO



?>