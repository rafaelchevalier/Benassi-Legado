<?
session_start();
require"topo.php";
require"include/verifica.php";
require"include/funcoes.php";
require"js/funcoes.jsp";
require "include/config_filtros.php";
$data_atual = date("d/m/Y");
?>
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<body> 
<div id="headline">
    <!-- Começar a partit desta linha-->
<h2>
  <p>Pedido de Compra</p>
  	<? if ($filt_pedido_inclui == 1){?>
    	&nbsp;|&nbsp;<a href="pedidodecompra.php?pg=cadpedido"> Cadastro  </a>&nbsp;|&nbsp;
    <? }?>
    <? if ($filt_pedido_rel == 1){?>
	<a href="pedidodecompra.php?pg=pendente"> Pedidos Pendentes</a>&nbsp;|&nbsp;
    <a href="pedidodecompra.php?pg=aprovado"> Pedidos Aprovados</a>&nbsp;|&nbsp;
    <a href="pedidodecompra.php?pg=reprovado"> Pedidos Reprovados</a>&nbsp;|&nbsp;
    <? }?>
  </h2>
<!-- ***************** Cadastro pedido de compra **********************-->
<? if ( isset($_SESSION['login_usuario']) and $pg == "cadpedido"){?>
<h2>CADASTRO PEDIDO DE COMPRA</h2>
<form id="cad_pedido_compra" name="cad_pedido_compra" action="include/adiciona.php?funcao=adiciona_pedido_compra" method="post">
<table width="513" border="0" align="center">
  <tr>
    <td>SOLICITANTE:</td>
    <td  colspan="2">
    	<input type="text" name="solicitante" id="solicitante" size="40" maxlength="255" />
    &nbsp;&nbsp; URGÊNCIA: &nbsp;&nbsp;&nbsp;
      <input type="radio" name="prioridade" id="urgencia" value="1" />
      <label for="urgencia">BAIXA</label>
      <input type="radio" name="prioridade" id="urgencia" value="2" />
      <label for="urgencia">MÉDIA</label>
      <input type="radio" name="prioridade" id="urgencia" value="3" />
      <label for="urgencia">ALTA</label>
     </td> 
  </tr>
  <tr>
    <td>SETOR:</td>
    <td  colspan="2"><input type="text" name="setor" id="setor" size="100" maxlength="255" /></td>
  </tr>
  <tr>
    <td>DESCRIÇÃO</td>
    <td colspan="2"><input type="text" name="descricao_pedido" id="descricao_pedido" size="100" maxlength="255" /></td>
  </tr>
  <tr>
    <th width="137">QTD.</th>
    <th width="211">MATERIAL</th>
    <th width="143">MOTIVO</th>
  </tr>
  <? for($i = 0; $i < 10; ++$i) { ?>
  <tr>
    <td><input type="text" name="quantidade<? echo $i?>" id="quantidade<? echo $i?>" size="18" maxlength="10" /></td>
    <td><input type="text" name="produto<? echo $i?>" id="produto<? echo $i?>" size="50" maxlength="255" /></td>
    <td><input type="text" name="motivo<? echo $i?>" id="motivo<? echo $i?>" size="50" maxlength="255" /></td>
  </tr>
  <? }?>
  <tr>
  	<td colspan="3" align="center"><input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" /></td>
       
  </tr>
</table>
</form>
<? }// Fecha if pg=cadpedido?>
<!-- ***************** Fim cadastro pedido de compra **********************-->
<!-- ***************** confirmação pedido de compra **********************-->

