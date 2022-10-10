<?php

$mysql = new mysqli('localhost', 'root', '', 'wp-clone');
$mysql->set_charset('utf8');

if ($mysql == FALSE) {
    echo "Erro na conexão";
}
