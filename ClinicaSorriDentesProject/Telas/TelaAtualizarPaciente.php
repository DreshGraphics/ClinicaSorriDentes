<?php
/**
 * Description of Paciente
 *
 * @author Felipe
 */
session_start();
require_once '../util/daoGenerico.php';
require_once '../Paciente/Paciente.php';

if (isset($_SESSION["login"])) {
    $NomeLogin = $_SESSION["login"];
} else {
    header("Location: ../Telas/Index.php");
}

$paciente = new Paciente();

//RECUPERANDO ID PASSADO PELA URL
$Metodo = $_GET;
if (isset($Metodo["Idpaciente"])) {
    $id = $Metodo["Idpaciente"];

    $paciente->valorpk = $id;
    $paciente->pesquisarID($paciente);
}

$dado = $paciente->retornaDados("object");

if ($dado->IDPACIENTE == NULL) {
    header("Location: ../Paciente/TelaPacienteTable.php");
}
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atualizar Paciente</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/CadastraAtualiza.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="estilo.css" rel="stylesheet">
<!--            <script src="../js/ValidaCpf.js"></script>-->
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
                    <h2 class="titulo-h2">Atualizar Paciente</h2>
                    <form action="../Paciente/AtualizarPaciente.php?idPaciente=<?php echo $dado->IDPACIENTE; ?>" method="POST" onsubmit="return VerificaCPF();">

                        <div class="row">
                            <div class="form-group col-md-6" >
                                <label for="nome">Nome:</label>
                                <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <input type="text" class="form-control up" name="txtNome" value="<?php echo $dado->NOME ?>" id="nome" required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="dataNasc">Data de Nasc:</label>
                                <span class="obg" style="color: #A12126; font-size: 20px; float: right;">*</span>
                                <input type="date" class="form-control" name="txtDataNasc" value="<?php echo date("Y-m-d", strtotime($dado->NASCIMENTO)) ?>" id="dataNasc" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="sexo">Sexo:</label>
                                <select class="form-control" name="cxSexo" id="sexo">
                                    <option value="">-----</option>
                                    <option value="Masculino" <?php if ($dado->SEXO == "Masculino") echo 'selected'; ?>>Masculino</option>
                                    <option value="Feminino" <?php if ($dado->SEXO == "Feminino") echo 'selected'; ?>>Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="cpf">CPF:</label>
                                <input type="text" minlength="11" class="form-control" name="txtCPF" value="<?php echo $dado->CPF ?>" id="cpf"  onblur="return VerificaCPF();">
                                <span id="error" style="color: red;font-style: italic;"></span>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="atendimento">Tipo Atendimento:</label>
                                <input type="text" class="form-control up" name="txtAtendimento" value="<?php echo $dado->TIPOATENDIMENTO ?>" id="atendimento">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="eCivil">Estado Civil:</label>
                                <select class="form-control" name="cxEstadoCivil" id="eCivil">
                                    <option value="">-----</option>
                                    <option value="Casado(a)" <?php if ($dado->ESTADOCIVIL == "Casado(a)") echo 'selected'; ?>>Casado(a)</option>
                                    <option value="Solteiro(a)" <?php if ($dado->ESTADOCIVIL == "Solteiro(a)") echo 'selected'; ?>>Solteiro(a)</option>
                                    <option value="Divorciado(a)" <?php if ($dado->ESTADOCIVIL == "Divorciado(a)") echo 'selected'; ?>>Divorciado(a)</option>
                                    <option value="Viúvo(a)" <?php if ($dado->ESTADOCIVIL == "Viúvo(a)") echo 'selected'; ?>>Viúvo(a)</option>
                                    <option value="Separado(a)" <?php if ($dado->ESTADOCIVIL == "Separado(a)") echo 'selected'; ?>>Separado(a)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="profissao">Profissão:</label>
                                <input type="text" class="form-control up" name="txtProfissao" value="<?php echo $dado->PROFISSAO ?>" id="profissao">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="cidade">Cidade:</label>
                                <input type="text" class="form-control up" name="txtCidade" value="<?php echo $dado->CIDADE ?>" id="cidade">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="estado">Estado:</label>
                                <input type="text" class="form-control up" name="txtEstado" value="<?php echo $dado->ESTADO ?>" id="estado">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="CEP">CEP:</label>
                                <input type="text" minlength="8" class="form-control" name="txtCEP" value="<?php echo $dado->CEP ?>" id="CEP">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="celular">Celular:</label>
                                <input type="text" class="form-control" name="txtCelular" value="<?php echo $dado->CELULAR ?>" id="celular">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="bairro">Bairro:</label>
                                <input type="text" class="form-control up" name="txtBairro" value="<?php echo $dado->BAIRRO ?>" id="bairro">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="endereco">Endereço:</label>
                                <input type="text" class="form-control up" name="txtEndereco" value="<?php echo $dado->ENDERECO ?>" id="endereco">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero">Numero:</label>
                                <input type="number" class="form-control" name="txtNumero" value="<?php echo $dado->NUMERO ?>" id="numero">  
                            </div>

                            <div class="form-group col-md-3">
                                <label for="complemento">Complemento:</label>
                                <input type="text" class="form-control up" name="txtComplemento" value="<?php echo $dado->COMPLEMENTO ?>" id="complemento">
                            </div>
                        </div>

                        <button type="submit" value="Atualizar" name="btnAtualizar" class="bt-atualizar">Salvar</button>
                        <a href="../Paciente/TelaPacienteTable.php"><button type="button" class="bt-voltar">Voltar</button></a>
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
                                        $('#cpf').mask('000.000.000-00');
                                        $('#celular').mask('(00) 00000-0000');
                                        $('#CEP').mask('00000-000');
                                    });
        </script> 

    </body>
</html>
