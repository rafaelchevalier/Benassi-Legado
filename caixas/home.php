
<?
if($hora_atual < "12:00:00"){ $saudacao = "Bom dia"; }
if($hora_atual > "11:59:59" and $hora_atual < "18:00:00"){ $saudacao = "Boa tarde"; }
if($hora_atual > "17:59:59"){ $saudacao = "Boa noite"; }
?>

<body>
<p class="style1_1"><? echo $saudacao ; echo " Você está logado como: "; echo $_SESSION['nome_completo_caixa'];?> Caso não seja você &nbsp;<a href="include/logout.php">Clique Aqui</a>&nbsp;  </p>
</body>

