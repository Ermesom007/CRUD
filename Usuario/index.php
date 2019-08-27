<?php
// Conexão
include_once 'php_action/db_connect.php';
// Message
include_once 'includes/message.php';
// Header
include_once 'includes/header.php';

?>
<div class="row" >
	<div class="col s12 m8 push-m2">
		<h3 class="light"> Usuarios</h3>
		<table class="striped">
			<thead>
				<tr>
					
					<th>Nome</th>
					<th>Login</th>
					<th>Cargo</th>
				
					
				</tr>
			</thead>

			<tbody>
				<?php


				$sql = "Select * from usuario_view";
				
				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					<td><?php echo $dados['nm_usuario']; ?></td>
					<td><?php echo $dados['ds_acesso']; ?></td>
					<td>
					<?php 

					if($dados['ic_nivel']==1){ echo "Funcionario"; }
					elseif($dados['ic_nivel']==2){ echo "Gerente"; }
					elseif($dados['ic_nivel']==3){ echo "Entregador"; }


					 ?></td>
					
					<td><a href="editar_usuario.php?id=<?php echo $dados['cd_usuario']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['cd_usuario']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?php echo $dados['cd_usuario']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir esse Usuario?</p>
					    </div>
					    <div class="modal-footer">					     

					      <form action="php_action/deleteUsuario.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['cd_usuario']; ?>">
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
		<a href="adicionar_usuario.php" class="btn">Adicionar usuario</a>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>

