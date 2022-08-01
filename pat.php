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
        <script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->
 <script>
	jQuery(function($){
	       $("#campoData").mask("99/99/9999");
		   $("#campoHora").mask("99:99");	   
	       $("#campoPlaca").mask("aaa-9999");
	});
	</script>


<!-- ************************************************************************************************************************************* 
												MENU
****************************************************************************************************************************************** -->
<div id="headline">
<h2>
<p>PAT - Planilha de avaliação de transporte</p>
</h2>
<!-- ************************************************************************************************************************************* 
											FIM MENU 
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad" and $pat_inclui == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/pat.php?funcao=cad" >
     <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td></td>
 <table width="" border="2" align="center" id="tbcad">    
   <tr>
   	<td align="right">Data:</td>
   	<td align="left">
      <input name="data" type="text" id="data1" value="<? echo $data_atual;?>" size="9" maxlength="10" /></td>
      <td align="right">Placa</td>
     <td align="left"><input type="text" name="placa" id="" maxlength="30" size="5" /></td>
   </tr>
   <tr>
     
     <td><div align="right">Motorista.:</div></td>
     <td colspan="3" align="left"><input type="text" name="motorista" id="motorista" maxlength="30" size="40" /></td>
   </tr>
   <tr>  
     <td colspan="2">
     <p>Tipo</p>
     <select name="tipo" size="1" id="tipo">
     	  <option value="ORIGEM" >CHEGADA</option>
     	  <option value="DESTINO" selected="selected">SAÍDA</option>
        </select>
     </td>
     <td colspan="2">
     <p>Origem / Destino:</p>
     <input type="text" name="origem" id="origem" maxlength="30" size="40" /></td>
   </tr>
   <tr>  
     <td><div align="right">Cabine Limpa:</div></td>
     <td>
     	<select name="cabine_limpeza" size="1" id="cabine_limpeza">
     	  <option value="0" >NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="cabine_limpeza_obs" cols="20" id="cabine_limpeza_obs"></textarea></td>
   </tr>
   <tr>  
     <td><div align="right">Cabine Integridade:</div></td>
     <td>
     	<select name="cabine_integridade" size="1" id="cabine_integridade">
     	  <option value="0" >NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="cabine_integridade_obs" cols="20" id="cabine_integridade_obs"></textarea></td>
   </tr>
     <tr>  
     <td><div align="right">Bau Limpo:</div></td>
     <td>
     	<select name="bau_limpeza" size="1" id="bau_limpeza">
     	  <option value="0" >NC</option>
     	  <option value="1"selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="bau_limpeza_obs" cols="20" id="bau_limpeza_obs"></textarea></td>
    </tr>
    <tr>  
     <td><div align="right">Bau Integridade:</div></td>
     <td>
     	<select name="bau_integridade" size="1" id="bau_integridade">
     	  <option value="0">NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="bau_integridade_obs" cols="20" id="bau_integridade_obs"></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Pneus:</div></td>
     <td>
     	<select name="pneu" size="1" id="pneu">
     	  <option value="0">NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="pneu_obs" cols="20" id="pneu_obs"></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Uniforme Completo:</div></td>
     <td>
     	<select name="uniforme_completo" size="1" id="uniforme_completo">
     	  <option value="0">NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="uniforme_completo_obs" cols="20" id="uniforme_completo_obs"></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Uniforme Limpo:</div></td>
     <td>
     	<select name="uniforme_limpo" size="1" id="uniforme_limpo">
     	  <option value="0">NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="uniforme_limpo_obs" cols="20" id="uniforme_limpo_obs"></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Asseio Corporal:</div></td>
     <td>
     	<select name="asseio" size="1" id="asseio">
     	  <option value="0">NC</option>
     	  <option value="1" selected="selected">C</option>
        </select>
     </td> 
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="asseio_obs" cols="20" id="asseio_obs"></textarea></td>
     </tr>
	 <tr>
		 <td><div align="right">Comportamento:</div></td>
		 <td>
			<select name="comportamento" size="1" id="comportamento">
			  <option value="0">NC</option>
			  <option value="1" selected="selected">C</option>
			</select>
		 </td>
		 <td><div align="right">OBS.:</div></td>
		 <td><textarea name="comportamento_obs" cols="20" id="comportamento_obs"></textarea></td>
	 </tr>
	 <tr>
		 <td><div align="right">Possui certificado de <br />controle de pragas?</div></td>
		 <td>
			<select name="certificado_pragas" size="1" id="certificado_pragas">
			  <option value="0">NC</option>
			  <option value="1" selected="selected">C</option>
			</select>
		 </td>
		 <td><div align="right">OBS.:</div></td>
		 <td><textarea name="certificado_pragas_obs" cols="20" id="certificado_pragas_obs"></textarea></td>
	 </tr>
   </tr>
   <tr>
   	<td><div align="right">PLANO DE AÇÃO.:</div></td>
     <td colspan="3"><textarea name="obs" cols="40" id="obs"></textarea></td>
   </tr>
   <tr>
   
     <td colspan="6"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
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
	if ($pg == "alt" and $pat_consulta == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Altera</h1>

<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM pat where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		 
	 <form id="frmcadastro" name="frmcadastro" method="post"<? if ($pat_altera == 1){?> action="" <? }?> >
<table width="" border="2" align="center" id="tbcad">    
   <tr>
   	<td align="right">Data:</td>
   	<td align="left" >
      <input name="data" type="text" id="data" value="<? echo converte_data($linha['data_pat']);?>" size="9" maxlength="10" readonly="readonly" /></td>
     <td align="left" colspan="2">
 	 Placa.:<input type="text" name="placa" id="campoPlaca" value="<? echo $linha['placa'];?>" maxlength="30" size="5" readonly="readonly" /></td>
   </tr>
   <tr>
     
     <td><div align="right">Motorista.:</div></td>
     <td colspan="3" align="left"><input type="text" name="motorista" id="motorista" value="<? echo utf8_encode($linha['motorista']);?>" maxlength="30" size="40" readonly="readonly" /></td>
   </tr>
   <tr>  
     <td colspan="2">
     <p>Tipo</p>
     <select name="tipo" size="1" id="tipo">
     	  <option value="ORIGEM" <? if ($linha['tipo'] == "CHEGADA"){?> selected="selected"<? }?>>CHEGADA</option>
     	  <option value="DESTINO" <? if ($linha['tipo'] == "SAIDA"){?> selected="selected"<? }?>>SAÍDA</option>
        </select>
     </td>
     <td colspan="2">
     <p>Origem / Destino:</p>
     <input type="text" name="origem" id="origem" value="<? echo utf8_encode($linha['origem']);?>" maxlength="30" size="40" readonly="readonly" /></td>
   </tr>
   <tr>  
     <td><div align="right">Cabine Limpa:</div></td>
     <td>
     	<select name="cabine_limpeza" size="1" id="cabine_limpeza">
     	  <option value="0" <? if ($linha['cabine_limpeza'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['cabine_limpeza'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="cabine_limpeza_obs" cols="20" id="cabine_limpeza_obs"><? echo utf8_encode($linha['cabine_limpeza_obs']);?></textarea></td>
   </tr>
   <tr>  
     <td><div align="right">Cabine Integridade:</div></td>
     <td>
     	<select name="cabine_integridade" size="1" id="cabine_integridade">
     	  <option value="0" <? if ($linha['cabine_integridade'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['cabine_integridade'] == "1"){?> selected="selected"<? }?>>C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="cabine_integridade_obs" cols="20" id="cabine_integridade_obs"><? echo utf8_encode($linha['cabine_integridade_obs']);?></textarea></td>
   </tr>
     <tr>  
     <td><div align="right">Bau Limpo:</div></td>
     <td>
     	<select name="bau_limpeza" size="1" id="bau_limpeza">
     	  <option value="0"  <? if ($linha['bau_limpeza'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['bau_limpeza'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="bau_limpeza_obs"  cols="20" id="bau_limpeza_obs"><? echo utf8_encode($linha['bau_limpeza_obs']);?></textarea></td>
    </tr>
    <tr>  
     <td><div align="right">Bau Integridade:</div></td>
     <td>
     	<select name="bau_integridade" size="1" id="bau_integridade">
     	  <option value="0" <? if ($linha['bau_integridade'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['bau_integridade'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="bau_integridade_obs" cols="20" id="bau_integridade_obs"><? echo utf8_encode($linha['bau_integridade_obs']);?></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Pneus:</div></td>
     <td>
     	<select name="pneu" size="1" id="pneu">
     	  <option value="0" <? if ($linha['pneu'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['pneu'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="pneu_obs"  cols="20" id="pneu_obs"><? echo utf8_encode($linha['pneu_obs']);?></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Uniforme Completo:</div></td>
     <td>
     	<select name="uniforme_completo" size="1" id="uniforme_completo">
     	  <option value="0" <? if ($linha['uniforme_completo'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['uniforme_completo'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="uniforme_completo_obs"  cols="20" id="uniforme_completo_obs"><? echo utf8_encode($linha['uniforme_completo_obs']);?></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Uniforme Limpo:</div></td>
     <td>
     	<select name="uniforme_limpo" size="1" id="uniforme_limpo">
     	  <option value="0" <? if ($linha['uniforme_limpo'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['uniforme_limpo'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td>
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="uniforme_limpo_obs"  cols="20" id="uniforme_limpo_obs"><? echo utf8_encode($linha['uniforme_limpo_obs']);?></textarea></td>
     </tr>
     <tr>  
     <td><div align="right">Asseio Corporal:</div></td>
     <td>
     	<select name="asseio" size="1" id="asseio">
     	  <option value="0" <? if ($linha['asseio'] == "0"){?> selected="selected"<? }?> >NC</option>
     	  <option value="1" <? if ($linha['asseio'] == "1"){?> selected="selected"<? }?> >C</option>
        </select>
     </td> 
     <td><div align="right">OBS.:</div></td>
     <td><textarea name="asseio_obs"  cols="20" id="asseio_obs"><? echo utf8_encode($linha['asseio_obs']);?></textarea></td>
     </tr>
     <tr>
		 <td><div align="right">Comportamento:</div></td>
		 <td>
			<select name="comportamento" size="1" id="comportamento">
			  <option value="0" <? if ($linha['comportamento'] == "0"){?> selected="selected"<? }?> >NC</option>
			  <option value="1" <? if ($linha['comportamento'] == "1"){?> selected="selected"<? }?> >C</option>
			</select>
		 </td>
		 <td><div align="right">OBS.:</div></td>
		 <td><textarea name="comportamento_obs"  cols="20" id="comportamento_obs"><? echo utf8_encode($linha['comportamento_obs']);?></textarea></td>
     </tr>
	 <tr>
		 <td><div align="right">Possui certificado de <br />controle de pragas?</div></td>
		 <td>
			<select name="certificado_pragas" size="1" id="certificado_pragas">
			  <option value="0" <? if ($linha['certificado_pragas'] == "0"){?> selected="selected"<? }?> >NC</option>
			  <option value="1" <? if ($linha['certificado_pragas'] == "1"){?> selected="selected"<? }?> >C</option>
			</select>
		 </td>
		 <td><div align="right">OBS.:</div></td>
		 <td><textarea name="certificado_pragas_obs" cols="20" id="certificado_pragas_obs"><? echo utf8_encode($linha['certificado_pragas_obs']);?></textarea></td>
	 </tr>
   </tr>
   <tr>
   	<td><div align="right">PLANO DE AÇÃO.:</div></td>
     <td colspan="3"><textarea name="obs"  cols="40" id="obs"><? echo utf8_encode($linha['obs']);?></textarea></td>
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
if ($pg == "consulta" and $pat_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="pat.php?pg=consulta" method="post" enctype="multipart/form-data">
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
	$sql_filtro = mysql_query("SELECT DISTINCT transporte_id FROM pat ORDER BY transporte_id ");
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
<form action="include/pat.php?funcao=exclui" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($pat_altera == "1" or $pat_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="5%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" rowspan="2" id="th_mercado">TIPO.&nbsp;</th>
    <th width="5%" rowspan="2" id="th_mercado">DATA.&nbsp;</th>
    <th width="10%" rowspan="2" id="th_mercado">PLACA.&nbsp;</th>
    <th width="25%" rowspan="2" id="th_mercado">ORIGEM.&nbsp;</th>
    <th width="25%" rowspan="2" id="th_mercado">MOTORISTA.&nbsp;</th>
    <th width="30%" rowspan="2" id="th_mercado">PLANO DE AÇÃO.&nbsp;</th>
  </tr>
  <tr>
  	<th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
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
	$sql = mysql_query("SELECT * FROM pat WHERE data_pat BETWEEN ('$filt1') AND ('$filt2')  AND  transporte_id = '$placa_filt' ORDER BY data_pat DESC  ");	
	}
	if($placa_filt == 0 and $motorista_filt == 0 ){		
	$sql = mysql_query("SELECT * FROM pat WHERE data_pat BETWEEN ('$filt1') AND ('$filt2')  ORDER BY data_pat DESC  ");
	}
	// Fim teste 

$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
$nao_conforme_parcial = "0";
while($linha = mysql_fetch_array($sql)){
	if(	$linha['cabine_limpeza'] == "0" or 
		$linha['cabine_integridade'] == "0" or 
		$linha['bau_limpeza'] == "0" or 
		$linha['bau_integridade'] == "0" or 
		$linha['pneu'] == "0" or 
		$linha['uniforme_completo'] == "0" or 
		$linha['uniforme_limpo'] == "0" or 
		$linha['asseio'] == "0" or 
		$linha['comportamento'] == "0")
	{$nao_conforme_parcial = "1";}	
	
?>
    <tr>
		<?	if ($pat_exclui == "1" or $pat_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($pat_exclui == "1"){?>
                	<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? }?>
                <? if ($pat_altera == "1"){?>
                	<a href="pat.php?pg=alt&id=<? echo $linha['id'] ?>"><img src="images/Artistica/search.png" alt="altera" width="20px" /></a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td <? if($nao_conforme_parcial == "1"){?> id="destaque_vermelho" <? }?>>	<? echo utf8_encode($linha['tipo']); ?></td>
    <td <? if($nao_conforme_parcial == "1"){?> id="destaque_vermelho" <? }?>>	<? echo converte_data($linha['data_pat']); ?></td>
    <td <? if($nao_conforme_parcial == "1"){?> id="destaque_vermelho" <? }?>>	<? echo utf8_encode($linha['placa']); ?></td>
	<td <? if($nao_conforme_parcial == "1"){?> id="destaque_vermelho" <? }?>>	<? echo utf8_encode($linha['origem']); ?></td>
    <td <? if($nao_conforme_parcial == "1"){?> id="destaque_vermelho" <? }?>>	<? echo utf8_encode($linha['motorista']); ?></td> 
    <td <? if($nao_conforme_parcial == "1"){?> id="destaque_vermelho" <? }?>>	<? echo utf8_encode($linha['obs']); ?></td>     
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 $nao_conforme_parcial = "0";
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
      <th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
    <th id="th_mercado" colspan="6">&nbsp;
	<? echo "Total: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;|
    </th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


<? 

}?>
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
