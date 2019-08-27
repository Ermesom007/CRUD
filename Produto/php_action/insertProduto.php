<?php 
// Sessão
session_start();
		
	if($_POST) {

		echo "<pre>";
		print_r($_POST);
		echo "</pre>";

		
		//recebendo os dados do produto
		$fornecedor = $_POST['fornecedor'];
		$produto = $_POST['produto'];
		$qtlitros = $_POST['qtlitros'];
		$vlcusto = $_POST['vlcusto'];
		$vlvenda = $_POST['vlvenda'];
		$marca = $_POST['marca'];


		//try {
			
				include './db_connect.php';

				$conn = getConnection();

				//criando query para cadastrar cliente
				$sql = "call cadastrarProduto(?,?,?,?,?,?)";

				$stmt = $conn -> prepare($sql);
				$stmt -> bindValue(1,"I");
				$stmt -> bindValue(2,$produto);
				$stmt -> bindValue(3,$qtlitros);
				$stmt -> bindValue(4,$vlcusto);
				$stmt -> bindValue(5,$vlvenda);
				$stmt -> bindValue(6,$marca);
				$stmt -> bindValue(7,$fornecedor);

   
				

			//inserindo PRODUTO
			if($stmt->execute()){
					$_SESSION['mensagem'] = "produto Salvo com sucesso!";
					header('Location: ../index.php');
			}
			
		//} catch (Exception $e) {
			$_SESSION['mensagem'] = "Erro ao cadastrar";
			header('Location: ../index.php');
		//}
		

	}else{
		$_SESSION['mensagem'] = "Pagina Invalida";
		header('location: ../escolher_fornecedor.php');
		
	}
	

?>