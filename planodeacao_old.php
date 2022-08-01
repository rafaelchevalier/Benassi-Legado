<?
session_start();
require"topo.php";
require"include/verifica.php";
require"include/funcoes.php";
require"js/funcoes.jsp";
$data_atual = date("d/m/Y");
?>
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<body> 


  <? if ( isset($_SESSION['login_usuario']) ) {
	?>
    
    <a href="#">Cadastro</a>
    <a href="?pg=relplanodeacao">Relatório</a>
	<?  
  }
  ?>
		</div>
		<div id="headline">
			<!-- ***********************  cadastro Plano de Ação ************************* --> 
        	      
		<?
	if ( isset($_SESSION['login_usuario']) and $pg == "cadplanodeacao" and $_SESSION['nivel_usuario'] < "2") {//Cadastro de Plano de Ação  ?>
<h1>Cadastro Plano de Ação</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=#" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Situação Atual</div></td>
     <td><input type="text" name="situacao_atual" id="cadsituacao_atual" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Ação:</div></td>
     <td><input type="text" name="acao" id="cadacao" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Tipo de Custo</div></td>
     <td><input type="password" name="tipo_custo" id="cadtipo_custo" maxlength="150" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Custo</div></td>
     <td><input type="text" name="custo" id="custo" maxlength="80" size="31" /></td>
   </tr>
       <tr>
     <td><div align="right">Data Prevista</div></td>
     <td align="left"><input type="text" name="data_previsao" id="caddata_previsao" maxlength="10" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Setor:</div></td>
     <td><input type="text" name="setor" id="cadsetor" maxlength="150" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Meta:</div></td>
     <td><input type="text" name="meta" id="cadmeta" maxlength="300" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Status:</div></td>
     <td><input type="text" name="status" id="status" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- *********************** fim  cadastro Plano de Ação ************************* -->


<!-- *********************** exibe plano de ação ************************* --> 
<?  if ( isset($_SESSION['login_usuario']) and $pg == "relplanodeacao" and $_SESSION['nivel_usuario'] < "2") {//relatório dos usuários

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
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=1">SITUAÇÃO&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=2">AÇÃO&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=3">TIPO DE CUSTO&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=4">CUSTO&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=5">DATA PREVISTA&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=6">SETOR&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=7">META&nbsp;</a></th>
    <th width=""><a href="planodeacao.php?pg=relplanodeacao&ordem=8">STATUS&nbsp;</a></th>
  </tr>
    <?
	$ordem = $_REQUEST['ordem'];
	switch($ordem){
	case 1:
	$ordem ="situacao_atual";		
	break;
	case 2:
	$ordem ="acao";		
	break;
	case 3:
	$ordem ="tipo_custo";		
	break;
	case 4:
	$ordem ="custo";		
	break;
	case 5:
	$ordem ="data_previsao";		
	break;
	case 6:
	$ordem ="setor";		
	break;
	case 7:
	$ordem ="meta";		
	break;
	case 8:
	$ordem ="status";		
	break;
	default;
	$ordem="status";
	}
	$tipo_ordem = $_REQUEST['tp_ordem'];
	switch($tipo_ordem){
	case 1:
	$tipo_ordem = "ASC";
	break;
	case 2:
	$tipo_ordem = "DESC";
	break;
	default;
	$tipo_ordem = "ASC";
	
	}
  $sql = mysql_query("SELECT * FROM plano_de_acao ORDER BY $ordem $tipo_ordem");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$situacao_atual = $linha['situacao_atual'];
	$acao = $linha['acao'];
	$tipo_custo = $linha['tipo_custo'];
	$custo = $linha['custo'];
	$data_previsao = $linha['data_previsao'];
	$setor = $linha['setor'];
	$meta = $linha['meta'];
	$status = $linha['status'];
	?>
    <tr>
    	<td >
        	<a href="usuarios.php?pg=alterauser&id=<? echo $id ?>">Alterar&nbsp;&nbsp;</a>
    	 	<a href="include/excluir.php?funcao=excluiruser&id=<? echo $id ?>">Remover</a>
    	</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo utf8_encode($situacao_atual) ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo utf8_encode($acao) ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo $tipo_custo ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo $custo ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo $data_previsao ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo $setor ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo utf8_encode($meta) ?>&nbsp;&nbsp;&nbsp;</td>
    <td >&nbsp;&nbsp;&nbsp;<? echo utf8_encode($status) ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe plano de ação ************************* --> 
		</div>
		<div id="body">
			
		</div>
	</div>
	<? require"rodape.php";?>
</body>
</html>
