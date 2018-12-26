<?php
session_start();

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cadastro Paciente</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/CadastraAtualiza.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
                    <h2 class="titulo-h2">Cadastro Paciente</h2>
                    <form action="../Paciente/RegistraPaciente.php" method="POST" onsubmit="return VerificaCPF();">

                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="nome">Nome:</label>
                                <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <input type="text" class="form-control up" name="txtNome" id="nome" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="dataNasc">Data de Nasc:</label>
                                <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <input type="date" class="form-control" name="txtDataNasc" id="dataNasc" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexo">Sexo:</label>
                                <select class="form-control" name="cxSexo" id="sexo">
                                    <option value="">-----</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF:</label>
                                <input type="text" minlength="11" class="form-control" name="txtCPF" id="cpf">
                                <span id="error" style="color: red;font-style: italic;"></span>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="atendimento">Tipo Atendimento:</label>
                                <input type="text" class="form-control up" name="txtAtendimento" id="atendimento">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="eCivil">Estado Civil:</label>
                                <select class="form-control" name="cxEstadoCivil" id="eCivil">
                                    <option value="">-----</option>
                                    <option value="Casado(a)">Casado(a)</option>
                                    <option value="Solteiro(a)">Solteiro(a)</option>
                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                    <option value="Viúvo(a)">Viúvo(a)</option>
                                    <option value="Separado(a)">Separado(a)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="profissao">Profissão:</label>
                                <input type="text" class="form-control up" name="txtProfissao" id="profissao">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control up" name="txtCidade" id="cidade">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control up" name="txtEstado" id="estado">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="CEP">CEP:</label>
                                <input type="text" minlength="8" class="form-control" name="txtCEP" id="CEP">
                            </div>

                            <div class="form-group col-md-2">
                                <label for="celular">Celular:</label>
                                <input type="text" class="form-control" name="txtCelular" id="celular">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control up" name="txtBairro" id="bairro">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control up" name="txtEndereco" id="endereco">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero">Numero:</label>
                                <input type="number" class="form-control" name="txtNumero" id="numero">  
                            </div>

                            <div class="form-group col-md-3">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control up" name="txtComplemento" id="complemento">
                            </div>
                        </div>

                        <button type="submit" value="Cadastrar" name="btnSalvar" class="bt-salvar">Salvar</button>
                        <a href="../Paciente/TelaPacienteTable.php"><button type="button" class="bt-buscar">Buscar</button></a>

                    </form>
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
                                        $('#celular').mask('(00) 00000-0000');
                                        $('#CEP').mask('00000-000');
                                    });
        </script>
    </body>
</html>