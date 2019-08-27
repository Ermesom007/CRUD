<?php
// Conexão
include_once 'php_action/db_connect.php';
// Header
include_once 'includes/header.php';
// Select
if(isset($_GET['id'])):
	$usuario= mysqli_escape_string($connect, $_GET['id']);
	
	$sql = "Select * from usuario_view where cd_usuario='$usuario'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	
	
	
endif;
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Editar Usuario </h3>
		<form action="php_action/updateUsuario.php" method="POST">
			

			<h5 class="light"> Dados do Usuario </h5>
			<input type="hidden" name="cod" value="<?php echo $dados['cd_usuario'];?>">
			


			<div class="input-field col s12">
				<input type="text" name="nome" id="nome" value="<?php echo $dados['nm_usuario'];?>">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s8">
				<input type="text" name="login" id="login" value="<?php echo $dados['ds_acesso'];?>" maxlength="50" >
				<label for="login">Login</label>
			</div>

			<div class="input-field col s4">
				<input type="text" name="senha" id="senha" value="<?php echo $dados['ds_senha'];?>" maxlength="255">
				<label for="senha">Senha</label>
			</div>

			

			<h5 class="light" >Nivel de Acesso </h5>


			<div class="input-field col s4" >
			<select class="form-control" name="nivel">
               <option value="<?php echo $dados['ic_nivel'];?>">Não Alterar</option>
               <option value="1">Funcionario</option>
               <option value="2">Gerente</option>
               <option value="3">Entregador</option>

			</select>
				     <label for="nivel">Cargo:</label>
			</div>

			

			<button type="submit" name="btn-editar" class="btn"> Atualizar</button>
			<a href="index.php" class="btn green"> Lista de usuarios </a>
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
