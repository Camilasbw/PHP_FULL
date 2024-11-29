<?php
function limpar_texto($str){
    return preg_replace("/[^0-9]/","", $str);

}

if(count($_POST) > 0 ){

include('conexao.php');

$erro = false;
$nome = $_POST['nome'];
$email = $_POST['Email'];
$telefone = $_POST['Telefone'];
$nascimento = $_POST['Nascimento'];

}

//empty - determina se uma variavel esta vazia
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
    $teefone = limpar_texto($elefone);
    if(strlen($telefone) != 11){
        $erro = "O telefone deve ser preenchido no padrao (11) 98888-8888";
    }
}

if($erro){
    echo "<p><b>ERRO: $E"
}
