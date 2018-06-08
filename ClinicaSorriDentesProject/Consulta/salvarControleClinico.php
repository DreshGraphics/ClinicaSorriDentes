<?php
session_start();
require_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';
require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';

$metodo = $_POST;

if(isset($metodo["procedimento"])){
    $procedimento = $metodo["procedimento"];
    $Numdente = $metodo["numDente"];
    $importancia = $metodo["importancia"];
    $quantidade = $metodo["quant"];
    $valor = $metodo["valor_unit"];
    
    $idPaciente = $_SESSION["idPaciente"];
    
    for( $i=0; $i<count($metodo['procedimento']); $i++ ){
            
        //$resultado = $dente->Salvar($procedimento[$i], $importancia[$i],$valor[$i]);
        
        $dente = new ProcedimentoDente();
        $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
        $dente->setValor("NUMERO_DENTE", $Numdente[$i]);
        $dente->setValor("IMPORTANCIA", $importancia[$i]);
        $dente->setValor("QUANTIDADE", $quantidade[$i]);
        $dente->setValor("VALOR", $valor[$i]);
        $dente->setValor("ID_PACIENTE", $idPaciente);
        $resultado = $dente->inserir($dente);       
    }
    
    
    if($resultado){
        echo "<script>alert('Dados de Processo salvo com Sucesso!');window.location = '../Telas/TelaListaPacienteTable.php';</script>";
    }else{
        echo "<script>alert('Erro ao tentar salvar dados no Banco!');window.location = '../Telas/TelaControleClinico.php';</script>";
    }
}
