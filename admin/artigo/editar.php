<?php
require '../../config.php';
require '../../src/Artigo.php';
require '../../src/redireciona.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->editar($_POST['id'], $_POST['titulo'], $_POST['conteudo']);
    redireciona('/wp-clone/wp-clone/admin/index.php');
}


$artigo = new Artigo($mysql);
$art = $artigo->encontrePorId($_GET['id']);


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
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo $art['conteudo']; ?></textarea>
            </p>
            <p>
                <label for="resumo">Digite o resumo do artigo</label>
                <textarea class="campo-form" type="text" name="resumo" id="resumo"><?php echo $art['resumo']; ?></textarea>
            </p>
            <p>
                <label for="conteudo">Digite o novo conteúdo do artigo</label>
                <textarea class="campo-form" type="text" name="conteudo" id="titulo"><?php echo $art['conteudo']; ?></textarea>
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