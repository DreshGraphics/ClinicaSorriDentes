<?php

session_start();
require_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';
require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';

$metodo = $_POST;
$metodo2 = $_GET;

if (isset($metodo2["IDpaciente"])) {
    $idPaciente = $metodo2["IDpaciente"];
}

if (isset($metodo["procedimento"])) {
    $procedimento = $metodo["procedimento"];
    $Numdente = $metodo["numDente"];
    $importancia = $metodo["importancia"];
    $valor = $metodo["valor_unit"];
    $orcamentoFinal = $metodo["orçamentoFinal"];

    for ($i = 0; $i < count($metodo['procedimento']); $i++) {

        $dente = new ProcedimentoDente();
        $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
        $dente->setValor("NUMERO_DENTE", $Numdente[$i]);
        $dente->setValor("IMPORTANCIA", $importancia[$i]);
        $dente->setValor("VALORUNITARIO", $valor[$i]);
        $dente->setValor("ORCAMENTO_FINAL", $orcamentoFinal);
        $dente->setValor("ID_PACIENTE", $idPaciente);
        $resultado = $dente->inserir($dente);
    }

    if ($resultado) {
        echo "<script>alert('Procedimento salvo com Sucesso.!');window.location = '../Telas/TelaListaPacienteTable.php';</script>";
    } else {
        echo "<script>alert('Houve um erro ao tentar salvar dados no Banco. Por favor, tente Novamente.!');window.location = '../Telas/TelaControleClinico.php';</script>";
    }
}
