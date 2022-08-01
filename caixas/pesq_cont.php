<?
session_start();
require"topo.php"; 
require"include/verifica.php";
require "include/funcoes.php";
require "include/conexao.php";
$data_atual = date("d/m/Y");
?>
<!-- Chamada para script jquery para exibir mini calendário na pesquisa por data -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
       
<!-- Fim chamada para script jquery para exibir mini calendário na pesquisa por data -->        
<div align="center"><a href="contagem.php?pg=relpdfcont"><img src="img/pdf.png" alt="Download PDF" width="50px" /></a></div>
 <form action="contagem.php?pg=relcont&ordenar=<? $ordem?>" method="post" enctype="multipart/form-data">
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
  <tr>
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
  </tr>
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

<? 
require"rodape.php";
?>

