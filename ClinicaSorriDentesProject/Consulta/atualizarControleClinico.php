<?php 

session_start();
require_once '../BancoDeDados/Conexao_Banco_ClinicaSorridentes.php.inc';
require_once '../util/daoGenerico.php';
require_once '../Consulta/ProcedimentoDente.php';
require_once '../Consulta/listarTudo.php';

$metodo2 = $_GET;
$metodo2["IDPaciente"];
$idPaciente = $metodo2["IDPaciente"];

$listar = new listarTudo();
$con = $listar->listarPorIDPaciente($idPaciente);

$metodo = $_POST;
if(isset($metodo["procedimento"])){
    echo $procedimento = $metodo["procedimento"];
    echo $Numdente = $metodo["numDente"];
    echo $importancia = $metodo["importancia"];
    echo $quantidade = $metodo["quant"];
    echo $valor = $metodo["valor_unit"];
    echo $orcamentoFinal = $metodo["orçamentoFinal"];
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
//    $idPaciente = $_SESSION["idPaciente"];
//       
//    $i=0;
//    
//    while($dado = $con->fetch_array()){
//            
//        $dente = new ProcedimentoDente();
//        $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
//        $dente->setValor("NUMERO_DENTE", $Numdente[$i]);
//        $dente->setValor("IMPORTANCIA", $importancia[$i]);
//        $dente->setValor("QUANTIDADE", $quantidade[$i]);
//        $dente->setValor("VALOR", $valor[$i]);
//        $dente->setValor("ORCAMENTO_FINAL", $orcamentoFinal);
//        $dente->setValor("ID_PACIENTE", $idPaciente);
//                    
//       $dente->valorpk = $dado["IDDENTE"];
//       $resultado = $dente->atualizar($dente);
//       
//        $i = $i+1;           
//    }
//    
//    
//    if($resultado){
//        echo "<script>alert('Dados de Processo atualizados com Sucesso!');window.location = '../Telas/TelaListaPacienteTable.php';</script>";
//    }else{
//        echo "<script>alert('Erro ao tentar atualizar dados no Banco!');window.location = '../Telas/TelaControleClinico.php';</script>";
//    }
}
