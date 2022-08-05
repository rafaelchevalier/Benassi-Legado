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


<!-- ************************************************************************************************************************************* 
											CADASTRO PHG DIÁRIO
FORMULÁRIO DE CADASTRO DAS PHGS E UMIDADE DAS CÂMARAS FRIGORIFICAS, AS MEDIÇÕES DEVEM SER FEITAS DIARIAMENTE DE TODAS AS AS CÂMARAS
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_dia" and $phg_inclui == "1" ) {//Cadastro PHG DIÁRIO ?>

    
    
<h1>Cadastro PHG - Planilha de Higienização Global - Diário</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/phg.php?funcao=cad2" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td colspan="2"><input type="text" name="nome_usuario" id="cadnome" value="<? echo utf8_encode($nome_usuario_logado)?>" maxlength="30" size="31" readonly="readonly"  />
     <input type="hidden" name="periodo" id="periodo" value="DIARIO" maxlength="30" size="31" readonly="readonly"  />
     </td>
   <td><div align="right">Data.:</div></td>
     <td align="left" colspan="2">
     <input name="data" type="text" size="20" maxlength="13" readonly="readonly" <? if($geral_libera_data == 1) {?>id="data1" <? }?>value="<? echo $data_atual?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
   	 <td colspan="4">Legenda: <strong>C</strong> = Conforme | <strong>NC</strong> = Não Conforme</td>
   </tr>
   <tr>
     
   </tr>
   <tr>
   		<th colspan="10">OBS: Caso o campo não seja selecionada uma opção C ou NC, automatimamente o item será considerado não conforme!</th>
   </tr>
   <tr>
   		<th colspan="10">EMBALAGEM</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center" colspan="2">ESTEIRAS</td>
     <td align="center">EMBALADORA A</td>
     <td align="center" colspan="2">EMBALADORA B</td>
     <td align="center">PIAS</td>
     <td align="center">LIXEIRA</td>
   </tr>
   <tr>
     <td><input type="radio" name="piso_embalagem" id="situacao" value="1"  checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       <br />
     <input  name="piso_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="bancadas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="bancadas_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="balancas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="balancas_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td colspan="2"><input type="radio" name="esteiras_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="esteiras_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladoraa_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="seladoraa_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td colspan="2"><input type="radio" name="seladorab_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="seladorab_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="pias_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="pias_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="lixeira_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="lixeira_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
   </tr>
   <tr>
   		<th colspan="4">ORGÂNICO</th>
   		<th colspan="4">GALPÃO (GRANEL + SALÃO + COZINHA IND + ZONA SUL)</th>
        <th colspan="2">ANTE-CÂMARA</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PISO</td>
     <td align="center">LIXEIRA</td>
     <td align="center" colspan="2">BALANÇAS</td>
     <td align="center" colspan="2">PISO</td>
   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->
   		<td>
       	  <input type="radio" name="piso_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="bancada_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="bancada_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="balanca_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="balanca_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="lixeira_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="lixeira_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->     
   		<td>
       	  <input type="radio" name="piso_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
         <td>
   	      <input type="radio" name="lixeira_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="lixeira_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="2">
       	   <input type="radio" name="balanca_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="balanca_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <!-- INICIO ANTI-CÂMARA-->
         <td colspan="2">
       	   &nbsp;&nbsp;&nbsp;<input type="radio" name="piso_ante_camara" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		&nbsp;&nbsp;&nbsp;<input  name="piso_ante_camara" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="4">CÂMARAS FRIAS</th>
       	<th colspan="2">CAIXARIA</th>
       	<th colspan="2">VESTIÁRIOS</th>
            <th colspan="2">DESCARTE</th>
      </tr>
         <tr>
         	<td align="center">1 - PISO</td>
            <td align="center">2 -PISO</td>
           <td align="center">3 - PISO</td>
           <td align="center">4 - PISO</td>
           <td align="center" colspan="2">PISO</td>
           <td align="center">MASCULINO</td>
           <td align="center">FEMININO</td>
           <td align="center">PISO</td>
           <td align="center">CAÇAMBA</td>
      </tr>
         <tr>
         	<!-- INICIO CÂMARAS FRIAS-->
       	   <td>
        	<input type="radio" name="piso1_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso1_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	 	   </td>
            <td>
        	<input type="radio" name="piso2_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso2_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso3_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso3_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso4_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso4_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            
            <!-- INICIO CAIXARIA -->
            <td colspan="2">
        	<input type="radio" name="piso_caixaria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_caixaria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO VESTIÁRIO -->
            <td>
        	<input type="radio" name="masculino_vestiario" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="masculino_vestiario" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="feminino_vestiario" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="feminino_vestiario" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO DESCARTE -->
            <td>
        	<input type="radio" name="piso_descarte" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_descarte" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="cacamba_descarte" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="cacamba_descarte" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
         </tr>
         
           <th colspan="10">REFEITÓRIO</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">PIAS</td>
     <td align="center" colspan="2">BANCADAS</td>
     <td align="center" colspan="2">FORNO</td>
     <td align="center" colspan="2">FOGÃO</td>
     <td align="center" colspan="2">LIXEIRAS</td>

   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO REFEITÓRIO-->
   		<td>
       	  <input type="radio" name="piso_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_refeitorio" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="pias_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="pias_refeitorio" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td colspan="2">
       	  <input type="radio" name="bancadas_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="bancadas_refeitorio" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td colspan="2">
       	  <input type="radio" name="forno_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="forno_refeitorio" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
           
   		<td colspan="2">
       	  <input type="radio" name="fogao_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="fogao_refeitorio" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
         <td colspan="2">
       	   <input type="radio" name="lixeira_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="lixeira_refeitorio" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
        
         
   </tr>
   <tr>
   	 <td>
     <div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
     <td><p>OBS.</p></td>
     <td colspan="8"><textarea name="obs" cols="60" id="obs"></textarea>
     </td>
   </tr>
 </table>
  </form>	
	 <? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO PHG DIÁRIO
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CADASTRO PHG SEMANAL
FORMULÁRIO DE CADASTRO DAS PHGS E UMIDADE DAS CÂMARAS FRIGORIFICAS, AS MEDIÇÕES DEVEM SER FEITAS DIARIAMENTE DE TODAS AS AS CÂMARAS
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_semanal" and $phg_inclui == "1" ) {//Cadastro PHG Camaras?>

    
    
