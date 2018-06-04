<?php
session_start();
require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';
/**
 *
 *
 * @author Felipe
 */

//PEGANDO O ID DO PROCEDIMENTO CLINICO A SER DELETADO
$pegarId = $_GET;
if(isset($pegarId["IdDente"])){
    $id = $pegarId["IdDente"];
    
    $procedimento = new ProcedimentoDente();
    $procedimento->valorpk = $id;
    
    if ($procedimento->deletar($procedimento)){
        echo "
		<script>
			alert('Procedimento deletado com sucesso!!')
			location.href='TelaControleClinicoTable.php';
		</script>";
    }else{
        echo "
		<script>
			alert('Não foi possivel deletar o procedimento especifico!!.');
			location.href='TelaControleClinicoTable.php';
		</script>";
    }
}
