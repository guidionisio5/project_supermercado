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
    <div id="container">
        <h2 class="titulo">Gerenciar Produtos</h2>
        <a href="cadastrar_produtos.html">Cadastrar Produtos</a>
        <a href="index.html">Sair</a>
        <div id="tabela">
            <table border="1">
                <tr class="item-tabela">
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Tipo</th>
                    <th>Marca</th>
                    <th>Descrição</th>
                    <th>Imagem</th>
                    <th>Alterar</th>
                    <th>Deletar</th>
                </tr>
                <?php
                    foreach($dados as $prod):
                ?>
                <tr class="item-tabela">
                    <td><?php echo $prod['id'];?></td>
                    <td><?php echo $prod['produto'];?></td>
                    <td><?php echo $prod['valor'];?></td>
                    <td><?php echo $prod['tipo'];?></td>
                    <td><?php echo $prod['marca'];?></td>
                    <td><?php echo $prod['descricao'];?></td>
                    <td><?php echo $prod['imagem'];?></td>
                    <td>
                        <a href="../admin/alterar_produtos.php?id=<?php echo $prod['id'];?>">Alterar</a>
                    </td>
                    <td>
                        <a href="../backend/_deletar_produtos.php?id=<?php echo $prod['id'];?>">Deletar</a>
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