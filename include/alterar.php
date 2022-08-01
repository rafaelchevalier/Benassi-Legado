<?
require "conexao.php";
require "funcoes.php";
require "config_filtros.php";
$filt_usuario_filtro;

if($funcao == "alterauser"){
$id = $_GET['id'];
if ($_REQUEST['senha'] != ""){
alterauser($_REQUEST['nome'], 
$_REQUEST['nivel_usuario'], $_REQUEST['login'],md5($_REQUEST['senha']),$_REQUEST['email'],$_REQUEST['dia'],$_REQUEST['mes'],$_REQUEST['telefone'],$_REQUEST['celular'], $_REQUEST['radio'],$_REQUEST['setor']);
}
if ($_REQUEST['senha'] == ""){
alterauser($_REQUEST['nome'], $_REQUEST['nivel_usuario'], $_REQUEST['login'],$_REQUEST['senha'],$_REQUEST['email'],$_REQUEST['dia'],$_REQUEST['mes'],$_REQUEST['telefone'],$_REQUEST['celular'], $_REQUEST['radio'],$_REQUEST['setor']);
}
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuarios.php?pg=relusuario'>
	<script type=\"text/javascript\">	
	</script>";

}


if($funcao == "altera_patrimonio"){
$id = $_GET['id'];

altera_patrimonio(utf8_decode($_REQUEST['categoria']), 
			utf8_decode($_REQUEST['descricao']), 
			$_REQUEST['num_patrimonio'],
			utf8_decode($_REQUEST['fornecedor']),
			utf8_decode($_REQUEST['sala']),
			utf8_decode($_REQUEST['local']), 
			$_REQUEST['valor'], 
			$_REQUEST['data_compra'], 
			utf8_decode($_REQUEST['situacao']), 
			$_REQUEST['data_baixa'], 
			utf8_decode($_REQUEST['motivo_baixa']), 
			$_REQUEST['baixa'], $_REQUEST['nfe'], 
			utf8_decode($_REQUEST['nome_usuario']),
			$_REQUEST['serie'], 
			utf8_decode($_REQUEST['categoria_depreciacao']),
			utf8_decode($_REQUEST['num_serie']),  
			converte_data($_REQUEST['data_garantia'])
			);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=rel_patrimonio'>
	<script type=\"text/javascript\">	
	</script>";
}

?>