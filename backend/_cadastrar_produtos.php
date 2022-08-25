<?php

include '../includes/conexao.php';

try{
    
    $produto = $_POST['produto'];
    $valor = $_POST['valor'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $descricao = $_POST['descricao'];
    $imagem = $_FILES['imagem'];

    // upload da imagem
    // armazena o nome original da imagem
    $nome_original_imagem = $_FILES['imagem']['name'];
    
    // descobrir a extensão da imagem 
    // formatos válidos: jpg/jpeg/png
    $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);

    // verificacao de extensao da imagem, se for diferente dos formatos validos, irá retornar ao usuario 
    if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
        echo 'Formato de imagem inválido';
        exit;
    }

    // gera um nome aleatorio para imagem(hash)
    $hash = md5(uniqid($_FILES['imagem']['tpm_name'],true));
    // juntamos o hash mais a extensao para ter o nome final da imagem
    $nome_final_imagem = $hash.'.'.$extensao;

    // caminho que a imagem será armazenada
    $pasta = '../img/upload/';
    // função php que move a imagem do nome temporario ate a pasta
    move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);

    $sql = "INSERT INTO tb_produtos(`produto`,`valor`,`tipo`,`marca`,`descricao`,`imagem`)VALUES('$produto','$valor','$tipo','$marca','$descricao','$nome_final_imagem')";

    $comando = $con->prepare($sql);

    $comando->execute();

    header('location: ../admin/gerenciar_produtos.html');

    $con = null;

}catch(PDOException $erro){
    echo $erro->getMessage();
    die();
}

?>