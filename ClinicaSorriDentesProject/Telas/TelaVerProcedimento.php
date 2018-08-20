<?php
session_start();
include_once '../Login/ProtectPaginas.php';
include_once '../Paciente/Paciente.php';
include_once '../Consulta/FichaClinica.php';
include_once '../Consulta/listarTudo.php';
include_once '../Consulta/ProcedimentoDente.php';
include_once '../util/daoGenerico.php';

protect();
if (isset($_SESSION["tipoUsuario"])) {
    $tipo_user = $_SESSION["tipoUsuario"];
}

$metodo_get = $_GET;
if(isset($metodo_get["idPaciente"])){
$idPaciente = $metodo_get["idPaciente"];
}

$paciente = new Paciente();
$paciente->valorpk = $idPaciente;
$paciente->pesquisarID($paciente);

$procedimento = new ProcedimentoDente();

$listar = new listarTudo();
$con = $listar->listarPorIDPaciente($idPaciente);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Procedimentos</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/TelaRelatorio.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../js/ValidaCpf.js"></script>
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/login.js"></script>

        <script type="text/javascript">

            $(document).ready(function () {

                var tipo_user = "<?php echo $tipo_user ?>";

                if (tipo_user != "Administrador") {
                    document.getElementById("opcaoUser").style.display = "none";
                }

            });

        </script>

    </head>
    <body>
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

        <div class="container mid">
            <div class="col-sm-12 paciente">
                <h4>Cliníca Sorridentes</h4>
                <h4>Relatorio de Procedimentos</h4>            
            </div>
            
            <?php while ($dado = $paciente->retornaDados("object")) { ?>
            <div class="dadosPacientes">
                <div class="row">
                    <div class="col-md-4" >
                        <p>Nome</p>
                        <p><?php echo $dado->NOME?></p>
                    </div>

                    <div class="col-md-2">
                        <p>Data de Nascimento</p>
                        <p><?php echo date("d/m/Y", strtotime ($dado->DATANASC)) ?></p>
                    </div>

                    <div class="col-md-2">
                        <p>Sexo</p>
                        <p><?php echo $dado->SEXO?></p>
                    </div>

                    <div class="col-md-2" >
                        <p>CPF</p>
                        <p><?php echo $dado->CPF?></p>
                    </div>

                    <div class="col-md-2">
                        <p>Tipo de Atendimento</p>
                        <p><?php echo $dado->TIPOATENDIMENTO?></p>
                    </div>

                    <div style="margin-top: 5px;">

                        <div class="col-md-2">
                            <p>Celular</p>
                            <p><?php echo $dado->CELULAR?></p>
                        </div>

                        <div class="col-md-2" >
                            <p>Cidade</p>
                            <p><?php echo $dado->CIDADE?></p>
                        </div>

                        <div class="col-md-2">
                            <p>Estado</p>
                            <p><?php echo $dado->ESTADO?></p>
                        </div>

                        <div class="col-md-2">
                            <p>CEP</p>
                            <p><?php echo $dado->CEP?></p>
                        </div>

                        <div class="col-md-2">
                            <p>Bairro</p>
                            <p><?php echo $dado->BAIRRO?></p>
                        </div>

                        <div class="col-md-2">
                            <p>Numero</p>
                            <p><?php echo $dado->NUMERO?></p>
                        </div> 

                        <div class="col-md-2" >
                            <p>Endereço</p>
                            <p><?php echo $dado->ENDERECO?></p>
                        </div>
                        
                        <div class="col-md-3" >
                            <p>Situacão</p>
                            <p><?php echo $dado->SITUACAO?></p>
                        </div>
                    </div>      
                </div>
            </div>
            <?php } ?>
            
            <?php while ($dado = $con->fetch_array()) { ?>
            <div class="linha-campos">
                <div class="row">

                    <div class="form-group col-md-3">
                        <p for="proc">Procedimento</p>
                        <p><?php echo $dado["PROCEDIMENTO"] ?></p>
                    </div>

                    <div class="form-group col-md-3">
                        <p>Número do Dente</p>
                        <p><?php echo $dado["NUMERO_DENTE"] ?></p>
                    </div>

                    <div class="form-group col-md-3">
                        <p for="proc">Importância</p>
                        <p><?php echo $dado["IMPORTANCIA"] ?></p>
                    </div>

                    <div class="form-group col-md-3">
                        <p>Valor Unitário</labpel>
                        <p>R$ <?php echo $dado["VALOR"] ?></p>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group separador col-sm-12">
                    </div>    
                </div> 
            </div>
               <?php 
               $orcamento = $dado["ORCAMENTO_FINAL"];
            } ?>
            
            <div id="container-total">
                <div class="row">
                    
                    <div class="col-sm-3">
                        <p>Orçamento Final</p>
                        <p>R$ <?php echo $orcamento; ?></p>
                       
                    </div>

                </div>
            </div>
        </div> 
        <footer>
            <h1>Copyright &copy 2018 - Fábrica de Software</h1>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#dataNasc').mask('00/00/0000');
                $('#cpf').mask('000.000.000-00');
                $('#numero').mask('#########');
                $('#celular').mask('(00) 00000-0000');
                $('#CEP').mask('00000-000');
            });
        </script>
    </body>
</html>