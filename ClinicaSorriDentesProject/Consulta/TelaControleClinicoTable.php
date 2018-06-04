<?php
/**
 * Description of Controle Clinico
 *
 * @author Jonathan
 */
session_start();
require_once '../Consulta/ProcedimentoDente.php';

$procedimento = new ProcedimentoDente();
$procedimento->retornaTudo($procedimento);

?>
<html lang="pt-br">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat+Alternates">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/tabela.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Pesquisar Paciente</title>
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/login.js"></script>
        
    </head>
    <body ondragstart="return false;">
    <header id="topo">
    <input type="checkbox" id="bt_menu">
    <label for="bt_menu">&#9776;</label>
    <div id="right"><img src="../img/cct.png"></div>
    <nav class="menu" id="menu">
        <ul>
            <li><a href="../Telas/Home.php">Inicio</a></li>
            <li><a href="#">Cadastro</a>
                <ul>
                    <li id="opcaoUser"><a href="../Telas/TelaCadastroUsuario.php">Usuário</a></li>
                    <li><a href="../Telas/TelaCadastroMedico.php">Profissional</a></li>
                    <li><a href="../Telas/TelaCadastroPaciente.php">Paciente</a></li>
                </ul>
            </li>
            <li><a href="#">Consulta</a>
            <ul>
                <li><a href="../Telas/TelaControleClinico.php">Controle Clinico</a></li>
            </ul>
            </li>
            <li><a href="../Login/Sair.php">Sair</a></li>
        </ul>
    </nav>
    </header>

<div class="centro">
    <div class="conteudo">
      <table>
        <thead>
          <tr class="titulo-table">
            <th class="column1">Id</th>
            <th class="column2">Numero do Dente</th>
            <th class="column3">Procedimento</th>
            <th class="column4">Importancia</th>
            <th class="column5">Quantidade</th>
            <th class="column6">Valor</th>
            <th class="column7">Ação</th>
          </tr>
        </thead>
        <tbody>
            <?php while ($dado = $procedimento->retornaDados("object")){ ?>
          <tr class="tabela">
            <td><?php echo $dado->IDDENTE ?></td>
            <td class="up"><?php echo $dado->NUMERO_DENTE ?></td>
            <td class="up"><?php echo $dado->PROCEDIMENTO ?></td>
            <td class="up"><?php echo $dado->IMPORTANCIA ?></td>
            <td class="up"><?php echo $dado->QUANTIDADE ?></td>
            <td class="up"><?php echo $dado->VALOR ?></td>
            <td class="column6"><a href="<?php echo $dado->IDDENTE;?>">Editar</a> 
                <a href="" id="separador">|</a>
                <a href="javascript: if(confirm('TEM CERTEZA AO DELETAR O PROCEDIMENTO: <?php echo $dado->PROCEDIMENTO; ?> ?')) 
                    location.href='ExcluirControleClinico.php?IdDente=<?php echo $dado->IDDENTE;?>';">Excluir</a>
                </td>
          </tr> 
          </tbody>
         <?php } ?>
    </table>
  </div>
</div>

    <footer>
        <h1>Copyright &copy 2018 - Fábrica de Software</h1>
    </footer>
</html>
