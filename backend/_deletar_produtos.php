<?php

include '../includes/conexao.php';

try{
    // captura o id enviado via GET e armazena em uma var
    $id = $_GET['id'];

    $sql = "DELETE FROM tb_produtos WHERE id=$id";

    $comando = $con->prepare($sql);

    $comando->execute();

    header('location: ../admin/gerenciar_produtos.php');

    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
}

?>