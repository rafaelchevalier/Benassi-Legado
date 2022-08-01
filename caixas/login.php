
<body>
	<div id="principal_login">
    	
         <!-- *********************** Sistema de login ************************* --> 
 		 <?php
			 
include"include/conexao.php";
if(isset($_SESSION['login_usuario_caixa']) AND isset($_SESSION['senha_usuario_caixa'])){
	$login_usuario = $_SESSION['login_usuario_caixa']; 
	
	$sql = mysql_query("SELECT * FROM login WHERE login = '$login_usuario_caixa'");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$nome = $linha['nome'];
}

if($cont == 0){//confere o usuario

} 
	if($senha_db != $senha_usuario){//confere a senha 
	$teste_logado="1";
	} ?>
	<table align="center" id="tblogin" > 
    <tr><td>Bem Vindo(a): </td></tr>
    <tr><td> <? echo $nome; ?> </td></tr>
	<tr><td class="alinha_direita"> <a href="include/logout.php">Sair</a> </td></tr>
    <tr><td class="alinha_direita"> <a href="http://webmail.benassirio.com.br" target="_new">E-mail</a> </td></tr>
	</table> 
	<?	
}else { $teste_logado="0";

 ?>

<form id="frmlogin" name="frmlogin" method="post" action="include/logar.php" >
  <table align="center" id="tblogin">

      <tr><td>Usuário:<input name="login" type="text" id="login" size="18" maxlength="20" /></td></tr>
    <tr><td height="20px"><label for="senha">Senha:&nbsp;</label>
        <input name="senha" type="password" id="senha" size="18" maxlength="15" /></td></tr>
    <tr><td><input type="submit" name="submit" id="btlogar" value="Logar"/>
      <input type="reset" name="btlimpar" id="btlimpar" value="limpar"/></td></tr>
  </table><? } ?></form>
    </div><!-- Fecha div_login_direita -->
<!-- *********************** Fim Sistema de login ************************* -->
        
        
    </div>
</body>
</html>