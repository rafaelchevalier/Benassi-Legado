<?
session_start();
require"topo.php";
require"include/verifica.php";
require"js/funcoes.jsp";

?>

<body> 
  <!-- ***********************  cadastro Mercado ************************* -->                
<?
	if ( isset($_SESSION['login_usuario_caixa']) and $pg == "cadmercado" and $_SESSION['nivel_usuario_caixa'] < "2") {//Cadastro de Administradores 
	include"include/conexao.php";
	   	$sql_login = mysql_query("SELECT * FROM login ");
		$cont2 = mysql_num_rows($sql_login);
	 ?>
		<h2>Cadastro Mercado</h2>  
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=adicionamercado" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td><div align="right">Cod.</div></td>
     <td><input type="text" autofocus name="cod" id="codmercado" onkeypress="autoTab(this, event); return event.keyCode != 13; " maxlength="30" size="31"  /></td>
   </tr>
   <tr>
   	 <td><div align="right">Filial</div></td>
     <td><input type="text" name="filial" id="filialmercado" onkeypress="autoTab(this, event); return event.keyCode != 13; " maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Razão Social</div></td>
     <td><input type="text" name="razao_social" id="razaomercado" onkeypress="autoTab(this, event); return event.keyCode != 13; " maxlength="100" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Nome Fantasia:</div></td>
     <td><input type="text" name="nome_fantasia" id="nomemercado" onkeypress="autoTab(this, event); return event.keyCode != 13; " maxlength="100" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">CNPJ</div></td>
     <td><input type="text" name="cnpj" id="cnpjmercado" maxlength="18" onkeypress="mascara(this, '##.###.###/####-##') " size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Rua</div></td>
     <td><input type="text" name="rua" id="ruamercado" maxlength="30" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Bairro</div></td>
     <td><input type="text" name="bairro" id="bairro" maxlength="30" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Cidade</div></td>
     <td><input type="text" name="cidade" id="cidade" maxlength="30" size="31" /></td>
   </tr>
   <tr>
     <td><div align="right">Cep</div></td>
     <td><input type="text" name="cep" id="cep" maxlength="9" size="31" onKeyPress="mascara(this, '#####-###')" /></td>
   </tr>
   <tr>
     <td><div align="right">E-mail</div></td>
     <td><input type="text" name="email" id="email" maxlength="200" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">Funcionário</div></td>
     <td align="left"><label for="nome_funcionario"></label>
     
       <select name="cod_funcionario" id="cod_funcionario">
         
       <?   
	   
		while($linha2 = mysql_fetch_array($sql_login)){
		$cod_funcioario = $linha2['id'];
		$nome_funcioario = $linha2['nome'];
		$nivel_usuario = $linha2['nivel_usuario'];
			if ( $nivel_usuario > "1") {//Bloqueia para não aparecer os administradores na lista
			
			?>
          
          <option value="<? echo $cod_funcioario ?>"> <? echo $nome_funcioario ?></option>  

       <? }} ?>
    </select>
       Antigo &gt; <? echo $nome_funcionario ?>;</td>
      
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
      </div></td>
   </tr>
 </table>
  </form>	<!-- Fecha formulário de cadastro de mercado -->
<? } ?>
<!-- *********************** fim  cadastro Mercado ************************* -->
 <!-- *********************** Altera Mercado ************************* -->  	 	  
