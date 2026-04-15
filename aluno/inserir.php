<?php

    include '../conexao.php';

    $nome = $_GET['nome'];
    $idade = $_GET['idade'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];


    $sql = " INSERT INTO cadastro (nome, idade, email, telefone) 
             VALUES (:nome, :idade, :email, :telefone) ";

    $smt = $conexao->prepare($sql); 
    $smt->bindParam(':nome', $nome);
    $smt->bindParam(':idade', $idade);
    $smt->bindParam(':email', $email);
    $smt->bindParam(':telefone', $telefone);

    $smt->execute();

    header('Location:index.php');

?>