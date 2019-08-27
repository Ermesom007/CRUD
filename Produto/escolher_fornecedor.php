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
		<h3 class="light"> Selecione o Fornecedor </h3>
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
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					
					<td><?php echo $dados['nm_fornecedor']; ?></td>
					<td><?php echo $dados['cd_cnpj']; ?></td>
					<td><?php echo $dados['cd_insc']; ?></td>
					<td><?php echo $dados['cd_telefone']; ?></td>

					<td><a href="adicionar_produto.php?id=<?php echo $dados['cd_fornecedor']; ?>" class="waves-green"><i class="material-icons">edit</i></a></td>

					


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
