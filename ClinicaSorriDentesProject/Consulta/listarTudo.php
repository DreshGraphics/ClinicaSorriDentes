<?php

include_once '../util/daoGenerico.php';
include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class listarTudo extends ConexaoDB {

    public function listarPorIDPaciente($chave) {

        $dao = new daoGenerico();

        $sql = "SELECT * FROM `procedimento` WHERE ID_PACIENTE=" . $chave . ";";

        $resultado = mysqli_query($this->conexao, $sql);

        if ($resultado) {
            return $resultado;
        } else {
            echo "<script>alert('Houve um erro ao tentar buscar dados no Banco.!');"
            . "window.history.back(1);</script>";
        }
    }

    public function contadorLinhas($chave) {

        $dao = new daoGenerico();

        $sql = "SELECT IDPROCEDIMENTO FROM `procedimento` WHERE ID_PACIENTE=" . $chave . ";";

        $resultado = mysqli_query($this->conexao, $sql);

        $contator = mysqli_num_rows($resultado);

        if ($contator) {
            return $contator;
        } else {
            echo "<script>alert('Houve um erro ao tentar buscar dados no Banco.!');"
            . "window.history.back(1);</script>";
        }
    }

    public function listarPorIDPacientePorDAta($chave) {

        $dao = new daoGenerico();

        $sql = "SELECT * FROM `procedimento` WHERE ID_PACIENTE=" . $chave . " GROUP BY DATE(DATA) ORDER BY DATE(DATA) ASC";

        $resultado = mysqli_query($this->conexao, $sql);

        if ($resultado) {
            return $resultado;
        } else {
            echo "<script>alert('Houve um erro ao tentar buscar dados no Banco.!');"
            . "window.history.back(1);</script>";
        }
    }

    public function listarDadosPorPacienteData($idPaciente, $data) {

        $dao = new daoGenerico();

        $sql = "SELECT * FROM `procedimento` WHERE ID_PACIENTE=" . $idPaciente . " AND date(DATA)='".$data."'";

        $resultado = mysqli_query($this->conexao, $sql);

        if ($resultado) {
            return $resultado;
        } else {
            echo "<script>alert('Houve um erro ao tentar buscar dados no Banco.!');"
            . "window.history.back(1);</script>";
        }
    }

}
