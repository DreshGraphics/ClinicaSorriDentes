<?php

session_start();

use Dompdf\Dompdf;

include_once '../Paciente/Paciente.php';
include_once '../Consulta/listarTudo.php';
include_once '../Consulta/ProcedimentoDente.php';
include_once '../util/daoGenerico.php';
require_once '../dompdf/autoload.inc.php';

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}

$metodo_get = $_GET;
if (isset($metodo_get["idPaciente"]) && ($metodo_get["data"])) {
    $idPaciente = $metodo_get["idPaciente"];
    $data = $metodo_get["data"];
}

$paciente = new Paciente();
$paciente->valorpk = $idPaciente;
$paciente->pesquisarID($paciente);

$dado = $paciente->retornaDados("object");

if ($dado->IDPACIENTE == NULL) {
    header("Location: ../Consulta/TelaControleClinicoTable.php");
}

$procedimento = new ProcedimentoDente();
$listar = new listarTudo();
$con = $listar->listarDadosPorPacienteData($idPaciente, $data);

$nome = $dado->NOME;
$data = date("d/m/Y", strtotime($dado->NASCIMENTO));
$sexo = $dado->SEXO;
$CPF = $dado->CPF;
$atendimento = $dado->TIPOATENDIMENTO;
$celular = $dado->CELULAR;
$estado = $dado->ESTADO;
$cep = $dado->CEP;
$endereco = $dado->ENDERECO;
$bairro = $dado->BAIRRO;
$cidade = $dado->CIDADE;
$numero = $dado->NUMERO;

$html = '<table class="paciente">';
$html .= '<tr>';
$html .= '<th>Nome</th>';
$html .= '<th>Data de Nascimento</th>';
$html .= '<th>Sexo</th>';
$html .= '<th>CPF</th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td>' . $nome . '</td>';
$html .= '<td>' . $data . '</td>';
$html .= '<td>' . $sexo . '</td>';
$html .= '<td>' . $CPF . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<th>Tipo de Atendimento</th>';
$html .= '<th>Celular</th>';
$html .= '<th>Estado</th>';
$html .= '<th>CEP</th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td>' . $atendimento . '</td>';
$html .= '<td>' . $celular . '</td>';
$html .= '<td>' . $estado . '</td>';
$html .= '<td>' . $cep . '</td>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<th>Endereço</th>';
$html .= '<th>Bairro</th>';
$html .= '<th>Cidade</th>';
$html .= '<th>Numero</th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td>' . $endereco . '</td>';
$html .= '<td>' . $bairro . '</td>';
$html .= '<td>' . $cidade . '</td>';
$html .= '<td>' . $numero . '</td>';
$html .= '</tr>';

$html .= '</table>';

while ($dadosProcedimento = $con->fetch_array()) {

    $html .= '<table class="procedimentos">';
    $html .= '<tr>';
    $html .= '<th>Procedimento</th>';
    $html .= '<th>Número do Dente</th>';
    $html .= '<th>Importância</th>';
    $html .= '<th>Valor Unitario</th>';
    $html .= '</tr>';

    $html .= '<tr>';
    $html .= '<td>' . $dadosProcedimento["PROCEDIMENTO"] . '</td>';
    $html .= '<td>' . $dadosProcedimento["NUMERO_DENTE"] . '</td>';
    $html .= '<td>' . $dadosProcedimento["IMPORTANCIA"] . '</td>';
    $html .= '<td>' . 'R$ ' . $dadosProcedimento["VALORUNITARIO"] . '</td>';
    $html .= '</tr>';
    $html .= '</table>';

    $orcamento = $dadosProcedimento["ORCAMENTO_FINAL"];
}

$html .= '<table class="vlrTotal">';
$html .= '<tr>';
$html .= '<th>Orçamento Final</th>';
$html .= '</tr>';

$html .= '<tr>';
$html .= '<td>' . 'R$ ' . $orcamento . '</td>';
$html .= '</tr>';
$html .= '</table>';

$dompdf = new Dompdf();

$dompdf->load_html('<style>
            
            .paciente{
                border: 1px solid #ccc;
                margin: 0 auto;
            }
            
            th{
                width: 160px;
                padding-left: 15px;
                padding-top: 15px;
                text-align: center;
            }
            
            td{
                padding-left: 15px;
                text-align: center;
            }
            
            .procedimentos{
                border-bottom: 1px solid #ccc;
                margin: 0 auto;
                margin-top: 40px;
            }
            
            .vlrTotal{
                margin-top:10px;
            }
            
        </style>
        <h4 style="text-align: center">Cliníca Sorridentes</h4>
        <h4 style="text-align: center">Relatorio de Procedimentos</h4>
        ' . $html . '');

$dompdf->render();

$dompdf->stream("Relatorio de Procedimentos.pdf", array(
    "Attachment" => FALSE
        )
);
?>

