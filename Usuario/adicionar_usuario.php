<?php
// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';
?>

<div class="row">
	<div class="col s12 m6 push-m3">
		<h3 class="light"> Novo Usuario </h3>
		<form action="php_action/insertUsuario.php" method="POST">
			



			<div class="input-field col s12">
				<input type="text" name="nome" id="nome">
				<label for="nome">Nome</label>
			</div>

			<div class="input-field col s8">
				<input type="text" name="login" id="login" maxlength="50">
				<label for="login">Login</label>
			</div>

			<div class="input-field col s4">
				<input type="text" name="senha" id="senha" maxlength="255">
				<label for="senha">Senha</label>
			</div>

			

		<h4 class="light" >Nivel de Acesso </h4>


				<div class="input-field col s4" >
					 <select class="form-control" name="nivel">
               
               <option value="1">Funcionario</option>
               <option value="2">Gerente</option>
               <option value="3">Entregador</option>

				   </select>
				     <label for="nivel">Cargo:</label>
				</div>




				

			<button type="submit" name="btn-cadastrar" class="btn"> Cadastrar </button>
			<a href="index.php" class="btn green"> Lista de usuarios </a>
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