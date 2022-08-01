<?
if ( isset($_SESSION['login_usuario'])) {//Filtro só pesquisa no banco se for um usuário válido conectado
	 include"conexao.php";
	 	$id = $_SESSION['id_usuario'];
		$id_perfil_acesso = $_SESSION['id_perfil_acesso'];
		$sql_filtro = mysql_query("SELECT * FROM filtro_acesso where id='$id_perfil_acesso' ");
		$cont = mysql_num_rows($sql_filtro);
		if($id_perfil_acesso != 1){
			while($linha = mysql_fetch_array($sql_filtro)){	
				// Filtros Filtros de aesso
				$filt_filtro_acesso_menu	= $linha['filtro_acesso_menu'];
				$filt_filtro_acesso_inclui	= $linha['filtro_acesso_inclui'];
				$filt_filtro_acesso_altera 	= $linha['filtro_acesso_altera'];
				$filt_filtro_acesso_exclui 	=  $linha['filtro_acesso_exclui'];
				$filt_filtro_acesso_rel 	= $linha['filtro_acesso_rel'];
				//Filtros cadastro usuários
				$filt_usuario_menu 		= $linha['usuario_menu'];
				$filt_usuario_inclui 	= $linha['usuario_inclui'];
				$filt_usuario_altera 	= $linha['usuario_altera'];
				$filt_usuario_exclui 	= $linha['usuario_exclui'];
				$filt_usuario_rel 		= $linha['usuario_rel'];
				$filt_usuario_filtro 	= $linha['usuario_filtro'];
				$filt_usuario_consulta 	= $linha['usuario_consulta'];
				//Filtros Controle Patrimonios
				$filt_baixa_patrimonio 	= $linha['baixa_patrimonio'];
				$filt_patrimonio_menu 	= $linha['patrimonio_menu'];
				$filt_patrimonio_inclui = $linha['patrimonio_inclui'];
				$filt_patrimonio_altera = $linha['patrimonio_altera'];
				$filt_patrimonio_exclui = $linha['patrimonio_exclui'];
				$filt_patrimonio_rel 	= $linha['patrimonio_rel'];
				//Filtro Chamado
				$filt_chamado_menu 					= $linha['chamado_menu'];
				$filt_chamado_inclui 				= $linha['chamado_inclui'];
				$filt_chamado_altera 				= $linha['chamado_altera'];
				$filt_chamado_exclui 				= $linha['chamado_exclui'];
				$filt_chamado_rel_aberto 			= $linha['chamado_rel_aberto'];
				$filt_chamado_rel_fechado 			= $linha['chamado_rel_fechado'];
				$filt_chamado_fecha 				= $linha['chamado_fecha'];
				$filt_chamado_rel_aberto_completo 	= $linha['chamado_rel_aberto_completo'];
				$filt_chamado_ti 					= $linha['chamado_ti'];
				//Filtros Mercados
				$mercado_menu 		= $linha['mercado_menu'];
				$mercado_inclui 	= $linha['mercado_inclui'];
				$mercado_consulta 	= $linha['mercado_consulta'];
				$mercado_altera 	= $linha['mercado_altera'];
				$mercado_exclui 	= $linha['mercado_exclui'];
				
		/******************************************************************************************************************************
							Controle de acessos para módulos de controle de qualidade
		*******************************************************************************************************************************/
				//FILTRO MENU QUALIDADE
				$filt_qualidade_menu 		= 	$linha['qualidade_menu'];
				$filt_geral_libera_data 	= 	$linha['geral_libera_data'];
				$filt_qualidade_inclui		=	$linha['qualidade_inclui'];
				$filt_qualidade_altera		=	$linha['qualidade_altera'];
				$filt_qualidade_exclui		=	$linha['qualidade_exclui'];
				$filt_qualidade_consulta	=	$linha['qualidade_consulta'];
				
				//Filtro Temperatura Camaras Frias
				$filt_tempcam_menu 		= $linha['tempcam_menu']; 
				$filt_tempcam_inclui 	= $linha['tempcam_inclui'];
				$filt_tempcam_consulta 	= $linha['tempcam_consulta'];
				$filt_tempcam_rel 		= $linha['tempcam_rel'];
				$filt_tempcam_altera 	= $linha['tempcam_altera'];
				$filt_tempcam_exclui 	= $linha['tempcam_exclui'];
				
				//Filtro do cadastro de balanças 
				$filt_balanca_menu 		= $linha['balanca_menu'];
				$filt_balanca_inclui 	= $linha['balanca_inclui'];
				$filt_balanca_consulta 	= $linha['balanca_consulta'];
				$filt_balanca_rel 		= $linha['balanca_rel'];
				$filt_balanca_altera 	= $linha['balanca_altera'];
				$filt_balanca_exclui 	= $linha['balanca_exclui'];
				
				//FBL - FORMULÁRIO DE AFERIÇÃO DIÁRIO DE BALANÇAS
				$filt_fbl_menu 		= $linha['fbl_menu'];
				$filt_fbl_inclui 	= $linha['fbl_inclui'];
				$filt_fbl_consulta 	= $linha['fbl_consulta'];
				$filt_fbl_rel 		= $linha['fbl_rel'];
				$filt_fbl_altera 	= $linha['fbl_altera'];
				$filt_fbl_exclui 	= $linha['fbl_exclui'];
				
				//Filtros para setores da empresa vinculado
				$filt_setor_menu 		= $linha['setor_menu'];
				$filt_setor_inclui 		= $linha['setor_inclui'];
				$filt_setor_consulta 	= $linha['setor_consulta'];
				$filt_setor_altera 		= $linha['setor_altera'];
				$filt_setor_exclui 		= $linha['setor_exclui'];
				//Filtro transporte
				$transporte_menu 		= $linha['transporte_menu'];
				$transporte_inclui 		= $linha['transporte_inclui'];
				$transporte_altera 		= $linha['transporte_altera'];
				$transporte_consulta 	= $linha['transporte_consulta'];
				$transporte_exclui 		= $linha['transporte_exclui'];
				//PHG Planilhas de higienização Global diárias, semanais e mensais.
				$phg_menu 		 = $linha['phg_menu'];
				$phg_inclui 	 = $linha['phg_inclui'];
				$phg_consulta 	 = $linha['phg_consulta'];
				$phg_altera 	 = $linha['phg_altera'];
				$phg_exclui 	 = $linha['phg_exclui'];
				$phg_libera_data = $linha['phg_libera_data']; 
				//Filtros PAT - Planilha de avaliação de transporte
				$pat_menu 		= $linha['pat_menu'];
				$pat_inclui 	= $linha['pat_inclui'];
				$pat_consulta 	= $linha['pat_consulta'];
				$pat_altera 	= $linha['pat_altera'];
				$pat_exclui 	= $linha['pat_exclui'];
				//Filtros CLP - Check List Predial
				$clp_menu 		= $linha['clp_menu'];
				$clp_inclui 	= $linha['clp_inclui'];
				$clp_consulta 	= $linha['clp_consulta'];
				$clp_altera 	= $linha['clp_altera'];
				$clp_exclui 	= $linha['clp_exclui'];
				//Filtros RCL - Relatório Check List Predial
				$rcl_menu 		= $linha['rcl_menu'];
				$rcl_inclui 	= $linha['rcl_inclui'];
				$rcl_consulta 	= $linha['rcl_consulta'];
				$rcl_altera 	= $linha['rcl_altera'];
				$rcl_exclui 	= $linha['rcl_exclui'];
				//Filtros RNC - Relatório Não Conformidade
				$rnc_menu 		= $linha['rnc_menu'];
				$rnc_inclui 	= $linha['rnc_inclui'];
				$rnc_consulta 	= $linha['rnc_consulta'];
				$rnc_altera 	= $linha['rnc_altera'];
				$rnc_exclui 	= $linha['rnc_exclui'];
				
				//******Filtros para pesquisa de satisfação.**************
				//Cadastro perguntas para avaliação de satisfação
				$cad_pesq_menu 		= $linha['pesq_menu'];
				$cad_pesq_inclui 	= $linha['pesq_inclui'];
				$cad_pesq_consulta 	= $linha['pesq_consulta'];
				$cad_pesq_altera 	= $linha['pesq_altera'];
				$cad_pesq_exclui 	= $linha['pesq_exclui'];
				//Cadastro perguntas para avaliação de satisfação
				$pesq_menu 		= $linha['pesq_menu'];
				$pesq_inclui 	= $linha['pesq_inclui'];
				$pesq_consulta 	= $linha['pesq_consulta'];
				$pesq_altera 	= $linha['pesq_altera'];
				$pesq_exclui 	= $linha['pesq_exclui'];
				
		/******************************************************************************************************************************
							Fim controle de acessos para módulos de controle de qualidade
		*******************************************************************************************************************************/
		/******************************************************************************************************************************
							Controle de acessos para módulos da TI 
		*******************************************************************************************************************************/
				$filt_ti_menu = $linha['ti_menu'];

				//Filtro plano de ação
				$filt_planoacao_menu 	= $linha['planoacao_menu'];
				$filt_planoacao_inclui 	= $linha['planoacao_inclui'];
				$filt_planoacao_altera 	= $linha['planoacao_altera'];
				$filt_planoacao_exclui 	= $linha['planoacao_exclui'];
				$filt_planoacao_rel 	= $linha['planoacao_rel'];
				//Filtros Ocorrências TI
				$filt_ocorrencia_ti_menu 		= $linha['ocorrencia_ti_menu'];
				$filt_ocorrencia_ti_inclui 		= $linha['ocorrencia_ti_inclui'];
				$filt_ocorrencia_ti_consulta 	= $linha['ocorrencia_ti_consulta'];
				$filt_ocorrencia_ti_rel 		= $linha['ocorrencia_ti_rel'];
				$filt_ocorrencia_ti_altera 		= $linha['ocorrencia_ti_altera'];
				$filt_ocorrencia_ti_exclui 		= $linha['ocorrencia_ti_exclui'];
				
		/******************************************************************************************************************************
							Fim controle de acessos para módulos da TI 
		*******************************************************************************************************************************/
				//Filtros mov_carrinho - Relatório Não Conformidade
				$mov_carrinho_menu 		= $linha['mov_carrinho_menu'];
				$mov_carrinho_inclui 	= $linha['mov_carrinho_inclui'];
				$mov_carrinho_consulta 	= $linha['mov_carrinho_consulta'];
				$mov_carrinho_altera 	= $linha['mov_carrinho_altera'];
				$mov_carrinho_exclui 	= $linha['mov_carrinho_exclui'];
				
		/******************************************************************************************************************************
							Compras
		*******************************************************************************************************************************/
				
				//Filtro Pedido de Compra
				$filt_pedido_menu 	= $linha['pedido_menu'];
				$filt_pedido_inclui = $linha['pedido_inclui'];
				$filt_pedido_altera = $linha['pedido_altera'];
				$filt_pedido_exclui = $linha['pedido_exclui'];
				$filt_pedido_rel	= $linha['pedido_rel'];
				$filt_pedido_aprova = $linha['pedido_aprova'];

				//Orçamento
				$filt_orcamento = $linha_filtro_acesso['orcamento'];
		/******************************************************************************************************************************
							RH
		*******************************************************************************************************************************/
				//rh Cadastro novo fucionario
				$filt_rh_menu 		= $linha['rh_menu'];
				$filt_rh_inclui 	= $linha['rh_inclui'];
				$filt_rh_consulta 	= $linha['rh_consulta'];
				$filt_rh_rel 		= $linha['rh_rel'];
				$filt_rh_altera 	= $linha['rh_altera'];
				$filt_rh_exclui 	= $linha['rh_exclui'];
				//RH REGISTROS DE DOCUMENTOS
				$filt_rh_doc_menu 		= $linha['rh_doc_menu'];
				$filt_rh_doc_inclui 	= $linha['rh_doc_inclui'];
				$filt_rh_doc_consulta 	= $linha['rh_doc_consulta'];
				$filt_rh_doc_rel 		= $linha['rh_doc_rel'];
				$filt_rh_doc_altera 	= $linha['rh_doc_altera'];
				$filt_rh_doc_exclui 	= $linha['rh_doc_exclui'];
		/******************************************************************************************************************************
							APOIO COMERCIAL
		*******************************************************************************************************************************/
				//Menu Comercial
				$filt_comercial_menu = $linha['comercial_menu'];
				//MIX PRODUTOS
				$filt_mix_prod_menu 		= $linha['mix_prod_menu'];
				$filt_mix_prod_inclui 		= $linha['mix_prod_inclui'];
				$filt_mix_prod_consulta 	= $linha['mix_prod_consulta'];
				$filt_mix_prod_rel 			= $linha['mix_prod_rel'];
				$filt_mix_prod_altera 		= $linha['mix_prod_altera'];
				$filt_mix_prod_exclui 		= $linha['mix_prod_exclui'];
				//QUEBRA
				$filt_quebra_menu 		= $linha['quebra_menu'];
				$filt_quebra_inclui 	= $linha['quebra_inclui'];
				$filt_quebra_consulta 	= $linha['quebra_consulta'];
				$filt_quebra_rel 		= $linha['quebra_rel'];
				$filt_quebra_altera 	= $linha['quebra_altera'];
				$filt_quebra_exclui 	= $linha['quebra_exclui'];
			}
		}
		else{
			// Filtros Filtros de aesso
				$filt_filtro_acesso_menu	= 1;
				$filt_filtro_acesso_inclui	= 1;
				$filt_filtro_acesso_altera 	= 1;
				$filt_filtro_acesso_exclui 	= 1;
				$filt_filtro_acesso_rel 	= 1;
				//Filtros cadastro usuários
				$filt_usuario_menu 			= 1;
				$filt_usuario_inclui 		= 1;
				$filt_usuario_altera 		= 1;
				$filt_usuario_exclui 		= 1;
				$filt_usuario_rel 			= 1;
				$filt_usuario_filtro 		= 1;
				$filt_usuario_consulta 		= 1;
				//Filtros Controle Patrimonios
				$filt_baixa_patrimonio 		= 1;
				$filt_patrimonio_menu 		= 1;
				$filt_patrimonio_inclui 	= 1;
				$filt_patrimonio_altera 	= 1;
				$filt_patrimonio_exclui 	= 1;
				$filt_patrimonio_rel 		= 1;
				//Filtro Chamado
				$filt_chamado_menu 			= 1;
				$filt_chamado_inclui 		= 1;
				$filt_chamado_altera 		= 1;
				$filt_chamado_exclui 		= 1;
				$filt_chamado_rel_aberto 	= 1;
				$filt_chamado_rel_fechado 	= 1;
				$filt_chamado_fecha 		= 1;
				$filt_chamado_rel_aberto_completo = 1;
				$filt_chamado_ti 			= 1;
				//Filtros Mercados
				$mercado_menu 		= 1;
				$mercado_inclui 	= 1;
				$mercado_consulta 	= 1;
				$mercado_altera 	= 1;
				$mercado_exclui 	= 1;
				
		/******************************************************************************************************************************
							Controle de acessos para módulos de controle de qualidade
		*******************************************************************************************************************************/
				//FILTRO MENU QUALIDADE
				$filt_qualidade_menu 	= 	1;
				$filt_geral_libera_data = 	1;
				$filt_qualidade_inclui	=	1;
				$filt_qualidade_altera	=	1;
				$filt_qualidade_exclui	=	1;
				
				//Filtro Temperatura Camaras Frias
				$filt_tempcam_menu 		= 1;
				$filt_tempcam_inclui 	= 1;
				$filt_tempcam_consulta 	= 1;
				$filt_tempcam_rel 		= 1;
				$filt_tempcam_altera 	= 1;
				$filt_tempcam_exclui 	= 1;
				
				//Filtro do cadastro de balanças 
				$filt_balanca_menu 		= 1;
				$filt_balanca_inclui 	= 1;
				$filt_balanca_consulta 	= 1;
				$filt_balanca_rel 		= 1;
				$filt_balanca_altera 	= 1;
				$filt_balanca_exclui 	= 1;
				
				//FBL - FORMULÁRIO DE AFERIÇÃO DIÁRIO DE BALANÇAS
				$filt_fbl_menu 		= 1;
				$filt_fbl_inclui 	= 1;
				$filt_fbl_consulta 	= 1;
				$filt_fbl_rel 		= 1;
				$filt_fbl_altera 	= 1;
				$filt_fbl_exclui 	= 1;
				
				//Filtros para setores da empresa vinculado
				$filt_setor_menu 		= 1;
				$filt_setor_inclui 		= 1;
				$filt_setor_consulta	= 1;
				$filt_setor_altera 		= 1;
				$filt_setor_exclui 		= 1;
				//Filtro transporte
				$transporte_menu 		= 1;
				$transporte_inclui 		= 1;
				$transporte_altera 		= 1;
				$transporte_consulta 	= 1;
				$transporte_exclui 		= 1;
				//PHG Planilhas de higienização Global diárias, semanais e mensais.
				$phg_menu 		 = 1;
				$phg_inclui 	 = 1;
				$phg_consulta 	 = 1;
				$phg_altera 	 = 1;
				$phg_exclui 	 = 1;
				$phg_libera_data = 1;
				//Filtros PAT - Planilha de avaliação de transporte
				$pat_menu 		= 1;
				$pat_inclui 	= 1;
				$pat_consulta 	= 1;
				$pat_altera 	= 1;
				$pat_exclui 	= 1;
				//Filtros CLP - Check List Predial
				$clp_menu 		= 1;
				$clp_inclui 	= 1;
				$clp_consulta 	= 1;
				$clp_altera 	= 1;
				$clp_exclui 	= 1;
				//Filtros RCL - Relatório Check List Predial
				$rcl_menu 		= 1;
				$rcl_inclui 	= 1;
				$rcl_consulta 	= 1;
				$rcl_altera 	= 1;
				$rcl_exclui 	= 1;
				//Filtros RNC - Relatório Não Conformidade
				$rnc_menu 		= 1;
				$rnc_inclui 	= 1;
				$rnc_consulta	= 1;
				$rnc_altera 	= 1;
				$rnc_exclui 	= 1;
				
				//******Filtros para pesquisa de satisfação.**************
				//Cadastro perguntas para avaliação de satisfação
				$cad_pesq_menu 		= 1;
				$cad_pesq_inclui 	= 1;
				$cad_pesq_consulta 	= 1;
				$cad_pesq_altera 	= 1;
				$cad_pesq_exclui	= 1;
				//Cadastro perguntas para avaliação de satisfação
				$pesq_menu 		= 1;
				$pesq_inclui 	= 1;
				$pesq_consulta 	= 1;
				$pesq_altera 	= 1;
				$pesq_exclui 	= 1;
				
		/******************************************************************************************************************************
							Fim controle de acessos para módulos de controle de qualidade
		*******************************************************************************************************************************/
		/******************************************************************************************************************************
							Controle de acessos para módulos da TI 
		*******************************************************************************************************************************/
				$filt_ti_menu = 1;

				//Filtro plano de ação
				$filt_planoacao_menu 	= 1;
				$filt_planoacao_inclui 	= 1;
				$filt_planoacao_altera 	= 1;
				$filt_planoacao_exclui 	= 1;
				$filt_planoacao_rel 	= 1;
				//Filtros Ocorrências TI
				$filt_ocorrencia_ti_menu 		= 1;
				$filt_ocorrencia_ti_inclui 		= 1;
				$filt_ocorrencia_ti_consulta 	= 1;
				$filt_ocorrencia_ti_rel 		= 1;
				$filt_ocorrencia_ti_altera 		= 1;
				$filt_ocorrencia_ti_exclui 		= 1;
				
		/******************************************************************************************************************************
							Fim controle de acessos para módulos da TI 
		*******************************************************************************************************************************/
				//Filtros mov_carrinho - Relatório Não Conformidade
				$mov_carrinho_menu 		= 1;
				$mov_carrinho_inclui 	= 1;
				$mov_carrinho_consulta 	= 1;
				$mov_carrinho_altera 	= 1;
				$mov_carrinho_exclui 	= 1;
				
		/******************************************************************************************************************************
							Compras
		*******************************************************************************************************************************/
				
				//Filtro Pedido de Compra
				$filt_pedido_menu 	= 1;
				$filt_pedido_inclui = 1;
				$filt_pedido_altera = 1;
				$filt_pedido_exclui = 1;
				$filt_pedido_rel 	= 1;
				$filt_pedido_aprova = 1;

				//Orçamento
				$filt_orcamento = 1;
		/******************************************************************************************************************************
							RH
		*******************************************************************************************************************************/
				//rh Cadastro novo fucionario
				$filt_rh_menu 		= 1;
				$filt_rh_inclui 	= 1;
				$filt_rh_consulta 	= 1;
				$filt_rh_rel		= 1;
				$filt_rh_altera 	= 1;
				$filt_rh_exclui 	= 1;
				//RH REGISTROS DE DOCUMENTOS
				$filt_rh_doc_menu 		= 1;
				$filt_rh_doc_inclui 	= 1;
				$filt_rh_doc_consulta 	= 1;
				$filt_rh_doc_rel 		= 1;
				$filt_rh_doc_altera 	= 1;
				$filt_rh_doc_exclui 	= 1;
		/******************************************************************************************************************************
							APOIO COMERCIAL
		*******************************************************************************************************************************/
				//Menu Comercial
				$filt_comercial_menu = 1;
				//MIX PRODUTOS
				$filt_mix_prod_menu 	= 1;
				$filt_mix_prod_inclui 	= 1;
				$filt_mix_prod_consulta = 1;
				$filt_mix_prod_rel 		= 1;
				$filt_mix_prod_altera 	= 1;
				$filt_mix_prod_exclui 	= 1;
				//QUEBRA
				$filt_quebra_menu 		= 1;
				$filt_quebra_inclui 	= 1;
				$filt_quebra_consulta 	= 1;
				$filt_quebra_rel 		= 1;
				$filt_quebra_altera 	= 1;
				$filt_quebra_exclui 	= 1;
		}
}//Fim do teste manter sempre no final 
?>