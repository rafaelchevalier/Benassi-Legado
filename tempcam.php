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
		<div id="headline">


<h2><p> Temperatura Camaras Frigoríficas </p></h2>
<!-- ************************************************************************************************************************************* 
											CADASTRO TEMPERATURA
FORMULÁRIO DE CADASTRO DAS TEMPERATURAS E UMIDADE DAS CÂMARAS FRIGORIFICAS, AS MEDIÇÕES DEVEM SER FEITAS DIARIAMENTE DE TODAS AS AS CÂMARAS
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_tempcam" /* and $filt_tempcam_inclui == "1" */) {//Cadastro Temperatura Camaras?>

    
    
<h1>Cadastro Temperatura</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/tempcam.php?funcao=cad_tempcam" >
 <table width="" border="2" align="center" id="tbcad">
 <td><div align="right">Data.:</div></td>
     <td align="left" colspan="2">
     <input name="data" type="text" size="20" maxlength="10" readonly="readonly" <? if($geral_libera_data == 1) {?>id="data1" <? }?>value="<? echo $data_atual?>" <? if($geral_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td><input type="text" name="nome" id="cadnome" value="<? echo utf8_encode($nome_usuario_logado)?>" maxlength="30" size="31" readonly="readonly"  /></td>
   </tr>
   <tr>
     <td><div align="right">Período.:</div></td>
     <td align="left"><label for="periodo"></label>
       <select name="periodo" id="periodo">
         <option value="Manhã">Manhã</option>
         <option value="Tarde">Tarde</option>
         <option value="Noite">Noite</option>
       </select></td>
   </tr>
   <tr>
    <td><div align="right">Camara:</div></td>
    <td align="left"><label for="camara"></label>
		<select name="camara" id="camara">
			<?
			$sql_camara = mysql_query("SELECT *FROM cadcamaras ORDER BY nome ");
			$cont_camara = mysql_num_rows($sql_camara);
			while($linha_camara = mysql_fetch_array($sql_camara)){ 
			?>
				<option value="<? echo $linha_camara['id']?>"><? echo $linha_camara['nome']?></option>
			<?
			}
			?>
		<!-- 	
        <option value="Camara 1">Camara 1</option>
        <option value="Camara 2">Camara 2</option>
        <option value="Camara 3">Camara 3</option>
        <option value="Camara 4">Camara 4</option>
        <option value="Antecamara">Antecamara</option>
        <option value="Cozinha ind">Cozinha ind</option>
        <option value="Embalados">Embalados</option>
		--> 
       </select></td>
   </tr>
   <tr>  
     <td><div align="right">Temperatura:</div></td>
     <td><input name="temperatura" type="text" value="" size="25" maxlength="10" /><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
   </tr>
   <tr>  
     <td><div align="right">Umidade:</div></td>
     <td><input name="umidade" type="text" value="" size="25" maxlength="3" /><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
   </tr>
   <tr>  
     <td><div align="right">Observação:</div></td>
     <td><textarea name="obs" cols="24" maxlength="450" ></textarea></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO TEMPERATURA
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA TEMPERATURA CAMARAS
EXIBE TEMPERATURAS E UMIDADES CADASTRADAS DAS CAMARAS
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta_tempcam" /* and $filt_tempcam_consulta = "1" */) {//Consulta Temperatura Camaras 
?>

<h1>Consulta Temperatura Câmaras</h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="tempcam.php?pg=consulta_tempcam" method="post" enctype="multipart/form-data">
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
    <td align="right">Camaras</td>
    <td colspan="3" align="left"><select name="camara" size="1">
      					<option value="0" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT camara FROM tempcam ORDER BY camara ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['camara'] != ""){?>
    <option value="<? echo $linha_filtro['camara'] ?>" multiple ><? echo utf8_encode($linha_filtro['camara']) ?></option>
       <? }}?>
    </select></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="image" src="images/pesq.gif" name="btfiltro1" id="btfiltro1" value="Filtrar" /></td>
 
  </tr>
</table>
</form>
<!-- ******************** Fim Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
	<form action="include/tempcam.php?funcao=exclui_varios" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($filt_tempcam_altera == "1" or $filt_tempcam_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" id="th_mercado" rowspan="2">DATA MEDIÇÃO.&nbsp;</th>
    <th width="5%" id="th_mercado" rowspan="2">PERÍODO.&nbsp;</th>
	<th width="10%" id="th_mercado" rowspan="2">USUARIO.&nbsp;</th>
    <th width="10%" id="th_mercado" rowspan="2">CAMARA.&nbsp;</th>
    <th width="5%" id="th_mercado" rowspan="2">TEMPERATURA.&nbsp;</th>
    <th width="5%" id="th_data_cont" rowspan="2">UMIDADE.&nbsp;</th>
    <th width="54%" id="th_data_cont" rowspan="2">OBS.&nbsp;</th>
  </tr>
  <tr>
  	<th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>

  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela tampcam 
$filt1 = converte_data($_REQUEST['data1']);
$filt2 = converte_data($_REQUEST['data2']);
$camara_filt = $_REQUEST['camara'];
if ($camara != "0"){
	$sql = mysql_query("SELECT * FROM tempcam WHERE data_medicao BETWEEN ('$filt1') AND ('$filt2')  AND camara = '$camara_filt'  ORDER BY data_medicao DESC  ");
			
}
if($camara == "0"){
	$sql = mysql_query("SELECT * FROM tempcam WHERE data_medicao BETWEEN ('$filt1') AND ('$filt2') ORDER BY data_medicao DESC");	
	}
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($filt_tempcam_exclui == "1" or $filt_tempcam_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($filt_tempcam_exclui == "1"){?>
                	<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? }?>
                <? if ($filt_tempcam_altera == "11"){?>
                	<a href="tempcam.php?pg=altera_tempcam&id=<? echo $linha['id'] ?>">Alterar&nbsp;&nbsp;</a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_medicao']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['periodo']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['nome_usuario']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['camara']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['temperatura']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['umidade']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs']) ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	  
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="8">&nbsp;<? echo "Total Medições Realizadas: ",$quantidade_filt;?>&nbsp;</th>
    

  </tr>
      </table>
	  </form>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA TEMPERATURA CAMARAS
****************************************************************************************************************************************** -->



		</div>
		<div id="headline">

          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p><p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
		</div>
		<div id="body">
			
		</div>
	</div>
<? require"rodape.php"; ?>
</body>
</html>
