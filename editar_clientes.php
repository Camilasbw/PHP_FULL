<?php

include('conexao.php');
$id = intval($_GET['id']);
function limpar_texto($str){
    return preg_replace("/[^0-9]/","", $str)
}

if(count($_POST) > 0) {

    $erro = false;
    $nome = $_POST['nome'];
    $email = $_POST['Email'];
    $telefone = $_POST['Telefone'];
    $nascimento = $_POST['Nascimento'];

    if(empty($nome)){
    $erro = "Preencha o Nome";
    }

    if(empty($email) || !filter_var($email, FILTER_VALIDADE_EMAIL)){
        $erro = "Preencha o email";
    }

    if(!empty($nascimento)){
        $pedacos = explode('/', $nascimento);

        if(count($pedacos) == 3){
            $nascimento = implode('-', array_reverse($pedacos));
        }else{
            $erro = "A data de nascimento deve seguir o padrão dia/mes/ano"
        }
    }

    if(!empty($telefone)){
        $telefone = limpar_texto($telefone);
        if(strlen($telefone) != 11){
            $erro = "O telefone deve ser preenchido no padrao (11) 98888-8888";
        }
    }

    if($erro){
        echo "<p><b>ERRO: $erro</b></p>"
    } else {
        $sql_code = "UPDATE clientes
        SET nome = '$nome',
        email = '$email',
        telefone = '$telefone',
        nascimento = '$nascimento',
        WHERE id = '$id'";
        $deu_certo = $mysql->query($sql_code) or die($mysql->error);
        if($deu_certo){
            echo "<p><b>Cliente atualizado com Sucesso!!!</b></p>";
            unset($_POST);
        }
    }
}

$sql_cliente = "SELECT * FROM clientes WHERE id = 'id'";
$query_cliente = $mysql->query($sql_cliente) or die($mysql->error);
$cliente = $query_cliente->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar cliente</title>
</head>
<body>
    <a href="clientes.php">Voltar para a lista</a>
    <form method="POST" action=""></form>
        <p>
            <label>Nome:</label>
            <input value=" <?php echo $cliente['nome']; ?>" name="nome" type="text">
        </p>
        <p>
            <label>E-mail:</label>
            <input value=" <?php echo $cliente['email']; ?>" name="email" type="text">
        </p>
        <p>
            <label>Telefone:</label>
            <input value=" <?php if(!empty($cliente['telefone'])) echo formartar_telefone($cliente['telefone']);
            ?>" placeholder="(11) 98888-8888" name="telefone" type="text">
        </p>
        <p>
            <label>Telefone:</label>
            <input value=" <?php if(!empty($cliente['nascimento'])) echo formartar_telefone($cliente['nascimento']);
            ?>" name="nascimento" type="text">
        </p>
        <p>
            <button type="submit">Salvar Cliente</button>
        </p>
</body>
</html>
