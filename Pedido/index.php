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
		<h3 class="light"> Pedidos</h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Data</th>
					<th>Cliente</th>
					<th>Vl Subtotal</th>
					
					<th>Pagamento</th>
					<th>Entrega</th>
					<th>Usuario</th>
					
					
					
				</tr>
			</thead>

			<tbody>
				<?php


				$sql = "Select * from pedido_view";
				
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['dt_pedido']; ?></td>
					<td><?php echo $dados['nm_cliente']; ?></td>
					<td><?php echo $dados['vl_subtotal']; ?></td>
					<td><?php echo $dados['nm_status_pagamento']; ?></td>
					<td><?php echo $dados['nm_status_entrega']; ?></td>
					<td><?php echo $dados['nm_usuario']; ?></td>
					
					<td><a href="editar_produto.php?id=<?php echo $dados['cd_pedido']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['cd_pedido']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?php echo $dados['cd_pedido']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir esse cliente?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="php_action/delete.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['cd_pedido']; ?>">
					      	<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

					      	 <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

					      </form>

					    </div>
					  </div>


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
					<td>-</td>
				</tr>

			   <?php 
				endif;
			   ?>

			</tbody>
		</table>
		<br>
		<a href="escolher_cliente.php" class="btn">Realizar Pedido</a>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

