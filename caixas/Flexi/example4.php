<?php

    session_start();
	require '../include/conexao.php';
	
    $page = isset($_POST['page']) ? $_POST['page'] : 1;
    $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
    $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'name';
    $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
    $query = isset($_POST['query']) ? $_POST['query'] : false;
    $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : false;


  
    
    if(isset($_GET['Delete'])){// Verifica se foi clicado no botão Excluir
		$id_mercado = $_GET['id'];
        mysql_query("delete from ocorrencia_caixas where id='$id_mercado' ");
    }
    else{
		$sql = mysql_query("SELECT * FROM ocorrencia_caixas");
		$cont = mysql_num_rows($sql);
			while($linha = mysql_fetch_array($sql)){ 
			$id_mercado = $linha['id_mercado'];
			$sql_mercado = mysql_query("SELECT id,nome_fantasia FROM mercado where id='$id_mercado' limit 1");
			$linha_mercado = mysql_fetch_array($sql_mercado);
			$rows[$linha['id']] = array('id'=>$linha['id'], 'mercado'=>$linha_mercado['nome_fantasia'],  'descricao'=>$linha['descricao']);
			
		}


        header("Content-type: application/json");
        $jsonData = array('page'=>$page,'total'=>0,'rows'=>array());
        foreach($rows AS $rowNum => $row){
            //If cell's elements have named keys, they must match column names
            //Only cell's with named keys and matching columns are order independent.
            $entry = array('id' => $rowNum,
                'cell'=>array(
                    'id'      	=> $row['id'],
					'mercado' 	=> $row['mercado'],
                    'descricao'  => $row['descricao']
                )
            );
            $jsonData['rows'][] = $entry;
        }
        $jsonData['total'] = count($rows);
        echo json_encode($jsonData);

}