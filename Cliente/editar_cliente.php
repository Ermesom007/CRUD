<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if(isset($_GET['id'])):
	$cliente = mysqli_escape_string($connect, $_GET['id']);
	
	$sql = "Select * from cliente_view where cd_cliente='$cliente'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	
	
	
endif;
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar Cliente </h3>
		<form action="php_action/updateCliente.php" method="POST">
			

			<h5 class="light"> Dados do Cliente </h5>
			<input type="hidden" name="cod" value="<?php echo $dados['cd_cliente'];?>">
			
			<div class="input-field col s8">
				<input type="text" name="nome" id="nome" value="<?php echo $dados['nm_cliente'];?>">
				<label for="nome">Nome</label>
			</div>

			
			<div class="input-field col s4">
				<input type="text" value="<?php echo $dados['cd_telefone'];?>" name="telefone" id="telefone">
				<label for="telefone">Telefone:</label>
			</div>


			<h5 class="light"> Endereço do Cliente </h5>
			<div class="input-field col s4">
				<input type="text" value="<?php echo $dados['cd_cep'];?>" name="cep" id="cep">
				<label for="cep">Cep</label>
			</div>

			<div class="input-field col s8">
				<input type="text" value="<?php echo $dados['ds_logradouro'];?>" name="rua" id="rua">
				<label for="ic">Rua</label>
			</div>

			<div class="input-field col s4">
				<input type="text" value="<?php echo $dados['cd_numero'];?>" name="numero" id="numero">
				<label for="ic">Numero</label>
			</div>

			<div class="input-field col s8">
				<select class="form-control" name="bairro" id="bairro">
						<option value="<?php echo $dados['cd_bairro'];?>"><?php echo $dados['nm_bairro'];?></option>
		        		 <?php
			             	$sql = "Select * from tb_bairro";
			        
			                $resultado = mysqli_query($connect, $sql);
			               
			                if(mysqli_num_rows($resultado) > 0){

			                   while($dados = mysqli_fetch_array($resultado)){

			                   echo "<option value='".$dados['cd_bairro']."'>".$dados[nm_bairro]."</option>";

			                   }
			                }
			              ?>

			      	</select>
			      	<label for="bairro">Bairro</label>
			    
			</div>



			<button type="submit" name="btn-editar" class="btn"> Atualizar</button>
			<a href="index.php" class="btn green"> Lista de clientes </a>
		</form>
		
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>
<script type="text/javascript">
	 var comboCidades = document.getElementById("bairro");
		
		comboCidades.selectvalue = 3;
</script>
