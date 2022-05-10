<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/styleCadastroForm.css">
</head>

<body>

<?php
    $id=$_GET['id'];
    if(!empty($id)){
        include 'conexaoBanco.php';
        $select = sprintf("SELECT nome,idade,email,celular,sexo FROM teste WHERE id=$id");
        $result= mysqli_query($conexao, $select);
        $teste= mysqli_fetch_assoc($result);
        $sexo=$teste['sexo'];
        if($sexo == 1){
            $sexo='Masculino';
        }elseif($sexo == 2){
            $sexo='Feminino';
        }
        mysqli_close($conexao);
    }
?>
        <div id="bloco">

            <div id="topo">
                <img src="imagens/perfil.png" height="100" width="100" >
                <h1>Cadastro de Pessoas</h1>
            </div>

            <form action="cadastroFormDo.php" method="post">
                <div>
                    <div class="inp">
                    <p>Nome</p>
                    <input type="text" name="nome" placeholder="Insira seu nome" required value="<?=$teste['nome']?>">
                    </div>

                    <div class="inp">
                    <p>Idade</p>
                    <input  type="number" name="idade" placeholder="Insira sua idade" min="0" max="130" required value="<?=$teste['idade']?>">
                    </div>

                    <div class="inp">
                    <p>E-mail</p>
                    <input  type="email" name="email" placeholder="Insira seu E-mail" required value="<?=$teste['email']?>">
                    </div>

                    <div class="inp">
                    <p>Celular</p>
                    <input  type="number" name="celular" placeholder="Insira seu celular" required value="<?=$teste['celular']?>">
                    </div>

                    <div class="inp">
                    <p>Sexo</p>
                        <div class="rad">
                            <input  type="radio" name="sexo" value="Masculino" required <? if($sexo=='Masculino'){echo "checked";}?>>
                            <label for="sexo">Masculino</label>
                            <input  type="radio" name="sexo" value="Feminino" required <? if($sexo=='Feminino'){echo "checked";}?>>
                            <label for="sexo">Feminino</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Cadastrar</button> 
                <input type="hidden" name="id" value="<?=$id?>">               
            </form>

            

        </div>

</body>
</html>