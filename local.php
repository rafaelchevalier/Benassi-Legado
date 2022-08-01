<?
session_start();
require"topo.php";
require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require"include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require"js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$nome_usuario_logado = $_SESSION['nome_usuario'];
?>

<!-- Inicio Link para funcionar a exemplo-calendario.js -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->
<!-- ************************************************************************************************************************************* 
												MENU
****************************************************************************************************************************************** -->
<div id="headline">
<h2>

<p>Local</p>
<? //if ($local_inclui == 1){ ?>
<a href="local.php?pg=cad">Cadastro</a>&nbsp;|&nbsp;
<? //}?>
<? //if ($local_consulta == 1){ ?>
<a href="local.php?pg=consulta">Consulta</a>&nbsp;|&nbsp;
<? //}?>

</h2>
<!-- ************************************************************************************************************************************* 
											FIM MENU 
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad" /*and $local_inclui == "1"*/) {//Cadastro Temperatura Camaras?>

    
    
<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/local.php?funcao=cad" >
     <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td></td>
 <table width="" border="2" align="center" id="tbcad">
   <tr>  
     <td><div align="right">Local:</div></td>
     <td><input type="text" name="origem" id="origem" maxlength="30" size="10" /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											ALTERA Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "alt" and $local_consulta == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Altera</h1>

<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM local where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		 
	 <form id="frmcadastro" name="frmcadastro" method="post"<? if ($local_altera == 1){?> action="include/local.php?funcao=alt&id=<? echo $id ?>" <? }?> >
      <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td></td>
 		 <table width="" border="2" align="center" id="tbcad">
   <tr>  
     <td><div align="right">Local:</div></td>
     <td><input type="text" name="origem" id="origem" maxlength="30" size="10" /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>	<? }} ?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA Aferição Balança
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta" and $local_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="local.php?pg=consulta" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
    <td width="110" align="right">Data Inicial</td>
    <td width="87"><input name="data1" type="text" id="data1" value="<? echo $data_atual;?>" size="9" maxlength="10" readonly="readonly" ></td>
    <td width="180" align="right">Data Final</td>
    <td width="165"><input name="data2" type="text" id="data2" value="<? echo $data_atual;?>" size="9" maxlength="10" readonly="readonly"></td>
  </tr>
  <tr>
    <td align="right">Placa</td>
    <td colspan="3" align="left">
    	<select name="placa" size="1" id="placa">
      					<option value="0" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT transporte_id FROM local ORDER BY transporte_id ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['transporte_id'] != ""){?>
    <? // Consulta transportes cadastrados
	$transporte_id = $linha_filtro['transporte_id'];	
	$sql_transporte = mysql_query("SELECT * FROM transporte where id = '$transporte_id' Limit 1  ");
	$cont_transporte = mysql_num_rows($sql_transporte);
	while($linha_transporte = mysql_fetch_array($sql_transporte)){ 
	?>
    <option value="<? echo utf8_decode($linha_filtro['transporte_id']) ?>" multiple >
	
	<? echo $linha_transporte['placa'] ?></option>
       <? }}}?>
    </select></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="image" src="images/pesq.gif" name="btfiltro1" id="btfiltro1" value="Filtrar" /></td>
 
  </tr>
</table>
</form>
<!-- ******************** Fim Formulário Filtro de consulta a tabela FBL ******************** -->

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
		<? if ($local_altera == "1" or $local_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" id="th_mercado">DATA.&nbsp;</th>
    <th width="5%" id="th_mercado">ORIGEM.&nbsp;</th>
    <th width="5%" id="th_mercado">MOTORISTA.&nbsp;</th>
    <th width="5%" id="th_mercado">PLACA.&nbsp;</th>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela FBL 
$filt1 = converte_data($_REQUEST['data1']);
$filt2 = converte_data($_REQUEST['data2']);
$placa_filt = $_REQUEST['placa'];

	
	if($placa_filt != 0){
	$sql = mysql_query("SELECT * FROM local WHERE data_local BETWEEN ('$filt1') AND ('$filt2')  AND  transporte_id = '$placa_filt' ORDER BY data_local DESC  ");	
	}
	if($placa_filt == 0 and $motorista_filt == 0 ){		
	$sql = mysql_query("SELECT * FROM local WHERE data_local BETWEEN ('$filt1') AND ('$filt2')  ORDER BY data_local DESC  ");
	}
	// Fim teste 

$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($local_exclui == "1" or $local_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($local_exclui == "1"){?>
                	<a href="include/local.php?funcao=exclui&id=<? echo $linha['id'] ?>">Excluir&nbsp;&nbsp;</a>
                <? }?>
                <? if ($local_altera == "1"){?>
                	<a href="local.php?pg=alt&id=<? echo $linha['id'] ?>">Exibe&nbsp;&nbsp;</a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_local']); ?>&nbsp;&nbsp;&nbsp;</td>
	<td width="5%">&nbsp;&nbsp;&nbsp;<? echo $linha['origem']; ?>&nbsp;&nbsp;&nbsp;</td>
	<? // Consulta transportes cadastrados
	$transporte_id = $linha['transporte_id'];	
	$sql_filtro = mysql_query("SELECT * FROM transporte where id = '$transporte_id' Limit 1  ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha_filtro['motorista']); ?>&nbsp;&nbsp;&nbsp;</td> 
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha_filtro['placa']); ?>&nbsp;&nbsp;&nbsp;</td>
    <? }//Fecha While do transporte?>
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="9">&nbsp;
	<? echo "Total Balanças aferidas: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;|
    </th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA Aferição Balança
****************************************************************************************************************************************** -->



		</div>
		<div id="headline">

		</div>
		<div id="body">
			
		</div>
	</div>
<? require"rodape.php"; ?>
</body>
</html>
