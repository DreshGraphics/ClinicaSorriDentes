<?php

include_once '../util/daoGenerico.php';
include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class ValidaCadastro extends ConexaoDB {

    public function validarCadastro($login) {

        $dao = new daoGenerico();

        $sql = "SELECT LOGIN FROM usuario WHERE LOGIN = '$login' ";

        $resultado = mysqli_query($this->conexao, $sql);

        if ($resultado) {
            return $resultado;
        } else {
            echo "<script>alert('Houve um erro ao tentar buscar usuario no banco.!');window.location = '../Telas/TelaCadastroUsuario.php';</script>";
        }
    }

}
