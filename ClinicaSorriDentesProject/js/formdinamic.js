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
      $(wrapper).append('<div class="row"><div class="col-sm-12"><div class="row input_fields"><div class="form-group col-sm-3"><label for="qtd">Quantidade</label><input type="text" name="qtd[]" id="qtd"></div><div class="form-group col-sm-3"><label for="proc">Procedimento</label><select name="procedimento[]" id="procedimento"><option>extração</option><option>obturação amálgama</option><option>obturaçao luz halogênea</option><option>tratamento canal</option><option>limpeza</option><option>remoção de tártaro</option><option>flúor</option><option>pivot</option><option>coroa porcelana</option><option>coroa venne</option><option>cirurgia</option><option>prótese superior</option><option>prótese inferior</option><option>radiografia</option><option>aparelho</option><option>clareamento c/ moldeiras</option></select></div><div class="form-group col-sm-3"><label for="import">Importância</label><input type="text" name="importancia[]" id="import"></div><div class="form-group col-sm-3"><label for="vl_un">Valor Unitário</label><input type="text" name="valor_uni" id="vl_un" class="vl_un" onkeyup="sum()"></div></div></div>'); //add input box
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

function sum()
{
  m = document.getElementById("qtd").value;
  let total = 0;
  
  $('.vl_un').each(function() {
      total += +$(this).val()*m;
  });
  $('#valor_total').val(total);
}




