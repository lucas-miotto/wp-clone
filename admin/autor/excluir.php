<?php
require '../../config.php';
require '../../src/Autor.php';
require '../../src/redireciona.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = new Autor($mysql);
    $autor->remover($_POST['id']);

    redireciona('/wp-clone/wp-clone/admin/index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Excluir Autor</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir o autor?</h1>
        <form method="post" action="excluir.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>