<?
		include"include/conexao.php";
		if ( isset($_SESSION['login_usuario_caixa']) and $pg == "alteramercado" and $_SESSION['nivel_usuario_caixa'] < "2") {//altera de Administradores 
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM mercado where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		$cod = $linha['cod'];
		$filial = $linha['filial'];
		$razao_social = $linha['razao_social'];
		$nome_fantasia = $linha['nome_fantasia'];
		$cnpj = $linha['cnpj'];
		$rua = $linha['rua'];
		$bairro = $linha['bairro'];
		$cidade = $linha['cidade'];
		$cep = $linha['cep'];
		$estoque = $linha['estoque'];
		$cod_funcionario_mercado = $linha['cod_funcionario'];
		$nome_funcionario_mercado = $linha['nome_funcionario'];
		$email = $linha['email'];
			
		 ?>
         <h2>Altera Mercado</h2>
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=alteramercado&id=<? echo $id ?>" style="text-align:right">
 <table width="" border="1" cellspacing="0" align="center">
   <tr>
     <td>Cod:</td>
     <td><input type="text" name="cod" id="altcod" maxlength="30" size="31" value="<? echo $cod ?>" /></td>
   </tr>
    <tr>
     <td>Filial:</td>
     <td><input type="text" name="filial" id="altfilial" maxlength="30" size="31" value="<? echo $filial ?>" /></td>
   </tr>
   <tr>
     <td>Razão Social:</td>
     <td><input type="text" name="razao_social" id="altrazao_social" maxlength="100" size="31" value="<? echo $razao_social ?>" /></td>
   </tr>
   <tr>
     <td>Nome Fantasia:</td>
     <td><input type="text" name="nome_fantasia" id="altnome_fantasia" maxlength="100" size="31" value="<? echo $nome_fantasia ?>"/></td>
   </tr>
   <tr>
     <td>CNPJ:</td>
     <td><input type="text" name="cnpj" id="altcnpj" maxlength="18" size="31" value="<? echo $cnpj ?>" onKeyPress="mascara(this, '##.###.###/####-##')"/></td>
   </tr>
   <tr>
     <td>Rua:</td>
     <td><input type="text" name="rua" id="altrua" maxlength="30" size="31" value="<? echo $rua ?>"/></td>
   </tr>
   <tr>
     <td>Bairro:</td>
     <td><input type="text" name="bairro" id="altbairro" maxlength="30" size="31" value="<? echo $bairro ?>"/></td>
   </tr>
   <tr>
     <td>Cidade:</td>
     <td><input type="text" name="cidade" id="altcidade" maxlength="30" size="31" value="<? echo $cidade ?>"/></td>
   </tr>
   <tr>
     <td>Cep:</td>
     <td><input type="text" name="cep" id="altcep" maxlength="9" size="31" value="<? echo $cep ?>" onKeyPress="mascara(this, '#####-###')"/></td>
   </tr>
   <tr>
     <td><div align="right">E-mail</div></td>
     <td><input type="text" name="email" id="email" maxlength="200" size="31" value="<? echo $email ?>"  /></td>
   </tr>
      <tr>
     <td><div align="right">Funcionário</div></td>
     <td align="left"><label for="nome_funcionario"></label>
       <select name="cod_funcionario" id="nome_funcionario">
        
         
         <option selected="<? $cod_funcionario_mercado ?>"></option>
       <?   
	   include"include/conexao.php";
	   	$sql_login = mysql_query("SELECT * FROM login ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){
		$cod_funcionario = $linha2['id'];
		$nome_funcionario = $linha2['nome'];
		$nivel_usuario = $linha2['nivel_usuario'];
			if ( $nivel_usuario > "1") {//Bloqueia para não aparecer os administradores na lista
		
			?>  
            
         <option value="<? echo $cod_funcionario ?>" <? if($linha['cod_funcionario'] == $cod_funcionario){?> selected <? }?> ><? echo $nome_funcionario ?></option>  
         
       <? }} ?>
      </select></td>
   </tr>
   
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Alterar" />
      </div></td>
   </tr>
 </table>
	
</form><!-- Fecha formulário de alteração de mercado -->
		<? }} ?>
 <!-- *********************** Fim Altera Mercado ************************* --> 
  <!-- *********************** exibe Mercado ************************* --> 
