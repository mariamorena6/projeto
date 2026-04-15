<?php

    session_start();
    if(isset($_SESSION) || $_SESSION['logado'] == false) {
        header('Location: index.php');
    } else{
        echo "Bem vindo " . $_SESSION['login'];
        header('location: aluno/index.php');  
    }

?>