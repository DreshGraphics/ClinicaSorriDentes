<?php

include_once '../util/daoGenerico.php';
include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class RegistraProcessoDente extends ConexaoDB{
    
    public function Salvar($procedimento, $importancia,$valorUni){
         $sql = "INSERT INTO procedimento_dentes(PROCEDIMENTO, IMPORTANCIA, VALOR) VALUES('$procedimento','$importancia','$valorUni')";
        
         $resultado = mysqli_query($this->conexao, $sql);
         
         if ($resultado){
             return $resultado;
         } else {
            echo "<script>alert('Erro ao tentar Salvar processo no banco!');window.location = '../Telas/TelaControleClinico.php';</script>";
            
         }

    }
    
}
