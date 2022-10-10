<?php
require '../../config.php';
require '../../src/Artigo.php';
require '../../src/Categoria.php';
require '../../src/Autor.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['conteudo'], $_POST['resumo'], $_POST['data'], $_POST['categoria_id'], $_POST['autor_id']);
    redireciona('/wp-clone/wp-clone/admin/index.php');
}

$artigo = new Artigo($mysql);
$art = $artigo->encontrePorId($_GET['id']);

$categoria = new Categoria($mysql);
$categorias = $categoria->exibirTodos();

$autor = new Autor($mysql);
$autores = $autor->exibirTodos();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Editar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Editar Artigo</h1>
        <form action="editar.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do artigo</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $art['titulo']; ?>" />
            </p>
            <p>
                <label for="">Digite o novo resumo do artigo</label>
                <input class="campo-form" type="text" name="resumo" id="resumo" value="<?php echo $art['resumo']; ?>"></input>
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"> <?php echo $art['conteudo']; ?></textarea>
            </p>
            <p>
                <label for="">Digite o conteúdo do artigo</label>
                <input class="campo-form" type="date" name="data" id="data" value="<?php echo $art['data']; ?>"></input>
            </p>

            <p>
                <label for="">Selecione a categoria do artigo</label>
                <select name="categoria_id" id="categoria_id">
                    <?php foreach ($categorias as $cat) { ?>
                        <option value="<?= $cat['id']; ?>" <?php if ($cat['id'] == $art['categoria_id']) { ?> selected <?php } ?>><?= $cat['titulo']; ?> </option>
                    <?php } ?>
                </select>

            </p>

            <p>
                <label for="">Selecone o autor do artigo</label>
                <select name="autor_id" id="autor_id">
                    <?php foreach ($autores as $aut) { ?>
                        <option value="<?= $aut['id']; ?>" <?php if ($aut['id'] == $art['autor_id']) { ?> selected <?php } ?>><?= $aut['titulo']; ?> </option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <input type="hidden" name="id" value="<?php echo $art['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>