<?
session_start();
require"topo.php";
require"include/verifica.php";
require"include/funcoes.php";
$data_atual = date("d/m/Y");
?>
		<link href="css/style1.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/print_contagem.css" rel="stylesheet" type="text/css" media="print"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css" media="screen"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
		<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
        <script type="text/javascript" src="js/funcoes.jsp"></script>
        <!-- para funcionamento do flexigrid -->
        <!-- <link rel="stylesheet" href="Flexi/style.css" /> -->
        <link rel="stylesheet" type="text/css" href="Flexi/css/flexigrid.pack.css" />
        <!-- FIM FLEXIGRID -->

<body> 
  
  <script>
	jQuery(function($){
	       $("#campoData").mask("99/99/9999");
		   $("#campoHora").mask("99:99");
	       $("#campoPlaca").mask("aaa-9999");
		   
	});
	</script>
  <!-- ***********************  CADASTRO OCORRÊNCIA ************************* -->   
  
<? 
switch($pg){
	case "1"://cadastro	
?>	
	<form name="frm_cad" id="cad" method="post" action="include/ocorrencia.php?funcao=cad_ocorrencia">
	<table id="cad" width="100%" border="0">
    <tr>
    	<td colspan="2"> Cadastro de Ocorrências</td>
    </tr>
    <tr>
    	<th colspan="2"></th>
    </tr>
	<tr>
		<td>Data:</td>
		<td><input name="data_ocorrecia" value="<? echo $data_atual?>" id="data_1" readonly="readonly" size="9" /></td>
		
	</tr>
    <tr>
    	<td width="1%">MERCADO:</td>
        <td>
        <select name="mercado" id="mercado">
       <?   
	   	$sql_mercado = mysql_query("SELECT * FROM mercado order by nome_fantasia ");
		$cont2 = mysql_num_rows($sql_mercado);
		while($linha_mercado = mysql_fetch_array($sql_mercado)){	
		?>
          <option value="<? echo $linha_mercado['id'] ?>" > <? echo utf8_decode($linha_mercado['nome_fantasia']) ?></option> 
       <?  } ?>
    </select>
        </td>
        
    </tr>
    <tr>
    	<td>DESCRIÇÃO:</td>
        <td><textarea name="descricao" cols="55"></textarea></td>
    </tr>
    <tr>
    	<td><input type="submit" value="Cadastrar" /></td>
    </tr>
        
        
    
    </table>
    </form>
<? 
	break;
	case "2"://Consulta as ocorrencias Cadastradas 
    require 'include/conexao.php';
	?>
<!-- Script para zebrar tabela -->    
<script>
	function zebra(id, classe) {
	var tabela = document.getElementById(id);
	var linhas = tabela.getElementsByTagName("tr");
	for (var i = 0; i < linhas.length; i++) {
	((i%2) == 0) ? linhas[i].className = classe : void(0);
	}
}</script>
<!-- Fim Script para zebrar tabela -->
    
  	
 <form name="filtro" id="filtro" method="post" action="" >
   <table id="Busca" align="center" border="0">
    <tr>
        <td align="right">Data Inicial</td>
        <td><input name="data1" type="text" id="data_1" 
        <? if($_POST['data1'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data1'] != ""){?>value="<? echo $_POST['data1'];?>" <? } ?>
        size="9" maxlength="10" readonly="readonly" ></td>
        <td align="right">Data Final</td>
        <td><input name="data2" type="text" id="data_4" 
        <? if($_POST['data2'] == ""){?>value="<? echo $data_atual;?>" <? } ?><? if($_POST['data2'] != ""){?>value="<? echo $_POST['data2'];?>" <? } ?>
        size="9" maxlength="10" readonly="readonly"></td>
  	</tr>
    <tr>
    	<td align="right">Mercado</td>
    	<td colspan="3">
        	<select name="mercado" size="1" id="mercado">
      		<option value="0" selected="selected">Todas</option>
			<? // Consulta para buscar mercados Cadastrados
			$sql_filtro = mysql_query("SELECT DISTINCT  * FROM ocorrencia_caixas ORDER BY id_mercado ");
			$cont_filtro = mysql_num_rows($sql_filtro);
			while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
			$id_mercado = $linha_filtro['id_mercado'];
				$sql_mercado = mysql_query("SELECT id, nome_fantasia FROM mercado where id='$id_mercado'");
				$linha_mercado = mysql_fetch_array($sql_mercado)
			?>
			<? if ($linha_filtro['id'] != ""){?>
			<option value="<? echo utf8_decode($linha_filtro['id_mercado']) ?>" multiple ><? echo utf8_encode($linha_mercado['nome_fantasia']) ?></option>
			   <? }}?>
    </select>
    </tr>
    <tr>
    	<td align="right">Ordem</td>
    	<td colspan="3">
        	<select name="ordem" size="1" id="ordem">
            <option value="order by data_cad desc" >DATA</option>
            <option value="ORDER BY id_mercado" >MERCADO</option>
			</select>
        </td>
    </tr>
    <tr>
    	<td colspan="4" align="center"><input type="submit" value="Buscar"></td>
    </tr>
  </table>
 </form>
    
    <table id="tabela_servidor" border="0" cellspacing="0" bgcolor="#666666" style="page-break-before: auto;" width="100%">
    	<tr>
        	<td align="left" colspan="4"><?
			
            echo "Filtro de busca por data: ".$_POST['data1']." <--> ".$_POST['data2'];
			?></td>
        </tr> 
        
        <tr>
        	<th width="5%">OPÇÕES
            <form action="include/ocorrencia.php?funcao=excluir" method="post">
            	<input type="image" src="images/Mini/delete_notes.png" width="20" name="submit" value="Excluir Selecionados" />
            
            </th>
            <th width="10%">DATA</th>
        	<th width="10%">MERCADO</th>
            <th width="75%">OCORRÊCIA</th>
        </tr> 
    <? //Inicio consulta mysqls
	$filt1 = converte_data($_REQUEST['data1']);
	$filt2 = converte_data($_REQUEST['data2']);
	if($_REQUEST['mercado'] == 0)
	$filt3 = "";
	else
	$filt3 = "AND id_mercado='".$_REQUEST['mercado']."'";
	
	$ordem = $_REQUEST['ordem'];
	
    $sql = mysql_query("SELECT * FROM ocorrencia_caixas WHERE data_ocorrencia BETWEEN ('$filt1') AND ('$filt2')  $filt3 $ordem limit 1000 ");
	$cont = 0;
	while($linha = mysql_fetch_array($sql)){
		$id_mercado = $linha['id_mercado'];
		$sql_mercado = mysql_query ("SELECT id,nome_fantasia from mercado where id='$id_mercado' LIMIT 1");
		$linha_mercado = mysql_fetch_array($sql_mercado);
		$cont ++;
	?>
    
        <tr>
        	<td><input type="checkbox" name="excluir[]" value="<? echo $linha['id'];?>" /></td>
        	<td><? echo converte_data($linha['data_ocorrencia'])?></td>
        	<td><? echo $linha_mercado['nome_fantasia']?></td>
            <td><? echo utf8_encode($linha['descricao'])?></td>
        </td>
        
    <? } ?>
    <tr>
    	<th colspan="2"><? echo "Consultas: ".$cont;?></th>
        <th colspan="2"></th>
    </tr>
    
    <script> zebra('tabela_servidor', 'zebra'); </script>
    </table>
    </form>
	 	
	<? break; //Fim consulta ocorrencias?>
  <!-- ***********************  FIM CADASTRO OCORRÊNCIA ************************* -->   
  
	
<?

default:
	echo "<script type=\"text/javascript\">	
		alert(\" Acesso não permitido! Entre em contato com administrador\")
		language='javascript'>history.back()
	 </script>";
break;

}//Fecha switch, deixar abaixo apenas o rodape.
?>
</body>
<? require"rodape.php"; ?>