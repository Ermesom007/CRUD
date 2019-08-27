<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if(isset($_GET['id'])):
	$fornecedor = mysqli_escape_string($connect, $_GET['id']);
	$sql = "select f.cd_fornecedor,f.nm_fornecedor,f.cd_cnpj,f.cd_insc_estadual,f.cd_telefone
	from tb_fornecedor as f where f.cd_fornecedor = '$fornecedor'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	
	
	
endif;
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar Fornecedor </h3>
		<form action="php_action/update.php" method="POST">
			
			<input type="hidden" name="id" value="<?php echo $dados['cd_fornecedor'];?>">
			
			<div class="input-field col s12">
				<input type="text" maxlength="100" name="nome" id="nome" value="<?php echo $dados['nm_fornecedor'];?>">
				<label for="nome">Nome:</label>
			</div>

			
			<div class="input-field col s12">
				<input type="text"  maxlength="14" value="<?php echo $dados['cd_cnpj'];?>" name="cnpj" id="cnpj">
				<label for="cnpj">Cnpj</label>
			</div>


			<div class="input-field col s12">
				<input type="text" maxlength="16" value="<?php echo $dados['cd_insc_estadual'];?>" name="estadual" id="estadual">
				<label for="estadual">Incrição Estadual</label>
			</div>


			<div class="input-field col s12">
				<input type="text" maxlength="11" value="<?php echo $dados['cd_telefone'];?>" name="telefone" id="telefone">
				<label for="telefone">Telefone</label>
			</div>


			<button type="submit" name="btn-editar" class="btn"> Atualizar</button>
			<a href="index.php" class="btn green"> Lista de Fornecedores </a>
		</form>
		
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>
