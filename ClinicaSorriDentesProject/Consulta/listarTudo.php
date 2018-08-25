<?php
include_once '../util/daoGenerico.php';
include_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';

class listarTudo extends ConexaoDB {
    
    public function listar($chave){
        
        $dao = new daoGenerico();
        
	$sql = "SELECT * FROM `procedimento_dentes` GROUP BY ID_PACIENTE ORDER BY ORCAMENTO_FINAL ASC";
        
        $resultado = mysqli_query($this->conexao, $sql);

        return $resultado;    
    }
        
    public function listarPorIDPaciente($chave){
        
        $dao = new daoGenerico();
        
	$sql = "SELECT * FROM `procedimento_dentes` WHERE ID_PACIENTE=".$chave.";";
        
        $resultado = mysqli_query($this->conexao, $sql);

        return $resultado;    
    }
    
    public function listarIDS($chave){
        
        $dao = new daoGenerico();
        
	$sql = "SELECT IDDENTE FROM `procedimento_dentes` WHERE ID_PACIENTE=".$chave.";";
        
        $resultado = mysqli_query($this->conexao, $sql);

        return $resultado;    
    }
    
    public function contadorLinhas($chave){
        
        $dao = new daoGenerico();
        
	$sql = "SELECT IDDENTE FROM `procedimento_dentes` WHERE ID_PACIENTE=".$chave.";";
        
        $resultado = mysqli_query($this->conexao, $sql);
        
        $contator = mysqli_num_rows($resultado);
        
        return $contator;
 
    }
    
    public function listarPorIDPacientePorDAta($chave){
        
        $dao = new daoGenerico();
        
	$sql = "SELECT * FROM `procedimento_dentes` WHERE ID_PACIENTE=".$chave." GROUP BY DATA ORDER BY DATA ASC";
        
        $resultado = mysqli_query($this->conexao, $sql);

        return $resultado;    
    }
    
    public function listarDadosPorPacienteData($idPaciente, $data){
        
        $dao = new daoGenerico();
        
	$sql = "SELECT * FROM `procedimento_dentes` WHERE ID_PACIENTE=".$idPaciente." AND DATA='".$data."'";
        
        $resultado = mysqli_query($this->conexao, $sql);

        return $resultado;    
    }
    
    
    
}