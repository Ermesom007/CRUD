<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-deletar'])){
	
	$id = mysqli_escape_string($connect, $_POST['id']);
	
	$sql="call delUsuario('$id')";
		
		if(mysqli_query($connect, $sql)){
				$_SESSION['mensagem'] = "Deletado Com Sucesso";
				header('Location: ../index.php');
				
		
			}else{
				$_SESSION['mensagem'] = "Erro ao deletar";
				header('Location: ../index.php');
			}

}else{
	$_SESSION['mensagem'] = "Pagina Invalida";
	header('Location: ../index.php');	
}

