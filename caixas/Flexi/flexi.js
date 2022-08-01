$(document).ready(function(){
	$(".flexme4").flexigrid({
					url : 'example4.php',
					dataType : 'json',
					colModel : [ {
						display : 'Cod',
						name : 'id',
						width : 50,
						sortable : true,
						align : 'center'
						},{
							display : 'Mercado',
							name : 'mercado',
							width : 150,
							sortable : true,
							align : 'left'
						} , {
							display : 'descri&ccedil;&atilde;o',
							name : 'descricao',
							width : 500,
							sortable : true,
							align : 'left'
						} ],
					buttons : [ {
							name : 'Delete',
							bclass : 'delete',
							onpress : Example4
						}
						,
						{
							separator : true
						} 
					],
					searchitems : [ {
						display : 'EmployeeID',
						name : 'id'
						}, {
							display : 'Name',
							name : 'name',
							isdefault : true
					} ],
					sortname : "iso",
					sortorder : "asc",
					usepager : true,
					title : 'Consulta ocorrências caixas plásticas',
					useRp : true,
					rp : 15,
					showTableToggleBtn : true,
					width : "100%",
					height : 200
				});
	
				function Example4(com, grid) {
					if (com == 'Delete') {
						var conf = confirm('Delete ' + $('.trSelected', grid).length + ' items?')
						if(conf){
							$.each($('.trSelected', grid),function(key, value){
								var id = $(value.childern[0]).find("div").text();
									$.get('example4.php', { Delete: true, id: id}
										, function(){
											// when ajax returns (callback), update the grid to refresh the data
											$(".flexme4").flexReload();
									});
							});    
						}
					}
					
						   
						
					
					
				}
});