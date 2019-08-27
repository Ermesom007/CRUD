*<?php 
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';




if(isset($_GET['id'])):
	$cliente = mysqli_escape_string($connect, $_GET['id']);
	$sql = "Select nm_cliente,cd_telefone,cd_cliente from cliente_view where cd_cliente = '$cliente'";;
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	$cod = $dados['cd_cliente'];
	
	
endif;

 ?>
 <div class="row">
	<div class="col s14 m8 push-m2">

		<h3 class="light"> Cadastro de Pedido</h3>
		<h5 class="light"> Dados do Cliente</h5>

		<form action="carrinho.php" method="post">
			
			<div class="input-field col s8">
		        <input type="text" maxlength="100" name="nomee" id="nomee" value="<?php echo $dados['nm_cliente'];?>"  disabled>
		        <label for="nome">Nome:</label>
		    </div>

		<br><br><br><br><br>


		<h5 class="light"> Adicione Produtos ao Carrinho</h5>
		<hr>
		<table class="striped">
			<thead>
				<tr>
					
					<th>Descrição</th>
					<th>QT. Litros</th>
					<th>Marca</th>
					<th>Preço Unitario</th>
					<th>Comprar</th>
								
				</tr>
			</thead>

			<tbody>
				<?php

				

				$sql = "Select ds_produto,qt_litros,nm_marca,vl_venda,cd_produto from produto_view";
				

				

				$resultado = mysqli_query($connect, $sql);
               
                if(mysqli_num_rows($resultado) > 0):

				while($dados = mysqli_fetch_array($resultado)):
				?>
				<tr>
					
					<td><?php echo $dados['ds_produto']; ?></td>
					
					
					<td><?php echo $dados['qt_litros']; ?></td>

					<td><?php echo $dados['nm_marca']; ?></td>

					<td>R$<?php echo number_format( $dados['vl_venda'], 2, ",","."); ?></td>

					

					<td> <a href="carrinho.php?acao=add&id=<?php echo $dados['cd_produto']; ?>" class="btn-floating btn-medium waves-effect waves-light green"><i class="material-icons">add</i></a></td>

					


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
		<hr>
			
			<button  type="submit" name="btn-carrinho"  class="btn"> Carrinho </button>
			<a href="index.php" class="btn red"> cancelar pedido </a>
		</form>	
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>					     
