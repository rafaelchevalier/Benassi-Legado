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

<p>Transporte</p>
<? //if ($filt_fbl_inclui == 1){ ?>
<a href="transporte.php?pg=cad">Cadastro</a>&nbsp;|&nbsp;
<? //}?>
<? //if ($filt_fbl_consulta == 1){ ?>
<a href="transporte.php?pg=consulta">Consulta</a>&nbsp;|&nbsp;
<? //}?>

</h2>
<!-- ************************************************************************************************************************************* 
											FIM MENU 
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO 
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad" and $transporte_inclui == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/transporte.php?funcao=cad" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td><input type="text" name="usuario" id="cadnome" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td>
   </tr>
   <tr>
     <td><div align="right">Motorista:</div></td>
     <td><input type="text" name="motorista" id="motorista" value="" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">CPF:</div></td>
     <td><input type="text" name="cpf" id="cpf" value="" maxlength="14" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Empresa:</div></td>
     <td><input type="text" name="empresa" id="empresa" value="" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Placa:</div></td>
     <td><input type="text" name="placa" id="placa" value="" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Modelo:</div></td>
     <td><input type="text" name="modelo" id="modelo" value="" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Marca:</div></td>
     <td><input type="text" name="marca" id="marca" value="" maxlength="50" size="31" /></td>
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
											FIM CADASTRO
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											ALTERA Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "alt" and $transporte_altera == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Altera</h1>

<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM transporte where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/transporte.php?funcao=alt&id=<? echo $id ?>" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Motorista:</div></td>
     <td><input type="text" name="motorista" id="motorista" value="<? echo $linha['motorista']?>" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">CPF:</div></td>
     <td><input type="text" name="cpf" id="cpf" value="<? echo $linha['cpf']?>" maxlength="14" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Empresa:</div></td>
     <td><input type="text" name="empresa" id="empresa" value="<? echo $linha['empresa']?>" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Placa:</div></td>
     <td><input type="text" name="placa" id="placa" value="<? echo $linha['placa']?>" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Modelo:</div></td>
     <td><input type="text" name="modelo" id="modelo" value="<? echo $linha['modelo']?>" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Marca:</div></td>
     <td><input type="text" name="marca" id="marca" value="<? echo $linha['marca']?>" maxlength="50" size="31" /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
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
if ($pg == "consulta" and $transporte_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


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
		<? if ($transporte_altera == "1" or $transporte_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" id="th_mercado">NOME.&nbsp;</th>
    <th width="5%" id="th_mercado">CPF.&nbsp;</th>
    <th width="5%" id="th_mercado">EMPRESA.&nbsp;</th>
    <th width="5%" id="th_mercado">PLACA.&nbsp;</th>
    <th width="5%" id="th_mercado">MODELO.&nbsp;</th>
	<th width="11%" id="th_mercado">MARCA.&nbsp;</th>

  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
$sql = mysql_query("SELECT * FROM transporte ORDER BY data_cad DESC  ");
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($transporte_exclui == "1" or $transporte_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($transporte_exclui == "1"){?>
                	<a href="include/transporte.php?funcao=exclui&id=<? echo $linha['id'] ?>">Excluir&nbsp;&nbsp;</a>
                <? }?>
                <? if ($transporte_altera == "1"){?>
                	<a href="transporte.php?pg=alt&id=<? echo $linha['id'] ?>">Alterar&nbsp;&nbsp;</a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['motorista']); ?>&nbsp;&nbsp;&nbsp;</td>
	<td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['cpf']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['empresa']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['placa']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['modelo']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="62%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['marca']) ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
  	 <? 
	 $quantidade_filt ++;
	 
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="9">&nbsp;
	<? echo "Total Transporte Cadastrado: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;|
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
