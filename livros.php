<?php


require_once('conexao.php');

$consultaDb = $conexaoDb->prepare('select * from produto');

$consulta = $consultaDb->execute();

$livros = $consultaDb->fetchAll(PDO::FETCH_ASSOC);

foreach($livros as $livro){

    echo $livro["id_produto"]."<br>";
}

?>