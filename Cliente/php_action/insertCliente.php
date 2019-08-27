<?php 
// Sessão
session_start();



	






	
	if($_POST) {
		//recebendo os dados do cliente
		$tipo=$_POST['pessoa'];
		if($tipo=='false'){
			echo "pessoa fisica";
			$nome= $_POST['nomee'];
			$doc1=$_POST['cpf'];
			$doc2=$_POST['rg'];
			$tipo=False;

		
			
		}else{
			echo "pessoa juridica";
			$nome = $_POST['razao'];
			$doc1=$_POST['cnpj'];
			$doc2=$_POST['IE'];
			$tipo=True;
		}

		//recebendo dados de contato
		$telefone=$_POST['Telefone'];
		$tipoContato =$_POST['tipoContato'];	

		//recebendo dados de endereco
		
		$bairro=$_POST['bairro'];
		$rua =$_POST['rua'];
		$cep=$_POST['cep'];
		$numero=$_POST['numero'];
		$complemento=$_POST['complemento'];


		


		try {
			
				include './db_connect.php';

				$conn = getConnection();

				//criando query para cadastrar cliente
				$sql = 'call cadastrarCliente(?,?,?,?)';

				$stmt = $conn -> prepare($sql);
				$stmt -> bindValue(1,$nome);
				$stmt -> bindValue(2,$doc1);
				$stmt -> bindValue(3,$doc2);
				$stmt -> bindValue(4,$tipo);


				
			    
				

			//inserindo cliente
			if($stmt->execute()){
					echo 'cliente Salvo com sucesso!';
					$id_cliente = $stmt->fetch(PDO::FETCH_ASSOC)['id_cliente'];
					echo "<br>";
					//echo "<pre>";
					//print_r($id_cliente);
					//echo "</pre>";
					//echo $id_cliente->id_cliente;

					echo $id_cliente;

					$sql='insert into tb_contato(cd_cliente,cd_telefone,cd_tipo_contato)
					value(?,?,?)';
					//criando query para cadastrar contato
					$stmt = $conn -> prepare($sql);
					$stmt -> bindValue(1,$id_cliente);
					$stmt -> bindValue(2,$telefone);
					$stmt -> bindValue(3,$tipoContato);


					//inserindo contato
				 if($stmt->execute()){
					 	echo 'contato Salvo com sucesso!';
					 	echo $id_cliente;


					 		$sql='insert into tb_logradouro(cd_cliente,cd_bairro,cd_cep,cd_numero,ds_complemento,ds_logradouro)
							value(?,?,?,?,?,?)';
							//criando query para cadastrar contato
							$stmt = $conn -> prepare($sql);
							$stmt -> bindValue(1,$id_cliente);
							$stmt -> bindValue(2,$bairro);
							$stmt -> bindValue(3,$cep);
							$stmt -> bindValue(4,$numero);
							$stmt -> bindValue(5,$complemento);
							$stmt -> bindValue(6,$rua);	

							if($stmt->execute()){
								$_SESSION['mensagem'] = "Cadastrado com sucesso!";
								header('Location: ../index.php');
							}
							else{
								echo "falhou cadastro de endereco";
							}





					 }
				 else{
					 	echo 'falhou cadastro de contato';
					 }

					
					
				}
			else{
					$_SESSION['mensagem'] = "Erro ao cadastrar";
					header('Location: ../index.php');
				}

						
			//header('location: index.php');

		} catch (Exception $e) {
			$_SESSION['mensagem'] = "Erro ao cadastrar";
			header('Location: ../index.php');
		}
		
	}else
		header('location: adicionar.php');

?>