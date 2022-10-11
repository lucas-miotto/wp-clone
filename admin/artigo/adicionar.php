<?php
require '../../config.php';
require '../../src/Artigo.php';
require '../../src/Categoria.php';
require '../../src/Autor.php';
require '../../src/redireciona.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artigo = new Artigo($mysql);
    $artigo->adicionar($_POST['titulo'], $_POST['conteudo'], $_POST['resumo'], $_POST['data'], $_POST['categoria_id'], $_POST['autor_id'], $_FILES["fileToUpload"]["name"]);

    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

    redireciona('/wp-clone/wp-clone/admin/index.php');
}

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
    <title>Adicionar Artigo</title>
</head>

<body>
    <div id="container">
        <h1>Adicionar Artigo</h1>
        <form action="adicionar.php" method="post" enctype="multipart/form-data">
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
                <label for="">Digite a data do artigo</label>
                <input class="campo-form" type="date" name="data" id="data"></input>
            </p>

            <p>
                <label for="">Selecione a categoria do artigo</label>
                <select name="categoria_id" id="categoria_id">
                    <?php foreach ($categorias as $cat) { ?>
                        <option value="<?= $cat['id']; ?>"><?= $cat['titulo']; ?> </option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label for="">Selecone o autor do artigo</label>
                <select name="autor_id" id="autor_id">
                    <?php foreach ($autores as $aut) { ?>
                        <option value="<?= $aut['id']; ?>"><?= $aut['titulo']; ?> </option>
                    <?php } ?>
                </select>
            </p>

            <p>
                <label for="">Selecione a imagem:</label>
                <input type="file" name="fileToUpload" id="fileToUpload">
            </p>
            <p>
                <button class="botao">Criar Artigo</button>
            </p>
        </form>
    </div>
</body>

</html>