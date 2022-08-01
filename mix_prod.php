<?
session_start();
require "topo.php";
require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$nome_usuario_logado = $_SESSION['nome_usuario'];
$id_usuario_logado = $_SESSION['id_usuario'];
$pagina_atual = "mix_prod.php";
if (!empty($_GET['pg']))
	$pg = $_GET['pg'];
if (!empty($_GET['id']))
	$id_tab_cab = $_GET['id'];
?>

<!-- Inicio Link para funcionar a exemplo-calendario.js -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->

<div id="headline">
<h2><p> REGISTRO DE Produtos</p></h2>

<!-- ************************************************************************************************************************************* 
											CADASTRO TABELA DE MIX
****************************************************************************************************************************************** -->
<? 	if ($pg == "cad_tab" AND $filt_mix_prod_inclui == "1") { ?>

<h1>Cadastro Tabela MIX</h1> 
<form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=cad_tab&qt=<? echo $qt;?>" >
<table width="" border="2" align="center" id="tbcad">
	<tr>
		<td >
			<div align="right">Data:</div>
		</td>
		<td align="left" >
			<input name="data" type="text" size="10" maxlength="10" readonly="readonly" id="data1" value="<? echo $data_atual?>" />
		</td>
		<td >
			<div align="right">COD Tabela:</div>
		</td>
		<td  align="left">
			<input type="text" name="cod_tab" maxlength="5" size="5"  />
		</td>
		<td >
			<div align="right">Nome Tabela:</div>
		</td>
		<td  align="left">
			<input type="text" name="descricao" maxlength="30" size="31"  />
		</td>
	
	</tr>
	<tr>
		<td colspan="6">
			<div align="center">
				<input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
				<input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
			</div>
		</td>
	</tr>
</table>
</form>	
<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO MULTI Aferição Balança
****************************************************************************************************************************************** -->


<!-- ************************************************************************************************************************************* 
											CONSULTA Tabelas
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta_tab" and $filt_mix_prod_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta Tabelas</h1> 

<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>

<form action="include/<? echo $pagina_atual ?>?funcao=confirma_doc" method="post">
<table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
	<tr>
		<th width="10%">
			<p>Opções</p>
		</th>
		<th width="10%">
			<p>COD</p>
		</th>
		<th width="80%">
			<p>Nome tabela</p>
		</th>
	</tr>
	<? // Consulta cabeçalho
	$sql_cab = mysql_query("SELECT * FROM tab_mix_produtos_cab  
							ORDER BY cod_tab");
	$cont = mysql_num_rows($sql_cab);
	while($linha = mysql_fetch_array($sql_cab)){ 
	$id_cab = $linha['id'];
	?>	
	<tr>
		<td>
			<a href="?pg=cad_prod&id=<? echo $id_cab; ?>"><img src="images\add.png" width="20px" alt="adiciona Produto"/></a>
			<a href="?pg=alt_prod&id=<? echo $id_cab; ?>"><img src="images\accept.png" width="20px" alt="Altera Produtos"/></a>
		
		</td>
		<td>
			<? echo utf8_encode($linha['cod_tab']);?>
		</td>
		<td>
			<? echo utf8_encode($linha['descricao_tab']);?>
		</td>
	</tr>
	<? }?>
</table>
<script> zebra('tabela_servidor', 'zebra'); </script>
</form>
<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA Tabelas
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											Cadastra Produtos 
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_prod" and $filt_mix_prod_inclui == "1") {//Cadastro ?>

<h1>Cadastro Tabela MIX</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=cad_prod" >
 <table width="" border="2" align="center" id="tbcad">
	<? // Consulta cabeçalho
	$sql_cab = mysql_query("SELECT * FROM tab_mix_produtos_cab  
							WHERE id ='$id_tab_cab'
							LIMIT  1");
	while($linha = mysql_fetch_array($sql_cab)){ 
	?>	
	<input type="hidden" name="id_cab" value="<? echo $linha['id']?>" />
	<tr>
		<td align="left" colspan="10" >
			
			Data:
		
			<input name="data" type="text" size="6" maxlength="10" readonly="readonly" value="<? echo $data_atual?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			COD Tabela:
			<input type="text" name="cod_tab" value="<? echo $linha['cod_tab']?>" readonly="readonly" maxlength="5" size="5"  onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			Nome Tabela:
			<input type="text" name="descricao" value="<? echo utf8_encode($linha['descricao_tab'])?>" maxlength="30" size="31" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>

		</td>
	
	</tr>
	<? }//Fim consulta dados tabela cabeçalho ?>
	<tr>
		<th colspan="2">COD.</th>
		<th colspan="2">PRODUTO</th>
		<th>CUSTO</th>
		<th>VENDA</th>
	</tr>
	<?
		for($i=0;$i<20;$i++){
	?>
	<tr>
		<td colspan="2">
			<input type="text" size="10" maxlength="30" name="cod_produto<? echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
		<td colspan="2">
			<input type="text" size="100" maxlength="250" name="nome_produto<? echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
		<td>
			<input type="text" size="5" maxlength="5" name="custo<? echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
		<td >
			<input type="text" size="5" maxlength="5" name="venda<? echo $i?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
	</tr>
	<? }?>
   <tr>
     <td colspan="6">
		<div align="center">
		   <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
		   <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
		</div>
	 </td>
   </tr>
	
 </table>
  </form>	
  <? }?>
<!-- ************************************************************************************************************************************* 
											FIM Cadastro Produtos tabela
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											Altera Produtos 
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "alt_prod" and $filt_mix_prod_inclui == "1") {//Cadastro ?>

<h1>Cadastro Tabela MIX</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=alt_tab" >
 <table width="" border="2" align="center" id="tbcad">
	<? // Consulta cabeçalho
	$sql_cab = mysql_query("SELECT * FROM tab_mix_produtos_cab  
							WHERE id ='$id_tab_cab'
							LIMIT  1");
	while($linha = mysql_fetch_array($sql_cab)){ 
	?>	
	<tr>
		<td colspan="10">
			Data:
			<input type="hidden" name="id_cab" value="<? echo $linha['id']?>" />
			<input name="data" type="text" size="6" maxlength="10" readonly="readonly" value="<? echo $data_atual?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			COD Tabela:
			<input type="text" name="cod_tab" value="<? echo $linha['cod_tab']?>" readonly="readonly" maxlength="5" size="5"  onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			Nome Tabela:
			<input type="text" name="descricao" value="<? echo utf8_encode($linha['descricao_tab'])?>" maxlength="30" size="31"  onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
	</tr>
	<? }//Fim consulta dados tabela cabeçalho ?>
	<tr>
		<th colspan="2">COD.</th>
		<th colspan="2">PRODUTO</th>
		<th>CUSTO</th>
		<th>VENDA</th>
	</tr>
	<?
	$qt=0;
	$sql_prod = mysql_query("SELECT * FROM tab_mix_produtos_prod  
							WHERE id_cab ='$id_tab_cab'
							ORDER BY nome_produto
							LIMIT 1000
							");
	while($linha_prod = mysql_fetch_array($sql_prod)){ 
	$qt ++;
	?>
	
	<tr>
		<td colspan="2">
		<input type="hidden" name="id_produto<? echo $qt?>" value="<? echo $linha_prod['id'];?>" readonly="readonly"/>
		<input type="hidden" name="conta_prod" value="<? echo $qt?>" readonly="readonly"/>
			<input type="text" size="10" maxlength="30" name="cod_produto<? echo $qt?>"  value="<? echo $linha_prod['cod_produto']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
		<td colspan="2">
			<input type="text" size="100" maxlength="250" name="nome_produto<? echo $qt?>"  value="<? echo utf8_encode($linha_prod['nome_produto']); ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
		<td>
			<input type="text" size="5" maxlength="6" name="custo<? echo $qt?>"  value="<? echo utf8_encode($linha_prod['custo']); ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
		<td>
			<input type="text" size="5" maxlength="6" name="venda<? echo $qt?>"  value="<? echo utf8_encode($linha_prod['venda']); ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		</td>
	</tr>
	<? }?>
   <tr>
     <td colspan="6">
		<div align="center">
		   <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Alterar" />
		   <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
		</div>
	 </td>
   </tr>
	
 </table>
  </form>	
  <? }?>
<!-- ************************************************************************************************************************************* 
											FIM Altera Produtos tabela
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											  CONSULTA QUEBRAS
****************************************************************************************************************************************** -->
<? 
if ($pg == "con_quebra") {//Cadastro 
?>
	<form action="include/patrimonio.php?funcao=conclui" method="post" >
	<table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
		</tr>
	
	</table>
<?
}
?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA QUEBRA 
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