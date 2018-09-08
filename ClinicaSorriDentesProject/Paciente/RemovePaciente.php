<?php

session_start();
require_once '../util/daoGenerico.php';
require_once '../Paciente/Paciente.php';
/**
 * Description of Paciente
 *
 * @author Felipe
 */
//PEGANDO O ID DO USUARIO A SER DELETADO
$pegarId = $_GET;
if (isset($pegarId["Idpaciente"])) {
    $id = $pegarId["Idpaciente"];

    $paciente = new Paciente();
    $paciente->valorpk = $id;

    if ($paciente->deletar($paciente)) {
        echo "
		<script>
			alert('Paciente deletado com Sucesso.!')
			location.href='TelaPacienteTable.php';
		</script>";
    } else {
        echo "
		<script>
			alert('Houve um erro ao tentar deletar Paciente. Por favor, tente novamente.!');
			location.href='TelaPacienteTable.php';
		</script>";
    }
}
