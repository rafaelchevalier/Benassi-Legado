<? //*********************** exibe Relatório fpdf contagem ************************* --> 
require('fpdf/fpdf.php');
$pdf=new FPDF('P','cm',array(8,30));
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

$data_atual = date("d/m/Y");
  require"include/conexao.php";
for($i=0;$i < 3;$i++){
/***************************************************************************************
					Consulta Cabeçalho Comprovante
***************************************************************************************/
$filt1 = $_GET['loc'];//Puxa código localizador do comprovante do link

$sql = mysql_query("SELECT * FROM comprovante_mov_carrinho 
						WHERE localizador = '$filt1'
						limit 1");
$linha = mysql_fetch_array($sql);

$localizador 	= $linha['localizador'];
$destino 		= $linha['destino'];
$origem 		= $linha['origem'];
$cod_motorista 	= $linha['cod_motorista'];
$motorista 		= $linha['motorista'];
$hora_cad 		= $linha['hora_cad'];
$data_saida 	= $linha['data_saida'];
$tipo_mov 		= $linha['tipo_mov'];
$cont_via 		= $i+1;
/***************************************************************************************
				Fim Consulta Cabeçalho Comprovante
***************************************************************************************/

//*******************   Cabeçalho **************************
	$pdf->SetTextColor(107,142,35);//Cor texto duperior
	$pdf->SetFont('Arial','B','15');//Formatação texto topo
	
	$pdf->Cell(8,1,"Via".$cont_via,0,1,'L');
	
	
	if($tipo_mov == "SAIDA"){
		$pdf->Cell(8,1,utf8_decode("Comprovante Saida"),0,1,'L');
	}
	if($tipo_mov == "RETORNO"){
		$pdf->Cell(8,1,utf8_decode("Comprovante Entrada"),0,1,'L');
	}
	if($tipo_mov != "RETORNO" AND $tipo_mov != "SAIDA"){
		$pdf->Cell(8,1,utf8_decode("Comprovante Antigo"),0,1,'L');
	}
	$pdf->SetFont('Arial','','9');//Formatação texto Corpo do comprovante
	$pdf->SetTextColor(0,0,0);
	
	$pdf->Cell(2,0.5,utf8_decode("Código:"),0,0,'L');
    $pdf->Cell(6,0.5,$localizador,0,1,'L');
	
	$pdf->Cell(2,0.5,"Destino:",0,0,'L');
    $pdf->Cell(6,0.5,$destino,0,1,'L');
	
	$pdf->Cell(2,0.5,"Data Saida:",0,0,'L');
    $pdf->Cell(6,0.5,converte_data($data_saida),0,1,'L');
	
	$pdf->Cell(3,0.5,utf8_decode("Cod Transporte:"),0,0,'L');
    $pdf->Cell(5,0.5,$cod_motorista,0,1,'L');
	
	$pdf->Cell(8,0.3,utf8_decode("______________________________"),0,1,'L');

  	$pdf->Cell(2,1,"QTD",0,0,'L');
    $pdf->Cell(6,1,utf8_decode("Número Série"),0,1,'L');

//****************  Fim Cabeçalho **************************	
$num = 0;
$sql2 = mysql_query("SELECT * FROM comprovante_mov_carrinho 
					WHERE localizador='$localizador'
					limit 1000");
	$total_loja = 0;
while($linha2 = mysql_fetch_array($sql2)){
	$num_serie2 = strtoupper($linha2['num_serie']);
	
	$pdf->Cell(2,1,"1",0,0,'L');
    $pdf->Cell(6,1,$num_serie2,0,1,'L');
	

    $total_loja ++;
	$id_carrinhos[] = $linha2['id']; 
	 $total_enviadas = $total_enviadas + $baixa;
}	 
	 $pdf->Cell(8,0.3,utf8_decode("______________________________"),0,1,'L');	   
	 
	 $pdf->Cell(2,0.5,$total_loja,0,0,'L');
	 $pdf->Cell(6,0.5,"Carrinhos",0,1,'L');
	 
 
	 $pdf->Cell(8,3,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 $pdf->Cell(8,-2.5,$motorista,0,1,'L');  	
	 
	 $pdf->Cell(8,2,"",0,1,'L'); 
	 
	 $pdf->Cell(8,3,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 $pdf->Cell(8,-2.5,"Nome Conferente",0,1,'L');  
	 
	 $pdf->Cell(8,2,"",0,1,'L'); 
	 
	 $pdf->Cell(8,3,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 $pdf->Cell(8,-2.5,"Ass. Conferente",0,1,'L');  
	 
	 $pdf->Cell(8,5,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 

}//Fim for
$pdf->Close();
$pdf->Output('comprovante_'.$localizador.'.pdf','D');

 ?>
<!-- *********************** fim Relatório fpdf contagem ************************* --> 