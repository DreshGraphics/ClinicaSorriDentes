<?php

require_once '../util/baseBD.php';

class ControleClinico extends baseBD {
     public function __construct($campos = array()) {
        parent::__construct();
        $this->tabela = "ficha_clinica";
        if (sizeof($campos) <= 0) {
            $this->campos_valores = array(
                "DATA_FICHA" => NULL,
                "MEDICO_RESPONSAVEL" => NULL, 
                "OBSERVACOES" => NULL,
            );
        } else {
            $this->campos_valores = $campos;
        }
        $this->campopk="IDFICHACLINICA";
    }
    
}
