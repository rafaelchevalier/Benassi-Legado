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

		<div id="headline">

          <p align="center"><h1>Controles para Qualidade.</h1></p>
          <ul>
 				<? if ($filt_tempcam_menu == 1){?>
                <a href="tempcam.php"> Temperatura Camaras Frigorificas</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                <? }?>         
          		<? if ($filt_fbl_menu == 1){?>
                <a href="fbl.php"> FBL - Formulário de Aferição Diário de Balanças</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
                <? if ($phg_menu == 1){?>
                <a href="phg.php"> PHG - Planilha de Hienização Global Semanal</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
                <? if ($pat_menu == 1){?>
                <a href="pat.php"> PAT - Planilha de avaliação de trasporte</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
                <? if ($clp_menu == 1){?>
                <a href="clp.php"> CLP - Check list predial</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
                <? if ($rcl_menu == 1){?>
                <a href="rcl.php"> RCL - Relatório check list predial</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
                <? if ($rnc_menu == 1){?>
                <a href="rnc.php"> RNC - Relatório Não Conformidade</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
          </ul>
          <ul>
                <br  /><br  />
                <? if ($transporte_menu == 1){?>
                <a href="transporte.php"> Cadastro Transporte</a>&nbsp;&nbsp;|&nbsp;&nbsp;                
				<? }?>
          </ul>
          
		<div id="body">
			
		</div><!-- Fecha id="body -->
	</div><!-- Fecha id="headline -->
<? require"rodape.php"; ?>
</body>
</html>
