var autocompletar = function () {

    return {
        
        //Inicio autocompletar Produto
        cvp_produto: function () {
	        
			$.getJSON('../include/autocompleta.php?f=cvp_produto', function(data){
				var produto = [];
				
				 // Armazena na array capturando somente o nome do cliente
				$(data).each(function(key, value) {
					produto.push(value.produto);
				});
				
				// Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
				$('#prod').autocomplete({ source: produto, minLength: 3});
				console.log(produto);
			});
        }
		//Inicio autocompletar Produto 
		//Inicio autocompletar cvp_cod_rastreio
        cvp_cod_rastreio: function () {
	        
			$.getJSON('../include/autocompleta.php?f=cvp_cod_rastreio', function(data){
			var cod_rastreio = [];
			
			 // Armazena na array capturando somente o nome do cliente
            $(data).each(function(key, value) {
                cod_rastreio.push(value.cod_rastreio);
            });
			
			// Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
            $('#cod_rastreio').autocomplete({ source: cod_rastreio, minLength: 3});
            console.log(cod_rastreio);
        });
        }
		//Inicio autocompletar cvp_cod_rastreio 
		//Inicio autocompletar cvp_responsavel
        cvp_responsavel: function () {
	        
			$.getJSON('../include/autocompleta.php?f=cvp_responsavel', function(data){
			var dado = [];
			
			 // Armazena na array capturando somente o nome do cliente
            $(data).each(function(key, value) {
                dado.push(value.responsavel);
            });
			
			// Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
            $('#responsavel').autocomplete({ source: dado, minLength: 3});
            console.log(dado);
        });
        }
		//Inicio Auto Completa cvp_responsavel 
    };
    
}();