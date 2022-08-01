<?
session_start();
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
											CONSULTA Aferição Balança
****************************************************************************************************************************************** -->

<? 
if ($pg == "ramal") {//Consulta Ramais
?>

<h1>Ramais</h1> 

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
		<? if ($ramal_altera == "1" or $ramal_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" id="th_mercado">NOME.&nbsp;</th>
    <th width="5%" id="th_mercado">RAMAL.&nbsp;</th>
    <th width="5%" id="th_mercado">SALA.&nbsp;</th>
    <th width="5%" id="th_mercado">EMPRESA.&nbsp;</th>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";

	$sql = mysql_query("SELECT * FROM ramal ORDER BY local DESC  ");	
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($ramal_exclui == "1" or $ramal_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($ramal_exclui == "1"){?>
                	<a href="include/local.php?funcao=exclui&id=<? echo $linha['id'] ?>">Excluir&nbsp;&nbsp;</a>
                <? }?>
                <? if ($ramal_altera == "1"){?>
                	<a href="local.php?pg=alt&id=<? echo $linha['id'] ?>">Exibe&nbsp;&nbsp;</a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['nome']); ?>&nbsp;&nbsp;&nbsp;</td>
	<td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['ramal']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['sala']); ?>&nbsp;&nbsp;&nbsp;</td> 
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['empresa']); ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 switch($linha['situacao']){
	 case 0:
	 $ramal_livre ++;
	 break;
	 case 1:
	 $ramal_ativo ++;
	 break;
	 default:
	 break;
	 
	 }
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="1">
	<? echo "Total Ramais: ".$quantidade_filt."<br />";
	if( $ramal_consula == "1"){
	 echo "Ramais Ativos: ".$ramal_ativo.
	"<br />Ramais Inativos: ".$ramal_livre	;
	}
	?>
    </th>
    <th colspan="8"></th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA Aferição Balança
****************************************************************************************************************************************** -->