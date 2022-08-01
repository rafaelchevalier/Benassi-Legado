<?php
//if (isset($_POST['btcadastrar2'])){
/* Para reativar envio de email de caixa plástica remover a linha toda.
	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 	//====================================================
	$email_remetente = "benassi@rasp.net.br"; // deve ser um email do dominio
	//====================================================
 
 
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = "marco.antonio@oliveiraesimoes.com.br;rafael@benassirj.com.br;caixaplastica@benassirj.com.br;mota.logistica@oliveiraesimoes.com.br"; // qualquer email pode receber os dados
	$email_reply = ""; 
	$email_assunto = "Contagem caixas plásticas";// assunto do email
	//====================================================
 
 
	//Variaveis de POST, Alterar somente se necessário
	//====================================================
	$nome = $_POST['funcionario'];
	$recebida = $_POST['recebida'];
	switch($_POST['quantidade']){
		case "":
			$quantidade = "0";
		break;
		default:
			$quantidade = $_POST['quantidade'];
		break;
	}
	
	$baixa = $_POST['baixa'];
 	$placa = strtoupper($_POST['placa']);
	$nota_devolucao = $_POST['nota_devolucao'];
	$serie_nfe = $_POST['serie_nfe'];
	$mercado = $_POST['mercado'];
	//====================================================
 
	//Monta o Corpo da Mensagem
	//====================================================
	$email_conteudo  =	"Contagem caixas plásticas. \n\n";
	$email_conteudo	.=	"C&oacute;digo Localizador = $cod_contagem \n";
	$email_conteudo .=	"Nome = $mercado \n";
	$email_conteudo .=	"recebida = $recebida \n"; 
	$email_conteudo .= 	"Estoque Loja = $quantidade \n"; 
	$email_conteudo .=  "Caixas Enviads = $baixa \n";
	$email_conteudo .=  "Placa caminh&atilde;o= $placa \n";
	if($nota_devolucao != ""){// Só envia campos abaixo se houver nota de devolução 
	$email_conteudo	.=	"Nota Fiscal de devolu&ccedil;&atilde;o= S&eacute;rie.$serie_nfe  Num.$nota_devolucao \n";	
	}
 	//====================================================
 
	//Seta os Headers (Alerar somente caso necessario)
	//====================================================
	$email_headers = implode ( "\n",array ( "From: $email_remetente", "Reply-To: $email_reply", "Subject: $email_assunto","Return-Path:  $email_remetente","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
	//====================================================
	//Enviando o email
	//====================================================
	 if (mail ($email_destinatario, $email_assunto, nl2br($email_conteudo), $email_headers)){
		//echo "</b>E-Mail enviado com sucesso!</b>"; 
	}
  	else{
		//echo "</b>Falha no envio do E-Mail!</b>";
	} 
	//====================================================
//}	
?>