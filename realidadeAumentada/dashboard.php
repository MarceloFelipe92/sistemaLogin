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
  <title>Painel Realidade Aumentada</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Estilo Global -->
  <link rel="stylesheet" href="../style.css">
</head>
<body style="background-color:rgba(179, 248, 225, 0.2);">

<?php include '../navbar.php'; ?>
<?php include '../mensagens.php'; ?>

<!-- Conteúdo -->
<div class="content">
  <div class="container mt-4">
    <div class="card shadow-sm border-warning">
      <div class="card-body">
        <h3 class="mb-4 text-dark">
          <i class="fas fa-vr-cardboard text-warning me-2"></i>Painel de Gerenciamento - Realidade Aumentada
        </h3>
        <p class="text-muted">Cadastre, edite ou remova produtos dessa seção tecnológica e inovadora.</p>

        <hr>

        <div class="row g-3 mt-3">
          <div class="col-md-4">
            <a href="cadastrar.php" class="btn btn-outline-warning w-100 p-3 shadow-sm">
              <i class="fas fa-plus-circle me-2"></i>Cadastrar Produto
            </a>
          </div>
          <div class="col-md-4">
            <a href="#" class="btn btn-outline-secondary w-100 p-3 shadow-sm">
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
  </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

