<?
session_start();
require"topo.php";
require"include/verifica.php";
require"include/funcoes.php";
require"js/funcoes.jsp";
$data_atual = date("d/m/Y");
?>
		<link href="css/style1.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/print_contagem.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css" media="screen"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<body> 
  
  <script>
	jQuery(function($){
	       $("#campoData").mask("99/99/9999");
		   $("#campoHora").mask("99:99");
	       $("#campoPlaca").mask("aaa-9999");
		   
	});
	</script>
  <!-- ***********************  cadastro Contagem Usuários************************* -->   
	<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "contfunc" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores  
	 include"include/conexao.php";
	$data_atual = date("d/m/Y");
	echo"
	<META HTTP-EQUIV=REFRESH CONTENT='0;URL=contagem.php?pg=contfunc2'>
	<script type=\"text/javascript\">	
	alert(\" Por motivo de segurança foi acrescentado no campo campo da placa uma proteção. A placa deve ser preenchida corretamente *exemplo: ABC-1234 (3 Letras Seguidos de 4 numeros). Caso não esteja correto, o campo não aceita o dado e apagando a informação incorreta para que seja digitado novamente de forma correta conforme *exemplo.\");
	</script>";
	}
	
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "contfunc2" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores  
	 include"include/conexao.php";
	$data_atual = date("d/m/Y");
	
	?>
<h2>Contagem</h2>  
	 <form id="frmcadastro" name="frm_contagem" method="post" action="include/adiciona.php?funcao=adiciona_contagem" style="text-align:right">
 <table width="477" border="1" align="center" cellspacing="0">
   <tr>
     <td width="176"><div align="right">Nome</div></td>
     <td width="291"><input name="funcionario" type="text" id="cadnome" value="<? echo $_SESSION['nome_completo_caixa']?>" size="37" maxlength="40" readonly="readonly"  />
     <input name="cod_funcionario" type="hidden" id="cadcod_funcionario" value="<? echo $_SESSION['id_usuario_caixa']?>" size="37" maxlength="30" readonly="readonly"/></td>
   </tr>
   <tr>
     <td><div align="right">Caixas Recebidas</div></td>
     <td><input type="text" name="recebida" id="cadbaixa" maxlength="9" size="37"  />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Quantidade Estoque na Loja:</div></td>
     <td><input type="text" name="quantidade" id="cadquantidade" maxlength="9" size="37"  />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Caixas enviadas</div></td>
     <td><input type="text" name="baixa" id="cadbaixa" maxlength="9" size="37"  />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Placa do caminhão:</div></td>
     <td><input type="text" name="placa" id="campoPlaca" maxlength="8" size="37"   />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Data Atual</div></td>
     <td><input name="data_contagem" type="text" id="cademail" value="<? echo $data_atual ?>" size="37" maxlength="80" readonly="readonly" /></td>
      <tr>
     	<td><div align="right">Devolução de mercadoria</div></td>
     	<td><div align="left">
        Sim:<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 0;document.frm_contagem.serie_nfe.disabled = 0;" value="1">&nbsp;&nbsp;
        Não<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 1;document.frm_contagem.serie_nfe.disabled = 1;" value="0" checked></div></td>
     </tr>
     <tr>
     	<td><div align="right">Nota Devolução</div></td>
     	<td>Série<input name="serie_nfe" type="text" disabled id="cad_serie_nfe" value="" size="5" maxlength="3"  />
     	  Nota
       <input name="nota_devolucao" type="text" disabled id="cad_nota_devolucao" value="" size="15" maxlength="80"  /></td>
     </tr>
     <tr>
     <td><div align="right">Mercado</div></td>
     <td align="left"><label for="nome_funcionario"></label>
     
       <select name="mercado" id="mercado">
         
       <?   
	  
	   	$sql_login = mysql_query("SELECT * FROM mercado ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){	

		?>
          
          <option value="<? echo $linha2['nome_fantasia'] ?>" onChange="<? $mercado = $linha2['nome_fantasia']; ?>"> <? echo $linha2['nome_fantasia'] ?></option>  

       <?  } ?>
    </select>
    
    </td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
 </table>
