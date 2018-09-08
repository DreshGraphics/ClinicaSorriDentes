<?php

session_start();

include_once '../Medico/Medico.php';

$Metodo = $_POST;
if (isset($Metodo["nome"])) {
    $nome = $Metodo["nome"];
    $telefone = $Metodo["telefone"];
    $email = $Metodo["email"];
    $dtanascimento = $Metodo["dtanascimento"];
    $dtanascimento = date("Y-m-d", strtotime(str_replace('/', '-', $dtanascimento)));
    $conselho = $Metodo["conselho"];
    $especialidade = $Metodo["especialidade"];
    $funcao = $Metodo["funcao"];
    $tipodeatendimento = $Metodo["tipodeatendimento"];

    $medico = new Medico();
    $medico->setValor("NOME", $nome);
    $medico->setValor("TELEFONE", $telefone);
    $medico->setValor("EMAIL", $email);
    $medico->setValor("NASCIMENTO", $dtanascimento);
    $medico->setValor("CONSELHO", $conselho);
    $medico->setValor("ESPECIALIDADE", $especialidade);
    $medico->setValor("FUNCAO", $funcao);
    $medico->setValor("TIPOATENDIMENTO", $tipodeatendimento);

    if ($medico->inserir($medico)) {
        echo "<script>alert('Profissional cadastrado com sucesso !');window.location = '../Telas/TelaCadastroMedico.php';</script>";
    } else {
        echo "<script>alert('Houve um erro ao tentar registrar um novo Profissional. Por favor, tente novamente.! ');window.history.back(1);</script>";
    }
}