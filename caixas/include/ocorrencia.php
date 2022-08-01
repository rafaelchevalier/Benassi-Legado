<? 
session_start();
require 'conexao.php';
require 'funcoes.php';


switch($_GET['funcao']){
	
case "cad_ocorrencia"://cadastro nova ocorrência
		if($_REQUEST['descricao'] == "" and $_REQUEST['mercado'] == ""){		
echo "<script type=\"text/javascript\">	
		alert(\" Os campos obrigatórios devem ser prenchidos!\")
		language='javascript'>history.back()
	 </script>";
		}
		if($_REQUEST['descricao'] != "" and $_REQUEST['mercado'] != ""){
		cad_ocorrencia(
			utf8_decode($_REQUEST['descricao']),
			utf8_decode($_REQUEST['mercado']),
			converte_data($_REQUEST['data_ocorrecia'])
		);
echo "<script type=\"text/javascript\">	
		alert(\" Ocorrência aberta com sucesso!\")
		language='javascript'>history.back()
	 </script>";
		}
 break;
 
case "excluir":
	if( $_REQUEST['excluir'] != ""){
		$excluir = implode( ',', $_REQUEST['excluir'] );
		$sql = "delete from ocorrencia_caixas WHERE id IN ($excluir) ";
	
		mysql_query($sql);
		echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../ocorrencia.php?pg=1'>
	<script type=\"text/javascript\">	
	alert(\"Exclusão realizada com sucesso\");
	</script>";
	}
	if( $_REQUEST['excluir'] == ""){
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../ocorrencia.php?pg=2'>
	<script type=\"text/javascript\">	
	alert(\" Você precisa selecionar no mínimo uma ocorrência!\");
	</script>";

	}

break;
default:
	echo "<script type=\"text/javascript\">	
		alert(\" Acesso não permitido!\")
		language='javascript'>history.back()
	 </script>";


break;
}

//Funções especificas da ocorrências de caixas plasticas 

//Cadastro de nova ocorrencia caixa plastica
function cad_ocorrencia($descricao,$mercado,$data_ocorrencia){
	$usuario = $_SERVER['nome_completo_caixa'];
	$sql = "insert into ocorrencia_caixas (descricao,id_mercado,data_ocorrencia,data_cad,hora_cad) values ('$descricao','$mercado','$data_ocorrencia',now(),now())";
	mysql_query($sql);
	}
?>