		<?
		require_once('include/funcoes_aux.php');
		?>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse mega-menu navbar-responsive-collapse">
            <div class="container">
                <ul class="nav navbar-nav">
					<!-- Outros Controles -->
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Outros controles
						</a>
						<ul class="dropdown-menu">
							
							<!-- Controle de Carrinho de Flores -->
							<? if ($mov_carrinho_menu == 1){?>
								<li class="dropdown-submenu">
									<a href="javascript:void(0);">Carrinhos de Flores</a>
									<ul class="dropdown-menu">
										<? if ($mov_carrinho_inclui == "1"){?> 
											<li>
												<a href="carrinho.php?pg=qt_carrinho">- Lançar</a>
											</li>
											<li>
												<a href="carrinho.php?pg=comprovante">- Gera Comprovante</a>
											</li>
										<? }?>
										<? if ($mov_carrinho_consulta == "1"){?>
											<li>
												<a href="carrinho.php?pg=consulta_comprovante">- Reimprime Comprovante</a>
											</li>
											<li>
												<a href="carrinho.php?pg=consulta">- Consulta</a>
											</li>                                
											<li>
												<a href="#">- Relatório</a>
											</li>
										<? }?>
									</ul>                                
								</li>
							<? }?>
							<!-- Fim Controle de Carrinho de Flores -->
							<!-- Controle Controle Caixas Plasticas -->
							<?if ($filt_qualidade_exclui == "1"){?>
								<li class="dropdown-submenu">
									<a href="javascript:void(0);">Controle Caixas Plasticas</a>
									<ul class="dropdown-menu">
										<li>
											<a href="cont_caixas.php?pg=cad">- Lançar</a>
										</li>
										<li>
											<a href="cont_caixas.php?pg=con">- Consulta</a>
										</li>                                
									</ul>                                
								</li>
							<? }?>
							<!-- Fim Controle Caixas Plasticas -->
						</ul>
					</li>
                    <!-- Fim Outros Controles -->
					<!-- QUALIDADE -->
					<? if ($filt_qualidade_menu == "1"){?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Qualidade
							</a>
							<ul class="dropdown-menu">
								
								<!-- FBL -->
								<? if ($filt_tempcam_menu == "1"){?>
									<li class="dropdown-submenu">
										<a href="javascript:void(0);">FBL - Form. Aferição de Balança</a>
										<ul class="dropdown-menu">
											<? if ($filt_tempcam_inclui == "1"){?>
												<li>
													<a href="fbl.php?pg=cad">- Cadastro</a>
												</li>   
											<? }?>
											<? if ($filt_tempcam_consulta == "1"){?>
												<li>
													<a href="fbl.php?pg=con">- Consulta</a>
												</li>    
											<? }?>
										</ul>                                
									</li>
								<? }?>
								<!-- Fim FBL -->
								<!-- Temperatura de Câmara Frigorífica -->
								<? if ($filt_fbl_menu == "1"){?>
									<li class="dropdown-submenu">
										<a href="javascript:void(0);">Tem. Cam. Frigorífica</a>
										<ul class="dropdown-menu">
											<? if ($filt_fbl_inclui == "1"){?>
												<li>
													<a href="tempcam.php?pg=cad">- Cadastro</a>
													
												</li>   
											<? }?>
											<? if ($filt_fbl_consulta == "1"){?>
												<li>
													<a href="tempcam.php?pg=con">- Consulta</a>
												</li>    
											<? }?>
										</ul>                                
									</li>
								<? }?>
								<!-- Fim Temperatura de Câmara Frigorífica -->
								<!-- CVP -->
								<? if ($filt_qualidade_menu == "1"){?>
									<li class="dropdown-submenu">
										<a href="javascript:void(0);">CVP - Controle de Vida de Prateleira do produto</a>
										<ul class="dropdown-menu">
											<? if ($filt_qualidade_inclui == true){?>
												<li>
													<a href="cvp.php?pg=cad">- Cadastro</a>
												</li>   
											<? }?>
											<? if ($filt_qualidade_inclui == true){?>
												<li>
													<a href="cvp.php?pg=con">- Consulta</a>
												</li>    
											<? }?>
										</ul>                                
									</li>
								<? }?>
								<!-- CVP -->
								<!-- PIR -->
								<? if ($filt_qualidade_menu == "1"){?>
									<li class="dropdown-submenu">
										<a href="javascript:void(0);">PIR - Planilha de Inspeção de Recebimento de Insumos</a>
										<ul class="dropdown-menu">
											<? if ($filt_qualidade_inclui == true){?>
												<li>
													<a href="pir.php?pg=cad">- Cadastro</a>
												</li>   
											<? }?>
											<? if ($filt_qualidade_inclui == true){?>
												<li>
													<a href="pir.php?pg=con">- Consulta</a>
												</li>    
											<? }?>
										</ul>                                
									</li>
								<? }?>
								<!-- pIR -->
							</ul>
						</li>
					<? }?>
                    <!-- End QUALIDADE -->
					<!-- Comercial -->
					<?  if ($filt_comercial_menu == 1){?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								Comercial
							</a>
							<ul class="dropdown-menu">
								
								<!-- Controle de Quebra -->
								<li class="dropdown-submenu">
									<a href="javascript:void(0);">Quebra/Inventário</a>
									<ul class="dropdown-menu">
										<? if ($filt_mix_prod_inclui == "1"){?> 
											<li>
												<a href="../mix_prod.php?pg=cad_tab">- Cadastro Tabela Mix</a>
											</li>
										<? }?>
										<? if ($filt_mix_prod_consulta == "1"){?>
											<li>
												<a href="../mix_prod.php?pg=consulta_tab">- Consulta Tabela Mix</a>
											</li>
										<? }?>
										<? if ($filt_quebra_consulta == "1"){?>
											<li>
												<a href="quebra.php?pg=con">- Consulta</a>
											</li>                                
										<? }?>
										<? if ($filt_quebra_consulta == "1"){?>
											<li>
												<a href="quebra.php?pg=rel">- Relatório</a>
											</li>
										<? }?>
									</ul>                                
								</li>
								<!-- Controle de Quebra -->
							</ul>
						</li>
					<? } ?>
                    <!-- FIM Comercial -->
					<!-- Chamadado -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Chamado
                        </a>
						
                        <ul class="dropdown-menu">
                            <li><a href="chamado.php?pg=abre_chamado">Novo Chamado</a></li>
							<li><a href="chamado.php?pg=consulta">Consulta</a></li>
                        </ul>
                    </li>
                    <!-- FIM Chamado -->
					<!-- Download -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Download
                        </a>
                        <ul class="dropdown-menu">
							<li><a href="http://mysaas.com.br/download/autoimp/autoimp.exe">Download Autoimp</a></li>
							<li><a href="http://mysaas.com.br/download/autoimp/dll_autoimp.exe">Download DLL do Autoimp</a></li>
                        </ul>
                    </li>
                    <!-- FIM Download -->
					<!-- Home -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Home
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php">Pricipal</a></li>							
							<!-- <li><a href="https://app.avalio.com.br/pesquisa/bopebenassirio/">Bope Online</a></li>-->
							<li><a href="#">Procedimentos</a></li>
							<li><a href="http://rasp.net.br/benassi">Voltar Versão Anterior</a></li>
							
                        </ul>
                    </li>
                    <!-- FIM Home -->
					<!-- Usuários -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Usuários
                        </a>
                        <ul class="dropdown-menu">
							<li><a href="../usuarios.php?pg=caduser">Cadastro (Legado)</a></li>	
                            <li><a href="../usuarios.php?pg=relusuario">Consulta (Legado)</a></li>							
                        </ul>
                    </li>
                    <!-- FIM Home -->
					<!-- Busca -->
                    <li>
                        <i class="search fa fa-search search-btn"></i>
                        <div class="search-open">
                            <div class="input-group animated fadeInDown">
                                <input type="text" class="form-control" placeholder="Search">
                                <span class="input-group-btn">
                                    <button class="btn-u" type="button">Go</button>
                                </span>
                            </div>
                        </div>    
                    </li>
                    <!-- Fim Busca -->
                </ul>
            </div><!--/end container-->
        </div><!--/navbar-collapse-->
    </div>
    <!--=== End Header ===-->