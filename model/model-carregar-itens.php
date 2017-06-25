<?php

			require 'config.php';
			require 'connection.php';
			$link = DBConnect();

				$sql = "SELECT * FROM item where Situacao = 1";
				$result = $link->query($sql);
				//Veririca se retornou alguma linha
				if ($result->num_rows > 0) {
			    // Pega cada linha retornada e executa os comandos
			      while($row = $result->fetch_assoc()) {
			      	?>
			       		<tr>
			       			<td><?php echo $row['Descricao'] ?></td>
			       			<td class="text-center">
			       			<button type="button" class="btn btn-default btn-xs"><i class="fa fa-check" aria-hidden="true" data-toggle="modal" onclick="concluirItem(<?php echo $row['Id'] ?>)"></i></button>
			       			<button type="button" onclick="deletarItem(<?php echo $row['Id'] ?>)" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></button>
			       			</td>
			       		</tr>
			       <?php
			     }     
			   }

			   $sql = "SELECT * FROM item where Situacao = 0";
				$result = $link->query($sql);
				//Veririca se retornou alguma linha
				if ($result->num_rows > 0) {
			    // Pega cada linha retornada e executa os comandos
			      while($row = $result->fetch_assoc()) {
			      	?>
			       		<tr>
			       			<td class="concluido"><?php echo $row['Descricao'] ?></td>
			       			<td class="text-center">
			       			<button type="button" class="btn btn-default btn-xs button-concluido"><i class="fa fa-check" aria-hidden="true" data-toggle="modal" onclick="concluirItem(<?php echo $row['Id'] ?>)"></i></button>
			       			<button type="button" onclick="deletarItem(<?php echo $row['Id'] ?>)" class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></button>
			       			</td>
			       		</tr>
			       <?php
			     }     
			   }else{
			   	echo "Lista Vazia.";
			   }

			mysqli_close($link);
			?>
