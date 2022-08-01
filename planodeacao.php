<?
session_start();
require"topo.php";
require"include/verifica.php";
require"include/funcoes.php";
require"js/funcoes.jsp";
$data_atual = date("d/m/Y");
require "include/config_filtros.php";
?>
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
        <link href="css/print.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<body> 
<div id="headline">
    <!-- Começar a partit desta linha-->

<!-- ***********************  cadastro Plano de Ação ************************* --> 
        	      
		<?
	if ( $filt_planoacao_inclui == 1 and $pg == "cadplanodeacao") {//Cadastro de Plano de Ação  ?>
<h2>Cadastro Plano de Ação</h2> 


	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/plano_acao.php?funcao=adiciona_plano_de_acao" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Situação Atual</div></td>
     <td><input type="text" name="situacao_atual" id="cadsituacao_atual" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Ação:</div></td>
     <td><input type="text" name="acao" id="cadacao" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Tipo de Custo</div></td>
     <td><input type="text" name="tipo_custo" id="cadtipo_custo" maxlength="150" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Custo</div></td>
     <td><input type="text" name="custo" id="custo" maxlength="80" size="31" /></td>
   </tr>
       <tr>
     <td><div align="right">Data Prevista</div></td>
     <td align="left"><input type="text" name="data_previsao" id="data_1" value="<? echo $data_atual?>" maxlength="10" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Setor:</div></td>
     <td><input type="text" name="setor" id="cadsetor" maxlength="150" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Meta:</div></td>
     <td><input type="text" name="meta" id="cadmeta" maxlength="300" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Status:</div></td>
     <td><input type="text" name="status" id="status" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- *********************** fim  cadastro Plano de Ação ************************* -->

<!-- ***********************  Altera Plano de Ação ************************* --> 
        	      
		<?
	if ( $filt_planoacao_altera == 1 and $pg == "alt") {//Cadastro de Plano de Ação  
	$id = $_GET['id'];
	   
	  	require "include/conexao.php";
	   	$sql = mysql_query("SELECT * FROM plano_de_acao Where id='$id' ");
		$cont = mysql_num_rows($sql);
		while($linha = mysql_fetch_array($sql)){	

	
	?>
<h2>Altera Plano de Ação</h2> 


	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/plano_acao.php?funcao=altera<? echo $id?>" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Situação Atual</div></td>
     <td><input type="text" name="situacao_atual" id="cadsituacao_atual" value="<? echo $linha['situacao_atual']?>" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Ação:</div></td>
     <td><input type="text" name="acao" id="cadacao"value="<? echo $linha['acao']?>" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Tipo de Custo</div></td>
     <td><input type="text" name="tipo_custo" id="cadtipo_custo" value="<? echo $linha['tipo_custo']?>" maxlength="150" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Custo</div></td>
     <td><input type="text" name="custo" id="custo" value="<? echo $linha['custo']?>" maxlength="80" size="31" /></td>
   </tr>
       <tr>
     <td><div align="right">Data Prevista</div></td>
     <td align="left"><input type="text" name="data_previsao" id="data_1" value="<? echo $linha['data_prevista']?>" maxlength="10" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Setor:</div></td>
     <td><input type="text" name="setor" id="cadsetor" value="<? echo $linha['setor']?>" maxlength="150" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Meta:</div></td>
     <td><input type="text" name="meta" id="cadmeta" value="<? echo $linha['meta']?>" maxlength="300" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Status:</div></td>
     <td><input type="text" name="status" id="status" value="<? echo $linha['status']?>" maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
 </table>
  </form>	<? } }?>
<!-- *********************** fim  Altera Plano de Ação ************************* -->


  
<!-- *********************** exibe plano de ação ************************* --> 
<?  
if ( $pg == "relplanodeacao" and $filt_planoacao_rel) {//relatório dos usuários

?>
<h2>Consulta Plano de Ação</h2> 

<form id="frm_filt_chamado" name="frm_filt_chamado" action="planodeacao.php?pg=relplanodeacao" method="post" enctype="multipart/form-data">
<table border="0" cellspacing="0" align="center">
  <tr>
  	<th colspan="2" >Filtros</th>
  </tr>

  <tr>
  <td> Situação</td>
  <td>
  	<select name="filt_situacao" size="1"  id="filt_situacao">
		
	<? 
	//Conexão com banco puxar usuário único

	$sql_filtro = mysql_query("SELECT DISTINCT status FROM plano_acao ORDER BY status ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['status'] != ""){?>
    <option value="<? echo utf8_decode($linha_filtro['status']) ?>" multiple><? echo utf8_encode($linha_filtro['status']) ?></option>
       <? }}?>
       <option value="0" multiple <? if($_POST['filt_situacao'] == 0 or $_GET['filt1'] == 0){?> selected <? }?>>TODOS</option>
       <option value="1" multiple <? if($_POST['filt_situacao'] == 1 or $_GET['filt1'] == 1){?> selected <? }?>>PENDENTE</option>
       <option value="2" multiple <? if($_POST['filt_situacao'] == 2 or $_GET['filt1'] == 2){?> selected <? }?>>CONCLUIDO</option>
    </select>
    </td>
  </tr>
  <tr>
  	<td colspan="2"><input type="submit" name="btcadastrar2" id="btcadastrar2" value="Pesquisar" /></td>
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
<br /><br /><br /><br /><br />
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
 <tr class="form_invisivel">
 <td colspan="10" class="form_invisivel">
 <p class="form_invisivel"><span class="form_invisivel"><strong>Legenda</strong></span>
<img src="images/Mini/edit_notes.png" alt="Altera dados" width="20" class="form_invisivel" /> Alterar. &nbsp;&nbsp;&nbsp;
<img src="images/Mini/delete_notes.png" alt="Altera dados" width="20" class="form_invisivel" /> Remove.
<img src="images/Mini/approve_notes.png" alt="Conclui Plano de Ação" width="20" class="form_invisivel" /> Conclui Plano de Ação.
</p>
 </td>
 </tr>
  <tr>
    <th width="8%" id="opcao_tb">Opções</th>
    <th width="29%"><a href="planodeacao.php?pg=relplanodeacao&ordem=1&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">SITUAÇÃO&nbsp;</a></th>
    <th width="29%"><a href="planodeacao.php?pg=relplanodeacao&ordem=2&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">AÇÃO&nbsp;</a></th>
    <th width="5%"><a href="planodeacao.php?pg=relplanodeacao&ordem=3&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">TIPO DE CUSTO&nbsp;</a></th>
    <th width="5%"><a href="planodeacao.php?pg=relplanodeacao&ordem=4&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">CUSTO&nbsp;</a></th>
    <th width="2%"><a href="planodeacao.php?pg=relplanodeacao&ordem=5&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">DATA PREVISTA&nbsp;</a></th>
    <th width="5%"><a href="planodeacao.php?pg=relplanodeacao&ordem=6&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">SETOR&nbsp;</a></th>
    <th width="12%"><a href="planodeacao.php?pg=relplanodeacao&ordem=7&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">META&nbsp;</a></th>
    <th width="5%"><a href="planodeacao.php?pg=relplanodeacao&ordem=8&filt1=<? 
	if($_GET['filt1'] == ""){echo $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){echo $_GET['filt1'];}?>
    ">STATUS&nbsp;</a></th>
  </tr>
    <?
	$ordem = $_REQUEST['ordem'];
	switch($ordem){
	case 1:
	$ordem ="situacao_atual";		
	break;
	case 2:
	$ordem ="acao";		
	break;
	case 3:
	$ordem ="tipo_custo";		
	break;
	case 4:
	$ordem ="custo";		
	break;
	case 5:
	$ordem ="data_previsao";		
	break;
	case 6:
	$ordem ="setor";		
	break;
	case 7:
	$ordem ="meta";		
	break;
	case 8:
	$ordem ="status";		
	break;
	default;
	$ordem="status";
	}
	$tipo_ordem = $_REQUEST['tp_ordem'];
	switch($tipo_ordem){
	case 1:
	$tipo_ordem = "ASC";
	break;
	case 2:
	$tipo_ordem = "DESC";
	break;
	default;
	$tipo_ordem = "ASC";
	
	}
	if($_GET['filt1'] == ""){
		$filt1 = $_POST['filt_situacao'];}
	if($_GET['filt1'] != ""){
		$filt1 = $_GET['filt1'];}

	switch($filt1){
			case 0:// TOdos
			$sql = mysql_query("SELECT * FROM plano_de_acao ORDER BY $ordem $tipo_ordem");
			break;
			case 1:// APENAS PENDENTE
			$sql = mysql_query("SELECT * FROM plano_de_acao WHERE status!='CONCLUIDO' ORDER BY $ordem $tipo_ordem");
			break;
			case "2":
			$sql = mysql_query("SELECT * FROM plano_de_acao WHERE status='CONCLUIDO' ORDER BY $ordem $tipo_ordem");
			break;
			default;
			$sql = mysql_query("SELECT * FROM plano_de_acao ORDER BY $ordem $tipo_ordem");
			break;
			
		}
  
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$situacao_atual = $linha['situacao_atual'];
	$acao = $linha['acao'];
	$tipo_custo = $linha['tipo_custo'];
	$custo = $linha['custo'];
	$data_previsao = converte_data($linha['data_previsao']);
	$setor = $linha['setor'];
	$meta = $linha['meta'];
	$status = $linha['status'];


$data1 = converte_data($data_atual);
$data2 = converte_data($data_previsao);

$unix_data1 = strtotime($data1);
$unix_data2 = strtotime($data2);

$nHoras   = ($unix_data2 - $unix_data1) / 3600;
$nMinutos = (($unix_data2 - $unix_data1) % 3600) / 60;

	
	?>
    <tr>
    	<td <? if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto_opcao" <? }
			 else{ ?> id="opcao_tb" <? }?> >
        	<? if($filt_planoacao_altera == 1){?>
        	<a href="planodeacao.php?pg=alt&id=<? echo $id ?>"><img src="images/Mini/edit_notes.png" alt="Alterar Dados" width="20" /></a>
            <? }?>
            
            <? if( $filt_planoacao_exclui == 1){?>
    	 	<a href="include/plano_acao.php?funcao=excluir_plano_de_acao&id=<? echo $linha['id']; ?>"><img src="images/Mini/delete_notes.png" alt="Remove Dados" width="20" /></a>
            <? }?>
            <? if( $filt_planoacao_altera == 1 and $linha['status'] != "CONCLUIDO"){?>
    	 	<a href="include/plano_acao.php?funcao=finaliza&id=<? echo $linha['id']; ?>"><img src="images/Mini/approve_notes.png" alt="Conclui Plano de Ação" width="20" class="form_invisivel" /></a>
            <? }?>
    	</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($situacao_atual) ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($acao) ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($tipo_custo) ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?> align="left" >&nbsp;&nbsp;&nbsp;R$<? echo number_format($custo,2,",","."); ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?>
		<? if($nHoras > 0 ){?> id="chamado_aberto" <? } ?>
        <? if($nHoras < 0 ){?> id="destaque_vermelho" <? } ?>
		
	<?	} ?> >
    &nbsp;&nbsp;&nbsp;<? echo $data_previsao."<br />";



	
	 ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($setor) ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($meta) ?>&nbsp;&nbsp;&nbsp;</td>
    <td <?	if ( $linha['status'] != "CONCLUIDO" ){ ?> id="chamado_aberto" <? }?>>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($status) ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe plano de ação ************************* --> 

</body>
<? require"rodape.php"; ?>