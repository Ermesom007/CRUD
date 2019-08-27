<?php
// Sessão
session_start();
// Conexão


require_once 'db_connect.php';

if(isset($_POST['btn-editar'])){
	$cod = mysqli_escape_string($connect, $_POST['cod']);
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$cep = mysqli_escape_string($connect, $_POST['cep']);
	$rua = mysqli_escape_string($connect, $_POST['rua']);
	$numero = mysqli_escape_string($connect, $_POST['numero']);
	$bairro = mysqli_escape_string($connect, $_POST['bairro']);
	

	
	$sql = "call upCliente('$cod','$nome','$telefone','$cep','$rua','$numero','$bairro')";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	}else{
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	}
}