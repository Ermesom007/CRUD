<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])){
	
	$id = mysqli_escape_string($connect, $_POST['id']);
	
	$sql="DELETE FROM tb_contato WHERE cd_cliente = '$id'";
		
		if(mysqli_query($connect, $sql)){
			
			$sql="DELETE FROM tb_logradouro WHERE cd_cliente = '$id'";
		
			if(mysqli_query($connect, $sql)){

				$sql="DELETE FROM cliente_pf WHERE cd_cliente = '$id'";

				$sql2="DELETE FROM cliente_pj WHERE cd_cliente = '$id'";

				mysqli_query($connect, $sql);
				mysqli_query($connect, $sql2);


					$sql = "DELETE FROM tb_cliente WHERE cd_cliente = '$id'";

					if(mysqli_query($connect, $sql)){
							$_SESSION['mensagem'] = "Deletado com sucesso!2 ";
							header('Location: ../index.php');
					}else{
							$_SESSION['mensagem'] = "Erro ao deletar";
							header('Location: ../index.php');
					}

				
		
			}else{
				$_SESSION['mensagem'] = "Erro ao deletar";
				header('Location: ../index.php');
			}

		}else{
			$_SESSION['mensagem'] = "Erro ao deletar";
			header('Location: ../index.php');	
		}
}
