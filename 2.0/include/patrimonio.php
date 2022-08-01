<?
include 'conexao.php';
include 'funcoes.php';

//************************************ INICIO FORMULARIOS PATRIMONIAIS *******************************************************
//********************* FORMULÁRIO DE AQUISIÇÃO PATIMONIAL ***********************
if($funcao == "aquisicao_patrimonio"){//AQUISIÇÃO PATRIMONIAL
	if($_REQUEST['num_nfe'] == "" || $_REQUEST['sala'] == "" ){//Testa se passar por todos os campos estiverem prenchidos libera
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=form_aquisicao'>
	<script type=\"text/javascript\">	
	alert(\" Preencha todos os dados os campos obrigatórios.\");
	</script>";
	stop();
		}
	else{
aquisicao_patrimonio (utf8_decode($_REQUEST['num_nfe']), 
			utf8_decode($_REQUEST['local']), 
			$_REQUEST['sala'],
			converte_data($_REQUEST['data_aquisicao']), 
			utf8_decode($_REQUEST['obs']), 
			utf8_decode($_REQUEST['usuario_logado'])
			);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=form_aquisicao'>
	<script type=\"text/javascript\">	
	alert(\" Aquisição Patrimonial cadastrado com sucesso.\");
	</script>";
}}

function aquisicao_patrimonio($num_nfe,$local,$sala,$data_aquisicao,$obs,$usuario_logado){
	$sql = "insert into mov_patrimonio 
	(num_nfe,local,sala,data_mov,obs,usuario_cad,usuario_mov,ativo,tipo_mov,data_cad,hora_cad) values 
	('$num_nfe','$local','$sala','$data_aquisicao','$obs','$usuario_logado','$usuario_logado',1,'AQUISICAO',now(),now())";
	mysql_query($sql);
	}
//********************* FIM FORMULÁRIO DE AQUISIÇÃO PATIMONIAL ***********************
//********************* FORMULÁRIO DE MANUTENÇÃO *********************************
if($funcao == "form_manutencao"){//AQUISIÇÃO PATRIMONIAL
			for($i=0;$i<10;$i++){
				if($_REQUEST['num_patrimonio'.$i] != ""){
form_manutencao (
			utf8_decode($_REQUEST['num_patrimonio'.$i]), 
			utf8_decode($_REQUEST['local'.$i]), 
			$_REQUEST['sala'.$i],
			utf8_decode($_REQUEST['prestador_servico'.$i]), 
			converte_data($_REQUEST['data_prevista'.$i]),
			converte_data($_REQUEST['data_mov'.$i]),
			utf8_decode($_REQUEST['obs'.$i]), 
			utf8_decode($_REQUEST['usuario_logado'])
			);
		}}
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=form_manutencao'>
	<script type=\"text/javascript\">	
	alert(\" Manutenação Patrimonial cadastrado com sucesso.\");
	</script>";
}




function form_manutencao($num_patrimonio,$local,$sala,$prestador_servico,$data_prevista,$data_mov,$obs,$usuario_logado){
	$sql = "insert into mov_patrimonio 
	(num_patrimonio,local,sala,prestador_servico,data_previsao,data_mov,obs,usuario_cad,usuario_mov,ativo,tipo_mov,data_cad,hora_cad) values 
	('$num_patrimonio','$local','$sala','$prestador_servico','$data_prevista','$data_mov','$obs','$usuario_logado','$usuario_logado',1,'MANUTENCAO',now(),now())";
	mysql_query($sql);
	}

//********************* FIM FORMULÁRIO DE MANUTENÇÃO *********************************
//********************* FORMULÁRIO DE DESCARTE *********************************
if($funcao == "form_descarte"){//DESCARTE PATRIMONIAL
			for($i=0;$i<10;$i++){
				if($_REQUEST['num_patrimonio'.$i] != ""){
form_descarte (
			utf8_decode($_REQUEST['num_patrimonio'.$i]), 
			converte_data($_REQUEST['data_mov'.$i]),
			utf8_decode($_REQUEST['obs'.$i]), 
			utf8_decode($_REQUEST['usuario_logado'])
			);
		}}
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=form_descarte'>
	<script type=\"text/javascript\">	
	alert(\" Descarte Patrimonial cadastrado com Sucesso.\");
	</script>";
}

function form_descarte($num_patrimonio,$data_mov,$obs,$usuario_logado){
	$sql = "insert into mov_patrimonio 
	(num_patrimonio,data_mov,obs,usuario_cad,usuario_mov,ativo,tipo_mov,data_cad,hora_cad) values 
	('$num_patrimonio','$data_mov','$obs','$usuario_logado','$usuario_logado',1,'DESCARTE',now(),now())";
	mysql_query($sql);
	}

//********************* FIM FORMULÁRIO DE DESCARTE *********************************

if($funcao == "conclui"){	
$nome_usuario_logado = $_SESSION['nome_usuario'];
	$conclui = implode( ',', $_REQUEST['conclui'] );
	$sql = "UPDATE mov_patrimonio SET ativo = '0', usuario_fecha='$nome_usuario_logado' WHERE id IN ($conclui) ";

	mysql_query($sql);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../patrimonio.php?pg=consulta_form'>
	<script type=\"text/javascript\">	
	</script>";
}


//************************************ FIM FORMULARIOS PATRIMONIAIS *******************************************************




?>