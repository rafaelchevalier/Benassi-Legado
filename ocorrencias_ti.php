<?
session_start();
require"topo.php";
require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require"include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require"js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$nome_usuario_logado = $_SESSION['nome_usuario'];
$hora_atual = date("H:i:s");
?>
<!-- Inicio Link para funcionar a exemplo-calendario.js -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->
		<div id="headline">

<!-- ************************************************************************************************************************************* 
											ABRE OCORRENCIAS TI
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_ocorrencias" and $filt_ocorrencia_ti_inclui == "1") {//Abertura de Chamado?>
    
<h2>Abertura Ocorrências TI</h2> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/ocorrencias_ti.php?funcao=cad_ocorrencias_ti" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td width="124"><div align="right">Nome Completo:</div></td>
     <td width="192" align="left">	
        <input type="text" name="nome" id="cadnome" value="<? echo utf8_encode($nome_usuario_logado);?>" maxlength="30" size="31" readonly="readonly"  />
     
   		<input type="hidden" name="email_usuario" id="cademail_usuario" value="<? echo $_SESSION['email_usuario'];?>" maxlength="255" size="31" readonly="readonly"  />	  

     </td>
   </tr>
   <tr>
     <td><div align="right">Fornecedor.:</div></td>
     <td align="left"><label for="fornecedor"></label>
       <select name="fornecedor" id="fornecedor">
         <option value="EBCI">EBCI</option>
         <option value="Neogrid">Neogrid</option>
         <option value="MYSOFT">Mysoft</option>
		 <option value="INTERNO">Interno</option>
       </select></td>
   </tr>
   <tr>
   	 <td><div align="right">Serviço</div></td>
     <td align="left">
     <select name="servico" size="1" id="servico"> 
     <option value="LINK INTERNET">LINK INTERNET</option>  
     <option value="EDI">EDI</option>
     <option value="SISTEMA_WEB">SISTEMA WEB</option>
     <option value="SISTEMA LOCAL">SISTEMA LOCAL</option>
     <option value="BD">BANCO DE DADOS</option>
	 <option value="REDE">REDE</option>
	 <option value="SERVIDOR">SERVIDOR</option>
    </select>  
	  </td>
      <tr>
      	<td>Data Erro: <br />
   	    <input name="data_erro" type="text" id="data1" value="<? echo $data_atual;?>" size="9" maxlength="10" readonly="readonly" /></td>
        <td>Hora Erro: <br />
        <input name="hora_erro" type="text" id="hora1" value="<? echo $hora_atual;?>" size="9" maxlength="8" />
        </td>
      
      </tr>
      <tr>
      	<td>Data Solução: <br />
   	    <input name="data_solucao" type="text" id="data2" value="<? echo $data_atual;?>" size="9" maxlength="10" readonly="readonly" /></td>
        <td>Hora Solução: <br />
        <input name="hora_solucao" type="text" id="hora2" value="<? echo $hora_atual;?>" size="9" maxlength="8" />
        </td>
      
      </tr>
   </tr>
   <tr>
     <td><div align="right">Descrição Erro:</div></td>
     <td><textarea name="descricao" cols="26" rows="10"></textarea></td>
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
											FIM ABRE OCORRENCIAS TI
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA OCORRENCIAS TI
EXIBE OCORRENCIAS DE FALHAS EM SERVIÇOS RELÁCIONADOS A TI, COMO INTERNET
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta_ocorrencias"  and $filt_ocorrencia_ti_consulta = "1" ) {//Consulta Temperatura Camaras 
?>

<h2>Consulta Ocorrências TI</h2> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="ocorrencias_ti.php?pg=consulta_ocorrencias" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
    <td width="110" align="right">Data Inicial</td>
    <td width="87"><input name="data1" id="data1" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10" ></td>
    <td width="180" align="right">Data Final</td>
    <td width="165"><input name="data2" id="data2" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10"></td>
  </tr>
  <tr>
    <td align="right">Empresa</td>
    <td colspan="3" align="left"><select name="fornecedor" size="1" id="fornecedor">
      					<option value="0" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de empresa lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT fornecedor FROM ocorrencias_ti ORDER BY fornecedor ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['fornecedor'] != ""){?>
    <option value="<? echo $linha_filtro['fornecedor'] ?>" multiple ><? echo utf8_encode($linha_filtro['fornecedor']) ?></option>
       <? }}?>
    </select></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="btfiltro1" id="btfiltro1" value="Filtrar" /><input type="reset" name="btlimpar" id="btlimpar" value="Limpar" /></td>
 
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
<form action="include/ocorrencias_ti.php?funcao=exclui_varios" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  
	<tr>
		<? if ($filt_ocorrencia_ti_altera == "1" or $filt_ocorrencia_ti_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="5%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?> 
    <th width="5%" rowspan="2" id="th_mercado">DATA ERRO.&nbsp;</th>
    <th width="5%" rowspan="2" id="th_mercado">HORA ERRO.&nbsp;</th>
    <th width="10%" rowspan="2" id="th_mercado">EMPRESA.&nbsp;</th>
	<th width="10%" rowspan="2" id="th_mercado">SERVIÇO .&nbsp;</th>
    <th width="55%" rowspan="2" id="th_mercado">DESCRIÇÃO ERRO.&nbsp;</th>
    <th width="5%" rowspan="2" id="th_mercado">DATA SOLUÇÃO.&nbsp;</th>
    <th width="5%" rowspan="2" id="th_data_cont">HORA SOLUÇÃO.&nbsp;</th>
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
$fornecedor_filt = $_REQUEST['fornecedor'];
	//Consulta banco entre datas
	if($fornecedor_filt == 0){
	$sql = mysql_query("SELECT * FROM ocorrencias_ti WHERE data_erro BETWEEN ('$filt1') AND ('$filt2') ORDER BY data_erro DESC");	
	}
	if($fornecedor_filt != 0){
	$sql = mysql_query("SELECT * FROM ocorrencias_ti WHERE data_erro BETWEEN ('$filt1') AND ('$filt2') AND fornecedor = '$fornecedor_filt' ORDER BY data_erro DESC");	
	}
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
 echo "Período:&nbsp;", converte_data($filt1), "  &nbsp;&nbsp;-->&nbsp;&nbsp;  ", converte_data($filt2); 
while($linha = mysql_fetch_array($sql)){
		
?>
    	 <tr>
		<?	if ($filt_ocorrencia_ti_altera == "1" or $filt_ocorrencia_ti_exclui == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td> 
                <? if ($filt_ocorrencia_ti_exclui == "1"){?>
                	<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? }?>
                <? if ($filt_ocorrencia_ti_altera == "11"){?>
                	<a href="tempcam.php?pg=altera_ocorrencia_ti&id=<? echo $linha['id'] ?>">Alterar&nbsp;&nbsp;</a>
                <? }?>
                </td> 
		<? }//Fim filtro botões apenas para usuários master ?>

    <td>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_erro']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo $linha['hora_erro'] ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['fornecedor']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['servico']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['descricao']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_solucao']) ?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<? echo $linha['hora_solucao'] ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	  
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="8">&nbsp;<? echo "Total:", $quantidade_filt," (Ocorrências Registrado)  Período:&nbsp;", converte_data($filt1), "  &nbsp;&nbsp;-->&nbsp;&nbsp;  ", converte_data($filt2); ?>&nbsp;</th>
    

  </tr>
      </table>
      </form>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA OCORRENCIAS TI
****************************************************************************************************************************************** -->
		</div>
		<div id="body">
			
		</div>
	</div>
<? require"rodape.php"; ?>
</body>
</html>
