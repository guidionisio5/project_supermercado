<?php

include 'includes/conexao.php';

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
    <link rel="stylesheet" href="css/style.css">
    <title>Lista de Produtos</title>
</head>
<body>
    <div id="container">
        <h2 class="titulo-produtos">Lista de Produtos</h2>
        <div id="grid-produtos">
            <?php
                foreach($dados as $d):
            ?>
            <figure class="figure-produtos">
                <img class="img-produtos" src="img/upload/<?php echo $d['imagem']?>" alt="Imagem do Produto">
                <figcaption class="figcaption-produtos">
                    <h4><?php echo $d['produto'];?></h4>
                    <h5>R$ <?php echo $d['valor'];?></h5>
                    <h5><?php echo $d['tipo'];?></h5>
                    <h5><?php echo $d['marca'];?></h5>
                    <small><?php echo $d['descricao'];?></small>
                    <button class="botao-produtos">Comprar</button>
                </figcaption>
            </figure>

            <?php endforeach;?>
        
        </div>
    </div>    
</body>
</html>