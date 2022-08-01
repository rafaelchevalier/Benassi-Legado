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
<h2><p>CLP - Check List Predial</p></h2>
<!-- ************************************************************************************************************************************* 
											CADASTRO Aferição Balança
****************************************************************************************************************************************** -->
		<? 	if ($pg == "cad"  /*and $clp_inclui == "1" */) {//Cadastro Temperatura Camaras  ?>

<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/clp.php?funcao=cad" >
     <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado; ?> " maxlength="30" size="31" readonly="readonly"  />
 <table border="2" align="center" id="tbcad">    

	<!--************************ CABEÇALHO ************************-->
   <tr>
     <th width="10px" align="center">ÁREA</th>
     <th width="50px" align="center">ITEM</th>
     <th width="10px" align="center">SITUAÇÃO</th>
     <th width="49"  align="center">PLANO DE AÇÃO</th>
     <th width="10px" align="center">ÁREA</th>
     <th width="50px" align="center">ITEM</th>
     <th width="10px" align="center">SITUAÇÃO</th>
     <th width="49" align="center">PLANO DE AÇÃO</th>
   </tr>
   <!-- ************************* Embalado ************************* -->
   <tr>
     <th rowspan="11" id="td_vertical">E<br />M<br />B<br />A<br />L<br />A<br />D<br />O<br />S</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="embalados_teto" id="embalados_teto" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_teto" id="embalados_teto" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="embalados_teto_obs" cols="40" rows="2" id="embalados_teto_obs"></textarea></td>
     <th rowspan="8">C<br />A<br />M<br />A<br />R<br />A<br /><br />F<br />R<br />I<br />A</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_teto" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_teto" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_teto_obs" cols="40" rows="2" id="camara_fria_teto_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>LUMINÁRIA</td>
     <td align="left" >
     	<input type="radio" name="embalados_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_luminaria_obs" cols="40" rows="2" id="embalados_luminaria_obs"></textarea></td>
     <td>LUMINÁRIA</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_luminaria_obs" cols="40" rows="2" id="camara_fria_luminaria_obs"></textarea></td>
   </tr>
   
     <tr>
       <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="embalados_parede" id="embalados_parede" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_parede" id="embalados_parede" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_parede_obs" cols="40" rows="2" id="embalados_parede_obs"></textarea></td>
     <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_parede" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_parede" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_parede_obs" cols="40" rows="2" id="camara_fria_parede_obs"></textarea></td>
     </tr>
     
   <tr>
     <td>PORTA</td>
     <td align="left" >
     	<input type="radio" name="embalados_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="embalados_porta_obs" cols="40" rows="2" id="embalados_porta_obs"></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_porta_obs" cols="40" rows="2" id="camara_fria_porta"></textarea></td>
   </tr>
     <tr>
       <td>FIAÇÃO</td>
     	<td align="left">
     	<input type="radio" name="embalados_fiacao" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_fiacao" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_fiacao_obs" cols="40" rows="2" id="embalados_fiacao_obs"></textarea></td>
     <td>FIAÇÃO</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_fiacao" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_fiacao" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_fiacao_obs" cols="40" rows="2" id="camara_fria_fiacao_obs"></textarea></td>
   </tr>
   <tr>
     <td>BALANÇAS</td>
     <td align="left" >
     	<input type="radio" name="embalados_balanca" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
     	<br />       		
     	<input type="radio" name="embalados_balanca" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_balanca_obs" cols="40" rows="2" id="embalados_balanca_obs"></textarea></td>
     <td>GAIOLAS</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_gaiola" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_gaiola" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_gaiola_obs" cols="40" rows="2" id="camara_fria_gaiola_obs"></textarea></td>
   </tr>
   
   <tr>
       <td>UTENSILIOS (FACA E TESOURA)</td>
     	<td align="left">
     	<input type="radio" name="embalados_utensilio" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
     	<br />       		
     	<input type="radio" name="embalados_utensilio" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_utensilio_obs" cols="40" rows="2" id="embalados_utensilio_obs"></textarea></td>
     <td>EMPILHADEIRAS</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_empilhadeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_empilhadeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_empilhadeira_obs" cols="40" rows="2" id="camara_fria_empilhadeira_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>DISPENSER</td>
     <td align="left" >
     	<input type="radio" name="embalados_dispenser" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_dispenser" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_dispenser_obs" cols="40" rows="2" id="embalados_dispenser_obs"></textarea></td>
     <td>TERMOHIGROMETRO</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_termo" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_termo" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_termo_obs" cols="40" rows="2" id="camara_fria_termo"></textarea></td>
   </tr>
   
   <tr>
       <td>PIA</td>
     	<td align="left">
     	<input type="radio" name="embalados_pia" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_pia" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_pia_obs" cols="40" rows="2" id="embalados_pia_obs"></textarea></td>
     <th rowspan="6">G<br />R<br />A<br />N<br />E<br />L</th>
     <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="manga_parede" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_parede" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_parede_obs" cols="40" rows="2" id="manga_parede_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>LIXEIRAS</td>
     <td align="left" >
     	<input type="radio" name="embalados_lixeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_lixeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_lixeira_obs" cols="40" rows="2" id="embalados_lixeira_obs"></textarea></td>
     <td>LUMINARIA</td>
     	<td align="left">
     	<input type="radio" name="manga_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_luminaria_obs" cols="40" rows="2" id="manga_luminaria_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>ISCA LUMINOSA</td>
     <td align="left" >
     	<input type="radio" name="embalados_isca" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_isca" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_isca_obs" cols="40" rows="2" id="embalados_isca_obs"></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="manga_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_porta_obs" cols="40" rows="2" id="manga_porta_obs"></textarea></td>
   </tr>
<!-- ************************* Fim Embalado ************************* -->
<!-- ************************* COZINHA INDUSTRIAL e GALPÃO ************************* -->
   <tr>
     <th rowspan="9" align="center">C<br />O<br />Z<br />I<br />N<br />H<br />A<br /><br />I<br />N<br />D<br />U<br />S<br />T<br />R<br />I<br />A<br />L</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_teto" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_teto" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_teto_obs" cols="40" rows="2" id="cozinha_ind_teto_obs"></textarea></td>
     <td>LIXEIRA</td>
     	<td align="left">
     	<input type="radio" name="manga_lixeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_lixeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_lixeira_obs" cols="40" rows="2" id="manga_lixeira_obs"></textarea></td>
   </tr>
	<tr>
     <td>LUMINÁRIA</td>
     <td align="left" >
     	<input type="radio" name="cozinha_ind_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_luminaria_obs" cols="40" rows="2" id="cozinha_ind_luminaria_obs"></textarea></td>
     <td>BALANÇA</td>
     	<td align="left">
     	<input type="radio" name="manga_balanca" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_balanca" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_balanca_obs" cols="40" rows="2" id="manga_balanca_obs"></textarea></td>
    </tr>
    <tr>
        <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_parede" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_parede" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_parede_obs" cols="40" rows="2" id="cozinha_ind_parede_obs"></textarea></td>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="manga_teto" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_teto" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_teto_obs" cols="40" rows="2" id="manga_teto_obs"></textarea></td>
   </tr>
   <tr>
     <td rowspan="2">PORTA</td>
     <td align="left" rowspan="2">
     	<input type="radio" name="cozinha_ind_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td rowspan="2"><textarea name="cozinha_ind_porta_obs" cols="40" rows="2" id="cozinha_ind_porta_obs"></textarea></td>
     <th rowspan="6">S<br />A<br />L<br />Ã<br />O</th>
     <td>BALANÇAS</td>
     	<td align="left">
     	<input type="radio" name="galpao_balanca" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_balanca" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_balanca_obs" cols="40" rows="2" id="galpao_balanca_obs"></textarea></td>
   </tr>
   <tr>
     <td>Vazamento de Áqua(Manutenção Hidráulica)</td>
     	<td align="left">
     	<input type="radio" name="galpao_manutencao_hidraulica" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_manutencao_hidraulica" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_manutencao_hidraulica_balanca_obs" cols="40" rows="2" id="galpao_manutencao_hidraulica_balanca_obs"></textarea></td>
   </tr>
   
  <tr>
         <td>FIAÇÃO</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_fiacao" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_fiacao" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_fiacao_obs" cols="40" rows="2" id="cozinha_ind_fiacao_obs"></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="galpao_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_porta_obs" cols="40" rows="2" id="galpao_porta_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>BALANÇAS</td>
     <td align="left" >
     	<input type="radio" name="cozinha_ind_balanca" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_balanca" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_balanca_obs" cols="40" rows="2" id="cozinha_ind_balanca_obs"></textarea></td>
     <td>LIXEIRA</td>
     	<td align="left">
     	<input type="radio" name="galpao_lixeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_lixeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_lixeira_obs" cols="40" rows="2" id="galpao_lixeira_obs"></textarea></td>
   </tr>
   
  <tr>
         <td>COMPUTADORES</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_computador" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_computador" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_computador_obs" cols="40" rows="2" id="cozinha_ind_computador_obs"></textarea></td>
     <td>LUMINARIA</td>
     	<td align="left">
     	<input type="radio" name="galpao_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_luminaria_obs" cols="40" rows="2" id="galpao_luminaria_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>LIXEIRAS</td>
     <td align="left" >
     	<input type="radio" name="cozinha_ind_lixeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_lixeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_lixeira_obs" cols="40" rows="2" id="cozinha_ind_lixeira_obs"></textarea></td>
     <td>DISPENSER</td>
     	<td align="left">
     	<input type="radio" name="galpao_dispenser" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_dispenser" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_dispenser_obs" cols="40" rows="2" id="galpao_dispenser_obs"></textarea></td>
   </tr>

   <tr>
     <th rowspan="11" align="center">B<br />A<br />N<br />H<br />E<br />R<br />I<br />O<br /><br />F<br />E<br />M<br />I<br />N<br />I<br />N<br />O</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_teto" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_teto" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_teto_obs" cols="40" rows="2" id="banheiro_feminino_teto_obs"></textarea></td>
     <th rowspan="12">B<br />A<br />N<br />H<br />E<br />I<br />R<br />O<br />S<br /><br />M<br />A<br />S<br />C<br />U<br />L<br />I<br />N<br />O</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_teto" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_teto" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_teto_obs" cols="40" rows="2" id="banheiro_masculino_teto_obs"></textarea></td>
   </tr>
   
   <tr>
     <td>LUMINÁRIA</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_luminaria_obs" cols="40" rows="2" id="banheiro_feminino_luminaria_obs"></textarea></td>
     <td>LUMINÁRIA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_luminaria" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_luminaria" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_luminaria_obs" cols="40" rows="2" id="banheiro_masculino_luminaria_obs"></textarea></td>
   </tr>
   
   
  <tr>
         <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_parede" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_parede" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_parede_obs" cols="40" rows="2" id="banheiro_feminino_parede_obs"></textarea></td>
     <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_parede" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_parede" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_parede_obs" cols="40" rows="2" id="banheiro_masculino_parede_obs"></textarea></td>
   </tr>
   
   
   <tr>
     <td>PORTA</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_porta_obs" cols="40" rows="2" id="banheiro_feminino_porta"></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_porta" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_porta" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_porta_obs" cols="40" rows="2" id="banheiro_masculino_porta_obs"></textarea></td>
   </tr>
   
   
<tr>
           <td>MOLA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_mola" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_mola" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_mola_obs" cols="40" rows="2" id="banheiro_feminino_mola_obs"></textarea></td>
     <td>MOLA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_mola" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_mola" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_mola_obs" cols="40" rows="2" id="banheiro_masculino_mola_obs"></textarea></td>
   </tr>
   
   
   <tr>
     <td>DISPENSER</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_dispenser" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_dispenser" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_dispenser_obs" cols="40" rows="2" id="banheiro_feminino_dispenser_obs"></textarea></td>
     <td>DISPENSER</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_dispenser" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_dispenser" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_dispenser_obs" cols="40" rows="2" id="banheiro_masculino_dispenser_obs"></textarea></td>
   </tr>
   
   
   <tr>
       <td>PIA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_pia" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_pia" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_pia_obs" cols="40" rows="2" id="banheiro_feminino_pia_obs"></textarea></td>
     <td>PIA </td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_pia" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_pia" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_pia_obs" cols="40" rows="2" id="banheiro_masculino_pia_obs"></textarea></td>
   </tr>
   
   
   <tr>
     <td>LIXEIRAS</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_lixeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_lixeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_lixeira_obs" cols="40" rows="2" id="banheiro_feminino_lixeira_obs"></textarea></td>
     <td>LIXEIRAS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_lixeira" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_lixeira" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_lixeira_obs" cols="40" rows="2" id="banheiro_masculino_lixeira_obs"></textarea></td>
   </tr>
   
   
   <tr>
     <td>JANELAS</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_janela" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_janela" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_janela_obs" cols="40" rows="2" id="banheiro_feminino_janela_obs"></textarea></td>
     <td>JANELAS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_janela" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_janela" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_janela_obs" cols="40" rows="2" id="banheiro_masculino_janela_obs"></textarea></td>
   </tr>
   
   
   <tr>
     <td>VASO SANITARIO</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_vaso" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_vaso" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_vaso_obs" cols="40" rows="2" id="banheiro_feminino_vaso_obs"></textarea></td>
     <td>VASO SANITÁRIO</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_vaso" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_vaso" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_vaso_obs" cols="40" rows="2" id="banheiro_masculino_vaso_obs"></textarea></td>
   </tr>
   
   
   <tr>
     <td>CHUVEIROS</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_chuveiro" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_chuveiro" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_chuveiro_obs" cols="40" rows="2" id="banheiro_feminino_chuveiro_obs"></textarea></td>
     <td>MICTÓRIOS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_mictorio" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_mictorio" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_mictorio_obs" cols="40" rows="2" id="banheiro_masculino_mictorio_obs"></textarea></td>
   
   </tr>
   <tr>
   	 <th colspan="4"></th>
     
     
     <td>CHUVEIROS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_chuveiro" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_chuveiro" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_chuveiro_obs" cols="40" rows="2" id="banheiro_masculino_chuveiro_obs"></textarea></td>
   </tr>
   <!-- Fim Banheiros -->
   
   
   <!-- ************************* INCIO Zona Sul e Processados ************************* -->
	<tr>
		<!-- Processado -->
		<th rowspan="11">P<br />R<br />O<br />C<br />E<br />S<br />S<br />A<br />D<br />O<br />S</th>
		<td>TETO</td>
		<td>
			<input type="radio" name="processados_teto" id="" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_teto" id="" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<!-- Cozinha -->
		<td><textarea name="processados_teto_obs" cols="40" rows="2"></textarea></td>
		<th rowspan="8">Z<br />o<br />n<br />a<br /> <br />S<br />u<br />l<br /></th>
		<td>TETO</td>
		<td>
			<input type="radio" name="zona_sul_teto" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_teto" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_teto_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>LUMINARIA</td>
		<td>
			<input type="radio" name="processados_luminaria" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_luminaria" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_luminaria_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>LUMINARIA</td>
		<td>
			<input type="radio" name="zona_sul_luminaria" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_luminaria" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_luminaria_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>PAREDE</td>
		<td>
			<input type="radio" name="processados_parede" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_parede" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_parede_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>PAREDE</td>
		<td>
			<input type="radio" name="zona_sul_parede" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_parede" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_parede_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>PORTA</td>
		<td>
			<input type="radio" name="processados_porta" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_porta" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_porta_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>PORTA</td>
		<td>
			<input type="radio" name="zona_sul_porta" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_porta" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_porta_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>FIAÇÃO</td>
		<td>
			<input type="radio" name="processados_fiacao" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_fiacao" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_fiacao_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>FIAÇÃO</td>
		<td>
			<input type="radio" name="zona_sul_fiacao" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_fiacao" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_fiacao_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>BALANÇA</td>
		<td>
			<input type="radio" name="processados_balanca" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_balanca" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_balanca_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>BALANÇA</td>
		<td>
			<input type="radio" name="zona_sul_balanca" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_balanca" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_balanca_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>UTENSILIOS</td>
		<td>
			<input type="radio" name="processados_utensilio" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_utensilio" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_utensilio_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>COMPUTADORES</td>
		<td>
			<input type="radio" name="zona_sul_computador" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_computador" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_computador_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>DISPENSER</td>
		<td>
			<input type="radio" name="processados_dispenser" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_dispenser" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_dispenser_obs" cols="40" rows="2"></textarea></td>
		<!-- Cozinha -->
		<td>LIXEIRA</td>
		<td>
			<input type="radio" name="zona_sul_lixeira" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_lixeira" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_lixeira_obs" cols="40" rows="2"></textarea></td>
	</tr>
	<tr>
		<!-- PROCESSADO -->
		<td>PIA</td>
		<td>
			<input type="radio" name="processados_pia" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_pia" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_pia_obs" cols="40" rows="2"></textarea></td>
		<!-- LIVRE -->
		<th colspan="3">ÁREA DE MANUTENÇÃO</th>
		<td><textarea name="area_manutencao_obs" cols="40" rows="2" id="area_manutencao_obs"></textarea></td>
	</tr>
	<tr>
		<!-- PROCESSADO -->
		<td>LIXEIRA</td>
		<td>
			<input type="radio" name="processados_lixeira" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_lixeira" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_lixeira_obs" cols="40" rows="2"></textarea></td>
		<!-- LIVRE -->
		<th colspan="3" > OBS Geral</th>
		<td> <textarea name="obs" cols="40" rows="2" id="obs"></textarea></td>
	</tr>
	<tr>
		<!-- PROCESSADO -->
		<td>ISCA</td>
		<td>
			<input type="radio" name="processados_isca" value="1" />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_isca" value="0" checked="checked" /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_isca_obs" cols="40" rows="2"></textarea></td>
		<!-- LIVRE -->
		<td colspan="4" align="center" >
			Data:
			<input name="data" type="text" size="20" maxlength="10" readonly="readonly" <? if($phg_libera_data == 1) {?>id="data_4" <? }?>value="<? echo $data_atual?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
			Próxima Verificação:
			<input name="data_verificacao" type="text" id="data2" size="20" maxlength="10" readonly="readonly" <? if($phg_libera_data == 1) {?>id="data_1" <? }?>value="<? echo $data_atual?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
		</td>
	</tr>
   
  <!-- ************************* Fim Zona Sul e Processados ************************* -->
  <tr>
     <td colspan="15">
     	<div align="center">
       		<input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       		<input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     	</div></td>
   </tr>
 </table>
  </form>	
	 <? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											ALTERA Aferição Balança
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "alt" and $clp_consulta == "1") {//Cadastro Temperatura Camaras?>

    
    
<h1>Altera</h1>

<?
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM clp where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
?>		 
	 <form id="frmcadastro" name="frmcadastro" method="post"<? if ($clp_altera == 1){?> action="include/clp.php?funcao=alt&id=<? echo $id ?>" <? }?> >
      <input type="hidden" name="usuario" id="usuario" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  /></td></td>
     <table border="2" align="center" id="tbcad">    

	<!--************************ CABEÇALHO ************************-->
   <tr>
     <th width="10px" align="center">ÁREA</th>
     <th width="50px" align="center">ITEM</th>
     <th width="10px" align="center">SITUAÇÃO</th>
     <th width="49"  align="center">PLANO DE AÇÃO</th>
     <th width="10px" align="center">ÁREA</th>
     <th width="50px" align="center">ITEM</th>
     <th width="10px" align="center">SITUAÇÃO</th>
     <th width="49" align="center">PLANO DE AÇÃO</th>
   </tr>
   <!-- ************************* Embalado ************************* -->
   <tr>
     <th rowspan="11" id="td_vertical">E<br />M<br />B<br />A<br />L<br />A<br />D<br />O<br />S</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="embalados_teto" id="embalados_teto" value="1" <? if( $linha['embalados_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_teto" id="embalados_teto" value="0" <? if( $linha['embalados_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="embalados_teto_obs" cols="40" rows="2" id="embalados_teto_obs"><? echo utf8_encode($linha['embalados_teto_obs'])?><? echo $linha['']?></textarea></td>
     <th rowspan="8">C<br />A<br />M<br />A<br />R<br />A<br /><br />F<br />R<br />I<br />A</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_teto" id="" value="1" <? if( $linha['camara_fria_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_teto" id="" value="0" <? if( $linha['camara_fria_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_teto_obs" cols="40" rows="2" id="camara_fria_teto_obs"><? echo utf8_encode($linha['camara_fria_teto_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>LUMINÁRIA</td>
     <td align="left" >
     	<input type="radio" name="embalados_luminaria" id="" value="1" <? if( $linha['embalados_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_luminaria" id="" value="0" <? if( $linha['embalados_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_luminaria_obs" cols="40" rows="2" id="embalados_luminaria_obs"><? echo utf8_encode($linha['embalados_luminaria_obs'])?></textarea></td>
     <td>LUMINÁRIA</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_luminaria" id="" value="1" <? if( $linha['camara_fria_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_luminaria" id="" value="0" <? if( $linha['camara_fria_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_luminaria_obs" cols="40" rows="2" id="camara_fria_luminaria_obs"><? echo utf8_encode($linha['camara_fria_luminaria_obs'])?></textarea></td>
   </tr>
   
     <tr>
       <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="embalados_parede" id="embalados_parede" value="1" <? if( $linha['embalados_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_parede" id="embalados_parede" value="0" <? if( $linha['embalados_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_parede_obs" cols="40" rows="2" id="embalados_parede_obs"><? echo utf8_encode($linha['embalados_parede_obs'])?></textarea></td>
     <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_parede" id="" value="1" <? if( $linha['camara_fria_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_parede" id="" value="0" <? if( $linha['camara_fria_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_parede_obs" cols="40" rows="2" id="camara_fria_parede_obs"><? echo utf8_encode($linha['camara_fria_parede_obs'])?></textarea></td>
     </tr>
     
   <tr>
     <td>PORTA</td>
     <td align="left" >
     	<input type="radio" name="embalados_porta" id="" value="1" <? if( $linha['embalados_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_porta" id="" value="0" <? if( $linha['embalados_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="embalados_porta_obs" cols="40" rows="2" id="embalados_porta_obs"><? echo utf8_encode($linha['embalados_porta_obs'])?></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_porta" id="" value="1" <? if( $linha['camara_fria_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_porta" id="" value="0" <? if( $linha['camara_fria_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_porta_obs" cols="40" rows="2" id="camara_fria_porta"><? echo utf8_encode($linha['camara_fria_porta_obs'])?></textarea></td>
   </tr>
   
     <tr>
       <td>FIAÇÃO</td>
     	<td align="left">
     	<input type="radio" name="embalados_fiacao" id="" value="1" <? if( $linha['embalados_fiacao'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_fiacao" id="" value="0" <? if( $linha['embalados_fiacao'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_fiacao_obs" cols="40" rows="2" id="embalados_fiacao_obs"><? echo utf8_encode($linha['embalados_fiacao_obs'])?></textarea></td>
     <td>FIAÇÃO</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_fiacao" id="" value="1" <? if( $linha['camara_fria_fiacao'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_fiacao" id="" value="0" <? if( $linha['camara_fria_fiacao'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_fiacao_obs" cols="40" rows="2" id="camara_fria_fiacao_obs"><? echo utf8_encode($linha['camara_fria_fiacao_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>BALANÇAS</td>
     <td align="left" >
     	<input type="radio" name="embalados_balanca" id="" value="1" <? if( $linha['embalados_balanca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
     	<br />       		
     	<input type="radio" name="embalados_balanca" id="" value="0" <? if( $linha['embalados_balanca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_balanca_obs" cols="40" rows="2" id="embalados_balanca_obs"><? echo utf8_encode($linha['embalados_balanca_obs'])?></textarea></td>
     <td>GAIOLAS</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_gaiola" id="" value="1" <? if( $linha['camara_fria_gaiola'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_gaiola" id="" value="0" <? if( $linha['camara_fria_gaiola'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_gaiola_obs" cols="40" rows="2" id="camara_fria_gaiola_obs"><? echo utf8_encode($linha['camara_fria_gaiola_obs'])?></textarea></td>
   </tr>
   
   <tr>
       <td>UTENSILIOS (FACA E TESOURA)</td>
     	<td align="left">
     	<input type="radio" name="embalados_utensilio" id="" value="1" <? if( $linha['embalados_utensilio'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
     	<br />       		
     	<input type="radio" name="embalados_utensilio" id="" value="0" <? if( $linha['embalados_utensilio'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_utensilio_obs" cols="40" rows="2" id="embalados_utensilio_obs"><? echo utf8_encode($linha['embalados_utensilio_obs'])?></textarea></td>
     <td>EMPILHADEIRAS</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_empilhadeira" id="" value="1" <? if( $linha['camara_fria_empilhadeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_empilhadeira" id="" value="0" <? if( $linha['camara_fria_empilhadeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_empilhadeira_obs" cols="40" rows="2" id="camara_fria_empilhadeira_obs"><? echo utf8_encode($linha['camara_fria_empilhadeira_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>DISPENSER</td>
     <td align="left" >
     	<input type="radio" name="embalados_dispenser" id="" value="1" <? if( $linha['embalados_dispenser'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_dispenser" id="" value="0" <? if( $linha['embalados_dispenser'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_dispenser_obs" cols="40" rows="2" id="embalados_dispenser_obs"><? echo utf8_encode($linha['embalados_dispenser_obs'])?></textarea></td>
     <td>TERMOHIGROMETRO</td>
     	<td align="left">
     	<input type="radio" name="camara_fria_termo" id="" value="1" <? if( $linha['camara_fria_termo'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="camara_fria_termo" id="" value="0" <? if( $linha['camara_fria_termo'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="camara_fria_termo_obs" cols="40" rows="2" id="camara_fria_termo_obs"><? echo utf8_encode($linha['camara_fria_termo_obs'])?></textarea></td>
   </tr>
   
   <tr>
       <td>PIA</td>
     	<td align="left">
     	<input type="radio" name="embalados_pia" id="" value="1" <? if( $linha['embalados_pia'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_pia" id="" value="0" <? if( $linha['embalados_pia'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_pia_obs" cols="40" rows="2" id="embalados_pia_obs"><? echo utf8_encode($linha['embalados_pia_obs'])?></textarea></td>
     <th rowspan="6">G<br />R<br />A<br />N<br />E<br />L</th>
     <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="manga_parede" id="" value="1" <? if( $linha['manga_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_parede" id="" value="0" <? if( $linha['manga_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_parede_obs" cols="40" rows="2" id="manga_parede_obs"><? echo utf8_encode($linha['manga_parede_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>LIXEIRAS</td>
     <td align="left" >
     	<input type="radio" name="embalados_lixeira" id="" value="1" <? if( $linha['embalados_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_lixeira" id="" value="0" <? if( $linha['embalados_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_lixeira_obs" cols="40" rows="2" id="embalados_lixeira_obs"><? echo utf8_encode($linha['embalados_lixeira_obs'])?></textarea></td>
     <td>LUMINARIA</td>
     	<td align="left">
     	<input type="radio" name="manga_luminaria" id="" value="1" <? if( $linha['manga_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_luminaria" id="" value="0" <? if( $linha['manga_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_luminaria_obs" cols="40" rows="2" id="manga_luminaria_obs"><? echo utf8_encode($linha['manga_luminaria_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>ISCA LUMINOSA</td>
     <td align="left" >
     	<input type="radio" name="embalados_isca" id="" value="1" <? if( $linha['embalados_isca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="embalados_isca" id="" value="0" <? if( $linha['embalados_isca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="embalados_isca_obs" cols="40" rows="2" id="embalados_isca_obs"><? echo utf8_encode($linha['embalados_isca_obs'])?></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="manga_porta" id="" value="1" <? if( $linha['manga_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_porta" id="" value="0" <? if( $linha['manga_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_porta_obs" cols="40" rows="2" id="manga_porta_obs"><? echo utf8_encode($linha['manga_porta_obs'])?></textarea></td>
   </tr>
<!-- ************************* Fim Embalado ************************* -->
<!-- ************************* COZINHA INDUSTRIAL ************************* -->
   <tr>
     <th rowspan="9" align="center">C<br />O<br />Z<br />I<br />N<br />H<br />A<br /><br />I<br />N<br />D<br />U<br />S<br />T<br />R<br />I<br />A<br />L</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_teto" id="" value="1" <? if( $linha['cozinha_ind_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_teto" id="" value="0" <? if( $linha['cozinha_ind_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_teto_obs" cols="40" rows="2" id="cozinha_ind_teto_obs"><? echo utf8_encode($linha['cozinha_ind_teto_obs'])?></textarea></td>
     <td>LIXEIRA</td>
     	<td align="left">
     	<input type="radio" name="manga_lixeira" id="" value="1" <? if( $linha['manga_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_lixeira" id="" value="0" <? if( $linha['manga_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_lixeira_obs" cols="40" rows="2" id="manga_lixeira_obs"><? echo utf8_encode($linha['manga_lixeira_obs'])?></textarea></td>
   </tr>
   <tr>
     <td>LUMINÁRIA</td>
     <td align="left" >
     	<input type="radio" name="cozinha_ind_luminaria" id="" value="1" <? if( $linha['cozinha_ind_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_luminaria" id="" value="0" <? if( $linha['cozinha_ind_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_luminaria_obs" cols="40" rows="2" id="cozinha_ind_luminaria_obs"><? echo utf8_encode($linha['cozinha_ind_luminaria_obs'])?></textarea></td>
     <td>BALANÇA</td>
     	<td align="left">
     	<input type="radio" name="manga_balanca" id="" value="1" <? if( $linha['manga_balanca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_balanca" id="" value="0" <? if( $linha['manga_balanca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_balanca_obs" cols="40" rows="2" id="manga_balanca_obs"><? echo utf8_encode($linha['manga_balanca_obs'])?></textarea></td>
     </tr>
     
    <tr>
         <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_parede" id="" value="1" <? if( $linha['cozinha_ind_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_parede" id="" value="0" <? if( $linha['cozinha_ind_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_parede_obs" cols="40" rows="2" id="cozinha_ind_parede_obs"><? echo utf8_encode($linha['cozinha_ind_parede_obs'])?></textarea></td>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="manga_teto" id="" value="1" <? if( $linha['manga_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="manga_teto" id="" value="0" <? if( $linha['manga_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="manga_teto_obs" cols="40" rows="2" id="manga_teto_obs"><? echo utf8_encode($linha['manga_teto_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td rowspan="2" rowspan="2">PORTA</td>
     <td align="left" rowspan="2">
     	<input type="radio" name="cozinha_ind_porta" id="" value="1" <? if( $linha['cozinha_ind_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_porta" id="" value="0" <? if( $linha['cozinha_ind_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td rowspan="2"><textarea name="cozinha_ind_porta_obs" cols="40" rows="2" id="cozinha_ind_porta_obs"><? echo utf8_encode($linha['cozinha_ind_porta_obs'])?></textarea></td>
     <th  rowspan="6">S<br />A<br />L<br />Ã<br />O</th>
     <td>BALANÇAS</td>
     	<td align="left">
     	<input type="radio" name="galpao_balanca" id="" value="1" <? if( $linha['galpao_balanca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_balanca" id="" value="0" <? if( $linha['galpao_balanca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_balanca_obs" cols="40" rows="2" id="galpao_balanca_obs"><? echo utf8_encode($linha['galpao_balanca_obs'])?></textarea></td>
   </tr>
   <tr>
     <td>Vazamento de Áqua(Manutenção Hidráulica)</td>
     	<td align="left">
     	<input type="radio" name="galpao_manutencao_hidraulica" id="" value="1" <? if( $linha['galpao_manutencao_hidraulica'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_manutencao_hidraulica" id="" value="0" <? if( $linha['galpao_manutencao_hidraulica'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_manutencao_hidraulica_balanca_obs" cols="40" rows="2" id="galpao_manutencao_hidraulica_balanca_obs"><? echo utf8_encode($linha['galpao_manutencao_hidraulica_balanca_obs'])?></textarea></td>
   </tr>
  <tr>
         <td>FIAÇÃO</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_fiacao" id="" value="1" <? if( $linha['cozinha_ind_fiacao'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_fiacao" id="" value="0" <? if( $linha['cozinha_ind_fiacao'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_fiacao_obs" cols="40" rows="2" id="cozinha_ind_fiacao_obs"><? echo utf8_encode($linha['cozinha_ind_fiacao_obs'])?></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="galpao_porta" id="" value="1" <? if( $linha['galpao_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_porta" id="" value="0" <? if( $linha['galpao_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_porta_obs" cols="40" rows="2" id="galpao_porta_obs"><? echo utf8_encode($linha['galpao_porta_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>BALANÇAS</td>
     <td align="left" >
     	<input type="radio" name="cozinha_ind_balanca" id="" value="1" <? if( $linha['cozinha_ind_balanca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_balanca" id="" value="0" <? if( $linha['cozinha_ind_balanca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_balanca_obs" cols="40" rows="2" id="cozinha_ind_balanca_obs"><? echo utf8_encode($linha['cozinha_ind_balanca_obs'])?></textarea></td>
     <td>LIXEIRA</td>
     	<td align="left">
     	<input type="radio" name="galpao_lixeira" id="" value="1" <? if( $linha['galpao_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_lixeira" id="" value="0" <? if( $linha['galpao_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_lixeira_obs" cols="40" rows="2" id="galpao_lixeira_obs"><? echo utf8_encode($linha['galpao_lixeira_obs'])?></textarea></td>
   </tr>
   
  <tr>
         <td>COMPUTADORES</td>
     	<td align="left">
     	<input type="radio" name="cozinha_ind_computador" id="" value="1" <? if( $linha['cozinha_ind_computador'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_computador" id="" value="0" <? if( $linha['cozinha_ind_computador'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_computador_obs" cols="40" rows="2" id="cozinha_ind_computador_obs"><? echo utf8_encode($linha['cozinha_ind_computador_obs'])?></textarea></td>
     <td>LUMINARIA</td>
     	<td align="left">
     	<input type="radio" name="galpao_luminaria" id="" value="1" <? if( $linha['galpao_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_luminaria" id="" value="0" <? if( $linha['galpao_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_luminaria_obs" cols="40" rows="2" id="galpao_luminaria_obs"><? echo utf8_encode($linha['galpao_luminaria_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>LIXEIRAS</td>
     <td align="left" >
     	<input type="radio" name="cozinha_ind_lixeira" id="" value="1" <? if( $linha['cozinha_ind_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="cozinha_ind_lixeira" id="" value="0" <? if( $linha['cozinha_ind_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="cozinha_ind_lixeira_obs" cols="40" rows="2" id="cozinha_ind_lixeira_obs"><? echo utf8_encode($linha['cozinha_ind_lixeira_obs'])?></textarea></td>
     <td>DISPENSER</td>
     	<td align="left">
     	<input type="radio" name="galpao_dispenser" id="" value="1" <? if( $linha['galpao_dispenser'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="galpao_dispenser" id="" value="0" <? if( $linha['galpao_dispenser'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="galpao_dispenser_obs" cols="40" rows="2" id="galpao_dispenser_obs"><? echo utf8_encode($linha['galpao_dispenser_obs'])?></textarea></td>
   </tr>

   <tr>
     <th rowspan="11" align="center">B<br />A<br />N<br />H<br />E<br />R<br />I<br />O<br /><br />F<br />E<br />M<br />I<br />N<br />I<br />N<br />O</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_teto" id="" value="1" <? if( $linha['banheiro_feminino_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_teto" id="" value="0" <? if( $linha['banheiro_feminino_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_teto_obs" cols="40" rows="2" id="banheiro_feminino_teto_obs"><? echo utf8_encode($linha['banheiro_feminino_teto_obs'])?></textarea></td>
     <th rowspan="12">B<br />A<br />N<br />H<br />E<br />I<br />R<br />O<br />S<br /><br />M<br />A<br />S<br />C<br />U<br />L<br />I<br />N<br />O</th>
     <td>TETO</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_teto" id="" value="1" <? if( $linha['banheiro_masculino_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_teto" id="" value="0" <? if( $linha['banheiro_masculino_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_teto_obs" cols="40" rows="2" id="banheiro_masculino_teto_obs"><? echo utf8_encode($linha['banheiro_masculino_teto_obs'])?></textarea></td>
   </tr>
   
   <tr>
     <td>LUMINÁRIA</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_luminaria" id="" value="1" <? if( $linha['banheiro_feminino_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_luminaria" id="" value="0" <? if( $linha['banheiro_feminino_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_luminaria_obs" cols="40" rows="2" id="banheiro_feminino_luminaria_obs"><? echo utf8_encode($linha['banheiro_feminino_luminaria_obs'])?></textarea></td>
     <td>LUMINÁRIA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_luminaria" id="" value="1" <? if( $linha['banheiro_masculino_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_luminaria" id="" value="0" <? if( $linha['banheiro_masculino_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_luminaria_obs" cols="40" rows="2" id="banheiro_masculino_luminaria_obs"><? echo utf8_encode($linha['banheiro_masculino_luminaria_obs'])?></textarea></td>
   </tr>
   
   
  <tr>
         <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_parede" id="" value="1" <? if( $linha['banheiro_feminino_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_parede" id="" value="0" <? if( $linha['banheiro_feminino_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_parede_obs" cols="40" rows="2" id="banheiro_feminino_parede_obs"><? echo utf8_encode($linha['banheiro_feminino_parede_obs'])?></textarea></td>
     <td>PAREDE</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_parede" id="" value="1" <? if( $linha['banheiro_masculino_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_parede" id="" value="0" <? if( $linha['banheiro_masculino_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_parede_obs" cols="40" rows="2" id="banheiro_masculino_parede_obs"><? echo utf8_encode($linha['banheiro_masculino_parede_obs'])?></textarea></td>
   </tr>
   <tr>
     <td>PORTA</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_porta" id="" value="1" <? if( $linha['banheiro_feminino_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_porta" id="" value="0" <? if( $linha['banheiro_feminino_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_porta_obs" cols="40" rows="2" id="banheiro_feminino_porta"><? echo utf8_encode($linha['banheiro_feminino_porta_obs'])?></textarea></td>
     <td>PORTA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_porta" id="" value="1" <? if( $linha['banheiro_masculino_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_porta" id="" value="0" <? if( $linha['banheiro_masculino_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_porta_obs" cols="40" rows="2" id="banheiro_masculino_porta_obs"><? echo utf8_encode($linha['banheiro_masculino_porta_obs'])?></textarea></td>
   </tr>
   
   
<tr>
           <td>MOLA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_mola" id="" value="1" <? if( $linha['banheiro_feminino_mola'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_mola" id="" value="0" <? if( $linha['banheiro_feminino_mola'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_mola_obs" cols="40" rows="2" id="banheiro_feminino_mola_obs"><? echo utf8_encode($linha['banheiro_feminino_mola_obs'])?></textarea></td>
     <td>MOLA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_mola" id="" value="1" <? if( $linha['banheiro_masculino_mola'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_mola" id="" value="0" <? if( $linha['banheiro_masculino_mola'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_mola_obs" cols="40" rows="2" id="banheiro_masculino_mola_obs"><? echo utf8_encode($linha['banheiro_masculino_mola_obs'])?></textarea></td>
   </tr>
   
   
   <tr>
     <td>DISPENSER</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_dispenser" id="" value="1" <? if( $linha['banheiro_feminino_dispenser'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_dispenser" id="" value="0" <? if( $linha['banheiro_feminino_dispenser'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_dispenser_obs" cols="40" rows="2" id="banheiro_feminino_dispenser_obs"><? echo utf8_encode($linha['banheiro_feminino_dispenser_obs'])?></textarea></td>
     <td>DISPENSER</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_dispenser" id="" value="1" <? if( $linha['banheiro_masculino_dispenser'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_dispenser" id="" value="0" <? if( $linha['banheiro_masculino_dispenser'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_dispenser_obs" cols="40" rows="2" id="banheiro_masculino_dispenser_obs"><? echo utf8_encode($linha['banheiro_masculino_dispenser_obs'])?></textarea></td>
   </tr>
   <tr>
       <td>PIA</td>
     	<td align="left">
     	<input type="radio" name="banheiro_feminino_pia" id="" value="1" <? if( $linha['banheiro_feminino_pia'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_pia" id="" value="0" <? if( $linha['banheiro_feminino_pia'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_pia_obs" cols="40" rows="2" id="banheiro_feminino_pia_obs"><? echo utf8_encode($linha['banheiro_feminino_pia_obs'])?></textarea></td>
     <td>PIA </td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_pia" id="" value="1" <? if( $linha['banheiro_masculino_pia'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_pia" id="" value="0" <? if( $linha['banheiro_masculino_pia'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_pia_obs" cols="40" rows="2" id="banheiro_masculino_pia_obs"><? echo utf8_encode($linha['banheiro_masculino_pia_obs'])?></textarea></td>
   </tr>
   <tr>
     <td>LIXEIRAS</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_lixeira" id="" value="1" <? if( $linha['banheiro_feminino_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_lixeira" id="" value="0" <? if( $linha['banheiro_feminino_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_lixeira_obs" cols="40" rows="2" id="banheiro_feminino_lixeira_obs"><? echo utf8_encode($linha['banheiro_feminino_lixeira_obs'])?></textarea></td>
     <td>LIXEIRAS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_lixeira" id="" value="1" <? if( $linha['banheiro_masculino_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_lixeira" id="" value="0" <? if( $linha['banheiro_masculino_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_lixeira_obs" cols="40" rows="2" id="banheiro_masculino_lixeira_obs"><? echo utf8_encode($linha['banheiro_masculino_lixeira_obs'])?></textarea></td>
   </tr>   
   <tr>
     <td>JANELAS</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_janela" id="" value="1" <? if( $linha['banheiro_feminino_janela'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_janela" id="" value="0" <? if( $linha['banheiro_feminino_janela'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_janela_obs" cols="40" rows="2" id="banheiro_feminino_janela_obs"><? echo utf8_encode($linha['banheiro_feminino_janela_obs'])?></textarea></td>
     <td>JANELAS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_janela" id="" value="1" <? if( $linha['banheiro_masculino_janela'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_janela" id="" value="0" <? if( $linha['banheiro_masculino_janela'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_janela_obs" cols="40" rows="2" id="banheiro_masculino_janela_obs"><? echo utf8_encode($linha['banheiro_masculino_janela_obs'])?></textarea></td>
   </tr>
   
   
   <tr>
     <td>VASO SANITARIO</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_vaso" id="" value="1" <? if( $linha['banheiro_feminino_vaso'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_vaso" id="" value="0" <? if( $linha['banheiro_feminino_vaso'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_vaso_obs" cols="40" rows="2" id="banheiro_feminino_vaso_obs"><? echo utf8_encode($linha['banheiro_feminino_vaso_obs'])?></textarea></td>
     <td>VASO SANITÁRIO</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_vaso" id="" value="1" <? if( $linha['banheiro_masculino_vaso'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_vaso" id="" value="0" <? if( $linha['banheiro_masculino_vaso'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_vaso_obs" cols="40" rows="2" id="banheiro_masculino_vaso_obs"><? echo utf8_encode($linha['banheiro_masculino_vaso_obs'])?></textarea></td>
   </tr>
   
   
   <tr>
     <td>CHUVEIROS</td>
     <td align="left" >
     	<input type="radio" name="banheiro_feminino_chuveiro" id="" value="1" <? if( $linha['banheiro_feminino_chuveiro'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_feminino_chuveiro" id="" value="0" <? if( $linha['banheiro_feminino_chuveiro'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td ><textarea name="banheiro_feminino_chuveiro_obs" cols="40" rows="2" id="banheiro_feminino_chuveiro_obs"><? echo utf8_encode($linha['banheiro_feminino_chuveiro_obs'])?></textarea></td>
     <td>MICTÓRIOS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_mictorio" id="" value="1" <? if( $linha['banheiro_masculino_mictorio'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_mictorio" id="" value="0" <? if( $linha['banheiro_masculino_mictorio'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_mictorio_obs" cols="40" rows="2" id="banheiro_masculino_mictorio_obs"><? echo utf8_encode($linha['banheiro_masculino_mictorio_obs'])?></textarea></td>
   
   </tr>
   <tr>  
		<th colspan="4"></th>
     <td>CHUVEIROS</td>
     	<td align="left">
     	<input type="radio" name="banheiro_masculino_chuveiro" id="" value="1" <? if( $linha['banheiro_masculino_chuveiro'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
     	<input type="radio" name="banheiro_masculino_chuveiro" id="" value="0" <? if( $linha['banheiro_masculino_chuveiro'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     <td><textarea name="banheiro_masculino_chuveiro_obs" cols="40" rows="2" id="banheiro_masculino_chuveiro_obs"><? echo utf8_encode($linha['banheiro_masculino_chuveiro_obs'])?></textarea></td>
   </tr>
   
   <!-- ************************* INCIO Zona Sul e Processados ************************* -->
	<tr>
		<!-- Processado -->
		<th rowspan="11">P<br />R<br />O<br />C<br />E<br />S<br />S<br />A<br />D<br />O<br />S</th>
		<td>TETO</td>
		<td>
			<input type="radio" name="processados_teto" id="" value="1" <? if( $linha['processados_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_teto" id="" value="0" <? if( $linha['processados_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<!-- Cozinha -->
		<td><textarea name="processados_teto_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_teto_obs'])?></textarea></td>
		<th rowspan="8">Z<br />o<br />n<br />a<br /> <br />S<br />u<br />l<br /></th>
		<td>TETO</td>
		<td>
			<input type="radio" name="zona_sul_teto" value="1" <? if( $linha['zona_sul_teto'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_teto" value="0" <? if( $linha['zona_sul_teto'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_teto_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_teto_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>LUMINARIA</td>
		<td>
			<input type="radio" name="processados_luminaria" value="1" <? if( $linha['processados_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_luminaria" value="0" <? if( $linha['processados_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_luminaria_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_luminaria_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>LUMINARIA</td>
		<td>
			<input type="radio" name="zona_sul_luminaria" value="1" <? if( $linha['zona_sul_luminaria'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_luminaria" value="0" <? if( $linha['zona_sul_luminaria'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_luminaria_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_luminaria_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>PAREDE</td>
		<td>
			<input type="radio" name="processados_parede" value="1" <? if( $linha['processados_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_parede" value="0" <? if( $linha['processados_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_parede_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_parede_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>PAREDE</td>
		<td>
			<input type="radio" name="zona_sul_parede" value="1" <? if( $linha['zona_sul_parede'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_parede" value="0" <? if( $linha['zona_sul_parede'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_parede_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_parede_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>PORTA</td>
		<td>
			<input type="radio" name="processados_porta" value="1" <? if( $linha['processados_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_porta" value="0" <? if( $linha['processados_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_porta_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_porta_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>PORTA</td>
		<td>
			<input type="radio" name="zona_sul_porta" value="1" <? if( $linha['zona_sul_porta'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_porta" value="0" <? if( $linha['zona_sul_porta'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_porta_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_porta_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>FIAÇÃO</td>
		<td>
			<input type="radio" name="processados_fiacao" value="1" <? if( $linha['processados_fiacao'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_fiacao" value="0" <? if( $linha['processados_fiacao'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_fiacao_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_fiacao_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>FIAÇÃO</td>
		<td>
			<input type="radio" name="zona_sul_fiacao" value="1" <? if( $linha['zona_sul_fiacao'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_fiacao" value="0" <? if( $linha['zona_sul_fiacao'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_fiacao_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_fiacao_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>BALANÇA</td>
		<td>
			<input type="radio" name="processados_balanca" value="1" <? if( $linha['processados_balanca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_balanca" value="0" <? if( $linha['processados_balanca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_balanca_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_balanca_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>BALANÇA</td>
		<td>
			<input type="radio" name="zona_sul_balanca" value="1" <? if( $linha['zona_sul_balanca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_balanca" value="0"<? if( $linha['zona_sul_balanca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_balanca_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_balanca_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>UTENSILIOS</td>
		<td>
			<input type="radio" name="processados_utensilio" value="1" <? if( $linha['processados_utensilio'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_utensilio" value="0" <? if( $linha['processados_utensilio'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_utensilio_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_utensilio_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>COMPUTADORES</td>
		<td>
			<input type="radio" name="zona_sul_computador" value="1" <? if( $linha['zona_sul_computador'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_computador" value="0" <? if( $linha['zona_sul_computador'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_computador_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_computador_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- Processado -->
		<td>DISPENSER</td>
		<td>
			<input type="radio" name="processados_dispenser" value="1" <? if( $linha['processados_dispenser'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_dispenser" value="0" <? if( $linha['processados_dispenser'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_dispenser_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_dispenser_obs'])?></textarea></td>
		<!-- Cozinha -->
		<td>LIXEIRA</td>
		<td>
			<input type="radio" name="zona_sul_lixeira" value="1" <? if( $linha['zona_sul_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="zona_sul_lixeira" value="0" <? if( $linha['zona_sul_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="zona_sul_lixeira_obs" cols="40" rows="2"><? echo utf8_encode($linha['zona_sul_lixeira_obs'])?></textarea></td>
	</tr>
	<tr>
		<!-- PROCESSADO -->
		<td>PIA</td>
		<td>
			<input type="radio" name="processados_pia" value="1" <? if( $linha['processados_pia'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_pia" value="0" <? if( $linha['processados_pia'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_pia_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_pia_obs'])?></textarea></td>
		<!-- LIVRE -->
		<th colspan="3">ÁREA DE MANUTENÇÃO</th>
		<td>
			<textarea name="area_manutencao_obs" cols="40" rows="2" id="area_manutencao_obs">
				<? echo utf8_encode($linha['area_manutencao_obs'])?>
			</textarea>
		</td>
	</tr>
	<tr>
		<!-- PROCESSADO -->
		<td>LIXEIRA</td>
		<td>
			<input type="radio" name="processados_lixeira" value="1" <? if( $linha['processados_lixeira'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_lixeira" value="0" <? if( $linha['processados_lixeira'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_lixeira_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_lixeira_obs'])?></textarea></td>
		<!-- LIVRE -->
		<th colspan="3" > OBS Geral</th>
		<td> 
			<textarea name="obs" cols="40" rows="3" id="obs">
				<? echo utf8_encode($linha['obs'])?>
			</textarea>
		</td>
	</tr>
	<tr>
		<!-- PROCESSADO -->
		<td>ISCA</td>
		<td>
			<input type="radio" name="processados_isca" value="1" <? if( $linha['processados_isca'] == 1 ){?>checked="checked"<? }?> />	<label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> <br />       		
			<input type="radio" name="processados_isca" value="0" <? if( $linha['processados_isca'] == 0 ){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
		</td>
		<td><textarea name="processados_isca_obs" cols="40" rows="2"><? echo utf8_encode($linha['processados_isca_obs'])?></textarea></td>
		<!-- LIVRE -->
		<td colspan="4" align="center" >
			Data:
			<input name="data" type="text" size="20" maxlength="10" readonly="readonly" <? if($phg_libera_data == 1) {?>id="data1" <? }?>value="<? echo converte_data($linha['data_clp'])?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
			Próxima Verificação:
			<input name="data_verificacao" type="text" id="data2"  size="20" maxlength="10" readonly="readonly" <? if($phg_libera_data == 1) {?>id="data_1" <? }?>value="<? echo converte_data($linha['data_verificacao'])?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
		</td>
	</tr>
   
  <!-- ************************* Fim Zona Sul e Processados ************************* -->
	<tr>
		<td colspan="15">
			<div align="center">
						<?/* if($clp_altera == 1){?>
						<input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
						<input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
						<? }*/?>
			</div>
		</td>
	</tr>
</table>
     
     </form>	<? }} ?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA Aferição Balança
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA Aferição Balança
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta" and $clp_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="clp.php?pg=consulta" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
    <td width="110" align="right">Data Inicial</td>
    <td width="87"><input name="data1" type="text" id="data_1" value="<? echo $data_atual;?>" size="9" maxlength="10" readonly="readonly" ></td>
    <td width="180" align="right">Data Final</td>
    <td width="165"><input name="data2" type="text" id="data_4" value="<? echo $data_atual;?>" size="9" maxlength="10" readonly="readonly"></td>
  </tr>
  <tr>
    <td align="right">Usuario</td>
    <td colspan="3" align="left">
    	<select name="usuario" size="1" id="usuario">
      					<option value="0" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT usuario_cad FROM clp ORDER BY usuario_cad ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['usuario_cad'] != ""){?>
    <? // Consulta transportes cadastrados
	$usuario_cad = $linha_filtro['usuario_cad'];	
	$sql_transporte = mysql_query("SELECT * FROM transporte where id = '$usuario_cad' Limit 1  ");
	$cont_transporte = mysql_num_rows($sql_transporte);
	while($linha_transporte = mysql_fetch_array($sql_transporte)){ 
	?>
    <option value="<? echo utf8_decode($linha_filtro['usuario_cad']) ?>" multiple >
	
	<? echo $linha_transporte['placa'] ?></option>
       <? }}}?>
    </select></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="image" src="images/pesq.gif" name="btfiltro1" id="btfiltro1" value="Filtrar" /></td>
 
  </tr>
</table>
</form>
<!-- ******************** Fim Formulário Filtro de consulta a tabela FBL ******************** -->

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
		<? if ($clp_altera == "1" or $clp_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">OPÇÃO&nbsp;</th>
		<? } ?>
    <th width="5%" id="th_mercado">DATA.&nbsp;</th>
    <th width="10%" id="th_mercado">USUARIO.&nbsp;</th>
    <th width="75%" id="th_mercado">OBESERVAÇÃO GERAL.&nbsp;</th>
    <th width="5%" id="th_mercado">CONFORME.&nbsp;</th>
    <th width="5%" id="th_mercado">NÃO CONFORME.&nbsp;</th>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela FBL 
$filt1 = converte_data($_REQUEST['data1']);
$filt2 = converte_data($_REQUEST['data2']);
$usuario = $_REQUEST['placa'];

	
	if($usuario != 0){
	$sql = mysql_query("SELECT * FROM clp WHERE data_clp BETWEEN ('$filt1') AND ('$filt2')  AND  usuario_cad = '$usuario' ORDER BY data_clp DESC  ");	
	}
	if($usuario == 0 and $motorista_filt == 0 ){		
	$sql = mysql_query("SELECT * FROM clp WHERE data_clp BETWEEN ('$filt1') AND ('$filt2')  ORDER BY data_clp DESC  ");
	}
	// Fim teste 

$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($clp_exclui == "1" or $clp_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($clp_exclui == "1"){?>
                	<a href="include/clp.php?funcao=exclui&id=<? echo $linha['id'] ?>">Excluir&nbsp;&nbsp;</a>
                <? }?>
                <? if ($clp_altera == "1"){?>
                	<a href="clp.php?pg=alt&id=<? echo $linha['id'] ?>">Exibe&nbsp;&nbsp;</a>
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_clp']); ?>&nbsp;&nbsp;&nbsp;</td>
	<td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['usuario_cad']); ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="5%">&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs']); ?>&nbsp;&nbsp;&nbsp;</td> 
    <td>&nbsp;&nbsp;&nbsp;<? 
	$c = $linha['c'] / $linha['total_item'] * 100;
	echo number_format($c, 2, ',', ' ')."%";
	?>&nbsp;&nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp;&nbsp;<?
	$nc = $linha['nc'] / $linha['total_item'] * 100; 
	echo number_format($nc, 2, ',', ' ')."%";
	?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
   		
  	 <? 
	 $quantidade_filt ++;
	 }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	  ?>
	  <tr>
    <th id="th_mercado" colspan="9">&nbsp;
	<? echo "Total Balanças aferidas: ",$quantidade_filt;?>&nbsp;&nbsp;&nbsp;&nbsp;|
    </th>
    

  </tr>
      </table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


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
