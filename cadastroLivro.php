<?php
require_once('conexao.php');

$consultaDb = $conexaoDb->prepare('SELECT * FROM editora');
$resultado = $consultaDb->execute();

$editoras = $consultaDb->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST['cadastro-livro'])) {

    //verificar campos preenchidos

    if ($_POST['nome'] != "" && $_POST['descricao'] != "") {

        //preprara a query

        $query = $conexaoDb->prepare('INSERT INTO produto (nome, descricao, preco, fk_editora, fk_categoria, imagem) VALUES (:nome, :descricao, :preco, :fk_editora, 1, "sem-imagem")');

        $resultado = $query->execute([
            ":nome" => $_POST['nome'],
            ":descricao" => $_POST['descricao'],
            ":preco" => $_POST['preco'],
            ":fk_editora" => $_POST['fk_editora']
        ]);

       
        header('location: livros.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Cadastro</title>
</head>

<body>
    <div class="container my-5">
        <h1>Cadastrar Livro</h1>
    </div>
    <form action="" method="POST" class="container">

        <label for="nome">Nome Produto:</label>
        <input type="text" name="nome" id="nome" class="form-control"><br>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" class="form-control"><br>

        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" class="form-control"><br>

        <label for="">Imagem:</label>
        <input type="file" class="form-control" name="imagem" id="imagem"><br>

        <label for="fk_editora">Editora:</label>
        <select name="fk_editora" id="fk_editora" class="form-control">
            <?php
            foreach ($editoras as $editora) { ?>

                <option value="<?php echo $editora["id_editora"]; ?>"> <?php echo $editora["nome"]; ?></option>

            <?php } ?>
        </select><br>
        <button type="submit" name="cadastro-livro" class=" btn btn-primary">Enviar</button>
    </form>
</body>

</html>