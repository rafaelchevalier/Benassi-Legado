<?php

 $data_atual = date("d/m/Y");
	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 	//====================================================
	$email_remetente = "rafael.chevalier@benassirio.com.br"; // deve ser um email do dominio
	//====================================================
 
 
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = "rafael.chevalier@benassirio.com.br"; // qualquer email pode receber os dados
	$email_reply = "$email"; 
	$email_assunto = "Pedido de compra ".$data_atual;// assunto do email
	//====================================================
 
 
	//Variaveis de POST, Alterar somente se necessário
	//====================================================
	
	$solicitante = $_POST['solicitante'];
	$prioridade = $_POST['prioridade'];
    
	//====================================================
 
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo =	"Nome = $solicitante \n"; 
	$email_conteudo .= 	"Prioridade = $prioridade \n"; 
	$email_conteudo .=  "Setor = $setor \n";
	$email_conteudo .=  "Descri&ccedil;&atilde;o Pedido= $descricao_pedido \n\n";
	$email_conteudo_link .= "<a href=\"http://ti.benassirio.com.br/pedidodecompra.php?pg=pendente\">Clique aqui e acesso todos pedidos pendentes</a> ";
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