</form>	<? } ?>
<!-- *********************** fim  cadastro Contagem Usuários ************************* -->
  <!-- ***********************  cadastro Contagem Administradores************************* -->   
	<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "contfunc" and $_SESSION['nivel_usuario_caixa'] == "2") {//Cadastro de Administradores  
	 include"include/conexao.php";
	$data_atual = date("d/m/Y");
	?> 
		<h2>Contagem</h2>  
	 <form id="frmcadastro" name="frm_contagem" method="post" action="include/adiciona.php?funcao=adiciona_contagem" style="text-align:right">
 <table width="476" border="1" cellspacing="0" align="center">
   <tr>
     <td width="180"><div align="right">Nome</div></td>
     <td width="286"><input name="funcionario" type="text" id="cadnome" value="<? echo $_SESSION['nome_completo_caixa']?>" size="37" maxlength="30" readonly="readonly"  />
     <input name="cod_funcionario" type="hidden" id="cadcod_funcionario" value="<? echo $_SESSION['id_usuario_caixa']?>" size="37" maxlength="30" readonly="readonly"/>
     </td>
   </tr>
   <tr>
     <td><div align="right">Caixas Recebidas</div></td>
     <td><input type="text" name="recebida" id="cadbaixa" maxlength="9" size="37"  />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Quantidade Estoque na Loja:</div></td>
     <td><input type="text" name="quantidade" id="cadquantidade" maxlength="9" size="37" />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Caixas enviadas</div></td>
     <td><input type="text" name="baixa" id="cadbaixa" maxlength="9" size="37"  />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Placa do caminhão:</div></td>
     <td><input type="text" name="placa" id="campoPlaca" maxlength="8" size="37" />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Data Atual</div></td>
     <td><input name="data_contagem" type="text" id="cademail" value="<? echo $data_atual ?>" size="37" maxlength="80" readonly="readonly" /></td>
   <tr>
     	<td><div align="right">Devolução</div></td>
     	<td><div align="left">
        Sim:<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 0;document.frm_contagem.serie_nfe.disabled = 0;" value="1">&nbsp;&nbsp;
        Não<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 1;" value="0" checked></div></td>
     </tr>
     <tr>
     	<td><div align="right">Nota Devolução</div></td>
      <td>Série<input name="serie_nfe" type="text" disabled id="cad_serie_nfe" value="" size="5" maxlength="3"  />
     	  Nota
   	    <input name="nota_devolucao" type="text" disabled id="cad_nota_devolucao" value="" size="15" maxlength="80"  />
   	    </td>
     </tr>
     <tr>
     <td><div align="right">Mercado</div></td>
     <td align="left"><label for="nome_funcionario"></label>
     
       <select name="mercado" id="mercado" >
         
       <?   
	  
	   	$sql_login = mysql_query("SELECT * FROM mercado ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){	
			if ( $linha2['cod_funcionario'] == $_SESSION['id_usuario_caixa']) {//Bloqueia para não aparecer os administradores na lista
			?>
          
          <option value="<? echo $linha2['nome_fantasia'] ?>" onChange="<? $mercado = $linha2['nome_fantasia']; ?>"> <? echo $linha2['nome_fantasia'] ?></option>  
      
    </select>
       	<input name="email_envio" type="hidden" id="email_envio" value="<? echo $linha2['email'] ?>" size="37" maxlength="500" readonly="readonly" />
         <?  }} ?>
    </td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- *********************** fim  cadastro Contagem Administradores ************************* -->
 <!-- ***********************  Altera Contagem Administradores************************* -->   
	<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "altera_contagem" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores  
	 include"include/conexao.php";
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM contagem where id='$id' ");
		while($linha = mysql_fetch_array($sql)){	 
	$data_atual = date("d/m/Y");
	?> 
		<h2>Altera</h2>  
<form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=altera_contagem&id=<? echo $id ?>" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td><div align="right">Nome</div></td>
     <td><input name="funcionario" type="text" disabled id="cadnome" value="<? echo $linha['funcionario'];?>" size="31" maxlength="30" readonly="readonly"  />
     <input name="cod_funcionario" type="hidden" id="cadcod_funcionario" value="<? echo $linha['cod_funcionario'];?>" size="31" maxlength="30" readonly="readonly"/>
     </td>
   </tr>
   <tr>
     <td><div align="right">Quantidade :</div></td>
     <td><input type="text" name="quantidade" id="cadquantidade" value=" <? echo $linha['quantidade'];?>" maxlength="9" size="31"  /></td>
   </tr>
      <tr>
     <td><div align="right">Caixas enviadas</div></td>
     <td><input type="text" name="baixa" id="cadbaixa" maxlength="9" size="31" value="<? echo $linha['baixa'];?>"  /></td>
   </tr>
   <tr>
     <td><div align="right">Placa do caminhão:</div></td>
     <td><input type="text" name="placa" id="campoPlaca" maxlength="8" size="31" value="<? echo $linha['placa'];?>" onKeyPress="mascara(this, '###-####')"  /></td>
   </tr>

   <tr>
     <td><div align="right">Data Contagem</div></td>
     <td><input name="data_contagem" type="text" disabled id="cademail" value="<? echo $linha['data_contagem']; ?>" size="31" maxlength="80" readonly="readonly" /></td>
   </tr>
   <tr>
     <td><div align="right">Mercado</div></td>
     <td><input name="data_contagem" type="text" disabled id="cademail" value="<? echo $linha['mercado']; ?>" size="31" maxlength="80" readonly="readonly" /></td>
   </tr>
   <tr>
     	<td><div align="right">Devolução</div></td>
     	<td><div align="left">
        <? if ($linha['devolucao'] == "0") { ?>
        Sim:<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 0;document.frm_contagem.serie_nfe.disabled = 0;" value="1">&nbsp;&nbsp;
        Não<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 1;" value="0" checked>	<? } else{?>
        Sim:<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 0;document.frm_contagem.serie_nfe.disabled = 0;" value="1" checked>&nbsp;&nbsp;
        Não<input name="devolucao" type="radio" onClick="document.frm_contagem.nota_devolucao.disabled = 1;" value="0" >
        <? }?>
        </div>
   </td>	
   </tr>
   <tr>
     	<td><div align="right">Nota Devolução</div></td>
     	<td>Série<input name="serie_nfe" type="text"  id="cad_serie_nfe" value="<? echo $linha['serie_nfe']; ?>" size="5" maxlength="3"  />
     	  Nota
   	    <input name="nota_devolucao" type="text"  id="cad_nota_devolucao" value="<? echo $linha['nota_devolucao']; ?>" size="15" maxlength="80"  /></td>
   </tr>
 <? 
$altarado= $linha['usuario_alt'];
$data_alterado= $linha['data_alt']; 
   if ($altarado != ""){ ?>
	<tr>
          <td><div align="right">Ultima Alteração</div></td>
        <td> <input name="...." type="text" disabled id="cadusuario_alt" value="<? echo $altarado;?>" size="31" maxlength="30" readonly="readonly"/></td>
    </tr>
 	<tr>
                 <td><div align="right">Data Alteração</div></td>
     <td><input name="..." type="text" disabled id="cadcod_funcionario" value="<? echo $data_alterado;?>" size="31" maxlength="30" readonly="readonly"/></td>
    </tr>
     <? } ?>
  <? if ($altarado == ""){ ?>
	      <tr>
          <td><div align="right">Ultima Alteração</div></td>
        <td>  <input name="..." type="text" disabled id="cadusuario_alt" value="<? echo  $linha['cod_funcionario'];?>" size="31" maxlength="30" readonly="readonly"/> </td>
    </tr>
        <tr>
                 <td><div align="right">Data Alteração</div></td>
     <td><input name="..." type="text" disabled id="cademail" value="<? echo $linha['data_cadastro']; ?>" size="31" maxlength="80" readonly="readonly" /> </td>
    </tr>
<? 	}?>
   	<tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
   <input name="usuario_alt" type="hidden" id="cadcod_funcionario" value="<? echo $_SESSION['nome_completo_caixa'];?>" size="15" maxlength="30" readonly="readonly"/></td>
    <input name="data_alt" type="hidden" id="cadcod_funcionario" value="<? echo $data_atual;?>" size="31" maxlength="30" readonly="readonly"/>

 </table>
</form>
     
  
  <? }} ?>
