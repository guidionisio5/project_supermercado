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

        // Upload da imagem
        // captura o nome original da imagem a ser alterada
        $nome_original_imagem = $_FILES['imagem']['name'];

        if($nome_original_imagem != null){
            // descobrir a extensão da imagem 
            // formatos válidos: jpg/jpeg/png
            $extensao = pathinfo($nome_original_imagem,PATHINFO_EXTENSION);
            // verificacao de extensao da imagem, se for diferente dos formatos validos, irá retornar ao usuario 
            if($extensao != 'jpg' && $extensao != 'jpeg' && $extensao != 'png'){
                echo 'Formato de imagem inválido';
                exit;     
            } 
            
            // gera um nome aleatorio para imagem(hash)
            $hash = md5(uniqid($_FILES['imagem']['tmp_name'],true));
            // echo $hash;
            // exit;
            
            // juntamos o hash mais a extensao para ter o nome final da imagem  
            $nome_final_imagem = $hash.'.'.$extensao;
    

            // caminho que a imagem será armazenada
            $pasta = '../img/upload/';
            // função php que faz o upload da imagem
            move_uploaded_file($_FILES['imagem']['tmp_name'],$pasta.$nome_final_imagem);
        
            $sql = "UPDATE tb_produtos SET `produto` = '$produto', `valor` = '$valor', `tipo` = '$tipo', `marca` = '$marca',`descricao` = '$descricao', `imagem` = '$nome_final_imagem' WHERE id = $id;";
            
        }else{
            $sql = "UPDATE tb_produtos SET `produto` = '$produto', `valor` = '$valor', `tipo` = '$tipo', `marca` = '$marca',`descricao` = '$descricao' WHERE id = $id;";
        }
        $comando = $con->prepare($sql);

        $comando->execute();

        header('location: ../admin/alterar_produtos.php?id='.$id);

        $con = null;

    }catch(PDOException $erro){
        echo $erro->getMessage();
    }

?>