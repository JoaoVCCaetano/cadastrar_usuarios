<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela listagem</title>
    <link rel="stylesheet" type="text/css" href="css/styleCadastroIndex.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <header>
        <div id="item_topo">
            <img src="imagens/perfil.png" height="50" width="50">
            <h1>Listagem de Pessoas</h1>
        </div>
    </header>
    <div id="container">
        <a href="http://localhost:8001/tela_cadastro/cadastroForm.php"><button id="ncadastro">Novo Cadastro</button></a>
        <div id="pesquisa">
            <p>Pesquisar:</p>
            <input id="pesquisar" name="pesquisa" type="text">
        </div>

        <div id="tabelaPessoa"></div>

        <script>
            let filtroNome = document.getElementById("pesquisar")
            window.onload = ajax()
            filtroNome.addEventListener("keyup", ajax)
            function ajax() {
                $.ajax({
                        method: 'GET',
                        url: 'popularFormDo.php',
                        data: {
                            nome: filtroNome.value,
                        }
                    })
                    .done(function(data) {
                        $("#tabelaPessoa").html(data);
                    })
            }
        </script>
    </div>

</body>

</html>