<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if(isset($_GET['id'])){
	$produto = mysqli_escape_string($connect, $_GET['id']);
	$sql = "select p.cd_fornecedor,p.ds_produto,p.qt_litros,p.vl_custo,p.vl_venda
	from tb_produto as p where p.cd_produto = '$produto'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	
	
}else{
		$_SESSION['mensagem'] = "Pagina Invalida!";
		header('Location: ./index.php');

	}
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar produto</h3>
		<h5 class="light"> Dados do Produto</h5>
		
		<form action="php_action/updateProduto.php" method="POST">
			
			<input type="hidden" name="id" value="<?php echo $dados['cd_fornecedor'];?>">
			
			<div class="input-field col s8">
				<input type="text" maxlength="100" name="produto" id="produto" value="<?php echo $dados['ds_produto'];?>">
				<label for="nome">Descrição:</label>
			</div>

			
			<div class="input-field col s4">
				<input type="text"  maxlength="14" value="<?php echo $dados['qt_litros'];?>" name="qtlitros" id="qtlitros"  >
				<label for="cnpj">QT. Litros</label>
			</div>


			<div class="input-field col s8">
				<input type="text" maxlength="16" value="<?php echo $dados['vl_custo'];?>" name="vlcusto" id="vlcusto">
				<label for="estadual">VL. Custo</label>
			</div>


			<div class="input-field col s4">
				<input type="text" maxlength="11" value="<?php echo $dados['vl_venda'];?>" name="vlvenda" id="vlvenda">
				<label for="telefone">VL. Venda</label>
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
