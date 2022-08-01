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
        <link rel="stylesheet" href="Flexi/style.css" />
        <link rel="stylesheet" type="text/css" href="Flexi/css/flexigrid.pack.css" />
        <script type="text/javascript"src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript" src="Flexi/js/flexigrid.pack.js"></script>
        <script type="text/javascript" src="Flexi/flexi.js"></script>
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
    	<td width="1%">MERCADO:</td>
        <td>
        <select name="mercado" id="mercado">
       <?   
	   	$sql_mercado = mysql_query("SELECT * FROM mercado ");
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
  
    <form name="consulta" id="consulta" method="post" action="" >
     <table class="flexme4" style="display: none"></table>
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