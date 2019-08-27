<?php 
// Sessão
session_start();


	
	if($_POST) {
		//recebendo os dados do usuario
		$nome=$_POST['nome'];
		

		//recebendo dados de login
		$login=$_POST['login'];
		$senha =$_POST['senha'];	
		$nivel=$_POST['nivel'];



		


		try {
			
				include './db_connect.php';

				$conn = getConnection();

				//criando query para cadastrar cliente
				$sql = 'call cadastrarUsuario(?,?,?,?)';

				$stmt = $conn -> prepare($sql);
				$stmt -> bindValue(1,$nome);
				$stmt -> bindValue(2,$login);
				$stmt -> bindValue(3,$senha);
				$stmt -> bindValue(4,$nivel);


				
			    
				

			//inserindo cliente
			if($stmt->execute()){
					$status = $stmt->fetch(PDO::FETCH_ASSOC)['cd_status'];
					if($status == 1){
						echo 'login já existe!';
						$_SESSION['mensagem'] = "Login Existente na Base de Dados";
						header('Location: ../index.php');
					}else{
							echo 'usuario cadastrado com sucesso!';
							$_SESSION['mensagem'] = "Usuario Cadastrado com Sucesso";
							header('Location: ../index.php');
					}
					
					
					

				
			}else
				header('location: adicionar.php');
						
			//header('location: index.php');

		} catch (Exception $e) {
			$_SESSION['mensagem'] = "Erro ao cadastrar";
			header('Location: ../index.php');
		}
		
	}else{
		$_SESSION['mensagem'] = "Pagina Invalida";
		header('location: ../adicionar_usuario.php');
	}

?>