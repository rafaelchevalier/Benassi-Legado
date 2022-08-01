<?
session_start();
require"topo.php";
?>
<body>

  <!-- ***********************  cadastro Caixas ************************* -->                
		<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "cadcaixa" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores  ?>
		<h2>Cadastro Caixas</h2>  
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=adicionacaixa" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td><div align="right">Cod.</div></td>
     <td><input type="text" name="cod" id="codcaixa" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Tamanho</div></td>
     <td><input type="text" name="tamanho" id="tamcaixas" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Cor:</div></td>
     <td><input type="text" name="cor" id="corcaixa" maxlength="30" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Descrição</div></td>
     <td><textarea name="descricao" cols="30" rows="5"></textarea></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
 </table>
  </form>	
	 <? } ?>
<!-- *********************** fim  cadastro Caixas ************************* -->
 <!-- *********************** Altera Caixas ************************* -->  	 	  
	<?
		include"include/conexao.php";
		if ( isset($_SESSION['login_usuario_caixa']) and $pg == "alteracaixa" and $_SESSION['nivel_usuario_caixa'] < "2") {//altera de Administradores 
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM caixas where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		$cod = $linha['cod'];
		$tamanho= $linha['tamanho'];
		$cor = $linha['cor'];
		$descricao= $linha['descricao'];		
		 ?>
         <h2>Altera Caixas</h2>
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=alteracaixa&id=<? echo $id ?>" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td>Cod:</td>
     <td><input type="text" name="cod" id="codcaixa" maxlength="30" size="31" value="<? echo $cod ?>" /></td>
   </tr>
   <tr>
     <td>Tamanho:</td>
     <td><input type="text" name="tamanho" id="tamanhocaixa" maxlength="30" size="31" value="<? echo $tamanho ?>" /></td>
   </tr>
   <tr>
     <td>Cor:</td>
     <td><input type="text" name="cor" id="corcaixa" maxlength="30" size="31" value="<? echo $cor ?>"/></td>
   </tr>
   <tr>
     <td>Descrição:</td>
     <td><textarea name="descricao" cols="30" rows="5"><? echo $descricao ?></textarea></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Alterar" />
      </div></td>
   </tr>
 </table>
	
  </form>
		<? }} ?>
 <!-- *********************** Fim Altera Caixas ************************* --> 
  <!-- *********************** exibe Caixas ************************* --> 
<?  if ( isset($_SESSION['login_usuario_caixa']) and $pg == "relcaixas" and $_SESSION['nivel_usuario_caixa'] < "2") {//relatório dos usuários
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
    <th width="8%">opcao&nbsp;</th>
    <th width="8%">Cod.&nbsp;</th>
    <th width="6%">Tamanho.&nbsp;</th>
    <th width="38%">Cor.&nbsp;</th>
    <th width="40%">Descrição.&nbsp;</th>
  </tr>
    <?
  $sql = mysql_query("SELECT * FROM caixas ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$cod = $linha['cod'];
	$tamanho = $linha['tamanho'];
	$cor = $linha['cor'];
	$descricao = $linha['descricao'];

	?>
    <tr>
    <td ><a href="caixas.php?pg=alteracaixa&id=<? echo $id ?>">Alterar&nbsp;&nbsp;</a><a href="include/excluir.php?funcao=excluircaixa&id=<? echo $id ?>">Remover</a></td>
    <td width="8%">&nbsp;&nbsp;&nbsp;<? echo $cod ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="6%">&nbsp;&nbsp;&nbsp;<? echo $tamanho ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="38%">&nbsp;&nbsp;&nbsp;<? echo $cor ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="40%">&nbsp;&nbsp;&nbsp;<? echo $descricao ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe Caixas ************************* --> 
<? require"rodape.php"; ?>


</body>
