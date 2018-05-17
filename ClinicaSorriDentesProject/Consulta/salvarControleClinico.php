<?php

$metodo = $_POST;

if(isset($metodo["qtd"])){
    $quantidade = $metodo["qtd"];
    $orcamento = $metodo["orcamento"];
    $importancia = $metodo["importancia"];
    
    foreach ($quantidade as $qtd){
        echo $qtd.'</br>';
    }
    
    foreach ($orcamento as $orc){
        echo $orc.'</br>';
    }
    
    foreach ($importancia as $imprt){
        echo $imprt.'</br>';
    }
    
    
    
    
    
}