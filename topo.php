<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Ti Benassi Rio de Janeiro</title>
	<link rel="stylesheet" href="style.css" type="text/css" charset="utf-8" />
    <link rel="stylesheet" href='css/CSS3 Menu.css3prj_files/css3menu1/style.css'" type="text/css" /><style type="text/css">._css3m{display:none}</style>
	
	
	<!-- Data Table -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
	
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
	

	
	<!-- Fim data table -->
	
	<!-- Jquery UI -->
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	
	
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>

<?
if($hora_atual < "12:00:00"){ $saudacao = "Bom dia"; }
if($hora_atual > "11:59:59" and $hora_atual < "18:00:00"){ $saudacao = "Boa tarde"; }
if($hora_atual > "17:59:59"){ $saudacao = "Boa noite"; }

?>
	<div id="wrapper">
    		<!-- *********************** Sistema de login ************************* --> 
<div id="Principal_login">
	 <?
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
    <? $id_usuario = $_SESSION['id_usuario'];?>
      <td colspan="2"><a href="usuarios.php?pg=alterauser&id= <? echo $id_usuario?>">Alterar Dados</a>&nbsp;</td>
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
        <input type="text" name="login" id="login2" /></td>
    </tr>
    <tr>
      <td>Senha</td>
      <td><label for="senha"></label>
      <input type="password" name="senha" id="senha" /></td>
    </tr>
    <tr>
    	<td><input type="submit" name="btlogar" id="btlogar" value="Logar" /></td>
      <? if ( isset($_SESSION['login_usuario']) ){?>
      <? }
	  else { ?>
      <td><a href="2.0/login.php?pg=cad">Cadastro</a>&nbsp;</td>
      
	  <? }?>
   	</tr>
  </table>
<? } ?></form>

	</div><!-- Fecha div login-->
</div><!-- Fecha div Principal_login-->
<!-- *********************** Fim Sistema de login ************************* --> 
		<img src="images/logo benassi.png" width="470px" alt="Logo Benassi" class="logo_benassi" />
		<div id="header">
			<!--<nav>
				<ul class="menu">
					<li><a href="2.0/chamado.php?pg=abre_chamado">&nbsp;Chamado&nbsp;</a></li>
					<li><a href="#">Sobre</a></li>
					<li><a href="#">Registro RH</a>
						<ul>
						  <li><a href="rh_registro_doc.php?pg=cad_qt">&nbsp;Cadastro&nbsp;</a></li>
						  <li><a href="rh_registro_doc.php?pg=consulta">&nbsp;Consulta&nbsp;</a>|</li>
						</ul>
					</li>
					<li><a href="#">RNC</a>
						<ul>
						  <li><a href="rnc.php?pg=cad">&nbsp;Cadastro&nbsp;</a></li>
						  <li><a href="rnc.php?pg=consulta">&nbsp;Consulta.&nbsp;</a></li>
						</ul>
					</li>
					<li><a href="#">PAT</a>
						<ul>
						  <li><a href="pat.php?pg=cad">&nbsp;Cadastro&nbsp;</a></li>
						  <li><a href="pat.php?pg=consulta">&nbsp;Consulta&nbsp;</a></li>
						</ul>
					</li>
					<li><a href="#">PHG</a>
						<ul>
						  <li><a href="phg.php?pg=cad_dia">&nbsp;Diário&nbsp;</a></li>
						  <li><a href="phg.php?pg=cad_semanal">&nbsp;Semanal&nbsp;</a></li>
						  <li><a href="phg.php?pg=cad_mes">&nbsp;Mensal&nbsp;</a></li>
						  <li><a href="phg.php?pg=consulta">&nbsp;Consulta&nbsp;</a></li>
						</ul>
					</li>
					<li><a href="#">CLP</a>
						<ul>
						  <li><a href="clp.php?pg=cad">&nbsp;Cadastro&nbsp;</a></li>
						  <li><a href="clp.php?pg=consulta">&nbsp;Consulta.&nbsp;</a></li>
						</ul>
					</li>
				</ul>
			</nav>-->
			<div id="nav">
				<p><h5><?require "menu.php";?></h5></p>
			<br />
			<br />
			<br />
			
			</div>
			
        </div>