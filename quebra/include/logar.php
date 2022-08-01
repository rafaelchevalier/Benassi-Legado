<?php
session_start();
$login = $_POST['login'];
$senha = $_POST['senha'];
$nivel = $_POST['nivel'];
$senha_cript = md5($_POST['senha']);//Senha criptografada
require "conexao.php";
$hora_atual = date("H:i:s");
$sql = mysql_query("SELECT * FROM mercado WHERE cnpj = '$login'");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$senha_db = $linha['senha'];
	$nome_bd = $linha['cnpj'];
	$id = $linha['id'];
	$email = $linha['email'];
	$mix_cod_tab = $linha['mix_cod_tab'];
	$cod_mercado = $linha['cod'];
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
	$_SESSION['mercado_senha'] = $senha_cript;
	$_SESSION['mercado_cnpj'] =	 $nome_bd; 
	$_SESSION['mercado_id'] = $id;
	$_SESSION['mercado_email'] = $email;
	$_SESSION['mercado_cod_tab'] = $mix_cod_tab;
	$_SESSION['cod_mercado'] = $cod_mercado;
	
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0; URL=../quebra.php?pg=tipo'>
	<script type=\"text/javascript\">	
	alert(\" Sistema Normalizado. Favor colocar em dia suas quebras arquivadas.\");
	</script>";
	
 }
	}
	mysql_close($db);
?>