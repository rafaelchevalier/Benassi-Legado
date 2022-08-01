<?
require 'conexao.php';
require'funcoes.php';
$pagina_atual = "quebra.php";
$id_mercado = $_SESSION['mercado_id'];

//************************************ INICIO Cadastro*******************************************************

if($funcao == "cad_quebra"){//Cadastra quebra

	cad_quebra_cab (	
				converte_data($_REQUEST['data'])

					);
		echo"
			<META HTTP-EQUIV=REFRESH content='0; URL=../$pagina_atual?pg=con'>
			<script type=\"text/javascript\">	
				alert(\"Tabela cadastrada com sucesso.\");
			</script>
		";
		
}// Fim teste funcao=cad

function cad_quebra_cab($data){// Cadastra cabeçalho tabela
$id_mercado_logado = $_SESSION['mercado_id'];
$cod_tab = $_SESSION['mercado_cod_tab'];
$cod_mercado = $_SESSION['cod_mercado'];

	$sql = "insert into tab_quebra_cab 
			(data_cad,hora_cad,id_mercado_cad,cod_tab_mix,cod_mercado_cad) 
		values 
			('$data',now(),$id_mercado_logado,$cod_tab,$cod_mercado)";
			
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
	
	
	$sql_prod = mysql_query("SELECT * FROM tab_quebra_prod  
							WHERE id_cab ='$id_tab_cab'
							");
	$cont_prod_tab_mix = mysql_num_rows($sql_prod);
	$cont_prod_tab_mix ++;
	
	for($i=0 ; $i<10000 ; $i++){
		if($_REQUEST['quebra'.$i] != ""){
			cad_prod_quebra(	
						
						converte_data($_REQUEST['data']),
						utf8_decode($_REQUEST['cod_produto'.$i]),
						utf8_decode($_REQUEST['nome_produto'.$i]),
						converte_virgula($_REQUEST['custo'.$i]),
						converte_virgula($_REQUEST['venda'.$i]),
						converte_virgula($_REQUEST['quebra'.$i]),
						$ultimo_id
					);
		}
	}

}// Fim função cad
//************************************ INICIO Adiciona produto da tabela*******************************************************
function cad_prod_quebra($data_cad,$cod_produto,$nome_produto,$custo,$venda,$quebra,$id_cab){// Cadastra cabeçalho tabela
	$sql = "insert into tab_quebra_prod 
			(id_cab,cod_prod,descricao_prod,custo,venda,quebra,hora_cad,data_cad) 
		values 
			('$id_cab','$cod_produto','$nome_produto','$custo','$venda','$quebra',now(),'now()')";
			
	mysql_query($sql); 
	$ultimo_id = mysql_insert_id();
	}// Fim função cad

?>