<?php
	require "config_email.php";
//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 	//====================================================
	$email_remetente = $email_envio; // deve ser um email do dominio
	//====================================================
 
 
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = "rafael@benassirj.com.br;lilian@benassirj.com.br"; // qualquer email pode receber os dados
	$email_reply = "$email";
	$email_assunto = "Temperatura Camara Frigorificas";
	//====================================================
	//Variaveis de POST, Alterar somente se necessário
	//====================================================
	$camara = $_POST['camara'];
	$temperatura = $_POST['temperatura'];
	$umidade = $_POST['umidade'];
	$periodo = $_POST['periodo'];
 	$obs = $_POST['obs'];
	//====================================================
	//Consulta umidade e temperaturas minimas e máximas.
	//====================================================
	$sql_camara = mysql_query("SELECT * FROM cadcamaras WHERE id='$id_camara' limit 1");
	while($linha_camara = mysql_fetch_array($sql_camara)){ 
		$temp_min = $linha_camara['temp_min'];
		$temp_max = $linha_camara['temp_max'];
		$umidade_min = $linha_camara['umidade_min'];
		$umidade_max = $linha_camara['umidade_max'];
		$nome_camara = $linha_camara['nome'];
	}
	//===================================================='	
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo = "Camara = $nome_camara \n"; 
	if($temperatura < $temp_min){
		$email_conteudo .= "Temperatura abaixo da mínima $temp_min \n"; 
	}
	if($temperatura > $temp_max){
		$email_conteudo .= "Temperatura acima da máxima = $temp_max \n"; 
	}
	$email_conteudo .= "Temperatura = $temperatura \n"; 
	if($umidade < $umidade_min){
		$email_conteudo .= "Umidade abaixo da mínima $umidade_min \n";
	}
	if($umidade > $umidade_max){
		$email_conteudo .= "Umidade acima da máxima $umidade_max \n";
	}
	$email_conteudo .=  "umidade = $umidade \n";
	
	$email_conteudo .=  "Período = $periodo \n";
	$email_conteudo .=  "OBS:\n $obs \n";
 	//====================================================
 
	//Seta os Headers (Alerar somente caso necessario)
	//====================================================
	$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
	//====================================================
 
 
	//Enviando o email
	//====================================================
	if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
		echo "</b>E-Mail enviado com sucesso!</b>"; 
	}
  	else{
		echo "</b>Falha no envio do E-Mail!</b>";
	}
	//====================================================
?>