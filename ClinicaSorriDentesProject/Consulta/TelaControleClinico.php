
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
	<script src="../js/formdinamic.js"></script>
	<script src="../js/jquery.maskMoney.js"></script>
	<script type="text/javascript">
        $(document).ready(function(){
              $("input.dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
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
            <li><a href="../Login/Sair.php">Sair</a></li>
        </ul>
    </nav>
    </header>

    <div class="container mid">


        <div class="row">
            <div class="col-sm-12">
                <h2 class="titulo-h2">Controle Clinico</h2>
                <form method="POST" action="salvarControleClinico.php">

                	<div class="row input_fields">
                		<div class="form-group col-sm-3">
                			<label for="qtd">Quantidade</label>
							<input type="text" name="qtd[]" id="qtd">
                		</div>

                		<div class="form-group col-sm-3">
                			<label for="orcamento">Orçamento</label>
					           <select name="orcamento[]" id="orcamento">
								<option>extração</option>
								<option>obturação amálgama</option>
								<option>obturaçao luz halogênea</option>
								<option>tratamento canal</option>
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

                		<div class="form-group col-sm-3">
                			<label for="import">Importância</label>
							<input type="text" name="importancia[]" id="import">
                		</div>

                		<div class="form-group col-sm-3">
                			<label for="vl_un">Valor Unitário</label>
							<input type="text" name="valor_uni" id="vl_un" class="vl_un" onkeyup="sum()">
                		</div>
                	</div>

                	<div class="row">
                		<div class="form-group col-sm-3">
                			<label>Valor Total</label>
							<input type="text" name="total[]" id="valor_total" disabled="disabled">
                		</div>

                		<div class="form-group col-sm-3">
                			<label>Orçamento Final</label>
                			<input type="text" name="">
                		</div>
                	</div>

                	<button type="submit" class="bt-salvar">Salvar</button>
                	<button type="button" class="bt-buscar add_campo" >Adicionar</button>
                	</form>

        	</div>
		</div>
	</div>
	<footer>
    <h1>Copyright &copy 2018 - Fábrica de Software</h1>
	</footer>
</body>
</html>