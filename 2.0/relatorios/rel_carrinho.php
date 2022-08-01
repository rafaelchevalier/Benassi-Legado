<? //*********************** exibe Relatório fpdf contagem ************************* --> 
require_once('../fpdf/fpdf.php');
require_once ('../include/funcoes.php');
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

$pdf->Cell(28.5,1.5,utf8_decode("Relatório Carrinhos de Flores Pendentes"),0,2,'C',1);
$pdf ->Image('../imagens/logo benassi.png',1.5,1.2,4);
	
//Cabeçalho
	$pdf->SetFillColor(255,222,173);//COD FUNDO CELULA
	$pdf->SetTextColor(1,1,1);//COD TEXTO
	$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO
	
	$pdf->Cell(3,0.5,utf8_decode("DATA"),0,0,'C',1);
    $pdf->Cell(3,0.5,utf8_decode("HORA"),0,0,'C',1);
    $pdf->Cell(3,0.5,utf8_decode("OIPERAÇÃO"),0,0,'C',1);
	$pdf->Cell(2.5,0.5,utf8_decode("TEMPO FORA"),0,0,'C',1);
    $pdf->Cell(6,0.5,utf8_decode("ORIGEM"),0,0,'C',1);
	$pdf->Cell(6,0.5,utf8_decode("DESTINO"),0,0,'C',1);
    $pdf->Cell(3,0.5,utf8_decode("NUM SÉRIE"),0,0,'C',1);
	$pdf->Cell(2,0.5,utf8_decode("COMP."),0,1,'C',1);

$data_atual = date("d/m/Y");
  
  
//****************  Inicio Filtros **************************
if(!empty($_REQUEST['data1'])){
	$filt1 = converte_data($_REQUEST['data1']);
}
if(empty($_REQUEST['data1'])){
	$filt1 = $data_atual;
}
if(!empty($_REQUEST['data2'])){
	$filt2 = converte_data($_REQUEST['data2']);
}
if(empty($_REQUEST['data2'])){
	$filt2 = $data_atual;
}
if(!empty($_REQUEST['num_serie'])){
	$num_serie = "AND num_serie LIKE'%".$_REQUEST['num_serie']."%'";
}
if(empty($_REQUEST['num_serie'])){
	$num_serie = "";
}		
if(!empty($_REQUEST['ativo'])){
	$ativo = "AND ativo ='".$_REQUEST['ativo']."'";
}
if(empty($_REQUEST['ativo'])){
	$ativo = "";
}	
if(!empty($_REQUEST['tipo_mov'])){
	$tipo_mov = "AND tipo_mov ='".$_REQUEST['tipo_mov']."'";
}
if(empty($_REQUEST['tipo_mov'])){
	$tipo_mov = "AND tipo_mov ='SAIDA'";
}		
	$situacao = "AND situacao = '1'";
	

$sql = mysql_query("SELECT * FROM mov_carrinho
	WHERE ativo = '1'
	$num_serie	
	$ativo	
	$tipo_mov
	$situacao	
	ORDER BY data_saida DESC  "
);
	// Fim teste 

$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************
while($linha = mysql_fetch_array($sql)){
	$cont_linha ++;
	$id = $linha['id'];
	$dif = dif_data(converte_data($data_atual),$linha['data_saida']);
		
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
		$pdf->Cell(3,0.5, converte_data($linha['data_saida']),0,0,'C',1);
		$pdf->Cell(3,0.5, $linha['hora_saida'],0,0,'C',1);
		$pdf->Cell(3,0.5, utf8_encode($linha['tipo_mov']),0,0,'C',1);
		$pdf->Cell(2.5,0.5, $dif." Dias",0,0,'C',1);
		$pdf->Cell(6,0.5, utf8_encode($linha['origem']),0,0,'C',1);
		$pdf->Cell(6,0.5,utf8_encode($linha['destino']),0,0,'C',1);
		$pdf->Cell(3,0.5, utf8_encode($linha['num_serie']),0,0,'C',1);
		if($linha['comprovante'] != 0) {
			$pdf->Cell(2,0.5, $linha['comprovante'],0,1,'C',1);
		}
		else{
			$pdf->Cell(2,0.5, utf8_decode("NÃO"),0,1,'C',1);
		}
		//Contagem de quantidade de carrinhos em níveis de prioridades.
		
		$total ++;
		if ($dif > -3 and $dif < 1 and $linha['ativo'] == 1){
			$total_verde ++;	
		}
		if ($dif < -3 and $dif > -6  and $linha['ativo'] == 1){
			$total_amarelo ++;
		}
		 if ($dif < -6  and $linha['ativo'] == 1){
			$total_vermelho ++;
		}

}//fecha while($linha = mysql_fetch_array($sql))

//Rodapé Relatório
$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
$pdf->SetTextColor(255,250,250);//COD TEXTO
$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO 


$pdf->Cell(6.5,0.5,"Total: ".$total,0,0,'C',1); 
$pdf->Cell(6,0.5,"De 0 a 3 Dias: ".$total_verde,0,0,'C',1);
$pdf->Cell(6,0.5,"De 4 a 5 dias: ".$total_amarelo,0,0,'C',1);
$pdf->Cell(6,0.5,"Mais de 6 dias: ".$total_vermelho,0,0,'C',1);
$pdf->Cell(4,0.5," ",0,1,'C',1);

$pdf->Close();
$pdf->Output('rel_carrinhos_pendentes.pdf','D');

//********************************************************************************************************************
//											Inicio Módulo Envio de E-mail
//********************************************************************************************************************


// email stuff (change data below)
$to = "rafael@benassirj.com.br;caixaplastica@benassirj.com.br;davison@benassirj.com.br;ricardo@benassirj.com.br"; //
$from = "benassi@rasp.net.br"; 
$subject = utf8_decode("Relatorio Diário de Carrinhos Pendentes: ").$data_atual; 
$message = utf8_decode("<p>Carrinhos de Flores que ainda não retornaram</p>");
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


?>