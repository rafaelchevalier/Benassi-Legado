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
<h2><p>RNC - Relatório de não Conformidade</p></h2>
<!-- ************************************************************************************************************************************* 
											CADASTRO Aferição Balança
****************************************************************************************************************************************** -->
<? 
	if ($pg == "cad" /*and $rnc_inclui == "1"*/) {//Cadastro Temperatura Camaras?>

<h1>Cadastro</h1> 
<form id="frmcadastro" name="frmcadastro" method="post" action="include/rnc.php?funcao=cad&qt=<? echo $qt?>" >
     <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td></td>
  <table width="" border="0" cellspacing="0" align="center" id="tbcad">    
    <tr>
      <th rowspan="2">CARACTERÍSTICAS</th>
      <th>NÚMERO</th>
      <th>DATA</th>
      <th>TIPO</th>
      <th>PROCESSO</th>
    </tr>
    <tr>
      <td><input required name="num_rnc" id="num_rnc" maxlength="255" size="15" /><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
      <td>
        <input required name="data_rnc" id="data_10" value="<? echo $data_atual; ?>" size="15" maxlength="10" readonly="readonly" />
        <img src="images/exc.png" width="20" alt="Campo Obrigatório" />
      </td>
      <td>
        <select name="tipo" id="tipo">
          <option value="potencial">Potencial</option>
          <option value="existente">Existente</option>
        </select>       
        <img src="images/exc.png" width="20" alt="Campo Obrigatório" />
      </td>
      <td><input required name="processo" id="processo" maxlength="255" size="15" /><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
    </tr>
    <tr>
     <th>DESCRIÇÃO</th>
     <td colspan="4" align="left"><textarea name="descricao" cols="80" rows="4" id="descricao"></textarea></td>
   </tr>
   <tr>
     <th>DISPOSIÇÃO</th>
     <td colspan="4" align="left"><textarea name="disposicao" cols="80" rows="2" id="disposicao"></textarea></td>
   </tr>
   <tr>
     <th>CAUSA</th>
     <td colspan="4" align="left"><textarea name="causa" cols="80" rows="2" id="causa"></textarea></td>
   </tr>
   <!-- *************************** AÇÃO CORRETIVA *****************************-->
    <tr>
   		<th colspan="5">AÇÃO CORRETIVA</th>
    </tr>
    <tr>
      <th>DATA</th>
      <th>RESPONSÁVEL</th>
      <th colspan="3">DESCRIÇÃO</th>
    </tr>
    <tr>
      <th colspan="5">Todos os campos na mesma linha da ação corretiva deve ser prenchido. Caso um dos campos fique em branco o sistema não gravará no banco de dados a linha toda. </th>
    </tr>
   
   <? $qt = 0;
    if ($_GET['qt'] =="" or $_GET['qt'] > "40" ){$_GET['qt'] = 5; }
   for($i=0; $i < $_GET['qt']; $i++){
	$qt ++;
	
   ?>
   
   <tr>
     <td><input name="data_acao<? echo $i?>" type="text" id="data<? echo $i?>" maxlength="10" readonly="readonly" /></td>
     <td><input name="responsavel<? echo $i?>" id="responsavel<? echo $i?>" maxlength="13" size="20" /></td>
     <td colspan="3"><textarea name="descricao<? echo $i?>" cols="40" id="descricao<? echo $i?>"></textarea></td>
   </tr>
   <? }?>
   
   <!-- *************************** FIM AÇÃO CORRETIVA *****************************-->
   <tr>
     <th rowspan="2">EFICÁCIA</th>
     <th>DECISÃO</th>
     <th>DATA</th>
     <th>RESPONSÁVEL</th>
     <th>NOVO RNC</th>
   </tr>
   <tr>
     <td><textarea name="eficiencia_decisao" cols="20" id="eficiencia_decisao"></textarea></td>
     <td><input name="eficiencia_data" type="text" id="data_11" value="" size="20" maxlength="10" /></td>
     <td><input name="eficiencia_responsavel" id="eficiencia_responsavel" maxlength="255" size="20" /></td>
     <td><input name="eficiencia_novo_rnc" id="eficiencia_novo_rnc" maxlength="255" size="20" /></td>
   </tr>
   <tr>
     <td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   
   <tr>
     <td colspan="5"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
 </table>
</form>	
<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											ALTERA Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "alt" and $rnc_consulta == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Altera</h1>

<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM rnc where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		 
	 <form id="frmcadastro" name="frmcadastro" method="post"<? if ($rnc_altera == 1){?> action="include/rnc.php?funcao=alt&id=<? echo $id ?>" <? }?> >
      <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td></td>
 <table width="" border="0" cellspacing="0" align="center" id="tbcad">    
   <tr>
     <th rowspan="2">CARACTERÍSTICAS</th>
     <th>NÚMERO</th>
     <th>DATA</th>
     <th>TIPO</th>
     <th>PROCESSO</th>
   </tr>
   <tr>
    
     <td><input name="num_rnc" id="num_rnc" value="<? echo $linha['num_rnc']?>" size="15" maxlength="255" readonly="readonly" /><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
     <td>
     <input name="data_rnc" id="data23" value="<? echo converte_data($linha['data_rnc']); ?>" size="15" maxlength="10" readonly="readonly" />
     <img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
     <td>
     	<select name="tipo" id="tipo">
         <option value="potencial"<? if($linha['tipo'] == "potencial"){?> selected="selected" <? }?>>Potencial</option>
         <option value="existente"<? if($linha['tipo'] == "existente"){?> selected="selected" <? }?> >Existente</option>
       </select><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
     <td><input name="processo" id="processo" maxlength="255" value="<? echo utf8_encode($linha['processo'])?>" size="15" /><img src="images/exc.png" width="20" alt="Campo Obrigatório" /></td>
   </tr>
   <tr>
     <th>DESCRIÇÃO</th>
     <td colspan="4" align="left"><textarea name="descricao" cols="80" rows="4" id="descricao"><? echo utf8_encode($linha['descricao'])?></textarea></td>
   </tr>
   <tr>
     <th>DISPOSIÇÃO</th>
     <td colspan="4" align="left"><textarea name="disposicao" cols="80" rows="2" id="disposicao"><? echo utf8_encode($linha['disposicao'])?></textarea></td>
   </tr>
   <tr>
     <th>CAUSA</th>
     <td colspan="4" align="left"><textarea name="causa" cols="80" rows="2" id="causa"><? echo utf8_encode($linha['causa'])?></textarea></td>
   </tr>
   <!-- *************************** AÇÃO CORRETIVA *****************************-->
   <tr>
   		<th colspan="5">AÇÃO CORRETIVA</th>
   </tr>
   <tr>
     <th>DATA</th>
     <th>RESPONSÁVEL</th>
     <th colspan="3">DESCRIÇÃO</th>
   </tr>
   <tr>
     <th colspan="5">Todos os campos na mesma linha da ação corretiva deve ser prenchido. Caso um dos campos fique em branco o sistema não gravará no banco de dados a linha toda. </th>
   </tr>
   
   <? 
	$num_rnc = $linha['num_rnc'];
		$sql_acao = mysql_query("SELECT * FROM acao_rnc where num_rnc='$num_rnc' ");
		while($linha_acao = mysql_fetch_array($sql_acao)){
			$i ++;
   ?>
   
   <tr>
     <td>
     <input name="id_item_alt<? echo $i?>" type="hidden" value="<? echo $linha_acao['id'];?>" />
     <input name="data_acao_alt<? echo $i?>" type="text" id="data<? echo $i?>" value="<? echo converte_data($linha_acao['data_acao'])?>" maxlength="10" readonly="readonly" /></td>
     <td><input name="responsavel_alt<? echo $i?>" value="<? echo utf8_encode($linha_acao['responsavel'])?>" maxlength="13" size="20" /></td>
     <td colspan="3"><textarea name="descricao_alt<? echo $i?>" cols="60" id="descricao<? echo $i?>"><? echo utf8_encode($linha_acao['descricao'])?></textarea></td>
   </tr>
   <? }?>
   <? 
    if ($_GET['qt'] =="" or $_GET['qt'] > "40" ){$_GET['qt'] = 5; }
   for($e=0; $e < $_GET['qt']; $e++){
	$qt ++;
	
   ?>
    <tr>
		<td>
			<input name="data_acao<? echo $e?>" id="data<? echo $e?>" type="text" maxlength="10" readonly="readonly" />
		</td>
		<td>
			<input name="responsavel<? echo $e?>" maxlength="13" size="20" />
		</td>
		<td colspan="3">
			<textarea name="descricao<? echo $e?>" cols="40"></textarea>
		</td>
   </tr>
   <? }?>
   <!-- *************************** FIM AÇÃO CORRETIVA *****************************-->
   <tr>
     <th rowspan="2">EFICÁCIA</th>
     <th>DECISÃO</th>
     <th>DATA</th>
     <th>RESPONSÁVEL</th>
     <th>NOVO RNC</th>
   </tr>
   <tr>
     <td><textarea name="eficiencia_decisao" cols="20" id="eficiencia_decisao"><? echo $linha['eficiencia_decisao']?></textarea></td>
     <td><input name="eficiencia_data" type="text" id="data24" value="<? echo converte_data($linha['eficiencia_data'])?>" size="20" maxlength="10" readonly="readonly" /></td>
     <td><input name="eficiencia_responsavel" id="eficiencia_responsavel" value="<? echo $linha['eficiencia_responsavel']?>" maxlength="255" size="20" /></td>
     <td><input name="eficiencia_novo_rnc" id="eficiencia_novo_rnc" value="<? echo $linha['eficiencia_novo_rnc']?>"maxlength="255" size="20" /></td>
   </tr>
   <tr>
     <td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>
   </tr>
   
   <tr>
     <td colspan="5"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
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
if ($pg == "consulta" and $rnc_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->


<form action="rnc.php?pg=consulta" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
    <td width="110" align="right">Data Inicial</td>
    <td width="87"><input name="data1" type="text" id="data1" 
	<? if($_POST['data1'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data1'] != ""){?>value="<? echo $_POST['data1'];?>" <? } ?>
    size="9" maxlength="10" readonly="readonly" ></td>
    <td width="180" align="right">Data Final</td>
    <td width="165"><input name="data2" type="text" id="data2" 
    <? if($_POST['data2'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data2'] != ""){?>value="<? echo $_POST['data2'];?>" <? } ?>
    size="9" maxlength="10" readonly="readonly"></td>
  </tr>
  <tr>
    <td align="right">Número</td>
    <td colspan="3" align="left"><select name="periodo" size="1" id="periodo">
      <option value="0" selected="selected">Todas</option>
      <? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT num_rnc FROM rnc ORDER BY num_rnc");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
      <? if ($linha_filtro['num_rnc'] != ""){?>
      <option value="<? echo $linha_filtro['num_rnc'] ?>" multiple="multiple" ><? echo utf8_encode($linha_filtro['num_rnc']) ?></option>
      <? }}?>
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

 <table width="100%" border="0" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($rnc_altera == "1" or $rnc_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" id="th_mercado">DATA.&nbsp;</th>
    <th width="5%" id="th_mercado">NUMERO.&nbsp;</th>
    <th width="5%" id="th_mercado">TIPO.&nbsp;</th>
    <th width="5%" id="th_mercado">PROCESSO.&nbsp;</th>
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
	$sql = mysql_query("SELECT * FROM rnc WHERE data_rnc BETWEEN ('$filt1') AND ('$filt2')  AND  transporte_id = '$placa_filt' ORDER BY data_rnc DESC  ");	
	}
	if($placa_filt == 0 and $motorista_filt == 0 ){		
	$sql = mysql_query("SELECT * FROM rnc WHERE data_rnc BETWEEN ('$filt1') AND ('$filt2')  ORDER BY data_rnc DESC  ");
	}
	// Fim teste 

$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($rnc_exclui == "1" or $rnc_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td  <? if ( $linha['eficiencia_decisao'] == ""){ ?> id="destaque_vermelho"<? }?>> 
                <? if ($rnc_exclui == "1"){?>
                	<a href="include/rnc.php?funcao=exclui&id=<? echo $linha['id'] ?>"><img src="images/Mini/delete_notes.png" width="20px" alt="Excluir"   /></a>
                <? }?>
                <? if ($rnc_altera == "1"){?>
                	<a href="rnc.php?pg=alt&id=<? echo $linha['id'] ?>"><img src="images/Mini/approve_notes.png" width="20px" alt="Altera"   /></a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="5%" <? if ( $linha['eficiencia_decisao'] == ""){ ?> id="destaque_vermelho"<? }?>>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_rnc']); ?>&nbsp;&nbsp;&nbsp;</td>
	<td width="5%" <? if ( $linha['eficiencia_decisao'] == ""){ ?> id="destaque_vermelho"<? }?>>&nbsp;&nbsp;&nbsp;<? echo $linha['num_rnc']; ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%" <? if ( $linha['eficiencia_decisao'] == ""){ ?> id="destaque_vermelho"<? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['tipo']); ?>&nbsp;&nbsp;&nbsp;</td> 
    <td width="5%" <? if ( $linha['eficiencia_decisao'] == ""){ ?> id="destaque_vermelho"<? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['processo']); ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="9">&nbsp;
	<? echo "Total: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;|
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
