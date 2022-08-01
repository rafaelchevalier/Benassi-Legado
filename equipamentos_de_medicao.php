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

<p>Equipamentos de Medições</p>
<? //if ($local_inclui == 1){ ?>
<a href="equipamentos_de_medicao.php?pg=cad">Cadastro</a>&nbsp;|&nbsp;
<? //}?>
<? //if ($local_consulta == 1){ ?>
<a href="equipamentos_de_medicao.php?pg=consulta">Consulta</a>;
<? //}?>

</h2>
<!-- ************************************************************************************************************************************* 
											FIM MENU 
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CADASTRO Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad" /*and $local_inclui == "1"*/) {//Cadastro Temperatura Camaras?>

<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/equipamentos_de_medicao.php?funcao=cad" >
 <table width="" border="2" align="center" id="tbcad">
   <? 
   		$qt = 0;
		if ($_POST['qt'] =="" or $_POST['qt'] > "40" ){$_POST['qt'] = 5; }
		for($i=0; $i < $_POST['qt']; $i++){
		$qt ++;
   ?>
   
   <tr>  
     <td><div align="right">Nome:</div></td>
     <td><input type="text" name="nome<? $i?>" id="nome" maxlength="30" size="25" /></td>
     <td><div align="right">Num. Série:</div></td>
     <td><input type="text" name="num_serie<?  $i?>" id="num_serie" maxlength="30" size="25" /></td>
     <td><div align="right">Descricao:</div></td>
     <td><textarea name="descricao<? $i?>" cols="10" id="descricao"></textarea></td>
   </tr>
   <? }?>
   <tr>
     <td colspan="6"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											ALTERA Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "alt" /* and $local_consulta == "1" */) {//Cadastro Temperatura Camaras?>

    
    
<h1>Altera</h1>

<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM cad_equipamento_de_medicao where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		 
	 <form id="frmcadastro" name="frmcadastro" method="post"<? if ($local_altera == 1){?> action="include/local.php?funcao=alt&id=<? echo $id ?>" <? }?> >
<table width="" border="2" align="center" id="tbcad">
   <tr>  
     <td><div align="right">Nome:</div></td>
     <td><input type="text" name="nome" id="nome" value="<? echo $linha['nome']?>" maxlength="30" size="25" /></td>
     <td><div align="right">Num. Série:</div></td>
     <td><input type="text" name="num_serie" id="num_serie" value="<? echo $linha['num_serie']?>" maxlength="30" size="25" /></td>
     <td><div align="right">Descricao:</div></td>
     <td><textarea name="descricao" cols="10" id="descricao"><? echo $linha['descricao']?></textarea></td>
   </tr>
   <tr>
     <td colspan="6"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
     </div></td>
   </tr>
 </table>  </form>	<? }} ?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA Aferição Balança
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta"  /*and $local_consulta = "1"*/) {//Consulta Aferição Balança
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
<form action="include/equipamentos_de_medicao.php?funcao=exclui" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
	
    <th width="10%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>

    <th width="30%" rowspan="2" id="th_mercado">NOME.&nbsp;</th>
    <th width="30%" rowspan="2" id="th_mercado">NÚM. SÉRIE.&nbsp;</th>
    <th width="30%" rowspan="2" id="th_mercado">DESCRIÇÃO.&nbsp;</th>
  </tr>
  <tr>
  	<th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
	$sql = mysql_query("SELECT * FROM cad_equipamento_de_medicao ORDER BY nome DESC  ");	
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
?>
    <tr>
				<td > 
                	<a href="equipamentos_de_medicao.php?funcao=alt&id=<? echo $linha['id'] ?>"><img src="images/Mini/approve_notes.png" alt="altera" width="20px" /></a>
                	<a href="include/equipamentos_de_medicao.php?funcao=exclui&id=<? echo $linha['id'] ?>"></a>
                    <input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                </td>

    <td><? echo utf8_encode($linha['nome']); ?></td>
	<td><? echo utf8_encode($linha['num_serie']); ?></td>
    <td><? echo utf8_encode($linha['descricao']); ?></td> 
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="9">&nbsp;
	<? echo "Total : ",$quantidade_filt;?>
    </th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
</form>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA Aferição Balança
****************************************************************************************************************************************** -->



		</div>
		<div id="headline">

		</div>
		<div id="body">
			
		</div>
	</div>
<? require"rodape.php"; ?>
</body>
</html>
