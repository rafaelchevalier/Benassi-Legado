 <?
require 'conexao.php';
require 'funcoes.php';
require 'funcoes_aux.php';
session_start();
$nome_usuario_logado = $_SESSION['id_usuario'];
//************************************ INICIO CADASTRA *******************************************************

if($funcao == "cad"){//Cadastra
cad (
//Cadastro Cabeçalho CVP	
utf8_decode($_REQUEST['produto']),
converte_data2($_REQUEST['embalagem']),
converte_data2($_REQUEST['validade']),
utf8_decode($_REQUEST['cod_rastreio']),
utf8_decode($_REQUEST['responsavel'])
);
	echo"
	<script type=\"text/javascript\">	
		alert(\" Cadastro efetuado com sucesso.\");
		window.history.back();
	</script>";
}
//Cadastra cabeçalho
function cad(
	$produto,
	$embalagem,
	$validade,
	$cod_rastreio,
	$responsavel,
	$data_cad
	){

		$sql = "insert into cvp_cab (
			produto,
			embalagem,
			validade,
			cod_rastreio,
			responsavel,
			usuario_cad,
			data_cad
		) values (

			'$produto',
			'$embalagem',
			'$validade',
			'$cod_rastreio',
			'$responsavel',
			'$nome_usuario_logado',
			now()
		)";
		mysql_query($sql);
	}// Fim função cad
	

/********************************************************************************************************************* 
											 Inicio Cad Avaliações
**********************************************************************************************************************/

if($funcao == "cad_itens"){
	$id = $_GET['id'];
	
	cad_iten(
		$id,
		converte_data2($_REQUEST['data']),
		utf8_decode($_REQUEST['avaliacao'])
	);
	echo"
	<script type=\"text/javascript\">	
		window.history.back();
	</script>";
}
function cad_iten($id,$data,$avaliacao){
	
	$sql = "insert into cvp_avaliacoes (
			id_cvp_cab,
			data,
			avaliacao,
			usuario_cad,
			data_cad
		) values (

			'$id',
			'$data',
			'$avaliacao',
			'$nome_usuario_logado',
			now()
		)";
		
		mysql_query($sql);
}
/********************************************************************************************************************* 
											 Fim Cad avaliações
**********************************************************************************************************************/
//************************************ INICIO Altera aferição *******************************************************	
// inicio Altera Cabeçalho
if($funcao == "alt"){
	$id = $_GET['id'];

alt(
	utf8_decode($_REQUEST['produto']),
	converte_data($_REQUEST['embalagem']),
	converte_data($_REQUEST['validade']),
	utf8_decode($_REQUEST['cod_rastreio']),
	utf8_decode($_REQUEST['responsavel'])
);

	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../cvp.php?pg=consulta'>
	<script type=\"text/javascript\">	
	</script>";

}
function alt(
	$produto,
	$embalagem,
	$validade,
	$cod_rastreio,
	$responsavel
	){
		$id = $_GET['id'];
		$sql = (" UPDATE cvp_cab SET 
			produto='$produto',
			embalagem='$embalagem',
			validade='$validade',
			cod_rastreio='$cod_rastreio',
			responsavel='$responsavel',
			usuario_alt='$nome_usuario_logado'
			where id='$id'
		");
		mysql_query($sql);
		}
// Fim Altera Cabeçalho

//Inicio Altera Itens
if($funcao == "alt_itens"){
	$id = $_GET['id'];

	alt_itens(
	utf8_decode($_REQUEST['produto']),
	converte_data($_REQUEST['embalagem']),
	converte_data($_REQUEST['validade']),
	utf8_decode($_REQUEST['cod_rastreio']),
	utf8_decode($_REQUEST['responsavel'])
	);
	echo"
	<script type=\"text/javascript\">	
		alert(\" Registro Alterados com sucesso.\");
		window.history.back();
	</script>";

}
//Inicio Altera Itens
function alt_itens(
	$data,
	$avaliacao,
	$nome_usuario_logado
	){
		$id = $_GET['id'];
		$sql = (" UPDATE cvp_avaliacoes SET 
			data='$data',
			avaliacao='$avaliacao',
			usuario_alt='$nome_usuario_logado',
			where id='$id'
		");
	mysql_query($sql);
}

if($funcao == "alt_aberto"){
	$id = $_GET['id'];
	SWITCH($_GET['s']){
		case 1:
			$aberto = 0;
		break;
		case 0:
			$aberto = 1;
		break;
		default;
			$aberto = 0;	
	}
	
	$sql = (" UPDATE cvp_cab SET 
			aberto='$aberto'
			where id='$id'
			LIMIT 1
		");
	mysql_query($sql);
	
	echo"
	<script type=\"text/javascript\">	
		alert(\" Registro Alterados com sucesso.\");
		window.history.back();
	</script>";
	

}
		

//************************************ INICIO Exclui Balança *******************************************************

// Inicio exclui cabeçalho e itens
if($funcao == "exclui"){
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql_cab 		= ("DELETE FROM cvp_cab WHERE id IN ($excluir)");
	$sql_avaliacoes = ("DELETE FROM cvp_avaliacoes WHERE id_cvp_cab IN ($excluir) ");
	mysql_query($sql_cab);
	mysql_query($sql_avaliacoes);
	echo"
	<script type=\"text/javascript\">	
		alert(\" Registros Excluidos com sucesso.\");
		window.history.go(-2);
	</script>";
}
// Fim exclui cabeçalho e itens

// Inicio exclui itens
if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from cvp_cab WHERE id IN ($excluir) ";
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../cvp.php?pg=con'>
	<script type=\"text/javascript\">	
		alert(\" Registros Excluidos com sucesso.\");
	</script>";
}
if($funcao == "exclui_avaliacao"){	
	$excluir = $_GET['id'];
	$sql = "delete from cvp_avaliacoes WHERE id IN ($excluir) ";
	mysql_query($sql);
	echo"
	<script type=\"text/javascript\">	
		window.history.back();
	</script>";
}
if($funcao == "fechaAvaliacao"){	
	$excluir = $_GET['id'];
	$sql = (" UPDATE cvp_cab SET 
			aberto='0'
			where id='$id'
		");
	mysql_query($sql);
	echo"
	<script type=\"text/javascript\">	
		window.history.back();
	</script>";
}
if($funcao == "AbreAvaliacao"){	
	$excluir = $_GET['id'];
	$sql = (" UPDATE cvp_cab SET 
			aberto='1'
			where id='$id'
		");
	mysql_query($sql);
	echo"
	<script type=\"text/javascript\">	
		window.history.back();
	</script>";
}
// Fim exclui itens

?>