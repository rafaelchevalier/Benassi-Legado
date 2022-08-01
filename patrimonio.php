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
  <!-- ***********************  cadastro Patrimonio************************* -->   
	<?
	if ( isset($_SESSION['login_usuario']) and $pg == "cad_patrimonio" and $filt_patrimonio_inclui == "1") {//Cadastro de Administradores  
	 require"include/conexao.php";
	$data_atual = date("d/m/Y");
	?>
<h2>Cadastro patrimônio</h2>  
	 <form id="frm_cad_patrimonio" name="frm_cad_patrimonio" method="post" action="include/adiciona.php?funcao=adiciona_patrimonio" style="text-align:right">
     
 <table width="450" border="0" align="center" cellspacing="0" id="tab_patrimonio">
   <tr>
     <td width="160"><div align="right">Patrimônio:</div></td>
     <td width="280"><input name="num_patrimonio" type="text" id="cadpatrimonio" value="" maxlength="20" size="37" />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório">
   </tr>
   <tr>
     <td><div align="right">Tipo:</div></td>
     <td><input type="text" name="categoria" id="categoria" maxlength="50" size="37"  />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório">
     </td>
   </tr>
   <tr>
     <td><div align="right">Descrição:</div></td>
     <td><input type="text" name="descricao" id="descricao" maxlength="200" size="37"  />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório">
     </td>
   </tr>
   <tr>
     <td><div align="right">Numero de Série:</div></td>
     <td><input type="text" name="num_serie" id="num_serie" maxlength="200" size="37"  /></td>
   </tr>
   <tr>
     <td><div align="right">Fornecedor:</div></td>
     <td><input type="text" name="fornecedor" id="fornecedor" maxlength="100" size="37" />&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr>
   	<td><div align="right">Fim Garantia</div></td>
    <td><input name="data_garantia" id="data_10" value="<? echo $data_atual; ?>" size="15" maxlength="10" readonly="readonly" /></td>
   </tr>
   <tr>
     <td><div align="right">Local:</div></td>
     <td align="left">
     		<!-- Puxa nomes das empresas cadastradas no BD -->
     	<select name="local" size="1"> 
     		<?   
	  		require "include/conexao.php";
		   	$sql_login = mysql_query("SELECT * FROM lojas ORDER BY loja ");
			$cont2 = mysql_num_rows($sql_login);
			while($linha2 = mysql_fetch_array($sql_login)){	

			?>
         
        
          <option value="<? echo $linha2['loja'] ?>" onChange="<? $mercado = $linha2['loja']; ?>"> <? echo $linha2['loja'] ?></option>  

       <?  } ?>
    </select>&nbsp;&nbsp;&nbsp;
    <a href="#"><img src="images/soma1.png" width="20" alt="Adiciona empresa" ></a>
    <!-- Fim puxa nomes das empresas cadastradas no BD -->   
     </td>
   </tr>
   <tr>
     <td><div align="right">Sala:</div></td>
     <td><input name="sala" type="text" id="sala" value="" maxlength="30" size="37" />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório"> </td>
   </tr>
   <tr>
     <td><div align="right">Valor:</div></td>
     <td><input name="valor" type="text" id="valor" value="" maxlength="30" size="37" />
       <img src="images/exc.png" width="15" alt="Campo Obrigatório"></td>
   </tr>
   <tr>
   <tr>
     <td><div align="right">NFE:</div></td>
     <td><input name="nfe" type="text" id="nfe" value="" maxlength="30" size="22" /> Série <input name="serie" type="text" id="serie" value="" maxlength="3" size="4" /> &nbsp;&nbsp;</td>
   </tr>
   <tr>
     <td><div align="right">Situação:</div></td>
     <td><input name="situacao" id="situcao" type="text" value="" maxlength="30" size="37" />&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr>
     <td height="26"><div align="right">Data Compra:</div></td>
     <td><input name="data_compra" type="text" id="data1" value="<? echo $data_atual; ?>" size="37" maxlength="10" readonly="readonly" />&nbsp;&nbsp;&nbsp; </td>
   </tr>
   <tr>
     <td><div align="right">Categoria Depreciação</div></td>
     <td><!-- Puxa nomes das categoria cadastradas no BD -->
     	<select name="categoria_depreciacao" size="1" id="categoria_depreciacao"> 
     		<?   
	  		require "include/conexao.php";
		   	$sql_tab = mysql_query("SELECT * FROM tab_depreciacao ORDER BY categoria ");
			$cont2 = mysql_num_rows($sql_tab);
			while($linha_tab = mysql_fetch_array($sql_tab)){	

			?>
         
        
          <option value="<? echo $linha_tab['categoria'] ?>" onChange="<? $categoria = $linha_tab['categoria']; ?>"> <? echo utf8_encode($linha_tab['categoria']) ?></option>  

       <?  } ?>
    </select>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <!-- <tr>
     <td><div align="right">baixa:</div></td>
     <td>
     Sim<input type="radio" name="baixa" id="baixa" value="1"/>
     Não<input type="radio" name="baixa" id="baixa" value="1"/>
     </td>
   </tr>
   <tr>
     <td><div align="right">Data Baixa:</div></td>
     <td><input name="data_baixa" id="data_baixa" type="text" value="" maxlength="30" size="37" /> </td>
   </tr>
   <tr>
     <td><div align="right">Motivo baixa:</div></td>
     <td><input name="motivo_baixa" id="motivo_baixa" type="text" value="" maxlength="30" size="37" /> </td>
   </tr> -->
     <td colspan="2"><div align="center">
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input name="nome_usuario" type="text" id="nome_usuario" value="<? echo $_SESSION['nome_usuario'];?>" size="1" maxlength="30" readonly="readonly" hidden="true"  />
      </div></td>
   </tr>
 </table>
</form>	<? }?>
<!-- *********************** fim  cadastro Patrimonio ************************* -->
 <!-- ***********************  Altera Patrimonio************************* -->   
	<?
	if ( isset($_SESSION['login_usuario']) and $pg == "alt_patrimonio" and $filt_patrimonio_altera == "1") {//Cadastro de Administradores  
	 include"include/conexao.php";
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM inventario where id='$id' ");
		while($linha = mysql_fetch_array($sql)){	 
	$data_atual = date("d/m/Y");
	?>
		<h2>Altera patrimônio</h2>  
<form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=altera_patrimonio&id=<? echo $id ?>" style="text-align:right">
       
       <table width="450" border="0" align="center" cellspacing="0" id="tab_patrimonio">
   <tr>
     <td width="160"><div align="right">Patrimônio:</div></td>
     <td width="280"><input name="num_patrimonio" type="text" id="cadpatrimonio" value="<? echo $linha['num_patrimonio']?>" size="37" maxlength="20" />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório">
   </tr>
   <tr>
     <td><div align="right">Tipo:</div></td>
     <td><input name="categoria" type="text" id="categoria" value="<? echo $linha['categoria']?>" size="37" maxlength="50"  />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório">
     </td>
   </tr>
   <tr>
     <td><div align="right">Descrição:</div></td>
     <td><input name="descricao" type="text" id="descricao" value="<? echo $linha['descricao']?>" size="37" maxlength="200"  />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório">
     </td>
   </tr>
   <tr>
     <td><div align="right">Numero de Série:</div></td>
     <td><input name="num_serie" type="text" id="num_serie" value="<? echo $linha['num_serie']?>" size="37" maxlength="200"  /></td>
   </tr>
   <tr>
     <td><div align="right">Fornecedor:</div></td>
     <td><input name="fornecedor" type="text" id="fornecedor" value="<? echo $linha['fornecedor']?>" size="37" maxlength="100" />&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr>
   	<td><div align="right">Fim Garantia</div></td>
    <td><input name="data_garantia" id="data_10" value="<? echo converte_data($linha['data_garantia']); ?>" size="15" maxlength="10" readonly="readonly" /></td>
   </tr>
   <tr>
     <td><div align="right">Local:</div></td>
     <td align="left">
     		<!-- Puxa nomes das empresas cadastradas no BD -->
            <select name="local" size="1"> 
         <?   
	  		require "include/conexao.php";
		   	$sql_login = mysql_query("SELECT * FROM lojas ");
			$cont2 = mysql_num_rows($sql_login);
			while($linha2 = mysql_fetch_array($sql_login)){	
			?>
         <option value="<? echo $linha2['loja'] ?>" onChange="<? $mercado = $linha2['loja']; ?>"  <? if ($linha['local'] == $linha2['loja']){?> selected <? } ?> > 
           <? echo $linha2['loja'] ?>
           </option>  
         <?  } ?>
         </select>
    <a href="#"><img src="images/soma1.png" width="20" alt="Adiciona empresa" ></a>
    <!-- Fim puxa nomes das empresas cadastradas no BD -->   
     </td>
   </tr>
   <tr>
     <td><div align="right">Sala:</div></td>
     <td><input name="sala" type="text" id="sala" value="<? echo $linha['sala']?>" maxlength="30" size="37" />
     <img src="images/exc.png" width="15" alt="Campo Obrigatório"> </td>
   </tr>
   <tr>
     <td><div align="right">Valor:</div></td>
     <td><input name="valor" type="text" id="valor" value="<? echo $linha['valor']?>" maxlength="30" size="37" />
       <img src="images/exc.png" width="15" alt="Campo Obrigatório"></td>
   </tr>
   <tr>
   <tr>
     <td><div align="right">NFE:</div></td>
     <td><input name="nfe" type="text" id="nfe" value="<? echo $linha['nfe']?>" maxlength="30" size="22" /> Série <input name="serie" type="text" id="serie" value="<? echo $linha['serie']?>" maxlength="3" size="4" /> &nbsp;&nbsp;</td>
   </tr>
   <tr>
     <td><div align="right">Situação:</div></td>
     <td><input name="situacao" id="situcao" type="text" value="<? echo $linha['situacao']?>" maxlength="30" size="37" />&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <tr>
     <td height="26"><div align="right">Data Compra:</div></td>
     <td><input name="data_compra" type="text" id="data1" value="<? echo converte_data($linha['data_compra']) ?>" size="37" maxlength="10" readonly="readonly" />&nbsp;&nbsp;&nbsp; </td>
   </tr>
   <tr>
     <td><div align="right">Categoria Depreciação</div></td>
     <td><!-- Puxa nomes das categoria cadastradas no BD -->
     	<select name="categoria_depreciacao" size="1" id="categoria_depreciacao"> 
     		<?   
	  		require "include/conexao.php";
		   	$sql_tab = mysql_query("SELECT * FROM tab_depreciacao ORDER BY categoria ");
			$cont2 = mysql_num_rows($sql_tab);
			while($linha_tab = mysql_fetch_array($sql_tab)){	

			?>
         
        
          <option value="<? echo $linha_tab['categoria'] ?>" onChange="<? $categoria = $linha_tab['categoria']; ?>"> <? echo utf8_encode($linha_tab['categoria']) ?></option>  

       <?  } ?>
    </select>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   <!-- <tr>
     <td><div align="right">baixa:</div></td>
     <td>
     Sim<input type="radio" name="baixa" id="baixa" value="1"/>
     Não<input type="radio" name="baixa" id="baixa" value="1"/>
     </td>
   </tr>
   <tr>
     <td><div align="right">Data Baixa:</div></td>
     <td><input name="data_baixa" id="data_baixa" type="text" value="" maxlength="30" size="37" /> </td>
   </tr>
   <tr>
     <td><div align="right">Motivo baixa:</div></td>
     <td><input name="motivo_baixa" id="motivo_baixa" type="text" value="" maxlength="30" size="37" /> </td>
   </tr> -->
     <td colspan="2"><div align="center">
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input name="nome_usuario" type="text" id="nome_usuario" value="<? echo $_SESSION['nome_usuario'];?>" size="1" maxlength="30" readonly="readonly" hidden="true"  />
      </div></td>
   </tr>
 </table>
</form>
     
  
  <? }} ?>
