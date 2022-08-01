<?
session_start();
require 'conexao.php';
require 'funcoes_aux.php';
if(!empty($_REQUEST['funcao'])){
	$funcao = $_REQUEST['funcao'];
}
if(empty($_REQUEST['funcao']))
{
	echo
	"
		<script type=\"text/javascript\">
			alert(\" Houve um erro função não identificão. Favor entrar em contato com suporte.\");
			history.back(-1);
		</script>
	";
}


//******************************************************************************************************************
//												FUNÇÕES QUEBRA
//******************************************************************************************************************

if($funcao == "alt")
{
	$id_cab = $_REQUEST['id_quebra_cab'];
	$data = $_REQUEST['data'];
	$tipo = $_REQUEST['tipo'];
	
	alt_quebra_cab
	(
		$tipo,
		$id_cab,
		converte_data($data)
	);
	
	$sql_cont_prod = mysql_query("SELECT * FROM tab_quebra_prod WHERE id_cab = '$id_cab'");
	$cont_prod = mysql_num_rows($sql_cont_prod);
	for($i=0;$i<$cont_prod;$i++)
	{
		alt_quebra_prod
		(
			$_REQUEST['id_produto'.$i],
			$_REQUEST['cod_produto'.$i],
			$id_cab,
			converte_virgula($_REQUEST['quebra'.$i]),
			converte_virgula($_REQUEST['custo'.$i]),
			converte_virgula($_REQUEST['venda'.$i])
		);
	}
	echo
	"
		<script type=\"text/javascript\">	
			alert(\" Quebra/Inventário Alterado com sucesso.\");
			history.back();
		</script>
	";

}

if($funcao == "atualiza_preco")
{

	$sql_cont_prod = mysql_query("SELECT * FROM tab_quebra_prod WHERE id_cab = '$id_cab'");
	$cont_prod = mysql_num_rows($sql_cont_prod);
	for($i=0;$i<$cont_prod;$i++)
	{
		atualiza_preco_quebra
		(
			$_REQUEST['id_quebra_cab'],
			$_REQUEST['id_produto'.$i],
			$_REQUEST['cod_produto'.$i],
			converte_virgula($_REQUEST['custo'.$i]),
			converte_virgula($_REQUEST['venda'.$i])
		);
	}


}


function atualiza_preco_quebra($id_cab,$id_produto,$cod_prod,$custo,$venda)
{
	
	$cod_tabela_mix = busca_cod_tab_mix($id_cab);
	$id_tabela_mix 	= busca_id_tab_mix($cod_tabela_mix);
	
	
	$sql_tab_mix = mysql_query("SELECT * FROM ");
	$linha_prod = mysql_fetch_assoc($sql_tab_mix);
	
	
	$sql_atualiza_prod = ("UPDATE tab_quebra_prod");
	mysql_query($sql_atualiza_prod);
	
}

//Função altera data ou tipo na tabela de cabeçalho de quebra na quebra/inventário
function alt_quebra_cab($tipo,$id_cab,$data)
{
	$sql = ("UPDATE tab_quebra_cab set tipo='$tipo',data_cad='$data' WHERE id='$id_cab'");
	mysql_query($sql);
	
	
	
}

//Função altera Quantidade de quebra, custo ou venda na tabela de prod da quebra/inventário
function alt_quebra_prod($id_produto,$cod_prod,$id_cab,$quebra,$custo,$venda)
{
	$sql = 
	("
		UPDATE 
			tab_quebra_prod 
		SET 
			quebra='$quebra',
			custo='$custo',
			venda='$venda' 
		WHERE 
			id_cab='$id_cab' 
		AND
			cod_prod='$cod_prod'
		AND	
			id='$id_produto'
	");
	mysql_query($sql);
}
/****************************************************************************
Busca número da código da Tabela pelo ID da tabela cabeçalho de quebra.
****************************************************************************/
if (!function_exists('busca_cod_tab_mix')) {
	function busca_cod_tab_mix($id_cab){
		$sql = mysql_query
		("
			SELECT 
				cod_tab_mix 
			FROM 
				tab_quebra_cab 
			WHERE 
				id='$id_cab' 
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$retorno = $linha['cod_tab_mix'];
		}
		return($retorno);
	}
}
/****************************************************************************
	Busca id da tabela de mix de produtos a partir do código da tabela
****************************************************************************/
//Busca ID da tabela MIX, pelo id do cabeçalho.
if (!function_exists('busca_id_tab_mix')) {
	function busca_id_tab_mix($cod_tab){
		$sql = mysql_query
		("
			SELECT 
				id 
			FROM 
				tab_mix_produtos_cab 
			WHERE 
				cod_tab='$cod_tab' 
			LIMIT 1
		");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$retorno = $linha['id'];
		}
		return($retorno);
	}
}

/****************************************************************************
	Atualiza custo e vendas com a tabela.
****************************************************************************/
if($funcao == "atualiza_custo_tab_mix")
{
	$id_mix 		= $_REQUEST['id_mix'];
	$id_quebra_prod = $_REQUEST['id_quebra_prod'];
	
	atualiza_custo_tab_mix($id_mix,$id_quebra_prod);
	echo
	"
		<script type=\"text/javascript\">	
			alert(\" Custo e venda alterado com sucesso.\");
			history.back(-2);
		</script>
	";
}

//Funcao Atualizar custo .
function atualiza_custo_tab_mix($id_mix,$id_quebra_prod){
	$sql = mysql_query
	("
		SELECT 
			cod_produto,
			custo,
			venda 
		FROM 
			tab_mix_produtos_prod 
		WHERE 
			id_cab='$id_mix' 
		LIMIT 1000
	");
	$cont = mysql_num_rows($sql);
	while($linha = mysql_fetch_array($sql)){
		$cod_produto 	= $linha['cod_produto'];
		$custo 			= $linha['custo'];
		$venda 			= $linha['venda'];
		$sql_quebra = mysql_query
		("
			UPDATE tab_quebra_prod 
			SET 
				custo='$custo',
				venda='$venda'
			WHERE 
				id_cab ='$id_quebra_prod'
			AND
				cod_prod = '$cod_produto'
		");
	}
	return($retorno);
}
//************************************ INICIO Exclui Balança *******************************************************
if($funcao == "exclui"){
	$id = $_GET['id'];
	$sql_cab = "delete from tab_quebra_cab WHERE id='$id' ";
	mysql_query($sql_cab);
	$sql_prod = "delete from tab_quebra_prod WHERE id_cab='$id' ";
	mysql_query($sql_prod);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../quebra.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";
}
if($funcao == "exclui_varios"){	
	$excluir = implode( ',', $_REQUEST['excluir'] );
	$sql_cab = "delete from tab_quebra_cab WHERE id IN ($excluir) ";
	$sql_prod = "delete from tab_quebra_prod WHERE id_cab IN ($excluir) ";
	mysql_query($sql_cab);
	mysql_query($sql_prod);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../quebra.php?pg=con'>
	<script type=\"text/javascript\">	
	</script>";
}
/****************************************************************************
	TROCA ITENS DE UM CABEÇALHO PARA OUTRO.
****************************************************************************/
if($funcao == "altera_cabecalho_produtos"){
	$origem = $_REQUEST['o'];
	$destino = $_GET['d'];
	
	if($origem != "" and $destino != ""){		
		$sql_altera = mysql_query("
			UPDATE tab_quebra_prod 
			SET 
				id_cab='$destino'
			WHERE 
				id_cab ='$origem'
		");
		
		
		$sql_apaga = mysql_query("
			DELETE FROM tab_quebra_cab 
			WHERE 
				id ='$origem'
		");
		
	}
	
	echo"
		<script type=\"text/javascript\">	
			alert(\" Produtos alterados com Sucesso.\");
			history.back();
		</script>
	";
}

/****************************************************************************
	FIM ROCA ITENS DE UM CABEÇALHO PARA OUTRO.
****************************************************************************/

?>