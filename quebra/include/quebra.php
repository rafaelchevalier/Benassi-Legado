<?
require 'conexao.php';
require 'funcoes.php';
$pagina_atual 	= "quebra.php";
$id_mercado 	= $_SESSION['mercado_id'];
$funcao 		= $_REQUEST['funcao'];

//************************************ INICIO Cadastro*******************************************************

if($funcao == "cad_quebra"){//Cadastra quebra

		
	$data 				= converte_data($_REQUEST['data']);
	$id_mercado_logado 	= $_SESSION['mercado_id'];
	$cod_tab 			= $_SESSION['mercado_cod_tab'];
	$cod_mercado 		= $_SESSION['cod_mercado'];
	$tipo 				= $_REQUEST['tipo'];
	$obs 				= $_REQUEST['obs'];

	$sql = "insert into tab_quebra_cab 
			(data_cad,hora_cad,id_mercado_cad,cod_tab_mix,cod_mercado_cad,tipo,obs) 
		values 
			('$data',now(),'$id_mercado_logado','$cod_tab','$cod_mercado','$tipo','$obs')";
			
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
	
	/*
	$sql_prod = mysql_query("SELECT * FROM tab_quebra_prod  
							WHERE id_cab ='$id_tab_cab'
							");
	$cont_prod_tab_mix = mysql_num_rows($sql_prod);
	$cont_prod_tab_mix ++;
	*/
	$limite = 99999;
	for($i=0 ; $i< $limite ; $i++)
	{
		if($_POST['quebra'.$i] != "")
		{
			
			cad_prod_quebra(			
				utf8_decode($_POST['cod_produto'.$i]),
				utf8_decode($_POST['nome_produto'.$i]),
				converte_virgula($_POST['custo'.$i]),
				converte_virgula($_POST['venda'.$i]),
				converte_virgula($_POST['quebra'.$i]),
				$ultimo_id,
				$cod_tab,
				$cod_mercado
			);
		}
	}
		
	echo"
		<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=tipo'>
		<script type=\"text/javascript\">	
			alert(\"Tabela cadastrada com sucesso.\");
		</script>
	";

}// Fim if cad_quebra
//************************************ INICIO Adiciona produto da tabela*******************************************************
function cad_prod_quebra($cod_produto,$nome_produto,$custo,$venda,$quebra,$id_cab,$cod_tab,$cod_mercado){// Cadastra cabeçalho tabela
	$sql_prod = "insert into tab_quebra_prod 
			(id_cab,cod_prod,descricao_prod,custo,venda,quebra,cod_tab,cod_mercado,hora_cad,data_cad) 
		values 
			('$id_cab','$cod_produto','$nome_produto','$custo','$venda','$quebra','$cod_tab','$cod_mercado',now(),now())";
			
	mysql_query($sql_prod); 
	$ultimo_id_prod = mysql_insert_id();
}// Fim função cad_prod_quebra


/*
if($funcao == "teste"){//Teste
		
	echo "Id Mercado: ".$_SESSION['mercado_id']." | Cód Mercado: ".$_SESSION['cod_mercado']."<br />";
	echo "Tipo: ".$_SESSION['tipo']."<br />";
	echo "OBS: ".$_SESSION['tipo']."<br />";
	echo "<br /><br />";
	
	$limite = 1000;
	for($i=0 ; $i< $limite ; $i++)
	{
		if($_POST['quebra'.$i] != "")
		{
			//sleep(0.5); // Da um intervalo entre os envios
				echo $i."   -   ";		
				echo "Código Produto: ".utf8_decode($_POST['cod_produto'.$i])."	-	";
				echo "Nome Produto: ".utf8_decode($_POST['nome_produto'.$i])."	-	";
				echo "Custo: (".converte_virgula($_POST['custo'.$i]).")	-	";
				echo "Venda: (".converte_virgula($_POST['venda'.$i]).")	-	";
				echo "Quebra: (".converte_virgula($_POST['quebra'.$i]).")";
				echo "<br />";
				//$ultimo_id,
				//$cod_tab,
				//$cod_mercado
		}
	}
}
*/

?>