
<?php
    include '../sessao.php';
    include "../conexao.php"; //require se aconteceer erro a execução do sistma inteiro para

   $sql = "SELECT * FROM cadastro";
   $consulta = $conexao->query($sql);

   //Edição
   $id = isset($_GET['id']) ? $_GET['id'] : null;
   if($id) {
        $sqlU = "SELECT * FROM cadastro WHERE id = :id ";
        
        $smt = $conexao->prepare($sqlU);
        $smt->bindParam(':id', $id);
        $smt->execute();

        $aluno = $smt->fetch(PDO::FETCH_OBJ);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <form action =" <?php echo isset($id) ? "editar.php" :  "inserir.php" ?>" method="get">
      <input type="hidden" name="id" value="<?php echo isset($aluno) ? $aluno->id : ''?>" >     Nome : <input type="text" name="nome" 
                   value="<?php echo isset ($aluno) ? $aluno->nome : '' ?>">
     Idade : <input type= "text" name="idade" 
                    value="<?php echo isset ($aluno) ? $aluno->idade : '' ?>">
     E-mail : <input type= "email" name="email"  
                    value="<?php echo isset ($aluno) ? $aluno->email : '' ?>">
     Telefone:<input type= "tel" name="telefone" 
                     value="<?php echo isset ($aluno) ? $aluno->telefone : '' ?>">
     <input type="submit" value="Salvar">
  </form>

    <table width="100%" border= "1">
         <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php while ($linha = $consulta->fetch(PDO::FETCH_OBJ)) { ?>
        <tr>
           <td><?php echo $linha->id ?></td>
           <td><?php echo $linha ->nome ?></td>
           <td><?php echo $linha ->idade ?></td>
           <td><?php echo $linha ->email ?></td>
           <td><?php echo $linha ->telefone ?></td>
           <td>
             <a href="index.php?id=<?php echo $linha->id ?>">Editar |</a>
              <a href="excluir.php?id=<?php echo $linha->id ?>">Excluir</a>
            </td>
        </tr>
       <?php } ?>
   </table>
</body>
</html>
<div>