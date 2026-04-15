<?php

    session_start();

    if(!isset($_SESSION['logado']) 
         || $_SESSION['logado'] == false) {
        header('Location: index.php');
        exit;
    }

    echo "Bem vindo, " . $_SESSION['login'];
    echo "<br><a href='../logout.php'>Sair</a>";


?>