<?php
// CHAMA O ARQUIVO ABAIXO NESTA TELA
include "../verificar-autenticacao.php";



try {
    if (!$_POST) {
        throw new Exception("Acesso indevido! Tente novamente.");
    }

    if ($_FILES["clientImage"]["name"] != "") {
        // PEGAR A EXTENSÃO DO ARQUIVO
        $extensao = pathinfo($_FILES["clientImage"]["name"], PATHINFO_EXTENSION);
        // GERAR UM NOVO NOME PARA O ARQUIVO    
        $novo_nome = md5(uniqid() . microtime()) . ".$extensao";
        // MOVER O ARQUIVO PARA A PASTA DE IMAGENS
        move_uploaded_file($_FILES["clientImage"]["tmp_name"], "imagens/$novo_nome");
        // ADICIONAR O NOME DO ARQUIVO NO POST
        $_POST["clientImage"] = $novo_nome;

        // SE JÁ EXISTIR UMA IMAGEM CADASTRADA
        if ($_POST["currentClientImage"] != "") {
            // EXCLUIR IMAGEM DO CLIENTE
            unlink("imagens/" . $_POST["currentClientImage"]);
        } 
    } else {
        $_POST["clientImage"] = $_POST["currentClientImage"];
    }

    if ($_POST["clientId"] == "") {
        $_SESSION["clientes"][] = $_POST; // CLIENTE NOVO
        $msg = "Cliente cadastrado com sucesso!";
    } else {
        // CLIENTE JÁ CADASTRADO
        $_SESSION["clientes"][$_POST["clientId"]] = $_POST;
        $msg = "Cliente atualizado com sucesso!";
    }

    $_SESSION["msg"] = $msg;
} catch (Exception $e) {
    $_SESSION["msg"] = $e->getMessage();
} finally {
    header("Location:./detalhe-cliente.php");
    exit;
}