<? 
if($pg == "confirmacao" and $filt_pedido_aprova == 1){
$id_pedido_compra = $_GET['id'];
require"include/conexao.php";

// Puxa pedido
  
  $sql_pedido_compra = mysql_query("SELECT * FROM pedido_compra where id='$id_pedido_compra'  ");
$cont = mysql_num_rows($sql_pedido_compra);
while($linha_pedido_compra = mysql_fetch_array($sql_pedido_compra)){
	$solicitante = $linha_pedido_compra['solicitante'];
	$descricao_pedido = $linha_pedido_compra['descricao_pedido'];
	$prioridade =  $linha_pedido_compra['prioridade'];
	$setor = $linha_pedido_compra['setor'];
	
?>
<h2>APROVAÇÃO PEDIDO DE COMPRA</h2>
<form id="cad_pedido_compra" name="cad_pedido_compra" action="include/adiciona.php?funcao=aprova_pedido_compra&id=<? echo $id_pedido_compra ?>" method="post">
<table width="513" border="0" align="center">
  <tr>
    <td>SOLICITANTE:</td>
    <td  colspan="2">
    	<input type="text" name="solicitante" value="<? echo utf8_encode($solicitante);?>" id="solicitante" size="40" maxlength="255" disabled />
    &nbsp;&nbsp; URGÊNCIA: &nbsp;&nbsp;&nbsp;
      <input name="prioridade" type="radio" id="urgencia" value="1" <? if ($prioridade == 1){ ?>checked <? }?> disabled />
      <label for="urgencia">BAIXA</label>
      <input type="radio" name="prioridade" id="urgencia" value="2" <? if ($prioridade == 2){ ?>checked <? }?> disabled />
      <label for="urgencia">MÉDIA</label>
      <input type="radio" name="prioridade" id="urgencia" value="3" <? if ($prioridade == 3){ ?>checked <? }?> disabled />
      <label for="urgencia">ALTA</label>
     </td> 
  </tr>
  <tr>
    <td>SETOR:</td>
    <td  colspan="2"><input type="text" name="setor" id="setor" size="100" value="<? echo utf8_encode($setor);?>" maxlength="255" disabled /></td>
  </tr>
  <tr>
    <td>DESCRIÇÃO</td>
    <td colspan="2"><input type="text" name="descricao_pedido" id="descricao_pedido" value="<? echo utf8_encode($descricao_pedido);?>" size="100" maxlength="255" disabled /></td>
  </tr>
  <tr>
    <th width="137">QTD.</th>
    <th width="211">MATERIAL</th>
    <th width="143">MOTIVO</th>
  </tr>
  <? } 
  // Puxa os itens
  
  $sql = mysql_query("SELECT * FROM itens_pedido_compra ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$quantidade = $linha['quantidade'];
	$produto = $linha['produto'];
	$motivo = $linha['motivo'];
	$id_itens_pedido = $linha['id_pedido'];
	if ($id_pedido_compra == $id_itens_pedido){
	?>
  <tr>
    <td><input type="text" name="quantidade0" id="quantidade0" size="18" maxlength="10" value="<? echo $quantidade;?>" disabled/></td>
    <td><input type="text" name="produto0" id="produto0" size="50" maxlength="255" value="<? echo $produto;?>" disabled /></td>
    <td><input type="text" name="motivo0" id="motivo0" size="50" maxlength="255" value="<? echo $motivo; ?>" disabled/></td>
  </tr>
  <tr>
  <? }}?>
  	<td colspan="3" align="center">
    <input name="aprovado" type="radio" id="aprovado" value="1"/>
      <label>APROVADO</label>
    <input type="radio" name="aprovado" id="aprovado" value="2"/>
      <label>REPROVADO</label>
      <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Avançar ->" />
    </td>
  </tr>
  
</table>
</form>
<? }//Fecha teste $PG?>
<!-- ***************** Fim confirmação pedido de compra **********************-->
<!-- ***************** Confirmação pendente **********************-->

  <? 
  if($pg =="pendente" and $filt_pedido_aprova == 1 ){ ?>
  <h2>Lista de pedidos de compras pendentes</h2>
<table width="513" border="0" align="center">
  
  <tr>
	<th>OPÇÃO</th>
    <th>SOLICITANTE</th>
    <th>SETOR</th>
    <th>DESCRIÇÃO</th>
    <th>PRIORIDADE</th>
    
  </tr>
  
  <?
  // Puxa solicitações pendente
  require"include/conexao.php";
  $sql = mysql_query("SELECT * FROM pedido_compra WHERE aberto like '0' and aprovado like '0' ORDER BY prioridade DESC ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
?>
  <tr>
  		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><a href="?pg=confirmacao&id=<? echo $linha['id']; ?>">Visualizar</a></td>
  		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['solicitante']); ?></td>
   		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['setor']);?></td>
   		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['descricao_pedido']);?></td>
        <? if($linha['prioridade'] == 1){ ?>
         	<td>BAIXA</td>
        <? }?>
        <? if($linha['prioridade'] == 2){ ?>
         	<td>MÉDIA</td>
        <? }?>
        <? if($linha['prioridade'] == 3){ ?>
         	<td class="td2">ALTA</td>
        <? }?>
  </tr>
 
	
