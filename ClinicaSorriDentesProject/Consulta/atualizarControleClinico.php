<?php
session_start();
require_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';
require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';
include_once '../Login/ProtectPaginas.php';
protect();

$metodo2 = $_GET;
if (isset($metodo2["IDprocedimento"])) {
    $id = $metodo2["IDprocedimento"];
}

$metodo = $_POST;

if(isset($metodo["procedimento"])){
    $procedimento = $metodo["procedimento"];
    $Numdente = $metodo["numDente"];
    $importancia = $metodo["importancia"];
    $quantidade = $metodo["quant"];
    $valor = $metodo["valor_unit"];
    $orcamentoFinal = $metodo["orçamentoFinal"];
    
    $idPaciente = $_SESSION["idPaciente"];
    
    $dente = new ProcedimentoDente();
    $dente->setValor("PROCEDIMENTO", $procedimento);
    $dente->setValor("NUMERO_DENTE", $Numdente);
    $dente->setValor("IMPORTANCIA", $importancia);
    $dente->setValor("QUANTIDADE", $quantidade);
    $dente->setValor("VALOR", $valor);
    $dente->setValor("ORCAMENTO_FINAL", $orcamentoFinal);
    $dente->setValor("ID_PACIENTE", $idPaciente);
    
    
    $dente->valorpk = $id;
    

    if($dente->atualizar($dente)){
        echo "<script>alert('Dados de Processo atualizado com Sucesso!');window.location = '../Telas/TelaListaPacienteTable.php';</script>";
    }else{
        echo "<script>alert('Erro ao tentar atualizar dados no Banco!');window.location = '../Telas/TelaControleClinico.php';</script>";
    }
}
