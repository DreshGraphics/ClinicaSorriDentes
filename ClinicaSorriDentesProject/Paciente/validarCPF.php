<?php

include_once '../util/daoGenerico.php';
include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class validaCPF extends ConexaoDB {

    public function ValidarCPF($cpf) {

        $dao = new daoGenerico();

        $sql = "SELECT CPF FROM `paciente` WHERE CPF = '$cpf' AND CPF != '';";

        $resultado = mysqli_query($this->conexao, $sql);

        if ($resultado) {
            return $resultado;
        } else {
            echo "<script>alert('Houve um erro ao tentar buscar CPF no banco.!');window.location = '../Telas/TelaCadastroPaciente.php';</script>";
        }
    }

}
