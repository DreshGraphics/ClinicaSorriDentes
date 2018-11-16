<?php

session_start();
require_once '../util/daoGenerico.php';
require_once '../Paciente/Paciente.php';
require_once './validarCPF.php';

/**
 * Description of Paciente
 *
 * @author Felipe
 */
$Valcpf = new validaCPF();

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
    
    $paciente = new Paciente();
    $resultado = $Valcpf->ValidarCPF($cpf);
    $dados = mysqli_fetch_array($resultado);
    
    if (!isset($dados["CPF"])) {
        //SETANDO OS VALORES NO OBJETO  
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

        if ($paciente->inserir($paciente)) {
            echo "<script>alert('Paciente cadastrado com Sucesso.!');window.location = '../Telas/TelaCadastroPaciente.php';</script>";
        } else {
            echo "<script>alert('Houve um erro ao tentar cadastrar um Paciente. Por favor, tente mais tarde.! ');window.history.back(1);</script>";
        }
    } else {
        echo "<script>alert('O CPF informado ja existe.!');window.history.back(1);</script>";
    }
}
?>