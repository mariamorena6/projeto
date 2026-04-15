<?php

    include '../conexao.php';

    $id = $_GET['id'];

    $sql = " DELETE FROM cadastro WHERE id =:id ";
    $smt = $conexao->prepare($sql);
    $smt->bindParam(':id', $id);

    $smt->execute();

    header('Location:index.php');

?>