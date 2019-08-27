<?php
// Sessão
session_start();



if(isset($_POST['btn-editar'])){
	$cod = ($_POST['cod']);
	$nome = ($_POST['nome']);
	$login = ($_POST['login']);
	$senha = ($_POST['senha']);
	$nivel = ($_POST['nivel']);
	
			

			try {
					include './db_connect.php';
					
					$conn = getConnection();					
					$sql = "call upUsuario(?,?,?,?,?)";
					
					$stmt = $conn -> prepare($sql);
					$stmt -> bindValue(1,$cod);
					$stmt -> bindValue(2,$nome);
					$stmt -> bindValue(3,$login);
					$stmt -> bindValue(4,$senha);
					$stmt -> bindValue(5,$nivel);

					if($stmt ->execute()){
						$status = $stmt ->fetch(PDO::FETCH_ASSOC)['cd_status'];
						if($status == 1){
							$_SESSION['mensagem'] = "Email já Existente";
							header('Location: ../index.php');


						}else{
							$_SESSION['mensagem'] = "Usuario alterado com Sucesso";
							header('Location: ../index.php');


						}
						
					}


				
			} catch (Exception $e) {
				$_SESSION['mensagem'] = "Erro ao atualizar";
				header('Location: ../index.php');


			}
	




	}else{
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	}

?>