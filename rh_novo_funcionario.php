<?
session_start();
require "topo.php";
//require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
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
<h2><p>Novo Funcionário </p></h2>
<!-- ************************************************************************************************************************************* 
											CADASTRO MULTI Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_multi" and $filt_rh_inclui == 1) {//Cadastro ?>
    
    <h2><p>Quantidade funcionarios</p></h2>  	 
<form id="frmleitura" name="frmleitura" method="post"action="rh_novo_funcionario.php?pg=cad">
 		 <table width="" border="0" cellspacing="0" align="center" id="tbcad">
   <tr>
   <tr>  
     <td><div align="right">Quantidade::</div></td>
     <td><input type="text" name="qt" id="qt" maxlength="30" size="10" /></td>
   </tr>
     <td colspan="2"><div align="center">
       <input type="submit" />
     </div></td>
   </tr>
 </table>
  </form>
    
  <? } ?>
		
		<? 
	if ($pg == "cad" and $filt_rh_inclui == 1) {//Cadastro?>

    
    
<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/rh_novo_funcionario.php?funcao=cad&qt=<? echo $qt;?>" >
<table width="" border="2" align="center" id="tbcad">
	<tr>
		<td width="62">
			<div align="right">Data Contratação.:</div>
		</td>
		<td align="left" colspan="8">
			<input name="data" type="text" size="10" maxlength="10" readonly="readonly" <? if($geral_libera_data == 1) {?>id="data1" <? }?>value="<? echo $data_atual?>" <? if($geral_libera_data != 1) {?>readonly="readonly"<? }?>  />
		</td>
	</tr>
	<tr>
		<th colspan="1">NOME COMPLETO:</th>
		<th colspan="1">EMPRESA:</th>
		<th colspan="1">FUNÇÃO:</th>
		<th colspan="1">SETOR:</th>
		<th colspan="1">SUPERIOR:</th>
		<th colspan="1">SISTEMA:</th>
		<th colspan="1">EMAIL:</th>
		<th colspan="1">TIPO:</th>
	</tr>
   
   <? $qt = 0;
    if ($_POST['qt'] =="" or $_POST['qt'] > "40" ){$_POST['qt'] = 5; }
   for($i=0; $i < $_POST['qt']; $i++){
	$qt ++;
   ?>  
	<tr>
		<td>
			<input name="nome<? echo $i?>" size="20" maxlength="100" />
		</td>	
		<td colspan="1">
			<select name="loja<? echo $i?>" size="1" id="loja">
				<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
				$sql_empresa = mysql_query("SELECT * FROM lojas ORDER BY loja  ");
				$cont_empresa = mysql_num_rows($sql_empresa);
				while($linha_empresa = mysql_fetch_array($sql_empresa)){ 
				?>
				<option value="<? echo utf8_encode($linha_empresa['id']) ?>" multiple ><? echo utf8_encode($linha_empresa['loja']) ?></option>
				<? }?> 	   
			</select>
		</td>
		<td>
			<input name="funcao<? echo $i?>" size="20" maxlength="50" />
		</td>
		<td>
			<input name="setor<? echo $i?>" size="20" maxlength="50" />
		</td>
		<td>
			<input name="superior<? echo $i?>" size="20" maxlength="50" />
		</td>
		<td colspan="1" align="center">
			<label for="sistema">SIM</label>
			<input type="radio" name="sistema<? echo $i?>" id="situacao" value="1" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="sistema">NÃO</label>
			<input type="radio"  name="sistema<? echo $i?>" id="situacao" value="0" />  
		</td>
		<td colspan="1" align="center">
			<label for="rm">SIM</label>
			<input type="radio" name="email<? echo $i?>" id="situacao" value="1" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="rm">NÃO</label>
			<input type="radio"  name="email<? echo $i?>" id="situacao" value="0" />  
		</td>
		<td colspan="1" align="center">
			<select name="tipo<? echo $i?>" size="1" id="tipo">
				<option value="NOVO">NOVO</option>
				<option value="SUBSTITUIÇÃO">SUBSTITUIÇÃO</option>
			</select>
		</td>
	</tr>
   <? }?>
   <tr>
     <td colspan="6"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO MULTI 
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											ALTERA 
****************************************************************************************************************************************** -->
<? 
	if ($pg == "alt" and $filt_rh_altera == "1") {//Altera ?>
<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA 
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta" and $filt_rh_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="rh_novo_funcionario.php?pg=consulta" method="post" enctype="multipart/form-data">
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
    <td colspan="4" align="center"><input type="image" src="images/pesq.gif" name="btfiltro1" id="btfiltro1" value="Filtrar" /></td>
 
  </tr>
</table>
</form>
<!-- ******************** Fim Formulário Filtro de consulta ******************** -->

<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
<form action="include/rh_novo_funcionario.php?funcao=exclui_varios" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($filt_rh_altera == "1" or $filt_rh_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">EXCLUIR&nbsp;<br /></th>
		<? } ?>
	<th width="5%" id="th_mercado" rowspan="2">Data.&nbsp;</th>
    <th width="25%" id="th_mercado" rowspan="2">NOME.&nbsp;</th>
    <th width="10%" id="th_mercado" rowspan="2">EMPRESA.&nbsp;</th>
    <th width="10%" id="th_mercado" rowspan="2">FUNÇÃO.&nbsp;</th>
    <th width="20%" id="th_mercado" rowspan="2">SETOR.&nbsp;</th>
    <th width="5%" id="th_mercado" rowspan="2">SUPERIOR.&nbsp;</th>
	<th width="5%" id="th_mercado" rowspan="2">SISTEMA.&nbsp;</th>
    <th width="10%" id="th_data_cont" rowspan="2">EMAIL.&nbsp;</th>
	<th width="10%" id="th_data_cont" rowspan="2">TIPO.&nbsp;</th>
  </tr>
  <tr>
  	<th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela 
$filt1 = converte_data($_REQUEST['data1']);
$filt2 = converte_data($_REQUEST['data2']);

$sql = mysql_query("SELECT * FROM rh_novo_funcionario 
					WHERE data_contratacao BETWEEN ('$filt1') AND ('$filt2') 
					ORDER BY data_contratacao DESC  ");
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($filt_rh_exclui == "1" or $filt_rh_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
		<td> 
					<? if ($filt_rh_altera == "11"){?>
						<a href="include/rh_novo_funcionario.php?funcao=alt&id=<? echo $linha['id'] ?>"><img src="images/Mini/approve_notes.png" alt="altera" width="20px" /></a>
					<? }?>
					<? if ($filt_rh_exclui == "1"){?>
						<a href="include/rh_novo_funcionario.php?funcao=exclui&id=<? echo $linha['id'] ?>"></a>
						<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
					<? }?>
		</td>
			<? }//Fim filtro botões apenas para usuários master ?>

		<td>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_contratacao']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['nome']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;
		<? echo busca_loja($linha['loja']); ?>
		&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['funcao']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['setor']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['superior']); ?>&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<?
		 if($linha['sistema'] == 1 ){
		 echo "SIM";
		 }
		 if($linha['sistema'] == 0 ){
		 echo "NÃO";
		 }
		 ?>&nbsp;&nbsp;&nbsp;</td>
		 <td>&nbsp;&nbsp;&nbsp;<?
		 if($linha['email'] == 1 ){
		 echo "SIM";
		 }
		 if($linha['email'] == 0 ){
		 echo "NÃO";
		 }
		 ?>&nbsp;&nbsp;&nbsp;</td>
		<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['tipo']) ?>&nbsp;&nbsp;&nbsp;</td>
	</tr>
   		
		 <? 
		 $quantidade_filt ++;
		  
		 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
		  ?>
	<tr>
		 <th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /><th>
		<th id="th_mercado" colspan="8">&nbsp;
		<? echo "Total: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;
		</th>
	</tr>
  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
</form>
<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA Aferição Balança
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
