<?php

include '../includes/conexao.php';

try{
    $sql = "SELECT * FROM tb_produtos";

    $comando = $con->prepare($sql);

    $comando->execute();

    $dados = $comando->fetchAll(PDO::FETCH_ASSOC);

    // visualização do que a var está recebendo
    // echo "<pre>";
    // var_dump($dados);
    // echo "</pre>";

}catch(PDOException $erro){
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
    <title>Gerenciar Produtos</title>
</head>
<body>
    <div id="container-gerenciar">
        <div id="tabela-gerenciar">
            <h2 class="titulo">Gerenciar Produtos</h2>
            <a class="sublink" href="cadastrar_produtos.html">Cadastrar Produtos</a>
            <a class="sublink" href="index.html">Sair</a>
            <table class="borda-gerenciar">
                <tr class="item-gerenciar">
                    <th class="subtitulo-gerenciar">ID</th>
                    <th class="subtitulo-gerenciar">Produto</th>
                    <th class="subtitulo-gerenciar">Valor</th>
                    <th class="subtitulo-gerenciar">Tipo</th>
                    <th class="subtitulo-gerenciar">Marca</th>
                    <th class="subtitulo-gerenciar">Descrição</th>
                    <th class="subtitulo-gerenciar">Imagem</th>
                    <th class="subtitulo-gerenciar">Alterar</th>
                    <th class="subtitulo-gerenciar">Deletar</th>
                </tr>
                <?php
                    foreach($dados as $prod):
                ?>
                <tr class="item-tabela">
                    <td class="subtitulo-gerenciar"><?php echo $prod['id'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $prod['produto'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $prod['valor'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $prod['tipo'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $prod['marca'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $prod['descricao'];?></td>
                    <td class="subtitulo-gerenciar"><?php echo $prod['imagem'];?></td>
                    <td class="subtitulo-gerenciar">
                        <a class="table-link" href="../admin/alterar_produtos.php?id=<?php echo $prod['id'];?>">Alterar</a>
                    </td>
                    <td class="subtitulo-gerenciar">
                        <a class="table-link" href="../backend/_deletar_produtos.php?id=<?php echo $prod['id'];?>">Deletar</a>
                    </td>
                </tr>
                <?php
                    endforeach;
                ?>
            </table>
        </div>
    </div>
    <?php
        $con = null; 
    ?>
</body>
</html>