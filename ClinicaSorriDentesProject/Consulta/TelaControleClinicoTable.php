<?php
/**
 * Description of Controle Clinico
 *
 * @author Jonathan
 */
session_start();
require_once '../Consulta/ProcedimentoDente.php';
require_once '../Paciente/Paciente.php';
require_once '../Consulta/ProcedimentoDente.php';
require_once '../Consulta/listarTudo.php';

$metodo = $_GET;
if (isset($metodo["IDpaciente"])) {
    $idPaciente = $metodo["IDpaciente"];
} else {
    header('Location:../Telas/TelaListaPacienteTable.php');
}

$procedimento = new ProcedimentoDente();
$procedimento->retornaTudo($procedimento);

$paciente = new Paciente();

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
    <script src="../js/login.js"></script>
        
    </head>
    <body ondragstart="return false;">
    <header id="topo">
    <input type="checkbox" id="bt_menu">
    <label for="bt_menu">&#9776;</label>
    <div id="right"><img src="../img/cct.png"></div>
    <nav class="menu" id="menu">
        <ul>
            <li><a href="../Telas/Home.php">Inicio</a></li>
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
    <div class="conteudo">

        <div class="row titulo-boot">
            <div class="form-group col-sm-3">
                Paciente
            </div>

            <div class="form-group col-sm-2">
                Valor
            </div>
            
             <div class="form-group col-sm-3">
                Data
            </div>

            <div class="form-group col-sm-4">
                Ação
            </div>
        </div>
    
            <?php while ($dado = $con->fetch_array()){ ?>
                <div class="row tupla">
                    <div class="form-group col-sm-3">
                        <?php 
                           $paciente->valorpk = $dado["ID_PACIENTE"];
        
                           $resultado = $paciente->pesquisarID($paciente);
                           $dados = mysqli_fetch_array($resultado);
                           
                           echo $nomePaciente = $dados["NOME"];
                        ?>
                    </div>

                    <div class="form-group col-sm-2">
                        <?php echo $dado["ORCAMENTO_FINAL"]; ?>
                    </div>
                    
                    <div class="form-group col-sm-3">
                        <?php echo date("d/m/Y", strtotime($dado["DATA"])); ?>
                    </div>

                    <div class="form-group col-sm-4">
                        <a href="../Telas/TelaVerProcedimento.php?idPaciente=<?php echo $dado["ID_PACIENTE"];?>">Ver Procedimento</a>
                        <a href="../Telas/TelaAtualizarControleClinico.php?idPaciente=<?php echo $dado["ID_PACIENTE"];?>">| Editar</a>
                    </div>
                </div>
            <?php } ?>
  </div>
</div>

    <footer>
        <h1>Copyright &copy 2018 - Fábrica de Software</h1>
    </footer>
</html>
