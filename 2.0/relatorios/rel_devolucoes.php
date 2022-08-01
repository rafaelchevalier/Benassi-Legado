<? //*********************** exibe Relatório fpdf contagem ************************* --> 
require_once('../fpdf/fpdf.php');
require_once ('../include/funcoes_aux.php');
require_once ('../include/conexao.php');
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

$pdf->Cell(28.5,1.5,utf8_decode("Relatório Notas de devoluções emitidas"),0,2,'C',1);
$pdf ->Image('../imagens/logo benassi.png',1.5,1.2,4);
	
//Cabeçalho
	$pdf->SetFillColor(255,222,173);//COD FUNDO CELULA
	$pdf->SetTextColor(1,1,1);//COD TEXTO
	$pdf->SetFont('Arial','B','7');//FORMATAÇÃO TEXTO
	
	//$pdf->Cell(2,0.5,utf8_decode("DATA"),0,0,'C',1);
    $pdf->Cell(4,0.5,utf8_decode("CNPJ"),1,0,'C',1);
    $pdf->Cell(19.5,0.5,utf8_decode("NOME"),1,0,'C',1);
	$pdf->Cell(5,0.5,utf8_decode("VALOR"),1,1,'C',1);

$data_atual = date("d/m/Y");
  
  
//****************  Inicio Filtros **************************

if(!empty($_REQUEST['data1'])){//Data inicial pega de um formulário
	$filt1 = converte_data($_REQUEST['data1']);
}
if(empty($_REQUEST['data1'])){//Data inicial pega a data atual.
	$filt1 = $data_atual;
}
if(!empty($_REQUEST['data2'])){//Data Final pega de um formulário
	$filt2 = converte_data($_REQUEST['data2']);
}
if(empty($_REQUEST['data2'])){//Data Final pega a data atual.
	$filt2 = $data_atual;
}

$filt1 = "2016-01-01";
$filt2 = "2016-01-18";



$sql = mysql_query("SELECT DISTINCT cnpj_cpf FROM nota_fiscal_destinada 
	ORDER BY nome 
	");
	
while($linha_filtro = mysql_fetch_array($sql)){
	$valor = 0;
	$cnpj_filtro = $linha_filtro['cnpj_cpf'];

	$sql2 = mysql_query("SELECT * FROM nota_fiscal_destinada
		WHERE data_emissao BETWEEN ('$filt1') and ('$filt2')
		AND operacao 		= 'M'
		AND tipo_operacao 	= '1'
		AND cnpj_cpf = '$cnpj_filtro' 
		LIMIT 1000"
		);

	// Fim teste 
	$cont = mysql_num_rows($sql2);
//****************  Fim Filtros **************************
	while($linha = mysql_fetch_array($sql2)){
		$cnpj  = $linha['cnpj_cpf'];
		$nome  = $linha['nome'];
		$valor = $valor + $linha['valor_total'];
	}
	if (busca_cliente($linha['cnpj']) == true){
			$cont_linha ++;
			if($cont_linha%2 == 0){
				$pdf->SetFillColor(255,250,250);//COD FUNDO CELULA
				$pdf->SetTextColor(0,0,0);//COD TEXTO
				$pdf->SetFont('Arial','','7');//FORMATAÇÃO TEXTO
			}
			if($cont_linha%2 != 0){
				$pdf->SetFillColor(200,200,200);//COD FUNDO CELULA
				$pdf->SetTextColor(0,0,0);//COD TEXTO
				$pdf->SetFont('Arial','','7');//FORMATAÇÃO TEXTO
			}
			//$pdf->Cell(2,0.3,converte_data($linha['data_emissao']),0,0,'C',1);
			$pdf->Cell(4,0.4,utf8_decode($cnpj),1,0,'C',1);
			$pdf->Cell(19.5,0.4,utf8_decode($nome),1,0,'L',1);
			$pdf->Cell(5,0.4,"R$".number_format($valor, 2, '.', ''),1,1,'L',1);
			
			$valor_total_rel = $valor_total_rel + $valor;
			$total ++;
		}
}


//Rodapé Relatório
$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
$pdf->SetTextColor(255,250,250);//COD TEXTO
$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO 

//$pdf->Cell(1.5,0.5,utf8_decode("Total Notas :".$total),0,0,'C',1);	
$pdf->Cell(23.5,0.5,utf8_decode("Total Notas :".$total),0,0,'C',1);	
$pdf->Cell(5,0.5,utf8_decode("Valor Total : R$". number_format($valor_total_rel, 2, '.', '')),0,1,'C',1);	

$pdf->Close();
$pdf->Output('rel_notas_devolucoes.pdf','D');

//********************************************************************************************************************
//											Inicio Módulo Envio de E-mail
//********************************************************************************************************************
/*

// email stuff (change data below)
$to = "rafael@benassirj.com.br"; //
$from = "benassi@rasp.net.br"; 
$subject = utf8_decode("Relatorio de Devoluções : ").$data_atual; 
//$message = utf8_decode("<p>Carrinhos de Flores que ainda não retornaram</p>");
$message .= $data_atual;

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "Relatorio Período ".$data_atual.".pdf";

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

*/
?>