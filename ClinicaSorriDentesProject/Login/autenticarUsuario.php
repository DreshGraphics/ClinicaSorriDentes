<?php

session_start();

include_once '../util/daoGenerico.php';
include_once '../Login/ValidarLogin.php';
include_once '../Usuario/Usuario.php';

$valida = new ValidarLogin();

$metodo = $_POST;
//Recuperando dados dos campos
if (isset($metodo["username"]) && (md5($metodo["password"]))) {
    $login = $metodo["username"];
    $senha = md5($metodo["password"]);


//Chamando o metodo valida e passando por paramentro o login e a senha
    $resultado = $valida->Autenticar($login, $senha);

//Recuperar o valor do objeto
    $dados_usuario = mysqli_fetch_array($resultado);

    if (isset($dados_usuario['LOGIN']) && ($dados_usuario['SENHA'])) {

        $_SESSION["tipoUsuario"] = $dados_usuario["TIPOUSUARIO"];

        echo "<script>window.location = '../Telas/Home.php';</script>";
    } else {
        echo "<script>alert('Login ou Senha Incorretos!');window.location = '../Telas/Index.php';</script>";
    }
}





