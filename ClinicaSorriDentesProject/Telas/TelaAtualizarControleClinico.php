<?php
session_start();
include_once '../Login/ProtectPaginas.php';
include_once '../Paciente/Paciente.php';
include_once '../Consulta/ProcedimentoDente.php';
protect();

if(isset($_SESSION["tipoUsuario"])){
    $tipo_user = $_SESSION["tipoUsuario"];
}


$procedimento = new ProcedimentoDente();
$metodo = $_GET;
if(isset($metodo["idControle"])){
    $id = $metodo["idControle"];
    $procedimento->valorpk = $id;
    $procedimento->pesquisarID($procedimento);
}
$dado = $procedimento->retornaDados("object");
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
        <script src="../js/jquery-3.2.1.js"></script>
        
        <script type="text/javascript">
            
            $(document).ready(function(){
              
              var tipo_user = "<?php echo $tipo_user ?>";
              
              if(tipo_user != "Administrador"){
                   document.getElementById("opcaoUser").style.display = "none";
              }
              
              atualizarTotal();
                               
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

            <form method="POST" action="../Consulta/atualizarControleClinico.php?IDprocedimento=<?php echo $dado->IDDENTE ?>">

                <div id="linhas-container">
                    <div class="linha-campos">

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label for="qtd">Quantidade</label>
                                <input type="number" value="<?php echo $dado->QUANTIDADE ?>" name="quant" id="qtd">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="proc">Procedimento</label>
                                <select name="procedimento" id="procedimento">
                                    <option value="extração" <?php if($dado->PROCEDIMENTO == "extração") echo 'selected';  ?>>extração</option>
                                    <option value="obturação amálgama" <?php if($dado->PROCEDIMENTO == "obturação amálgama") echo 'selected';  ?>>obturação amálgama</option>
                                    <option value="obturaçao luz halogênea" <?php if($dado->PROCEDIMENTO == "obturaçao luz halogênea") echo 'selected';  ?> >obturaçao luz halogênea</option>
                                    <option value="tratamento canal" <?php if($dado->PROCEDIMENTO == "tratamento canal") echo 'selected';  ?>>tratamento canal</option>
                                    <option value="limpeza" <?php if($dado->PROCEDIMENTO == "limpeza") echo 'selected';  ?>>limpeza</option>
                                    <option value="remoção de tártaro" <?php if($dado->PROCEDIMENTO == "remoção de tártaro") echo 'selected';  ?>>remoção de tártaro</option>
                                    <option value="flúor" <?php if($dado->PROCEDIMENTO == "flúor") echo 'selected';  ?>>flúor</option>
                                    <option value="pivot" <?php if($dado->PROCEDIMENTO == "pivot") echo 'selected';  ?>>pivot</option>
                                    <option value="coroa porcelana" <?php if($dado->PROCEDIMENTO == "coroa porcelana") echo 'selected';  ?>>coroa porcelana</option>
                                    <option value="coroa venne" <?php if($dado->PROCEDIMENTO == "coroa venne") echo 'selected';  ?>>coroa venne</option>
                                    <option value="cirurgia" <?php if($dado->PROCEDIMENTO == "cirurgia") echo 'selected';  ?>>cirurgia</option>
                                    <option value="prótese superior" <?php if($dado->PROCEDIMENTO == "prótese superior") echo 'selected';  ?>>prótese superior</option>
                                    <option value="prótese inferior" <?php if($dado->PROCEDIMENTO == "prótese inferior") echo 'selected';  ?>>prótese inferior</option>
                                    <option value="radiografia" <?php if($dado->PROCEDIMENTO == "radiografia") echo 'selected';  ?>>radiografia</option>
                                    <option value="aparelho" <?php if($dado->PROCEDIMENTO == "aparelho") echo 'selected';  ?>>aparelho</option>
                                    <option value="clareamento c/ moldeiras" <?php if($dado->PROCEDIMENTO == "clareamento c/ moldeiras") echo 'selected';  ?>>clareamento c/ moldeiras</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Número do Dente</label>
                                <input type="number" value="<?php echo $dado->NUMERO_DENTE ?>" name="numDente">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="proc">Importância</label>
                                <select name="importancia" id="importancia">
                                    <option value="BAIXA IMPORTANCIA" <?php if($dado->IMPORTANCIA == "BAIXA IMPORTANCIA") echo 'selected';  ?>>BAIXA IMPORTANCIA</option>
                                    <option value="MEDIA IMPORTANCIA" <?php if($dado->IMPORTANCIA == "MEDIA IMPORTANCIA") echo 'selected';  ?>>MEDIA IMPORTANCIA</option>
                                    <option value="ALTA IMPORTANCIA" <?php if($dado->IMPORTANCIA == "ALTA IMPORTANCIA") echo 'selected';  ?>>ALTA IMPORTANCIA</option>

                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Valor Unitário</label>
                                <input type="number" value="<?php echo $dado->VALOR ?>" name="valor_unit">
                            </div>

                            <div class="form-group col-md-3">
                                <label>Total Individual</label>
                                <input type="number" value="0" name="total" readonly="readonly">

                            </div>

                        </div>
                    </div>
                </div>

                <div id="container-total">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label>Valor Total</label>
                            <input type="number" value="0" name="valor_total" readonly="readonly">
                        </div>

                        <div class="form-group col-sm-3">
                            <label>Orçamento Final</label>
                            <input type="text" value="<?php echo $dado->ORCAMENTO_FINAL ?>" name="orçamentoFinal" id="orçamentoFinal">
                        </div>

                    </div>

                    <button class="bt-salvar">Salvar</button>
                    <button id="botao-add" class="bt-buscar">Adicionar</button>
                    <button type="button" class="bt-buscar"><a href="../Consulta/TelaControleClinicoTable.php">Pesquisar</a></button>

                </div>
            </form>
        </div>
    </div>

    <footer>
        <h1 id="fbs">Copyright &copy 2018 - Fábrica de Software</h1>
    </footer>

</body>
</html>
<script type="text/javascript">
    var linhasCont = document.querySelector('#linhas-container');
    var totalCont = document.querySelector('#container-total');
    var primLinha = linhasCont.querySelector('.linha-campos');
    var linhas = [];

    linhas.push(primLinha);

    primLinha.addEventListener('input', function () {
        atualizarTotal();
    });

    totalCont.querySelector('#botao-add').addEventListener('click', function (e) {
        e.preventDefault();
        var novaLinha = primLinha.cloneNode(true);

        novaLinha.querySelector('input[name="valor_unit"]').value = 0;
        novaLinha.querySelector('input[name="quant"]').value = 0;

        var botDeletar = document.createElement('button');
        $(botDeletar).addClass("bt-remover");

        botDeletar.innerText = "Remover";

        botDeletar.addEventListener('click', function (e) {
            e.preventDefault();
            linhasCont.removeChild(this.parentNode);
            linhas.splice(linhas.indexOf(this.parentNode), 1);
            atualizarTotal();
        });

        novaLinha.appendChild(botDeletar);

        novaLinha.addEventListener('input', function () {
            atualizarTotal();
        });

        linhas.push(novaLinha);
        linhasCont.appendChild(novaLinha);

        atualizarTotal();
    });

    function atualizarTotal() {
        var total = 0;

        for (var i = 0; i < linhas.length; i++) {
            var linha = linhas[i];
            var valorUnit = parseFloat(linha.querySelector('input[name="valor_unit"]').value);
            var qtd = parseFloat(linha.querySelector('input[name="quant"]').value);

            var totalProd = qtd * valorUnit;

            linha.querySelector('input[name="total"]').value = totalProd;

            total += totalProd;
        }

        totalCont.querySelector('input[name=valor_total]').value = total;
    }
</script>
