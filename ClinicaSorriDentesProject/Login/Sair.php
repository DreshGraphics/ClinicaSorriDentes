<?php

session_start();

unset($_SESSION["id"]);
unset($_SESSION["nome"]);
unset($_SESSION["login"]);
unset($_SESSION["tipoUsuario"]);
unset($_SESSION["idPaciente"]);

header('Location: ../Telas/Index.php');