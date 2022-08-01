<? //*********************** exibe Relatório fpdf contagem ************************* --> 
require('fpdf/fpdf.php');
$pdf=new FPDF('P','cm',array(8,30));
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

$data_atual = date("d/m/Y");
  require"include/conexao.php";
  
/******************************* consulta Mysql ********************************************/
$filt1 = $_POST['num_serie'];
$sql = mysql_query("SELECT * FROM mov_carrinho WHERE num_serie LIKE ('$filt1') and comprovante='0' limit 1");
$linha = mysql_fetch_array($sql);

//Busca o ultimo Localizador
$sql_localizador = mysql_query("SELECT * FROM comprovante_mov_carrinho ORDER by localizador DESC limit 1");
$linha_localizador = mysql_fetch_array($sql_localizador);
$localizador = $linha_localizador['localizador'];//Último Localizador 
$localizador ++;//Incrementa +1 no último localizador. 

$tipo_mov 		= $linha['tipo_mov'];
$num_serie 		= $linha['num_serie'];
$destino 		= $linha['destino'];
$origem 		= $linha['origem'];
$cod_transporte = $linha['cod_transporte'];
$data_saida 	= $linha['data_saida'];
$hora_saida 	= $linha['hora_saida'];
/**************************** Fim consulta Mysql ********************************************/

//*******************   Cabeçalho **************************
	if($tipo_mov == "SAIDA"){
		$pdf->Cell(8,1,utf8_decode("Comprovante Saída"),0,1,'L');
	}
	if($tipo_mov == "RETORNO"){
		$pdf->Cell(8,1,utf8_decode("Comprovante Entrada"),0,1,'L');
	}
	$pdf->SetFont('Arial','','9');//Formatação texto Corpo do comprovante
	$pdf->SetTextColor(0,0,0);
	
	$pdf->Cell(2,1,utf8_decode("Código:"),0,0,'L');
    $pdf->Cell(6,1,$localizador,0,1,'L');
	
	if($linha['tipo_mov'] == "SAIDA"){
		$pdf->Cell(1.5,1,"Destino:",0,0,'L');
		$pdf->Cell(6.5,1,$destino,0,1,'L');
	}
	if($linha['tipo_mov'] == "RETORNO"){
		$pdf->Cell(1.5,1,"ORIGEM:",0,0,'L');
		$pdf->Cell(6.5,1,$origem,0,1,'L');
	}
	$pdf->Cell(2,1,"Data Saida:",0,0,'L');
    $pdf->Cell(6,1,converte_data($data_saida)." - ".$hora_saida,0,1,'L');
	
	$pdf->Cell(3,1,utf8_decode("Cod Transporte:"),0,0,'L');
    $pdf->Cell(5,1,$cod_transporte,0,1,'L');
	
	$pdf->Cell(8,0.3,utf8_decode("______________________________"),0,1,'L');

  	$pdf->Cell(1.5,1,"QTD",0,0,'L');
    $pdf->Cell(6.5,1,utf8_decode("Número Série"),0,1,'L');
//****************  Fim Cabeçalho **************************	
$num = 0;
$sql2 = mysql_query("SELECT * FROM mov_carrinho WHERE destino='$destino' and data_saida='$data_saida' and cod_transporte='$cod_transporte' and ativo='1' and comprovante='0'");
while($linha2 = mysql_fetch_array($sql2)){
	$num_serie2 		= $linha2['num_serie'];
	$origem2 			= $linha2['origem'];
	$destino2 			= $linha2['destino'];
	$cod_transporte2 	= $linha2['cod_transporte'];
	$motorista 			= $linha2['motorista'];
	$data_saida2 		= $linha2['data_saida'];
	$id2 				= $linha2['id'];
	
	$pdf->Cell(1.5,1,"1",0,0,'L');
    $pdf->Cell(6.5,1,$num_serie2,0,1,'L');
		
    $total_loja ++;
	$id_carrinhos[] = $linha2['id']; 
	 $total_enviadas = $total_enviadas + $baixa;
	 
	 $sql3=(" UPDATE mov_carrinho SET comprovante='$localizador', ativo='0' where id='$id2' and num_serie='$num_serie2' and data_saida='$data_saida' and comprovante='0' and ativo ='1' ");
	 mysql_query($sql3);
	 $sql4= "insert into comprovante_mov_carrinho (data_cad,hora_cad,origem,destino,data_saida,id_mov_carrinho,num_serie,motorista,cod_motorista,localizador,tipo_mov) values
	 (now(),now(),'$origem2','$destino2','$data_saida2','$id2','$num_serie2','$motorista','$cod_transporte2','$localizador','$tipo_mov') ";
	 mysql_query($sql4);
	 
	 }//fecha while($linha = mysql_fetch_array($sql))
	 $pdf->Cell(8,0.3,utf8_decode("______________________________"),0,1,'L');	   
	 
	 $pdf->Cell(1.5,0.5,$total_loja,0,0,'L'); 
	 $pdf->Cell(6.5,0.5,"Carrinhos",0,1,'L');
	 
 
	 $pdf->Cell(8,3,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 $pdf->Cell(8,-2.5,$motorista,0,1,'L');  	
	 
	 $pdf->Cell(8,2,"",0,1,'L'); 
	 
	 $pdf->Cell(8,3,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 $pdf->Cell(8,-2.5,"Nome Conferente",0,1,'L');  
	 
	 $pdf->Cell(8,2,"",0,1,'L'); 
	 
	 $pdf->Cell(8,3,utf8_decode("------------------------------------------------"),0,1,'L');//Assinatura Motorista
	 $pdf->Cell(8,-2.5,"Ass. Conferente",0,1,'L');  


$pdf->Close();
$pdf->Output('comprovante_'.$localizador.'.pdf','D');

 ?>
<!-- *********************** fim Relatório fpdf contagem ************************* --> 