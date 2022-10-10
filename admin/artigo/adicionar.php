<?php
require '../../config.php';
require '../../src/Artigo.php';
require '../../src/redireciona.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->adicionar($_POST['titulo'], $_POST['conteudo'], $_POST['resumo'], $_Post['data']);

    redireciona('/wp-clone/wp-clone/admin/index.php');
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar.php" method="post">
            <p>
                <label for="">Digite o título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" />
            </p>
            <p>
                <label for="">Digite o resumo do artigo</label>
                <input class="campo-form" type="text" name="resumo" id="resumo"></input>
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="conteudo"></textarea>
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <input class="campo-form" type="date" name="data" id="data"></input>
            </p>

            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>