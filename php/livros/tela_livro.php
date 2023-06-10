<?php

    include "livro.php";
    include "livro_dao.php";
    include "conexao.php";

    $msg = "";

    if (!empty($_POST))
    {
        $objeto = new Livro();
        $objeto->set("id", $_POST["id"]);
        $objeto->set("nome", $_POST["nome"]);
        $objeto->set("autor", $_POST["autor"]);
        $objeto->set("data_pb", $_POST["data_pb"]);
        $objeto->set("edicao", $_POST["edicao"]);

        foreach ($_POST as $chave=>$botao)
        {
            if ($botao == "Cadastrar")
            {
                $msg = $objeto->cadastrar();
            }
            if ($botao == "Alterar")
            {
                $msg = $objeto->alterar();
            }
            if ($botao == "Excluir")
            {
                $msg = $objeto->excluir();
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>
<body>
    <form action="" method="post">
        <h2>ID</h2>
        <input type="text" name="id"><br>
        <h2>Nome</h2>
        <input type="text" name="nome"><br>
        <h2>Autor</h2>
        <input type="text" name="autor"><br>
        <h2>Data de Publicação</h2>
        <input type="text" name="data_pb"><br>
        <h2>Edição</h2>
        <input type="text" name="edicao"><br><br>
        <input type="submit" value="Cadastrar" name="cadastrar">
        <input type="submit" value="Alterar" name="alterar">
        <input type="submit" value="Excluir" name="excluir">
    </form><br>
    <?php
        echo $msg;
    ?>
</body>
</html>