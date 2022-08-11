<?php

include '../include/conexao.php';

try{
    
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];

    $sql = "INSERT INTO tb_produtos(`produto`,`valor`,`tipo`,`marca`,`descricao`)VALUES('$produto','$valor','$tipo','$marca','$descricao')";

    $comando = $con->prepare($sql);

    $comando->execute();

    echo " Cadastro realizado com sucesso";

    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>