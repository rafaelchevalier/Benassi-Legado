<? 
session_start();
//*********************** exibe RelatÃ³rio fpdf  ************************* --> 
//RequisiÃ§Ãµes externas
require('fpdf/fpdf.php');
require"include/conexao.php";
require"include/funcoes_aux.php";
//ConfiguraÃ§Ãµes Extras manual
$data_atual = date("d/m/Y");
$venda =0;

//****************  Inicio Filtros recebidos  **************************
if (!empty($_POST['data1'])){ 
	$data1 = converte_data($_POST['data1']);
}
else { 
	$data1 = converte_data($data_atual);
}
if(!empty($_POST['data2'])){
	$data2 = converte_data($_POST['data2']);
}
else{	
	$data2 = converte_data($data_atual);
}
if(!empty($_POST['cod_mercado'])){
	$cod_mercado = "and id_mercado_cad = '".$_POST['cod_mercado']."'";
}
else{
	$cod_mercado="";
}
if(!empty($_POST['produto'])){
	$cod_prod = "and cod_prod = '".$_REQUEST['produto']."'";
}
else{
	$cod_prod="";
}
if(!empty($_POST['tipo'])){
	$tipo = "AND tipo ='".$_POST['tipo']."'";
}
if(empty($_POST['tipo'])){
	$tipo ="";
}
if(!empty($_POST['opcao_grupo'])){
	switch($_POST['opcao_grupo']){
		case 1://Filtro Agrupa por Loja
			$opcao_grupo = "GROUP BY cod_prod";
		break;
		case 2://Filtro Agrupa por produtos
			$opcao_grupo = "GROUP BY cod_prod";
		break;
		default:
			$opcao_grupo="GROUP BY cod_prod";
		break;
	}
}
else{
	$opcao_grupo="";
}
$quebra = 0; $custo=0; $custo_tot=0; $tot_custo = 0; $tot_quebra = 0;

$pdf=new FPDF('L','cm','A4');
$pdf->Open();
$pdf->AddPage();

