<?
session_start();
require "topo.php";
require "include/verifica.php";// MÓDULO QUE VERIFICA SE O USUÁRIO ENCONTRA-SE LOGADA PARA ACESSO RESTRITO (PADRÃO EM PÁGINAS INTERNAR RESTRITAS)
require "include/funcoes.php";//FUNCÃO PHP (PADRÃO TODAS AS PÁGINAS)
require "js/funcoes.jsp";//FUNÇÃO JAVA (PADRÃO TODAS AS PÁGINAS)
require "include/config_filtros.php";//MÓDULO DE CONTROLE DE ACESSO PARA BLOQUEIO E LIBERAÇÃO DE RECURSO DA PÁGINA (PADRÃO TODAS AS PÁGINAS)
$data_atual = date("d/m/Y");// PUXA DATA ATUAL PARA UTILIZAÇÃO DURANTE A PÁGINA CASO NECESSÁRIO (PADRÃO TODAS AS PÁGINAS)
$nome_usuario_logado = $_SESSION['nome_usuario'];
$id_usuario_logado = $_SESSION['id_usuario'];
$pagina_atual = "rh_registro_doc.php"
?>

<!-- Inicio Link para funcionar a exemplo-calendario.js -->
		<link href="css/default.css" rel="stylesheet" type="text/css"/>
		<link href="css/jquery.click-calendario-1.0.css" rel="stylesheet" type="text/css"/>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.click-calendario-1.0-min.js"></script>		
		<script type="text/javascript" src="js/exemplo-calendario.js"></script>
<!-- Fim link para funcionar a exemplo-calendario.js -->

<div id="headline">
<h2><p> REGISTRO DE DOCUMENTOS</p></h2>

<!-- ************************************************************************************************************************************* 
								Define Quantidade de documentos
****************************************************************************************************************************************** -->
		<? 
	if ($pg == "cad_qt" and $filt_rh_doc_inclui == "1") {//Cadastro?>
    
    <h2><p>Quantidade Documentos</p></h2>  	 
<form id="frmleitura" name="frmleitura" method="post"action="<? echo $pagina_atual ?>?pg=cad">
 		 <table width="" border="0" cellspacing="0" align="center" id="tbcad">
   <tr>
   <tr>  
     <td><div align="right">Quantidade:</div></td>
     <td><input type="text" name="qt" id="qt" maxlength="30" size="10" /></td>
   </tr>
     <td colspan="2"><div align="center">
       <input type="submit" />
     </div></td>
   </tr>
 </table>
  </form>
    
  <? } ?>
		
		<? 
