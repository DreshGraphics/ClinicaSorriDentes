<?php
session_start();
include_once '../Paciente/Paciente.php';

if (isset($_SESSION["login"])) {
	$NomeLogin = $_SESSION["login"];
} else {
	header("Location: ../Telas/Index.php");
}

/*$metodo = $_GET;
if (isset($metodo["IDpaciente"])) {
    $idPaciente = $metodo["IDpaciente"];
}

$paciente = new Paciente();
$paciente->valorpk = $idPaciente;
$paciente->pesquisarID($paciente);

$dados = $paciente->retornaDados("object");

if ($dados->IDPACIENTE == NULL) {
    header("Location: ./TelaListaPacienteTable.php");
}*/
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
		<div class="row col-md-12">
			<h2 class="titulo-h2">Controle Clinico</h2>
<!--
	<h4>Paciente: <?php echo $dados->NOME ?></h4>-->
</div>

<form method="POST" action="../Consulta/salvarControleClinico.php?IDpaciente=<?php echo $idPaciente ?>">

	<div id="linhas-container">
		<div class="linha-campos">

			<div class="row">

				<div class="form-group col-md-3">
					<label for="proc">Procedimento</label>
					<select name="procedimento[]" id="procedimento" disabled>
						<option>extração</option>
						<option>obturação amálgama</option>
						<option>obturaçao luz halogênea</option>
						<option>tratamento de canal</option>
						<option>limpeza</option>
						<option>remoção de tártaro</option>
						<option>flúor</option>
						<option>pivot</option>
						<option>coroa porcelana</option>
						<option>coroa venne</option>
						<option>cirurgia</option>
						<option>prótese superior</option>
						<option>prótese inferior</option>
						<option>radiografia</option>
						<option>aparelho</option>
						<option>clareamento c/ moldeiras</option>
					</select>
				</div>

				<div class="form-group col-md-3">
					<label>Número do Dente</label>
					<input type="number" min='0' name="numDente[]" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" disabled>
				</div>

				<div class="form-group col-md-3">
					<label for="proc">Importância</label>
					<select name="importancia[]" id="importancia" disabled>
						<option>BAIXA IMPORTANCIA</option>
						<option>MEDIA IMPORTANCIA</option>
						<option>ALTA IMPORTANCIA</option>

					</select>
				</div>

				<div class="form-group col-md-3">
					<label>Valor Unitário</label>
					<input min='0' type="number" name="valor_unit[]" onkeypress="return (event.charCode == 8 || event.charCode == 0) ? null : event.charCode >= 48 && event.charCode <= 57" disabled>
					<button data-toggle="modal" data-target="#modalPaciente" style="width: 25px; height: 25px; border-radius: 50%; border: none; background: #28a745; color: #f3f3f3;"><i class="fas fa-check-circle" style="position: relative; top: 0; left: 0;"></i></button>
				</div>

			</div>

			<div class="row">
				<div class="form-group separador col-sm-12">
				</div>    
			</div> 

		</div>
	</div>

	<div id="container-total">
		<button class="bt-salvar">Salvar</button>
		<button id="botao-add" class="bt-buscar">Adicionar</button>
	</div>
</form>
</div>
</div>

<footer>
	<h1 id="fbs">Copyright &copy 2018 - Fábrica de Software</h1>
</footer>


<!-- MODAL DE ESCOLHA DE PACIENTE -->
<div class="modal fade" id="modalPaciente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalCenterTitle" style="font-weight: 500;">Selecione um item</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position: relative; top: -30px; right: -5px;">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">CANCELAR</button>
        <button type="button" class="btn btn-primary">SALVAR</button>
    </div>
  </div>
</div>
                  <!-- F I M  M O D A L -->

<!-- Importando o jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!-- Importando o js do bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
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

		novaLinha.querySelector('input[name="valor_unit[]"]').value = "";

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
			var valorUnit = parseFloat(linha.querySelector('input[name="valor_unit[]"]').value);

			total += valorUnit;
		}

		totalCont.querySelector('input[name=valor_total]').value = total;
	}
</script>
</html>

