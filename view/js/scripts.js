$('#adicionar-item').click(function() {
			$('#todo_list').validate({
				errorLabelContainer: "#error-note",
				rules: {
				    descricao: {
				    		required: true,
				    	}
				  	},
			 	messages: {
				    descricao: {
				    		required: "Por Favor Informa a Descrição do Novo Item",
				    	}
				 	},			
				submitHandler: function (form) {
					var dados = $('#todo_list').serialize();
					jQuery.ajax({
			            type: "POST",
			            url: "../model/model-inserir-item.php",
			            data: dados,
			            success: function (data) {
				           	listar();
			               	$("#descricao").val("");
		          		}
				   	});
				}    
			});
		});
	    //Função ajax para pesquisar
		function listar(){
				jQuery.ajax({
					type: "POST",
					url: "../model/model-carregar-itens.php",
					success: function(data)
					{
						$('tbody').html(data);
					}
				});			
			}
		listar();
		//Função ajax para deletar
		function deletarItem(id){
			var confirmacao = confirm("Confirma a exclusão?");
		    if (confirmacao == true) {
		        var dados = id;
				jQuery.ajax({
					type: "POST",
					url: "../model/model-deletar-item.php",
					data: "id="+id,
					success: function(data)
					{
						alert("Item Removido Com Sucesso");
						listar();
					}
				});		
			}else {
		        alert("Operação Cancelada");
		    }					
		};
		//Função ajax para editar
		function concluirItem(id){
			jQuery.ajax({
				type: "POST",
				url: "../model/model-concluir-item.php",
				data: "id="+id,
				success: function(id)
					{
						listar();
					}
				});						
		};