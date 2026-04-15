<?php
   include "../conexao.php"; // ponto ponto vai para a pasta de cima

    $nome = $_GET['nome'];
    $idade = $_GET['idade'];
    $email = $_GET['email'];
    $telefone = $_GET['telefone'];
    $id = $_GET['id'];

   $sql = "UPDATE cadastro SET nome = :nome, idade = :idade, email = :email, telefone = :telefone WHERE id = :id";

   $smt = $conexao->prepare($sql); 
    $smt->bindParam(':nome', $nome);
    $smt->bindParam(':idade', $idade);
    $smt->bindParam(':email', $email);
    $smt->bindParam(':telefone', $telefone);
    $smt->bindParam(':id', $id);

    $smt->execute();

    header('Location:index.php');
?>