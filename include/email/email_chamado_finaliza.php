<?php
require "config_email.php";
 $data_atual = date("d/m/Y");
	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 	//====================================================
	$email_remetente = $email_envio; // deve ser um email do dominio
	//====================================================
 	
		//Variaveis de POST, Alterar somente se necessário
	//====================================================
	
	$nome = $_POST['nome'];
	$detalhe = $_POST['detalhe'];
	$solucao = $_POST['solucao'];
	
	//====================================================
 
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = "ti@benassirio.com.br"; // qualquer email pode receber os dados
	$email_reply = "rafaelchevalier@gmail.com"; 
	$email_assunto = "Chamado Finalizado dia: ".$data_atual. " por: ".$nome. " Situação: ". $solucao;// assunto do email
	//====================================================
 
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo =	"Nome = $nome \n"; 
	$email_conteudo .= 	"Situação = $solucao\n"; 
	$email_conteudo .=  "Descrição da solução:\n $detalhe \n";
	$email_conteudo_link .= "<a href=\"http://ti.benassirio.com.br/chamado.php?pg=chamado_fechado\">Clique aqui e acesso todos Chamados Fechados</a> ";
 	//====================================================
 
	//Seta os Headers (Alerar somente caso necessario)
	//====================================================
	$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
	//====================================================
 
 
	//Enviando o email
	//====================================================
	if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo.$email_conteudo_link), $email_headers)){
		echo "</b>E-Mail enviado com sucesso!</b>"; 
	}
  	else{
		echo "</b>Falha no envio do E-Mail!</b>";
	}
	//====================================================

?>