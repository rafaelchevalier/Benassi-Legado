<?
session_start();
require "topo.php";
require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$pg = $_GET['pg'];
$tipo = $_REQUEST['tipo'];
$id_mercado = $_SESSION['mercado_id'];
$id_usuario_logado = $_SESSION['id_usuario'];
$pagina_atual = "quebra.php";
$cod_tab_cab = $_SESSION['mercado_cod_tab'];
$id_tab_cab = consulta_id_tab_existente($cod_tab_cab);
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
<h2><p> REGISTRO DE QUEBRA</p></h2>
<!-- ************************************************************************************************************************************* 
											CADASTRO QUEBRA
****************************************************************************************************************************************** -->
<?	if ( isset($_SESSION['mercado_cnpj']) and $pg =="tipo" ) {//Tipo 
?>
	
	<h1>O sistema mudou, agora para você lançar suas quebras ou inventários, os produtos estão separados por grupo escolher o grupo de produtos para lançar os itens desejados.</h1>
	
	<form id="frmcadastro" name="frmcadastro" method="post" action="?pg=cad" >
		<table width="90%" border="2" align="center" id="tbcad" >
			<tr>
				<td colspan="3">
					<h1>Escolha um tipo</h1>
				</td>
			</tr>
			<tr>
				<td>
					<h1>Grupo de Produtos</h1>
				</td>
				<td>
					<h1>Quebra</h1>
				</td>
				<td>
					<h1>Inventário</h1>
				</td>
				
			</tr>
			<tr>
				<td>
					<select name="grupo_prod" size="1" id="nome">
					<? // Consulta para buscar nomes de usuários 
					$sql_filtro = mysql_query("SELECT DISTINCT id,nome FROM tb_grupo_produto ORDER BY nome ");
					$cont_filtro = mysql_num_rows($sql_filtro);
					while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
					?>
					<? if ($linha_filtro['nome'] != ""){?>
					<option value="<? echo $linha_filtro['id'] ?>" multiple ><? echo utf8_encode($linha_filtro['nome']) ?></option>
					   <? }
					   }?>
					</select>
				</td>
				<td>
					<input name="tipo" type="radio" CHECKED value="2">
				</td>
				<td>
					<input name="tipo" type="radio" value="1">
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
				</td>
			</tr>
		</table>
	</form>
