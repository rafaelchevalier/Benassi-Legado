<?

// *********************** RELATÓRIO DIÁRIO DE OCORRÊNCIAS CAIXAS PLÁSTICAS ************************* --> 
 //*********************** exibe Relatório fpdf contagem ************************* --> 
require('fpdf/fpdf.php');
$pdf=new FPDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetTextColor(107,142,35);//Cor texto duperior
$pdf->SetFont('Arial','B','15');//Formatação texto topo
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
	$pdf->Cell(28.5,1,"Relatório Ocorrência de Caixas Plásticas",1,2,'C');
	$pdf->SetFont('Arial','','9');
	$pdf->SetTextColor(0,0,0);
    $pdf->Cell(5,1,utf8_decode("DATA"),0,0,'C');
    $pdf->Cell(6,1,utf8_decode("MERCADO"),0,0,'C');
	$pdf->Cell(17,1,"OCORRÊNCIA",0,1,'L');
	$pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');

 

$data_atual = date("d/m/Y");
  require"include/conexao.php";
  
//****************  Inicio Filtros **************************

$filt1 = converte_data($data_atual);//Pega a data inicial para o filtro
$filt2 = converte_data($data_atual);//Pega a data Final para o filtro
 		
		   $sql = mysql_query("SELECT * FROM ocorrencia_caixas WHERE data_ocorrencia BETWEEN ('$filt1') AND ('$filt2') ORDER by data_ocorrencia ");
		   
			
//****************  Fim Filtros **************************	
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$data_ocorrencia = $linha['data_ocorrencia'];
	$ocorrencia = $linha['descricao'];
	$id_mercado = $linha['id_mercado'];

$sql_mercado = mysql_query("SELECT id,cod,filial,nome_fantasia FROM mercado WHERE id='$id_mercado' limit 1 ");
while($linha_mercado = mysql_fetch_array($sql_mercado)){
	$mercado = $linha_mercado['nome_fantasia'];
}
	
	$pdf->Cell(5,1,converte_data($data_ocorrencia),0,0,'C');
    $pdf->Cell(6,1,utf8_encode($mercado),0,0,'C');
	$pdf->Cell(17,1,$ocorrencia,0,1,'L');
	
	
    $total_loja ++;
	 
	 }//fecha while($linha = mysql_fetch_array($sql))
	 $pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');	   

   	 $pdf->Cell(8,0.5,utf8_decode("Total OcorrÃªncia"),0,0,'L'); 
	 $pdf->Cell(20,0.5,$total_loja,0,1,'L'); 
	 $pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');

$pdf->Close();
$pdf->Output('rel_ocorrencias_caixa_plastica.pdf','D');

//********************************************************************************************************************
//											Inicio Módulo Envio de E-mail
//********************************************************************************************************************


// email stuff (change data below)
$to = "belmiro@benassirj.com.br;marco.antonio@oliveiraesimoes.com.br;rafael@benassirj.com.br;caixaplastica@benassirj.com.br;pedro@benassirj.com.br"; //
$from = "benassi@rasp.net.br"; 
$subject = "Relatorio Diario caixa Plastica: ".$data_atual."  -  ".$data_atual; 
$message = "<p>Periodo do Relatorio</p>";
$message .= $data_atual."  -  ".$data_atual;

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "Relatorio Ocorrências Caixas Plástica Diario ".$data_atual."   ".$data_atual.".pdf";

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

 ?>
<!-- *********************** fim Relatório fpdf contagem ************************* --> 