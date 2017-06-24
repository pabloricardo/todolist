<!DOCTYPE html>
<html>
<head>
	<title>To-Do List</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customizacoes.css">
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
						        </button>
						      </div>
							</div>
						</div>
					</div>
				</div>
			  <ul class="list-group " id="list" name="list">

			  </ul>

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
					alert("entrou");
					var dados = $('#todo_list').serialize();
					jQuery.ajax({
		                type: "POST",
		                url: "../model/model-inserir-item.php",
		                data: dados,
		                success: function (data) {
		                	alert(data);
	               		}
	               		this.reset();
			    	});
				}    

		});
	});
	</script>
</body>
</html>