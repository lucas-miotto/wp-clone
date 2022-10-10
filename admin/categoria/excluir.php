<?php
require '../../config.php';
require '../../src/Categoria.php';
require '../../src/redireciona.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $categoria = new Categoria($mysql);
    $categoria->remover($_POST['id']);

    redireciona('/wp-clone/wp-clone/admin/index.php');
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    <meta charset="UTF-8">
    <title>Excluir Categoria</title>
</head>

<body>
    <div id="container">
        <h1>Você realmente deseja excluir a categoria?</h1>
        <form method="post" action="excluir.php">
            <p>
                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                <button class="botao">Excluir</button>
            </p>
        </form>
    </div>
</body>

</html>