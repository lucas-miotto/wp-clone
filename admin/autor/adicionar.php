<?php
require '../../config.php';
require '../../src/Autor.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = new Autor($mysql);
    $autor->adicionar($_POST['titulo']);

    redireciona('/wp-clone/wp-clone/admin/index.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Autor</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Autor</h1>
        <form action="adicionar.php" method="post">
            <p>
                <label for="">Digite o nome do Autor</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>

            <p>
                <button class="botao">Criar Autor</button>
            </p>
        </form>
    </div>
</body>

</html>