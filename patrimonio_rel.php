<? //*********************** exibe Relatório fpdf contagem ************************* --> 
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




$data1 = $_REQUEST['data_filtro1'];
 // Cabeçalho
	$pdf->Cell(28.5,1,utf8_decode("RELATÓRIO PATRIMÔNIO"),1,2,'C');
	$pdf->SetFont('Arial','','7');
	$pdf->SetTextColor(0,0,0);

	$pdf->Cell(2,0.5,utf8_decode("PATRIMÔNIO"),0,0,'L');
    $pdf->Cell(4,0.5,utf8_decode("CATEGORIA"),0,0,'C');
    $pdf->Cell(12,0.5,utf8_decode("DESCRIÇÃO"),0,0,'C');
    $pdf->Cell(4,0.5,utf8_decode("LOCAL"),0,0,'C');
    $pdf->Cell(4.8,0.5,utf8_decode("SALA"),0,0,'L');
    $pdf->Cell(2,0.5,utf8_decode("VALOR"),0,1,'L');
	$pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');

 

$data_atual = date("d/m/Y");
  require"include/conexao.php";
  
//****************  Inicio Filtros **************************
$filt_completo = $_POST['filt_completo'];
$filt_categoria = $_POST['filt_categoria'];
$filt_patrimonio = $_POST['filt_patrimonio'];
$filt_fornecedor = $_POST['filt_fornecedor'];
$filt_local = $_POST['filt_local'];
$filt_sala = $_POST['filt_sala'];
$filt_nfe = $_POST['filt_nfe'];
switch ($_POST['opcao_filt']){// Teste qual filtro utiizado
		case '1':
		$sql = mysql_query("SELECT * FROM inventario WHERE num_patrimonio LIKE ('$filt_patrimonio') ");		
		break;
		case '2':
		$sql = mysql_query("SELECT * FROM inventario WHERE categoria LIKE ('$filt_categoria') ");
		break;
		case '3':
		$sql = mysql_query("SELECT * FROM inventario WHERE fornecedor LIKE ('$filt_fornecedor') ");
		break;
		case'4':
		$sql = mysql_query("SELECT * FROM inventario WHERE local LIKE ('$filt_local') ");
		break;
		case'5':
		$sql = mysql_query("SELECT * FROM inventario WHERE sala LIKE ('$filt_sala') ");
		break;
		case'6':
		$sql = mysql_query("SELECT * FROM inventario WHERE nfe LIKE ('$filt_nfe') ");
		break;
		default:
		$sql = mysql_query("SELECT * FROM inventario  WHERE local='BENASSI BARRA' ORDER BY num_patrimonio");
		break;
			
}


$cont = mysql_num_rows($sql);
//****************  Fim Filtros **************************	
$cont = mysql_num_rows($sql);
while($linha = mysql_fetch_array($sql)){
	$id = $linha['id'];
	$categoria = $linha['categoria'];
	$descricao = $linha['descricao'];
	$num_patrimonio = $linha['num_patrimonio'];
	$fornecedor = $linha['fornecedor'];
	$sala = $linha['sala'];
	$local = $linha['local'];
	$valor = $linha['valor'];
	$nfe = $linha['nfe'];
	$situacao = $linha['situacao'];
	$data_compra = $linha['data_compra'];
	$data_baixa = $linha['data_baixa'];
	$motivo_baixa = $linha['motivo_baixa'];
	$baixa = $linha['baixa'];
	$tipo_baixa = $linha['tipo_baixa'];	
	$valor_total == "0";
	$quantidade_filt == "0";
	$serie = $linha['serie'];
	
	
	
switch ($tipo_baixa){
		case "1";
		$tipo_baixa = "MANUTENÇÃO";
		break;
		
		case "2";
		$tipo_baixa = "DESCARTE";
		break;
		
		default:
		$tipo_baixa = "teste";
		break;
		
		
	}
if ($baixa == "0")$baixa2 = "Não";
else $baixa2 = "Sim";

	
		
	$pdf->Cell(2,0.5,$num_patrimonio,0,0,'L');
	$pdf->Cell(4,0.5,$categoria,0,0,'C');
    $pdf->Cell(12,0.5,$descricao,0,0,'L');;
    $pdf->Cell(4,0.5,$local,0,0,'C');
    $pdf->Cell(4.8,0.5,$sala,0,0,'L');
	$pdf->Cell(0.4,0.5,"R$",0,0,'L');
    $pdf->Cell(1.7,0.5,number_format($valor,2,",","."),0,1,'L');
    $total_loja ++;
     $total_estoque = $total_estoque +  $quantidade;
	 $total_enviadas = $total_enviadas + $baixa;
	 $valor_total = $valor_total + $valor;
	 }//fecha while($linha = mysql_fetch_array($sql))
	 $pdf->Cell(28.5,0.3,utf8_decode("____________________________________________________________________________________________________________________________________________________________________________________________________________________________"),0,1,'C');	   

   	 $pdf->Cell(3.3,0.5,"TOTAL BENS FILTRADOS:",0,0,'L'); 
	 $pdf->Cell(21.5,0.5,$total_loja,0,0,'L'); 
	 $pdf->Cell(1.7,0.5,"VALOR TOTAL:",0,0,'C');
	 $pdf->Cell(0.4,0.5,"R$",0,0,'L');
	 $pdf->Cell(1.5,0.5,number_format($valor_total,2,",","."),0,1,'L
	 ');

$pdf->Close();
$pdf->Output('rel.pdf','I');
 ?>
<!-- *********************** fim Relatório fpdf contagem ************************* --> 