<?php

include '../includes/conexao.php';

// captura a var global ID recebida via GET
$id = $_GET['id'];

try {

    $sql = "SELECT * FROM tb_produtos WHERE id = $id";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // visualização do que a var está recebendo
    // echo "<pre>";
    // var_dump($dados);
    // echo "</pre>";

} catch (PDOException $erro) {
    echo $erro->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Alterar Produtos</title>
</head>

<body>
    <div id="container-formulario">
        <form action="../backend/_alterar_produtos.php" method="post" enctype="multipart/form-data">
            <div id="grid-formulario">
                <h2 class="titulo">Alterar Produtos</h2>
                <a class="sublink" href="gerenciar_produtos.php">Gerenciar Produtos</a>
                <div class="item-grid">
                    <label class="subtitulo" for="id">ID:</label>
                    <input class="item" type="text" name="id" id="id" value="<?php echo $dados[0]['id']?>" readonly/>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="produto">Produto:</label>
                    <input class="item" type="text" name="produto" id="produto" value="<?php echo $dados[0]['produto']?>"/>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="valor">Valor:</label>
                    <input class="item" type="text" name="valor" id="valor" value="<?php echo $dados[0]['valor']?>"/>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="tipo">Tipo:</label>
                    <input class="item" type="text" name="tipo" id="tipo" value="<?php echo $dados[0]['tipo']?>"/>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="marca">Marca:</label>
                    <input class="item" type="text" name="marca" id="marca" value="<?php echo $dados[0]['marca']?>"/>
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="imagem">Imagem nova:</label>
                    <input class="item" type="file" name="imagem" id="imagem"/>
                </div>
                <div class="item-grid">
                    <h4 class="subtitulo">Imagem antiga:</h4>
                    <img class="img-alterar" src="../img/upload/<?php echo $dados[0]['imagem']?>" alt="Imagem antiga do produto">
                </div>
                <div class="item-grid">
                    <label class="subtitulo" for="descricao">Descrição:</label>
                    <textarea class="item-desc" name="descricao" id="descricao" cols="30" rows="10"><?php echo $dados[0]['descricao']?></textarea>
                </div>
                <div class="centraliza-botao">
                    <input class="botao" type="submit" value="Salvar">
                </div>
            </div>
            
        </form>
    </div>
    <?php
        $con = null;
    ?>
</body>

</html>