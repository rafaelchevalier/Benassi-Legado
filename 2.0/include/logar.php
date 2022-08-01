<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$senha_cript = md5($_POST['senha']);//Senha criptografada
require "conexao.php";
$hora_atual = date("H:i:s");
$sql = mysql_query("SELECT * FROM login WHERE login = '$login'");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$senha_db = $linha['senha'];
	$nome_bd = $linha['nome'];
	$nivel_usuario = $linha['nivel_usuario'];
	$id = $linha['id'];
	$id_perfil_acesso = $linha['id_perfil_acesso'];
	$email = $linha['email'];
}
//Começa os testes de validação do usuário e senha
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
	$_SESSION['login_usuario'] = $login;
	$_SESSION['senha_usuario'] = $senha_cript;
	$_SESSION['nivel_usuario'] = $nivel;
	$_SESSION['nome_usuario'] =	 $nome_bd; 
	$_SESSION['id_usuario'] = $id;
	$_SESSION['id_perfil_acesso'] = $id_perfil_acesso;
	$_SESSION['email_usuario'] = $email;
	if($email != ""){//Direciona para a página principal caso o email da pessoa esteja cadastrado
	echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../index.php'>
	<script type=\"text/javascript\">	
	</script>";
	}
	if($email == ""){//Caso não tenha e-mail cadastrado exibe a msg e direciona para atualização do mesmo.
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../usuarios.php?pg=alterauser&id=$id'>
	<script type=\"text/javascript\">	
	alert(\" Favor atualizar seu email cadastrado no sistema. Isso é muito importanto para o acompanhamento de seus chamados.\");
	</script>";
	}
	//Fim teste email não existe =======================================================
 }
	}
	mysql_close($db);
?>