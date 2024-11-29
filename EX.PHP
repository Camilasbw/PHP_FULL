<?php
$host = "localhost";
$db = "aulaphp";
$user = "root";
$pass = "";
 
$maysqli = new mysqli($host,$user,$pass,$db);
if($maysqli->connect_erro){
    die("falha na conexão com banco de dados")
}
 
function formatar_data($data){
    return implode('/', array_reverse(explode('-',$date)));
}
 
function formatar_telefone(){
    $ddd=substr ($telefone,0,2);
    $parte1 = substr($telefone,2,5);
    $parte2 = substr($telefone, 7);
    return "($ddd) $parte1-$parte2";
 
}
 
?>
 