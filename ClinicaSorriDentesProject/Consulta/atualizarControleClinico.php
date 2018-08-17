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

$remocao = 1;
$atualizar = 1;
$Salvar = 1;

$contadorLinhasForm = count($metodo['procedimento']);


  //Verificar se exite ids para excluir
        if (isset($metodo["pegandoIds"])) {
            for ($i = 0; $i < count($metodo['pegandoIds']); $i++) {
                $procedimento = new ProcedimentoDente();
                $procedimento->valorpk = $metodo["pegandoIds"][$i];
                $remocao = $procedimento->deletar($procedimento);
            }
        }

if (isset($metodo["procedimento"])) {
    $procedimento = $metodo["procedimento"];
    $Numdente = $metodo["numDente"];
    $importancia = $metodo["importancia"];
    $quantidade = $metodo["quant"];
    $valor = $metodo["valor_unit"];
    $orcamentoFinal = $metodo["orçamentoFinal"];
                 
        //Atualizando dados no banco
        for ($i = 0; $i < $dado = $con->fetch_array(); $i++) {
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
                       
       //Se o numero de linhas no banco for maior do que o numero de linhas do meu form, ele salva.
        if ($contadorLinhasForm > $contadorBD) {
            for ($i = $contadorBD; $i < count($metodo['procedimento']); $i++) {
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
        
                
        //Verificando se houve algum erro no registro, update ou remoção dos dados no banco
        if ($atualizar||$Salvar||$remocao){
             echo "
		<script>
			alert('Alterações realizadas com Sucesso.!');
                        window.history.back(1);
			
		</script>";
        }else{
             echo "
		<script>
			alert('Erro ao tentar realizar alterações no Sistema.!');
                        window.location = '../Consulta/TelaControleClinicoTable.php';
                       	
		</script>";
        }    
}   
?>
