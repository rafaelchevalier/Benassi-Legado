<?
require 'conexao.php';
require 'funcoes_aux.php';
if(!empty($_REQUEST['funcao'])){
	$funcao = $_REQUEST['funcao'];
}
//************************************ INICIO FUNÇÕES MÓDULO TEMPERATURA DAS CAMARAS *******************************************************

//****************************************************************************************************************************************** 
//												CADASTRO NOVA MEDIÇÃO CAMARAS FRIGORIFICAS
//MÓDULO DE CADASTRO DA TEMPERTURA E UMIDADE DAS CÂMARS FRIGORÍFICAS DA BENASSI
//******************************************************************************************************************************************
if($funcao == "cad_tempcam" ){//Cadastra novo Medição de temperatura

	if($_REQUEST['temperatura'] == "" || $_REQUEST['umidade'] == "" ){//Teste para campo em branco
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../tempcam.php?pg=cad_tempcam'>
	<script type=\"text/javascript\">	
	alert(\" Cadastro NÃO EFETUADO. Os campos Temperatura e Umidade devem ser prenchidos para completar o cadastro .\");
	</script>";
		}
	//Caso a temperatura e a umidade estejam fora da padrão manda um email de alerto para as pessoas cadastradas
		else{	
			$id_camara = $_REQUEST['camara'];
			$sql_camara = mysql_query("SELECT * FROM cadcamaras WHERE id='$id_camara' limit 1");
			while($linha_camara = mysql_fetch_array($sql_camara)){ 
				$temp_min = $linha_camara['temp_min'];
				$temp_max = $linha_camara['temp_max'];
				$umidade_min = $linha_camara['umidade_min'];
				$umidade_max = $linha_camara['umidade_max'];
				$nome_camara = $linha_camara['nome'];
			}
		cad_tempcam (utf8_decode($_REQUEST['nome']),$nome_camara,$_REQUEST['temperatura'],$_REQUEST['umidade'],$_REQUEST['obs'],utf8_decode($_REQUEST['periodo']),converte_data($_REQUEST['data']));
		//Puxa do banco de dados os limtes de umidade e temperatura
		if(	$_REQUEST['temperatura'] < $temp_min 
			or $_REQUEST['temperatura'] > $temp_max 
			or $_REQUEST['umidade'] < $umidade_min
			or $_REQUEST['umidade'] > $umidade_max
		){
			require "email/email_qualidade.php";//Envia e-mail
		}
		echo"
		<META HTTP-EQUIV=REFRESH content='0; URL=../tempcam.php?pg=cad_tempcam'>
		<script type=\"text/javascript\">	
			alert(\" Medição Gravada com Sucesso .\");
		</script>";
	
}}// Fim Cadastra novo Medição de temperatura

function cad_tempcam($nome, $camara, $temperatura, $umidade, $obs, $periodo,$data){// Função Cadastra Medição de temperatura
	$sql = "insert into tempcam (nome_usuario,camara,temperatura,umidade,obs,periodo,data_medicao,hora_medicao) values ('$nome','$camara','$temperatura','$umidade','$obs','$periodo','$data',now())";
	mysql_query($sql);
	}// Fim Função Cadastra Medição de temperaturas
	
//****************************************************************************************************************************************** 
//												FIM CADASTRO NOVA MEDIÇÃO CAMARAS FRIGORIFICAS
//******************************************************************************************************************************************

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

?>