<?php

session_start();

unset($_SESSION["tipoUsuario"]);

header('Location: ../Telas/Index.php');
?>
