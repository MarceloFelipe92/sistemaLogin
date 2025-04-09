<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
  header("Location: ../sistema-login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Painel Futebol</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color:rgba(179, 248, 225, 0.2);">

  <?php include '../navbar.php'; ?>
  <?php include '../mensagens.php'; ?>

  <div class="content">

    <div class="container mt-4">

      <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="../index.php" class="btn btn-dark">
          <i class="fas fa-arrow-left me-2"></i>Voltar para o Início
        </a>
        <a href="index.php" class="btn btn-success">
          <i class="fas fa-chart-bar me-2"></i>Painel de Vendas
        </a>
      </div>

      <h3 class="mb-4"><i class="fas fa-futbol text-primary"></i> Painel de Gerenciamento - Futebol</h3>
      <p class="text-muted">Adicione, edite ou exclua itens como bolas, uniformes, chuteiras e outros produtos esportivos.</p>
      <hr>

      <div class="row g-3">
        <div class="col-md-4">
          <a href="cadastrar.php" class="btn btn-outline-primary w-100 p-3 shadow-sm">
            <i class="fas fa-plus-circle me-2"></i>Cadastrar Produto
          </a>
        </div>
        <div class="col-md-4">
          <a href="./editar.php" class="btn btn-outline-secondary w-100 p-3 shadow-sm">
            <i class="fas fa-edit me-2"></i>Editar Produtos
          </a>
        </div>
        <div class="col-md-4">
          <a href="#" class="btn btn-outline-danger w-100 p-3 shadow-sm">
            <i class="fas fa-trash me-2"></i>Remover Produto
          </a>
        </div>
      </div>



    </div>
  </div>

</body>

</html>