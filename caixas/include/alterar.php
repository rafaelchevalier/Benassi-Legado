<?
include'conexao.php';
include'funcoes.php';
session_start();

if($funcao == "alteraadm"){
$id = $_GET['id'];
alteraadm($_REQUEST['nome'], $_REQUEST['login'],$_REQUEST['senha'],$_REQUEST['email'],$_REQUEST['nivel_usuario'],$_REQUEST['hora_inicio'],$_REQUEST['hora_fim'],$_REQUEST['contato']);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../usuario.php?pg=relusuario'>
	<script type=\"text/javascript\">	
	</script>";

}

if ($funcao == "alteracaixa"){
$id = $_GET['id'];
alteracaixa ($_REQUEST['cod'], $_REQUEST['tamanho'], $_REQUEST['cor'],$_REQUEST['descricao']);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../caixas.php?pg=relcaixas'>
	<script type=\"text/javascript\">	
	</script>";
}
if ($funcao == "alteramercado"){
$id = $_GET['id'];
alteramercado ($_REQUEST['cod'], $_REQUEST['filial'], $_REQUEST['razao_social'], $_REQUEST['nome_fantasia'], $_REQUEST['cnpj'], $_REQUEST['rua'], $_REQUEST['bairro'], $_REQUEST['cidade'], $_REQUEST['cep'], $_REQUEST['estoque'], $_REQUEST['cod_funcionario'], $_REQUEST['email']);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../mercado.php?pg=relmercado'>
	<script type=\"text/javascript\">	
	</script>";
}//Fecha if alteramercado
if ($funcao == "altera_contagem"){
$id = $_GET['id'];
altera_contagem ($_REQUEST['quantidade'], $_REQUEST['usuario_alt'], $_REQUEST['data_alt'], $_REQUEST['baixa'], $_REQUEST['placa'], $_REQUEST['nota_devolucao'], $_REQUEST['serie_nfe']);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=relcont'>
	<script type=\"text/javascript\">	
	</script>";
}//Fecha if altera_contagem

if($funcao == "adiciona_erro_contagem"){
$id = $_GET['id'];
adiciona_erro_contagem($_REQUEST['acerto_erro_contagem'],$_REQUEST['conferente'],$_REQUEST['descricao_erro_contagem'],$_REQUEST['qtd_contagem']);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../contagem.php?pg=relcont'>
	<script type=\"text/javascript\">	
	</script>";
}//Fecha if adiciona_erro_contagem

?>