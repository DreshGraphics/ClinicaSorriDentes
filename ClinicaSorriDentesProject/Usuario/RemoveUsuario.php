<?php

session_start();

require_once '../util/daoGenerico.php';
require_once './Usuario.php';

//Recuperar o id do usuario a ser Deletado
$Metodo = $_GET;
if (isset($Metodo["usuario"])) {
    $id = $Metodo["usuario"];

    $usuario = new Usuario();
    $usuario->valorpk = $id;

    if ($usuario->deletar($usuario)) {
        echo "
		<script>
			alert('Usuário deletado com Sucesso!')
			location.href='TelaUsuarioTable.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Houve um erro ao tentar deletar o usuario no Sistema. Por favor, Tente novamente.!');
			location.href='TelaUsuarioTable.php';
		</script>";
    }
} else {
    header("Location: ./TelaUsuarioTable.php");
}
