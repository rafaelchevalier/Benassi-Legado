<?
session_start();
require"topo.php";
require"include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require"js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require"include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
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
<div id="menu_esquerda">


	<h2><li> Peguntas Pesquisa Satisfação</li></h2>
<!--  
<ul>
    	<? //if ($pesq_inclui == 1){ ?>
        <ul id="sub_menu"><a href="pesq.php?pg=cad_pesq1">Cadastro</a></ul>
        <? //}?>
        <? //if ($pesq_consulta == 1){ ?>
        <ul id="sub_menu"><a href="pesq.php?pg=consulta_pesq1">Consulta</a></ul>
		<? //}?>

</ul>
<ul>
	<li>Pesquisa Satisfação</li>
    	<? //if ($pesq_inclui == 1){ ?>
        <ul id="sub_menu"><a href="pesq.php?pg=cad_pesq2">Avaliar</a></ul>
        <? //}?>
        <? //if ($pesq_consulta == 1){ ?>
        <ul id="sub_menu"><a href="pesq.php?pg=consulta_pesq2">Consulta</a></ul>
		<? //}?>

</ul>

-->
</div>

		
<!-- ************************************************************************************************************************************* 
											FIM MENU 
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO PESQUISA DE SATISFAÇÂO
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO PERGUNTA
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_pesq1" and $cad_pesq_inclui == "1" ) {//Cadastro Temperatura Camaras
	require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
	?>

    
    
<h1>Cadastro Pergunta Pesquisa Satisfação</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/pesq.php?funcao=cad" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Pergunta</div></td>
     <td><textarea name="pergunta" cols="31" id="descricao"></textarea></td>
   </tr>
   <tr>
     <td><div align="right">Ativo</div></td>
     <td><label for="ativo"></label>
       <select name="ativo" id="ativo">
         <option value="1">SIM</option>
         <option value="0">NÃO</option>
       </select></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO PERGUNTA
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											ALTERA pesq
****************************************************************************************************************************************** -->
<?
		require"include/conexao.php";
		if ($pg == "alt_pesq1" and $cad_pesq_altera == 1) {//altera 
		require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
?>
<h1>Altera Pergunta Pesquisa Satisfação</h1>
<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM cad_pesq where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		
		<form id="frmcadastro" name="frmcadastro" method="post" action="include/pesq.php?funcao=alt&id=<? echo $id ?>" >
  <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Pergunta</div></td>
     <td><textarea name="pergunta" cols="31" readonly="readonly" id="descricao"><? echo utf8_encode($linha['pergunta'])?></textarea></td>
   </tr>
   <tr>
     <td><div align="right">Ativo</div></td>
     <td><label for="ativo"></label>
       <select name="ativo" id="ativo">
         <option value="1"<? if($linha['ativo'] ==  1){ ?> selected="selected" <? }?> >SIM</option>
         <option value="0"<? if($linha['ativo'] ==  0){ ?> selected="selected" <? }?> >NÃO</option>
       </select></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>		
<? }}?>

<!-- ************************************************************************************************************************************* 
											FIM ALTERA pesq
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA pesq
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta_pesq1"  and $cad_pesq_consulta = "1" ) {//Consulta Temperatura Camaras 
require"include/verifica.php";
?>

<h1>Consulta Perguntas Pesquisa Satisfação</h1> 



<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
<form action="include/pesq.php?funcao=exclui_pesguntas" method="post">
 <table width="100%" border="0" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($pesq_altera == "1" or $pesq_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="10%" bgcolor="#00FF00">OPÇÃO</th>
		<? } ?>
    <th width="80%" rowspan="2" id="th_mercado">PERGUNTA</th>
    <th width="10%" rowspan="2" id="th_mercado">ATIVO.&nbsp;</th>

  </tr>
  <tr>
		<? if ($pesq_altera == "1" or $pesq_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th bgcolor="#00FF00"><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
		<? } ?>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela pesq;
$sql = mysql_query("SELECT * FROM cad_pesq ORDER BY data_cad DESC");
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
	switch($linha['ativo']){
	case 0:	$ativo = "NÃO"; break;
	case 1:	$ativo = "SIM"; break;
	default: $ativo = "INDEFINIDO"; break;
	
	}
		
?>
    <tr>
<?	//if ($pesq_exclui == "1" or $pesq_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <?  if ($pesq_exclui == "1"){?>
                	<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? }?>
                <? if ($pesq_altera == "1"){?>
                	<a href="pesq.php?pg=alt_pesq1&id=<? echo $linha['id'] ?>"><img src="images/search.png" width="15" alt="EXIBE" /></a>
                <? }?>
                </td>
		<? //}//Fim filtro botões apenas para usuários master ?>

    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['pergunta']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo $ativo; ?>&nbsp;&nbsp;&nbsp;</td>

 </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	  
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="3">&nbsp;<? echo "Total: ",$quantidade_filt;?>&nbsp;</th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
</form>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA pesq
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO PERGUNTAS PESQUISA DE SATISFAÇÂO
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO PESQUISA DE SATISFAÇÂO
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO 
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_pesq2") {//Cadastro 
	$cnpj_cliente = $_POST['cnpj'];
	?>

    
    
