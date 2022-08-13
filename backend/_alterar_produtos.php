<?php

    include '../includes/conexao.php';

    try{
        // var recebidas via $_POST
        $id        = $_POST['id'];
        $produto    = $_POST['produto'];
        $valor     = $_POST['valor'];
        $tipo      = $_POST['tipo'];
        $marca     = $_POST['marca'];
        $descricao = $_POST['descricao'];

        $sql = "UPDATE 
                    tb_produtos
                SET
                    `produto` = '$produto',
                    `valor` = '$valor',
                    `tipo` = '$tipo',
                    `marca` = '$marca',
                    `descricao` = '$descricao'
                WHERE
                    id = $id;
                ";
        
        $comando = $con->prepare($sql);

        $comando->execute();

        header('location: ../admin/alterar_produtos.php?id='.$id);

        $con = null;

    }catch(PDOException $erro){
        echo $erro->getMessage();
    }

?>