<h1>Cadastro PHG - Planilha de Higienização Global - Semanal</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/phg.php?funcao=cad2" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td colspan="2"><input type="text" name="nome_usuario" id="cadnome" value="<? echo utf8_encode($nome_usuario_logado)?>" maxlength="30" size="31" readonly="readonly"  />
     <input type="hidden" name="periodo" id="periodo" value="SEMANAL" maxlength="30" size="31" readonly="readonly"  />
     </td>
   <td><div align="right">Data.:</div></td>
     <td align="left" colspan="2">
     <input name="data" type="text" size="20" maxlength="10" readonly="readonly" <? if($phg_libera_data == 1) {?>id="data1" <? }?>value="<? echo $data_atual?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
   	 <td colspan="4">Legenda: <strong>C</strong> = Conforme | <strong>NC</strong> = Não Conforme</td>
   </tr>
   <tr>
     
   </tr>
   <tr>
   		<th colspan="10">OBS: Caso o campo não seja selecionada uma opção C ou NC, automatimamente o item será considerado não conforme!</th>
   </tr>
   <tr>
   		<th colspan="10">EMBALAGEM</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">ESTEIRAS</td>
     <td align="center">EMBALADORA A</td>
     <td align="center">EMBALADORA B</td>
     <td align="center">PIAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PAREDE</td>
     <td align="center">PORTAS</td>
   </tr>
   <tr>
     <td><input type="radio" name="piso_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       <br />
     <input  name="piso_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="bancadas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="bancadas_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="balancas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="balancas_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="esteiras_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="esteiras_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladoraa_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="seladoraa_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladorab_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="seladorab_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="pias_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="pias_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="lixeira_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="lixeira_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="parede_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="parede_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="portas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input  name="portas_embalagem" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
   </tr>
   <tr>
   		<th colspan="4">ORGÂNICO</th>
   		<th colspan="4">GALPÃO (GRANEL + SALÃO + COZINHA IND + ZONA SUL)</th>
        <th colspan="2">ANTE-CÂMARA</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PISO</td>
     <td align="center">LIXEIRA</td>
     <td align="center">BALANÇAS</td>
     <td align="center">PORTAS</td>
     <td align="center" colspan="2">PISO</td>
   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->
   		<td>
       	  <input type="radio" name="piso_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="bancada_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="bancada_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="balanca_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="balanca_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="lixeira_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="lixeira_cozinhaind" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->     
   		<td>
       	  <input type="radio" name="piso_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
         <td>
   	      <input type="radio" name="lixeira_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="lixeira_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td>
       	   <input type="radio" name="balanca_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="balanca_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td>
       	   <input type="radio" name="portoes_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="portoes_galpao" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         <!-- INICIO ANTI-CÂMARA-->
         <td colspan="2">
       	   &nbsp;&nbsp;&nbsp;<input type="radio" name="piso_ante_camara" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		&nbsp;&nbsp;&nbsp;<input  name="piso_ante_camara" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="4">CÂMARAS FRIAS</th>
       	<th colspan="2">CAIXARIA</th>
       	<th colspan="2">VESTIÁRIOS</th>
            <th colspan="2">DESCARTE</th>
      </tr>
         <tr>
         	<td align="center">1 - PISO</td>
            <td align="center">2 -PISO</td>
           <td align="center">3 - PISO</td>
           <td align="center">4 - PISO</td>
           <td align="center" colspan="2">PISO</td>
           <td align="center">MASCULINO</td>
           <td align="center">FEMININO</td>
           <td align="center">PISO</td>
           <td align="center">CAÇAMBA</td>
      </tr>
         <tr>
         	<!-- INICIO CÂMARAS FRIAS-->
       	   <td>
        	<input type="radio" name="piso1_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso1_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	 	   </td>
            <td>
        	<input type="radio" name="piso2_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso2_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso3_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso3_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso4_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso4_camara_fria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            
            <!-- INICIO CAIXARIA -->
            <td colspan="2">
        	<input type="radio" name="piso_caixaria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_caixaria" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>            
            <!-- INICIO VESTIÁRIO -->
            <td>
        	<input type="radio" name="masculino_vestiario" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="masculino_vestiario" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="feminino_vestiario" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="feminino_vestiario" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO DESCARTE -->
            <td>
        	<input type="radio" name="piso_descarte" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="piso_descarte" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="cacamba_descarte" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input  name="cacamba_descarte" type="radio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
         </tr>
         
           <th colspan="10">REFEITÓRIO</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">PIAS</td>
     <td align="center">BANCADAS</td>
     <td align="center">FORNO</td>
     <td align="center">FOGÃO</td>
     <td align="center">LIXEIRAS</td>
     <td align="center" colspan="2">GELADEIRA</td>
     <td align="center" colspan="2">FREEZER</td>
   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO REFEITÓRIO-->
   		<td>
       	  <input type="radio" name="piso_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="pias_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="pias_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="bancadas_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancadas_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="forno_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="forno_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
           
   		<td>
       	  <input type="radio" name="fogao_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="fogao_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
         <td>
       	   <input type="radio" name="lixeira_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="2">
       	   <input type="radio" name="geladeira_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="geladeira_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="2">
       	   <input type="radio" name="freezer_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="freezer_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
   </tr>
   <tr>
   	 <td>
     <div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
     <td><p>OBS.</p></td>
     <td colspan="8"><textarea name="obs" cols="60" id="obs"></textarea>
     </td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO PHG SEMANAL
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CADASTRO PHG MENSAL
FORMULÁRIO DE CADASTRO DAS PHGS E UMIDADE DAS CÂMARAS FRIGORIFICAS, AS MEDIÇÕES DEVEM SER FEITAS DIARIAMENTE DE TODAS AS AS CÂMARAS
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_mes" and $phg_inclui == "1" ) {//Cadastro PHG Camaras?>

    
    
