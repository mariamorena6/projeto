<?php

    $host = "127.0.0.1";
    $user = "root";
    $porta = "3306";
    $password = "ceub123456";
    $db = "projeto";


    $conexao = new PDO(
        'mysql:host='.$host.';
        port='.$porta.';
        dbname='.$db,
        $user,
        $password);

   $sql = "SELECT * FROM disciplinas ";

   $consulta = $conexao->query($sql);

   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table width="100%" border= "1">
         <tr>
            <th>ID</th>
            <th>Carga Horaria</th>
            <th>Matérias</th>
            <th>Professor</th>
            <th>Ações</th>
        </tr>
        <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
        <tr>
           <td><?php echo $linha->id ?></td>
           <td><?php echo $linha ->carga_horaria ?></td>
           <td><?php echo $linha ->nome ?></td>
           <td><?php echo $linha ->professor?></td>
           <td>
             <a href="excluir.php?id=<?php echo $linha->id ?>">Excluir</a>
            </td>
        </tr>
       <?php } ?>
   </table>
</body>
</html>
<div>

