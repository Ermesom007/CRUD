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
		<h3 class="light"> Fornecedores </h3>
		<table class="striped">
			<thead>
				<tr>
					
					<th>Nome do Fornecedor:</th>
					<th>CNPJ:</th>
					<th>Inscrição Estadual:</th>
					<th>Telefone</th>					
				</tr>
			</thead>

			<tbody>
				<?php

				

				$sql = "select f.cd_fornecedor,f.nm_fornecedor,f.cd_cnpj,f.cd_insc,f.cd_telefone
					from tb_fornecedor as f";
				

				

				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0){

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					
					<td><?php echo $dados['nm_fornecedor']; ?></td>
					<td><?php echo $dados['cd_cnpj']; ?></td>
					<td><?php echo $dados['cd_insc']; ?></td>
					<td><?php echo $dados['cd_telefone']; ?></td>

					<td><a href="editar.php?id=<?php echo $dados['cd_fornecedor']; ?>" class="btn-floating orange"><i class="material-icons">edit</i></a></td>

					<td><a href="#modal<?php echo $dados['cd_fornecedor']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

					<!-- Modal Structure -->
					  <div id="modal<?php echo $dados['cd_fornecedor']; ?>" class="modal">
					    <div class="modal-content">
					      <h4>Opa!</h4>
					      <p>Tem certeza que deseja excluir esse cliente?</p>
					    </div>
					    <div class="modal-footer">

					    <form action="php_action/delete.php" method="POST">
					      	<input type="hidden" name="id" value="<?php echo $dados['cd_fornecedor']; ?>">
					      	<button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>

					      	 <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>

					      </form>

					    </div>
					  </div>


				</tr>
				<?php 
				endwhile;
				}else{ ?>

				<tr>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
					<td>-</td>
				</tr>

			   <?php 
				};
			   ?>

			</tbody>
		</table>
		<br>
		<a href="./adicionar.php" class="btn">Adicionar Fornecedor</a>
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>					     
