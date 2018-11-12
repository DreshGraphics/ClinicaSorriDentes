<?php

session_start();
require_once '../util/daoGenerico.php';
require_once './Paciente.php';

$paciente = new Paciente();

$Metodo = $_GET;
if (isset($Metodo["idPaciente"])) {
    $id = $Metodo["idPaciente"];
}

$metodo = $_POST;
//PEGANDO VALORES DOS CAMPOS PARA ATUALIZAR
if (isset($metodo["txtNome"])) {
    $nome = $metodo["txtNome"];
    $sexo = $metodo["cxSexo"];
    $datanasc = $metodo["txtDataNasc"];
    $datanasc = date("Y-m-d", strtotime(str_replace('/', '-', $datanasc)));
    $cpf = $metodo["txtCPF"];
    $profissao = $metodo["txtProfissao"];
    $tipoAtendimento = $metodo["txtAtendimento"];
    $celular = $metodo["txtCelular"];
    $estadocivil = $metodo["cxEstadoCivil"];
    $endereco = $metodo["txtEndereco"];
    $bairro = $metodo["txtBairro"];
    $numero = $metodo["txtNumero"];
    $cidade = $metodo["txtCidade"];
    $estado = $metodo["txtEstado"];
    $complemento = $metodo["txtComplemento"];
    $cep = $metodo["txtCEP"];
    
        if ($cpf == ""){
         $paciente->setValor("CPF", "NULL");
    }

    //SETANDO VALORES PARA ATUALIZAR
    $paciente->setValor("NOME", $nome);
    $paciente->setValor("SEXO", $sexo);
    $paciente->setValor("NASCIMENTO", $datanasc);
    $paciente->setValor("CPF", $cpf);
    $paciente->setValor("PROFISSAO", $profissao);
    $paciente->setValor("TIPOATENDIMENTO", $tipoAtendimento);
    $paciente->setValor("CELULAR", $celular);
    $paciente->setValor("ESTADOCIVIL", $estadocivil);
    $paciente->setValor("ENDERECO", $endereco);
    $paciente->setValor("BAIRRO", $bairro);
    $paciente->setValor("NUMERO", $numero);
    $paciente->setValor("CIDADE", $cidade);
    $paciente->setValor("ESTADO", $estado);
    $paciente->setValor("COMPLEMENTO", $complemento);
    $paciente->setValor("CEP", $cep);

    $paciente->valorpk = $id;

    if ($paciente->atualizar($paciente)) {
        echo "<script>alert('Paciente atualizado com Sucesso.!');window.location = '../Paciente/TelaPacienteTable.php';</script>";
    } else {
        echo "<script>alert('Paciente atualizado com Sucesso.!');window.location = '../Paciente/TelaPacienteTable.php';</script>";
    }
} else {
    header("Location: ../Paciente/TelaPacienteTable.php");
}
?>
