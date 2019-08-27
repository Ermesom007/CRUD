<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])){
	
	$ic = mysqli_escape_string($connect, $_POST['id']);
	$nome = mysqli_escape_string($connect, $_POST['nome']);
	$cnpj = mysqli_escape_string($connect, $_POST['cnpj']);
	$estadual = mysqli_escape_string($connect, $_POST['estadual']);
	$telefone = mysqli_escape_string($connect, $_POST['telefone']);
	$sql = "UPDATE tb_fornecedor SET nm_fornecedor = '$nome',cd_cnpj = '$cnpj',cd_insc_estadual = '$estadual',cd_telefone='$telefone' WHERE cd_fornecedor = '$ic'";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	}else{
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	}

}else{
	$_SESSION['mensagem'] = "Pagina Invalida";
	header('Location: ../index.php');

}