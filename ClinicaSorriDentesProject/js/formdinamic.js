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
      $(wrapper).append('<div class="input_fields"><div id="divremove"><div class="row"><div class="form-group col-sm-3"><label for="qtd">Quantidade</label><input type="text" name="qtd[]" id="qtd" oninput="multiplicacao()"></div><div class="form-group col-sm-3"><label for="proc">Procedimento</label><select name="procedimento[]" id="procedimento"><option>extração</option><option>obturação amálgama</option><option>obturaçao luz halogênea</option><option>tratamento canal</option><option>limpeza</option><option>remoção de tártaro</option><option>flúor</option><option>pivot</option><option>coroa porcelana</option><option>coroa venne</option><option>cirurgia</option><option>prótese superior</option><option>prótese inferior</option><option>radiografia</option><option>aparelho</option><option>clareamento c/ moldeiras</option></select></div><div class="form-group col-sm-3"><label>Número do Dente</label><input type="number" name=""></div><div class="form-group col-sm-3"><label>Importância</label><input type="text" name="importancia[]"></div><div class="form-group col-sm-3"><label for="vl_un">Valor Unitário</label><input type="text" name="valor_uni[]" id="vl_un" class="vl_un" oninput="multiplicacao()"></div></div><div class="row"><div class="form-group col-sm-3"><button type="button" class="bt-buscar" id="removerDiv">Remover</button></div></div><div class="row"><div class="form-group separador col-sm-12"></div></div></div></div>'); //add input box
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

function sum()
{
  //m = document.getElementById("qtd").value;
  let total = 0;
  
  $('.resultado').each(function() {
      total += +$(this).val();
  });
  $('#valor_total').val(total);
}


function multiplicacao()
{
  var total = 0;
  $('.valorTotal').val(total);

  var qtd1 = document.querySelectorAll('input[name="qtd[]"]')[0].value;
  var valorUnitario1 = document.querySelectorAll('input[name="valor_uni[]"]')[0].value;

  var total1 = (qtd1 * valorUnitario1);

  var qtd2 = document.querySelectorAll('input[name="qtd[]"]')[1].value;
  var valorUnitario2 = document.querySelectorAll('input[name="valor_uni[]"]')[1].value;

  var total2 = (qtd2 * valorUnitario2);

  /*var qtd3 = document.querySelectorAll('input[name="qtd[]"]')[2].value;
  var valorUnitario3 = document.querySelectorAll('input[name="valor_uni[]"]')[2].value;

  var total1 = (qtd3 * valorUnitario3);

  /*var qtd4 = document.querySelectorAll('input[name="qtd[]"]')[3].value;
  var valorUnitario4 = document.querySelectorAll('input[name="valor_uni[]"]')[3].value;

  var total4 = (qtd4 * valorUnitario4);

  var qtd5 = document.querySelectorAll('input[name="qtd[]"]')[4].value;
  var valorUnitario5 = document.querySelectorAll('input[name="valor_uni[]"]')[4].value;

  var total5 = (qtd5 * valorUnitario5);

  var qtd6 = document.querySelectorAll('input[name="qtd[]"]')[5].value;
  var valorUnitario6 = document.querySelectorAll('input[name="valor_uni[]"]')[5].value;

  var total6 = (qtd6 * valorUnitario6);

  var qtd7 = document.querySelectorAll('input[name="qtd[]"]')[6].value;
  var valorUnitario7 = document.querySelectorAll('input[name="valor_uni[]"]')[6].value;

  var total7 = (qtd7 * valorUnitario7);

  var qtd8 = document.querySelectorAll('input[name="qtd[]"]')[7].value;
  var valorUnitario8 = document.querySelectorAll('input[name="valor_uni[]"]')[7].value;

  var total8 = (qtd8 * valorUnitario8);

  var qtd9 = document.querySelectorAll('input[name="qtd[]"]')[8].value;
  var valorUnitario9 = document.querySelectorAll('input[name="valor_uni[]"]')[8].value;

  var total9 = (qtd9 * valorUnitario9);

  var qtd10 = document.querySelectorAll('input[name="qtd[]"]')[9].value;
  var valorUnitario10 = document.querySelectorAll('input[name="valor_uni[]"]')[9].value;

  var total10 = (qtd10 * valorUnitario10);

  var qtd11 = document.querySelectorAll('input[name="qtd[]"]')[10].value;
  var valorUnitario11 = document.querySelectorAll('input[name="valor_uni[]"]')[10].value;

  var total11 = (qtd11 * valorUnitario11);

  var qtd12 = document.querySelectorAll('input[name="qtd[]"]')[11].value;
  var valorUnitario12 = document.querySelectorAll('input[name="valor_uni[]"]')[11].value;

  var total12 = (qtd12 * valorUnitario12);*/

  total = total1 + total2;


  $('.valorTotal').val(total);
}



