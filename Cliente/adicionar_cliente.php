<?php
// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Cliente </h3>
		<form action="php_action/insertCliente.php" method="POST">
			



				


      <input type="hidden" name="pessoa" value=false>





			<div class="input-field col s12">
				<input type="text" name="nomee" id="nomee">
				<label for="nomee">Nome</label>
			</div>

			<div class="input-field col s6">
				<input type="text" name="cpf" id="cpf" maxlength="11">
				<label for="sobrenome">CPF</label>
			</div>

			<div class="input-field col s6">
				<input type="text" name="rg" id="rg" maxlength="9">
				<label for="rg">RG</label>
			</div>

			

		<h4 class="light" > Contato </h4>


				<div class="input-field col s4" >
					 <select class="form-control" name="tipoContato">
               <?php

                  $sql = "Select * from tipo_contato";
        
                  $resultado = mysqli_query($connect, $sql);
               
                  if(mysqli_num_rows($resultado) > 0){

                    while($dados = mysqli_fetch_array($resultado)){

                      echo "<option value='".$dados['cd_tipo_contato']."'>".$dados[nm_tipo_contato]."</option>";

                    }
                  }
               ?>


				   </select>
				     <label for="tipoContato">Tipo</label>
				</div>

        <div class="input-field col s8">
          <input type="text" class="form-control" name="Telefone" maxlength="11"/>
           <label for="Telefone">Telefone</label>
        </div>



				
		<h4 class="light"> Endereço </h4>
				
				<div class="input-field col s4" >
					<input type="text" class="form-control" name="cep" id="cep"  maxlength="8"  onblur="pesquisacep(this.value);"/>
					<label for="cep">Cep</label>
				</div>

				<div class="input-field col s8" >
					 <input type="text" class="form-control" name="rua" id="rua">
					<label for="rua">Rua</label>
				</div>

        <div class="input-field col s4" >
           <input type="text" class="form-control" name="numero" id="numero">
          <label for="rua">Numero</label>
        </div>

        <div class="input-field col s8" >
           <input type="text" class="form-control" name="complemento" id="complemento">
          <label for="complemento">Complemento</label>
        </div>

				<div class="input-field col s12">
					<select class="form-control" name="bairro">
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

				

			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="index.php" class="btn green"> Lista de clientes </a>
		</form>
		
	</div>
</div>

<?php
// Footer
include_once 'includes/footer.php';
?>


<script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
           // document.getElementById('bairro').value=("");
           // document.getElementById('cidade').value=("");
           // document.getElementById('uf').value=("");
           // document.getElementById('numero').value=("");
           // document.getElementById('complemento').value=("");
           /* document.getElementById('ibge').value=("");*/
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
           // document.getElementById('bairro').value=(conteudo.bairro);
           // document.getElementById('cidade').value=(conteudo.localidade);
           // document.getElementById('uf').value=(conteudo.uf);
            /*document.getElementById('ibge').value=(conteudo.ibge);*/
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function exibir_ocultar($val){
      
         


        if($val == 'pessoa_fisica'){
          $('#cnpj').addClass('d-none')
          document.getElementById('cnpj').disabled=true;
          document.getElementById('razao').disabled=true;
          document.getElementById('nomee').disabled=false;
          document.getElementById('rg').disabled=false;
          document.getElementById('cpf').disabled=false;
          document.getElementById('IE').disabled=true;
          document.getElementById('IE').value="";
          document.getElementById('cnpj').value="";
          document.getElementById('razao').value="";
           
          
            
        }
        else if($val == 'pessoa_juridica'){
          document.getElementById('nomee').disabled=true;
          document.getElementById('rg').disabled=true;
          document.getElementById('cpf').disabled=true;
          document.getElementById('cnpj').disabled=false;
          document.getElementById('razao').disabled=false;
          document.getElementById('nomee').value="";
          document.getElementById('rg').value="";
          document.getElementById('cpf').value="";
          document.getElementById('IE').disabled=false;
            
        }
    }

    function maskCep(el){

      vCampos(el,/[^0-9\-]/g);

      var e=$(el).val();

      if(event.keyCode!=8){
        if(e.length==5)
          $(el).val(e+'-');
      }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
             //   document.getElementById('bairro').value="...";
             //   document.getElementById('cidade').value="...";
             //   document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        } 
    };


    

    </script>