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
 <div id="headline"> 

			<!-- ***********************  cadastro Plano de Ação ************************* --> 
        	      
		<?
	if ( isset($_SESSION['login_usuario']) and $filt_baixa_patrimonio < "2") {//Cadastro de Plano de Ação  
$id = $_GET['id'];	
	?>
<h1>Baixa patrimônio</h1> 

	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=baixa_patrimonio&id=<? echo $id ?>" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">NUM. PATRIMONIO</div></td>
     <td><input type="text" name="num_patrimonio" id="cadnum_patrimonio" value="<? echo $_REQUEST['num_patrimonio']?>" disabled maxlength="300" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">TIPO DE BAIXA</div></td>
     <td>MANUTENÇÃO
       <input name="tipo_baixa" type="radio" value="1" 
       onClick="document.frmcadastro.empresa.disabled = 0;
       			document.frmcadastro.data_prevista.disabled = 0;
                document.frmcadastro.descricao.disabled = 0;">
       &nbsp;DESCARTE
       <input name="tipo_baixa" type="radio" value="2"
       onClick="document.frmcadastro.empresa.disabled = 1;
			    document.frmcadastro.data_prevista.disabled = 1;
                document.frmcadastro.descricao.disabled = 1;"></td>
   </tr>
   <tr>
     <td><div align="right">DESCRIÇÃO</div></td>
     <td><label for="DESCRICAO"></label>
      <textarea name="descricao" cols="25" rows="5" disabled id="descricao"></textarea></td>
   </tr>
   <tr>
     <td><div align="right">EMPRESA</div></td>
     <td>
     <select name="empresa" id="empresa" disabled>
        
         
         <option selected="<? $cod_funcionario_mercado ?>"></option>
       <?   
	   include"include/conexao.php";
	   	$sql_cad_empresa = mysql_query("SELECT razao_social,cnpj FROM cad_empresas where tipo_servico like ('1') ");
		$cont2 = mysql_num_rows($sql_cad_empresa);
		while($linha2 = mysql_fetch_array($sql_cad_empresa)){
		$razao_sozial = $linha2['razao_social'];
		$cnpj = $linha2['cnpj'];
			?>  
         <option value="<? echo $razao_sozial ?>"><? echo utf8_encode($razao_sozial) ?></option>  
       <? } ?>
      </select>
     </td>
   </tr>
   <tr>
     <td><div align="left">DATA PREVISÃO</div></td>
     <td><input name="data_prevista" type="text" disabled id="data_1" size="15" maxlength="10" readonly="readonly"  /></td>
   </tr>
   <tr>
   <tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       </div></td>
   </tr>
    </table>
  </form>	<? } ?>
<!-- *********************** fim  cadastro Plano de Ação ************************* -->

</body>
<? require"rodape.php"; ?>