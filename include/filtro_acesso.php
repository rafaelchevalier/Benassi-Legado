<?
//MÓDULO FILTRO DE ACESSO
require 'conexao.php';
require 'funcoes.php';
require "config_filtros.php";
$data_atual =  date("d/m/Y");
$data_atual = converte_data($data_atual);
session_start();
//adiciona Filtro Acesso
if($funcao == "adicionaFiltroAcesso" and $filt_filtro_acesso_inclui == 1){//Adiciona Filtro Acesso

adicionaFiltroAcesso (
$_REQUEST['nome_perfil'],
$_REQUEST['descricao'],
$_REQUEST['filt_filtro_acesso_inclui'],
$_REQUEST['filt_filtro_acesso_altera'],
$_REQUEST['filt_filtro_acesso_exclui'],
$_REQUEST['filt_filtro_acesso_rel'],
$_REQUEST['filt_usuario_inclui'],
$_REQUEST['filt_usuario_altera'],
$_REQUEST['filt_usuario_exclui'],
$_REQUEST['filt_usuario_rel'],
$_REQUEST['filt_baixa_patrimonio'],
$_REQUEST['filt_patrimonio_inclui'],
$_REQUEST['filt_patrimonio_altera'],
$_REQUEST['filt_patrimonio_exclui'],
$_REQUEST['filt_patrimonio_rel'],
$_REQUEST['filt_planoacao_inclui'],
$_REQUEST['filt_planoacao_altera'],
$_REQUEST['filt_planoacao_exclui'],
$_REQUEST['filt_planoacao_rel'],
$_REQUEST['filt_chamado_inclui'],
$_REQUEST['filt_chamado_altera'],
$_REQUEST['filt_chamado_exclui'],
$_REQUEST['filt_chamado_rel'],
$_REQUEST['filt_chamado_ti'],
$_REQUEST['filt_pedido_inclui'],
$_REQUEST['filt_pedido_altera'],
$_REQUEST['filt_pedido_exclui'],
$_REQUEST['filt_pedido_rel'],
$_REQUEST['filt_pedido_aprova']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../filtro_acesso.php?pg=cad_perfil_acesso'>
	<script type=\"text/javascript\">	
	alert(\" Perfil de acesso foi cadastrado com sucesso.\");
	</script>";
}
if ($filt_filtro_acesso_inclui != 1){
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../filtro_acesso.php?pg=cad_perfil_acesso'>
	<script type=\"text/javascript\">	
	alert(\" Nível de acesso não permite cadastro de Perfil de Acesso! Entre em contato com administrador do sistema.\");
	</script>";
	}
// Função adiciona Filtro Acesso no banco de dados	
function adicionaFiltroAcesso(
		$cad_nome_perfil,
		$cad_descricao,
		$cad_filt_filtro_acesso_inclui,
		$cad_filt_filtro_acesso_altera,
		$cad_filt_filtro_acesso_exclui,
		$cad_filt_filtro_acesso_rel,
		$cad_filt_usuario_inclui,
		$cad_filt_usuario_altera,
		$cad_filt_usuario_exclui,
		$cad_filt_usuario_rel,
		$cad_filt_baixa_patrimonio,
		$cad_filt_patrimonio_inclui,
		$cad_filt_patrimonio_altera,
		$cad_filt_patrimonio_exclui,
		$cad_filt_patrimonio_rel,
		$cad_filt_planoacao_inclui,
		$cad_filt_planoacao_altera,
		$cad_filt_planoacao_exclui,
		$cad_filt_planoacao_rel,
		$cad_filt_chamado_inclui,
		$cad_filt_chamado_altera,
		$cad_filt_chamado_exclui,
		$cad_filt_chamado_rel,
		$cad_filt_pedido_inclui,
		$cad_filt_pedido_altera,
		$cad_filt_pedido_exclui,
		$cad_filt_pedido_rel,
		$cad_filt_pedido_aprova
		){
	$nome_usuario = $_SESSION['nome_usuario'];
	$sql = "insert into filtro_acesso(
		nome_perfil,
		descricao,
		filtro_acesso_inclui,
		filtro_acesso_altera,
		filtro_acesso_exclui,
		filtro_acesso_rel,
		usuario_inclui,
		usuario_altera,
		usuario_exclui,
		usuario_rel,
		baixa_patrimonio,
		patrimonio_inclui,
		patrimonio_altera,
		patrimonio_exclui,
		patrimonio_rel,
		planoacao_inclui,
		planoacao_altera,
		planoacao_exclui,
		planoacao_rel,
		chamado_inclui,
		chamado_altera,
		chamado_exclui,
		chamado_rel,
		pedido_inclui,
		pedido_altera,
		pedido_exclui,
		pedido_rel,
		pedido_aprova,
		data_cad,
		hora_cad,
		usuario_cad	
	) values (
		'$cad_nome_perfil',
		'$cad_descricao',
		'$cad_filt_filtro_acesso_inclui',
		'$cad_filt_filtro_acesso_altera',
		'$cad_filt_filtro_acesso_exclui',
		'$cad_filt_filtro_acesso_rel',
		'$cad_filt_usuario_inclui',
		'$cad_filt_usuario_altera',
		'$cad_filt_usuario_exclui',
		'$cad_filt_usuario_rel',
		'$cad_filt_baixa_patrimonio',
		'$cad_filt_patrimonio_inclui',
		'$cad_filt_patrimonio_altera',
		'$cad_filt_patrimonio_exclui',
		'$cad_filt_patrimonio_rel',
		'$cad_filt_planoacao_inclui',
		'$cad_filt_planoacao_altera',
		'$cad_filt_planoacao_exclui',
		'$cad_filt_planoacao_rel',
		'$cad_filt_chamado_inclui',
		'$cad_filt_chamado_altera',
		'$cad_filt_chamado_exclui',
		'$cad_filt_chamado_rel',
		'$cad_filt_pedido_inclui',
		'$cad_filt_pedido_altera',
		'$cad_filt_pedido_exclui',
		'$cad_filt_pedido_rel',
		'$cad_filt_pedido_aprova',
		now(),
		now(),
		'$nome_usuario'
		
	)";
	mysql_query($sql);
	}

// Fim adiciona Filtro Acesso
//***************** ecluir Filtro Acesso *****************************************
if($funcao == "excluirFiltroAcesso"){
	$id = $_GET['id'];
	$sql = ("DELETE FROM filtro_acesso where id='$id'");
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../filtro_acesso.php?pg=relFiltroAcesso'>
	<script type=\"text/javascript\">	
	</script>";
}

//FUNÇÕES FILTRO ACESSO



?>