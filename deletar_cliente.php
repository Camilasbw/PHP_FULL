<?php
if(isset($_POST['confirmae'])) {

    include("conexao.php");
    $id = intval($_GET['id']);
    $sql_code - "DELETE FROM clientes WHERE id = '$id'";
    $sql_query = $mysql ->query($sql_code) or die ($mysql->error);

    if($sql_query) { ?>
        <h1>Cliente deletando com sucesso!</h1>
        <p><a href="clientes.php">Cique aqui</a>para voltar a lista de clientes.</p>
        <?php
        die();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar clientes</title>
</head>
<body>
    <h1>Tem erteza que deseja deletar este cliente?</h1>

    <form action="" method="post">
        <a style="margin-right:40px;" hef="clientes.php"> Não</a>
        <button name="confirmar" value="1" type="submit" > Sim</button>
    </form>
</body>
</html>