<? //*********************** exibe Relatório fpdf  ************************* --> 
//Inclusão de modulos externos
require('fpdf/fpdf.php');
require"include/conexao.php";
require'include/funcoes.php';
//Outras configurações
$nome_usuario_logado = $_SESSION['nome_usuario'];
$id_usuario_logado = $_SESSION['id_usuario'];
$pagina_atual = "mix_prod.php";
$id_tab_cab = $_GET['id'];

$loja = busca_nome_mercado($_SESSION['mercado_id']);


//Dados Externos Necessários
$id_quebra_cab = $_GET['id'];


$pdf=new FPDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();
$pdf->SetTextColor(107,142,35);//Cor texto duperior
$pdf->SetFont('Arial','B','12');//Formatação texto topo

$sql_cab = mysql_query("SELECT * FROM tab_quebra_cab  
							WHERE id='$id_quebra_cab'
							LIMIT  1");
	while($linha = mysql_fetch_array($sql_cab)){
	
	$pdf->Cell(28.5,1,utf8_decode("Relatório Quebra ".$loja),1,2,'C');
	
	$pdf->SetTextColor(0,0,0);

	
	$pdf->Cell(28.5,0.5,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');
 	$pdf->Cell(28.5,0.5,utf8_decode("data: ".converte_data($linha['data_cad'])),0,1,'L');	
	$pdf->Cell(28.5,0.5,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');
	
}//fecha While Cabeçalho
$data_atual = date("d/m/Y");
 
	$pdf->Cell(5,0.5,"COD",0,0,'C');
	$pdf->Cell(18,0.5,utf8_decode("DESCRIÇÃO PRODUTO"),0,0,'L');
	$pdf->Cell(5,0.5,"QUEBRA EM KG",0,1,'C');
	$pdf->Cell(28.5,0.5,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');
	
	
	$qt=0;
	$sql_prod = mysql_query("SELECT * FROM tab_quebra_prod  
							WHERE id_cab ='$id_quebra_cab'
							ORDER BY descricao_prod");
	while($linha_prod = mysql_fetch_array($sql_prod)){ 
	$qt ++;

$pdf->SetFont('Arial','','9');//fonte relatório	
$pdf->SetTextColor(0,0,0);
	$pdf->Cell(5,0.5,$linha_prod['cod_prod'],0,0,'C');
	$pdf->Cell(18,0.5,utf8_encode($linha_prod['descricao_prod']),0,0,'L');
	$pdf->Cell(5,0.5,$linha_prod['quebra'],0,1,'C');
$pdf->SetTextColor(220,220,220);
	$pdf->Cell(28.5,0.5,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');
	
}//fecha while($linha = mysql_fetch_array($sql))
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B','12');//fonte Somatório total	
		
$pdf->Close();
$pdf->Output('quebra.pdf','D');

//********************************************************************************************************************
//											Inicio Módulo Envio de E-mail
//********************************************************************************************************************

/*
// configuração dos endereços de email que receberão o relatório
$to = "rafael@rasp.net.br;belmiro@macaverdesupermercados.com.br"; //
$from = "contato@macaverdesupermercados.com.br"; 
$subject = utf8_decode("Relatório automático Vendas Maça Verde"); 
$message = "<p>Período do Relatório</p>";
$message .= utf8_decode("Relatório Vendas Maça Verde");

// a random hash will be necessary to send mixed content
$separator = md5(time());

// carriage return type (we use a PHP end of line constant)
$eol = PHP_EOL;

// attachment name
$filename = "RelatorioDiario.pdf";

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
*/