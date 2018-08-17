<?php
session_start();
include_once '../Login/ProtectPaginas.php';
include_once '../Paciente/Paciente.php';
include_once '../Consulta/ProcedimentoDente.php';
require_once '../Consulta/listarTudo.php';
protect();

if (isset($_SESSION["tipoUsuario"])) {
    $tipo_user = $_SESSION["tipoUsuario"];
}

$procedimento = new ProcedimentoDente();
$metodo = $_GET;

if (isset($metodo["idPaciente"])) {
    $id = $metodo["idPaciente"];
    $procedimento->valorpk = $id;
    $procedimento->pesquisarID($procedimento);
}
$dados = $procedimento->retornaDados("object");

$listar = new listarTudo();
$con = $listar->listarPorIDPaciente($id);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Controle Clinico</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/CadastraAtualiza.css">
        <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway:700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="../js/jquery-3.2.1.js"></script>
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
            <div class="row col-md-12">
                <h2 class="titulo-h2">Controle Clinico</h2>

                <h4>Paciente: <?php echo $_SESSION["nomePaciente"] ?> </h4>

            </div>
            <?php while ($dado = $con->fetch_array()) { ?>
                <form method="POST" action="../Consulta/atualizarControleClinico.php?IDPaciente=<?php echo $dado["ID_PACIENTE"]; ?>">   

                    <div id="linhas-container">
                        <div class="linha-campos"> 
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="qtd">Quantidade</label>
                                    <input type="number" value="<?php echo $dado["QUANTIDADE"] ?>" name="quant[]" id="qtd" onkeyup="calcular();"/>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="proc">Procedimento</label>
                                    <select name="procedimento[]" id="procedimento">
                                        <option value="extração" <?php if ($dado["PROCEDIMENTO"] == "extração") echo 'selected'; ?>>extração</option>
                                        <option value="obturação amálgama" <?php if ($dado["PROCEDIMENTO"] == "obturação amálgama") echo 'selected'; ?>>obturação amálgama</option>
                                        <option value="obturaçao luz halogênea" <?php if ($dado["PROCEDIMENTO"] == "obturaçao luz halogênea") echo 'selected'; ?> >obturaçao luz halogênea</option>
                                        <option value="tratamento canal" <?php if ($dado["PROCEDIMENTO"] == "tratamento canal") echo 'selected'; ?>>tratamento canal</option>
                                        <option value="limpeza" <?php if ($dado["PROCEDIMENTO"] == "limpeza") echo 'selected'; ?>>limpeza</option>
                                        <option value="remoção de tártaro" <?php if ($dado["PROCEDIMENTO"] == "remoção de tártaro") echo 'selected'; ?>>remoção de tártaro</option>
                                        <option value="flúor" <?php if ($dado["PROCEDIMENTO"] == "flúor") echo 'selected'; ?>>flúor</option>
                                        <option value="pivot" <?php if ($dado["PROCEDIMENTO"] == "pivot") echo 'selected'; ?>>pivot</option>
                                        <option value="coroa porcelana" <?php if ($dado["PROCEDIMENTO"] == "coroa porcelana") echo 'selected'; ?>>coroa porcelana</option>
                                        <option value="coroa venne" <?php if ($dado["PROCEDIMENTO"] == "coroa venne") echo 'selected'; ?>>coroa venne</option>
                                        <option value="cirurgia" <?php if ($dado["PROCEDIMENTO"] == "cirurgia") echo 'selected'; ?>>cirurgia</option>
                                        <option value="prótese superior" <?php if ($dado["PROCEDIMENTO"] == "prótese superior") echo 'selected'; ?>>prótese superior</option>
                                        <option value="prótese inferior" <?php if ($dado["PROCEDIMENTO"] == "prótese inferior") echo 'selected'; ?>>prótese inferior</option>
                                        <option value="radiografia" <?php if ($dado["PROCEDIMENTO"] == "radiografia") echo 'selected'; ?>>radiografia</option>
                                        <option value="aparelho" <?php if ($dado["PROCEDIMENTO"] == "aparelho") echo 'selected'; ?>>aparelho</option>
                                        <option value="clareamento c/ moldeiras" <?php if ($dado["PROCEDIMENTO"] == "clareamento c/ moldeiras") echo 'selected'; ?>>clareamento c/ moldeiras</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Número do Dente</label>
                                    <input type="number" value="<?php echo $dado["NUMERO_DENTE"] ?>" name="numDente[]">
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="proc">Importância</label>
                                    <select name="importancia[]" id="importancia">
                                        <option value="BAIXA IMPORTANCIA" <?php if ($dado["IMPORTANCIA"] == "BAIXA IMPORTANCIA") echo 'selected'; ?>>BAIXA IMPORTANCIA</option>
                                        <option value="MEDIA IMPORTANCIA" <?php if ($dado["IMPORTANCIA"] == "MEDIA IMPORTANCIA") echo 'selected'; ?>>MEDIA IMPORTANCIA</option>
                                        <option value="ALTA IMPORTANCIA" <?php if ($dado["IMPORTANCIA"] == "ALTA IMPORTANCIA") echo 'selected'; ?>>ALTA IMPORTANCIA</option>

                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Valor Unitário</label>
                                    <input type="number" value="<?php echo $dado["VALOR"]; ?>" name="valor_unit[]" onkeyup="calcular();"/>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Total Individual</label>
                                    <input type="number" name="total[]" readonly="readonly">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-3">
                                    <button type="button" class="bt-remover" id="<?php echo $dado["IDDENTE"]; ?>">Remover</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group separador col-sm-12">
                                </div>    
                            </div> 

                        </div> 
                    </div>
                    <?php
                    //Recuperando oorçamento final
                    $orcamento = $dado["ORCAMENTO_FINAL"];
                    ?>
                <?php } ?>

                <div class="input_fields">
                    <!-- RECEBE DIVS DINAMICAS -->
                </div>

                <div id="container-total">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>Valor Total</label>
                            <input type="number" id="vlTotal" name="valor_total[]" readonly="readonly">
                        </div>

                        <div class="form-group col-sm-3">
                            <label>Orçamento Final</label>
                            <input type="text" value="<?php echo $orcamento; ?>" name="orçamentoFinal" id="orçamentoFinal">
                        </div>
                    </div>
                </div>
                <button type="submit" class="bt-salvar">Salvar</button>
                <button type="button" id="btn2" class="bt-buscar add_campo">Adicionar</button>
                <button type="button" class="bt-buscar"><a href="../Consulta/TelaControleClinicoTable.php">Pesquisar</a></button>
            </form>
        </div>
        <footer>
            <h1 id="fbs">Copyright &copy 2018 - Fábrica de Software</h1>
        </footer>
    </body>
    <script type="text/javascript">

        calcular();

        var max_fields = 20; //maximo de inputs permitidos
        var wrapper = $(".input_fields"); //campo
        var add_button = $(".add_campo"); //ID do botão

        var x = 1; //contagem de caixa de texto inicial
        $(add_button).click(function (e) { //em adicionar botão de entrada, clique
            e.preventDefault();
            var length = wrapper.find("input:text").length;

            if (x < max_fields) {
                x++; //text box increment
                $(wrapper).append('<div id="linhas-container"><div class="linha-campos"><div class="row"><div class="form-group col-md-3"><label for="qtd">Quantidade</label><input type="number" value="0" name="quant[]" id="qtd" onkeyup="calcular();"></div><div class="form-group col-md-3"><label for="proc">Procedimento</label><select name="procedimento[]" id="procedimento"><option>extração</option><option>obturação amálgama</option><option>obturaçao luz halogênea</option><option>tratamento canal</option><option>limpeza</option><option>remoção de tártaro</option><option>flúor</option><option>pivot</option><option>coroa porcelana</option><option>coroa venne</option><option>cirurgia</option><option>prótese superior</option><option>prótese inferior</option><option>radiografia</option><option>aparelho</option><option>clareamento c/ moldeiras</option></select></div><div class="form-group col-md-3"><label>Número do Dente</label><input type="number" name="numDente[]"></div><div class="form-group col-md-3"><label for="proc">Importância</label><select name="importancia[]" id="importancia"><option>BAIXA IMPORTANCIA</option><option>MEDIA IMPORTANCIA</option><option>ALTA IMPORTANCIA</option></select></div><div class="form-group col-md-3"><label>Valor Unitário</label><input type="number" value="0" name="valor_unit[]" onkeyup="calcular();"></div><div class="form-group col-md-3"><label>Total Individual</label><input type="number" value="0" name="total[]" readonly="readonly"></div></div><div class="row"><div class="form-group col-sm-3"><button type="button" class="bt-remover" id="removerDiv">Remover</button></div></div><div class="row"><div class="form-group separador col-sm-12"></div></div></div></div>');

            }
            //Fazendo com que cada uma escreva seu name
            wrapper.find("input:text" + "select").each(function () {
                $(this).val($(this).attr('name'))
            });
        });

        //removendo os campos
        $(document).on('click', '.bt-remover', function () {
            $(this).parents('#linhas-container').remove();

            calcular();

            return false;
        });

        Ids = new Array();

        //Pegar o id do botção clicado para remover
        $('.bt-remover').click(function () {

            var id = $(this).attr('id');

            Ids.push(id);

        });

        //Recuperar os Ids e mandar para o arquivo do php
        $('.bt-salvar').click(function () {
            
            
                  $.ajax({
                    type: "POST",
                    url: "../Consulta/atualizarControleClinico.php",
                    data: {pegandoIds: Ids},
                    success: function (data) {
                        console.log(data);
                    }
                  });          
        });

        function calcular() {
            var quantidade = document.getElementsByName('quant[]');
            var valor = document.getElementsByName('valor_unit[]');
            var total = 0;

            for (i = 0; i < quantidade.length; i++) {

                var quant = parseFloat(quantidade[i].value);
                var valorUnit = parseFloat(valor[i].value);
                var totalIndividual = document.getElementsByName("total[]")[i].value = quant * valorUnit;
                jQuery(totalIndividual);
                total += totalIndividual;

            }

            document.getElementById('vlTotal').value = total;
        }

    </script>
</html>


