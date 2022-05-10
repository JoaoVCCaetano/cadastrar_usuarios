<?php

$id=$_POST['id'];

include 'conexaoBanco.php';

$deletar = "DELETE FROM teste WHERE id=$id";
mysqli_query($conexao,$deletar) or die('Deu erro aqui'.mysqli_error($conexao));
mysqli_close($conexao);
header('location:cadastroIndex.php');
?>