<h1>Cadastro PHG - Planilha de Higienização Global - Mensal</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/phg.php?funcao=cad2" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td colspan="2"><input type="text" name="nome_usuario" id="cadnome" value="<? echo utf8_encode($nome_usuario_logado)?>" maxlength="30" size="31" readonly="readonly"  />
     <input type="hidden" name="periodo" id="periodo" value="MENSAL" maxlength="30" size="31" readonly="readonly"  />
     </td>
   <td><div align="right">Data:</div></td>
     <td align="left" colspan="2">
     <input name="data" type="text" id="data1" size="20" maxlength="13" readonly="readonly" <? if($phg_libera_data == 1) {?> <? }?>value="<? echo $data_atual?>" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
		<td colspan="6">Legenda: <strong>C</strong> = Conforme | <strong>NC</strong> = Não Conforme</td>
   </tr>
   <tr>
     
   </tr>
   <tr>
   		<th colspan="12">OBS: Caso o campo não seja selecionada uma opção C ou NC, automatimamente o item será considerado não conforme!</th>
   </tr>
   <tr>
   		<th colspan="12">EMBALAGEM</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">ESTEIRAS</td>
     <td align="center">EMBALADORA A</td>
     <td align="center">EMBALADORA B</td>
     <td align="center">PIAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PAREDE</td>
     <td align="center">PORTAS</td>
     <td align="center">TETO</td>
     <td align="center">LUMINÁRIAS</td>
   </tr>
   <tr>
     <td><input type="radio" name="piso_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       <br />
     <input type="radio"  name="piso_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="bancadas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="bancadas_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="balancas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="balancas_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="esteiras_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="esteiras_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladoraa_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladoraa_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladorab_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladorab_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="pias_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="pias_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="lixeira_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="lixeira_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="parede_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="parede_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="portas_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="portas_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="teto_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="teto_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="luminarias_embalagem" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="luminarias_embalagem" id="situacao" value="0" /> <label for="situacao">N/C</label>
     </td>
   </tr>
   <tr>
   		<th colspan="6">ORGÂNICO</th>
   		<th colspan="6">GALPÃO (GRANEL + SALÃO)</th>
   </tr>
   <tr>
     <!-- Cozinha Industrial -->
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PORTA PALLET</td>
     <td align="center">LUMINÁRIAS</td>
     <!-- Galpao -->
     <td align="center">PISO</td>
     <td align="center">LIXEIRA</td>
     <td align="center">BALANÇAS</td>
     <td align="center">PORTAS</td>
     <td align="center">PORTA PALLET</td>
     <td align="center">LUMINÁRIAS</td>
   </tr>
   <tr>
   <!--  COZINHA INDUSTRIAL 	-->
   		<td><input type="radio" name="piso_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_cozinhaind" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
     
        <td><input type="radio" name="bancada_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancada_cozinhaind" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="balanca_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="balanca_cozinhaind" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="lixeira_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_cozinhaind" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="porta_pallet_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta_pallet_cozinhaind" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="luminarias_cozinhaind" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_cozinhaind" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
   <!--  GALPÃO 	-->     
   		<td><input type="radio" name="piso_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_galpao" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
         <td><input type="radio" name="lixeira_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_galpao" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="balanca_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="balanca_galpao" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="portoes_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="portoes_galpao" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="porta_pallet_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta_pallet_galpao" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="luminarias_galpao" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_galpao" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="9">CÂMARAS FRIAS</th>
        <th colspan="3">ANTE-CÂMARA</th>

      </tr>
      
      <tr>
         <!-- Camaras Frias -->
         	<th align="center" colspan="3">CÂMARA 1</th>
            <th align="center" colspan="3">CÂMARA 2</th>
           	<th align="center" colspan="3">CÂMARA 3</th>
         <!-- Ante Camara -->
     		<td align="center" colspan="1" rowspan="2">PORTA, PAREDE E PISO</td>
     		<td align="center" colspan="1" rowspan="2">PORTA PALLET</td>
     		<td align="center" colspan="1" rowspan="2">LUMINÁRIAS</td>
         </tr>
      <tr>
         <!-- Camaras Frias -->
         	<!-- Camara 1-->
         	<td align="center">PPT</td>
            <td align="center">PORTA</td>
           	<td align="center">LUMINÁRIAS</td>
            <!-- Camara 2-->
         	<td align="center">PPT</td>
            <td align="center">PORTA</td>
           	<td align="center">LUMINÁRIAS</td>
            <!-- Camara 3-->
         	<td align="center">PPT</td>
            <td align="center">PORTA</td>
           	<td align="center">LUMINÁRIAS</td>
         </tr>
         <tr>
         	<!-- INICIO CÂMARAS FRIAS-->
            <!-- Camara 1-->
       	   <td><input type="radio" name="ppt1_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppt1_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	 	   </td>
           
            <td>
        	<input type="radio" name="porta1_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta1_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <td><input type="radio" name="luminarias1_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias1_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- Camara 2-->
       	   <td><input type="radio" name="ppt2_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppt2_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	 	   </td>
           
            <td>
        	<input type="radio" name="porta2_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta2_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <td><input type="radio" name="luminarias2_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias2_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- Camara 3-->
       	   <td><input type="radio" name="ppt3_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppt3_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	 	   </td>
           
            <td>
        	<input type="radio" name="porta3_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta3_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <td><input type="radio" name="luminarias3_camara_fria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias3_camara_fria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <!-- ANTI-CÂMARA-->
         <td colspan="1"><input type="radio" name="ppp_ante_camara" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppp_ante_camara" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="1"><input type="radio" name="porta_pallet_ante_camara" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta_pallet_ante_camara" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="1"><input type="radio" name="luminarias_ante_camara" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_ante_camara" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
        </tr>
         
         
           <th colspan="12">REFEITÓRIO</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">PIAS</td>
     <td align="center">BANCADAS</td>
     <td align="center">FORNO</td>
     <td align="center">FOGÃO</td>
     <td align="center">LIXEIRAS</td>
     <td align="center">GELADEIRA</td>
     <td align="center">FREEZER</td>
     <td align="center">COIFA</td>
     <td align="center">DESPENSA</td>
     <td align="center">LUMINÁRIAS</td>
     <td align="center">TETO</td>
   </tr>
   <tr>
   <!--  INICIO REFEITÓRIO-->
   		<td><input type="radio" name="piso_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
     
        <td><input type="radio" name="pias_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="pias_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="bancadas_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancadas_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="forno_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="forno_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
           
   		<td><input type="radio" name="fogao_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="fogao_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
   	    </td>
         
         <td><input type="radio" name="lixeira_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="geladeira_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="geladeira_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="freezer_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="freezer_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="coifa_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="coifa_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="despensa_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="despensa_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="luminarias_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="teto_refeitorio" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="teto_refeitorio" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 </td>
         <tr>
       	<th colspan="2">CAIXARIA</th>
       	<th colspan="2">VESTIÁRIOS</th>
        <th colspan="2">DESCARTE</th>
        <th colspan="1" rowspan="3">OBS.</th>
        
        <td colspan="6" rowspan="3"><textarea name="obs" cols="60" id="obs"></textarea></td>
      </tr>
      <tr>
           <td align="center" colspan="2">PISO</td>
           <td align="center">MASCULINO</td>
           <td align="center">FEMININO</td>
           <td align="center">PISO</td>
           <td align="center">CAÇAMBA</td>
      </tr>
         <tr>            
            <!-- INICIO CAIXARIA -->
            <td colspan="2">
        	<input type="radio" name="piso_caixaria" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_caixaria" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>            
            <!-- INICIO VESTIÁRIO -->
            <td>
        	<input type="radio" name="masculino_vestiario" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="masculino_vestiario" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="feminino_vestiario" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="feminino_vestiario" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO DESCARTE -->
            <td>
        	<input type="radio" name="piso_descarte" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_descarte" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="cacamba_descarte" id="situacao" value="1" checked="checked" /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="cacamba_descarte" id="situacao" value="0" /> <label for="situacao">N/C</label>
    	 	</td>
         </tr>
         
   </tr>
   <tr>
   	 <td colspan="12">
     <div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>   
     </tr>
 </table>
  </form>	
	 <? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO PHG MENSAL
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CONSULTA PHG CAMARAS
EXIBE PHGS E UMIDADES CADASTRADAS DAS CAMARAS
****************************************************************************************************************************************** -->

<? 
if ($pg == "consulta" /* and $phg_consulta = "1" */) {//Consulta PHG Camaras 
?>

<h1>Consulta PHG</h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de PHG e umidade ******************** -->

<form action="phg.php?pg=consulta" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
    <td width="110" align="right">Data Inicial</td>
    <td width="87"><input name="data1" id="from" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10" ></td>
    <td width="180" align="right">Data Final</td>
    <td width="165"><input name="data2" id="to" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10"></td>
  </tr>
  <tr>
    <td align="right">Período</td>
    <td colspan="3" align="left"><select name="periodo" size="1" id="usuario">
      					<option value="0" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT periodo FROM phg ORDER BY periodo ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['periodo'] != ""){?>
    <option value="<? echo $linha_filtro['periodo'] ?>" multiple ><? echo utf8_encode($linha_filtro['periodo']) ?></option>
       <? }}?>
    </select></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="image" src="images/pesq.gif" name="btfiltro1" id="btfiltro1" value="Filtrar" /></td>
 
  </tr>
</table>
</form>
<!-- ******************** Fim Formulário Filtro de consulta a tabela de PHG e umidade ******************** -->

<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>

<table id="datatable" class="display" style="width:100%">
	<thead>
		<tr>
			<? if ($phg_altera == "1" or $phg_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
				<th>OPÇÃO</th>
			<? } ?>
			<th>DATA</th>
			<th>USUARIO</th>
			<th>PERÍODO</th>
			<th>OBS</th>
			<th>CONFORME</th>
			<th>NÃO CONFORME</th>
		</tr>
	</thead>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela tampcam 
$filt1 = converte_data($_REQUEST['data1']);
$filt2 = converte_data($_REQUEST['data2']);
$periodo_filt = $_REQUEST['periodo'];

