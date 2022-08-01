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
	switch($prioridade){
	case 1:
	$prioridade = "BAIXA";
	break;
	case 2:
	$prioridade = "M&Eacute;DIA";
	break;
	case 3:
	$prioridade = "ALTA";
	break;
	}
	$setor = $_POST['setor'];
 	$descricao_pedido = strtoupper($_POST['descricao_pedido']);
	//$nota_devolucao = $_POST['nota_devolucao'];
	//$serie_nfe = $_POST['serie_nfe'];
	 $quantidade_pedido1 = $_POST['quantidade1'];
	 $produto_pedido1 = $_POST['produto1'];
	 $motivo_pedido1 = $_POST['motivo1'];
	 
	 $quantidade_pedido2 = $_POST['quantidade2'];
	 $produto_pedido2 = $_POST['produto2'];
	 $motivo_pedido2 = $_POST['motivo2'];
	 
	 $quantidade_pedido3 = $_POST['quantidade3'];
	 $produto_pedido3 = $_POST['produto3'];
	 $motivo_pedido3 = $_POST['motivo3'];
	 
	 $quantidade_pedido4 = $_POST['quantidade4'];
	 $produto_pedido4 = $_POST['produto4'];
	 $motivo_pedido4 = $_POST['motivo4'];
	 
	 $quantidade_pedido5 = $_POST['quantidade5'];
	 $produto_pedido5 = $_POST['produto5'];
	 $motivo_pedido5 = $_POST['motivo5'];
	 
	 $quantidade_pedido6 = $_POST['quantidade6'];
	 $produto_pedido6 = $_POST['produto6'];
	 $motivo_pedido6 = $_POST['motivo6'];
	 
	 $quantidade_pedido7 = $_POST['quantidade7'];
	 $produto_pedido7 = $_POST['produto7'];
	 $motivo_pedido7 = $_POST['motivo7'];
	 
	 $quantidade_pedido8 = $_POST['quantidade8'];
	 $produto_pedido8 = $_POST['produto8'];
	 $motivo_pedido8 = $_POST['motivo8'];
	 
	 $quantidade_pedido9 = $_POST['quantidade9'];
	 $produto_pedido9 = $_POST['produto9'];
	 $motivo_pedido9 = $_POST['motivo9'];
	 
	 $quantidade_pedido10 = $_POST['quantidade10'];
	 $produto_pedido10 = $_POST['produto10'];
	 $motivo_pedido10 = $_POST['motivo10'];
    
	//====================================================
 
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo =	"Nome = $solicitante \n"; 
	$email_conteudo .= 	"Prioridade = $prioridade \n"; 
	$email_conteudo .=  "Setor = $setor \n";
	$email_conteudo .=  "Descri&ccedil;&atilde;o Pedido= $descricao_pedido \n\n";
	if ($quantidade_pedido1 != "" and $produto_pedido1 != "" and $motivo_pedido1 != ""){
	$email_conteudo .=  " 1	- QUANTIDADE = [$quantidade_pedido1] \n PRODUTO = [$produto_pedido1] \n MOTIVO = [$motivo_pedido1] \n\n";	
	}
	if ($quantidade_pedido2 != "" and $produto_pedido2 != "" and $motivo_pedido2 != ""){
	$email_conteudo .=  " 2	- QUANTIDADE = [$quantidade_pedido2] \n PRODUTO = [$produto_pedido2] \n MOTIVO = [$motivo_pedido2] \n\n";	
	}
	if ($quantidade_pedido3 != "" and $produto_pedido3 != "" and $motivo_pedido3 != ""){
	$email_conteudo .=  " 3	- QUANTIDADE = [$quantidade_pedido3] \n PRODUTO = [$produto_pedido3] \n MOTIVO = [$motivo_pedido3] \n\n";	
	}
	if ($quantidade_pedido4 != "" and $produto_pedido4 != "" and $motivo_pedido4 != ""){
	$email_conteudo .=  " 4	- QUANTIDADE = [$quantidade_pedido4] \n PRODUTO = [$produto_pedido4] \n MOTIVO = [$motivo_pedido4] \n\n";	
	}
	if ($quantidade_pedido5 != "" and $produto_pedido5 != "" and $motivo_pedido5 != ""){
	$email_conteudo .=  " 5	- QUANTIDADE = [$quantidade_pedido5] \n PRODUTO = [$produto_pedido5] \n MOTIVO = [$motivo_pedido5] \n\n";	
	}
	if ($quantidade_pedido6 != "" and $produto_pedido6 != "" and $motivo_pedido6 != ""){
	$email_conteudo .=  " 6	- QUANTIDADE = [$quantidade_pedido6] \n PRODUTO = [$produto_pedido6] \n MOTIVO = [$motivo_pedido6] \n\n";	
	}
	if ($quantidade_pedido7 != "" and $produto_pedido7 != "" and $motivo_pedido7 != ""){
	$email_conteudo .=  " 7	- QUANTIDADE = [$quantidade_pedido7] \n PRODUTO = [$produto_pedido7] \n MOTIVO = [$motivo_pedido7] \n\n";	
	}
	if ($quantidade_pedido8 != "" and $produto_pedido8 != "" and $motivo_pedido8 != ""){
	$email_conteudo .=  " 8	- QUANTIDADE = [$quantidade_pedido8] \n PRODUTO = [$produto_pedido8] \n MOTIVO = [$motivo_pedido8] \n\n";	
	}
	if ($quantidade_pedido9 != "" and $produto_pedido9 != "" and $motivo_pedido9 != ""){
	$email_conteudo .=  " 9	- QUANTIDADE = [$quantidade_pedido9] \n PRODUTO = [$produto_pedido9] \n MOTIVO = [$motivo_pedido9] \n\n";	
	}
	if ($quantidade_pedido10 != "" and $produto_pedido10 != "" and $motivo_pedido10 != ""){
	$email_conteudo .=  " 10	- QUANTIDADE = [$quantidade_pedido0] \n PRODUTO = [$produto_pedido10] \n MOTIVO = [$motivo_pedido10] \n\n";	
	}
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