<?php
$conexao = mysqli_connect('db.trator.w2o', 'root', 'root');
if (!$conexao) {
    die ('N?o é possível conectar: '.mysqli_connect_error());
}

$seleciona_db = mysqli_select_db($conexao,'teste');
if (!$seleciona_db) {
    die ('Algo deu errado'.mysqli_connect_error());
}
unset($seleciona_db);
?>