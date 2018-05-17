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
      $(wrapper).append('<div class="input_fields"><label for="qtd"> QTD </label><input type="text" name="qtd[]" id="qtd"><label for="orç"> Orçamento </label><select name="orçamento[]" id="orcamento"><option>extração</option><option>obturação amálgama</option><option>obturaçao luz halogênea</option><option>tratamento canal</option><option>limpeza</option><option>remoção de tártaro</option><option>flúor</option><option>pivot</option><option>coroa porcelana</option><option>coroa venne</option><option>cirurgia</option><option>prótese superior</option><option>prótese inferior</option><option>radiografia</option><option>aparelho</option><option>clareamento c/ moldeiras</option></select><label for="import"> Importância </label><input type="text" name="importancia[]"><a href="#" class="remove_field">Remove</a></div>'); //add input box
    }
    //Fazendo com que cada uma escreva seu name
    wrapper.find("input:text" + "select").each(function() {
      $(this).val($(this).attr('name'))
    });
  });

  $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
    e.preventDefault();
    $(this).parent('div').remove();
    x--;
  })

});