<?php

include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class fkDente extends ConexaoDB{
   
    public function gerarFkIDPaciente(){
        
        $sql = "ALTER TABLE DENTES ADD CONSTRAINT FK_DENTES_PACIENTE
                FOREIGN KEY DENTES(ID_PACIENTE_DENTE) REFERENCES PACIENTE(IDPACIENTE)";
        
        $fkPaciente = mysqli_query($this->conexao, $sql);
         
        if ($fkPaciente){
            return $fkPaciente;
        }else{
            echo"Ocorreu um erro ao tentar gerar o FK.";
        }
    }
    
    public function gerarFKIdFicha(){
        
        $sql = "ALTER TABLE DENTES ADD CONSTRAINT FK_DENTES_FICHACLINICA
                     FOREIGN KEY DENTES(ID_FICHACLINICA) REFERENCES FICHA_CLINICA(IDFICHACLINICA)";
        
        $fkFicha = mysqli_query($this->conexao, $sql);
        
        if($fkFicha){
            return $fkFicha;
        }else{
            echo"Ocorreu um erro ao tentar gerar o FK.";
        }
    }
}
