<?php
include 'conexaoBanco.php';
$valor=$_GET['nome'];
if(isset($valor)){
    $query ="SELECT id, nome, idade, email, celular, sexo FROM teste WHERE nome LIKE '%$valor%'";
}else{
    $query ="SELECT id, nome, idade, email, celular, sexo FROM teste";
}
$dados = mysqli_query($conexao, $query) or die('Deu erro aqui' . mysqli_error($conexao));
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);
?>

<table>
            <tr style="background-color: rgb(3, 159, 187)">
                <th><strong>Id</strong></th>
                <th><strong>Nome</strong></th>
                <th><strong>Idade</strong></th>
                <th><strong>Email</strong></th>
                <th><strong>Celular</strong></th>
                <th><strong>Sexo</strong></th>
                <th><strong>Ação</strong></th>
            </tr>
            <?php
            if ($total > 0) {
                do {
            ?>
                    <tr>
                        <td><?= $linha['id'] ?></td>
                        <td><?= $linha['nome'] ?></td>
                        <td><?= $linha['idade'] ?></td>
                        <td><?= $linha['email'] ?></td>
                        <td><?= $linha['celular'] ?></td>
                        <td>
                            <?php
                            if ($linha['sexo'] == 1) {
                            ?>
                                <p>Masculino</p>
                            <?php
                            } elseif ($linha['sexo'] == 2) {
                            ?>
                                <p>Feminino</p>
                            <?php
                            }
                            ?>
                        </td>
                        <td id="ltd">
                            <form action="cadastroForm.php" method="GET">
                                <button id="btnedit" class="btnopt">
                                    <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                                </button>
                            </form>

                            <form action="excluirFormDo.php" method="POST">
                                <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                                <button type="submit" id="btndlt" class="btnopt"></button>
                            </form>
                        </td>
                    </tr>
            <?php
                } while ($linha = mysqli_fetch_assoc($dados));
            }
            ?>
            <tr style="background-color: rgb(3, 159, 187)">
                <td style="text-align: right;" colspan="7"><strong>
                        <p style="margin-right: 30px;">Foram encontrados um total de <?= $total ?> registros. </p>
                    </strong></td>
            </tr>
        </table>
<?php
mysqli_close($conexao);
?>                        