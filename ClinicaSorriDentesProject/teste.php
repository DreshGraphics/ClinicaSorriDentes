<html>
    <head> 
        <title>Teste 1</title>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>

    <body>

        <?php for ($i = 0; $i < 2; $i++) { ?>
        <input type="number"  class="numero1" name="n1[]" onkeyup="calcular();"/>
        <input type="number"  class="numero2" name="n2[]" onkeyup="calcular();" />
            <input type="number"  value="0" name="resultadoTotal[]" id="resultado" disabled="true"/>
            <br>
            <br>
        <?php } ?>
        <p>Resultado total:</p>
        <input type="number" id="total" disabled="true"/>
    </body>

    <script type="text/javascript">
        
        calcular();

            function calcular() {
                var num1 = document.getElementsByName('n1[]');
                var num2 = document.getElementsByName('n2[]');
                var total = 0;


                for (i = 0; i < num1.length; i++) {


                    var n1 = parseFloat(num1[i].value);
                    var n2 = parseFloat(num2[i].value);
                    var resultIndividual = document.getElementsByName("resultadoTotal[]")[i].value = n1 * n2;

                    jQuery(resultIndividual);

                    total += resultIndividual;
                }
                
                document.getElementById('total').value = total;
            }
    </script>   
</html>