if ($periodo != "0"){
	$sql = mysql_query("SELECT * FROM phg WHERE data_phg BETWEEN ('$filt1') AND ('$filt2')  AND periodo = '$periodo_filt'  ORDER BY data_phg DESC  ");
			
}
if($periodo == "0"){
	$sql = mysql_query("SELECT * FROM phg WHERE data_phg BETWEEN ('$filt1') AND ('$filt2') ORDER BY data_phg DESC");	
	}
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
	<tbody>
		<tr>
			<?	if ($phg_exclui == "1" or $phg_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
					<td> 
						<? if ($phg_exclui == "1"){?>
							<a href="include/phg.php?funcao=exclui&id=<? echo $linha['id'] ?>">Excluir&nbsp;&nbsp;</a>
						<? }?>
						<? if ($phg_altera == "1"){?>
							<a href="phg.php?pg=alt_<? echo $linha['periodo'];?>&id=<? echo $linha['id'] ?>">Exibe&nbsp;&nbsp;</a>
						<? }?>
					</td>
			<? }//Fim filtro botões apenas para usuários master ?>

			<td>&nbsp;&nbsp;&nbsp;<? echo converte_data($linha['data_phg']); ?>&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['usuario_cad']); ?>&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['periodo']); ?>&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;<? echo utf8_encode($linha['obs']) ?>&nbsp;&nbsp;&nbsp;</td>
			<td>
				&nbsp;&nbsp;&nbsp;<? 
				$c = $linha['conforme'] / $linha['total'] * 100;
				echo number_format($c, 2, ',', ' ')."%";
				?>&nbsp;&nbsp;&nbsp;</td>
			<td>
				&nbsp;&nbsp;&nbsp;<?
				$nc = $linha['nao_conforme'] / $linha['total'] * 100; 
				echo number_format($nc, 2, ',', ' ')."%";
				?>&nbsp;&nbsp;&nbsp;
			</td>   
		</tr>
    </tbody>
   		
	<? $quantidade_filt ++;
		}//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto    
	?>
	<tfoot>
		<tr>
			<th colspan="8">&nbsp;<? echo "Total Medições Realizadas: ",$quantidade_filt;?>&nbsp;</th>
		</tr>
	</tfoot>
</table>
      

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>


