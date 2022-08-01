<?
session_start();
require"include/verifica.php";
require "include/funcoes.php";
require "include/conexao.php";
$data_atual = date("d/m/Y");
?>       

 <form action="mercado.php?pg=relmercado&ordenar=<? $ordem?>" method="post" enctype="multipart/form-data">
 <p class="style1_1">Filtro para busca de mercados</p>
<table width="451" border="1" cellspacing="0" align="center">
  <tr>
    <td align="right">Código</td>
    <td colspan="3"><input name="pesq_cod_mercado" type="text" size="40" value="" maxlength="10"></td>
  </tr>
  <tr>
    <td align="right">Razão Social</td>
    <td colspan="3"><input name="pesq_razao_mercado" type="text" size="40" value="" maxlength="200"></td>
  </tr>
  <tr>
    <td align="right">Nome Fantasia</td>
    <td colspan="3"><input name="pesq_nome_mercado" type="text" size="40" value="" maxlength="200"></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><input type="submit" name="btfiltro1" id="btfiltro1" value="Filtrar" /><input type="reset" name="btlimpar" id="btlimpar" value="Limpar" /></td>
 
  </tr>
</table>
</form>


