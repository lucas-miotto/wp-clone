<?php
require '../../config.php';
require '../../src/Categoria.php';
require '../../src/redireciona.php';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = new Categoria($mysql);
    $categoria->editar($_POST['id'], $_POST['titulo']);
    redireciona('/wp-clone/wp-clone/admin/index.php');
}


$categoria = new Categoria($mysql);
$cat = $categoria->encontrePorId($_GET['id']);


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Editar Categoria</title>
</head>

<body>
    <div id="container">
        <h1>Editar Categoria</h1>
        <form action="editar.php" method="post">
            <p>
                <label for="titulo">Digite o novo título da categoria</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $cat['titulo']; ?>" />
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $cat['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Categoria</button>
            </p>
        </form>
    </div>
</body>

</html>