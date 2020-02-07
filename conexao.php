<?php

$dsn = "mysql:host=localhost;dbname=livraria;port=3307";
$username = "root";
$password = "";


try {
    $conexaoDb = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo "<h1>Nessa máquina não funciona! </h1><br>" . $e->getMessage();
}

?>

