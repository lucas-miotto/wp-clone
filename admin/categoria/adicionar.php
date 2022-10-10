<?php
require '../../config.php';
require '../../src/Categoria.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = new Categoria($mysql);
    $categoria->adicionar($_POST['titulo']);

    redireciona('/wp-clone/wp-clone/admin/index.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Categoria</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Categoria</h1>
        <form action="adicionar.php" method="post">
            <p>
                <label for="">Digite o título da categoria</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>

            <p>
                <button class="botao">Criar Categoria</button>
            </p>
        </form>
    </div>
</body>

</html>