//Topo
$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
$pdf->SetTextColor(255,250,250);//COD TEXTO
$pdf->SetFont('Arial','B','12');//FORMATAÇÃO TEXTO
/************************************************************************
Tipo rel opção "Nenhum"
Gera relatório agrupado por cliente diário.
*************************************************************************/
if( $_POST['opcao_grupo'] == 0){
	$cont_linha =0;
	switch($_POST['tipo']){
		case "1"://Cabeçalho Inventário
			$pdf->Cell(28,1.5,utf8_decode("Relatório Inventário Por Período"),0,2,'C',1);
		break;
		case "2"://Cabeçalho quebra
			$pdf->Cell(28,1.5,utf8_decode("Relatório Quebra Por Período"),0,2,'C',1);
		break;
		default:
			$pdf->Cell(28,1.5,utf8_decode("Relatório Quebra/Inventário Por Período"),0,2,'C',1);
		break;
	}
	
	$pdf ->Image('imagens/Logorel.png',1.5,1.2,4);
 	$pdf->Cell(28,0.5,utf8_decode("Período consulta: "). converte_data($data1). " - ".converte_data($data2),0,1,'L',1);	
	if(!empty($_POST['cod_mercado'])){
		$pdf->Cell(28,0.5,utf8_decode("Rede: ").busca_nome_mercado($_POST['cod_mercado']),0,1,'L',1);	
	}
	if(!empty($_POST['produto'])){
		$pdf->Cell(28,0.5,utf8_decode("Produto: ").busca_descricao_prod_tab($_REQUEST['produto']),0,1,'L',1);	
	}
	//Cabeçalho
	$pdf->SetFillColor(255,222,173);//COD FUNDO CELULA
	$pdf->SetTextColor(1,1,1);//COD TEXTO
	$pdf->SetFont('Arial','B','10');//FORMATAÇÃO TEXTO
	
	$pdf->Cell(10,0.5,utf8_decode("CLIENTE"),0,0,'L',1);
	$pdf->Cell(4,0.5,utf8_decode("DATA"),0,0,'L',1);	
	$pdf->Cell(4,0.5,utf8_decode("CUSTO KG"),0,0,'L',1);		
	$pdf->Cell(4,0.5,utf8_decode("Total CUSTO"),0,0,'L',1);	
	$pdf->Cell(6,0.5,utf8_decode("Total VENDA"),0,1,'L',1);
	
	$pdf->SetFont('Arial','','9');//Fonte CabeÃ§alho
	//ConexÃ£o com tabela de vendas. ----------------------------------------
	
	$sql_cad = mysql_query("
		SELECT *
		FROM tab_quebra_cab  
		WHERE data_cad BETWEEN ('$data1') AND ('$data2') 
		$cod_mercado
		$tipo
	");	
	$cont = mysql_num_rows($sql_cad);

	while($linha_cab = mysql_fetch_array($sql_cad)){	
	$cont_linha ++;
		$id_cab = $linha_cab['id'];
		// Inicio zebra linhas do relatório 			
		if($cont_linha%2 == 0){
			$pdf->SetFillColor(255,250,250);//COD FUNDO CELULA
			$pdf->SetTextColor(0,0,0);//COD TEXTO
			$pdf->SetFont('Arial','','9');//FORMATAÇÃO TEXTO
		}
		if($cont_linha%2 != 0){
			$pdf->SetFillColor(200,200,200);//COD FUNDO CELULA
			$pdf->SetTextColor(0,0,0);//COD TEXTO
			$pdf->SetFont('Arial','','9');//FORMATAÇÃO TEXTO
		}
		// Fim zebra linhas do relatório 			
		$pdf->Cell(10,0.5,utf8_decode(busca_nome_mercado($linha_cab['id_mercado_cad'])),0,0,'L',1);		
		$pdf->Cell(4,0.5,converte_data($linha_cab['data_cad']),0,0,'L',1);	
		
		$sql_prod = mysql_query("
			SELECT *
			FROM tab_quebra_prod  
			WHERE id_cab='$id_cab'
			$cod_prod
		");	
		$id_cab = "";
		$cont = mysql_num_rows($sql_prod);
		while($linha_prod = mysql_fetch_array($sql_prod)){
			
				$quebra = $quebra + $linha_prod['quebra'];
				$custo = $custo + ($linha_prod['custo'] * $linha_prod['quebra']);
				$venda = $venda + ($linha_prod['venda'] * $linha_prod['quebra']);
			
			//$tot_quebra = $tot_quebra +$linha_prod['quebra'];
		}//fecha while $sql_cad */
			
			$pdf->SetFont('Arial','','9');//Fonte RelatÃ³rio	
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(4,0.5,number_format($quebra,2,",","."),0,0,'L',1);		
			$pdf->Cell(4,0.5,"R$".number_format($custo,2,",","."),0,0,'L',1);
			$pdf->Cell(6,0.5,"R$".number_format($venda,2,",","."),0,1,'L',1);
			
			$custo_tot = $custo_tot + $custo;
			$venda_tot = $venda_tot + $venda;	
			$tot_quebra = $tot_quebra +$quebra;
		
		$quebra =0;
		$custo=0;
		$venda=0;
		
	}//fecha while $sql_prod
		
	//Rodapé Relatório
	$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
	$pdf->SetTextColor(255,250,250);//COD TEXTO
	$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO
	
	$pdf->Cell(28,0.5,utf8_decode("TOTAL QUEBRA KG: ").number_format($tot_quebra,2,",",".")."  |  ".
	utf8_decode("TOTAL CUSTO R$: ").number_format($custo_tot,2,",",".")."  |  ".
	utf8_decode("TOTAL VENDA R$: ").number_format($venda_tot,2,",","."),0,1,'C',1);

}
/************************************************************************
Tipo rel opção "Produto"
Gera relatório agrupado por produto no período.
*************************************************************************/
if($_POST['opcao_grupo'] == 2){//Filtro por produto
$cont_linha =0;
$venda =0;
$venda_tot =0;

//Topo
$pdf->SetFillColor(107,142,35);//COD FUNDO CELULA
$pdf->SetTextColor(250,250,220);//COD TEXTO
$pdf->SetFont('Arial','B','12');//FORMATAÇÃO TEXTO

	switch($_POST['tipo']){
		case 1://Cabeçalho Inventário
			$pdf->Cell(28,1.5,utf8_decode("Relatório Inventário Período Produto "),0,2,'C',1);
		break;
		case 2://Cabeçalho quebra
			$pdf->Cell(28,1.5,utf8_decode("Relatório Quebra Período Produto "),0,2,'C',1);
		break;
		default:
			$pdf->Cell(28,1.5,utf8_decode("Relatório Quebra/Inventário Período Produto "),0,2,'C',1);
		break;
	}
	$pdf ->Image('imagens/Logorel.png',1.5,1.2,4);
	$pdf->Cell(28,0.5,utf8_decode("Período consulta: "). converte_data($data1). " - ".converte_data($data2),0,1,'L',1);	
	if(!empty($_POST['cod_mercado']) or !empty($_POST['produto'])){
		$pdf->Cell(28,0.5,"Filtros",0,1,'C',1);	
	}
	if(!empty($_POST['cod_mercado'])){
		$pdf->Cell(28,0.5,utf8_decode("Rede: ").busca_nome_mercado($_POST['cod_mercado']),0,1,'L',1);	
	}
	if(!empty($_POST['produto'])){
		$pdf->Cell(28,0.5,utf8_decode("Produto: ").busca_descricao_prod_tab($_REQUEST['produto']),0,1,'L',1);	
	}	
	//Cabeçalho
	$pdf->SetFillColor(255,222,173);//COD FUNDO CELULA
	$pdf->SetTextColor(1,1,1);//COD TEXTO
	$pdf->SetFont('Arial','B','10');//FORMATAÇÃO TEXTO
	$pdf->Cell(2,0.5,utf8_decode("COD "),0,0,'L',1);
	$pdf->Cell(10,0.5,utf8_decode("PRODUTO"),0,0,'L',1);	
	$pdf->Cell(4,0.5,utf8_decode("QUEBRA KG"),0,0,'L',1);		
	$pdf->Cell(4,0.5,utf8_decode("Total CUSTO"),0,0,'L',1);
	$pdf->Cell(8,0.5,utf8_decode("Total VENDA"),0,1,'L',1);	
	/*
	$pdf->SetFillColor(255,250,250);//COD FUNDO CELULA
	$pdf->SetTextColor(1,1,1);//COD TEXTO
	$pdf->SetFont('Arial','','9');//FORMATAÇÃO TEXTO
	*/
	//ConexÃ£o com tabela de vendas. ----------------------------------------	
	$sql_prod = mysql_query("
		SELECT DISTINCT cod_prod  
		FROM tab_quebra_prod  
		ORDER BY cod_prod ");
	
	while($linha_prod = mysql_fetch_array($sql_prod)){//consulta produtos
		$codigo_produto = $linha_prod['cod_prod'];
		$nome_produto = busca_descricao_prod_tab($linha_prod['cod_prod']);
		$sql_sub = mysql_query("
			SELECT *
			FROM tab_quebra_cab	
			WHERE data_cad BETWEEN ('$data1') AND ('$data2') 
			$cod_mercado
			$tipo
			");	
		while($linha_sub = mysql_fetch_array($sql_sub)){
			$id_cab = $linha_sub['id'];		
			$sql = mysql_query("
				SELECT SUM(quebra),SUM(custo),SUM(venda),cod_prod,descricao_prod,id_cab
				FROM tab_quebra_prod 
				WHERE id_cab= '$id_cab'	
				AND cod_prod='$codigo_produto'
				$opcao_grupo	
				ORDER by cod_prod
				LIMIT 1
				");	
			while($linha = mysql_fetch_array($sql)){
			
					//consulta produtos
				$quebra = $quebra + $linha['SUM(quebra)'];
				$custo = $custo + ($linha['SUM(custo)'] * $linha['SUM(quebra)']);
				$venda = $venda + ($linha['SUM(venda)'] * $linha['SUM(quebra)']);
			}//fecha while $sql */
		}//fecha while $sql_sub */
				// Inicio zebra linhas do relatório 
					if($cont_linha%2 == 0){
						$pdf->SetFillColor(255,250,250);//COD FUNDO CELULA
						$pdf->SetTextColor(0,0,0);//COD TEXTO
						$pdf->SetFont('Arial','','9');//FORMATAÇÃO TEXTO
					}
					if($cont_linha%2 != 0){
						$pdf->SetFillColor(200,200,200);//COD FUNDO CELULA
						$pdf->SetTextColor(0,0,0);//COD TEXTO
						$pdf->SetFont('Arial','','9');//FORMATAÇÃO TEXTO
					}
					// Fim zebra linhas do relatório 			
					// Destaca em vermelho quando a quebra é maior que 100KG
					if( $quebra > 100){
						$pdf->SetFillColor(255,0,0);//COD FUNDO CELULA
						$pdf->SetTextColor(255,255,255);//COD TEXTO
						$pdf->SetFont('Arial','','9');//FORMATAÇÃO TEXTO
					}
					if($quebra > 0){
						$cont_linha ++;
						$pdf->Cell(2,0.5,utf8_decode($linha_prod['cod_prod']),0,0,'L',1);		
						$pdf->Cell(10,0.5,$nome_produto,0,0,'L',1);	
						$pdf->Cell(4,0.5,number_format($quebra,2,",","."),0,0,'L',1);		
						$pdf->Cell(4,0.5,"R$".number_format($custo,2,",","."),0,0,'L',1);
						$pdf->Cell(8,0.5,"R$".number_format($venda,2,",","."),0,1,'L',1);
						
						$custo_tot = $custo_tot + $custo;
						$venda_tot = $venda_tot + $venda;	
						$tot_quebra = $tot_quebra +$quebra;
					}
			
					$quebra = 0;
					$custo	= 0;
					$venda	= 0;
				
	}//fecha while $sql_prod */
	
		//RodapÃ© RelatÃ³rio
	$pdf->SetFillColor(0,100,0);//COD FUNDO CELULA
	$pdf->SetTextColor(255,250,250);//COD TEXTO
	$pdf->SetFont('Arial','B','9');//FORMATAÇÃO TEXTO
	
	
	$pdf->Cell(28,0.5,utf8_decode("Total QUEBRA KG: ").number_format($tot_quebra,2,",",".")."  |  ".
	utf8_decode("Total CUSTO R$: ").number_format($custo_tot,2,",",".")."  |  ".
	utf8_decode("Total VENDA R$: ").number_format($venda_tot,2,",","."),0,1,'C',1);
}
$pdf->Close();
$pdf->Output('Quebra.pdf','D');

//********************************************************************************************************************
//											Inicio MÃ³dulo Envio de E-mail
//********************************************************************************************************************

if(!empty($_POST['end_email'])){
// configuraÃ§Ã£o dos endereÃ§os de email que receberÃ£o o relatÃ³rio
	if(!empty($_POST['msg_email']))
		$msg_email = $_POST['msg_email'];
	$to = $_POST['end_email']; //
	$from = "contato@rasp.net.br"; 
	$subject = utf8_decode("RelatÃ³rio Quebra (").converte_data($data1)." - ". converte_data($data2).")" ; 
	$message = "<p>Rel Quebra</p> ";
	$message .= utf8_decode($msg_email);

	// a random hash will be necessary to send mixed content
	$separator = md5(time());

	// carriage return type (we use a PHP end of line constant)
	$eol = PHP_EOL;

	// attachment name
	$filename = "rel_quebra.pdf";

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
}
?>