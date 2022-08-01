<?
include 'conexao.php';
//************************************ INICIO FUNÇÕES CHAMADO *******************************************************

if($funcao == "abre_chamado"){//Adiciona novo chamado
	if($_REQUEST['descricao'] == ""){
	
	echo "<script type=\"text/javascript\">	
		alert(\" Chamado não pode ser aberto. O campo descrição deve ser preenchido\")
		language='javascript'>history.back()
	 </script>";

	} 
		if($_REQUEST['descricao'] != ""){
abre_chamado (utf8_decode($_REQUEST['nome']),utf8_decode($_REQUEST['descricao']),utf8_decode($_REQUEST['categoria']),$_REQUEST['local']);
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../chamado.php?pg=abre_chamado'>
	<script type=\"text/javascript\">	
	alert(\" Chamado aberto com sucesso.\");
	</script>";
}// Fim adiciona novo chamado
		}
function abre_chamado($id_usuario, $descricao, $categoria,$local){// Abre chamado
$sql_filtro = mysql_query("SELECT * FROM login WHERE id='$id_usuario'  ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	$email = $linha_filtro['email'];
	$nome = $linha_filtro['nome'];
	}
	$sql = "insert into chamado (nome_usuario,descricao,data_cad,hora_cad,situacao,categoria,email,local_atendimento) values ('$nome','$descricao',now(),now(),'ABERTO','$categoria','$email','$local')";
	$tipo_email = "abre_chamado";
	require"email/email_chamado.php";
	require"email/email_chamado_abre_usuario.php";
	mysql_query($sql);
	}// Fim abre chamado

//********************************** Inicio Chamado **********************************************
if($funcao == "fecha_chamado"){//Adiciona um novo usuário
$id = $_GET['id'];
fecha_chamado(utf8_decode($_REQUEST['nome_tecnico']),utf8_decode($_REQUEST['detalhe']),$_REQUEST['solucao'],utf8_decode($_REQUEST['detalhe_erro']));
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../chamado.php?pg=chamado_aberto_completo'>
	<script type=\"text/javascript\">	
	alert(\" Chamado fechado com sucesso.\");
	</script>";
}

	
function fecha_chamado($nome_tecnico,$detalhe,$solucao,$detalhe_erro){
		$id = $_GET['id'];
		switch($solucao){
		case "ABERTO":
			$situacao = "ABERTO";
			$solucao = "";
		break;
		default:
			$situacao = "FECHADO";
		break;
		}
	$sql = (" UPDATE chamado SET situacao='$situacao',detalhe='$detalhe',atendido_por='$nome_tecnico',solucao='$solucao', hora_atendimento=now(), data_atendimento=now() where id='$id'");
	$tipo_email = "altera_status";
	//require"email/email_chamado_finaliza.php";
	require"email/email_chamado_abre_usuario.php";
	mysql_query($sql);
	}
//********************************** Fim Chamado **********************************************

//************************************ FIM FUNÇÕES CHAMADO *******************************************************
?>