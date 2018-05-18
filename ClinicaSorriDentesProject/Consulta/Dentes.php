<?php

include_once '../util/baseBD.php';

class Dentes extends baseBD {
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "dentes";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "NOME_DENTE" => NULL,
                "PROCEDIMENTO" => NULL, 
                "VALOR" => NULL, 
                "ID_PACIENTE_DENTE" => NULL,
                "ID_FICHACLINICA" => NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDDENTE";
    }
}
