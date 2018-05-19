
<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
	<title></title>
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
            <form method="POST" action="salvarControleClinico.php">
		<legend>Controle Clinico</legend>
		<br>

		<div class="input_fields">
		<label for="qtd">QTD</label>
		<input type="text" name="qtd[]" id="qtd">

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
		<label for="import">Importância</label>
		<input type="text" name="importancia[]" id="import">
		<label for="vl_un">Valor Unitário</label>
		<input type="text" name="" id="vl_un" class="vl_un" onkeyup="sum()">
		</div>
		<br>
		<label>Valor Total</label>
		<input type="text" name="total[]" id="valor_total">
                <br /> <br>
                <input type="submit" value="Salvar">
	</form>
    <button class="add_campo">Adicionar Serviço</button>
</body>
</html>