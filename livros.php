<?php


require_once('conexao.php');

$consultaDb = $conexaoDb->prepare('SELECT * from produto');

$consulta = $consultaDb->execute();

$livros = $consultaDb->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Livraria</title>
</head>

<body>
    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h1>Livraria</h1>
            </div>
            <div class="col">
                <a href="cadastroLivro.php" class="btn btn-primary">Cadastro Livro</a>
            </div>
        </div>
    </div>
    <table class="table container">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Editora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($livros as $livro) : ?>
                <tr>
                    <td><?php echo $livro["nome"] ?></td>
                    <td><?php echo $livro["descricao"] ?></td>
                    <td><?php echo $livro["preco"] ?></td>
                    <td><?php echo $livro["fk_categoria"] ?></td>
                    <td><?php echo $livro["fk_editora"] ?></td>
                    <td> <a href="editarLivro.php?id=<?php echo $livro["id_produto"] ?>">Editar</a>
                        <a href="excluirLivro.php?id=<?php echo $livro["id_produto"] ?>">Excluir</a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>

    </table>

</body>

</html>