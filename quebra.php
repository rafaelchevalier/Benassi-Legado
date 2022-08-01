<?
session_start();
require "topo.php";
require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes_aux.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$pg = $_GET['pg'];
$id_usuario_logado = $_SESSION['id_usuario'];
$pagina_atual = "quebra.php";

?>

<!-- Inicio Link para funcionar a exemplo-calendario.js -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
		<script type="text/javascript" src="js/funcoes.jsp"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->

<div id="headline">
<h2><p> REGISTRO DE QUEBRA/INVENTÁRIO</p></h2>

<!-- ************************************************************************************************************************************* 
											ALTERA QUEBRA
****************************************************************************************************************************************** -->
<? 
	if ($pg =="alt") {//Cadastro 
	$id_quebra_cab = $_GET['id'];  
		
?>

 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=12&qt=<? echo $qt;?>" >
 <table width="" border="2" align="center" id="tbcad" >
	<? // Consulta cabeçalho
	$sql_cab = mysql_query("SELECT * FROM tab_quebra_cab  
							WHERE id='$id_quebra_cab'
							LIMIT  1");
	while($linha = mysql_fetch_array($sql_cab)){ 
	$obs = $linha['obs'];
	?>	
	<tr>
		<td >
			<div align="right">Data:</div>
		</td>
		<td align="left" >
		 <input name="data" type="text" size="6" maxlength="10" readonly="readonly" value="<? echo converte_data($linha['data_cad'])?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
		 <input name="cod_tab_mix" type="hidden" size="6" maxlength="10" readonly="readonly" value="<? echo $linha['cod_tab_mix']?>"/>
		</td>
		<td  colspan="9" class="style3">
			<? echo busca_nome_mercado($linha['id_mercado_cad']);?>
		</td>
	
	</tr>
	<? }//Fim consulta dados tabela cabeçalho ?>
	<tr>
		<th colspan="2" >Cod.</th>
		<th colspan="3"	>Produto</th>
		<th colspan="1"	>Quebra/Inventário em KG</th>
		<th colspan="1"	>Custo KG</th>
		<th colspan="1"	>Custo Total</th>
		<th colspan="1"	>Venda KG</th>
		<th colspan="1"	>Venda Total</th>
	</tr>
	<?
	$qt=0;
	$sql_prod = mysql_query("SELECT * 
							FROM tab_quebra_prod  
							WHERE id_cab ='$id_quebra_cab'
							ORDER BY descricao_prod");
	while($linha_prod = mysql_fetch_array($sql_prod)){ 
		$qt ++;
		$total_quebra = $total_quebra + $linha_prod['quebra'];
		$custo_prod = $linha_prod['custo'] * $linha_prod['quebra'];
		$custo_tot = $custo_tot + $custo_prod;
		$venda_prod = $linha_prod['venda'] * $linha_prod['quebra'];
		$venda_tot = $venda_tot + $venda_prod;
	?>
	<tr>
		<td colspan="2">
			<input type="hidden" name="cod_produto<? echo $qt; ?>"value="<? echo $linha_prod['cod_prod']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<input type="hidden" name="custo<? echo $qt; ?>"value="<? echo $linha_prod['custo']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo $linha_prod['cod_prod']; ?>
			
		</td>
		<td colspan="3">
			<input type="hidden" name="nome_produto<? echo $qt; ?>"value="<? echo utf8_decode($linha_prod['descricao_prod']); ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo utf8_encode($linha_prod['descricao_prod']); ?>
		</td>
		<td colspan="1">
			<input type="hidden" size="5" maxlength="5" name="quebra<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo $linha_prod['quebra']; ?>
		</td>
		<td colspan="1">
			<input type="hidden" size="5" maxlength="5" name="custo<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo "R$ ".number_format($linha_prod['custo'],2,",","."); ?>
		</td>
		<td colspan="1">
			<input type="hidden" size="5" maxlength="5" name="custo_tot<? echo $qt;?>" value="<? echo $linha_prod['quebra']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo "R$ ".number_format($custo_prod,2,",","."); ?>
		</td>
		<td colspan="1">
			<input type="hidden" size="5" maxlength="5" name="venda<? echo $qt;?>" value="<? echo $linha_prod['venda']?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo "R$ ".number_format($linha_prod['venda'],2,",","."); ?>
		</td>
		<td colspan="1">
			<input type="hidden" size="5" maxlength="5" name="venda_tot<? echo $qt;?>" value="<? echo $venda_prod?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<? echo "R$ ".number_format($venda_prod,2,",","."); ?>
		</td>
	</tr>
	<? }?>
	<tr>
		<td colspan="4" class="style3">
			<? echo $qt." Itens";?>
		</td>
		<td class="style3">
			<? echo "Total Quebra:";?>
		</td>
		<td class="style3">
			<? echo $total_quebra." KG";?>
		</td>
		<td colspan="2" class="style3">
			<? echo "Total Custo R$ ".number_format($custo_tot,2,",",".");?>
		</td>
		<td colspan="2" class="style3">
			<? echo "Total Venda R$ ".number_format($venda_tot,2,",",".");?>
		</td>
		
	</tr>
	<tr>
		<td>
			Observações.
		</td>
		<td colspan="9">
			<textarea name="obs" cols="80" rows="5" ><? echo $obs;?></textarea>
		</td>
   <tr>
   
	
 </table>
  </form>	
  <? }?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA QUEBRA
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CONSULTA QUEBRA
****************************************************************************************************************************************** -->

<? if ($pg =="con" and $filt_quebra_consulta == 1) {//Cadastro ?>

<form action="quebra.php?pg=con" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
	<tr>
		<td width="110" align="right">Data Inicial</td>
		<td width="87">
			<input name="data1" id="data1" type="text" size="9" value="<? if(isset($_POST['data1'])){ echo $_POST['data1'];} else{ echo $data_atual;}?>" maxlength="10" >
		</td>
		<td width="180" align="right">Data Final</td>
		<td width="165">
			<input name="data2" id="data2" type="text" size="9" value="<? if(isset($_POST['data2'])){ echo $_POST['data2'];} else{ echo $data_atual;}?>" maxlength="10">
		</td>
	</tr>
	<tr>
	<td colspan="2">
		Quebra&nbsp&nbsp<input name="tipo" type="radio" value="2">
	</td>
	<td colspan="2">
		Inventário&nbsp&nbsp<input name="tipo" type="radio" value="1">
	</td>
  </tr>
	<tr>
		<td colspan="4" align="center"><input type="image" src="images/pesq.gif" name="btfiltro1" id="btfiltro1" value="Filtrar" /></td> 
	</tr>
</table>
</form>

<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
	<form action="include/quebra.php?funcao=exclui_varios" method="post">
	<table id="tabela_servidor" bgcolor="#666666" border="0" align="center">
		<!-- CABEÇALHO CONSULTA -->
		<tr>
			<th colspan="5">
				<? if(isset($_POST['data1']) AND isset($_POST['data2'])){
					echo "Período: ". $_POST['data1']. " - ". $_POST['data2'];
				 }?>
			</th>
		</tr>
		<tr>
			<th width="80px">OPÇÃO</th>
			<th width="100px" rowspan="2">DATA</th>
			<th width="100px" rowspan="2">MERCADO</th>
			<th width="100px" rowspan="2">TOT. QUEBRA</th>
			<th width="100px" rowspan="2">TIPO</th>
		</tr>
		<tr>
			<th>
				<input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" />
			</th>
		</tr>
		
		<!-- INICIO CONSULTA -->
		<? 
		require "include/conexao.php";
		if(!empty($_POST['data1']))
			$data1 = converte_data($_POST['data1']);
		if(empty($_POST['data1']))
			$data1 = $data_atual;
		if(!empty($_POST['data2']))
			$data2 = converte_data($_POST['data2']);
		if(empty($_POST['data2']))	
			$data2 = $data_atual;
		if(!empty($_POST['tipo'])){
			$tipo = "AND tipo ='".$_POST['tipo']."'";
			}
		if(empty($_POST['tipo'])){
			$tipo ="AND tipo !=''";
		}
		$sql = mysql_query("
							SELECT * FROM tab_quebra_cab  
							WHERE data_cad BETWEEN ('$data1') AND ('$data2')
							$tipo
							LIMIT 1000
						  ");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
			$id_loja = $linha['id'];
			$sql_soma_quebra = mysql_query("
				SELECT SUM(quebra) from tab_quebra_prod where id_cab='$id_loja' limit 1
			");
			while($soma_quebra = mysql_fetch_array($sql_soma_quebra)){
		?>
			<tr>
				<td>
					<? if($filt_quebra_exclui == 1){?>
						<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
						<!-- 
							<a href="include/quebra.php?funcao=exclui&id=<? echo $linha['id']?>"> 
								<img src="images/Mini/delete_page.png" width="25px" alt="altera" />
							</a>
						-->
					<? }?>
					<? if($filt_quebra_consulta== 1){?>
						<a href="?pg=alt&id=<? echo $linha['id']?>"> 
							<img src="images/Mini/edit_page.png" width="25px" alt="altera" />
						</a>
					<? }?>
					<a href="#"> 
						<img src="images/pdf.png" width="25px" alt="altera" />
					</a>
				</td>
				<td><? echo converte_data($linha['data_cad'])." - ".$linha['hora_cad']?></td>
				<td><? echo busca_nome_mercado($linha['id_mercado_cad']);?></td>
				<td><? echo number_format($soma_quebra['SUM(quebra)'],2,",",".")." KG";?></td>
				<td>
				<?switch($linha['tipo']){
					case 2:
						echo "Quebra";
					break;
					case 1:
						echo "Inventário";
					break;
					default:	
						echo "Erro Tipo não identificado.";
					break;
				}?>
			</td>

			</tr>
		<? }}?>
	</form>
	</table>	
	<script> zebra('tabela_servidor', 'zebra'); </script>
<? }?>

<!-- ************************************************************************************************************************************* 
											FIM CONSULTA QUEBRA
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											REL QUEBRA
****************************************************************************************************************************************** -->
<? if($pg == "rel_quebra" ){
require "include/conexao.php";
?>
<form action="rel_quebra.php" name="frm_rel" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
	<tr>
		<th colspan="3"> Relatório de quebra</th>
	</tr>
	<tr>
		<td colspan="3">
			Data Inicial<input name="data1" type="text" id="data1" 
			<? if( empty($_POST['data1'])){?>
				value="<? echo $data_atual;?>" 
			<? } ?>
			<? if(!empty($_POST['data1'])){?>
				value="<? echo $_POST['data1'];?>" 
			<? } ?>
			size="9" maxlength="10" readonly="readonly" >
			Data Final<input name="data2" type="text" id="data2" 
			<? if(empty($_POST['data2'])){?>
				value="<? echo $data_atual;?>" 
			<? } ?>
			<? if(!empty($_POST['data2'])){?>
				value="<? echo $_POST['data2'];?>" 
			<? } ?>
			size="9" maxlength="10" readonly="readonly">
		</td>
	</tr>
	<tr>	
		<td colspan="4">
			Nenhum
			<input name="opcao_grupo" type="radio" value="0">  
			&nbsp&nbsp&nbsp
			<!-- Loja
			<input name="opcao_grupo" type="radio" value="1">  
			&nbsp&nbsp&nbsp -->
			Produtos
			<input name="opcao_grupo" type="radio" value="2">  
		</td>
	</tr>
	<tr>	
		<td>Tipo</td>
		<td colspan="3" align="left">
			<select name="tipo" size="1"  id="filt_mercado">
				<option value="0" multiple>Todos</option>
				<option value="2" multiple>Quebra</option>
				<option value="1" multiple>Inventário</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Loja</td>
		<td colspan="3" align="left">
			<select name="cod_mercado" size="1"  id="filt_mercado">
			<option value="" multiple>Todos</option>
			<? 
			if(!empty($_POST['tipo'])){
			$tipo = "where tipo ='".$_POST['tipo']."'";
			}
			if(empty($_POST['tipo'])){
			$tipo="";
			}
			
			//Conexão com banco puxar usuário único
			$sql_filtro = mysql_query("SELECT DISTINCT id_mercado_cad  FROM tab_quebra_cab  $tipo ORDER BY id_mercado_cad ");
			$cont_filtro = mysql_num_rows($sql_filtro);
			while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
			$id_mercado_cad = $linha_filtro['id_mercado_cad'];
			?>
				<option value="<? echo $id_mercado_cad?>" multiple>
					<? echo utf8_decode(busca_nome_mercado($linha_filtro['id_mercado_cad'])) ?>
				</option>
			<? }?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Produto</td>
		<td colspan="2" align="left">
			<select name="produto" size="1"  id="filt_mercado">
			<option value="" multiple>Todos</option>
			<? 
			//Conexão com banco puxar usuário único
			$sql_prod = mysql_query("SELECT DISTINCT cod_prod, descricao_prod  FROM tab_quebra_prod  ORDER BY cod_prod ");
			$cont_prdo = mysql_num_rows($sql_prod);
			while($linha_prod = mysql_fetch_array($sql_prod)){ 
			$cod_prod = $linha_prod['cod_prod'];
			?>
				<option value="<? echo $cod_prod ?>" multiple>
					<? echo utf8_encode($linha_prod['descricao_prod']) ?>
				</option>
			<? }?>
			</select>
		</td>
	</tr>
	<tr>
		<td> Email</td>
		<td align="left">
			<input type="text" name="email" maxlength="1000" size="39" />
		</td>
	</tr>
	<tr>
		<td> Mensagem</td>
		<td align="left">
			<textarea name="msg_email" cols="70" rows="3"></textarea>
		</td>
	</tr>
	
	<tr>
		<td>
			<input type="submit" name="submit" value="OK">
		</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>

</table>
</form>

<? }?>

<!-- ************************************************************************************************************************************* 
											FIM REL QUEBRA
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