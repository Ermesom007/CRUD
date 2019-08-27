<?php
// Header
include_once 'includes/header.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Fornecedor </h3>
		<form action="php_action/insert.php" method="POST">

		<div class="input-field col s12">
				<input type="text" name="forne" id="forne">
				<label for="forne">Nome do Fornecedor</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="cnpjforn" id="cnpjforn" maxlength="14">
				<label for="cnpjforn">CNPJ</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="estadual" id="estadual" maxlength="10">
				<label for="estadual">Inscrição Estadual</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="teleforn" id="teleforn" maxlength="10">
				<label for="teleforn">Telefone</label>
			</div>

			<button type="submit" name="btn-cadastrar2" class="btn"> Cadastrar </button>
			<a href="./index.php" class="btn green"> Lista de Fornecedores </a>
		</form>
		
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>


