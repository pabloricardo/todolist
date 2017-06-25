<!DOCTYPE html>
<html>
<head>
	<title>To-Do List</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customizacoes.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<form id="todo_list">
		<div class="container">
			<div class="panel panel-info">
			  <div class="panel-heading text-center">To-Do List</div>
			  <div class="panel-body">
				  	<div class="row">
						<div class="col-md-offset-4 col-md-8 erro" id="error-note"></div>
						<div class="col-md-offset-2 col-md-8">
						    <div class="input-group">
						    	<input type="text" class="form-control" placeholder="Descrição do Novo Item" id="descricao" name="descricao" autofocus>
						    	<div class="input-group-btn">
						        <button class="btn btn-info" id="adicionar-item" name="adicionar-item">Adicionar
						        	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						      	</div>
							</div>
						</div>
					</div>
				</div>
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center" colspan="2">Lista</th>
						</tr>
						<tr>
							<th>Descricao</th>
							<th class="col-acoes">Ação</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</form>
	<script>
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
	</script>
</body>
</html>