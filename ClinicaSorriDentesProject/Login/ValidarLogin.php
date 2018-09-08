<?php

include_once '../util/daoGenerico.php';
include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class ValidarLogin extends ConexaoDB {

    public function Autenticar($login, $senha) {

        $dao = new daoGenerico();

        $sql = " SELECT * FROM usuario WHERE LOGIN = '$login'"
                . "AND senha = '$senha'";

        $resultado_id = mysqli_query($this->conexao, $sql);

        if ($resultado_id) {
            return $resultado_id;
        } else {
            echo "<script>alert('Houve um erro ao tentar carregar dados de Login e Senha no Banco.!');window.location = '../Telas/Index.php';</script>";
        }
    }

}
