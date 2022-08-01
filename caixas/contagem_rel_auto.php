<? //*********************** exibe Relatório fpdf contagem ************************* --> 
require('fpdf/fpdf.php');
$pdf=new FPDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();

//Função converter data
function converte_data($data){
if (strstr($data, "/")){
$A = explode ("/", $data);
$V_data = $A[2] . "-". $A[1] . "-" . $A[0];
}
else{
$A = explode ("-", $data);
$V_data = $A[2] . "/". $A[1] . "/" . $A[0];	
}
return $V_data;
}

// Cabeçalho
$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
$pdf->SetTextColor(255,250,250);//COD TEXTO
$pdf->SetFont('Arial','B','12');//FORMATAÇÃO TEXTO

$pdf->Cell(28.5,1.5,utf8_decode("Relatório Caixas plásticas"),0,2,'C',1);
$pdf ->Image('img/logo.png',1.5,1.2,4);
	
//Cabeçalho
	$pdf->SetFillColor(255,222,173);//COD FUNDO CELULA
	$pdf->SetTextColor(1,1,1);//COD TEXTO
	$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO
	
	if($_SESSION['nivel_usuario_caixa'] < 2){ 
		$pdf->Cell(1,0.5,"COD",0,0,'L',1);
	}
	$pdf->Cell(2,0.5,utf8_decode("DATA"),0,0,'C',1);
    $pdf->Cell(2,0.5,utf8_decode("HORA"),0,0,'C',1);
    $pdf->Cell(6.5,0.5,utf8_decode("MERCADO"),0,0,'C',1);
	$pdf->Cell(2,0.5,utf8_decode("RECEBIDA"),0,0,'C',1);
    $pdf->Cell(2,0.5,utf8_decode("ESTOQUE"),0,0,'C',1);
    $pdf->Cell(2,0.5,utf8_decode("SAÍDA"),0,0,'C',1);
    $pdf->Cell(6,0.5,utf8_decode("FUNCIONÁRIO"),0,0,'C',1);
	$pdf->Cell(2,0.5,utf8_decode("CAMINHÃO"),0,0,'C',1);
	$pdf->Cell(3,0.5,utf8_decode("DEVOLUCAO"),0,1,'C',1);

$data_atual = date("d/m/Y");
  require"include/conexao.php";
  
//****************  Inicio Filtros **************************
$filt1 = converte_data($data_atual);//Pega a data inicial para o filtro
$filt2 = converte_data($data_atual);//Pega a data Final para o filtro
$filt3 = $_POST['pesq_nome'];//Pega o nome do funcionário para o filtro
$filt4 = $_POST['pesq_mercado'];//Pega o texto digitado para o filtro do mercado
$filt5 = $_POST['pesq_devolucao'];//Pega o valor do campo devolução para o filtro 
$filt6 = $_POST['cod_contagem'];//Pega o valor do campo cod_contagem para o filtro
 	if($filt1 != "" & $filt2 != "" & $filt3 == "" & $filt4 == "" ){//Filtro domente entre datas
		$sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cadastro ");
		$sql2 = mysql_query("SELECT * FROM contagem_saida WHERE data_cad BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cad ");
	}
	if($filt1 != "" & $filt2 != "" &  $filt3 != "" & $filt4 == "" ){//Filtro entre data e nome do funcionario cadastrado
		$sql = mysql_query("SELECT * FROM contagem WHERE funcionario LIKE ('$filt3') ORDER by data_cadastro ");
	}
	if($filt1 != "" & $filt2 != "" & $filt3 == "" & $filt4 != ""){//Filtro entre data e mercado com a palavra digitado
		$sql = mysql_query("SELECT * FROM contagem WHERE mercado LIKE '%".$filt4."%' AND data_cadastro BETWEEN ('$filt1') AND ('$filt2') ORDER by data_cadastro ");
	}
	if($filt1 != "" & $filt2 != "" & $filt5 == "1"){//Filtro Entre datas e Somente com devoluções
		$sql = mysql_query("SELECT * FROM contagem WHERE data_cadastro BETWEEN ('$filt1') AND ('$filt2') AND devolucao LIKE '%".$filt5."%' ORDER by data_cadastro ");
	}
	if($filt1 != "" & $filt2 != "" & $filt5 == "1" & $filt3 != ""){// Filtro entre datas e se houve devolução somente de  1 funcionario
		$sql = mysql_query("SELECT * FROM contagem WHERE devolucao LIKE '%".$filt5."%' AND funcionario LIKE '%".$filt3."%' ORDER by data_cadastro ");
	}
	if($filt1 != "" & $filt2 != "" & $filt5 == "1" & $filt4 != ""){// Filtro entre datas e se houve devolução somente de  1 Mercado
		$sql = mysql_query("SELECT * FROM contagem WHERE devolucao LIKE '%".$filt5."%' AND mercado LIKE '%".$filt4."%' ORDER by data_cadastro ");
	}
	if($filt6 != ""){
		$sql = mysql_query("SELECT * FROM contagem WHERE cod_contagem LIKE ('$filt6')");
	}