<? }// Fecha While ?>
</table>	
<? }// Fim if confimação pendente?>
<!-- ***************** Fim confirmação pendente **********************-->
<!-- ***************** Confirmação Aprovados **********************-->

  <? 
  if( $pg =="aprovado" and $filt_pedido_aprova == 1 ){ ?>
  <h2>Lista de pedidos de compras aprovados</h2>
<table width="513" border="0" align="center">
  
  <tr>
	<th>OPÇÃO</th>
    <th>SOLICITANTE</th>
    <th>SETOR</th>
    <th>DESCRIÇÃO</th>
    <th>PRIORIDADE</th>
    
  </tr>
  
  <?
  // Puxa solicitações pendente
  require"include/conexao.php";
  $sql = mysql_query("SELECT * FROM pedido_compra WHERE aberto like '1' and aprovado like '1' ORDER BY prioridade DESC ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
?>
  <tr>
  		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><a href="?pg=confirmacao&id=<? echo $linha['id']; ?>">Visualizar</a></td>
  		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['solicitante']); ?></td>
   		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['setor']);?></td>
   		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['descricao_pedido']);?></td>
        <? if($linha['prioridade'] == 1){ ?>
         	<td>BAIXA</td>
        <? }?>
        <? if($linha['prioridade'] == 2){ ?>
         	<td>MÉDIA</td>
        <? }?>
        <? if($linha['prioridade'] == 3){ ?>
         	<td class="td2">ALTA</td>
        <? }?>
  </tr>
 
	
<? }// Fecha While ?>
</table>	
<? }// Fim if confimação pendente?>
<!-- ***************** Fim confirmação Aprovados **********************-->
<!-- ***************** Confirmação reprovado **********************-->

  <? 
  if($pg =="reprovado" and $filt_pedido_aprova == 1 ){ ?>
  <h2>Lista de pedidos de compras reprovados</h2>
<table width="513" border="0" align="center">
  
  <tr>
	<th>OPÇÃO</th>
    <th>SOLICITANTE</th>
    <th>SETOR</th>
    <th>DESCRIÇÃO</th>
    <th>PRIORIDADE</th>
    
  </tr>
  
  <?
  // Puxa solicitações pendente
  require"include/conexao.php";
  $sql = mysql_query("SELECT * FROM pedido_compra WHERE aberto like '1' and aprovado like '2' ORDER BY prioridade DESC ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
?>
  <tr>
  		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><a href="?pg=confirmacao&id=<? echo $linha['id']; ?>">Visualizar</a></td>
  		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['solicitante']); ?></td>
   		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['setor']);?></td>
   		<td <? if($linha['prioridade'] == 3){ ?> class="td2"<? }?> ><? echo utf8_encode($linha['descricao_pedido']);?></td>
        <? if($linha['prioridade'] == 1){ ?>
         	<td>BAIXA</td>
        <? }?>
        <? if($linha['prioridade'] == 2){ ?>
         	<td>MÉDIA</td>
        <? }?>
        <? if($linha['prioridade'] == 3){ ?>
         	<td class="td2">ALTA</td>
        <? }?>
  </tr>
 
	
<? }// Fecha While ?>
</table>	
<? }// Fim if confimação pendente?>
<!-- ***************** Fim confirmação reprovado **********************-->
</div>
</body>
<?
require"rodape.php";
?>