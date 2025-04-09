<?php
session_start();

// Dados válidos (você pode mudar esses valores)
$usuario_correto = "matheus@hotmail.com";
$senha_correta = "1234";

// Dados enviados pelo formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica se estão corretos
if ($email === $usuario_correto && $senha === $senha_correta) {
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $email;
    header("Location: ./");
    exit;
} else {
    // Redireciona com erro
    echo "<script>alert('E-mail ou senha incorretos!'); window.location.href = 'sistema-login.php';</script>";
    
}
?>
