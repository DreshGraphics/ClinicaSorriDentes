<?php
/**
 * Description of Controle Clinico
 *
 * @author Jonathan
 */
session_start();
require_once '../Consulta/ProcedimentoDente.php';
require_once '../Paciente/Paciente.php';
require_once '../Consulta/listarTudo.php';

$paciente = new Paciente();

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}

$metodo = $_GET;
if (isset($metodo["IDpaciente"])) {
    $idPaciente = $metodo["IDpaciente"];
}

$paciente->valorpk = $idPaciente;
$paciente->pesquisarID($paciente);

$dados = $paciente->retornaDados("object");

if ($dados->IDPACIENTE == NULL) {
    header("Location: ../Telas/TelaListaPacienteTable.php");
}

$listar = new listarTudo();
$con = $listar->listarPorIDPacientePorDAta($idPaciente);
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/tabela2.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Pesquisar Controle Clinico</title>
        <script src="../js/jquery-3.2.1.js"></script>    
    </head>
    <body ondragstart="return false;">
        <header id="topo">
            <input type="checkbox" id="bt_menu">
            <label for="bt_menu">&#9776;</label>
            <div id="right"><img src="../img/cct.png"></div>
            <nav class="menu" id="menu">
                <ul>
                    <li><a href="../Telas/Home.php">Início</a></li>
                    <li><a href="#">Cadastro</a>
                        <ul>
                            <li id="opcaoUser"><a href="../Telas/TelaCadastroUsuario.php">Usuário</a></li>
                            <li><a href="../Telas/TelaCadastroMedico.php">Profissional</a></li>
                            <li><a href="../Telas/TelaCadastroPaciente.php">Paciente</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Consulta</a>
                        <ul>
                            <li><a href="../Telas/TelaListaPacienteTable.php">Controle Clinico</a></li>
                        </ul>
                    </li>
                    <li><a href="../Login/Sair.php">Sair</a></li>
                </ul>
            </nav>
        </header>

        <div class="centro">
            <div class="container conteudo">

                <div class="table-responsive-md">
                  <table class="table">
                    <thead style="color: #f3f3f3;">
                        <tr>
                          <th scope="col">Paciente</th>
                          <th scope="col">Valor</th>
                          <th scope="col">Data</th>
                          <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody style="color: #f3f3f3;">
                        <?php while ($dado = $con->fetch_array()) { ?>
                            <tr>
                                <th scope="row">
                                <?php
                                    $paciente->valorpk = $dado["ID_PACIENTE"];

                                    $resultado = $paciente->pesquisarID($paciente);
                                    $dados = mysqli_fetch_array($resultado);

                                    echo $nomePaciente = $dados["NOME"];
                                ?>
                                </th>
                                <td><?php echo $dado["ORCAMENTO_FINAL"]; ?></td>
                                <td><?php echo date("d/m/Y", strtotime($dado["DATA"])); ?></td>
                                <td>
                                    <a target="_blank" href="../Telas/TelaVerProcedimento.php?idPaciente=<?php echo $dado["ID_PACIENTE"]; ?>&data=<?php echo date("Y-m-d", strtotime($dado["DATA"])) ?>">Relatório</a><span> | </span>
                                    <a href="../Telas/TelaAtualizarControleClinico.php?idPaciente=<?php echo $dado["ID_PACIENTE"]; ?>&data=<?php echo date("Y-m-d", strtotime($dado["DATA"])) ?>">Editar</a><span> | </span>
                                    <a href="">Orçamento</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
            </div>
        </div>

        <footer>
            <h1><strong>Copyright &copy 2018 - Fábrica de Software</strong></h1>
        </footer>
</html>
