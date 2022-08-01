<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$senha_cript = md5($_POST['senha']);
include"conexao.php";
$hora_atual = date("H:i:s");
$sql = mysql_query("SELECT * FROM login WHERE login = '$login'");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id_funcionario = $linha['id'];
	$senha_db = $linha['senha'];
	$nome_bd = $linha['nome'];
	$nivel_usuario = $linha['nivel_usuario'];
	$hora_inicio = $linha['hora_inicio'];
	$hora_fim = $linha['hora_fim'];	
	$ativo = $linha['ativo'];
	$msg_destivado = $linha['msg_desativado'];
}

if($hora_inicio < $hora_atual and $hora_fim > $hora_atual or $nivel_usuario == 0){// teste de horário
	



if($cont == 0){//confere o usuario
	

	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	alert(\" Nome do usuário não existe.\");
	</script>";
	exit;
}else{ 
	if($senha_db != $senha_cript){//confere a senha 
	
		echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	alert(\" Senha incorreta.\");
	</script>";
	exit;
	}
	else {
		if( $ativo != 1){
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	alert(\" Seu usuário está desativado. Motivo: $msg_destivado\");
	</script>";
	exit;
		}
		
	$_SESSION['id_usuario_caixa'] = $id_funcionario;
	$_SESSION['login_usuario_caixa'] = $login;
	$_SESSION['senha_usuario_caixa'] = $senha;
	$_SESSION['nivel_usuario_caixa'] = $nivel_usuario;
	$_SESSION['nome_completo_caixa'] = $nome_bd;
	
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	</script>";
 }
	}
	}// Fecha if bloqueio de horário
	else{
		echo"<META HTTP-EQUIV=REFRESH content='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	alert(\" Você não tem permissão para logar este horário Volte a tentar entre.  $hora_inicio  e  $hora_fim\");
	</script>";
		exit;
		}
	mysql_close($db);
?>