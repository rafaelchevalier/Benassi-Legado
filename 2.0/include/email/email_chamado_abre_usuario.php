<?php
require "config_email.php";
 $data_atual = date("d/m/Y");
	//REMETENTE --> ESTE EMAIL TEM QUE SER VALIDO DO DOMINIO
 	//====================================================
	$email_remetente = $email_envio; // deve ser um email do dominio
	//====================================================
 	
if ($tipo_email == "abre_chamado"){
		//Variaveis de POST, Alterar somente se necessário
	//====================================================

	$nome = $_POST['nome'];
	$categoria = $_POST['categoria'];
	$descricao = $_POST['descricao'];	
	//====================================================
 	$sql_filtro = mysql_query("SELECT * FROM login WHERE id='$nome'  ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	$email_usuario = $linha_filtro['email'];
	$nome_usuario = $linha_filtro['nome'];
	}
	
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = $email_usuario.";pedro@benassirj.com.br;rafael@benassirj.com.br;robson@benassirj.com.br"; // qualquer email pode receber os dados
	$email_reply = ""; 
	$email_assunto = "Novo Chamado Aberto ".$data_atual. " Enviado por: ".$nome_usuario;// assunto do email
	//====================================================
			//Monta o Corpo da Mensagem
	//====================================================
			$email_conteudo =	"SEU CHAMADO FOI ABERTO COM SUCESSO! NOSSA EQUIPE RETORNARÁ ASSIM QUE POSSÍVEL. \n";
			$email_conteudo .=	" \n"; 
			$email_conteudo .=	"Nome = $nome_usuario \n"; 
			$email_conteudo .= 	"Categoria Erro = $categoria\n"; 
			$email_conteudo .=  "Descrição do erro:\n $descricao \n";
			$email_conteudo_link = "<a href=\"http://rasp.net.br/benassi/chamado.php?pg=chamado_aberto\">Clique aqui e acesso todos Chamados pendentes</a> ";

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
}
//====================================================================================================================
													//Fim Novo chamado  
//====================================================================================================================
if($tipo_email == "altera_status"){
	//Variaveis de POST, Alterar somente se necessário
	//====================================================
	//Dados dos usuários que abriu o chamado
	
	//dados do técnico
	$nome_tecnico = $_POST['nome_tecnico']; // Nome do técnico que slterou o chamado
	
	//dados do chamado
	$solucao = $_POST['solucao'];
	$num_chamado = $_POST['num_chamado'];// Numero chamado é o id na tabela chamado.
	$categoria = $_POST['categoria']; // Categoria do erro
	$detalhe_erro = $_POST['detalhe_erro'];	//Problema relatado
	$detalhe = $_POST['detalhe']; //Solução realizada
	//====================================================
	//Puxa do banco de dados chamado os dados do chamado
	$sql_filtro = mysql_query("SELECT * FROM chamado WHERE id='$num_chamado' LIMIT 1  ");
	$cont_filtro = mysql_num_rows($sql_filtro);
	while($linha_filtro = mysql_fetch_array($sql_filtro)){ 
	$email_usuario = $linha_filtro['email'];
	$nome_usuario = $linha_filtro['nome_usuario'];
	}
	
	//Configurações do email, ajustar conforme necessidade
	//====================================================
	$email_destinatario = $email_usuario.";pedro@benassirj.com.br;rafael@benassirj.com.br;robson@benassirj.com.br"; //Email do usuário e do técnico que fechou o chamado que sera enviado
	$email_reply = ""; 
	$email_assunto = "ALTERAÇÃO STATUS CHAMADO	".$num_chamado;// assunto do email
	//====================================================
			//Monta o Corpo da Mensagem
	//====================================================
		$email_conteudo =	"STATUS DE SEU CHAMADO NUM	[". $num_chamado."] FOI ALTERADO PARA	[".$solucao."] \n";
		$email_conteudo .=	"CHAMADO ABERTO POR:	 ".$nome_usuario."\n";
		$email_conteudo .=	"DETALHE CHAMADO:	 ".$detalhe_erro."\n";
		$email_conteudo .=	"NOVO STATUS:	".$solucao."\n";
		$email_conteudo .=	" ALTERADO POR:	".$nome_tecnico."\n";  
		$email_conteudo .= 	"SOLUÇÃO DO TÉCNICO:\n".$detalhe."\n"; 
		$email_conteudo_link = "<a href=\"http://rasp.net.br/benassi/chamado.php?pg=chamado_aberto\">Clique aqui e acesso todos Chamados pendentes</a> ";
	

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
}

//====================================================================================================================
													//FIM ALTERA STATUS CHAMADO
//====================================================================================================================
?>

