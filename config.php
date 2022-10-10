<?php

$mysql = new mysqli('localhost', '', '', '');
$mysql->set_charset('utf8');

if ($mysql == FALSE) {
    echo "Erro na conexão";
}
