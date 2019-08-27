<?php
// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';


if(isset($_GET['id'])){
  $fornecedor = mysqli_escape_string($connect, $_GET['id']);
  $sql = "select f.cd_fornecedor,f.nm_fornecedor,f.cd_cnpj,f.cd_insc,f.cd_telefone
  from tb_fornecedor as f where f.cd_fornecedor = '$fornecedor'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
  
  
  }else{
    $_SESSION['mensagem'] = "Selecione primeiro o Fornecedor!";
    header('Location: ./escolher_fornecedor.php');
  }


?>

<div class="row">
	<div class="col s12 m6 push-m3">
    <h3 class="light"> Cadastro de produto</h3>
    <h5 class="light"> Dados do Fornecedor</h5>
    
    
      <form action="php_action/insertProduto.php" method="POST">

      <input type="hidden" name="fornecedor" value="<?php echo $dados['cd_fornecedor'];?>">
      
      <div class="input-field col s8">
        <input type="text" maxlength="100" name="nome" id="nome" value="<?php echo $dados['nm_fornecedor'];?>"  disabled>
        <label for="nome">Nome do Fornecedor:</label>
      </div>

      
      <div class="input-field col s4">
        <input type="text"  maxlength="14" value="<?php echo $dados['cd_cnpj'];?>" name="cnpj" id="cnpj"  disabled>
        <label for="cnpj">Cnpj</label>
      </div>


      <div class="input-field col s8">
        <input type="text" maxlength="16" value="<?php echo $dados['cd_insc'];?>" name="estadual" id="estadual"  disabled>
        <label for="estadual">Incrição Estadual</label>
      </div>


      <div class="input-field col s4">
        <input type="text" maxlength="11" value="<?php echo $dados['cd_telefone'];?>" name="telefone" id="telefone"  disabled>
        <label for="telefone">Telefone</label>
      </div>

      <h5 class="light"> Dados do Produto</h5>

			<div class="input-field col s12">
				<input type="text" name="produto" id="produto">
				<label for="produto">Descrição do Produto</label>
			</div>

			<div class="input-field col s12">
				<input type="text" name="qtlitros" id="qtlitros" maxlength="11">
				<label for="qtlitros">QT. em Litros</label>
			</div>


			<div class="input-field col s12">
				<input type="text" name="vlcusto" id="vlcusto" maxlength="9">
				<label for="vlcusto">Valor Pago ao Fornecedor</label>
			</div>

      <div class="input-field col s12">
        <input type="text" name="vlvenda" id="vlvenda" maxlength="9">
        <label for="vlvenda">Valor Para Venda</label>
      </div>

		<h5 class="light" > Marca </h5>


				<div class="input-field col s12" >
					 <select class="form-control" name="marca">
				       <?php

                  $sql = "Select * from tb_marca";
        
                  $resultado = mysqli_query($connect, $sql);
               
                  if(mysqli_num_rows($resultado) > 0){

                    while($dados = mysqli_fetch_array($resultado)){

                      echo "<option value='".$dados['cd_marca']."'>".$dados[nm_marca]."</option>";

                    }
                  }
               ?>


				     </select>
				     <label for="tipoContato">Tipo</label>
				</div>

				
		
				

			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="index.php" class="btn green"> Lista de produtos </a>
		</form>
		
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>