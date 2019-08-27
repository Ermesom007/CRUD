<?php
// Sessão
session_start();


if($_POST){
	

		$fornecedores=$_POST['forne'];
		$cnpjforn=$_POST['cnpjforn'];
		$estadual=$_POST['estadual'];
		$teleforn=$_POST['teleforn'];
		
		try {
			
				include './db_connect.php';

				$connect = getConnection();

				//criando query para cadastrar
				$sql = 'call cadastrarFornecedor(?,?,?,?)';

				$stmt = $connect -> prepare($sql);
				$stmt -> bindValue(1,$fornecedores);
				$stmt -> bindValue(2,$teleforn);
				$stmt -> bindValue(3,$estadual);
				$stmt -> bindValue(4,$cnpjforn);

				if ($stmt->execute()) {
					$_SESSION['mensagem'] = "Erro ao atualizar";
					header('Location: ../index.php');
				}
				else{
					$_SESSION['mensagem'] = "Erro ao cadastrar";
					header('Location: ../adicionar.php');

				}

		 }
		 catch (Exception $e) {
			$_SESSION['mensagem'] = "Erro ao cadastrar";
			header('Location: ../adicionar.php');
		}
		
	}else{
		$_SESSION['mensagem'] = "Pagina Invalida";
		header('location: ../index.php');
	
	}

?>