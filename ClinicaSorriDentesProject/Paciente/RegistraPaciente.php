<?php

session_start();
require_once '../Paciente/Paciente.php';

/**
 * Description of Paciente
 *
 * @author Felipe
 */
$metodo = $_POST;

//PEGANDO VALORES DOS CAMPOS
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

        //SETANDO OS VALORES NO OBJETO
        $paciente = new Paciente();

        $paciente->setValor("NOME", $nome);
        $paciente->setValor("SEXO", $sexo);
        $paciente->setValor("DATANASC", $datanasc);
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

        if ($paciente->inserir($paciente)) {
            echo "<script>alert('Paciente cadastrado com sucesso!!');window.location = '../Telas/TelaCadastroPaciente.php';</script>";
        } else {
            echo "<script>alert('Você esqueceu de preencher algum campo obrigatório :/');window.history.back(1);</script>";
        }
}
?>