//****************  Fim Filtros **************************	
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$cont_linha ++;
	$id = $linha['id'];
	$cod_mercado = $linha['cod_mercado'];
	$mercado = $linha['mercado'];
	$cod_funcionario = $linha['cod_funcionario'];
	$funcionario = $linha['funcionario'];
	$data_contagem = $linha['data_contagem'];
	$hora_cad = $linha['hora_cad'];
	$data_cadastro = $linha['data_cadastro'];
	$quantidade = $linha['quantidade'];
	$baixa = $linha['baixa'];
	$placa = $linha['placa'];
	$devolucao = $linha['devolucao'];
	$nota_devolucao = $linha['nota_devolucao'];
	$serie_nfe = $linha['serie_nfe'];
	$cod_contagem = $linha['cod_contagem'];
	$total_loja == "0";
	$total_estoque == "0";
	$total_enviadas == "0";	
	
if($cont_linha%2 == 0){
	$pdf->SetFillColor(255,250,250);//COD FUNDO CELULA
	$pdf->SetTextColor(0,0,0);//COD TEXTO
	$pdf->SetFont('Arial','','8');//FORMATAÇÃO TEXTO
}
if($cont_linha%2 != 0){
	$pdf->SetFillColor(200,200,200);//COD FUNDO CELULA
	$pdf->SetTextColor(0,0,0);//COD TEXTO
	$pdf->SetFont('Arial','','8');//FORMATAÇÃO TEXTO
}
	
if ($devolucao == "0")$devolucao = "Não";
	else $devolucao = "Sim";
	
	if($cod_contagem != "" AND $_SESSION['nivel_usuario_caixa'] < 2){
		$pdf->Cell(1,0.5,$cod_contagem,0,0,'C',1);
	} 
	$pdf->Cell(2,0.5,converte_data($data_contagem),0,0,'C',1);
	$pdf->Cell(2,0.5,$hora_cad,0,0,'C',1);
	$pdf->Cell(6.5,0.5,utf8_decode($mercado),0,0,'L',1);
	$pdf->Cell(2,0.5,$linha['recebida'],0,0,'C',1);
	$pdf->Cell(2,0.5,$quantidade,0,0,'C',1);
	$pdf->Cell(2,0.5,$baixa,0,0,'C',1);
	$pdf->Cell(6,0.5,utf8_decode($funcionario),0,0,'L',1);
	$pdf->Cell(2,0.5,$placa,0,0,'L',1);
	if ($nota_devolucao != ""){
		$pdf->Cell(3,0.5,$serie_nfe." - ".$nota_devolucao,0,1,'L',1);
	}
	else {
		$pdf->Cell(3,0.5,utf8_decode($devolucao),0,1,'C',1);
	}
	$total_loja ++;
	$total_recebidas = $total_recebidas + $linha['recebida'];	
	$total_estoque = $total_estoque +  $quantidade;
	$total_enviadas = $total_enviadas + $baixa;

}//fecha while($linha = mysql_fetch_array($sql))

//Rodapé Relatório
$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
$pdf->SetTextColor(255,250,250);//COD TEXTO
$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO 

$pdf->Cell(5,0.5,"",0,0,'L',1); 
$pdf->Cell(6.5,0.5,"Total lojas Filtradas: ".$total_loja,0,0,'C',1); 
$pdf->Cell(2,0.5,$total_recebidas,0,0,'C',1);
$pdf->Cell(2,0.5,$total_enviadas,0,0,'C',1);
$pdf->Cell(2,0.5,$total_estoque,0,0,'C',1);
$pdf->Cell(11,0.5," ",0,1,'C',1);

$pdf->Close();
$pdf->Output('rel_caixa_plastica.pdf','D');

//********************************************************************************************************************
//											Inicio Módulo Envio de E-mail
//********************************************************************************************************************


// email stuff (change data below)
$to = "belmiro@benassirj.com.br;marco.antonio@oliveiraesimoes.com.br;rafael@benassirj.com.br;caixaplastica@benassirj.com.br;pedro@benassirj.com.br;mota.logistica@oliveiraesimoes.com.br"; //
$from = "benassi@rasp.net.br"; 
$subject = "Relatorio Diario caixa Plastica: ".$data_atual."  -  ".$data_atual; 
$message = "<p>Periodo do Relatorio</p>";
$message .= $data_atual."  -  ".$data_atual;

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "Relatorio Período ".$data_atual."   ".$data_atual.".pdf";

// encode data (puts attachment in proper format)
$pdfdoc = $pdf->Output("", "S");
$attachment = chunk_split(base64_encode($pdfdoc));

// main header
$headers  = "From: ".$from.$eol;
$headers .= "MIME-Version: 1.0".$eol; 
$headers .= "Content-Type: multipart/mixed; boundary=\"".$separator."\"";

// no more headers after this, we start the body! //

$body = "--".$separator.$eol;
$body .= "Content-Transfer-Encoding: 7bit".$eol.$eol;
$body .= "".$eol;

// message
$body .= "--".$separator.$eol;
$body .= "Content-Type: text/html; charset=\"iso-8859-1\"".$eol;
$body .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
$body .= $message.$eol;

// attachment
$body .= "--".$separator.$eol;
$body .= "Content-Type: application/octet-stream; name=\"".$filename."\"".$eol; 
$body .= "Content-Transfer-Encoding: base64".$eol;
$body .= "Content-Disposition: attachment".$eol.$eol;
$body .= $attachment.$eol;
$body .= "--".$separator."--";

// send message
mail($to, $subject, $body, $headers);


// *********************** fim Relatório fpdf contagem ************************* --> 


//******************************************************************************************************************************************************
//******************************************************************************************************************************************************
//******************************************************************************************************************************************************


?>