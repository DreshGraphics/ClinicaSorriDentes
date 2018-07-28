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
$contadorBD = $listar->contadorLinhas($idPaciente);

$metodo = $_POST;

 $contadorLinhasForm = count($metodo['procedimento']);

if(isset($metodo["procedimento"])){
     $procedimento = $metodo["procedimento"];
     $Numdente = $metodo["numDente"];
     $importancia = $metodo["importancia"];
     $quantidade = $metodo["quant"];
     $valor = $metodo["valor_unit"];
     $orcamentoFinal = $metodo["orçamentoFinal"];
     
     
    for( $i=0; $i<$dado = $con->fetch_array(); $i++ ){
            $dente = new ProcedimentoDente();
            $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
            $dente->setValor("NUMERO_DENTE", $Numdente[$i]);
            $dente->setValor("IMPORTANCIA", $importancia[$i]);
            $dente->setValor("QUANTIDADE", $quantidade[$i]);
            $dente->setValor("VALOR", $valor[$i]);
            $dente->setValor("ORCAMENTO_FINAL", $orcamentoFinal);
            $dente->setValor("ID_PACIENTE", $idPaciente);
          
           $dente->valorpk = $dado["IDDENTE"];
           $atualizar = $dente->atualizar($dente);  
    }
    
    if ($contadorLinhasForm > $contadorBD){
        for( $i=$contadorBD; $i<count($metodo['procedimento']); $i++ ){
            $dente = new ProcedimentoDente();
            $dente->setValor("PROCEDIMENTO", $procedimento[$i]);
            $dente->setValor("NUMERO_DENTE", $Numdente[$i]);
            $dente->setValor("IMPORTANCIA", $importancia[$i]);
            $dente->setValor("QUANTIDADE", $quantidade[$i]);
            $dente->setValor("VALOR", $valor[$i]);
            $dente->setValor("ORCAMENTO_FINAL", $orcamentoFinal);
            $dente->setValor("ID_PACIENTE", $idPaciente);
            
            $Salvar = $dente->inserir($dente); 
        }
    }
    
    if ($atualizar || $Salvar){
         echo "
		<script>
			alert('Processo realizado com Sucesso!')
			location.href='../Consulta/TelaControleClinicoTable.php';
		</script>";
    }else{
        echo "
		<script>
			alert('Erro ao tentar realizar operações no Sistema!!!')
			location.href='../Consulta/TelaControleClinicoTable.php';
		</script>";
    }
    
}

