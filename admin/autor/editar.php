<?php
require '../../config.php';
require '../../src/Autor.php';
require '../../src/redireciona.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = new Autor($mysql);
    $autor->editar($_POST['id'], $_POST['titulo']);
    redireciona('/wp-clone/wp-clone/admin/index.php');
}

$autor = new Autor($mysql);
$aut = $autor->encontrePorId($_GET['id']);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Editar Autor</title>
</head>

<body>
    <div id="container">
        <h1>Editar Autor</h1>
        <form action="editar.php" method="post">
            <p>
                <label for="titulo">Digite o novo título do Autor</label>
                <input class="campo-form" type="text" name="titulo" id="titulo" value="<?php echo $aut['titulo']; ?>" />
            </p>
            <p>
                <input type="hidden" name="id" value="<?php echo $aut['id']; ?>" />
            </p>
            <p>
                <button class="botao">Editar Autor</button>
            </p>
        </form>
    </div>
</body>

</html>