<h1>Cadastro Pesquisa Satisfação</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/pesq.php?funcao=cad_pesq2" >
 <table width="500px" border="2" align="center" id="tbcad">
   <tr>
     <td width="10%"><div align="right">Empresa</div></td>
     <td colspan="3" align="left"><select name="empresa" size="1"> 
     		<?   
	  		require "include/conexao.php";
			
		   	$sql_login = mysql_query("SELECT * FROM mercado where cnpj='$cnpj_cliente' ORDER BY razao_social DESC  ");
			$cont2 = mysql_num_rows($sql_login);
			$conta_mercado = "0";
			while($linha2 = mysql_fetch_array($sql_login)){	
			if($linha2['cnpj'] != ""){	$conta_mercado  ++;}
			?>
          <option value="<? echo $linha2['cnpj'] ?>" > <? echo utf8_encode($linha2['razao_social']) ?></option>  
       <?  } 
	   ?>
       
    </select></td>
   </tr>
   <tr>
   <?
   $sql = mysql_query("SELECT * FROM cad_pesq WHERE ativo='1' ORDER BY id ");
   $cont = 0;
		while($linha2 = mysql_fetch_array($sql)){
			$cont ++;
	?>
   <tr>
   		<td colspan="4"><p align="justify"><? echo utf8_encode($linha2['pergunta'])?></p></td>
   </tr>
   <tr>
   		<td colspan="4" align="center">
        <input type="hidden" name="pergunta<? echo $cont;?>" value="<? echo utf8_encode($linha2['pergunta'])?>" />
     <img src="images/smile1.png" alt="Ruim" width="30" />
     1<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="1" />
     2<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="2" />
     3<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="3" />
     4<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="4" />
     5<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="5" />
	 <img src="images/smile2.png" alt="Ótimo" width="28" /> 
     </td>
   </tr>
   <? }?>
   <tr>
   		<td>OBS:</td>
   		<td colspan="3"><textarea name="obs" cols="40" rows=""></textarea></td>
   </tr>
   
     <td colspan="4"><div align="center">
     <input type="hidden" name="cont" id="avaliacao" value="<? echo $cont;?>" />
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>
  <?
   if($conta_mercado == "0"){
				echo"
	<META HTTP-EQUIV=REFRESH content='0; URL=../benassi/pesq.php?pg=cnpj'>
	<script type=\"text/javascript\">	
	alert(\" CNPJ não localizado.\");
	</script>";
				}
  	 } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO pesq
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											ALTERA pesq
****************************************************************************************************************************************** -->
<?
		require"include/conexao.php";
		if ($pg == "alt_pesq2" and $cad_pesq_altera == 1) {//altera 
		require"include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
?>
<h1>Altera Pesquisa Satisfação</h1>
<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM pesq_cab where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
			$cnpj_cliente = $linha['empresa'];
?>		
		<form id="frmcadastro" name="frmcadastro" method="post" action="include/pesq.php?funcao=alt&id=<? echo $id ?>" >
  <table width="500px" border="2" align="center" id="tbcad">
   <tr>
     <td width="10%"><div align="right">Empresa</div></td>
     <td colspan="3" align="left"><select name="empresa" size="1"> 
     		<?   
	  		require "include/conexao.php";
			
		   	$sql_login = mysql_query("SELECT * FROM mercado where cnpj='$cnpj_cliente' ORDER BY razao_social DESC  ");
			$cont2 = mysql_num_rows($sql_login);
			$conta_mercado = "0";
			while($linha2 = mysql_fetch_array($sql_login)){	
			if($linha2['cnpj'] != ""){	$conta_mercado  ++;}
			?>
          <option value="<? echo $linha2['cnpj'] ?>" > <? echo utf8_encode($linha2['razao_social']) ?></option>  
       <?  } 
	   ?>
       
    </select></td>
   </tr>
   <tr>
   <?
   $sql = mysql_query("SELECT * FROM pesq_itens WHERE id_pesq_cab='$id' ");
   $cont = 0;
		while($linha2 = mysql_fetch_array($sql)){
			$cont ++;
	?>
   <tr>
   		<td colspan="4"><p align="justify"><? echo utf8_encode($linha2['pergunta'])?></p></td>
   </tr>
   <tr>
   		<td colspan="4" align="center">
        <input type="hidden" name="pergunta<? echo $cont;?>" value="<? echo utf8_encode($linha2['pergunta'])?>" />
     <img src="images/smile1.png" alt="Ruim" width="30" />
     1<input name="avaliacao<? echo $cont;?>" type="radio" id="avaliacao" value="1" <? if($linha2['avaliacao'] == "1"){?> checked="checked" <? }?> readonly="readonly" />
     2<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="2" <? if($linha2['avaliacao'] == "2"){?> checked="checked" <? }?> readonly="readonly" />
     3<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="3" <? if($linha2['avaliacao'] == "3"){?> checked="checked" <? }?> readonly="readonly" />
     4<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="4" <? if($linha2['avaliacao'] == "4"){?> checked="checked" <? }?> readonly="readonly" />
     5<input type="radio" name="avaliacao<? echo $cont;?>" id="avaliacao" value="5" <? if($linha2['avaliacao'] == "5"){?> checked="checked" <? }?> readonly="readonly" />
	 <img src="images/smile2.png" alt="Ótimo" width="28" /> 
     </td>
   </tr>
   <? }?>
   <tr>
   		<td>OBS:</td>
   		<td colspan="3"><? echo $linha['obs']?></td>
   </tr>
   
     <td colspan="4"><div align="center">
     <input type="hidden" name="cont" id="avaliacao" value="<? echo $cont;?>" />
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>		
<? }}?>

