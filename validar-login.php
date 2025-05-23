<?php
// INICIAR SESSÃO GLOBAL
session_start(); // PERMITE TRABALHAR COM VARIÁVEIS GLOBAIS

// EXIBIR DADOS DO ARRAY (vetor)
// var_dump($_POST);exit;

if ($_POST) {
    // ARMAZENA OS DADOS DIGITADOS NA TELA DE LOGIN
    $email = $_POST["email"];
    $password = $_POST["password"];
    $remember = $_POST["remember"] ?? "off";

    // VERIFICA SE O EMAIL E SENHA ESTÃO CORRETOS
    if ($email == "matheus@hotmail.com" && $password == "1234") {
        $_SESSION["autenticado"] = true; // CRIA VARIÁVEL GLOBAL
        $_SESSION["tempo_login"] = time(); // CRIA VARIÁVEL COM TEMPO DE LOGIN

        // VERIFICAR SE É NECESSÁRIO GRAVAR EMAIL E SENHA
        if ($remember == "on") {
            setcookie("email", $email);
            setcookie("password", $password);
            setcookie("remember", $remember);
        } else {
            setcookie("email");
            setcookie("password");
            setcookie("remember");
        }

        $_SESSION['url'] = "http://localhost/admin/"; // URL DO SISTEMA
        header("Location: " . $_SESSION["url"] . "index.php");
        exit; // Encerra o script para garantir que não seja executado mais nada após o redirecionamento
    } else {
        $_SESSION['msg'] = "E-mail ou senha incorretos!";
        header("Location: " . $_SESSION["url"] . "tela-login.php");
        exit; // Encerra o script para garantir que não seja executado mais nada após o redirecionamento
    }
} else {
    // REDIRECIONA PARA A TELA DE LOGIN
    header("Location: ./tela-login.php");
    exit; // Encerra o script para garantir que não seja executado mais nada após o redirecionamento
}