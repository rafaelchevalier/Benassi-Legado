<?
session_start();
require "topo.php";
require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)

?>

<!-- Inicio Link para funcionar a exemplo-calendario.js -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->

<div id="headline">
<h2><p>Ocorrências Máquinas MWS Toledo </p></h2>


<!-- ************************************************************************************************************************************* 
											CADASTRO 
****************************************************************************************************************************************** -->
	
		<? 
	if ($pg == "cad" and $filt_chamado_fecha == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/ocorrencia_cozinha.php?funcao=cad&qt=<? echo $qt;?>" >
 <table width="" border="2" align="center" id="tbcad">
 <tr>
 <td width="62"><div align="right">Data.:</div></td>
     <td align="left" colspan="2">
     <input name="data" type="text" size="10" maxlength="10" readonly="readonly" <? if($geral_libera_data == 1) {?>id="data1" <? }?>value="<? echo $data_atual?>" <? if($geral_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
   
     <td width="97"><div align="right">Nome Usuário:</div></td>
     <td width="199" colspan="2"><input type="text" name="nome" id="cadnome" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td>
   </tr>
    <? $qt = 0;
   for($i=0; $i < '1' ; $i++){
	$qt ++;
   ?>
   <tr>
   	<th colspan="3">Máquina:</th>
    <th colspan="1">Situação:</th>
    <th colspan="2">Obs:</th>
   
   </tr>
  
   <tr>   
     <td colspan="3"><label for="maquinas"></label>
       <select name="maquina<? echo $i?>" size="1" id="maquina<? echo $i?>" >
	<option value="CozInd-01" multiple >CozInd-01</option>
    <option value="CozInd-02" multiple >CozInd-02</option>
    <option value="CozInd-03" multiple >CozInd-03</option>
    <option value="CozInd-04" multiple >CozInd-04</option>
    <option value="CozInd-05" multiple >CozInd-05</option>
    <option value="CozInd-06" multiple >CozInd-06</option>
    <option value="CozInd-07" multiple >CozInd-07</option>
    <option value="CozInd-08" multiple >CozInd-08</option>
    <option value="CozInd-09" multiple >CozInd-09</option>
    <option value="CozInd-10" multiple >CozInd-10</option>
    <option value="CozInd-11" multiple >CozInd-11</option>
    <option value="CozInd-12" multiple >CozInd-12</option>
    <option value="CozInd-13" multiple >CozInd-13</option>
    <option value="CozInd-14" multiple >CozInd-14</option>
       
    </select></td>

     
     <td colspan="1" align="center">
     <label for="situacao">C</label><input type="radio" name="situacao<? echo $i?>" id="situacao" value="1" />
     &nbsp;&nbsp;&nbsp;&nbsp;
     <label for="situacao">N/C</label><input type="radio"  name="situacao<? echo $i?>" id="situacao" value="0" />  
     </td>

     
     <td colspan="2"><textarea name="obs<? echo $i?>" cols="26" id="obs"></textarea></td>
   </tr>
   
   <tr>
   	<td colspan="3">IMPRESSORA:</td>
   	<td colspan="1">
    
    <label for="situacao">C</label><input type="radio" name="situacao_impressora<? echo $i?>" id="situacao" value="1" />
     &nbsp;&nbsp;&nbsp;&nbsp;
     <label for="situacao">N/C</label><input type="radio"  name="situacao_impressora<? echo $i?>" id="situacao" value="0" />    
    </select></td>
    
    <td colspan="2"><textarea name="obs_impressora<? echo $i?>" cols="26" id="obs"></textarea></td>
   </tr>
   <tr>
   	<td colspan="3">BALANÇA:</td>
   	<td colspan="1">
    
    <label for="situacao">C</label><input type="radio" name="situacao_balanca<? echo $i?>" id="situacao" value="1" />
     &nbsp;&nbsp;&nbsp;&nbsp;
     <label for="situacao">N/C</label><input type="radio"  name="situacao_balanca<? echo $i?>" id="situacao" value="0" />    
    </select></td>
    
    <td colspan="2"><textarea name="obs_balanca<? echo $i?>" cols="26" id="obs"></textarea></td>
   </tr>
   <tr>
   	<td colspan="3">Conservação Geral:</td>
   	<td colspan="1">
    
    <label for="situacao">C</label><input type="radio" name="situacao_conservacao<? echo $i?>" id="situacao" value="1" />
     &nbsp;&nbsp;&nbsp;&nbsp;
     <label for="situacao">N/C</label><input type="radio"  name="situacao_conservacao<? echo $i?>" id="situacao" value="0" />    
    </select></td>
    
    <td colspan="2"><textarea name="obs_conservacao<? echo $i?>" cols="26" id="obs"></textarea></td>
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
											FIM CADASTRO 
****************************************************************************************************************************************** -->


<!-- ************************************************************************************************************************************* 
											CONSULTA 
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta" and $filt_usuario_inclui = "1" or $filt_fbl_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="ocorrencia_cozinha.php?pg=consulta" method="post" enctype="multipart/form-data">
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
    <td align="right">Balança</td>
    <td colspan="3" align="left"><select name="maquina" size="1" id="maquina">
      					<option value="0" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT maquina FROM ocorrencia_cozinha ORDER BY maquina ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['maquina'] != ""){?>
    <option value="<? echo $linha_filtro['maquina'] ?>" <? if($_POST['maquina'] == $linha_filtro['maquina'] ){ ?>selected="selected" <? }?>multiple ><? echo utf8_encode($linha_filtro['maquina']) ?></option>
       <? }}?>
    </select></td>
  </tr>
  <tr>
  <tr>
    <td align="right">Ordem</td>
    <td colspan="3" align="left"><select name="ordem" size="1" id="ordem">
      					<option value="1" selected="selected">Data</option>
                        <option value="2" >Nome Maquina</option>
                        <option value="3" >Situação Máquina</option>
                        <option value="4" >Obs. Máquina</option>
                        <option value="5" >Situação Impressora</option>
                        <option value="6" >OBS. Impressora</option>
                        <option value="7" >Situação Balança</option>
                        <option value="8" >OBS. Balança</option>
                        <option value="9" >Situação Conservação</option>
                        <option value="10" >OBS. Conservação</option>
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
<form action="include/ocorrencia_cozinha.php?funcao=exclui_varios" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($filt_fbl_altera == "1" or $filt_fbl_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">EXCLUIR&nbsp;<br />
    <input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" />
    </th>
		<? } ?>
    <th width="5%" id="th_mercado">>DATA.&nbsp;</th>
    <th width="20%" id="th_mercado">NOME <br />MAQUINA.&nbsp;</th>
    <th width="5" id="th_mercado">SITUACAO <br />MAQUINA.&nbsp;</th>
    <th width="5%" id="th_mercado">OBS. <br />MAQUINA.&nbsp;</th>
    <th width="5%" id="th_mercado">SITUACAO<br />IMPRESSORA.&nbsp;</th>
	<th width="10%" id="th_mercado">OBS.<br />IMPRESSORA.&nbsp;</th>
	<th width="5%" id="th_mercado">SITUACAO<br />BALANÇA.&nbsp;</th>
	<th width="10%" id="th_mercado">OBS.<br />BALANÇA.&nbsp;</th>
    <th width="5%" id="th_mercado">SITUACAO<br />CONSERVAÇÃO.&nbsp;</th>
	<th width="10%" id="th_mercado">OBS.<br />CONSERVAÇÃO.&nbsp;</th>

  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela FBL 
$filt1 = converte_data($_REQUEST['data1']);
$filt2 = converte_data($_REQUEST['data2']);
$filt3 = $_REQUEST['maquina'];
switch ($_REQUEST['ordem']){
  case 1:$ordem = "data_cad";break;
  case 2:$ordem = "maquina";break;
  case 3:$ordem = "situacao";break;
  case 4:$ordem = "obs";break;
  case 5:$ordem = "situacao_impressora";break;
  case 6:$ordem = "obs_impressora";break;
  case 7:$ordem = "situacao_balanca";break;
  case 8:$ordem = "obs_balanca";break;
  case 9:$ordem = "situacao_conservacao";break;
  case 10:$ordem = "obs_conservacao";break;
  default:$ordem = "id";break;
}

if($_REQUEST['maquina'] == "") { $filt3 = "0";}

			if( $filt3 != "0"){//Filtro entre datas, Descrição e Conforme
				$sql = mysql_query("SELECT * FROM ocorrencia_cozinha WHERE data_cad BETWEEN ('$filt1') AND ('$filt2') AND maquina = '$filt3' ORDER BY maquina DESC  ");
			
			}
			if( $filt3 == "0"){//Filtro entre datas e Descrição
				$sql = mysql_query("SELECT * FROM ocorrencia_cozinha WHERE data_cad BETWEEN ('$filt1') AND ('$filt2')  ORDER BY '$ordem' DESC  ");
			}


$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
	
	if( $linha['situacao'] == "0" or $linha['situacao_impressora'] == "0" or $linha['situacao_balanca'] == "0" or $linha['situacao_conservacao'] == "0" ){
		 $nc ++;
		 $situacao_nc = 0;
	 }
	 if( $linha['situacao'] == "1" and $linha['situacao_impressora'] == "1" and $linha['situacao_balanca'] == "1" and $linha['situacao_conservacao'] == "1" ){
		 $c ++;
		 $situacao_nc = 1;
	 }

?>
    <tr>
		<?	if ($filt_fbl_exclui == "1" or $filt_fbl_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td <?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?> > 
                <? if ($filt_fbl_altera == "11"){?>
                	<a href="include/ocorrencia_cozinha.php?funcao=alt_fbl&id=<? echo $linha['id'] ?>"><img src="images/Mini/approve_notes.png" alt="altera" width="20px" /></a>
                <? }?>
                <? if ($filt_usuario_exclui == "1"){?>
                	<a href="include/ocorrencia_cozinha.php?funcao=exclui_fbl&id=<? echo $linha['id'] ?>"></a>
                    <input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_cad']); ?>&nbsp;&nbsp;&nbsp;</td>
	<td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo $linha['maquina']; ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;
	<?
	 if($linha['situacao'] == 1 ){
	 echo "Conforme";
	 }
	 if($linha['situacao'] == 0 ){
	 echo "N&atilde;o Conforme";
	 }
	 ?></td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;
    <?
	 if($linha['situacao_impressora'] == 1 ){
	 echo "Conforme";
	 }
	 if($linha['situacao_impressora'] == 0 ){
	 echo "N&atilde;o Conforme";
	 }
	 ?></td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs_impressora']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;
	<?
	 if($linha['situacao_balanca'] == 1 ){
	 echo "Conforme";
	 }
	 if($linha['situacao_balanca'] == 0 ){
	 echo "N&atilde;o Conforme";
	 }
	 ?></td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs_balanca']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;
	<?
	 if($linha['situacao_conservacao'] == 1 ){
	 echo "Conforme";
	 }
	 if($linha['situacao_conservacao'] == 0 ){
	 echo "N&atilde;o Conforme";
	 }
	 ?></td>
    <td width="5%"<?	if ( $situacao_nc == 0){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs_conservacao']); ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   	
  	 <? 
	 
	 
	 $quantidade_filt ++;
	  
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
     <th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /><th>
    <th id="th_mercado" colspan="9">&nbsp;
	<? echo "Total Maquinas filtradas: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;|
    <? echo "Maquinas Conformes: ",$c;?>&nbsp;&nbsp;&nbsp;|
    <? echo "Maquinas Não Conformes: ",$nc;?>&nbsp;&nbsp;&nbsp; |
    <? 
	$conformidade = $c / $quantidade_filt * 100;
	echo "Total Conformidade maquinas= ".number_format($conformidade, 2, ',', ' ')."%";
	?>
    </th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>

</form>
<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA 
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
