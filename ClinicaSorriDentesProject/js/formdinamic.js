$(document).ready(function() {
    
  var max_fields = 20; //maximo de inputs permitidos
  var wrapper = $(".input_fields"); //campo
  var add_button = $(".add_campo"); //ID do botão

  var x = 1; //contagem de caixa de texto inicial
  $(add_button).click(function(e) { //em adicionar botão de entrada, clique
    e.preventDefault();
    var length = wrapper.find("input:text").length;

    if (x < max_fields) { 
      x++; //text box increment
      $(wrapper).append('<div id="linhas-container"><div class="linha-campos"><div class="row"></div></div></div><div class="form-group col-md-3"><label for="qtd">Quantidade</label><input type="number" value="0" name="quant[]" id="qtd" onkeyup="calcular();"></div><div class="form-group col-md-3"><label for="proc">Procedimento</label><select name="procedimento[]" id="procedimento"><option>extração</option><option>obturação amálgama</option><option>obturaçao luz halogênea</option><option>tratamento canal</option><option>limpeza</option><option>remoção de tártaro</option><option>flúor</option><option>pivot</option><option>coroa porcelana</option><option>coroa venne</option><option>cirurgia</option><option>prótese superior</option><option>prótese inferior</option><option>radiografia</option><option>aparelho</option><option>clareamento c/ moldeiras</option></select></div><div class="form-group col-md-3"><label>Número do Dente</label><input type="number" name="numDente[]"></div><div class="form-group col-md-3"><label for="proc">Importância</label><select name="importancia[]" id="importancia"><option>BAIXA IMPORTANCIA</option><option>MEDIA IMPORTANCIA</option><option>ALTA IMPORTANCIA</option></select></div><div class="form-group col-md-3"><label>Valor Unitário</label><input type="number" value="0" name="valor_unit[]" onkeyup="calcular();"></div><div class="form-group col-md-3"><label>Total Individual</label><input type="number" value="0" name="total[]" readonly="readonly"></div>');
       
      }
    //Fazendo com que cada uma escreva seu name
    wrapper.find("input:text" + "select").each(function() {
      $(this).val($(this).attr('name'))
    });
  });
  

  $(wrapper).on("click", "#removerDiv", function(e) { //user click on remove text
    e.preventDefault();
    $('#divremove').remove();
    x--;
  });
  
});



