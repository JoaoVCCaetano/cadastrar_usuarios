<?php
include 'conexaoBanco.php';
$id=$_POST['id'];
$nome = $_POST["nome"];
$idade = $_POST["idade"];
$email = $_POST["email"];
$celular = $_POST["celular"];
$sexo= $_POST["sexo"];

if($sexo=='Masculino'){
    $sexo=1;
} elseif($sexo=='Feminino'){
    $sexo=2;
}

if(!empty($id)){
    $update = "UPDATE teste SET nome='$nome', idade='$idade', email='$email', celular='$celular', sexo='$sexo' WHERE id=$id";
    if (mysqli_query($conexao, $update)) {
        header('location:cadastroIndex.php');
    } else {
        echo "Erro ao atualizar: " . $update . "<br>" . mysqli_error($conexao);
    }
}else{
    $create = "INSERT INTO teste (nome, idade, email, celular, sexo) VALUES ('$nome', '$idade', '$email', '$celular', '$sexo')";
    if (mysqli_query($conexao, $create)) {
        header('location:cadastroIndex.php');
    } else {
        echo "Erro na criação: " . $create . "<br>" . mysqli_error($conexao);
    }
}
mysqli_close($conexao);
?>