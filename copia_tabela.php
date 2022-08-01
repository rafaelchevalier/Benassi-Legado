<?  require"include/conexao.php";
require"include/funcoes.php";
$pg = $_REQUEST['pg'];
if($pg == "1")
{
/*	Altera os custos de todos dos produtos que o mesmo código de produto em tabelas diferentes. */
//Parametros padrões
$tab_origem = "8590";
$id_tab_origem = "12";
$tab_destino = "100";
$id_tab_destino = "20";
$conta_produtos_alterados ="0";

	$sql_tabela_prod = mysql_query("Select * from tab_mix_produtos_prod where id_cab ='$id_tab_destino'");
	while($linha = mysql_fetch_array($sql_tabela_prod)){
		$cod_produto = $linha['cod_produto'];
		$custo_produto = $linha['custo'];
		$venda_produto = $linha['venda'];
		
		$sql_custo = mysql_query("select custo,venda from tab_mix_produtos_prod where cod_produto = '$cod_produto' and id_cab ='$id_tab_origem' LIMIT 1");
		while($linha_custo = mysql_fetch_array($sql_custo)){
			$custo = $linha_custo['custo'];
			$venda = $linha_custo['venda'];
			
			$sql_altera = ("UPDATE tab_mix_produtos_prod 
			SET 
				custo = $custo,
				venda = $venda,
				data_alt = now(),
				hora_alt = now()
			WHERE cod_produto='$cod_produto' 
			AND id_cab='$id_tab_destino' 
			");
		}
		mysql_query($sql_altera);
		$conta_produtos_alterados ++ ;
	}
	echo"
	<script type=\"text/javascript\">	
		alert(\" Cópia Custo e Venda da Tabela ($id_tab_origem - $tab_origem) -> ($id_tab_destino - $tab_destino). Foram alterado $conta_produtos_alterados itens. \");
		history.back(-1);
	</script>";
	
}	
if($pg == "2")
{
	if(!empty($_REQUEST['o']))
	{
		$id_cab_origem 	= $_REQUEST['o'];
	}
	if(empty($_REQUEST['o']))
	{
		$id_cab_origem 	= "6559";
	}
	if(!empty($_REQUEST['d']))
	{
		$id_cab_destino = $_REQUEST['d'];
	}
	if(empty($_REQUEST['d']))
	{
		$id_cab_destino = "6556";
	}
	$sql_nome_mercado_origem = mysql_query("SELECT id_cab from tab_quebra_prod WHERE id='$id_cab_origem' limit 1");
	$id_nome_mercado_origem = mysql_fetch_assoc($sql_nome_mercado_origem);
	$sql_nome_mercado_origem2 = mysql_query("SELECT id_mercado_cad from tab_quebra_cab WHERE id='$id_nome_mercado_origem' limit 1");
	$nome_mercado_origem = mysql_fetch_assoc($sql_nome_mercado_origem2);
	
	$nome_mercado_origem = busca_nome_mercado($nome_mercado_origem);
	
	
	$conta_produtos_alterados ="0";

	$sql_tabela_prod = mysql_query
	("
		SELECT * 
		FROM tab_quebra_prod 
		WHERE id_cab ='$id_cab_destino'
	");
	while($linha = mysql_fetch_array($sql_tabela_prod)){
		$cod_prod = $linha['cod_prod'];
		$custo_produto = $linha['custo'];
		$venda_produto = $linha['venda'];
		
		$sql_custo = mysql_query
		("
			SELECT custo,venda 
			FROM tab_quebra_prod 
			WHERE cod_prod = '$cod_prod' and id_cab ='$id_cab_origem' 
			LIMIT 1
		");
		while($linha_custo = mysql_fetch_array($sql_custo)){
			$custo = $linha_custo['custo'];
			$venda = $linha_custo['venda'];
			
			$sql_altera = 
			("
				UPDATE tab_quebra_prod 
				SET 
					custo = $custo,
					venda = $venda
				WHERE cod_prod='$cod_prod' 
				AND id_cab='$id_cab_destino' 
			");
		}
		mysql_query($sql_altera);
		$conta_produtos_alterados ++ ;
	}
	echo "Cópia Custo e Venda da Tabela ($id_cab_origem - $tab_origem  - $nome_mercado_origem) -> ($id_cab_destino - $tab_destino). Foram alterado $conta_produtos_alterados itens.";
	/*echo"
	<script type=\"text/javascript\">	
		alert(\" Cópia Custo e Venda da Tabela ($id_cab_origem - $tab_origem  -> ($id_cab_destino - $tab_destino). Foram alterado $conta_produtos_alterados itens. \");
		history.back(-1);
	</script>";
	*/
}


?>