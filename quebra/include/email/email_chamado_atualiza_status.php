<?php
/***************************************************************************************************************************************
Módulo de envio de e-mail quando ocorrer alguma mudança de status no chamado.
Neste e-mail vai uma msg avisnado que houve mudança, a descrição da mudança, novo status, data e hora da mudança.
****************************************************************************************************************************************/
 	$data_atual = date("d/m/Y");
	$hora_atual = time("hh:mm");
	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 	//====================================================
	$email_remetente = "ti@benassirio.com.br"; // deve ser um email do dominio
	//====================================================
 	
		//Variaveis de POST, Alterar somente se necessário
	//====================================================
	$nome = $_POST['nome_tecnico'];
	$detalhe = $_POST['detalhe'];
	$email_usuario = $_POST['email_usuario'];
	$num_chamado = $_POST['num_chamado'];
	$solucao = $_POST['solucao'];
	//====================================================
 
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = $email_usuario; // qualquer email pode receber os dados
	$email_reply = "rafael.chevalier@benassirio.com.br"; 
	$email_assunto = "Atualização Chamado ".$num_chamado."Data Atualização: ".$data_atual."Hora: ".$hora_atual;// assunto do email
	//====================================================
 
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo =	"Confirmamos por meio deste e-mail a mudança de statuso de seu chamado para". $solucao. "\n\n"; 
	$email_conteudo .= 	"Abaixo seguem informações a respeito do mesmo:\n\n"; 
	$email_conteudo .=  "-Número Chamado: ".$num_chamado. "\n\n";
	$email_conteudo .=  "-Descriçao Atualização: ".$detalhe. "\n\n";
	$email_conteudo_link .= "<a href=\"http://ti.benassirio.com.br/chamado.php?pg=chamado_aberto\">Clique aqui e acompanhe seus Chamados pendentes</a> ";
 	//====================================================
 
	//Seta os Headers (Alerar somente caso necessario)
	//====================================================
	$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
	//====================================================
 
 
	//Enviando o email
	//====================================================
	if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo.$email_conteudo_link), $email_headers)){
		//echo "</b>E-Mail enviado com sucesso!</b>"; 
	}
  	else{
		echo "</b>Falha no envio do E-Mail!</b>";
	}
	//====================================================

?>