<!-- *********************** fim  Altera Patrimonio ************************* -->
<?  if ( isset($_SESSION['login_usuario']) and $pg == "rel_patrimonio" and $filt_patrimonio_rel == "1") {//relatório dos patrimonio
$data1 = $_REQUEST['data_filtro1'];
	//Conexão com banco para filtros
	$sql_filtro = mysql_query("SELECT * FROM inventario ORDER BY num_patrimonio ");
	$cont_filtro = mysql_num_rows($sql_filtro);
?>
<h2>Consulta patrimônio</h2>
<!-- *********************** Filtro Patrimonio************************* --> 
 <form id="frm_filt_patrimonio" name="frm_filt_patrimonio" action="patrimonio.php?pg=rel_patrimonio" method="post" enctype="multipart/form-data">
<table border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="2" >Filtros</td>
  </tr>
  <tr>
  	<td>Patrimônio</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="1"  
     onClick="document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_patrimonio.disabled = 0;
              document.frm_filt_patrimonio.filt_completo.disabled = 1;"
              
    >
    <select name="filt_patrimonio" size="1" disabled>
	<? 
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['num_patrimonio'] != ""){?>
    <option value="<? echo $linha_filtro['num_patrimonio'] ?>" multiple><? echo $linha_filtro['num_patrimonio'] ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
 
  <tr>
  	<td>Categoria</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="2" 
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_categoria.disabled = 0;
              document.frm_filt_patrimonio.filt_completo.disabled = 1;"
              >
    <select name="filt_categoria" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT categoria FROM inventario ORDER BY categoria ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['categoria'] != ""){?>
    <option value="<? echo utf8_encode($linha_filtro['categoria']) ?>" multiple ><? echo utf8_encode($linha_filtro['categoria']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Fornecedor</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="3"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 0;"
              >
    <select name="filt_fornecedor" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT fornecedor FROM inventario ORDER BY fornecedor ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['fornecedor'] != ""){?>
    <option value="<? echo $linha_filtro['fornecedor'] ?>" multiple ><? echo utf8_encode($linha_filtro['fornecedor']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Local</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="4"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 0;"
              >
    <select name="filt_local" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT local FROM inventario ORDER BY local ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['local'] != ""){?>
    <option value="<? echo $linha_filtro['local'] ?>" multiple ><? echo utf8_encode($linha_filtro['local']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Sala</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="5"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 0;"
              >
    <select name="filt_sala" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT sala FROM inventario ORDER BY sala ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['sala'] != ""){?>
    <option value="<? echo $linha_filtro['sala'] ?>" multiple ><? echo utf8_encode($linha_filtro['sala']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>NFE</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="6"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 0;"
              >
    <select name="filt_nfe" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT nfe FROM inventario ORDER BY nfe ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['nfe'] != ""){?>
    <option value="<? echo $linha_filtro['nfe'] ?>" multiple ><? echo utf8_encode($linha_filtro['nfe']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Completo</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="7" checked
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;"
              >
    </td>
   <tr>
  	<td colspan="2"> <a href="?pg=rel_patrimonio2" >Valor Patrimonial por Local</a></td>
  </tr>

  </tr>
  <tr>
  	<td colspan="2"><input type="image" src="images/pesq.gif" name="btcadastrar2" id="btcadastrar2" value="Pesquisar" /></td>
  </tr>
</table>
</form>
  
<!-- *********************** Fim filtro Patrimonio ************************* --> 
<!-- *********************** exibe Patrimonio ************************* --> 
<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>

 <table width="100%" border="0" id="tabela_servidor" align="center" >
  <tr>
		<? if ($filt_patrimonio_exclui == 1 or $filt_patrimonio_altera == 1){ /*FILTRO PARA LIBERAR APENAS PARA USUÁRIOS COM NÍVEL DE ACESSO MASTER*/ ?>
    <th width="8%">OPÇÃO&nbsp;</th>
		<? } ?>
	<th width="9%" id="th_mercado">PATRIMÔNIO.&nbsp;</th>
    <th width="10%" id="th_data_cont">CATEGORIA.&nbsp;</th>
    <th width="9%" id="th_data_cont">DESCRIÇÃO.&nbsp;</th>
    <th width="11%" id="th_estoque">FORNECEDOR.&nbsp;</th>
	<th width="8%" id="th_mercado">LOCAL.&nbsp;</th>
    <th width="5%" id="th_estoque">SALA.&nbsp;</th>
    <th width="6%" id="th_funcionario">VALOR.&nbsp;</th>
    <th width="6%" id="th_funcionario">NFE.&nbsp;</th>
    <th width="8%" id="th_estoque">SITUAÇÃO.&nbsp;</th>
    <th width="8%" id="th_estoque">NUM. SÉRIE.&nbsp;</th>
    <th width="9%" id="th_data_cad">DATA COMPRA.&nbsp;</th>
	<? if ($filt_baixa_patrimonio == 1){?>
        <th width="6%" id="th_data_cad">DATA BAIXA.&nbsp;</th>
        <th width="7%" id="th_data_cad">TIPO BAIXA.&nbsp;</th> 
        <th width="7%" id="th_data_cad">MOTIVO BAIXA.&nbsp;</th> 
    <? }?>

  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
$filt_completo = $_POST['filt_completo'];
$filt_categoria = $_POST['filt_categoria'];
$filt_patrimonio = $_POST['filt_patrimonio'];
$filt_fornecedor = $_POST['filt_fornecedor'];
$filt_local = $_POST['filt_local'];
$filt_sala = $_POST['filt_sala'];
$filt_nfe = $_POST['filt_nfe'];
switch ($_POST['opcao_filt']){// Teste qual filtro utiizado
		case '1':
		$sql = mysql_query("SELECT * FROM inventario WHERE num_patrimonio LIKE ('$filt_patrimonio') ");		
		break;
		case '2':
		$sql = mysql_query("SELECT * FROM inventario WHERE categoria LIKE ('$filt_categoria') ");
		break;
		case '3':
		$sql = mysql_query("SELECT * FROM inventario WHERE fornecedor LIKE ('$filt_fornecedor') ");
		break;
		case'4':
		$sql = mysql_query("SELECT * FROM inventario WHERE local LIKE ('$filt_local') ");
		break;
		case'5':
		$sql = mysql_query("SELECT * FROM inventario WHERE sala LIKE ('$filt_sala') ");
		break;
		case'6':
		$sql = mysql_query("SELECT * FROM inventario WHERE nfe LIKE ('$filt_nfe') ");
		break;
		default:
		
		break;
			
}


$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$categoria = $linha['categoria'];
	$descricao = $linha['descricao'];
	$num_patrimonio = $linha['num_patrimonio'];
	$fornecedor = $linha['fornecedor'];
	$sala = $linha['sala'];
	$local = $linha['local'];
	$valor = $linha['valor'];
	$nfe = $linha['nfe'];
	$situacao = $linha['situacao'];
	$data_compra = $linha['data_compra'];
	$data_baixa = $linha['data_baixa'];
	$motivo_baixa = $linha['motivo_baixa'];
	$baixa = $linha['baixa'];
	$tipo_baixa = $linha['tipo_baixa'];	
	$valor_total == "0";
	$quantidade_filt == "0";
	$serie = $linha['serie'];
	
	switch ($tipo_baixa){
		case "1";
		$tipo_baixa = "MANUTENÇÃO";
		break;
		
		case "2";
		$tipo_baixa = "DESCARTE";
		break;
		
		default:
		$tipo_baixa = "teste";
		break;
		
		
	}
if ($baixa == "0")$baixa2 = "Não";
else $baixa2 = "Sim";
?>
    <tr>
		<? if ($filt_patrimonio_exclui == 1 or $filt_patrimonio_altera == 1) {//Filtro apara exibir o botão alterar ou excluir apenas para usuário master  ?>
				<td > 
                	<? if ($filt_patrimonio_altera == "1"){?>
                	<a href="patrimonio.php?pg=alt_patrimonio&id=<? echo $id ?>"><img src="images/edit_notes.png" alt="excluir" width="15"></a>
                    <? }?>
                    <? if($filt_patrimonio_exclui == "1"){?>
                	<a href="include/excluir.php?funcao=excluir_patrimonio&id=<? echo $id ?>"><img src="images/delete.png" alt="excluir" width="15"></a>
                    <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="11%">&nbsp;&nbsp;&nbsp;<? echo $num_patrimonio; ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="10%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($categoria) ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="9%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($descricao)
 ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="11%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($fornecedor) ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="6%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($local)  ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($sala) ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="6%">&nbsp;&nbsp;&nbsp;R$<? echo number_format($valor,2,",","."); ?>&nbsp;&nbsp;&nbsp;</td>    
    <td width="8%">&nbsp;&nbsp;&nbsp;<? echo $nfe,"-",$serie ?>&nbsp;&nbsp;&nbsp;</td>    
    <td width="8%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($situacao) ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="8%">&nbsp;&nbsp;&nbsp;<? echo $linha['num_serie']; ?>&nbsp;&nbsp;&nbsp;</td>    
    <td width="9%">&nbsp;&nbsp;&nbsp;<? echo converte_data($data_compra) ?>&nbsp;&nbsp;&nbsp;</td>
<? if($baixa == "1"  and $filt_baixa_patrimonio == 1 ){ ?>
   	<td width="6%">&nbsp;&nbsp;&nbsp;<? echo converte_data($data_baixa) ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="6%">&nbsp;&nbsp;&nbsp;<? echo $tipo_baixa ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="7%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($motivo_baixa) ?>&nbsp;&nbsp;&nbsp;</td>
<? } ?>    
<? if($baixa != "1" and $filt_baixa_patrimonio == 1 ){?>
    <td width="6%" colspan="3">&nbsp;&nbsp;&nbsp; <a href="baixa.php?id=<? echo $id ?>&num_patrimonio=<? echo $num_patrimonio ?>">Baixar Patrimônio</a>&nbsp;&nbsp;&nbsp;</td>
<? } ?> 
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 $valor_total = $valor_total + $valor;
	  
	 }//fecha while($linha = mysql_fetch_array($sql))	    
	  ?>
	  <tr>
    <th width="11%" id="th_mercado" colspan="2">&nbsp;<? echo "Total itens: ",$quantidade_filt;?>&nbsp;</th>
	<th width="11%" id="th_mercado" colspan="13">&nbsp;<? echo "Valor Total: R$",number_format($valor_total,2,",",".");?>&nbsp;</th>

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe Contagem ************************* -->
<!-- *********************** Relatorio PDF Patrimonio ************************* --> 
<?  if ( isset($_SESSION['login_usuario']) and $pg == "rel_patrimonio_pdf" and $filt_patrimonio_rel == "1") {//relatório dos patrimonio ?>
 <form id="frm_filt_patrimonio" name="frm_filt_patrimonio" action="patrimonio_rel.php" method="post" enctype="multipart/form-data">
<table border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="2" >Filtros</td>
  </tr>
  <tr>
  	<td>Patrimônio</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="1"  
     onClick="document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_patrimonio.disabled = 0;
              document.frm_filt_patrimonio.filt_completo.disabled = 1;"
              
    >
    <select name="filt_patrimonio" size="1" disabled>
	<? 
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['num_patrimonio'] != ""){?>
    <option value="<? echo $linha_filtro['num_patrimonio'] ?>" multiple><? echo $linha_filtro['num_patrimonio'] ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
 
  <tr>
  	<td>Categoria</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="2" 
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_categoria.disabled = 0;
              document.frm_filt_patrimonio.filt_completo.disabled = 1;"
              >
    <select name="filt_categoria" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT categoria FROM inventario ORDER BY categoria ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['categoria'] != ""){?>
    <option value="<? echo $linha_filtro['categoria'] ?>" multiple ><? echo utf8_encode($linha_filtro['categoria']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Fornecedor</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="3"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 0;"
              >
    <select name="filt_fornecedor" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT fornecedor FROM inventario ORDER BY fornecedor ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['fornecedor'] != ""){?>
    <option value="<? echo $linha_filtro['fornecedor'] ?>" multiple ><? echo utf8_encode($linha_filtro['fornecedor']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Local</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="4"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 0;"
              >
    <select name="filt_local" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT local FROM inventario ORDER BY local ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['local'] != ""){?>
    <option value="<? echo $linha_filtro['local'] ?>" multiple ><? echo utf8_encode($linha_filtro['local']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Sala</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="5"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 0;"
              >
    <select name="filt_sala" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT sala FROM inventario ORDER BY sala ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['sala'] != ""){?>
    <option value="<? echo $linha_filtro['sala'] ?>" multiple ><? echo utf8_encode($linha_filtro['sala']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>NFE</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="6"
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 0;"
              >
    <select name="filt_nfe" size="1" disabled>
	<? 
	$sql_filtro = mysql_query("SELECT DISTINCT nfe FROM inventario ORDER BY nfe ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['nfe'] != ""){?>
    <option value="<? echo $linha_filtro['nfe'] ?>" multiple ><? echo utf8_encode($linha_filtro['nfe']) ?></option>
       <? }}?>
    </select>
    </td>
  </tr>
  <tr>
  	<td>Completo</td>
    <td align="left">
    <input name="opcao_filt" type="radio" value="7" checked
     onClick="document.frm_filt_patrimonio.filt_patrimonio.disabled = 1;
  			   document.frm_filt_patrimonio.filt_categoria.disabled = 1;
              document.frm_filt_patrimonio.filt_fornecedor.disabled = 1;
              document.frm_filt_patrimonio.filt_local.disabled = 1;
              document.frm_filt_patrimonio.filt_sala.disabled = 1;
              document.frm_filt_patrimonio.filt_nfe.disabled = 1;"
              >
    </td>
  </tr>
  <tr>
  	<td colspan="2"><input type="image" src="images/pesq.gif" name="btcadastrar2" id="btcadastrar2" value="Pesquisar" /></td>
  </tr>
</table>
</form>
  <? }?>
<!-- *********************** Fim relatorio PDF Patrimonio ************************* -->



<!-- ***********************************************************************************************************
		Formulários de Requisição patrimonial
************************************************************************************************************* -->
<!-- ***********************  FORMULÁRIO DE AQUISIÇÃO PATRIMONIAL ************************* --> 
        	      
		<?
	if ($filt_chamado_menu == 1 and $pg == "form_aquisicao") {//Cadastro de Plano de Ação  
$id = $_GET['id'];	
	?>
<h1>Aquisição Patrimonial</h1><form id="frmcadastro" name="frmcadastro" method="post" action="include/patrimonio.php?funcao=aquisicao_patrimonio" >
<input type="hidden" value="<? echo $nome_usuario_logado ?>" name="usuario_logado"/ >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">NUM. NFE</div></td>
     <td align="left"><input type="text" name="num_nfe" id="num_nfe" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">LOCAL</div></td> 
     <td align="left"><select name="local" size="1" id="local"> 
         <?   
	  		require "include/conexao.php";
		   	$sql_login = mysql_query("SELECT * FROM lojas ");
			$cont2 = mysql_num_rows($sql_login);
			while($linha2 = mysql_fetch_array($sql_login)){	
			?>
         <option value="<? echo $linha2['loja'] ?>" onChange="<? $mercado = $linha2['loja']; ?>"  <? if ($linha['local'] == $linha2['loja']){?> selected <? } ?> > 
           <? echo $linha2['loja'] ?>
           </option>  
         <?  } ?>
        </select></td>
   </tr>
   
   <tr>
     <td><div align="right">SALA</div></td>
     <td align="left"><input type="text" name="sala" id="sala" maxlength="30" size="31"  /></td>
   </tr>
   
   </tr>
   <tr>
     <td><div align="left">DATA AQUISIÇÃO</div></td>
     <td align="left"><input name="data_aquisicao" type="text" value="<? echo $data_atual;?>" id="data1" size="15" maxlength="10" readonly="readonly"  /></td>
   </tr>
   <tr>
     <td><div align="right">OBSERVAÇÕES</div></td>
     <td align="left"><textarea name="obs" cols="25" id="obs"></textarea></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
    </table>
  </form>	<? } ?>
<!-- *********************** FIM FORMULÁRIO DE AQUISIÇÃO PATRIMONIAL ************************* -->

<!-- ***********************  FORMULÁRIO DE MANUTENÇÃO PATRIMONIAL ************************* --> 
        	      
		<?
	if ($filt_chamado_menu == 1 and $pg == "form_manutencao") {//Cadastro de Plano de Ação  
$id = $_GET['id'];	
	?>
<h1>Formulário para envio de patrimônio para Manutenção</h1><form id="frmcadastro" name="frmcadastro" method="post" action="include/patrimonio.php?funcao=form_manutencao" >
<input type="hidden" value="<? echo $nome_usuario_logado ?>" name="usuario_logado"/ >
 <table width="" border="2" align="center" id="tbcad">
 <? for ($i=0;$i<10;$i++){
	 $cont_patrimonio = $i + 1;
	 ?>
 	<tr>
    	<th colspan="12"><? echo "Patrimônio: ".$cont_patrimonio ;?></th>
    </tr>
   <tr>
     <td><div align="right">NUM. PATRIMONIAL</div></td>
     <td align="left"><select name="num_patrimonio<? echo $i;?>" size="1">
     	<option value="" multiple selected>Patrimonio</option>
	<? 
	$sql_filtro = mysql_query("SELECT * FROM inventario ORDER BY num_patrimonio ");
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['num_patrimonio'] != ""){?>
    	<option value="<? echo $linha_filtro['num_patrimonio'] ?>" multiple><? echo $linha_filtro['num_patrimonio'] ?></option>
    <? }}?>
    	
    </select></td>
     <td><div align="left">DATA SAIDA</div></td>
     <td align="left"><input name="data_mov<? echo $i;?>" type="text" value="<? echo $data_atual;?>" id="data<? echo "1".$i;?>" size="15" maxlength="10" readonly="readonly"  /></td>		

     <td><div align="right">PRESTADOR DE<br /> SERVIÇO</div></td>
     <td align="left" colspan="2"><input type="text" name="prestador_servico<? echo $i;?>" id="prestador_servico" maxlength="30" size="20"  /></td>
     <td><div align="left">DATA PREVISTA</div></td>
     <td align="left"><input name="data_prevista<? echo $i;?>" type="text" value="<? echo $data_atual;?>" id="data<? echo $cont_patrimonio?>" size="15" maxlength="10" readonly="readonly"  /></td>		
     <td><div align="right">OBSERVAÇÕES</div></td>
     <td align="left" colspan="2"><textarea name="obs<? echo $i;?>" cols="25" id="obs"></textarea></td>
   </tr>  
     <? }?>

   <tr>
     <td colspan="12"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
    </table>
  </form>	<? } ?>
<!-- *********************** FIM FORMULÁRIO DE MANUTENÇÃO PATRIMONIAL ************************* -->

<!-- ***********************  FORMULÁRIO DE DESCARTE PATRIMONIAL ************************* --> 
<? if($filt_chamado_menu == 1 and $pg == "qt_descarte"){?>
<form id="frmcadastro" name="frmcadastro" method="post" action="include/patrimonio.php?pg=form_descarte " >
 <table width="" border="2" align="center" id="tbcad">
 	<tr>
    	<td>Quantidades Patrimonio Para Descarte</td>
    </tr>
    <tr>
        <td><input type="text" name="qt_descarte" maxlength="3" /></td>
    </tr>
    <tr>
    	<td><input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" /></td>
    </tr>
 </table>
</form>
<? }?>        	      

	<?	if ($filt_chamado_menu == 1 and $pg == "form_descarte") {//Cadastro de Plano de Ação  
$id = $_GET['id'];	
	?>
<h1>Formulário de Descarte Patrimonial</h1>
<form id="frmcadastro" name="frmcadastro" method="post" action="include/patrimonio.php?funcao=form_descarte" >
<input type="hidden" value="<? echo $nome_usuario_logado ?>" name="usuario_logado"/ >
 <table width="" border="2" align="center" id="tbcad">
 <? for ($i=0;$i < 10;$i++){
	 $cont_patrimonio = $i + 1;
	 ?>
 	<tr>
    	<th colspan="8"><? echo "Patrimônio: ".$cont_patrimonio ;?></th>
    </tr>
   <tr>
     <td><div align="right">NUM. PATRIMONIAL</div></td>
     <td align="left"><select name="num_patrimonio<? echo $i;?>" size="1">
     	<option value="" multiple selected>Patrimonio</option>
	<? 
	$sql_filtro = mysql_query("SELECT * FROM inventario ORDER BY num_patrimonio ");
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['num_patrimonio'] != ""){?>
    	<option value="<? echo $linha_filtro['num_patrimonio'] ?>" multiple><? echo $linha_filtro['num_patrimonio'] ?></option>
    <? }}?>
    	
    </select>
     <td><div align="left">DATA DESCARTE</div></td>
     <td align="left"><input name="data_mov<? echo $i;?>" type="text" value="<? echo $data_atual;?>" id="data<? echo "1".$i;?>" size="15" maxlength="10" readonly="readonly"  /></td>		
     <td><div align="right">OBSERVAÇÕES</div></td>
     <td align="left" colspan="2"><textarea name="obs<? echo $i;?>" cols="25" id="obs"></textarea></td>
   </tr>  
     <? }?>

   <tr>
     <td colspan="8"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
    </table>
  </form>	<? } ?>
<!-- *********************** FIM FORMULÁRIO DE DESCARTE PATRIMONIAL ************************* -->


<!-- *********************** EXIBE FORUMÁRIOS PATRIMONIAL ************************* --> 
<?  if ($pg == "consulta_form" and $filt_patrimonio_rel == 1) {//relatório dos usuários
require"include/verifica.php";
?>
<h1>Consulta Formulários Patrimoniais</h1>
 <script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>

<!-- ***************************************** FILTROS ******************************************************* -->
<form id="frm_filt_chamado" name="frm_filt_chamado" action="patrimonio.php?pg=consulta_form" method="post" enctype="multipart/form-data">
<table border="0" cellspacing="0" align="center">
  <tr>
  	<th colspan="2" >Filtros</th>
  </tr>
  <tr>
    <td colspan="2">Data Inicial<input name="data1" type="text" id="data1" 
	<? if($_POST['data1'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data1'] != ""){?>value="<? echo $_POST['data1'];?>" <? } ?>
    size="9" maxlength="10" readonly="readonly" >
    Data Final<input name="data2" type="text" id="data2" 
    <? if($_POST['data2'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data2'] != ""){?>value="<? echo $_POST['data2'];?>" <? } ?>
    size="9" maxlength="10" readonly="readonly"></td>
  </tr>
  <tr>
  	<td colspan="2">AQUISIÇÃO:
    <input name="opcao_filt" type="radio" value="1" <? if($_POST['opcao_filt'] == 1){?>checked<? }?>
     onClick="document.frm_filt_chamado.filt_usuario.disabled = 1;
  			   document.frm_filt_chamado.filt_categoria.disabled = 1;
              ">
    MANUTENÇÃO:          
	<input name="opcao_filt" type="radio" value="2" <? if($_POST['opcao_filt'] == 2){?>checked<? }?>
     onClick="document.frm_filt_chamado.filt_usuario.disabled = 1;
  			   document.frm_filt_chamado.filt_categoria.disabled = 1;
    ">
    DESCARTE:           
	<input name="opcao_filt" type="radio" value="3"<? if($_POST['opcao_filt'] == 3){?>checked<? }?> 
     onClick="document.frm_filt_chamado.filt_usuario.disabled = 1;
  			   document.frm_filt_chamado.filt_categoria.disabled = 1;
    ">
    COMPLETO:           
	<input name="opcao_filt" type="radio" value="4" <? if($_POST['opcao_filt'] == 4){?>checked<? }?>
     onClick="document.frm_filt_chamado.filt_usuario.disabled = 1;
  			   document.frm_filt_chamado.filt_categoria.disabled = 1;
    ">
    <td colspan="2">PENDENTE:
    <input name="opcao_filt" type="radio" value="0" <? if($_POST['opcao_filt'] == 0){?>checked<? }?>
     onClick="document.frm_filt_chamado.filt_usuario.disabled = 1;
  			   document.frm_filt_chamado.filt_categoria.disabled = 1;
              ">
    </td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" name="btcadastrar2" id="btcadastrar2" value="Pesquisar" /></td>
  </tr>
</table>
</form>

<?
$data1 = converte_data($_REQUEST['data1']);
$data2 = converte_data($_REQUEST['data2']);
$filt1 = $_REQUEST['opcao_filt'];

?>

<!-- ***************************************** FIM FILTROS ******************************************************* -->

<form action="include/patrimonio.php?funcao=conclui" method="post" >
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >

  <tr>
    <th width="">APROVA</th>
    <th width="" rowspan="2">DATA&nbsp;</th>
    <th width="" rowspan="2">Num NFE / Patrimônio&nbsp;</th>
    <th width="" rowspan="2">USUÁRIO&nbsp;</th>
    <th width="" rowspan="2">MOVIMENTO.&nbsp;</th>
    <th width="" rowspan="2">LOCAL&nbsp;</th>
    <th width="" rowspan="2">SALA&nbsp;</th>
  </tr>
  <tr>
    <th width=""><input type="image" src="images/Mini/approve_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
  </tr>
  
  
    <?
	switch($filt1){
		case 1:
			$sql = mysql_query("SELECT * FROM mov_patrimonio WHERE tipo_mov ='AQUISICAO' and data_mov BETWEEN ('$data1') AND ('$data2') ORDER BY data_mov DESC ");
		break;
		case 2:
			$sql = mysql_query("SELECT * FROM mov_patrimonio WHERE tipo_mov ='MANUTENCAO' and data_mov BETWEEN ('$data1') AND ('$data2') ORDER BY data_mov DESC ");
		break;
		case 3:
			$sql = mysql_query("SELECT * FROM mov_patrimonio WHERE tipo_mov ='DESCARTE' and data_mov BETWEEN ('$data1') AND ('$data2') ORDER BY data_mov DESC ");
		break;
		case 4:
			$sql = mysql_query("SELECT * FROM mov_patrimonio ORDER BY data_mov DESC ");
		break;
		default:
			$sql = mysql_query("SELECT * FROM mov_patrimonio WHERE ativo='1' ORDER BY data_mov DESC ");
  		break;
	}
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){


	?>
    <tr>
    	<td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>
        	<? if ($filt_patrimonio_inclui == 1){?>
            <input type="checkbox" name="conclui[]" value="<? echo $linha['id'];?>" />
            <? }?>
    	</td>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_mov']); ?>&nbsp;&nbsp;&nbsp;</td>
    <? if($linha['num_nfe'] != ""){?>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo "NFE: ".$linha['num_nfe']; ?>&nbsp;&nbsp;&nbsp;</td>
    <? }?>
    <? if($linha['num_patrimonio'] != ""){?>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo "Patrimônio: ".$linha['num_patrimonio']; ?>&nbsp;&nbsp;&nbsp;</td>
    <? }?>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo $linha['usuario_mov']; ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo $linha['tipo_mov'];?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo $linha['local']; ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['ativo'] != "0" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo $linha['sala']; ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
</form>
<? } ?>
<!-- *********************** FIM EXIBE FORUMÁRIOS PATRIMONIAL ************************* --> 
<!-- *********************** FIM RELATÒRIOS PATRIMONIAL ************************* --> 

<? if($_GET['pg'] == "rel_patrimonio2"){ ?>

<h1>
Relatório valor patrimonial por grupo.
</h1>

<form name="grupo" method="post" action="?pg=rel_patrimonio2" />
	<table id="grupo" width="300px" align="center">
    	<tr>
        	<td> Grupo</td>
        </tr>
        <tr>
        	<td> 
            	<select name="grupo">
                	<option value="Local">Local</option>
                    <option value="Categoria">Categoria</option>
                    <option value="Fornecedor">Fornecedor</option>

                </select>
            </td>
        </tr>
        <tr>
        	<td> 
            	<input type="submit" value="Filtrar"/>
            </td>
        </tr>
    </table>
</form>
<table id="rel_patrimonio" width="50%" align="center" border="1" />
	<tr>
    	<th width="50%">Grupo: <? echo $_POST['grupo']?></th>
        <th width="20%">Valor por grupo</th>
    </tr>
<?
switch($_POST['grupo']){
	case 'Local':
		$grupo = 'local';
	break;
	case 'Categoria':
		$grupo = 'categoria';
	break;
	case 'Fornecedor':
		$grupo = 'fornecedor';
	break;
	default:
	 $grupo = '';
	break;
		
}
if($grupo != ""){
$sql = mysql_query("SELECT $grupo FROM inventario GROUP BY $grupo");	
while($linha = mysql_fetch_array($sql)){
	$local = $linha[$grupo];
	$sql_valor = mysql_query("SELECT $grupo, valor  FROM inventario WHERE $grupo='$local' order by $grupo");	
	$valor = 0;
	while($linha_valor = mysql_fetch_array($sql_valor)){
	$valor = $valor + $linha_valor['valor']; 
	$valor_total = $valor_total + $linha_valor['valor'];
	}
	?>  
	<tr>
    	<td align="left"> <? echo utf8_encode($local); ?> </td>
		<td align="left"> <? echo " Valor: "."R$ ".number_format($valor,2,",",".");?> </td>
    </tr> <?
	
}
	?> <p class="style4"> <? echo" Total dos grupos: ".$_POST['grupo'] ." R$ ".number_format($valor_total,2,",","."); ?> </p> <?
	
}
if($grupo == ""){
echo "Um grupo de deve ser escolhido para o filtro";
}?>

<? }?>
</table>
 
</div>
</body>
<? require"rodape.php"; ?>