<?php
session_start();

require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';

$dente = new ProcedimentoDente();

$metodo = $_POST;

if(isset($metodo["procedimento"])){
    $procedimento = $metodo["procedimento"];
    $importancia = $metodo["importancia"];
    $orcamentoFinal = $metodo["orçamentoFinal"];
    
    
    for( $i=0; $i<count($metodo['procedimento']); $i++ ){
            
        $dente->setValor("NUMERO_DENTE", "6");
        $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
        $dente->setValor("IMPORTANCIA", $importancia[$i]);
       
    }
    
    $dente->inserir($dente);
    
}