<? }?>
<!-- ************************************************************************************************************************************* 
											FIM CONSULTA PHG CAMARAS
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											ALTERA PHG DIARIO
****************************************************************************************************************************************** -->
		<? 
		if ($pg == "alt_DIARIO" and $phg_consulta == "1") {//ALTERA PHG DIÁRIO 
		include"include/conexao.php";
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM phg where id='$id' ");

		while($linha = mysql_fetch_array($sql)){
		
		 ?>


    
    
<h1>PHG - Planilha de Higienização Global - Diário</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" <? if($phg_altera == "1"){?>action="include/phg.php?funcao=cad2" <? }?> >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td colspan="2"><input type="text" name="nome_usuario" id="cadnome" value="<? echo $linha['usuario_cad'] ?>" maxlength="30" size="31" readonly="readonly"  />
     <input type="hidden" name="periodo" id="periodo" value="DIARIO" maxlength="30" size="31" readonly="readonly"  />
     </td>
   <td><div align="right">Data.:</div></td>
     <td align="left" colspan="2">
     <input type="text" name="data" <? if($phg_libera_data == 1) {?>id="data_4" <? }?>value="<? echo converte_data($linha['data_phg']);?>" maxlength="13" size="20" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
   	 <td colspan="4">Legenda: <strong>C</strong> = Conforme | <strong>NC</strong> = Não Conforme</td>
   </tr>
   <tr>
     
   </tr>
   <tr>
   		<th colspan="10">OBS: Caso o campo não seja selecionada uma opção C ou NC, automatimamente o item será considerado não conforme!</th>
   </tr>
   <tr>
   		<th colspan="10">EMBALAGEM</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center" colspan="2">ESTEIRAS</td>
     <td align="center">EMBALADORA A</td>
     <td align="center" colspan="2">EMBALADORA B</td>
     <td align="center">PIAS</td>
     <td align="center">LIXEIRA</td>
   </tr>
   <tr>
     <td><input name="piso_embalagem" type="radio" id="situacao" value="1" checked="checked" <? if($linha['piso_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       <br />
     <input type="radio"  name="piso_embalagem" id="situacao" value="0"  <? if($linha['piso_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="bancadas_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['bancadas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="bancadas_embalagem" id="situacao" value="0"  <? if($linha['bancadas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="balancas_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['balancas_embalagem'] == 1){?>checked="checked"<? }?>  /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="balancas_embalagem" id="situacao" value="0"  <? if($linha['balancas_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
     
     <td colspan="2"><input type="radio" name="esteiras_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['esteiras_embalagem'] == 1){?>checked="checked"<? }?>  /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="esteiras_embalagem" id="situacao" value="0"  <? if($linha['esteiras_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladoraa_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['seladoraa_embalagem'] == 1){?>checked="checked"<? }?>  /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladoraa_embalagem" id="situacao" value="0"  <? if($linha['seladoraa_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
     
     <td colspan="2"><input type="radio" name="seladorab_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['seladorab_embalagem'] == 1){?>checked="checked"<? }?>  /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladorab_embalagem" id="situacao" value="0"  <? if($linha['seladorab_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="pias_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['pias_embalagem'] == 1){?>checked="checked"<? }?>  /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="pias_embalagem" id="situacao" value="0"  <? if($linha['pias_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="lixeira_embalagem" id="situacao" value="1" checked="checked"  <? if($linha['lixeira_embalagem'] == 1){?>checked="checked"<? }?>  /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="lixeira_embalagem" id="situacao" value="0"  <? if($linha['lixeira_embalagem'] == 0){?>checked="checked"<? }?>  /> <label for="situacao">N/C</label>
     </td>
   </tr>
   <tr>
   		<th colspan="4">ORGÂNICO</th>
   		<th colspan="4">GALPÃO (GRANEL + SALÃO + COZINHA IND + ZONA SUL)</th>
        <th colspan="2">ANTE-CÂMARA</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PISO</td>
     <td align="center">LIXEIRA</td>
     <td align="center" colspan="2">BALANÇAS</td>
     <td align="center" colspan="2">PISO</td>
   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->
   		<td>
       	  <input type="radio" name="piso_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['piso_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="piso_cozinhaind" id="situacao" value="0" <? if($linha['piso_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="bancada_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['bancada_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="bancada_cozinhaind" id="situacao" value="0" <? if($linha['bancada_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="balanca_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['balanca_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="balanca_cozinhaind" id="situacao" value="0" <? if($linha['balanca_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="lixeira_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['lixeira_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="lixeira_cozinhaind" id="situacao" value="0" <? if($linha['lixeira_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->     
   		<td>
       	  <input type="radio" name="piso_galpao" id="situacao" value="1" checked="checked" <? if($linha['piso_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="piso_galpao" id="situacao" value="0" <? if($linha['piso_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
         <td>
   	      <input type="radio" name="lixeira_galpao" id="situacao" value="1" checked="checked" <? if($linha['lixeira_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		   <input type="radio"  name="lixeira_galpao" id="situacao" value="0" <? if($linha['lixeira_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="2">
       	   <input type="radio" name="balanca_galpao" id="situacao" value="1" checked="checked" <? if($linha['balanca_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		   <input type="radio"  name="balanca_galpao" id="situacao" value="0" <? if($linha['balanca_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <!-- INICIO ANTI-CÂMARA-->
         <td colspan="2">
       	   &nbsp;&nbsp;&nbsp;<input type="radio" name="piso_ante_camara" id="situacao" value="1" checked="checked" <? if($linha['piso_ante_camara'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		&nbsp;&nbsp;&nbsp;<input type="radio"  name="piso_ante_camara" id="situacao" value="0" <? if($linha['piso_ante_camara'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="4">CÂMARAS FRIAS</th>
       	<th colspan="2">CAIXARIA</th>
       	<th colspan="2">VERTIÁRIOS</th>
            <th colspan="2">DESCARTE</th>
      </tr>
         <tr>
         	<td align="center">1 - PISO</td>
            <td align="center">2 -PISO</td>
           <td align="center">3 - PISO</td>
           <td align="center">4 - PISO</td>
           <td align="center" colspan="2">PISO</td>
           <td align="center">MASCULINO</td>
           <td align="center">FEMININO</td>
           <td align="center">PISO</td>
           <td align="center">CAÇAMBA</td>
      </tr>
         <tr>
         	<!-- INICIO CÂMARAS FRIAS-->
       	   <td>
        	<input type="radio" name="piso1_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso1_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso1_camara_fria" id="situacao" value="0" <? if($linha['piso1_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	 	   </td>
            <td>
        	<input type="radio" name="piso2_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso2_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso2_camara_fria" id="situacao" value="0" <? if($linha['piso2_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso3_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso3_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso3_camara_fria" id="situacao" value="0" <? if($linha['piso3_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso4_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso4_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso4_camara_fria" id="situacao" value="0" <? if($linha['piso4_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            
            <!-- INICIO CAIXARIA -->
            <td colspan="2">
        	<input type="radio" name="piso_caixaria" id="situacao" value="1" checked="checked" <? if($linha['piso_caixaria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_caixaria" id="situacao" value="0" <? if($linha['piso_caixaria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO VESTIÁRIO -->
            <td>
        	<input type="radio" name="masculino_vestiario" id="situacao" value="1" checked="checked" <? if($linha['masculino_vestiario'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="masculino_vestiario" id="situacao" value="0" <? if($linha['masculino_vestiario'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="feminino_vestiario" id="situacao" value="1" checked="checked" <? if($linha['feminino_vestiario'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="feminino_vestiario" id="situacao" value="0" <? if($linha['feminino_vestiario'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO DESCARTE -->
            <td>
        	<input type="radio" name="piso_descarte" id="situacao" value="1" checked="checked" <? if($linha['piso_descarte'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_descarte" id="situacao" value="0" <? if($linha['piso_descarte'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="cacamba_descarte" id="situacao" value="1" checked="checked" <? if($linha['cacamba_descarte'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="cacamba_descarte" id="situacao" value="0" <? if($linha['cacamba_descarte'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
         </tr>
         
           <th colspan="10">REFEITÓRIO</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">PIAS</td>
     <td align="center" colspan="2">BANCADAS</td>
     <td align="center" colspan="2">FORNO</td>
     <td align="center" colspan="2">FOGÃO</td>
     <td align="center" colspan="2">LIXEIRAS</td>

   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO REFEITÓRIO-->
   		<td>
       	  <input type="radio" name="piso_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['piso_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="piso_refeitorio" id="situacao" value="0" <? if($linha['piso_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="pias_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['pias_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="pias_refeitorio" id="situacao" value="0" <? if($linha['pias_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td colspan="2">
       	  <input type="radio" name="bancadas_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['bancadas_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="bancadas_refeitorio" id="situacao" value="0" <? if($linha['bancadas_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td colspan="2">
       	  <input type="radio" name="forno_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['forno_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="forno_refeitorio" id="situacao" value="0" <? if($linha['forno_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
           
   		<td colspan="2">
       	  <input type="radio" name="fogao_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['fogao_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		  <input type="radio"  name="fogao_refeitorio" id="situacao" value="0" <? if($linha['fogao_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
         <td colspan="2">
       	   <input type="radio" name="lixeira_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['lixeira_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
   		   <input type="radio"  name="lixeira_refeitorio" id="situacao" value="0" <? if($linha['lixeira_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
        
         
   </tr>
   <tr>
   	 <td>
     <div align="center">
       <? if($phg_altera == "1"){?>
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       <? }?>
     </div></td>
     <td><p>OBS.</p></td>
     <td colspan="8"><textarea name="obs" cols="60" id="obs"><? echo utf8_encode($linha['obs']);?></textarea>
     </td>
   </tr>
 </table>
  </form>	
	 <? }} ?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA PHG DIÁRIO
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											ALTERA PHG SEMANAL
****************************************************************************************************************************************** -->
		<? 
		if ($pg == "alt_SEMANAL" and $phg_consulta == "1") {//ALTERA PHG DIÁRIO 
		include"include/conexao.php";
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM phg where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		 ?>


    
    
<h1> PHG - Planilha de Higienização Global - Semanal</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" <? if($phg_altera == "1"){?>action="include/phg.php?funcao=cad2" <? }?> >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td colspan="2"><input type="text" name="nome_usuario" id="cadnome" value="<? echo utf8_encode($linha['usuario_cad']);?>" maxlength="30" size="31" readonly="readonly"  />
     <input type="hidden" name="periodo" id="periodo" value="SEMANAL" maxlength="30" size="31" readonly="readonly"  />
     </td>
   <td><div align="right">Data.:</div></td>
     <td align="left" colspan="2">
     <input type="text" name="data" <? if($phg_libera_data == 1) {?>id="data_4" <? }?>value="<? echo converte_data($linha['data_phg'])?>" maxlength="13" size="20" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
   	 <td colspan="4">Legenda: <strong>C</strong> = Conforme | <strong>NC</strong> = Não Conforme</td>
   </tr>
   <tr>
     
   </tr>
   <tr>
   		<th colspan="10">OBS: Caso o campo não seja selecionada uma opção C ou NC, automatimamente o item será considerado não conforme!</th>
   </tr>
   <tr>
   		<th colspan="10">EMBALAGEM</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">ESTEIRAS</td>
     <td align="center">EMBALADORA A</td>
     <td align="center">EMBALADORA B</td>
     <td align="center">PIAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PAREDE</td>
     <td align="center">PORTAS</td>
   </tr>
   <tr>
     <td><input type="radio" name="piso_embalagem" id="situacao" value="1" checked="checked" <? if($linha['piso_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       <br />
     <input type="radio"  name="piso_embalagem" id="situacao" value="0" <? if($linha['piso_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="bancadas_embalagem" id="situacao" value="1" checked="checked" <? if($linha['bancadas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="bancadas_embalagem" id="situacao" value="0" <? if($linha['bancadas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="balancas_embalagem" id="situacao" value="1" checked="checked" <? if($linha['balancas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="balancas_embalagem" id="situacao" value="0" <? if($linha['balancas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="esteiras_embalagem" id="situacao" value="1" checked="checked" <? if($linha['esteiras_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="esteiras_embalagem" id="situacao" value="0" <? if($linha['esteiras_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladoraa_embalagem" id="situacao" value="1" checked="checked" <? if($linha['seladoraa_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladoraa_embalagem" id="situacao" value="0" <? if($linha['seladoraa_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladorab_embalagem" id="situacao" value="1" checked="checked" <? if($linha['seladorab_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladorab_embalagem" id="situacao" value="0" <? if($linha['seladorab_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="pias_embalagem" id="situacao" value="1" checked="checked" <? if($linha['pias_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="pias_embalagem" id="situacao" value="0" <? if($linha['pias_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="lixeira_embalagem" id="situacao" value="1" checked="checked" <? if($linha['pias_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="lixeira_embalagem" id="situacao" value="0" <? if($linha['pias_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="parede_embalagem" id="situacao" value="1" checked="checked" <? if($linha['parede_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="parede_embalagem" id="situacao" value="0" <? if($linha['parede_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="portas_embalagem" id="situacao" value="1" checked="checked" <? if($linha['portas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="portas_embalagem" id="situacao" value="0" <? if($linha['portas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
   </tr>
   <tr>
   		<th colspan="4">ORGÂNICO</th>
   		<th colspan="4">GALPÃO (GRANEL + SALÃO + COZINHA IND + ZONA SUL)</th>
        <th colspan="2">ANTE-CÂMARA</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PISO</td>
     <td align="center">LIXEIRA</td>
     <td align="center">BALANÇAS</td>
     <td align="center">PORTAS</td>
     <td align="center" colspan="2">PISO</td>
   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->
   		<td>
       	  <input type="radio" name="piso_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['piso_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_cozinhaind" id="situacao" value="0" <? if($linha['piso_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="bancada_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['bancada_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancada_cozinhaind" id="situacao" value="0" <? if($linha['bancada_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="balanca_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['balanca_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="balanca_cozinhaind" id="situacao" value="0" <? if($linha['balanca_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="lixeira_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['lixeira_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_cozinhaind" id="situacao" value="0" <? if($linha['lixeira_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
   <!--  INICIO VERIFICAÇÃO COZINHA INDUSTRIAL 	-->     
   		<td>
       	  <input type="radio" name="piso_galpao" id="situacao" value="1" checked="checked" <? if($linha['piso_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_galpao" id="situacao" value="0" <? if($linha['piso_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
         <td>
   	      <input type="radio" name="lixeira_galpao" id="situacao" value="1" checked="checked" <? if($linha['lixeira_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_galpao" id="situacao" value="0" <? if($linha['lixeira_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td>
       	   <input type="radio" name="balanca_galpao" id="situacao" value="1" checked="checked" <? if($linha['balanca_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="balanca_galpao" id="situacao" value="0" <? if($linha['balanca_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td>
       	   <input type="radio" name="portoes_galpao" id="situacao" value="1" checked="checked" <? if($linha['portoes_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="portoes_galpao" id="situacao" value="0" <? if($linha['portoes_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         <!-- INICIO ANTI-CÂMARA-->
         <td colspan="2">
       	   &nbsp;&nbsp;&nbsp;<input type="radio" name="piso_ante_camara" id="situacao" value="1" checked="checked" <? if($linha['piso_ante_camara'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		&nbsp;&nbsp;&nbsp;<input type="radio"  name="piso_ante_camara" id="situacao" value="0" <? if($linha['piso_ante_camara'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="4">CÂMARAS FRIAS</th>
       	<th colspan="2">CAIXARIA</th>
       	<th colspan="2">VERTIÁRIOS</th>
            <th colspan="2">DESCARTE</th>
      </tr>
         <tr>
         	<td align="center">1 - PISO</td>
            <td align="center">2 -PISO</td>
           <td align="center">3 - PISO</td>
           <td align="center">4 - PISO</td>
           <td align="center" colspan="2">PISO</td>
           <td align="center">MASCULINO</td>
           <td align="center">FEMININO</td>
           <td align="center">PISO</td>
           <td align="center">CAÇAMBA</td>
      </tr>
         <tr>
         	<!-- INICIO CÂMARAS FRIAS-->
       	   <td>
        	<input type="radio" name="piso1_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso1_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso1_camara_fria" id="situacao" value="0" <? if($linha['piso1_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	 	   </td>
            <td>
        	<input type="radio" name="piso2_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso2_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso2_camara_fria" id="situacao" value="0" <? if($linha['piso2_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso3_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso3_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso3_camara_fria" id="situacao" value="0" <? if($linha['piso3_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="piso4_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['piso4_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso4_camara_fria" id="situacao" value="0" <? if($linha['piso4_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            
            <!-- INICIO CAIXARIA -->
            <td colspan="2">
        	<input type="radio" name="piso_caixaria" id="situacao" value="1" checked="checked" <? if($linha['piso_caixaria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_caixaria" id="situacao" value="0" <? if($linha['piso_caixaria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>            
            <!-- INICIO VESTIÁRIO -->
            <td>
        	<input type="radio" name="masculino_vestiario" id="situacao" value="1" checked="checked" <? if($linha['masculino_vestiario'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="masculino_vestiario" id="situacao" value="0" <? if($linha['masculino_vestiario'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="feminino_vestiario" id="situacao" value="1" checked="checked" <? if($linha['feminino_vestiario'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="feminino_vestiario" id="situacao" value="0" <? if($linha['feminino_vestiario'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO DESCARTE -->
            <td>
        	<input type="radio" name="piso_descarte" id="situacao" value="1" checked="checked" <? if($linha['piso_descarte'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_descarte" id="situacao" value="0" <? if($linha['piso_descarte'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="cacamba_descarte" id="situacao" value="1" checked="checked" <? if($linha['cacamba_descarte'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="cacamba_descarte" id="situacao" value="0" <? if($linha['cacamba_descarte'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
         </tr>
         
           <th colspan="10">REFEITÓRIO</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">PIAS</td>
     <td align="center">BANCADAS</td>
     <td align="center">FORNO</td>
     <td align="center">FOGÃO</td>
     <td align="center">LIXEIRAS</td>
     <td align="center" colspan="2">GELADEIRA</td>
     <td align="center" colspan="2">FREEZER</td>
   </tr>
   <tr>
   <!--  INICIO VERIFICAÇÃO REFEITÓRIO-->
   		<td>
       	  <input type="radio" name="piso_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['piso_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_refeitorio" id="situacao" value="0" <? if($linha['piso_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
     
        <td>
       	  <input type="radio" name="pias_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['pias_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="pias_refeitorio" id="situacao" value="0" <? if($linha['pias_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="bancadas_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['bancadas_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancadas_refeitorio" id="situacao" value="0" <? if($linha['bancadas_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td>
       	  <input type="radio" name="forno_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['forno_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="forno_refeitorio" id="situacao" value="0" <? if($linha['forno_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
           
   		<td>
       	  <input type="radio" name="fogao_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['fogao_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="fogao_refeitorio" id="situacao" value="0" <? if($linha['fogao_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
         <td>
       	   <input type="radio" name="lixeira_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['lixeira_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_refeitorio" id="situacao" value="0" <? if($linha['lixeira_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="2">
       	   <input type="radio" name="geladeira_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['geladeira_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="geladeira_refeitorio" id="situacao" value="0" <? if($linha['geladeira_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="2">
       	   <input type="radio" name="freezer_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['freezer_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="freezer_refeitorio" id="situacao" value="0" <? if($linha['freezer_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
   </tr>
   <tr>
   	 <td>
     <div align="center">
     <? if($phg_altera == "1"){?>
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
       <? }?>
     </div></td>
     <td><p>OBS.</p></td>
     <td colspan="8"><textarea name="obs" cols="60" id="obs"><? echo utf8_encode($linha['obs']);?></textarea>
     </td>
   </tr>
 </table>
  </form>	<? }} ?>
<!-- ************************************************************************************************************************************* 
											FIM ALTERA PHG SEMANAL
****************************************************************************************************************************************** -->

<!-- ************************************************************************************************************************************* 
											CADASTRO PHG MENSAL
FORMULÁRIO DE CADASTRO DAS PHGS E UMIDADE DAS CÂMARAS FRIGORIFICAS, AS MEDIÇÕES DEVEM SER FEITAS DIARIAMENTE DE TODAS AS AS CÂMARAS
****************************************************************************************************************************************** -->
		<? 
		if ($pg == "alt_MENSAL" and $phg_consulta == "1") {//PHG MENSAL 
		include"include/conexao.php";
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM phg where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		 ?>

    
    
<h1>PHG - Planilha de Higienização Global - Mensal</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/phg.php?funcao=cad2" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Usuário:</div></td>
     <td colspan="2"><input type="text" name="nome_usuario" id="cadnome" value="<? echo utf8_encode($linha['usuario_cad']);?>" maxlength="30" size="31" readonly="readonly"  />
     <input type="hidden" name="periodo" id="periodo" value="MENSAL" maxlength="30" size="31" readonly="readonly"  />
     </td>
   <td><div align="right">Data:</div></td>
     <td align="left" colspan="2">
     <input type="text" name="data" <? if($phg_libera_data == 1) {?> id="data_4" <? }?>value="<? echo converte_data($linha['data_phg'])?>" maxlength="13" size="20" <? if($phg_libera_data != 1) {?>readonly="readonly"<? }?>  />
     </td>
		<td colspan="6">Legenda: <strong>C</strong> = Conforme | <strong>NC</strong> = Não Conforme</td>
   </tr>
   <tr>
     
   </tr>
   <tr>
   		<th colspan="12">OBS: Caso o campo não seja selecionada uma opção C ou NC, automatimamente o item será considerado não conforme!</th>
   </tr>
   <tr>
   		<th colspan="12">EMBALAGEM</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">ESTEIRAS</td>
     <td align="center">EMBALADORA A</td>
     <td align="center">EMBALADORA B</td>
     <td align="center">PIAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PAREDE</td>
     <td align="center">PORTAS</td>
     <td align="center">TETO</td>
     <td align="center">LUMINÁRIAS</td>
   </tr>
   <tr>
     <td><input type="radio" name="piso_embalagem" id="situacao" value="1" checked="checked" <? if($linha['piso_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label> 
       <br />
     <input type="radio"  name="piso_embalagem" id="situacao" value="0" <? if($linha['piso_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="bancadas_embalagem" id="situacao" value="1" checked="checked" <? if($linha['bancadas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="bancadas_embalagem" id="situacao" value="0" <? if($linha['bancadas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="balancas_embalagem" id="situacao" value="1" checked="checked" <? if($linha['balancas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="balancas_embalagem" id="situacao" value="0" <? if($linha['balancas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="esteiras_embalagem" id="situacao" value="1" checked="checked" <? if($linha[esteiras_embalagem] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="esteiras_embalagem" id="situacao" value="0" <? if($linha['esteiras_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladoraa_embalagem" id="situacao" value="1" checked="checked" <? if($linha['seladoraa_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladoraa_embalagem" id="situacao" value="0" <? if($linha[seladoraa_embalagem] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="seladorab_embalagem" id="situacao" value="1" checked="checked" <? if($linha['seladorab_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="seladorab_embalagem" id="situacao" value="0" <? if($linha['seladorab_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="pias_embalagem" id="situacao" value="1" checked="checked" <? if($linha['pias_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="pias_embalagem" id="situacao" value="0" <? if($linha['pias_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="lixeira_embalagem" id="situacao" value="1" checked="checked" <? if($linha['lixeira_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="lixeira_embalagem" id="situacao" value="0" <? if($linha['lixeira_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="parede_embalagem" id="situacao" value="1" checked="checked" <? if($linha['parede_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="parede_embalagem" id="situacao" value="0" <? if($linha['parede_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="portas_embalagem" id="situacao" value="1" checked="checked" <? if($linha['portas_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="portas_embalagem" id="situacao" value="0" <? if($linha['portas_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="teto_embalagem" id="situacao" value="1" checked="checked" <? if($linha['teto_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="teto_embalagem" id="situacao" value="0" <? if($linha['teto_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
     
     <td><input type="radio" name="luminarias_embalagem" id="situacao" value="1" checked="checked" <? if($linha['luminarias_embalagem'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <br />
     <input type="radio"  name="luminarias_embalagem" id="situacao" value="0" <? if($linha['luminarias_embalagem'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
     </td>
   </tr>
   <tr>
   		<th colspan="6">ORGÂNICO</th>
   		<th colspan="6">GALPÃO</th>
   </tr>
   <tr>
     <!-- Cozinha Industrial -->
     <td align="center">PISO</td>
     <td align="center">BANCADAS</td>
     <td align="center">BALANÇAS</td>
     <td align="center">LIXEIRA</td>
     <td align="center">PORTA PALLET</td>
     <td align="center">LUMINÁRIAS</td>
     <!-- Galpao -->
     <td align="center">PISO</td>
     <td align="center">LIXEIRA</td>
     <td align="center">BALANÇAS</td>
     <td align="center">PORTAS</td>
     <td align="center">PORTA PALLET</td>
     <td align="center">LUMINÁRIAS</td>
   </tr>
   <tr>
   <!--  COZINHA INDUSTRIAL 	-->
   		<td><input type="radio" name="piso_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['piso_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_cozinhaind" id="situacao" value="0" <? if($linha['piso_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
     
        <td><input type="radio" name="bancada_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['bancada_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancada_cozinhaind" id="situacao" value="0" <? if($linha['bancada_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="balanca_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['balanca_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="balanca_cozinhaind" id="situacao" value="0" <? if($linha['balanca_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="lixeira_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['lixeira_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_cozinhaind" id="situacao" value="0" <? if($linha['lixeira_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="porta_pallet_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['porta_pallet_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta_pallet_cozinhaind" id="situacao" value="0" <? if($linha['porta_pallet_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="luminarias_cozinhaind" id="situacao" value="1" checked="checked" <? if($linha['luminarias_cozinhaind'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_cozinhaind" id="situacao" value="0" <? if($linha['luminarias_cozinhaind'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
   <!--  GALPÃO 	-->     
   		<td><input type="radio" name="piso_galpao" id="situacao" value="1" checked="checked" <? if($linha['piso_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_galpao" id="situacao" value="0" <? if($linha['piso_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
         <td><input type="radio" name="lixeira_galpao" id="situacao" value="1" checked="checked" <? if($linha['lixeira_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_galpao" id="situacao" value="0" <? if($linha['lixeira_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="balanca_galpao" id="situacao" value="1" checked="checked" <? if($linha['balanca_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="balanca_galpao" id="situacao" value="0" <? if($linha['balanca_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="portoes_galpao" id="situacao" value="1" checked="checked" <? if($linha['portoes_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="portoes_galpao" id="situacao" value="0" <? if($linha['portoes_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="porta_pallet_galpao" id="situacao" value="1" checked="checked" <? if($linha['porta_pallet_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta_pallet_galpao" id="situacao" value="0" <? if($linha['porta_pallet_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="luminarias_galpao" id="situacao" value="1" checked="checked" <? if($linha['luminarias_galpao'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_galpao" id="situacao" value="0" <? if($linha['luminarias_galpao'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="9">CÂMARAS FRIAS</th>
        <th colspan="3">ANTE-CÂMARA</th>

      </tr>
      
      <tr>
         <!-- Camaras Frias -->
         	<th align="center" colspan="3">CÂMARA 1</th>
            <th align="center" colspan="3">CÂMARA 2</th>
           	<th align="center" colspan="3">CÂMARA 3</th>
         <!-- Ante Camara -->
     		<td align="center" colspan="1" rowspan="2">PORTA, PAREDE E PISO</td>
     		<td align="center" colspan="1" rowspan="2">PORTA PALLET</td>
     		<td align="center" colspan="1" rowspan="2">LUMINÁRIAS</td>
      </tr>
      <tr>
         <!-- Camaras Frias -->
         	<!-- Camara 1-->
         	<td align="center">PPT</td>
            <td align="center">PORTA</td>
           	<td align="center">LUMINÁRIAS</td>
            <!-- Camara 2-->
         	<td align="center">PPT</td>
            <td align="center">PORTA</td>
           	<td align="center">LUMINÁRIAS</td>
            <!-- Camara 3-->
         	<td align="center">PPT</td>
            <td align="center">PORTA</td>
           	<td align="center">LUMINÁRIAS</td>
      </tr>
         <tr>
         	<!-- INICIO CÂMARAS FRIAS-->
            <!-- Camara 1-->
       	   <td><input type="radio" name="ppt1_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['ppt1_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppt1_camara_fria" id="situacao" value="0" <? if($linha['ppt1_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	 	   </td>
           
            <td>
        	<input type="radio" name="porta1_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['porta1_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta1_camara_fria" id="situacao" value="0" <? if($linha['porta1_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <td><input type="radio" name="luminarias1_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['luminarias1_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias1_camara_fria" id="situacao" value="0" <? if($linha['luminarias1_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- Camara 2-->
       	   <td><input type="radio" name="ppt2_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['ppt2_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppt2_camara_fria" id="situacao" value="0" <? if($linha['ppt2_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	 	   </td>
           
            <td>
        	<input type="radio" name="porta2_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['porta2_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta2_camara_fria" id="situacao" value="0" <? if($linha['porta2_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <td><input type="radio" name="luminarias2_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['luminarias2_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias2_camara_fria" id="situacao" value="0" <? if($linha['luminarias2_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- Camara 3-->
       	   <td><input type="radio" name="ppt3_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['ppt3_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppt3_camara_fria" id="situacao" value="0" <? if($linha['ppt3_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	 	   </td>
           
            <td>
        	<input type="radio" name="porta3_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['porta3_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta3_camara_fria" id="situacao" value="0" <? if($linha['porta3_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <td><input type="radio" name="luminarias3_camara_fria" id="situacao" value="1" checked="checked" <? if($linha['luminarias3_camara_fria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias3_camara_fria" id="situacao" value="0" <? if($linha['luminarias3_camara_fria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <!-- ANTI-CÂMARA-->
         <td colspan="1"><input type="radio" name="ppp_ante_camara" id="situacao" value="1" checked="checked" <? if($linha['ppp_ante_camara'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="ppp_ante_camara" id="situacao" value="0" <? if($linha['ppp_ante_camara'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="1"><input type="radio" name="porta_pallet_ante_camara" id="situacao" value="1" checked="checked" <? if($linha['porta_pallet_ante_camara'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="porta_pallet_ante_camara" id="situacao" value="0" <? if($linha['porta_pallet_ante_camara'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td colspan="1"><input type="radio" name="luminarias_ante_camara" id="situacao" value="1" checked="checked" <? if($linha['luminarias_ante_camara'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_ante_camara" id="situacao" value="0" <? if($linha['luminarias_ante_camara'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
        </tr>
         
         
           <th colspan="12">REFEITÓRIO</th>
   </tr>
   <tr>
     <td align="center">PISO</td>
     <td align="center">PIAS</td>
     <td align="center">BANCADAS</td>
     <td align="center">FORNO</td>
     <td align="center">FOGÃO</td>
     <td align="center">LIXEIRAS</td>
     <td align="center">GELADEIRA</td>
     <td align="center">FREEZER</td>
     <td align="center">COIFA</td>
     <td align="center">DESPENSA</td>
     <td align="center">LUMINÁRIAS</td>
     <td align="center">TETO</td>
   </tr>
   <tr>
   <!--  INICIO REFEITÓRIO-->
   		<td><input type="radio" name="piso_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['piso_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_refeitorio" id="situacao" value="0" <? if($linha['piso_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
     
        <td><input type="radio" name="pias_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['pias_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="pias_refeitorio" id="situacao" value="0" <? if($linha['pias_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
        
        <td><input type="radio" name="bancadas_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['bancadas_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="bancadas_refeitorio" id="situacao" value="0" <? if($linha['bancadas_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>

        
        <td><input type="radio" name="forno_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['forno_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="forno_refeitorio" id="situacao" value="0" <? if($linha['forno_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
           
   		<td><input type="radio" name="fogao_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['fogao_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="fogao_refeitorio" id="situacao" value="0" <? if($linha['fogao_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
   	    </td>
         
         <td><input type="radio" name="lixeira_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['lixeira_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="lixeira_refeitorio" id="situacao" value="0" <? if($linha['lixeira_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="geladeira_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['geladeira_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="geladeira_refeitorio" id="situacao" value="0" <? if($linha['geladeira_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="freezer_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['freezer_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="freezer_refeitorio" id="situacao" value="0" <? if($linha['freezer_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="coifa_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['coifa_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="coifa_refeitorio" id="situacao" value="0" <? if($linha['coifa_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="despensa_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['despensa_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="despensa_refeitorio" id="situacao" value="0" <? if($linha['despensa_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="luminarias_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['luminarias_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="luminarias_refeitorio" id="situacao" value="0" <? if($linha['luminarias_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
         
         <td><input type="radio" name="teto_refeitorio" id="situacao" value="1" checked="checked" <? if($linha['teto_refeitorio'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="teto_refeitorio" id="situacao" value="0" <? if($linha['teto_refeitorio'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 </td>
      <tr>
       	<th colspan="2">CAIXARIA</th>
       	<th colspan="2">VERTIÁRIOS</th>
        <th colspan="2">DESCARTE</th>
        <th colspan="1" rowspan="3">OBS.</th>
        
        <td colspan="6" rowspan="3"><textarea name="obs" cols="60" id="obs"><? echo utf8_encode($linha['obs']);?></textarea></td>
      </tr>
      <tr>
           <td align="center" colspan="2">PISO</td>
           <td align="center">MASCULINO</td>
           <td align="center">FEMININO</td>
           <td align="center">PISO</td>
           <td align="center">CAÇAMBA</td>
      </tr>
         <tr>            
            <!-- INICIO CAIXARIA -->
            <td colspan="2">
        	<input type="radio" name="piso_caixaria" id="situacao" value="1" checked="checked" <? if($linha['piso_caixaria'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_caixaria" id="situacao" value="0" <? if($linha['piso_caixaria'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>            
            <!-- INICIO VESTIÁRIO -->
            <td>
        	<input type="radio" name="masculino_vestiario" id="situacao" value="1" checked="checked" <? if($linha['masculino_vestiario'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="masculino_vestiario" id="situacao" value="0" <? if($linha['masculino_vestiario'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="feminino_vestiario" id="situacao" value="1" checked="checked" <? if($linha['feminino_vestiario'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="feminino_vestiario" id="situacao" value="0" <? if($linha['feminino_vestiario'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            
            <!-- INICIO DESCARTE -->
            <td>
        	<input type="radio" name="piso_descarte" id="situacao" value="1" checked="checked" <? if($linha['piso_descarte'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="piso_descarte" id="situacao" value="0" <? if($linha['piso_descarte'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
            <td>
        	<input type="radio" name="cacamba_descarte" id="situacao" value="1" checked="checked" <? if($linha['cacamba_descarte'] == 1){?>checked="checked"<? }?> /><label for="situacao">C&nbsp;&nbsp;&nbsp;&nbsp;</label>
     		<br />
     		<input type="radio"  name="cacamba_descarte" id="situacao" value="0" <? if($linha['cacamba_descarte'] == 0){?>checked="checked"<? }?> /> <label for="situacao">N/C</label>
    	 	</td>
         </tr>
         
   </tr>
   <tr>
   	 <td colspan="12">
     <div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>   
     </tr>
 </table>
  </form>	
	 <? }}?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO PHG MENSAL
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
	<script type="text/javascript">
//Data Table	
	$(document).ready( function () {
		$('#datatable').DataTable({
			stateSave: true,
			dom: 'Bfrtip',
			buttons: [
				'csv', 'excel', 'pdf', 'print'
			]
		});
		
	});
</script>