<? session_start();?>

<!-- Começar a partit desta linha -->

<script type="text/javascript"> /* Calcula os preços dos itens*/ 
function id( el ){  
        return document.getElementById( el );  
}  
function getMoney( el ){  
        var money = id( el ).value.replace( ',', '.' );  
        return parseFloat( money )*100;  
}  
function soma()  
{
        var total = getMoney('valor_total_0')+getMoney('valor_total_1')+getMoney('valor_total_2')+getMoney('valor_total_3')+getMoney('valor_total_4')+getMoney('valor_total_5')+getMoney('valor_total_6')+getMoney('valor_total_7')+getMoney('valor_total_8')+getMoney('valor_total_9');
        id('valor_total').value = 'R$ '+total/100;  
}  
function soma_quantidade()  
{  
//Pega as variaveis da URL e grava no array "quebra"
	var variaveis=location.search.split("?");
	var quebra = variaveis[1].split("=");
//Fim Variavel URL

	for(var cont = 0; cont < 10; cont++){
        var total = getMoney('quantidade_'+cont)*getMoney('valor_unitario_'+cont);  
        id('valor_total_'+cont).value = total/10000;  
		
	}
}
</script>  


<?
require"topo.php";
require"include/verifica.php";
require"include/funcoes.php";
require"js/funcoes.jsp";
$data_atual = date("d/m/Y");

?>
		<body> 
<div id="headline">
		<!-- ***********************  Cadastro Orçamento  ************************* --> 
       
       <?
	if ( isset($_SESSION['login_usuario']) and $pg == "cad") {//Cadastro de Administradores  ?>
<h1>CADASTRO ORÇAMENTO</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="#" >
 <table width="" border="0" align="center" id="tbcad">
   <tr>
     <td><div align="right">Orçamento Num.</div></td>
     <td colspan="3"><input type="text" name="num_orcamento" id="num_orcamento" value="" maxlength="30" size="31" disabled /></td>
   </tr>
	<tr>
     <td><div align="right">Pedido num.</div></td>
     <td colspan="3"><input type="text" name="num_orcamento" id="num_orcamento" value="<? echo $_REQUEST['num_pedido']?>" maxlength="30" size="31" disabled="disabled"  /></td>
   </tr>
   <tr>
     <td><div align="right">FORNECEDORES</div></td>
     <td colspan="3">
     <select name="fornecedor">
     <?	//Busca Filtros
	if ( isset($_SESSION['login_usuario'])) {//Filtro só pesquisa no banco se for um usuário válido conectado
	 include"include/conexao.php";
	 	$id = $_SESSION['id_usuario'];
		$sql_empresas = mysql_query("SELECT id, razao_social FROM cad_empresas where tipo_servico = '1' ");
		while($linha_empresas = mysql_fetch_array($sql_empresas)){	
		
		?>
        <option value="<? echo $linha_empresas['id']?>"><? echo $linha_empresas['razao_social'];?></option>
        <? }}?>
     
     </select></td>
   </tr>
    <tr>
     <td>PRODUTOS</td>
     <td>QUANTIDADE</td>
     <td>VALOR UNITÁRIO</td>
     <td>VALOR TOTAL</td>
   </tr>
   <? for($i = 0; $i < 10; ++$i) { ?>
   <tr>
     <td>
     <input type="text" name="descricao_prod" id="cad_descrica_prod" maxlength="300" size="40" />
     </td>
     <td>
     <input type="number"  name="quantidade_<? echo $i;?>" value="1"  id="quantidade_<? echo $i;?>" maxlength="5" size="2" />
     </td>
     <td>
     <input type="text" name="valor_unitario_<? echo $i;?>" onChange="soma_quantidade(),soma()"  value="0" id="valor_unitario_<? echo $i;?>" maxlength="10" size="5" />
     </td>
     <td>
     <input type="text" name="valor_total_<? echo $i;?>" onChange="soma()" id="valor_total_<? echo $i;?>" maxlength="10" size="5" disabled="disabled" />
     </td>
   </tr>
   <? }?>
    <tr>
     <td>VALOR TOTAL ORÇAMENTO</td>
     <td colspan="2"></td>
     <td><input name="valor_total" readonly="readonly" maxlength="10" size="5" id="valor_total" />
     
     </td>
     
   </tr>
   <tr>
     <td colspan="4"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Cadastrar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
   </tr>
 </table>
  </form>	<? } ?> 
       
        <!-- ***********************  Fim cadastro  Orçamento ************************* --> 	
            
		</div>
		<div id="body">
			
		</div>
	</div>
	<? require"rodape.php";?>
</body>
</html>
