<?
session_start();
require"topo.php";
require"include/verifica.php";
$hora_atual = date("H:i:s");
?>
<body>
  
  <!-- ***********************  cadastro Usuários ************************* -->   
	<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "cadadm" and $_SESSION['nivel_usuario_caixa'] == 0) {//Cadastro de Administradores  ?>
		<h2>Cadastro Usuários</h2>  
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=adiciona" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td><div align="right">Nome Completo:</div></td>
     <td><input type="text" name="nome" id="cadnome" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Login:</div></td>
     <td><input type="text" name="login" id="cadlogin" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Senha:</div></td>
     <td><input type="password" name="senha" id="cadsenha" maxlength="30" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">E-mail:</div></td>
     <td><input type="text" name="email" id="cademail" maxlength="80" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Tel. Contato:</div></td>
     <td><input type="text" name="contato" id="cadcontato" maxlength="15" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Hora Liberação</div></td>
     <td>
     <? echo $hora_atual?>
     In&iacute;cio:
     <select name="hora_inicio" size="1">
     <option value="00:00">00:00</option>
     <option value="1:00"selected>1:00</option>
     <option value="2:00">2:00</option>
     <option value="3:00">3:00</option>
     <option value="4:00">4:00</option>
     <option value="5:00">5:00</option>
     <option value="6:00" >6:00</option>
     <option value="7:00">7:00</option>
     <option value="8:00">8:00</option>
     <option value="9:00">9:00</option>
     <option value="10:00">10:00</option>
     <option value="11:00">11:00</option>
     <option value="12:00">12:00</option>
     <option value="13:00">13:00</option>
     <option value="14:00">14:00</option>
     <option value="15:00">15:00</option>
     <option value="16:00">16:00</option>
     <option value="17:00">17:00</option>
     <option value="18:00">18:00</option>
     <option value="19:00">19:00</option>
     <option value="20:00">20:00</option>
     <option value="21:00">21:00</option>
     <option value="22:00">22:00</option>
     <option value="23:00">23:00</option>
     </select>
     Fim:
     <select name="hora_fim" size="1">
     <option value="00:00">00:00</option>
     <option value="1:00">1:00</option>
     <option value="2:00">2:00</option>
     <option value="3:00">3:00</option>
     <option value="4:00">4:00</option>
     <option value="5:00">5:00</option>
     <option value="6:00" >6:00</option>
     <option value="7:00">7:00</option>
     <option value="8:00">8:00</option>
     <option value="9:00">9:00</option>
     <option value="10:00">10:00</option>
     <option value="11:00">11:00</option>
     <option value="12:00">12:00</option>
     <option value="13:00">13:00</option>
     <option value="14:00">14:00</option>
     <option value="15:00">15:00</option>
     <option value="16:00">16:00</option>
     <option value="17:00">17:00</option>
     <option value="18:00">18:00</option>
     <option value="19:00">19:00</option>
     <option value="20:00">20:00</option>
     <option value="21:00">21:00</option>
     <option value="22:00">22:00</option>
     <option value="23:00"selected>23:00</option>
     </select>
     </select>
     </td>
   </tr>
   <tr>
     <td><div align="right">Nivel Usu&aacute;rio:</div></td>
     <td>
     <? if ( $_SESSION['nivel_usuario_caixa'] == "0"){ ?>
     Master: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="0"  />  
     <? } ?>
     Administrador: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="1"  />      
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
<!-- *********************** fim  cadastro Usuários ************************* -->
 <!-- *********************** Altera Usuários ************************* -->  	 	  
	<?
		include"include/conexao.php";
		if ( isset($_SESSION['login_usuario_caixa']) and $pg == "alteraadm") {//altera de Administradores 
		if ($_SESSION['nivel_usuario_caixa'] == 0 or $_SESSION['id_usuario_caixa'] == $_GET['id']){
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM login where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		$nome = $linha['nome'];
		$login = $linha['login'];
		$senha = $linha['senha'];
		$email = $linha['email'];	
		$nivel_usuario = $linha['nivel_usuario'];		
		 ?>
         <h2>Altera Usuários</h2>
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=alteraadm&id=<? echo $id ?>" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td>Nome Completo:</td>
     <td><input name="nome" type="text" id="cadnome" value="<? echo $nome ?>" size="31" maxlength="30"  /></td>
   </tr>
   <tr>
     <td>Login:</td>
     <td><input type="text" name="login" id="cadlogin" maxlength="30" size="31" value="<? echo $login ?>" /></td>
   </tr>
   <? if ($_SESSION['nivel_usuario_caixa'] < 1 or $_SESSION['id_usuario_caixa'] == $id){ 
	?>
   
   <tr>
     <td>Senha:</td>
     
     <td><input type="password" name="senha" id="cadsenha" maxlength="40" size="31" value=""/></td>
   </tr>
   <? }?>
   <tr>
     <td>E-mail:</td>
     <td><input type="text" name="email" id="cademail" maxlength="50" size="51"value="<? echo $email ?>" /></td>
   </tr>
   <tr>
     <td><div align="right">Tel. Contato:</div></td>
     <td><input type="text" name="contato" id="cadcontato" maxlength="15" size="31"value="<? echo $linha['contato'] ?>" /></td>
   </tr>
   <tr>

     <td><div align="right">Hora Liberação</div></td>
     <td>
     <? echo $hora_atual?>
     In&iacute;cio:
     <select name="hora_inicio" <? if ($_SESSION['nivel_usuario_caixa'] > 1){ ?>readonly="readonly"<? }?> >
     <? if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "00:00:00"){?>
     <option value="00:00" <? if ($linha['hora_inicio'] == "00:00:00"){?> selected <? } ?> >00:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "01:00:00"){?>
     <option value="1:00" <? if ($linha['hora_inicio'] == "01:00:00"){?> selected <? } ?> >1:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "02:00:00"){?>
     <option value="2:00" <? if ($linha['hora_inicio'] == "02:00:00"){?> selected <? } ?> >2:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "03:00:00"){?>
     <option value="3:00" <? if ($linha['hora_inicio'] == "03:00:00"){?> selected <? } ?> >3:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "04:00:00"){?>
     <option value="4:00" <? if ($linha['hora_inicio'] == "04:00:00"){?> selected <? } ?> >4:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "05:00:00"){?>
     <option value="5:00" <? if ($linha['hora_inicio'] == "05:00:00"){?> selected <? } ?> >5:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "06:00:00"){?>
     <option value="6:00" <? if ($linha['hora_inicio'] == "06:00:00"){?> selected <? } ?> >6:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "07:00:00"){?>
     <option value="7:00" <? if ($linha['hora_inicio'] == "07:00:00"){?> selected <? } ?> >7:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "08:00:00"){?>
     <option value="8:00" <? if ($linha['hora_inicio'] == "08:00:00"){?> selected <? } ?> >8:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "09:00:00"){?>
     <option value="9:00" <? if ($linha['hora_inicio'] == "09:00:00"){?> selected <? } ?> >9:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "10:00:00"){?>
     <option value="10:00" <? if ($linha['hora_inicio'] == "10:00:00"){?> selected <? } ?> >10:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "11:00:00"){?>
     <option value="11:00" <? if ($linha['hora_inicio'] == "11:00:00"){?> selected <? } ?> >11:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "12:00:00"){?>
     <option value="12:00" <? if ($linha['hora_inicio'] == "12:00:00"){?> selected <? } ?> >12:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "13:00:00"){?>
     <option value="13:00" <? if ($linha['hora_inicio'] == "13:00:00"){?> selected <? } ?> >13:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "14:00:00"){?>
     <option value="14:00" <? if ($linha['hora_inicio'] == "14:00:00"){?> selected <? } ?> >14:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "15:00:00"){?>
     <option value="15:00" <? if ($linha['hora_inicio'] == "15:00:00"){?> selected <? } ?> >15:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "16:00:00"){?>
     <option value="16:00" <? if ($linha['hora_inicio'] == "16:00:00"){?> selected <? } ?> >16:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "17:00:00"){?>
     <option value="17:00" <? if ($linha['hora_inicio'] == "17:00:00"){?> selected <? } ?> >17:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "18:00:00"){?>
     <option value="18:00" <? if ($linha['hora_inicio'] == "18:00:00"){?> selected <? } ?> >18:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "19:00:00"){?>
     <option value="19:00" <? if ($linha['hora_inicio'] == "19:00:00"){?> selected <? } ?> >19:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "20:00:00"){?>
     <option value="20:00" <? if ($linha['hora_inicio'] == "20:00:00"){?> selected <? } ?> >20:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "21:00:00"){?>
     <option value="21:00" <? if ($linha['hora_inicio'] == "21:00:00"){?> selected <? } ?> >21:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "22:00:00"){?>
     <option value="22:00" <? if ($linha['hora_inicio'] == "22:00:00"){?> selected <? } ?> >22:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_inicio'] == "23:00:00"){?>
     <option value="23:00" <? if ($linha['hora_inicio'] == "23:00:00"){?> selected <? } ?> >23:00</option>
     <? } ?>
     </select>
     Fim:
     <select name="hora_fim"   <? if ($_SESSION['nivel_usuario_caixa'] > 1){ ?>readonly="readonly"<? }?>>
     <? if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "00:00:00"){?>
     <option value="00:00" <? if ($linha['hora_fim'] == "00:00:00"){?> selected <? } ?> >00:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "01:00:00"){?>
     <option value="1:00" <? if ($linha['hora_fim'] == "01:00:00"){?> selected <? } ?> >1:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "02:00:00"){?>
     <option value="2:00" <? if ($linha['hora_fim'] == "02:00:00"){?> selected <? } ?> >2:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "03:00:00"){?>
     <option value="3:00" <? if ($linha['hora_fim'] == "03:00:00"){?> selected <? } ?> >3:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "04:00:00"){?>
     <option value="4:00" <? if ($linha['hora_fim'] == "04:00:00"){?> selected <? } ?> >4:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "05:00:00"){?>
     <option value="5:00" <? if ($linha['hora_fim'] == "05:00:00"){?> selected <? } ?> >5:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "06:00:00"){?>
     <option value="6:00" <? if ($linha['hora_fim'] == "06:00:00"){?> selected <? } ?> >6:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "07:00:00"){?>
     <option value="7:00" <? if ($linha['hora_fim'] == "07:00:00"){?> selected <? } ?> >7:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "08:00:00"){?>
     <option value="8:00" <? if ($linha['hora_fim'] == "08:00:00"){?> selected <? } ?> >8:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "09:00:00"){?>
     <option value="9:00" <? if ($linha['hora_fim'] == "09:00:00"){?> selected <? } ?> >9:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "10:00:00"){?>
     <option value="10:00" <? if ($linha['hora_fim'] == "10:00:00"){?> selected <? } ?> >10:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "11:00:00"){?>
     <option value="11:00" <? if ($linha['hora_fim'] == "11:00:00"){?> selected <? } ?> >11:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "12:00:00"){?>
     <option value="12:00" <? if ($linha['hora_fim'] == "12:00:00"){?> selected <? } ?> >12:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "13:00:00"){?>
     <option value="13:00" <? if ($linha['hora_fim'] == "13:00:00"){?> selected <? } ?> >13:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "14:00:00"){?>
     <option value="14:00" <? if ($linha['hora_fim'] == "14:00:00"){?> selected <? } ?> >14:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "15:00:00"){?>
     <option value="15:00" <? if ($linha['hora_fim'] == "15:00:00"){?> selected <? } ?> >15:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "16:00:00"){?>
     <option value="16:00" <? if ($linha['hora_fim'] == "16:00:00"){?> selected <? } ?> >16:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "17:00:00"){?>
     <option value="17:00" <? if ($linha['hora_fim'] == "17:00:00"){?> selected <? } ?> >17:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "18:00:00"){?>
     <option value="18:00" <? if ($linha['hora_fim'] == "18:00:00"){?> selected <? } ?> >18:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "19:00:00"){?>
     <option value="19:00" <? if ($linha['hora_fim'] == "19:00:00"){?> selected <? } ?> >19:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "20:00:00"){?>
     <option value="20:00" <? if ($linha['hora_fim'] == "20:00:00"){?> selected <? } ?> >20:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "21:00:00"){?>
     <option value="21:00" <? if ($linha['hora_fim'] == "21:00:00"){?> selected <? } ?> >21:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "22:00:00"){?>
     <option value="22:00" <? if ($linha['hora_fim'] == "22:00:00"){?> selected <? } ?> >22:00</option>
     <? }  if ($_SESSION['nivel_usuario_caixa'] < 2 or $linha['hora_fim'] == "23:00:00"){?>
     <option value="23:00" <? if ($linha['hora_fim'] == "23:00:00"){?> selected <? } ?> >23:00</option>
     <? } ?>
     </select>
     </td>
   </tr>
   
   <tr>
   <tr>
     <td><div align="right">Nivel Usu&aacute;rio:</div></td>
     <td>
     
      <?  if ( $_SESSION['nivel_usuario_caixa'] == "0"){ ?>
     Master: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="0" <? if ($nivel_usuario == "0" ){?>checked="checked"<? }//Fecha teste checked Master?>  />  
     <? }//Teste para aparecer somente em usuário nivel master ?>
     <?  if ( $_SESSION['nivel_usuario_caixa'] < "2"){ ?>
     Administrador: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="1" <? if ($nivel_usuario == "1" ){?>checked="checked"<? }//Fecha teste checked Administrador?> />  <? }}?>     
     	Usuario: <input type="radio" name="nivel_usuario" id="nivel_usuario" value="2" <? if ($nivel_usuario == "2" ){?>checked="checked"<? }//Fecha teste checked Usuario?> /> 
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
 <!-- *********************** Fim Altera Usuários ************************* --> 
  <!-- *********************** Exibe Usuários ************************* --> 
<?  if ( isset($_SESSION['login_usuario_caixa']) and $pg == "relusuario" and $_SESSION['nivel_usuario_caixa'] == 0) {//relatório dos usuários
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
		<? if($_SESSION['nivel_usuario_caixa'] == 0){ //FILTRO LIBERAR ACESSO APENAS PARA USUÁRIOS COM NÍVEL DE ACESSO MASTER ?>
    <th width="8%">opcao&nbsp;</th> 
		<? } ?>
    <th width="32%">Nome&nbsp;</th>
    <th width="13%">login&nbsp;</th>
    <th width="24%">E-mail&nbsp;</th>
    <th >Tel. Contato&nbsp;</th>
  </tr>
    <?
  $sql = mysql_query("SELECT * FROM login ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$nome = $linha['nome'];
	$login = $linha['login'];
	$email = $linha['email'];
	$contato = $linha['contato'];
	$id = $linha['id'];
	$nivel = $linha['nivel_usuario'];
	?>
    <tr>
		<? if ($_SESSION['nivel_usuario_caixa'] == 0) {//FILTRO LIBERAR ACESSO APENAS PARA USUÁRIOS COM NÍVEL DE ACESSO MASTER  ?>
    <td ><a href="usuario.php?pg=alteraadm&id=<? echo $id ?>">Alterar&nbsp;&nbsp;</a><a href="include/excluir.php?funcao=excluiradm&id=<? echo $id ?>">Remover</a></td>
		<? }?>
    <td width="32%" align="left">&nbsp;<? echo $nome ?>&nbsp;</td>
    <td width="13%" align="left">&nbsp;<? echo $login ?>&nbsp;</td>
    <td width="24%" align="left">&nbsp;<? echo $email ?>&nbsp;</td>
    <td width="23%" align="left">&nbsp;<? echo $contato ?>&nbsp;</td>
  </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe Usuários ************************* --> 
<? require"rodape.php"; ?>


</body>
