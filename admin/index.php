<?php
require '../config.php';
include '../src/Artigo.php';
include '../src/Categoria.php';
include '../src/Autor.php';

$artigo = new Artigo($mysql);
$artigos = $artigo->exibirTodos();

$categoria = new Categoria($mysql);
$categorias = $categoria->exibirTodos();

$autor = new Autor($mysql);
$autores = $autor->exibirTodos();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Página administrativa</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">WordPress Clone</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled">Disabled</a>
                </div>
            </div>
        </div>
    </nav>

    <div id="container">
        <h1>Artigos</h1>
        <div>

            <?php foreach ($artigos as $art) { ?>
                <?php $cat = $categoria->encontrePorId($art['categoria_id']); ?>
                <?php $aut = $autor->encontrePorId($art['autor_id']); ?>

                <div id="artigo-admin">
                    <p>
                        <?php echo $art['titulo']; ?>.
                        R: <?php echo $art['resumo']; ?>.
                        Data: <?php if (!empty($art['data'])) echo date('d-m-Y', strtotime($art['data'])); ?>
                    </p>
                    <p>
                        Categoria: <?= $cat['titulo']; ?> <br>
                        Autor: <?= $aut['titulo']; ?>
                    </p>
                    <nav>
                        <a class="botao" href="artigo/editar.php?id=<?php echo $art['id']; ?>">Editar</a>
                        <a class="botao" href="artigo/excluir.php?id=<?php echo $art['id']; ?>">Excluir</a>
                    </nav>
                </div>
            <?php } ?>
        </div>
        <a class="botao botao-block" href="artigo/adicionar.php">Adicionar Artigo</a>
    </div>

    <div id="container">
        <div class="row">
            <div class="col">
                <h1>Categorias</h1>
                <div>

                    <?php foreach ($categorias as $cat) { ?>
                        <div id="artigo-admin">
                            <p><?php echo $cat['titulo']; ?></p>
                            <nav>
                                <a class="botao" href="categoria/editar.php?id=<?php echo $cat['id']; ?>">Editar</a>
                                <a class="botao" href="categoria/excluir.php?id=<?php echo $cat['id']; ?>">Excluir</a>
                            </nav>
                        </div>

                    <?php } ?>

                </div>
                <a class="botao botao-block" href="categoria/adicionar.php">Adicionar Categoria</a>
            </div>

            <div class="col">
                <h1>Autores</h1>
                <div>

                    <?php foreach ($autores as $aut) { ?>
                        <div id="artigo-admin">
                            <p><?php echo $aut['titulo']; ?></p>
                            <nav>
                                <a class="botao" href="autor/editar.php?id=<?php echo $aut['id']; ?>">Editar</a>
                                <a class="botao" href="autor/excluir.php?id=<?php echo $aut['id']; ?>">Excluir</a>
                            </nav>
                        </div>

                    <?php } ?>

                </div>
                <a class="botao botao-block" href="autor/adicionar.php">Adicionar Autores</a>
            </div>
        </div>
    </div>

</body>

</html>