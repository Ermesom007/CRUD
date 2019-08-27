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
		<h3 class="light"> Clientes </h3>
		<table class="striped">
			<thead>
				<tr>
					<th>Id:</th>
					<th>Nome:</th>
					<th>Telefone</th>
					<th>Cep:</th>
					<th>Rua:</th>
					<th>Numero:</th>
					<th>Bairro:</th>
					
				</tr>
			</thead>

			<tbody>
				<?php


				$sql = "Select * from cliente_view";
				
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['cd_cliente']; ?></td>
					<td><?php echo $dados['nm_cliente']; ?></td>
					<td><?php echo $dados['cd_telefone']; ?></td>
					<td><?php echo $dados['cd_cep']; ?></td>
					<td><?php echo $dados['ds_logradouro']; ?></td>
					<td><?php echo $dados['cd_numero']; ?></td>
					<td><?php echo $dados['nm_bairro']; ?></td>
					
					<td><a href="editar_cliente.php?id=<?php echo $dados['cd_cliente']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['cd_cliente']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?php echo $dados['cd_cliente']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir esse cliente?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="php_action/delete.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['cd_cliente']; ?>">
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
				</tr>

			   <?php 
				endif;
			   ?>

			</tbody>
		</table>
		<br>
		<a href="adicionar_cliente.php" class="btn">Adicionar cliente</a>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

