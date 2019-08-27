<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Message
include_once 'includes/message.php';
?>
<div class="row">
	<div class="col s12 m8 push-m2">

		<h3 class="light"> Cadastro de Pedido</h3>
		<h4 class="light"> Selecione o Cliente</h4>
		<table class="striped">
			<thead>
				<tr>
					
					<th>Nome do CLiente:</th>
					<th>Telefone:</th>
								
				</tr>
			</thead>

			<tbody>
				<?php

				

				$sql = "Select nm_cliente,cd_telefone,cd_cliente from cliente_view";
				

				

				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					
					<td><?php echo $dados['nm_cliente']; ?></td>
					
					
					<td><?php echo $dados['cd_telefone']; ?></td>

					<td><a href="escolher_item_pedido.php?id=<?php echo $dados['cd_cliente']; ?>" class="waves-green"><i class="material-icons">edit</i></a></td>

					


				</tr>
				<?php 
				endwhile;
				else: ?>

				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

			   <?php 
				endif;
			   ?>

			</tbody>
		</table>
	
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>					     
