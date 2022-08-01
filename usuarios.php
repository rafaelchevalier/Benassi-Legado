<?
session_start();
require"topo.php";
//require"include/verifica.php";
require"include/funcoes.php";
require"js/funcoes.jsp";
require "include/config_filtros.php";

$data_atual = date("d/m/Y");
?>
<div id="headline">
		
			<!-- ***********************  cadastro administradores ************************* --> 
        	      
		<?
	if ($pg == "caduser" ) {//Cadastro de Administradores  ?>
<h1>Cadastro Usuários</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/adiciona.php?funcao=adiciona" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Completo:</div></td>
     <td><input type="text" name="nome" id="cadnome" maxlength="30" size="31" required  /></td>
   </tr>
   <tr>
     <td><div align="right">Login:</div></td>
     <td><input type="text" name="login" id="cadlogin" maxlength="30" size="31" required  /></td>
   </tr>
   <tr>
     <td><div align="right">Senha:</div></td>
     <td><input type="password" name="senha" id="cadsenha" maxlength="30" size="31" required /></td>
   </tr>
   <tr>
     <td><div align="right">E-mail:</div></td>
     <td><input type="email" name="email" id="cademail" maxlength="80" size="31" required /></td>
   </tr>
       <tr>
     <td><div align="right">Nascimento:</div></td>
     <td align="left">Dia:<select name="dia" size="1">
       <option value="01">01</option>
       <option value="02">02</option>
       <option value="03">03</option>
       <option value="04">04</option>
       <option value="05">05</option>
       <option value="06">06</option>
       <option value="07">07</option>
       <option value="08">08</option>
       <option value="09">09</option>
       <option value="10">10</option>
       <option value="11">11</option>
       <option value="12">12</option>
       <option value="13">13</option>
       <option value="14">14</option>
       <option value="15">15</option>
       <option value="16">16</option>
       <option value="17">17</option>
       <option value="18">18</option>
       <option value="19">19</option>
       <option value="20">20</option>
       <option value="21">21</option>
       <option value="22">22</option>
       <option value="23">23</option>
       <option value="24">24</option>
       <option value="25">25</option>
       <option value="26">26</option>
       <option value="27">27</option>
       <option value="28">28</option>
       <option value="29">29</option>
       <option value="30">30</option>
       <option value="31">31</option>
</select>
		Mes:
     <select name="mes" size="1">
       <option value="01">Janeiro</option>
       <option value="02">Fevereiro</option>
       <option value="03">Março</option>
       <option value="04">Abril</option>
       <option value="05">Maio</option>
       <option value="06">Junho</option>
       <option value="07">Julho</option>
       <option value="08">Agosto</option>
       <option value="09">Setembro</option>
       <option value="10">Outubro</option>
       <option value="11">Novembro</option>
       <option value="12">Dezembro</option>
</select>
     </td>
   </tr>
    <tr>
     <td><div align="right">Celular:</div></td>
     <td><input type="text" name="celular" id="cadcel" maxlength="80" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Id-Nextel:</div></td>
     <td><input type="text" name="radio" id="cadradio" maxlength="80" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Telefone:</div></td>
     <td><input type="text" name="telefone" onKeyPress="MascaraTelefone(frmcadastro.telefone);" id="cadtelefone" maxlength="14" size="31"  /></td>
   </tr>
    <tr>
     <td><div align="right">Setor:</div></td>
     <td><input type="text" name="setor" id="cadsetor" maxlength="80" size="31" /></td>
   </tr>
   <tr>
   	 <td><div align="right">Empresa:</div></td>
     <td align="left">
     <!-- Puxa nomes das empresas cadastradas no BD -->
     <select name="loja" size="1"> 
     	<?   
	  	require "include/conexao.php";
	   	$sql_login = mysql_query("SELECT * FROM lojas ");
		$cont2 = mysql_num_rows($sql_login);
		while($linha2 = mysql_fetch_array($sql_login)){	

		?>
         
        
          <option value="<? echo $linha2['id'] ?>" onChange="<? $mercado = $linha2['loja']; ?>"> <? echo $linha2['loja'] ?></option>  

       <?  } ?>
    </select>
    <!-- Fim puxa nomes das empresas cadastradas no BD -->    
	  </td>
   </tr>
   <tr>
     <td><div align="right">Nivel Usu&aacute;rio:</div></td>
     <td align="left"><select name="nivel_usuario" size="1" id="nivel_usuario"> 
     	<?   
	  	require "include/conexao.php";
		switch ($filt_usuario_filtro){
		case 1:
		$sql_filtro_acesso = mysql_query("SELECT * FROM filtro_acesso ");	
		break;
		default:
		$sql_filtro_acesso = mysql_query("SELECT * FROM filtro_acesso Where nome_perfil='Chamado' ");  	
	   	break;
		}
		$cont2 = mysql_num_rows($sql_filtro_acesso);
		while($linha_filtro = mysql_fetch_array($sql_filtro_acesso)){	
		?>
         <option value="<? echo $linha_filtro['id'] ?>"> <? echo $linha_filtro['nome_perfil'] ?></option>  
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
<!-- *********************** fim  cadastro administradores ************************* -->
			<!-- ***********************  Altera administradores ************************* --> 
            
    	<?
		include"include/conexao.php";
		if ($pg == "alterauser" and isset($_SESSION['nome_usuario'])) {//altera de Administradores 
		$id = $_GET['id'];
		$sql = mysql_query("SELECT * FROM login where id='$id' ");
		while($linha = mysql_fetch_array($sql)){
		
		 ?>
<h1>Altera Usuários</h1> 
	 <form id="frmcadastro" name="frmcadastro" method="post" action="include/alterar.php?funcao=alterauser&id=<? echo $id ?>" >
 <table width="" border="2" align="center" id="tbcad">
   <tr>
     <td><div align="right">Nome Completo:</div></td>
     <td><input type="text" name="nome" id="cadnome" value="<? echo $linha['nome']?>" maxlength="30" size="31" required /></td>
   </tr>
   <tr>
     <td><div align="right">Login:</div></td>
     <td><input type="text" name="login" id="cadlogin" value="<? echo $linha['login']?>" maxlength="30" size="31" required  /></td>
   </tr>
   <tr>
     <td><div align="right">Senha:</div></td>
     <td><input type="password" name="senha" id="cadsenha" value="" maxlength="30" size="31"  /></td>
   </tr>
   <tr>
     <td><div align="right">E-mail:</div></td>
     <td><input type="text" name="email" id="cademail" value="<? echo $linha['email']?>" maxlength="80" size="31" required /></td>
   </tr>
       <tr>
     <td><div align="right">Nascimento:</div></td>
     <td align="left">Dia:<select name="dia" size="1">
       <option value="01" <? if ($linha['dia'] == "01"){?>selected="selected" <? }?> >01</option>
       <option value="02" <? if ($linha['dia'] == "02"){?>selected="selected" <? }?> >02</option>
       <option value="03" <? if ($linha['dia'] == "03"){?>selected="selected" <? }?> >03</option>
       <option value="04" <? if ($linha['dia'] == "04"){?>selected="selected" <? }?> >04</option>
       <option value="05" <? if ($linha['dia'] == "05"){?>selected="selected" <? }?> >05</option>
       <option value="06" <? if ($linha['dia'] == "06"){?>selected="selected" <? }?> >06</option>
       <option value="07" <? if ($linha['dia'] == "07"){?>selected="selected" <? }?> >07</option>
       <option value="08" <? if ($linha['dia'] == "08"){?>selected="selected" <? }?> >08</option>
       <option value="09" <? if ($linha['dia'] == "09"){?>selected="selected" <? }?> >09</option>
       <option value="10" <? if ($linha['dia'] == "10"){?>selected="selected" <? }?> >10</option>
       <option value="11" <? if ($linha['dia'] == "11"){?>selected="selected" <? }?> >11</option>
       <option value="12" <? if ($linha['dia'] == "12"){?>selected="selected" <? }?> >12</option>
       <option value="13" <? if ($linha['dia'] == "13"){?>selected="selected" <? }?> >13</option>
       <option value="14" <? if ($linha['dia'] == "14"){?>selected="selected" <? }?> >14</option>
       <option value="15" <? if ($linha['dia'] == "15"){?>selected="selected" <? }?> >15</option>
       <option value="16" <? if ($linha['dia'] == "16"){?>selected="selected" <? }?> >16</option>
       <option value="17" <? if ($linha['dia'] == "17"){?>selected="selected" <? }?> >17</option>
       <option value="18" <? if ($linha['dia'] == "18"){?>selected="selected" <? }?> >18</option>
       <option value="19" <? if ($linha['dia'] == "19"){?>selected="selected" <? }?> >19</option>
       <option value="20" <? if ($linha['dia'] == "20"){?>selected="selected" <? }?> >20</option>
       <option value="21" <? if ($linha['dia'] == "21"){?>selected="selected" <? }?> >21</option>
       <option value="22" <? if ($linha['dia'] == "22"){?>selected="selected" <? }?> >22</option>
       <option value="23" <? if ($linha['dia'] == "23"){?>selected="selected" <? }?> >23</option>
       <option value="24" <? if ($linha['dia'] == "24"){?>selected="selected" <? }?> >24</option>
       <option value="25" <? if ($linha['dia'] == "25"){?>selected="selected" <? }?> >25</option>
       <option value="26" <? if ($linha['dia'] == "26"){?>selected="selected" <? }?> >26</option>
       <option value="27" <? if ($linha['dia'] == "27"){?>selected="selected" <? }?> >27</option>
       <option value="28" <? if ($linha['dia'] == "28"){?>selected="selected" <? }?> >28</option>
       <option value="29" <? if ($linha['dia'] == "29"){?>selected="selected" <? }?> >29</option>
       <option value="30" <? if ($linha['dia'] == "30"){?>selected="selected" <? }?> >30</option>
       <option value="30" <? if ($linha['dia'] == "31"){?>selected="selected" <? }?> >31</option>
</select>
		Mes:
     <select name="mes" size="1">
       <option value="01" <? if ($linha['mes'] == "01"){?>selected="selected" <? }?> >Janeiro</option>
       <option value="02" <? if ($linha['mes'] == "02"){?>selected="selected" <? }?> >Fevereiro</option>
       <option value="03" <? if ($linha['mes'] == "03"){?>selected="selected" <? }?> >Março</option>
       <option value="04" <? if ($linha['mes'] == "04"){?>selected="selected" <? }?> >Abril</option>
       <option value="05" <? if ($linha['mes'] == "05"){?>selected="selected" <? }?> >Maio</option>
       <option value="06" <? if ($linha['mes'] == "06"){?>selected="selected" <? }?> >Junho</option>
       <option value="07" <? if ($linha['mes'] == "07"){?>selected="selected" <? }?> >Julho</option>
       <option value="08" <? if ($linha['mes'] == "08"){?>selected="selected" <? }?> >Agosto</option>
       <option value="09" <? if ($linha['mes'] == "09"){?>selected="selected" <? }?> >Setembro</option>
       <option value="10" <? if ($linha['mes'] == "10"){?>selected="selected" <? }?> >Outubro</option>
       <option value="11" <? if ($linha['mes'] == "11"){?>selected="selected" <? }?> >Novembro</option>
       <option value="12" <? if ($linha['mes'] == "12"){?>selected="selected" <? }?> >Dezembro</option>
</select>
     </td>
   </tr>
    <tr>
     <td><div align="right">Celular:</div></td>
     <td><input type="text" name="celular" id="cadcel" value="<? echo $linha['celular']?>" maxlength="80" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Id-Nextel:</div></td>
     <td><input type="text" name="radio" id="cadradio" value="<? echo $linha['radio']?>" maxlength="80" size="31" /></td>
   </tr>
    <tr>
     <td><div align="right">Telefone:</div></td>
     <td><input type="text" name="telefone" onKeyPress="MascaraTelefone(frmcadastro.telefone);" value="<? echo $linha['telefone']?>" id="cadtelefone" maxlength="14" size="31"  /></td>
   </tr>
    <tr>
     <td><div align="right">Setor:</div></td>
     <td><input type="text" name="setor" id="cadsetor" value="<? echo $linha['setor']?>" maxlength="80" size="31" /></td>
   </tr>

   <tr>
     <td><div align="right">Nivel Usu&aacute;rio:</div></td>
     <td align="left"><select name="nivel_usuario" size="1" id="nivel_usuario"> 
     	<?   
	  	require "include/conexao.php";
		switch ($filt_usuario_filtro){
		case 1:
		$sql_filtro_acesso = mysql_query("SELECT * FROM filtro_acesso ");	
		break;
		default:
		$id_perfil = $linha['id_perfil_acesso'];
	   	$sql_filtro_acesso = mysql_query("SELECT * FROM filtro_acesso WHERE id = '$id_perfil' ");
	   	break;
		}
		$cont2 = mysql_num_rows($sql_filtro_acesso);
		while($linha_filtro = mysql_fetch_array($sql_filtro_acesso)){	

		?>
         
          <option value="<? echo $linha_filtro['id'] ?>" 
		  <? if ($linha['id_perfil_acesso'] == $linha_filtro['id']){?>selected="selected"<? }?>> <? echo $linha_filtro['nome_perfil'] ?></option>

       <?  } ?>
    </select> 
        </td>
   </tr>
   <tr>
     <td colspan="2"><div align="center">
       <input type="submit" name="btcadastrar2" id="btcadastrar2" value="Alterar" />
       <input type="reset" name="btcadastrar" id="btcadastrar" value="Limpar" />
     </div></td>
   </tr>
 </table>
  </form>	<? }}?>
<!-- *********************** fim  altera administradores ************************* -->
<!-- *********************** EXIBE USUÁRIOS ************************* --> 
<?  if ($pg == "relusuario" and $filt_usuario_consulta == 1) {//relatório dos usuários
require"include/verifica.php";
?>
<h1>Consulta Usuários</h1>
 <script>
function zebra(id, classe) {
var tabela = document.getElementById(id);
var linhas = tabela.getElementsByTagName("tr");
for (var i = 0; i < linhas.length; i++) {
((i%2) == 0) ? linhas[i].className = classe : void(0);
}
}</script>
 <table width="100%" border="1" cellspacing="0" id="tabela_servidor" align="center" bgcolor="#666666" >
  <tr>
    <th width="">OP&Ccedil;&Atilde;O&nbsp;</th>
    <th width="">NOME&nbsp;</th>
    <th width="">LOGIN&nbsp;</th>
    <th width="">DATA NASC.&nbsp;</th>
    <th width="">E-MAIL&nbsp;</th>
  </tr>
    <?
  $sql = mysql_query("SELECT * FROM login ORDER BY nome ");
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$nome = $linha['nome'];
	$login = $linha['login'];
	$email = $linha['email'];
	$id = $linha['id'];

	?>
    <tr>
    	<td >
        	<? if ($filt_usuario_altera == 1){?>
        	<a href="usuarios.php?pg=alterauser&id=<? echo $id ?>">Alterar&nbsp;&nbsp;</a>
            <? }?>
            <? if ($filt_usuario_exclui == 1){?>
    	 	<a href="include/excluir.php?funcao=excluiruser&id=<? echo $id ?>">Remover</a>
            <? }?>
            <? if ($filt_filtro_acesso_rel == 1){ ?>
         	<a href="filtro_acesso.php?id=<? echo $id ?>">Gerenciar Filtro</a>
            <? }?>
    	</td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $nome ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $login ?>&nbsp;&nbsp;&nbsp;</td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $linha['dia']?>/<? echo $linha['mes']?>&nbsp;&nbsp;&nbsp;</td>
    <td width="">&nbsp;&nbsp;&nbsp;<? echo $email ?>&nbsp;&nbsp;&nbsp;</td>
  </tr>
	<? }//fecha while($linha = mysql_fetch_array($sql))
	 ?>     


  <script> zebra('tabela_servidor', 'zebra'); </script>
</table>
<? } ?>
<!-- *********************** FIM EXIBE USUÁRIOS************************* --> 
		</div>
		<div id="body">
			
		</div>
	</div>
	<? require"rodape.php";?>
</body>
</html>
