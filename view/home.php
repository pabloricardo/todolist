<!DOCTYPE html>
<html>
<head>
	<title>To-Do List</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/customizacoes.css">
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<form id="todo_list">
		<div class="container">
			<div class="panel panel-info">
			  <div class="panel-heading text-center">To-Do List</div>
			  <div class="panel-body">
				  	<div class="row">
						<div class="col-md-offset-2 col-md-8">
						    <div class="input-group">
						      <input type="text" class="form-control" placeholder="Descrição do Novo Item" id="descricao" name="descricao" autofocus>
						      <div class="input-group-btn">
						        <button class="btn btn-info" type="button">Adicionar
						        	<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
						        </button>
						      </div>
							</div>
						</div>
					</div>

				</div>


			  <ul class="list-group display-none" id="list">

			  </ul>

			</div>
		</div>
	</form>


</body>
</html>