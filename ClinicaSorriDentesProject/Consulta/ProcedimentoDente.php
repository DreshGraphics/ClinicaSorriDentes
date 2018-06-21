<?php

include_once '../util/baseBD.php';

class ProcedimentoDente extends baseBD {
    public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "procedimento_dentes";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "NUMERO_DENTE" => NULL,
                "PROCEDIMENTO" => NULL, 
                "IMPORTANCIA" => NULL,
                "VALOR" => NULL,
                "ORCAMENTO_FINAL" => NULL,
                "ID_PACIENTE"=>NULL
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDDENTE";
    }
}
