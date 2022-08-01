<?
session_start();
require "topo.php";
require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
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
        <script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->
<script>
	jQuery(function($){
	       $("#campoData").mask("99/99/9999");
		   $("#campoHora").mask("99:99");
	       $("#campoIPV4").mask("999.999.999.999");
		   $("#campoCPF").mask("999.999.999-99");
		   $("#campoCEP").mask("99999-999");
	});
	</script>
<div id="headline">
<h2><p>INVENTÁRIO TI</p></h2>
<!-- ***********************  INICIO CADASTRO DE COMPUTADORES ************************* -->   
<? switch($_GET['pg']){
case 1:// Cadastro de computador inventário TI
require "include/conexao.php";
?>
<form id="frmcadastro" name="frmcadastro" method="post" action="include/inventario_ti.php?funcao=cad_inventario" />

 <table width="100%" border="2" align="center" id="tbcad">
    <tr>
        <th>HOST</th>
        <td><input name="host" type="text" id="host" /></td>
        <th>IP</th>
      	<td><input name="ip" type="text"  id="campoIPV4"/></td>
        <th>PATRIMONIO</th>
        <td><select name="patrimonio" size="1"> 
                <option value="0" >NÃO LOCALIZADO</option>
             <? $sql_invent = mysql_query("SELECT num_patrimonio FROM inventario ");
                $cont_invent = mysql_num_rows($sql_invent);
                while($linha_invent = mysql_fetch_array($sql_invent)){	
                ?>
             <option value="<? echo $linha_invent['num_patrimonio'] ?>" ><? echo $linha_invent['num_patrimonio'] ?></option>  
             <?  } ?>
             </select>
         </td>
        <th>USUÁRIO</th>
        <td><input name="usuario" type="text" /></td>
    </tr>
    <tr>
        <th>LOCALIDADE</th>
        <td><input name="localidade" type="text" id="localidade" /></td>
        <th >DEPARTAMENTO</th>
        <td><input name="departamento" type="text" /></td>
        <th>NF OFFICE</th>
        <td><input name="nf_sw_office" type="text" id="nf_sw_office" /></td>
        <th>FORNECEDOR OFFICE</th>
        <td><input name="fornecedor_sw_office" type="text" id="fornecedor_sw_office" /></td>
    </tr>
    <tr>
        <th>GATANTIA</th>
        <td><input name="data_garantia" type="text" id="data_garantia" /></td>
        <th>MODELO</th>
        <td><input name="modelo" type="text" /></td>
        <th>NUM. SÉRIE</th>
        <td><input name="num_serie" type="text" /></td>
        <th>COD SERVIÇO</th>
        <td><input name="cod_servico" type="text" /></td>
	</tr>
    <tr>
        <th>CPU</th>
        <td><input name="cpu" type="text" /></td>
        <th>MEMÓRIA</th>
        <td><input name="memoria" type="text" /></td>
        <th>HD</th>
        <td><input name="hd" type="text" /></td>
        <th>OFFICE</th>
        <td>
        	<select name="office" size="1"> 
         <? $sql_office = mysql_query("SELECT * FROM cad_office ");
			$cont_office = mysql_num_rows($sql_office);
			while($linha_office = mysql_fetch_array($sql_office)){	
			?>
         <option value="<? echo $linha_office['nome'] ?>" ><? echo $linha_office['nome'] ?></option>  
         <?  } ?>
         </select>
        </td>
    </tr>
    <tr>
        <th>SERIAL OFFICE</th>
        <td><input name="serial_office" type="text" /></td>
        <th>S.O</th>
        <td>
        	<select name="so" size="1"> 
         <? $sql_so = mysql_query("SELECT * FROM cad_so ");
			$cont_so = mysql_num_rows($sql_so);
			while($linha_so = mysql_fetch_array($sql_so)){	
			?>
         <option value="<? echo $linha_so['nome'] ?>" ><? echo $linha_so['nome'] ?></option>  
         <?  } ?>
         </select>
        </td>
        <th>TIPO LICENÇA S.O</th>
        <td>
        	<select name="tipo_licenca_so" id="tipo_licenca_so">
            	<option value="1">OEM</option>
                <option value="0">OPEN</option>
            </select>	
        </td>
        <th>SERIAL S.O</th>
        <td><input name="serial_licenca_so" type="text" id="serial_licenca_so" /></td>
    </tr>
    <tr>
        <th>LICENÇA CAL</th>
        <td>
        	<select name="licenca_cal">
            	<option value="1">SIM</option>
                <option value="0">NÃO</option>
            </select>	
        </td>
        <th>NFE CAL</th>
        <td><input name="nfe_cal" type="text" /></td>
        <th>FORNECEDOR CAL</th>
        <td><input name="fornecedor_cal" type="text" id="fornecedor_cal" /></td>
        <th>RM</th>
        <td>
        	<select name="rm">
            	<option value="1">SIM</option>
                <option value="0">NÃO</option>
            </select>	
        </td>
	</tr>
    <tr>        
        <th>ANTIVIRUS</th>
        <td>
        	<select name="antivirus">
            	<option value="1">SIM</option>
                <option value="0">NÃO</option>
            </select>	
        </td>
        <td colspan="6"><input type="submit" value="Cadastrar" /></td>
    </tr>
  </form>	
</table>
<? 	break;
	case 3: ?>
 
 <h1>Consulta </h1> 


<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="inventario_ti.php?pg=consulta" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
  <tr>
    <td align="right">Local</td>
    <td colspan="3" align="left"><select name="balanca" size="1" id="balanca">
      					<option value="1" selected="selected">Todas</option>
<? // Consulta para buscar os tipos únicos de camaras lançadas no sistema. 
	$sql_filtro = mysql_query("SELECT DISTINCT localidade FROM inventario_ti ORDER BY localidade ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	?>
    <? if ($linha_filtro['localidade'] != ""){?>
    <option value="<? echo utf8_decode($linha_filtro['localidade']) ?>" multiple ><? echo utf8_encode($linha_filtro['localidade']) ?></option>
       <? }}?>
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
<form action="include/inventario_ti.php?funcao=excluir" method="post">
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
		<? if ($filt_chamado_altera == "1" or $filt_chamado_exclui == "1"){ /*Filtro para liberar opção apenas para usuários com permissão para alterar ou excluir */ ?>
    <th width="6%" bgcolor="#00FF00">EXCLUIR&nbsp;<br />
    
    </th>
		<? } ?>
    <th width="" id="th_mercado" rowspan="2">HOST</th>
    <th width="" id="th_mercado" rowspan="2">IP</th>
    <th width="" id="th_mercado" rowspan="2">PATRIMONIO</th>
    <th width="" id="th_mercado" rowspan="2">USUÁRIO</th>
    <th width="" id="th_mercado" rowspan="2">LOCALIDADE</th>
    <th width="" id="th_mercado" rowspan="2">DEPARTAMENTO</th>
    <th width="" id="th_mercado" rowspan="2">NF OFFICE</th>
    <th width="" id="th_mercado" rowspan="2">FORNECEDOR OFFICE</th>
    <th width="" id="th_mercado" rowspan="2">GATANTIA</th>
    <th width="" id="th_mercado" rowspan="2">MODELO</th>
    <th width="" id="th_mercado" rowspan="2">NUM. SÉRIE</th>
    <th width="" id="th_mercado" rowspan="2">COD SERVIÇO</th>
    <th width="" id="th_mercado" rowspan="2">CPU</th>
    <th width="" id="th_mercado" rowspan="2">MEMÓRIA</th>
    <th width="" id="th_mercado" rowspan="2">HD</th>
    <th width="" id="th_mercado" rowspan="2">OFFICE</th>
    <th width="" id="th_mercado" rowspan="2">SERIAL OFFICE</th>
    <th width="" id="th_mercado" rowspan="2">S.O</th>
    <th width="" id="th_mercado" rowspan="2">TIPO LICENÇA S.O</th>
    <th width="" id="th_mercado" rowspan="2">SERIAL S.O</th>
    <th width="" id="th_mercado" rowspan="2">LICENÇA CAL</th>
    <th width="" id="th_mercado" rowspan="2">NFE CAL</th>
    <th width="" id="th_mercado" rowspan="2">FORNECEDOR CAL</th>
    <th width="" id="th_mercado" rowspan="2">RM</th>
    <th width="" id="th_mercado" rowspan="2">MYSQL</th>
    <th width="" id="th_mercado" rowspan="2">ANTIVIRUS</th>

  </tr>
  <tr>
  	<th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /></th>
  </tr>
 <?
$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************
//Filtro de consulta a tabela FBL 
$local_filt = $_REQUEST['local'];
$situacao_filt = $_REQUEST['situacao'];

		// Fim teste 
	
			if( $local_filt != "1"){//Filtro entre datas, Descrição e Conforme
				$sql = mysql_query("SELECT * FROM inventario_ti ORDER BY host DESC  ");
			}

			if( $local_filt == "1"){//Filtro entre datas, Descrição e Não Conforme
				$sql = mysql_query("SELECT * FROM inventario_ti WHERE localidade = '$local_filt' ORDER BY host DESC  ");
			}
			
$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
		
?>
    <tr>
		<?	if ($filt_chamado_exclui == "1" or $filt_chamado_altera == "1") {//Filtro apara exibir botões apenas para usuario com permissão para exluir ou alterar ?>
				<td > 
                <? if ($filt_chamado_altera == "11"){?>
                	<a href="include/inventario_ti.php?funcao=alt&id=<? echo $linha['id'] ?>"><img src="images/Mini/approve_notes.png" alt="altera" width="20px" /></a>
                <? }?>
                <? if ($filt_chamado_exclui == "1"){?>
                    <input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" />
                <? }?>
                </td>
		<? }//Fim filtro botões apenas para usuários master ?>

    	<td><? echo utf8_encode($linha['host']); ?></td>
        <td><? echo utf8_encode($linha['ip']); ?></td>
        <td><? echo utf8_encode($linha['patrimonio']); ?></td>
        <td><? echo utf8_encode($linha['usuario']); ?></td>
        <td><? echo utf8_encode($linha['localidade']); ?></td>
        <td><? echo utf8_encode($linha['departamento']); ?></td>
        <td><? echo utf8_encode($linha['nf_sw_office']); ?></td>
        <td><? echo utf8_encode($linha['fornecedor_sw_office']); ?></td>
        <td><? echo converte_data($linha['data_garantia']); ?></td>
        <td><? echo utf8_encode($linha['modelo']); ?></td>
        <td><? echo utf8_encode($linha['num_serie']); ?></td>
        <td><? echo utf8_encode($linha['cod_servico']); ?></td>
        <td><? echo utf8_encode($linha['cpu']); ?></td>
        <td><? echo utf8_encode($linha['memoria']); ?></td>
        <td><? echo utf8_encode($linha['hd']); ?></td>
        <td><? echo utf8_encode($linha['office']); ?></td>
        <td><? echo utf8_encode($linha['serial_office']); ?></td>
        <td><? echo utf8_encode($linha['so']); ?></td>
        <td><? echo utf8_encode($linha['tipo_licenca_so']); ?></td>
        <td><? echo utf8_encode($linha['serial_licenca_so']); ?></td>
        <td><? echo utf8_encode($linha['licenca_cal']); ?></td>
        <td><? echo utf8_encode($linha['nfe_cal']); ?></td>
        <td><? echo utf8_encode($linha['fornecedor_cal']); ?></td>
        <td><? switch($linha['rm']){case 0: echo "NÃO"; break;		case 1: echo "SIM"; break;	}?></td>
        <td><? switch($linha['mysql']){case 0: echo "NÃO"; break;		case 1: echo "SIM"; break;	}?></td>
        <td><? switch($linha['antivirus']){case 0: echo "NÃO"; break;		case 1: echo "SIM"; break;	}?></td>
   </tr>

  	 <?  $quantidade_filt ++;  }//fecha while($linha = mysql_fetch_array($sql)) e if situacao aberto   ?>
	  <tr>
     <th><input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" /><th>
    <th id="th_mercado" colspan="6"><? echo "Total Computadores: ",$quantidade_filt;?></th>
    <th id="th_mercado" colspan="20"></th>
  </tr>
      </table>
  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>

</form>
 
<? 	break;
default:
	
break;
?>

<? }?>

<!-- ************************************************************************************************************************************* 
											FIM CONSULTA Aferição Balança
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
