<?php

include '../include/conexao.php';

try{
    
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];
    $imagem = $_FILES['imagem'];

    // upload da imagem


    $sql = "INSERT INTO tb_produtos(`produto`,`valor`,`tipo`,`marca`,`descricao`,`imagem`)VALUES('$produto','$valor','$tipo','$marca','$descricao','$nome_final_imagem')";

    $comando = $con->prepare($sql);

    $comando->execute();

    header('location: ../admin/cadastrar_produtos.html');

    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>