<!-- ************************************************************************************************************************************* 
											FIM ALTERA pesq
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA pesq
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta_pesq2"  and $pesq_consulta = "1" ) {//Consulta Temperatura Camaras 
require"include/verifica.php";
?>

<h1>Consulta Pesquisa Satisfação</h1> 



<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
<form action="include/pesq.php?funcao=exclui_pesquisa" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? //if ($pesq_altera == "1" or $pesq_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="5%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? //} ?>
    <th width="5%" rowspan="2" id="th_mercado">COD.&nbsp;</th>
    <th width="5%" rowspan="2" id="th_mercado">FILIAL.&nbsp;</th>
    <th width="30%" rowspan="2" id="th_mercado">RAZÃO SOCIAL.&nbsp;</th>
    <th width="30%" rowspan="2" id="th_mercado">NOME FANTASIA.&nbsp;</th>
    <th width="20%" rowspan="2" id="th_mercado">OBSERVAÇÂO.&nbsp;</th>
    <th width="5%" rowspan="2" id="th_mercado">SATISFAÇÃO.&nbsp;</th>
  </tr>
  <tr>
		<? if ($pesq_altera == "1" or $pesq_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th bgcolor="#00FF00"><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
		<? } ?>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela pesq;
$sql = mysql_query("SELECT * FROM pesq_cab ORDER BY data_cad DESC");
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
	$total = $linha['total'] * 5;
	$id_cabecalho = $linha['id'];
		
?>
    <tr>
<?	//if ($pesq_exclui == "1" or $pesq_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? // if ($pesq_exclui == "1"){?>
                	<input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? //}?>
                <? //if ($pesq_altera == "1"){?>
                	<a href="pesq.php?pg=alt_pesq2&id=<? echo $linha['id'] ?>"><img src="images/search.png" width="15" alt="EXIBE" /></a>
                <? //}?>
                </td>
		<? //}//Fim filtro botões apenas para usuários master ?>
    
	<? 
		 $cnpj_mercado = $linha['empresa'];
		$sql_mercado = mysql_query("SELECT * FROM mercado WHERE cnpj='$cnpj_mercado' LIMIT 1");
		while($linha_mercado = mysql_fetch_array($sql_mercado)){	
		?>
	<td>&nbsp;&nbsp;&nbsp;	<? echo utf8_encode($linha_mercado['cod']); ?></td>
    <td>&nbsp;&nbsp;&nbsp;	<? echo utf8_encode($linha_mercado['filial']); ?></td>
    <td>&nbsp;&nbsp;&nbsp;	<? echo utf8_encode($linha_mercado['razao_social']); ?></td>
    <td>&nbsp;&nbsp;&nbsp;	<? echo utf8_encode($linha_mercado['nome_fantasia']); ?></td>
		<? }?>
    <td>&nbsp;&nbsp;&nbsp;	<? echo utf8_encode($linha['obs']); ?></td>
    
    <? 
		$sql_itens = mysql_query("SELECT * FROM pesq_itens WHERE id_pesq_cab='$id_cabecalho'");
		$avaliacao_total = 0;
		while($linha_itens = mysql_fetch_array($sql_itens)){	
		$avaliacao_total = $avaliacao_total + $linha_itens['avaliacao'];
		}
		$c = $avaliacao_total / $total * 100;
	
	?>
    <td >&nbsp;&nbsp;&nbsp;<? echo number_format($c, 2, ',', ' ')."%"; echo $linha_itens['avaliacao']; ?>&nbsp;&nbsp;&nbsp;</td>
 </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	  
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="7">&nbsp;<? echo "Total: ",$quantidade_filt;?>&nbsp;</th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
</form>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA pesq
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO CNPJ
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cnpj" ) {//Cadastro Temperatura Camaras?>

    
    
<h1>Digite o CNPJ de sua loja</h1> 
	 <form id="frmcadastro" name="frm_cnpj" method="post" action="pesq.php?pg=cad_pesq2" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">CNPJ</div></td>
     <td><input name="cnpj" type="text" id="descricao" value="" size="31" maxlength="18" onKeyPress="mascara(this, '##.###.###/####-##')" /></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="image" src="images/cad.png" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO CNPJ
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CADASTRO PESQUISA DE SATISFAÇÂO
****************************************************************************************************************************************** -->
</div>
		<div id="body">
			
		</div>
	</div>
    
	<? require"rodape.php";?>
</body>
</html>
