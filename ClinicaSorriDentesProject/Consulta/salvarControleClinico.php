<?php
session_start();
require_once '../Consulta/RegistraProcessoDente.php';
require_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';
require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';

$dente = new ProcedimentoDente();
$dente = new RegistraProcessoDente();

$metodo = $_POST;

if(isset($metodo["procedimento"])){
    $procedimento = $metodo["procedimento"];
    $importancia = $metodo["importancia"];
    $valor = $metodo["valor_uni"];
    
    
    for( $i=0; $i<count($metodo['procedimento']); $i++ ){
            
        $resultado = $dente->Salvar($procedimento[$i], $importancia[$i],$valor[$i]);
        
       /* 
        $dente->setValor("NUMERO_DENTE", "6");
        $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
        $dente->setValor("IMPORTANCIA", $importancia[$i]);
         $dente->inserir($dente);*/
       
    }
    
    if($resultado){
        echo "<script>alert('Dados de Processo salvo com Sucesso!');window.location = '../Telas/TelaControleClinico.php';</script>";
    }else{
        echo "<script>alert('Erro ao tentar salvar dados no Banco!');window.location = '../Telas/TelaControleClinico.php';</script>";
    }
}