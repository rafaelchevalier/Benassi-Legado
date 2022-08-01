<?
session_start();
require "topo.php";
?>

		<div id="headline">
		
		</div>
		<div id="body">
			<!-- ***********************  cadastro administradores ************************* -->   
  <? if ( isset($_SESSION['login_usuario']) ) {
	?>
    
    <a href="?pg=cadadm">Cadastro</a>
    <a href="?pg=relusuario">Relatório</a>
	<?  
  }
  ?>    
		<?
	if ( isset($_SESSION['login_usuario']) and $pg == "cadadm" and $_SESSION['nivel_usuario'] < "2") {//Cadastro de Administradores  ?>
		<h2>Cadastro Usuários</h2>  
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=adiciona" style="text-align:right">
 <table width="" border="0" align="center">
   <tr>
     <td>Nome Completo:</td>
     <td><input type="text" name="nome" id="cadnome" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td>Login:</td>
     <td><input type="text" name="login" id="cadlogin" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td>Senha:</td>
     <td><input type="password" name="senha" id="cadsenha" maxlength="30" size="31" /></td>
   </tr>
   <tr>
     <td>E-mail:</td>
     <td><input type="text" name="email" id="cademail" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Rádio:</td>
     <td><input type="text" name="radio" id="cadradio" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Celular:</td>
     <td><input type="text" name="cel" id="cadcel" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Setor:</td>
     <td><input type="text" name="email" id="cadsetor" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Local Trabalho:</td>
     <td><input type="text" name="local" id="cadlocal" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Nivel Usu&aacute;rio:</td>
     <td><? if ($_SESSION['nivel_usuario'] < "1"){?>Administrador: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="1"  /> <? }?>     
     	Usuario: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="2" checked="checked" /> 
        </td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- *********************** fim  cadastro administradores ************************* -->
 <!-- *********************** Altera Administrados ************************* -->  	   
	<?
		include"include/conexao.php";
		if ( isset($_SESSION['login_usuario']) and $pg == "alteraadm" and $_SESSION['nivel_usuario'] < "2") {//altera de Administradores 
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM login where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		$nome = $linha['nome'];
		$login = $linha['login'];
		$senha = $linha['senha'];
		$email = $linha['email'];		
		 ?>
         <h2>Altera Usuários</h2>
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=alteraadm&id=<? echo $id ?>" style="text-align:right">
 <table width="" border="1" align="center">
   <tr>
     <td>Nome Completo:</td>
     <td><input type="text" name="nome" id="cadnome" maxlength="30" size="31" value="<? echo $nome ?>" /></td>
   </tr>
   <tr>
     <td>Login:</td>
     <td><input type="text" name="login" id="cadlogin" maxlength="30" size="31" value="<? echo $login ?>" /></td>
   </tr>
   <tr>
     <td>Senha:</td>
     <td><input type="password" name="senha" id="cadsenha" maxlength="30" size="31" value="<? echo $senha ?>"/></td>
   </tr>
   <tr>
     <td>E-mail:</td>
     <td><input type="text" name="email" id="cademail" maxlength="80" size="31"value="<? echo $email ?>" /></td>
   </tr>
   <tr>
     <td>Rádio:</td>
     <td><input type="text" name="radio" id="cadradio" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Celular:</td>
     <td><input type="text" name="cel" id="cadcel" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Setor:</td>
     <td><input type="text" name="email" id="cadsetor" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Local Trabalho:</td>
     <td><input type="text" name="local" id="cadlocal" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td>Nivel Usu&aacute;rio:</td>
     <td><? if ($_SESSION['nivel_usuario'] < "1"){?>Administrador: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="1"  /><? }?>      
     	Usuario: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="2" checked="checked" /> 
        </td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Alterar" />
     </div></td>
   </tr>
 </table>
  </form>
		<? }} ?>
 <!-- *********************** Fim Altera Administrados ************************* --> 
  <!-- *********************** exibe Administrados ************************* --> 
<?  if ( isset($_SESSION['login_usuario']) and $pg == "relusuario" and $_SESSION['nivel_usuario'] < "2") {//relatório dos usuários
?>
 <script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
    <th width="">OP&Ccedil;&Atilde;O&nbsp;</th>
    <th width="">NOME&nbsp;</th>
    <th width="">LOGIN&nbsp;</th>
    <th width="">E-MAIL&nbsp;</th>
  </tr>
    <? // Conecta a tabela login para exibir o usuários cadastrado
  $sql = mysql_query("SELECT * FROM login ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$nome = $linha['nome'];
	$login = $linha['login'];
	$email = $linha['email'];
	$id = $linha['id'];
	?>
    
    <tr>
    <td ><a href="index.php?pg=alteraadm&id=<? echo $id ?>">Alterar&nbsp;&nbsp;</a><a href="include/excluir.php?funcao=excluiradm&id=<? echo $id ?>">Remover</a></td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $nome ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $login ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $email ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe Administrados ************************* --> 
		</div>
	</div>
<? require"rodape.php"; ?>
</body>
</html>