<!-- *********************** fim  Altera Contagem Administradores ************************* -->
<!-- *********************** Filtro contagem ************************* --> 

<? if( isset($_SESSION['login_usuario_caixa']) and $pg == "relcont" and $_SESSION['nivel_usuario_caixa'] < "2") { ?>
<div align="center"><a href="contagem_novo.php?pg=relpdfcont"><img src="img/pdf.png" alt="Download PDF" width="50px" /></a></div>
 <form action="contagem_novo.php?pg=relcont&ordenar=<? $ordem?>" method="post" enctype="multipart/form-data">
<table width="550" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
  	<td align="right">Código</td>
    <td><input name="cod_contagem" id="form_rel_contagem" type="text" size="9" maxlength="10" ></td>
    <td colspan="2">Quando Preenchido ignora as outras opções.</td>
  </tr>
  <tr>
    <td width="81" align="right">Data Inicial</td>
    <td width="101"><input name="data1" type="text" id="data_1" 
	<? if($_POST['data1'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data1'] != ""){?>value="<? echo $_POST['data1'];?>" <? } ?>
    size="9" maxlength="10" readonly="readonly" ></td>
    <td width="96" align="right">Data Final</td>
    <td width="120"><input name="data2" type="text" id="data_4" 
    <? if($_POST['data2'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data2'] != ""){?>value="<? echo $_POST['data2'];?>" <? } ?>
    size="9" maxlength="10" readonly="readonly"></td>
  </tr>
  <!-- <tr>
    <td align="right">Funcionario</td>
    <td colspan="3"> <select name="pesq_nome">
         <option value="" selected> </option>
       <?   
	  	$sql_login = mysql_query("SELECT * FROM login ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){
		$cod_funcioario = $linha2['id'];
		$nome_funcioario = $linha2['nome'];
		$nivel_usuario = $linha2['nivel_usuario'];
			if ( $nivel_usuario > "0") {//Bloqueia para não aparecer os administradores na lista
			
			?>
          
          <option value="<? echo $nome_funcioario ?>"> <? echo $nome_funcioario ?></option>  

       <? }} ?>
    </select>
  </tr> -->
  <tr>
    <td align="right">Mercado</td>
    <td colspan="3"><input name="pesq_mercado" type="text" size="40" value="" maxlength="200"></td>
  </tr>
  <tr>
    <td align="right">Devoluções</td>
    <td colspan="3"><select name="pesq_devolucao" size="1">
      <option value="0" selected="selected">Não</option>
      <option value="1">Sim</option>
    </select>
      *Filtra somente os dias que tiveram devolução</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="btfiltro1" id="btfiltro1" value="Filtrar" /><input type="reset" name="btlimpar" id="btlimpar" value="Limpar" /></td>
 
  </tr>
</table>
</form>



<? }?>
  
<!-- *********************** Fim filtro contagem ************************* --> 
<!-- *********************** exibe Contagem ************************* --> 
<div id="rel_contagem">
<img src="img/logo.png" width="100px" align="middle" alt="logo" >
<br />
<p>Ralatório de caixas plásticas</p>
</div>
<?  if ( isset($_SESSION['login_usuario_caixa']) and $pg == "relcont" and $_SESSION['nivel_usuario_caixa'] < "2") {//relatório dos usuários
$data1 = $_REQUEST['data_filtro1'];
?>
<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
<?

   	
?>

<span class="style5"></span><span class="style5"><? echo $ordem?></span>
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" style="page-break-before: auto;" >
  <tr>
		<? if ($_SESSION['nivel_usuario_caixa'] == 0){ //FILTRO PARA LIBERAR APENAS PARA USUÁRIOS COM NÍVEL DE ACESSO MASTER ?>
    <th width="5%" bgcolor="#00FF00" id="opcao_tb">OPÇÃO</th>
		<? }
	if($_SESSION['nivel_usuario_caixa'] < 2){ ?><th width="5%" bgcolor="#00FF00">LOCALIZADOR</th> <? } ?>
    <th width="5%" id="th_data_cont">DATA CONT.</th>
    <th width="5%" id="th_data_cont">HORA CONT.</th>
    <th width="20%" id="th_mercado">MERCADO</th>
    <th width="5%" id="th_estoque">ESTOQUE<br /> ANTERIOR</th>
    <th width="5%" id="th_estoque">RECEBIDAS</th>
    <th width="5%" id="th_estoque">SAÍDA</th>
    <th width="5%" id="th_estoque">ESTOQUE <br />NA LOJA</th>
    <th width="10%" id="th_funcionario">FUNCIONÁRIO</th>
    <th width="8%" id="th_estoque">CAMINHÃO</th>
    <th width="5%" id="th_data_cad">DATA CAD.</th>
    <th width="5%" id="th_data_cad">DEVOLUCAO.</th>
    <th width="10%" id="th_data_cad">NOTA <br />DEVOLUÇÃO.</th>
  </tr>
 <?

$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************

$filt1 = converte_data($_POST['data1']);//Pega a data inicial para o filtro
$filt2 = converte_data($_POST['data2']);//Pega a data Final para o filtro
$filt3 = $_POST['pesq_nome'];//Pega o nome do funcionário para o filtro
$filt4 = $_POST['pesq_mercado'];//Pega o texto digitado para o filtro do mercado
$filt5 = $_POST['pesq_devolucao'];//Pega o valor do campo devolução para o filtro 
$filt6 = $_POST['cod_contagem'];//Pega o valor do campo cod_contagem para o filtro
 			if($filt1 != "" & $filt2 != "" & $filt3 == "" & $filt4 == "" ){//Filtro domente entre datas
		   $sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cadastro ");
		   $sql2 = mysql_query("SELECT * FROM contagem_saida WHERE data_cad BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cad ");
			}
			if($filt1 != "" & $filt2 != "" &  $filt3 != "" & $filt4 == "" ){//Filtro entre data e nome do funcionario cadastrado
			$sql = mysql_query("SELECT * FROM contagem WHERE funcionario LIKE ('$filt3') ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt3 == "" & $filt4 != ""){//Filtro entre data e mercado com a palavra digitado
			$sql = mysql_query("SELECT * FROM contagem WHERE mercado LIKE '%".$filt4."%' AND data_cadastro BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt5 == "1"){//Filtro Entre datas e Somente com devoluções
			$sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$filt1') AND ('$filt2') AND devolucao LIKE '%".$filt5."%' ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt5 == "1" & $filt3 != ""){// Filtro entre datas e se houve devolução somente de  1 funcionario
			$sql = mysql_query("SELECT * FROM contagem WHERE devolucao LIKE '%".$filt5."%' AND funcionario LIKE '%".$filt3."%' ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt5 == "1" & $filt4 != ""){// Filtro entre datas e se houve devolução somente de  1 Mercado
			$sql = mysql_query("SELECT * FROM contagem WHERE devolucao LIKE '%".$filt5."%' AND mercado LIKE '%".$filt4."%' ORDER by data_cadastro ");
			}
			if($filt6 != ""){
			$sql = mysql_query("SELECT * FROM contagem WHERE cod_contagem LIKE ('$filt6')");
			}
			
			
//****************  Fim Filtros **************************
//****************	Legenda do tipo de filtro escolhido	****************************
	if ($filt1 != ""){ ?>
    <span class="style7">Relatório de 
    <input name="" class="form_invisivel" type="text" readonly="readonly" value="<? echo converte_data($filt1) ?>" size="10" / > até
	<input name="" class="form_invisivel" type="text" readonly="readonly" value="<? echo  converte_data($filt2) ?>"size="10" /> <? } ?>
	<? if ($filt3 != "" ){?>
    <input name="" class="form_invisivel" type="text" readonly="readonly" value="<? echo $filt3 ?>" size="50" /> 
 	<? }if ($filt4 != ""){?>
    <input name="" class="form_invisivel" type="text" readonly="readonly" value="<? echo $fil4; ?>"size="20" /></span>
	<? }if($filt5 == 1){ ?>
    &nbsp;&nbsp;&nbsp; Somente com devolução
    <? }
    
	
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$id_cont = $linha['id'];
	$cod_mercado = $linha['cod_mercado'];
	$mercado = $linha['mercado'];
	$cod_funcionario = $linha['cod_funcionario'];
	$funcionario = $linha['funcionario'];
	$data_contagem = $linha['data_contagem'];
	$hora_cad = $linha['hora_cad'];
	$data_cadastro = $linha['data_cadastro'];
	$quantidade = $linha['quantidade'];
	$baixa = $linha['baixa'];
	$placa = $linha['placa'];
	$devolucao = $linha['devolucao'];
	$nota_devolucao = $linha['nota_devolucao'];
	$serie_nfe = $linha['serie_nfe'];
	$cod_contagem = $linha['cod_contagem'];
	$total_loja == "0";
	$total_estoque == "0";
	$total_enviadas == "0";
	
if ($devolucao == "0")$devolucao = "Não";
else $devolucao = "Sim";
//Puxa contagem anterior
$sql_ultimo_estoque = mysql_query("SELECT * FROM contagem where mercado ='$mercado' AND id<'$id_cont' ORDER BY id desc LIMIT 1  ");
		while($linha_ultimo_estoque = mysql_fetch_array($sql_ultimo_estoque)){
$soma_contagem = ($linha_ultimo_estoque['quantidade'] + $linha['recebida']) - $baixa;
$diferenca = $soma_contagem - $quantidade;
if($soma_contagem != $quantidade ){ $ult_estoque_erro = "1";}
if($soma_contagem == $quantidade ){ $ult_estoque_erro = "0";}

// Fim Puxa contagem anterior
	?>
    <tr style="page-break-before: auto;">
		<? if ($_SESSION['nivel_usuario_caixa'] == 0) {//Filtro apara exibir o botão alterar ou excluir apenas para usuário master  ?>
	<td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?> > 		<a href="contagem.php?pg=altera_contagem&id=<? echo $id ?>">Acerto&nbsp;&nbsp;</a>
    	  		<a href="include/excluir.php?funcao=excluir_contagem&id=<? echo $id ?>">Remover&nbsp;&nbsp;</a>
          <? }//Fim filtro botões apenas para usuários master?>
          <? if ($_SESSION['nivel_usuario_caixa'] == 0) {//Filtro apara exibir o botão alterar ou excluir apenas para usuário master  ?>
          		<a href="?pg=acerto_contagem&id=<? echo $id ?>">erro</a>
          <? }//Fim filtro botões apenas para usuários master?>
          </td>
		 
	<? if($cod_contagem != "0" AND $_SESSION['nivel_usuario_caixa'] < 2){ ?><td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $cod_contagem; ?> </td><? } ?>
	<td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo converte_data($data_contagem) ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $hora_cad; ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $mercado ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $linha_ultimo_estoque['quantidade']; ?></td>	
	<td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $linha['recebida'] ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $baixa; if($linha['erro_contagem'] == "1"){ echo "  (*)";}	?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $quantidade." ≠ (".$diferenca.")"; ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $funcionario;  ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $placa ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo converte_data($data_cadastro) ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? echo $devolucao ?></td>
    <td<? if($ult_estoque_erro == "1"){ ?> id="destaque_vermelho"<? }?>><? if ($nota_devolucao != ""){echo "Nota: ", $nota_devolucao, "<br />S&eacute;rie: ", $serie_nfe;} ?></td>
    	
   </tr>
   
   
   <? $total_loja ++;
     $total_estoque = $total_estoque +  $quantidade;
	 $total_enviadas = $total_enviadas + $baixa;
	 $total_recebidas = $total_recebidas + $linha['recebida'];
	?>
    
	<? }}//fecha while($linha = mysql_fetch_array($sql))	 ?>     
	<tr>
    <th id="opcao_tb"></th>
   	  <th width="7%" id="th_data_cont" 
	  <? if ($_SESSION['nivel_usuario_caixa'] < 1){ ?>
       		colspan="5"
	   <? } else { ?> 
       		colspan="4"
	   <? }?>  >
	   <? echo "Total Entradas: ".$total_loja;?>&nbsp;</th>
      	<th width="10%" id="th_recebidas"><? echo $total_recebidas;?>&nbsp;</th>
    	<th width="10%" id="th_funcionario"><? echo $total_estoque;?>&nbsp;</th>
    	<th width="8%" id="th_estoque"><? echo $total_enviadas;?>&nbsp;</th>
    	<th width="7%" id="th_data_cad" colspan="6">&nbsp;</th>
    </tr>

  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe Contagem ************************* --> 

<!-- *********************** Filtro relpdfcont ************************* --> 

<? if( isset($_SESSION['login_usuario_caixa']) and $pg == "relpdfcont" and $_SESSION['nivel_usuario_caixa'] < "2") { ?>

 <form action="contagem_rel.php?pg=relpdfcont" method="post" enctype="multipart/form-data">
<table width="550" border="0" cellspacing="0" align="center">
  <tr>
  	<td colspan="4">
    </td>
  </tr>
  <tr>
  	<td align="right">Código</td>
    <td><input name="cod_contagem" id="cod_contagem" type="text" size="9" maxlength="10" ></td>
    <td colspan="2">Quando Preenchido ignora as outras opções.</td>
  </tr>
  <tr>
    <td width="81" align="right">Data Inicial</td>
    <td width="101"><input name="data1" id="data_1" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10" ></td>
    <td width="96" align="right">Data Final</td>
    <td width="120"><input name="data2" id="data_4" type="text" size="9" value="<? echo $data_atual;?>" maxlength="10"></td>
  </tr>
  <!-- <tr>
    <td align="right">Funcionario</td>
    <td colspan="3"> <select name="pesq_nome">
         <option value="" selected> </option>
       <?   
	  	$sql_login = mysql_query("SELECT * FROM login ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){
		$cod_funcioario = $linha2['id'];
		$nome_funcioario = $linha2['nome'];
		$nivel_usuario = $linha2['nivel_usuario'];
			if ( $nivel_usuario > "0") {//Bloqueia para não aparecer os administradores na lista
			
			?>
          
          <option value="<? echo $nome_funcioario ?>"> <? echo $nome_funcioario ?></option>  

       <? }} ?>
    </select>
  </tr> -->
  <tr>
    <td align="right">Mercado</td>
    <td colspan="3"><input name="pesq_mercado" type="text" size="40" value="" maxlength="200"></td>
  </tr>
  <tr>
    <td align="right">Devoluções</td>
    <td colspan="3"><select name="pesq_devolucao" size="1">
      <option value="0" selected="selected">Não</option>
      <option value="1">Sim</option>
    </select>
      *Filtra somente os dias que tiveram devolução</td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="btfiltro1" id="btfiltro1" value="Filtrar" /><input type="reset" name="btlimpar" id="btlimpar" value="Limpar" /></td>
 
  </tr>
</table>
</form>



<? }?>
  
<!-- *********************** Fim filtro relpdfcont ************************* --> 

<? //*********************** exibe Relatório fpdf contagem ************************* -->
if($pg == "relpdf"){ 
require('fpdf/fpdf.php');
$pdf=new FPDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetTextColor(107,142,35);//Cor texto duperior
$pdf->SetFont('Arial','B','15');//Formatação texto topo





$data1 = $_REQUEST['data_filtro1'];
 // Cabeçalho
	$pdf->Cell(28.5,1,utf8_decode("Relatório Caixas plásticas"),1,2,'C');
	$pdf->SetFont('Arial','','9');
	$pdf->SetTextColor(0,0,0);
	 if($_SESSION['nivel_usuario_caixa'] < 2){ 
	$pdf->Cell(1,0.5,"COD",0,0,'L');
	}
    $pdf->Cell(2,0.5,utf8_decode("DATA CONT"),0,0,'C');
    $pdf->Cell(2,0.5,utf8_decode("HORA CONT"),0,0,'C');
    $pdf->Cell(5.5,0.5,utf8_decode("MERCADO"),0,0,'C');
    $pdf->Cell(2,0.5,utf8_decode("ESTOQUE"),0,0,'C');
    $pdf->Cell(2,0.5,utf8_decode("SAÍDA"),0,0,'C');
    $pdf->Cell(5.5,0.5,utf8_decode("FUNCIONÁRIO"),0,0,'C');
    $pdf->Cell(2.5,0.5,utf8_decode("CAMINHÃO"),0,0,'C');
    $pdf->Cell(3,0.5,utf8_decode("DEVOLUCAO"),0,0,'C');
    $pdf->Cell(3,0.5,utf8_decode("NOTA DEVOLUÇÃO"),0,1,'C');
	$pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');

 

$data_atual = date("d/m/Y");
  require"include/conexao.php";
//****************  Inicio Filtros **************************

$filt1 = converte_data($_POST['data1']);//Pega a data inicial para o filtro
$filt2 = converte_data($_POST['data2']);//Pega a data Final para o filtro
$filt3 = $_POST['pesq_nome'];//Pega o nome do funcionário para o filtro
$filt4 = $_POST['pesq_mercado'];//Pega o texto digitado para o filtro do mercado
$filt5 = $_POST['pesq_devolucao'];//Pega o valor do campo devolução para o filtro 
$filt6 = $_POST['cod_contagem'];//Pega o valor do campo cod_contagem para o filtro
 			if($filt1 != "" & $filt2 != "" & $filt3 == "" & $filt4 == "" ){//Filtro domente entre datas
		   $sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cadastro ");
		   $sql2 = mysql_query("SELECT * FROM contagem_saida WHERE data_cad BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cad ");
			}
			if($filt1 != "" & $filt2 != "" &  $filt3 != "" & $filt4 == "" ){//Filtro entre data e nome do funcionario cadastrado
			$sql = mysql_query("SELECT * FROM contagem WHERE funcionario LIKE ('$filt3') ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt3 == "" & $filt4 != ""){//Filtro entre data e mercado com a palavra digitado
			$sql = mysql_query("SELECT * FROM contagem WHERE mercado LIKE '%".$filt4."%' AND data_cadastro BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt5 == "1"){//Filtro Entre datas e Somente com devoluções
			$sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$filt1') AND ('$filt2') AND devolucao LIKE '%".$filt5."%' ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt5 == "1" & $filt3 != ""){// Filtro entre datas e se houve devolução somente de  1 funcionario
			$sql = mysql_query("SELECT * FROM contagem WHERE devolucao LIKE '%".$filt5."%' AND funcionario LIKE '%".$filt3."%' ORDER by data_cadastro ");
			}
			if($filt1 != "" & $filt2 != "" & $filt5 == "1" & $filt4 != ""){// Filtro entre datas e se houve devolução somente de  1 Mercado
			$sql = mysql_query("SELECT * FROM contagem WHERE devolucao LIKE '%".$filt5."%' AND mercado LIKE '%".$filt4."%' ORDER by data_cadastro ");
			}
			if($filt6 != ""){
			$sql = mysql_query("SELECT * FROM contagem WHERE cod_contagem LIKE ('$filt6')");
			}
			
			
//****************  Fim Filtros **************************

    
$sql_teste = mysql_query("select * from contagem where mercado = 'PRINCESA 31 JACAREPAGUA' ");	
$cont = mysql_num_rows($sql_teste);
while($linha = mysql_fetch_array($sql_teste)){
	$id = $linha['id'];
	$cod_mercado = $linha['cod_mercado'];
	$mercado = $linha['mercado'];
	$cod_funcionario = $linha['cod_funcionario'];
	$funcionario = $linha['funcionario'];
	$data_contagem = $linha['data_contagem'];
	$hora_cad = $linha['hora_cad'];
	$data_cadastro = $linha['data_cadastro'];
	$quantidade = $linha['quantidade'];
	$baixa = $linha['baixa'];
	$placa = $linha['placa'];
	$devolucao = $linha['devolucao'];
	$nota_devolucao = $linha['nota_devolucao'];
	$serie_nfe = $linha['serie_nfe'];
	$cod_contagem = $linha['cod_contagem'];
	$total_loja == "0";
	$total_estoque == "0";
	$total_enviadas == "0";
	
if ($devolucao == "0")$devolucao = "Não";
else $devolucao = "Sim";

	
		
	if($cod_contagem != "" AND $_SESSION['nivel_usuario_caixa'] < 2){
		$pdf->Cell(1,0.5,$cod_contagem,0,0,'C');
	} 
	$pdf->Cell(2,0.5,$data_contagem,0,0,'C');
    $pdf->Cell(2,0.5,$hora_cad,0,0,'C');
    $pdf->Cell(5.5,0.5,utf8_decode($mercado),0,0,'L');
    $pdf->Cell(2,0.5,$quantidade,0,0,'C');
    $pdf->Cell(2,0.5,$baixa,0,0,'C');
    $pdf->Cell(5.5,0.5,utf8_decode($funcionario),0,0,'L');
    $pdf->Cell(2.5,0.5,$placa,0,0,'L');
    if ($nota_devolucao != ""){
	$pdf->Cell(3,0.5,utf8_decode($devolucao),0,0,'C');
    $pdf->Cell(0.5,0.5,$serie_nfe,0,0,'L');
	$pdf->Cell(3,0.5,$nota_devolucao,0,1,'L');
    }
	else {
	$pdf->Cell(3,0.5,utf8_decode($devolucao),0,1,'C');
	}
    $total_loja ++;
     $total_estoque = $total_estoque +  $quantidade;
	 $total_enviadas = $total_enviadas + $baixa;
	 }//fecha while($linha = mysql_fetch_array($sql))
	 $pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');	   

   	 $pdf->Cell(5,0.5,"Total lojas Filtradas",0,0,'L'); 
	 $pdf->Cell(5.5,0.5,$total_loja,0,0,'C'); 
     $pdf->Cell(2,0.5,$total_estoque,0,0,'C');
     $pdf->Cell(2,0.5,$total_enviadas,0,1,'C');

$pdf->Close();
$pdf->Output('rel.pdf','I');
}?>
<!-- *********************** fim Relatório fpdf contagem ************************* --> 





<!-- *********************** exibe Contagem para o cliente ************************* --> 
<?  if ( isset($_SESSION['login_usuario_caixa']) and $pg == "relcont" and $_SESSION['nivel_usuario_caixa'] == "2") {//relatório dos usuários
$data1 = $_REQUEST['data_filtro1'];
?>
<script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
<?

   	
?>

<span class="style5"></span><span class="style5"><? echo $ordem?></span>
 <table width="300px" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
   <tr>
	
    <th width="5%" bgcolor="#00FF00">CÓDIGO&nbsp;</th>
    <th width="7%" id="th_data_cont">DATA CONT.&nbsp;</th>
   </tr>
 <?

$data_atual = converte_data(date("d/m/Y"));
  require"include/conexao.php";
//****************  Inicio Filtros **************************
			$sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$data_atual') AND ('$data_atual') AND mercado LIKE '%".$nome_completo."%' ORDER by data_cadastro ");

//****************  Fim Filtros **************************
//****************	Legenda do tipo de filtro escolhido	****************************
	if ($filt1 != ""){ ?>
    <span class="style7">Relatório de 
    <input name="" class="form_invisivel" type="text" readonly="readonly" value="<? echo converte_data($data_atual) ?>" size="10" / > até
	<input name="" class="form_invisivel" type="text" readonly="readonly" value="<? echo  converte_data($data_atual) ?>"size="10" /> <? } ?>
 	</span>
	
<?
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$cod_mercado = $linha['cod_mercado'];
	$mercado = $linha['mercado'];
	$cod_funcionario = $linha['cod_funcionario'];
	$funcionario = $linha['funcionario'];
	$data_contagem = $linha['data_contagem'];
	$hora_cad = $linha['hora_cad'];
	$data_cadastro = $linha['data_cadastro'];
	$quantidade = $linha['quantidade'];
	$baixa = $linha['baixa'];
	$placa = $linha['placa'];
	$devolucao = $linha['devolucao'];
	$nota_devolucao = $linha['nota_devolucao'];
	$serie_nfe = $linha['serie_nfe'];
	$cod_contagem = $linha['cod_contagem'];
	
if ($devolucao == "0")$devolucao = "Não";
else $devolucao = "Sim";

	
	?>
    <tr>
	<? if($cod_contagem != "0"){ ?><td>&nbsp;&nbsp;&nbsp;<? echo $cod_contagem; ?> &nbsp;&nbsp;&nbsp;</td><? } ?>
	<td width="7%">&nbsp;&nbsp;&nbsp;<? echo converte_data($data_contagem) ?>&nbsp;&nbsp;&nbsp;</td>
   </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** fim exibe Contagem para o cliente ************************* --> 
 <!-- ***********************  CADASTRO ERRO CONTAGEM ************************* -->   
	<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "acerto_contagem" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores  
	 require"include/conexao.php";
	$data_atual = date("d/m/Y");
	$id_contagem = $_GET['id'];
	
	$sql_erro_contagem = mysql_query("SELECT * FROM contagem WHERE id=$id_contagem ");
	$cont = mysql_num_rows($sql_erro_contagem);
while($linha_erro_contagem = mysql_fetch_array($sql_erro_contagem)){
	$cod_contagem = $linha_erro_contagem['cod_contagem'];
	$qtd_contagem = $linha_erro_contagem['quantidade'];
}
	?>
<h2>ACERTO ERRO CONTAGEM</h2>  
	 <form id="frmcadastro" name="frm_contagem" method="post" action="include/alterar.php?funcao=adiciona_erro_contagem&id=<? echo $id_contagem ?>" style="text-align:right">
 <table width="450" border="1" align="center" cellspacing="0">
   <tr>
     <td width="196"><div align="right">COD CONTAGEM:</div></td>
     <td width="350" align="left"><input name="cod_contagem" type="text" id="cod_cotagem" value="<? echo $cod_contagem; ?>" size="5" maxlength="10" readonly="readonly"  />&nbsp;DATA CONTAGEM:<? echo $data_atual;?></td>
   </tr>
   <tr>
     <td><div align="right">QUANTIDADE ENTRADA:</div></td>
     <td align="left"><input type="text" name="qtd_contagem" id="cad_qtd_contagem" maxlength="9" size="37" value="<? echo $qtd_contagem; ?>" readonly  /></td>
   </tr>
   <tr>
     <td><div align="right">CONFERENTE:</div></td>
     <td align="left"><input type="text" name="conferente" id="cad_conferente" maxlength="150" size="37"  /></td>
   </tr>
   <tr>
     <td><div align="right">QUANTIDADE REAL:</div></td>
     <td align="left"><input type="text" name="acerto_erro_contagem" id="cad_acerto_erro_contagem" maxlength="9" size="37"  /></td>
   </tr>
   <tr>
     <td><div align="right">DESCRIÇÃO ERRO:</div></td>
     <td align="left"><textarea name="descricao_erro_contagem" cols="30" rows=""></textarea></td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
 </table>
</form>	<? } ?>
<!-- *********************** FIM CADASTRO ERRO CONTAGEM ************************* -->
 <!-- ***********************  CADASTRO CONTAGEM SAIDA************************* -->   
	<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "cad_cont_saida" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores  
	 include"include/conexao.php";
	$data_atual = date("d/m/Y");
	?>
<h2>CONTAGEM SAIDA</h2>  
	 <form id="frmcadastro" name="frm_contagem" method="post" action="include/adiciona.php?funcao=adiciona_contagem_saida" style="text-align:right">
 <table width="450" border="1" align="center" cellspacing="0">
   <tr>
     <td width="160"><div align="right">Nome</div></td>
     <td width="280"><input name="funcionario" type="text" id="cadnome" value="<? echo $_SESSION['nome_completo_caixa']?>" size="37" maxlength="40" readonly="readonly"  />
     <input name="cod_funcionario" type="hidden" id="cadcod_funcionario" value="<? echo $_SESSION['id_usuario_caixa']?>" size="37" maxlength="30" readonly="readonly"/></td>
   </tr>
   <tr>
     <td><div align="right">SAIDA</div></td>
     <td><input type="text" name="saida" id="cadsaida" maxlength="9" size="37"  />
     *</td>
   </tr>
   <tr>
     <td><div align="right">Placa do caminhão:</div></td>
     <td><input type="text" name="placa" id="cadplaca" maxlength="8" size="37"  onkeypress="mascara(this, '###-####')"   />
      *</td>
   </tr>
   <tr>
     <td><div align="right">Mercado</div></td>
     <td align="left"><label for="nome_funcionario"></label>
     
       <select name="mercado" id="mercado">
         
       <?   
	  
	   	$sql_login = mysql_query("SELECT * FROM mercado ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){	

		?>
          
          <option value="<? echo $linha2['cnpj'] ?>" onChange="<? $mercado = $linha2['nome_fantasia']; ?>"> <? echo $linha2['nome_fantasia'] ?></option>  

       <?  } ?>
    </select>
       *
    </td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
 </table>
</form>	
	 <? } ?>
<!-- *********************** FIM CADASTRO CONTAGEM SAIDA ************************* -->

</body>
<? require"rodape.php"; ?>