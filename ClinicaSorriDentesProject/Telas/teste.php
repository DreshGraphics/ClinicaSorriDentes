<?php

for ($i=0; $i < count($_POST['valor_unit']); $i++) {
    $valor_unit = $_POST['valor_unit'][$i];
    $quant = $_POST['quant'][$i];
    $total = $_POST['total'][$i];

    echo '<br><br>Produto N°: '.($i+1).'<br><br>'; 
	echo 'Valor unitário: '.$valor_unit.'<br>';
	echo 'Quantidade: '.$quant.'<br>';
	echo 'Total: '.$total.'<br>';
}

echo '<br><br><b>Valor total: '.$_POST['valor_total'].'</b>';