<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Ti Benassi Rio de Janeiro</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
</head>

<body>
<?
require "include/config_filtros.php";
if($hora_atual < "12:00:00"){ $saudacao = "Bom dia"; }
if($hora_atual > "11:59:59" and $hora_atual < "18:00:00"){ $saudacao = "Boa tarde"; }
if($hora_atual > "17:59:59"){ $saudacao = "Boa noite"; }
?>
	<div id="wrapper">
    		<!-- *********************** Sistema de login ************************* --> 
<div id="Principal_login">
	 <?
	 session_start();
	include"include/conexao.php";
	if(isset($_SESSION['login_usuario']) AND isset($_SESSION['senha_usuario'])){
		$login_usuario = $_SESSION['login_usuario']; ?>

	<div id="divlogin">
	

	<?
		$sql = mysql_query("SELECT * FROM login WHERE login = '$login_usuario'");
	$cont = mysql_num_rows($sql);
	while($linha = mysql_fetch_array($sql)){
		$nome = $linha['nome'];
	}

	if($cont == 0){//confere o usuario

	} 
		if($senha_db != $senha_usuario){//confere a senha 
		$teste_logado="1";
		} ?>
        
     
	<table id="tblogin" > 
    <tr>
    	<td>Bem Vindo(a): <? echo $nome; ?></td>
    </tr>
	<!-- <tr><td class="alinha_direita"> <a href="include/logout.php">Sair</a> </td></tr> -->
    <tr>
    	<td class="alinha_direita"> <a href="include/logout.php" >Sair</a> </td>
    </tr>
    <tr>
    <? if ($_SESSION['nivel_usuario'] == 0){?>
      <td colspan="2"><a href="usuarios.php?pg=caduser">Cadastro</a>&nbsp;</td>
   	</tr>
    <? }?>
	</table> 
    </div><!-- Fecha div login-->
	<?	
}else { $teste_logado="0";

 ?>
<form id="frmlogin" name="frmlogin" method="post" action="include/logar.php">


  <table width="" border="0" id="tblogin">
    <tr>
      <td>Login</td>
      <td><label for="login"></label>
        <input type="text" name="login" id="login2" /></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><label for="senha"></label>
      <input type="password" name="senha" id="senha" /></td>
    </tr>
    <tr>
    	<td><input type="submit" name="btlogar" id="btlogar" value="Logar" /></td>
    </tr>
  </table>
<? } ?></form>

	</div><!-- Fecha div login-->
</div><!-- Fecha div Principal_login-->
<!-- *********************** Fim Sistema de login ************************* --> 
		<img src="images/logo benassi.png" width="450px" alt="Logo Benassi" class="logo_benassi" />
		<div id="header">
		<div id="nav">
			<?
			require "menu.php";
			?>
			</div>