<? }?>
<?	if ( isset($_SESSION['mercado_cnpj']) and $pg =="cad" ) {//Cadastro ?>
	<h1>Cadastro Tabela MIX</h1> 
	<form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=cad_quebra" > 
	<!-- <form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=teste" > -->
		<table width="90%" border="2" align="center" id="tbcad" >
			<? 
			
			//Antes de carregar o mix para lançamento, verifica se a variavel t=(tipo) é 0=(quebra) ou 1(inventário) 
			//caso não não seja uma das opções válidas retorna a página anterior para preenchimento. 
			if($tipo!="2" and $tipo!="1" ){
				echo"
					<META HTTP-EQUIV=REFRESH content='0; URL=$pagina_atual?pg=tipo'>
					<script type=\"text/javascript\">	
						alert(\"O tipo de lançamento precisa ser informado. Você será redirecionado para a página correta!\");
					</script>
				";
				stop();
			}
			?>
			<input type="hidden" name="tipo"value="<? echo $tipo ?>"/>
			<?switch($tipo){
				case 2:
					echo "<h1>Quebra</h1>";
				break;
				case 1:
					echo "<h1>Inventário</h1>";
				break;
				default:	
					echo "<h1>Erro Tipo não identificado.</h1>";
				break;
			}?>
			<?
			// Consulta cabeçalho
			$sql_cab = mysql_query("SELECT * FROM tab_mix_produtos_cab  
									WHERE cod_tab ='$cod_tab_cab'
									LIMIT  1");
			while($linha = mysql_fetch_array($sql_cab)){ 
			?>	
				<tr>
					<td>
						<div align="right"><h1>Data:</h1></div>
					</td>
					<td align="left" >
						<h1><input name="data" id="data1" type="text" size="6" maxlength="10" readonly="readonly" value="<? echo $data_atual?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/></h2>
						<h1><input name="cod_tab_mix" type="hidden" size="6" maxlength="10" readonly="readonly" value="<? echo $cod_tab_cab?>"/></h2>
					</td>
					<td  colspan="5"><h1><? echo busca_nome_mercado($_SESSION['mercado_id']);?></h1></td>
				
				</tr>
			<? }//Fim consulta dados tabela cabeçalho ?>
			<tr>
				<th colspan="2" ><h1>Cod.</h1></th>
				<th colspan="3"	><h1>Produto</h1></th>
				<th colspan="1"	><h1>Quantidade</h1></th>
			</tr>
			<?
			
			$grupo_prod = $_REQUEST['grupo_prod'];
			
			$qt_prod=0;
			
			$sql_prod = mysql_query("SELECT * FROM tab_mix_produtos_prod  
									WHERE id_cab ='$id_tab_cab'
									AND id_grupo_produto = '$grupo_prod'
									AND custo > '0'
									ORDER BY nome_produto ");
			while($linha_prod = mysql_fetch_array($sql_prod)){ 
			?>
				<tr>
					<td colspan="2">
						<input type="hidden" name="cod_produto<? echo $qt_prod; ?>"value="<? echo $linha_prod['cod_produto']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
						<input type="hidden" name="custo<? echo $qt_prod; ?>"value="<? echo $linha_prod['custo']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
						<input type="hidden" name="venda<? echo $qt_prod; ?>"value="<? echo $linha_prod['venda']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
						<h1><? echo $linha_prod['cod_produto']; ?></h1>		
					</td>
					<td colspan="3">
						<input type="hidden" size="100" name="nome_produto<? echo $qt_prod; ?>"value="<h2><? echo utf8_encode($linha_prod['nome_produto']); ?></h2>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
						<h1><? echo utf8_encode($linha_prod['nome_produto']); ?></h1>
					</td>
					<td colspan="1">
						<h1><input type="text" size="5" maxlength="5" name="quebra<? echo $qt_prod;?>" value="" onkeypress="autoTab(this, event); return event.keyCode != 13; "/></h1>
					</td>
				</tr>
				<? 
				$qt_prod ++;
			}?>
			<? if($_REQUEST['tipo'] == '1'){?>
				<tr>
					<td>
						Observações.
					</td>
					<td colspan="5">
						<textarea name="obs" cols="55" rows="10" ></textarea>
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
											FIM CADASTRO QUEBRA
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											ALTERA QUEBRA
****************************************************************************************************************************************** -->
<? 
	if ( isset($_SESSION['mercado_cnpj']) and $pg =="alt") {//Cadastro 
	$id_quebra_cab = $_GET['id'];  
		
?>

 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=12&qt=<? echo $qt;?>" >
 <table width="90%" border="2" align="center" id="tbcad" >
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
		<td  colspan="5">
			<? echo busca_nome_mercado($linha['id_mercado_cad']);?>
		</td>
	
	</tr>
	<? }//Fim consulta dados tabela cabeçalho ?>
	<tr>
		<th colspan="2" >Cod.</th>
		<th colspan="3"	>Produto</th>
		<th colspan="1"	>Quantidade</th>
	</tr>
	<?
	$qt=0;
	$sql_prod = mysql_query("SELECT * FROM tab_quebra_prod  
							WHERE id_cab ='$id_quebra_cab'
							AND custo > '0'
							ORDER BY descricao_prod");
	while($linha_prod = mysql_fetch_array($sql_prod)){ 
	$qt ++;
	?>
	<tr>
		<td colspan="2">
			<input type="hidden" name="cod_produto<? echo $qt; ?>"value="<? echo $linha_prod['cod_prod']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<input type="hidden" name="custo<? echo $qt; ?>"value="<? echo $linha_prod['custo']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
			<input type="hidden" name="venda<? echo $qt; ?>"value="<? echo $linha_prod['venda']; ?>" onkeypress="autoTab(this, event); return event.keyCode != 13; "/>
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
	</tr>
	<? }?>
	<? if($_REQUEST['tipo'] == '1'){?>
   <tr>
		<td>
			Observações.
		</td>
		<td colspan="5">
			<textarea name="obs" cols="55" rows="10" ><? echo $obs; ?></textarea>
		</td>
   <tr>
	<? }?>
 </table>
  </form>	
  <? }?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA QUEBRA
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CONSULTA QUEBRA
****************************************************************************************************************************************** -->

<? if ( isset($_SESSION['mercado_cnpj']) and $pg =="con") {//Cadastro ?>

<form action="quebra.php?pg=con" method="post" enctype="multipart/form-data">
<table width="90%" border="0" cellspacing="0" align="center">
  <tr>
    <td width="110" align="right">Data Inicial</td>
    <td width="87"><input name="data1" id="data1" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10" ></td>
    <td width="180" align="right">Data Final</td>
    <td width="165"><input name="data2" id="data2" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10"></td>
  </tr>
  <tr>
	<td colspan="2">
		<h1>Quebra</h1><input name="tipo" type="radio" value="2">
	</td>
	<td colspan="2">
		<h1>Inventário</h1><input name="tipo" type="radio" value="1">
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

	<table id="tabela_servidor" bgcolor="#666666" border="0" align="center">
		<!-- CABEÇALHO CONSULTA -->
		<tr>
			<th colspan="3">
				<? if($_POST['data1'] != "" AND $_POST['data2'] != ""){
					echo "Período: ". $_POST['data1']. " - ". $_POST['data2'];
				 }?>
			</th>
		</tr>
		<tr>
			<th width="100px">OPÇÃO</th>
			<th width="100px">DATA</th>
			<th width="100px">TIPO</th>
		</tr>
		
		<!-- INICIO CONSULTA -->
		<? 
		require "include/conexao.php";
		$data1 = converte_data($_POST['data1']);
		$data2 = converte_data($_POST['data2']);
		if(!empty($_POST['tipo'])){
			$tipo = "AND tipo ='".$_POST['tipo']."'";
			}
		if(empty($_POST['tipo'])){
			$tipo ="";
		}
		
		$sql = mysql_query("
							SELECT * FROM tab_quebra_cab  
							WHERE id_mercado_cad = '$id_mercado'
							AND data_cad BETWEEN ('$data1') AND ('$data2')
							$tipo
							
							LIMIT 1000
						  ");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){
		?>
		<tr>
			<td>
				<a href="?pg=alt&id=<? echo $linha['id']?>"> 
					<img src="images/Artistica/page_edit.png" width="25px" alt="altera" />
				</a>
				<a href="quebra_pdf.php?id=<? echo $linha['id']?>"> 
					<img src="images/pdf.png" width="25px" alt="altera" />
				</a>
			</td>
			<td><? echo converte_data($linha['data_cad'])?></td>
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
		<? }?>
	
	</table>	
	<script> zebra('tabela_servidor', 'zebra'); </script>
<? }?>

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