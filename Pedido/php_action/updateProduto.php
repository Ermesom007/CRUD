<?php
// Sessão
session_start();
// Conexão
require_once 'db_connect.php';

if(isset($_POST['btn-editar'])){
	$produto = mysqli_escape_string($connect, $_POST['produto']);
	$qtlitros = mysqli_escape_string($connect, $_POST['qtlitros']);
	$vlcusto = mysqli_escape_string($connect, $_POST['vlcusto']);
	$vlvenda = mysqli_escape_string($connect, $_POST['vlvenda']);
	$cod = mysqli_escape_string($connect, $_POST['id']);
	
	

	
	$sql = "UPDATE tb_produto SET ds_produto= '$produto',qt_litros='$qtlitros',vl_custo='$vlcusto',vl_venda='$vlvenda' where cd_produto = '$cod'";

	if(mysqli_query($connect, $sql)){
		$_SESSION['mensagem'] = "Atualizado com sucesso!";
		header('Location: ../index.php');
	}else{
		$_SESSION['mensagem'] = "Erro ao atualizar";
		header('Location: ../index.php');
	}
}