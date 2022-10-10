<?php 
require 'config.php';
require 'src/Artigo.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$obj_artigo = new Artigo($mysql);
$artigo = $obj_artigo->encontrePorId($_GET['id']); 


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div id="container">
        <h1>
            <?php echo $artigo['titulo']; ?>
        </h1>
        <p>
            <?php echo nl2br($artigo['conteudo']); ?>
        </p>
        <div>
            <a class="botao botao-block" href="index.php">Voltar</a>
        </div>
    </div>
</body>

</html>