/******************************************************************************************
							Fim definição quantidade
******************************************************************************************/
/******************************************************************************************
							Cadastro de documentos
******************************************************************************************/
if ($pg == "cad" and $filt_rh_doc_inclui == "1") {//Cadastro ?>
  
<h1>Cadastro</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/<? echo $pagina_atual ?>?funcao=cad&qt=<? echo $qt;?>" >
 <table width="" border="2" align="center" id="tbcad">
	<tr>
		<td >
			<div align="right">Data.:</div>
		</td>
		<td align="left" >
		 <input name="data" type="text" size="10" maxlength="10" readonly="readonly" value="<? echo $data_atual?>" onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
		</td>
		<td >
			<div align="right">Remetente:</div>
		</td>
		<td  align="left">
			<input type="text" name="remetente" value="<? echo $nome_usuario_logado?>" maxlength="30" size="31" readonly="readonly"  onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
			<input type="hidden" name="id_remetente" value="<? echo $id_usuario_logado?>" maxlength="30" readonly="readonly"  onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
		</td>
		<td>Destinatários</td>
		<td> 
			 <select name="destinatario" size="1" id="destinatario">
			<? // Consulta nome funcionarios que trabalham no DP ou RH
			
			$sql_usuario = mysql_query("SELECT id, nome,setor FROM login where setor = 'DP/RH'  ORDER BY nome  ");
			$cont_usuario = mysql_num_rows($sql_usuario);
			while($linha_usuario = mysql_fetch_array($sql_usuario)){ 
				if($cont_usuario > 1){
			?>
				
				<option value="<? echo $linha_usuario['id'] ?>" multiple onkeypress="autoTab(this, event); return event.keyCode != 13;">
					<? echo utf8_encode($linha_usuario['nome']) ?>
				</option>
				<? }?>
				<? if($cont_usuario < 1){ ?>
				<option value="NA" multiple >Nenhum usuário encontrado</option>
				<? }?>
			<? }?>   
			</select>
		</td>
	</tr>
	<tr>
		<th colspan="2">Empresa:</th>
		<th colspan="2">Funcionário:</th>
		<th colspan="2">Documento:</th>
   </tr>
   
   <? $qt = 0;
    if ($_POST['qt'] =="" or $_POST['qt'] > "40" ){$_POST['qt'] = 5; }
   for($i=0; $i < $_POST['qt']; $i++){
	$qt ++;
   ?>
   
	<tr>   
		<td colspan="2">
			<select name="empresa<? echo $i?>" size="1" id="destinatario">
			<? // Consulta nome empresa do grupo
			$sql_empresa = mysql_query("SELECT id, nome_fantasia FROM empresa  ORDER BY nome_fantasia");
			$cont_empresa = mysql_num_rows($sql_empresa);
			while($linha_empresa = mysql_fetch_array($sql_empresa)){ 
				if($cont_empresa > 1){
			?>	
				<option value="<? echo $linha_empresa['id'] ?>" multiple onkeypress="autoTab(this, event); return event.keyCode != 13;">
					<? echo utf8_encode($linha_empresa['nome_fantasia']) ?>
				</option>
				<? }?>
				<? if($cont_empresa < 1){ ?>
				<option value="NA" multiple onkeypress="autoTab(this, event); return event.keyCode != 13;">Nenhum usuário encontrado</option>
				<? }?>
			<? }?>   
		</td>
		<td colspan="2" align="center">
			 <input type="text" name="funcionario<? echo $i;?>" maxlength="100" onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
		</td>
		<td colspan="2" align="center">
			 <input type="text" name="documento<? echo $i;?>" maxlength="100" onkeypress="autoTab(this, event); return event.keyCode != 13;"/>
		</td>
	</tr>
	<? }?>
   <tr>
     <td colspan="6"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?>
<!-- ************************************************************************************************************************************* 
											FIM CADASTRO Documentos
****************************************************************************************************************************************** -->
<!-- ************************************************************************************************************************************* 
											CONSULTA DOCUMENTOS 
****************************************************************************************************************************************** -->
<? 
if ($pg == "consulta" and $filt_rh_doc_consulta = "1") {//Consulta Aferição Balança
?>

<h1>Consulta </h1> 

<!-- ******************** Formulário Filtro de consulta a tabela de temperatura e umidade ******************** -->

<form action="<? echo $pagina_atual ?>?pg=consulta" method="post" enctype="multipart/form-data">
<table width="300" border="0" cellspacing="0" align="center">
	<tr>
		<td colspan="4">
    </td>
	</tr>
	<tr>
		<td width="110" align="right">Data Inicial</td>
		<td width="87">
			<input name="data1" id="data1" type="text" size="9" 
			<? if(!empty($_POST['data1'])){?>
				value="<? echo $_POST['data1'];?>"  
			<?}else{?>
				value="<? echo $data_atual;?>"
			<? }?>
			maxlength="10" >
		</td>
		<td width="180" align="right">Data Final</td>
		<td width="165">
			<input name="data2" id="data2" type="text" size="9" 
			<? if(!empty($_POST['data2'])){?>
				value="<? echo $_POST['data2'];?>"  
			<?}else{?>
				value="<? echo $data_atual;?>"
			<? }?>
			maxlength="10">
		</td>
	</tr>
	<tr>
		<td align="right">Situação</td>
		<td colspan="3" align="left">
		<select name="situacao_opcao" size="1" id="situacao">
		  <option value="" selected="selected">Todos</option>
		  <option value="and situacao = 0">Pendente</option>
		  <option value="and situacao = 1">Confirmado</option>
		</select> 
		</td>
	</tr>
	<!--
	<tr>
		<td align="right">Todos Usuários</td>
		<td colspan="3" align="left">
		<select name="filtro_usuario" size="1" id="situacao">
		  <option value="0" selected="selected">Não</option>
		  <option value="1">SIM</option>
		</select> 
		</td>
	</tr>
	-->
	<tr>
		<td align="right">Destinatários</td>
		<td> 
			 <select name="id_destinatario" size="1" id="id_destinatario">
			 <option value="" multiple >Todos</option>
			<? // Consulta nome funcionarios que trabalham no DP ou RH
			
			$sql_usuario = mysql_query("SELECT id, nome,setor FROM login where setor = 'DP/RH'  ORDER BY nome  ");
			$cont_usuario = mysql_num_rows($sql_usuario);
			while($linha_usuario = mysql_fetch_array($sql_usuario)){ 
				if($cont_usuario > 1){
			?>
				
				<option value="<? echo "and id_destinatario = ".$linha_usuario['id']."";?>" multiple onkeypress="autoTab(this, event); return event.keyCode != 13;">
					<? echo utf8_encode($linha_usuario['nome']) ?>
				</option>
				<? }?>
				<? if($cont_usuario < 1){ ?>
				<option value="NA" multiple >Nenhum usuário encontrado</option>
				<? }?>
			<? }?>   
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Funcionário
		</td>
		<td colspan="3" align="left">
			<input type="text" name="busca_funcionario" size="50" />
		</td>
	</tr>
	<tr>
		<td>
			Documento
		</td>
		<td colspan="3" align="left">
			<input type="text" name="busca_doc" size="50" />
		</td>
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

<? //Filtro

	$data1 = converte_data($_POST['data1']);//Data Inicial
	$data2 = converte_data($_POST['data2']);//Data Final
	if(!empty($_POST['filtro_usuario']) and $_POST['filtro_usuario'] == 1 ){
		$filt_id0 = "";//Puxa todos os remetentes 
		$filt_id1 = "";//Puxa todos os destinatarios 
		
	}else{
		$filt_id0 = "and id_remetente = '$id_usuario_logado'";// Puxa remetente logado
		$filt_id1= "or id_destinatario = '$id_usuario_logado'";// Puxa destinatario logado
	}
	$filt1 = $_POST['situacao_opcao'];//Filtro documentos pendentes ou finalizados
	$filt2 = $_POST['id_destinatario'];//Filtro destinatário
	if(!empty($_POST['busca_funcionario'])){
		$filt3 = "and funcionario like '%".$_POST['busca_funcionario']."%'";//Filtro nome documento
	}
	if(empty($_POST['busca_funcionario'])){
		$filt3 = "";
	}
	if(!empty($_POST['busca_doc'])){
		$filt3 = "and documento like '%".$_POST['busca_doc']."%'";//Filtro nome documento
	}
	if(empty($_POST['busca_doc'])){
		$filt3 = "";
	}
?>
<form action="include/<? echo $pagina_atual ?>?funcao=confirma_doc" method="post">
<table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
	<? // Consulta cabeçalho
	//Consulta todos documentos que o usuário logado tenha enviado ou tenha recebido 
	if($filt2 == ""){
		$sql_cab = mysql_query("
			SELECT * FROM rh_cab_circulacao_de_documentos  
			WHERE data BETWEEN ('$data1') AND ('$data2')
			$filt_id0
			$filt_id1
			ORDER BY data");
	}
	//Consulta todos documentos que o usuário logado tenha enviado para a pessoa especifica selecionada
	if($filt2 != ""){
		$sql_cab = mysql_query("
			SELECT * FROM rh_cab_circulacao_de_documentos  
			WHERE data BETWEEN ('$data1') AND ('$data2')
			$filt_id0
			$filt2
			ORDER BY data");
	}
	$cont = mysql_num_rows($sql_cab);
	while($linha = mysql_fetch_array($sql_cab)){ 
		$id_cab = $linha['id'];
	?>	
		<tr>
			<th>
				<input type="image" src="images/accept.png" width="20" name="submit<? echo $cont?>" value="Excluir Selecionados" />
				<? if ($linha['id_remetente'] == $id_usuario_logado){ ?>
				<a href="include/rh_registro_doc.php?funcao=exclui_cab&id=<? echo $id_cab ?>">
					<img src="images/delete.png" width="20" alt="Excluir" />
				</a>
				<? }?>
			</th>
			<th colspan="10" align="left">
				<? echo converte_data($linha['data'])?> &nbsp&nbsp |&nbsp&nbsp
				<? echo $linha['remetente']?> &nbsp&nbsp-->&nbsp&nbsp
				<? echo $linha['destinatario']?>
			</th>			
		</tr>
		<? // Consulta doc
		$sql_doc = mysql_query("SELECT * FROM rh_doc_circulacao_de_documentos 
							WHERE id_cab ='$id_cab'
							$filt1
							$filt3
							ORDER BY id_empresa");
		$cont_doc = mysql_num_rows($sql_doc);
		while($linha_doc = mysql_fetch_array($sql_doc)){ 
		$id_empresa = $linha_doc['id_empresa'];
		
		?>	
		<tr>
			<td>
				<? if ($linha_doc['situacao'] != "1" and $linha['id_destinatario'] == $id_usuario_logado){?>
					<input type="checkbox" name="excluir[]" value="<? echo $linha_doc['id'];?>" />
				<? }?>
				<? if ($linha_doc['situacao'] != 1 and $linha['id_remetente'] == $id_usuario_logado){?>
					<a href="include/rh_registro_doc.php?funcao=exclui_doc&id=<? echo $linha_doc['id'] ?>">
						<img src="images/delete.png" width="12" alt="Excluir" />
					</a>
				<? }?>
</form><!-- Fecha formulário de exclusão -->
			</td>
			<td <?	if ( $linha_doc['situacao'] != "0" ){ ?> id="chamado_aberto" <? }?>>
				<? echo $linha_doc['documento'];?>
			</td>
			<td <?	if ( $linha_doc['situacao'] != "0" ){ ?> id="chamado_aberto" <? }?>>
				<? echo $linha_doc['funcionario'];?>
			</td>
			<td <?	if ( $linha_doc['situacao'] != "0" ){ ?> id="chamado_aberto" <? }?>>
				<? echo busca_empresa($id_empresa);?>
			</td>
			<td <?	if ( $linha_doc['situacao'] != "0" ){ ?> id="chamado_aberto" <? }?>>
				<? 
				switch($linha_doc['situacao']){
					case '0':
						echo "Pendente";
					break;
					case '1':
						echo "Confirmado";
					break;
					default:
						echo "Erro";
					break;
				}
				?>
			</td>
		</tr>	
	<? }}?>
</table>
<script> zebra('tabela_servidor', 'zebra'); </script>
</form>
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
