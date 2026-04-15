<?php   
    
    include "conexao.php"; //require se aconteceer erro a execução do sistma inteiro para


    $login = $_POST['login'];
    $senha = md5($_POST['senha']);       

    $sql = "SELECT * FROM usuario
                  WHERE login = :login AND senha = :senha";
    $smt = $conexao->prepare($sql);
    $smt->bindParam(':login', $login);
    $smt->bindParam(':senha', $senha);
    $smt->execute();

    session_start();
    if($smt->rowCount() > 0) {
        $_SESSION['logado'] = true;
        $_SESSION['login'] = $login;
        header('Location: aluno/index.php');
    } else {
        $_SESSION['logado'] = false;
        echo "Login ou senha incorretos";
    }
?>