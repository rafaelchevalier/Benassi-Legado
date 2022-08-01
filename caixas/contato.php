<?
session_start();
require"topo.php";
?>
<body>
 <form action="http://troia.kinghost.net/formmail.cgi" method="POST">
 <input type="hidden" name="recipient" value="contato@benassirio.com.br">
	    <input type="hidden" name="redirect" value="http://www.ti,benassirio.com.br/caixas">
    	<input type="hidden" name="subject" value="Contato Sistema caixas">
	    <input type="hidden" name="email" value="ti@benassirio.com.br">
<table width="200" border="1">
  <tr>
    <td>Usuário</td>
    <td><input name="nome" type="text" size="50" maxlength="49" readonly="readonly" /></td>
  </tr>
  <tr>
    <td>Assunto</td>
    <td><input name="replyto" type="text" size="35" maxlength="34" readonly="readonly" /></td>
  </tr>
  <tr>
    <td>Mensagem</td>
    <td><textarea name="pedido" rows="2" cols="50"></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
	<? require"rodape.php"; ?>
</body>