<?  if ( isset($_SESSION['login_usuario_caixa']) and $pg == "relmercado" and $_SESSION['nivel_usuario_caixa'] < "2") {//relatório dos usuários
 require"pesq_mercado.php";

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
$filt1 = $_POST['pesq_cod_mercado'];//Pega o texto digitado pesq_mercado.php
$filt2 = $_POST['pesq_razao_mercado'];//Pega o texto digitado pesq_mercado.php
$filt3 = $_POST['pesq_nome_mercado'];//Pega o texto digitado pesq_mercado.php
//Testa os campos preenchidos
	if($filt1 != ""){
		$filtro_pesq = "cod";
	}
	else if($filt2 != ""){
		$filtro_pesq = "razao_social";
	}
	else if($filt3 != ""){
		$filtro_pesq = "nome_fantasia";
	}
	else{
		$filtro_pesq = "";
		}
   switch ($filtro_pesq){//Inicio Filtro com SWITCH.
	   case "cod":
		  $sql = mysql_query("SELECT * FROM mercado WHERE cod LIKE '%".$filt1."%'  ORDER by cod ");	 
	   break;
	   case "razao_social";
	   	  $sql = mysql_query("SELECT * FROM mercado WHERE razao_social LIKE '%".$filt2."%' ORDER by cod");
	   break;	
	   case "nome_fantasia":
		  $sql = mysql_query("SELECT * FROM mercado WHERE nome_fantasia LIKE '%".$filt3."%'  ORDER by cod ");	  	  
	   break;
	   default;
	  	$sql = mysql_query("SELECT * FROM mercado ORDER by cod ");
	   break;
	      }//Fim Filtro com SWITCH.
		  //Fim dos testes para filros
		  
		
			  
?>
<span class="style5">Ordenado por > </span><span class="style5"><? echo $ordem ?></span>

<table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="left" bgcolor="#FFFAFA" >
  <tr>
    <? if ($_SESSION['nivel_usuario_caixa'] == 0){ ?>
		<th width="15%">opcao&nbsp;</th>
	<? }?>
    <th width="5%"><a href="?pg=relmercado&ordenar=cod">Cod.&nbsp;</a></th>
    <th width="5%"><a href="?pg=relmercado&ordenar=filial">Filial.&nbsp;</a></th>
    <th width="20%"><a href="?pg=relmercado&ordenar=razao_social">Razão Social&nbsp;</a></th>
    <th width="20%"><a href="?pg=relmercado&ordenar=nome_fantasia">Nome fantasia</a></th>
    <th width="10%"><a href="?pg=relmercado&ordenar=cnpj">CNPJ&nbsp;</a></th>
    <th width="10%"><a href="?pg=relmercado&ordenar=cep">CEP&nbsp;</a></th>
  </tr>
   <?
  require"include/conexao.php";

	   

$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$cod = $linha['cod'];
	$filial = $linha['filial'];
	$razao_social = $linha['razao_social'];
	$nome_fantasia = $linha['nome_fantasia'];
	$cnpj = $linha['cnpj'];
	$rua = $linha['rua'];
	$bairro = $linha['bairro'];
	$cidade = $linha['cidade'];
	$cep = $linha['cep'];
	$estoque = $linha['estoque'];
	$cod_funcionario = $linha['cod_funcionario'];
	$cod_funcionario_login = $linha2['codfuncionario_login'];
	?>
   
    <tr>
	<? if ($_SESSION['nivel_usuario_caixa'] == 0){ ?>
		<td >
			<a href="mercado.php?pg=alteramercado&id=<? echo $id ?>">Alterar&nbsp;&nbsp;</a>
			<a href="include/excluir.php?funcao=excluirmercado&id=<? echo $id ?>">Remover</a>
		</td>
	<? }?>
    <td align="left">&nbsp;<? echo $cod ?>&nbsp;</td>
    <td align="left">&nbsp;<? echo $filial ?>&nbsp;</td>
    <td align="left">&nbsp;<? echo $razao_social ?>&nbsp;</td>
    <td align="left">&nbsp;<? echo $nome_fantasia ?>&nbsp;</td>
    <td align="left">&nbsp;<? echo $cnpj ?>&nbsp;</td>
    <td align="left">&nbsp;
		<? if ($cep != ""){?>
			<a  target="_new" href="http://local.google.com/local?f=q&hl=en&q=<? echo $cep ?>">
				<img src="img/gmaps.png" width="15px" alt="gmaps" />&nbsp;
			</a>
			<? echo $cep ?>
		<? }?>
	</td>
   </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
  
</table>

<p>
  <? } ?>
</p>
<p>&nbsp;</p>
<!-- *********************** fim exibe Mercado ************************* --> 



</body>

<? require"rodape.php"; ?>