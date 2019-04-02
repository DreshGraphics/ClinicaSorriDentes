<?php
session_start();
require_once '../util/daoGenerico.php';
require_once '../Medico/Medico.php';

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}

$medico = new Medico();
$metodo = $_GET;
if (isset($metodo["medico"])) {
    $id = $metodo["medico"];
    $medico->valorpk = $id;
    $medico->pesquisarID($medico);
}
$dado = $medico->retornaDados("object");

if ($dado->IDMEDICO == null) {
    header("Location:../Medico/TelaMedicoTable.php");
}
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualizar Profissional</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/CadastraAtualiza.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="estilo.css" rel="stylesheet">
        <script src="../js/jquery-3.2.1.js"></script>
        <script type="text/javascript">

            $(document).ready(function () {
               var User = "<?php echo $NomeLogin ?>";
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
        <div class="container mid">

            <div class="row">
                <div class="col-sm-12">
                    <h2 class="titulo-h2">Atualizar Profissional</h2>

                    <form action="../Medico/AtualizaMedico.php?medico=<?php echo $dado->IDMEDICO ?>" method="POST">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control up" value="<?php echo $dado->NOME ?>" name="nome" id="nome" required>
                            </div>

                            <div class="form-group col-sm-3">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="DataNasc">Data de Nascimento</label>
                                <input type="text" class="form-control" value="<?php echo date("d-m-Y", strtotime($dado->NASCIMENTO)) ?>" name="dtanascimento" id="DataNasc" required>
                            </div>

                            <div class="form-group col-sm-3">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="conselhoId" >Conselho:</label>
                                <input type= "text" class="form-control" value="<?php echo $dado->CONSELHO ?>" name="conselho" id="conselhoId" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-5">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="telefoneId">Telefone:</label>
                                <input type="text" class="form-control" value="<?php echo $dado->TELEFONE ?>" name="telefone" id="telefoneId" required>
                            </div>

                            <div class="form-group col-sm-7">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="emailId">Email:</label>
                                <input type="email" class="form-control" value="<?php echo $dado->EMAIL ?>" name="email" id="emailId" required>
                            </div>
                        </div>

                        <div class="row"> 
                            <div class="form-group col-sm-4">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="tipoDeAtendimento">Tipo de Atendimento:</label>
                                <input type="text" class="form-control up" value="<?php echo $dado->TIPOATENDIMENTO ?>" name="tipodeatendimento" id="tipoDeAtendimento" required>

                            </div>

                            <div class="form-group col-sm-4">
                                 <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <label for="funcaoId">Função:</label>
                                <input type="text" class="form-control up" value="<?php echo $dado->FUNCAO ?>" name="funcao" id="funcaoId" required>
                            </div>

                            <div class="form-group col-sm-4">
                        
                                <label for="especialidadeId">Especialidade:</label>
                                <input type="text" class="form-control up" value="<?php echo $dado->ESPECIALIDADE ?>" name="especialidade" id="especialidadeId">
                            </div>
                        </div>

                        <button type="submit" class="bt-salvar">Salvar</button>
                        <a href="../Medico/TelaMedicoTable.php"><button type="button" class="bt-buscar">Voltar</button></a>
                    </form>

                </div>
            </div>
        </div>

        <footer>
            <h1><strong>Copyright &copy 2018 - Fábrica de Software</strong></h1>
        </footer>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#DataNasc').mask('00/00/0000');
                $('#telefoneId').mask('(00) 00000-0000');
            });
        </script>
    </body>
</html>
