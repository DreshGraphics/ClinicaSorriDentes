<?php
/**
 * Description of Paciente
 *
 * @author Felipe
 */
session_start();
require_once '../Paciente/Paciente.php';

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}

$paciente = new Paciente();
$paciente->retornaTudo($paciente);
?>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/tabela.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Pesquisar Paciente</title>
        <script src="../js/jquery-3.2.1.js"></script>    
        <script type="text/javascript">

            $(document).ready(function () {
              var User = "<?php echo $NomeLogin ?>";
            });
        </script>

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
            <div class="conteudo">
                <table>
                    <thead>
                        <tr class="titulo-table">
                            <th class="column1">Id</th>
                            <th class="column2">Nome</th>
                            <th class="column4">Sexo</th>
                            <th class="column5">Tipo Atendimento</th>
                            <th class="column6">Ação</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($dado = $paciente->retornaDados("object")) { ?>
                            <tr class="tabela">
                                <td><?php echo $dado->IDPACIENTE ?></td>
                                <td class="up"><?php echo $dado->NOME ?></td>
                                <td class="up"><?php echo $dado->SEXO ?></td>
                                <td class="up"><?php echo $dado->TIPOATENDIMENTO ?></td>
                                <td class="column6"><a href="../Telas/TelaAtualizarPaciente.php?Idpaciente=<?php echo $dado->IDPACIENTE; ?>">Editar</a> 
                                    <a href="" id="separador">|</a>
                                    <a href="javascript: if(confirm('Tem certeza que quer deletar o Paciente <?php echo $dado->NOME; ?> ?')) 
                                       location.href='RemovePaciente.php?Idpaciente=<?php echo $dado->IDPACIENTE; ?>';">Excluir</a>
                                </td>
                            </tr> 
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>

        <footer>
            <h1>Copyright &copy 2018 - Fábrica de Software</h1>
        </footer>
</html>
