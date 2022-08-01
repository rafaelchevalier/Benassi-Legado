<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<link rel="shortcut icon" href="images/icone.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Ti Benassi Rio de Janeiro</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href='css/CSS3 Menu.css3prj_files/css3menu1/style.css'" type="text/css" /><style type="text/css">._css3m{display:none}</style>

	
    <!-- Necessário para os campos de formatação-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
	
	<script>
	jQuery(function($){
	       $("#campoData").mask("99/99/9999");
		   $("#campoHora").mask("99:99");
	       $("#campoPlaca").mask("aaa-9999");
		   $("#campoCPF").mask("999.999.999-99");
		   $("#campoCNPJ").mask("99.999.999/9999-99");	   
	});
	</script>
	
</head>

<body>

<?
require"js/funcoes.jsp";
if($hora_atual < "12:00:00"){ $saudacao = "Bom dia"; }
if($hora_atual > "11:59:59" and $hora_atual < "18:00:00"){ $saudacao = "Boa tarde"; }
if($hora_atual > "17:59:59"){ $saudacao = "Boa noite"; }
$pg = $_GET['pg'];
?>
	<div id="wrapper">
    		<!-- *********************** Sistema de login ************************* --> 
<div id="Principal_login">
	 <?
	include"include/conexao.php";
	if(isset($_SESSION['mercado_cnpj']) AND isset($_SESSION['mercado_senha'])){
		$mercado_cnpj = $_SESSION['mercado_cnpj']; ?>

	<div id="divlogin">
	

	<?
		$sql = mysql_query("SELECT * FROM mercado WHERE cnpj = '$mercado_cnpj'");
	$cont = mysql_num_rows($sql);
	while($linha = mysql_fetch_array($sql)){
		$cnpj = $linha['cnpj'];
		$nome = $linha['nome_fantasia'];
	}

	if($cont == 0){//confere o usuario

	} 
		if($senha_db != $senha_usuario){//confere a senha 
		$teste_logado="1";
		} ?>
        
     
	<table id="tblogin" width="150px	" > 
    <tr>
    	<td>Bem Vindo(a): <br /> <? echo $nome; ?></td>
    </tr>
    <tr>
    	<td class="alinha_direita"> <a href="include/logout.php" >Sair</a> </td>
    </tr>
    <tr>
    <? $id_usuario = $_SESSION['id_usuario'];?>
      <td colspan="2"></td>
   	</tr>
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
        <input type="text" name="login" id="campoCNPJ" autofocus /></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><label for="senha"></label>
      <input type="password" name="senha" id="senha" /></td>
    </tr>
    <tr>
    	<td><input type="submit" name="btlogar" id="btlogar" value="Logar" /></td>
      <? if ( isset($_SESSION['mercado_cnpj']) ){?>
      <? }
	  else { ?>
      <td><a href="usuarios.php?pg=caduser">Cadastro</a>&nbsp;</td>
      
	  <? }?>
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
            </div>