<?
session_start();
require 'conexao.php';
require'funcoes.php';
$pagina_atual = "mix_prod.php";

//************************************ INICIO Cadastro*******************************************************

if($funcao == "cad_tab"){//Adiciona Cabeçalho Registro de documentop RH
$consulta_cod_tab = consulta_cod_tab_existente($_REQUEST['cod_tab']);
	if($consulta_cod_tab == 1){
	cad_tab (	
				converte_data($_REQUEST['data']),
				utf8_decode($_REQUEST['cod_tab']),
				utf8_decode($_REQUEST['descricao'])
			);
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=consulta'>
			<script type=\"text/javascript\">	
				alert(\"Cadastro efetuado com sucesso.\");
			</script>
		";
	}
	if($consulta_cod_tab == 0){
		echo "
			<script type=\"text/javascript\">	
				alert(\" Cadastro não efetuado, código da tabela ja existe!\")
				language='javascript'>history.back()
			</script>
			";
	}
}// Fim teste funcao=cad

function cad_tab($data,$cod_tab,$descricao_tab){// Cadastra cabeçalho tabela
	$nome_usuario = $_SESSION['nome_usuario'];
	$sql = "insert into tab_mix_produtos_cab 
			(data_cad,cod_tab,descricao_tab,usuario_cad,hora_cad) 
		values 
			('$data','$cod_tab','$descricao_tab','$nome_usuario',now())";
			
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
	}// Fim função cad

	
//************************************ INICIO Adiciona produto da tabela*******************************************************

if($funcao == "cad_prod"){//Cadastra produtos novos na tabela.
for($i=0;$i<50;$i++){
	if($_REQUEST['cod_produto'.$i] != "" and $_REQUEST['nome_produto'.$i] != ""){
		cad_prod(	
					utf8_decode($_REQUEST['id_cab']),
					utf8_decode($_REQUEST['cod_produto'.$i]),
					utf8_decode($_REQUEST['nome_produto'.$i]),
					converte_virgula($_REQUEST['custo'.$i]),
					converte_virgula($_REQUEST['venda'.$i])
				);
	}
}
	echo"
		<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=consulta'>
		<script type=\"text/javascript\">	
			alert(\" Produtos cadastrados com sucesso.\");
		</script>
	";
}// Fim teste funcao=cad

function cad_prod($id_cab,$cod_produto,$nome_produto,$custo,$venda){// Cadastra cabeçalho tabela
	$nome_usuario = $_SESSION['nome_usuario'];
	$sql = "insert into tab_mix_produtos_prod 
			(id_cab,cod_produto,nome_produto,usuario_cad,custo,venda,hora_cad,data_cad) 
		values 
			('$id_cab','$cod_produto','$nome_produto','$nome_usuario','$custo','$venda',now(),now())";
			
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
	}// Fim função cad
	
/****************************************************************************************************************
										Altera tabela e produto
****************************************************************************************************************/
if($funcao == "alt_tab"){
	alt_tab_mix(	
			utf8_decode($_REQUEST['cod_tab']),
			utf8_decode($_REQUEST['descricao'])
			);
			$qt_prod = utf8_decode($_REQUEST['conta_prod']);
			$qt_prod ++;
	for($i=0;$i<$qt_prod;$i++){
		alt_prod_mix(	
						utf8_decode($_REQUEST['cod_tab']),
						utf8_decode($_REQUEST['cod_produto'.$i]),
						utf8_decode($_REQUEST['nome_produto'.$i]),
						converte_virgula($_REQUEST['custo'.$i]),
						converte_virgula($_REQUEST['venda'.$i]),
						$_REQUEST['id_produto'.$i]
					);
	
	}

	echo"
		<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=consulta_tab'>
		<script type=\"text/javascript\">	
			alert(\" Tabela alterada com sucesso.\");
		</script>
	";
}
function alt_tab_mix($cod_tab,$descricao_tab){
$id_tab = consulta_id_tab_existente($cod_tab);// Puxa Id do cabeçalho da tabela para alterar a descricao
	$sql =" update tab_mix_produtos_cab set descricao_tab='$descricao_tab' where id='$id_tab'";
	
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
}
function alt_prod_mix($cod_tab,$cod_produto,$nome_produto,$custo,$venda,$id_produto){
$nome_usuario_logado = $_SESSION['nome_usuario'];
$id_tab = consulta_id_tab_existente($cod_tab);// Puxa Id do cabeçalho da tabela para alterar a descricao
	$sql="	update tab_mix_produtos_prod 
			set 
				cod_produto='$cod_produto',
				nome_produto='$nome_produto',
				custo='$custo',
				venda='$venda',
				data_alt=now(),
				hora_alt=now(),
				usuario_alt='$nome_usuario_logado'
			where id = '$id_produto' AND id_cab ='$id_tab'
		";
		mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
}
	
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
if($funcao == "confirma_doc1221"){	
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