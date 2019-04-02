<?php
session_start();

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro Usuário</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">
        <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <fieldset>
                    <legend>Cadastro de Usuário</legend>   
                    <form action="../Usuario/RegistraUsuario.php" method="POST">

                        <p> 
                            <label for="nomeU">Nome</label> 

                        </p>
                        <input type="text" name="nome" id="nomeU" required>

                        <p> 
                            <label for="loginU">Login</label> 

                        </p>
                        <input type="text" name="login" id="loginU" required>
                        <p> 
                            <label for="senhaU">Senha</label> 

                        </p>
                        <input type="password" name="senha" id="senhaU" required>

                        
                        <button type="submit" name="salvar" class="bt-salvar">Salvar</button>
                        <a href="../Usuario/TelaUsuarioTable.php"><button type="button" class="bt-buscar">Buscar</button></a>
                    </form>
                </fieldset>
            </div>
        </div>
        <footer>
            <h1><strong>Copyright &copy 2018 - Fábrica de Software</strong></h1>
        </footer>
    </body>
</html>