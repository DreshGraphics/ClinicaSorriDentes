<?php

include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class fkControle extends ConexaoDB {
    public function gerarFkControle(){
        
        $sql = "ALTER TABLE FICHA_CLINICA ADD CONSTRAINT FK_FICHACLINICA_PACIENTE
                FOREIGN KEY FICHA_CLINICA(ID_PACIENTE) REFERENCES PACIENTE(IDPACIENTE)";
        
        $fkPaciente = mysqli_query($this->conexao, $sql);
        
        if ($fkPaciente){
            return $fkPaciente;
        }else{
            echo"Ocorreu um erro ao tentar gerar o FK.";
        }
    }
}
