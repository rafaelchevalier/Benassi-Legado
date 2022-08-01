<?
require 'conexao.php';
require'funcoes.php';
$pagina_atual = "mix_prod.php"

//************************************ INICIO Cadastro PESQ*******************************************************

if($funcao == "cad_tab"){//Adiciona Cabeçalho Registro de documentop RH
cad (	converte_data($_REQUEST['data']),
		utf8_decode($_REQUEST['cod_tab']),
		utf8_decode($_REQUEST['descricao']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=consulta'>
	<script type=\"text/javascript\">	
		alert(\"Cadastro efetuado com sucesso.\");
	</script>";
}// Fim teste funcao=cad

function cad($data,$cod_tab,$descricao_tab){// Cadastra cabeçalho tabela
	$destinatario = busca_nome_usuario($id_destinatario);
	$sql = "insert into tab_mix_produtos_cab 
			(data_ca,cod_tab,descricao_tab) 
		values 
			('$data','$cod_tab','$descricao_tab')";
			
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
	}
}// Fim função cad


/****************************************************************************************************************
										Exclusão
****************************************************************************************************************/
if($funcao == "exclui_tab"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "delete from tab_mix_produtos_cab 
			WHERE id IN ($excluir) ";
	
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=consulta_tab'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "confirma_doc"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql = "UPDATE tab_mix_produtos_cab 
			SET situacao='1' 
			WHERE id IN ($excluir) ";
	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=consulta_tab'>
	<script type=\"text/javascript\">	
	</script>";
}


?>