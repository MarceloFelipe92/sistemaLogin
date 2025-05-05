<?php

include '../verificar-autenticacao.php'



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Painel Futebol</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color:rgba(179, 248, 225, 0.2);">

  <?php include '../navbar.php'; ?>
  <?php include '../mensagens.php'; ?>


  <div class="container mt-5">

    <div class="flex-grow-1 content">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4><i class="bi bi-trophy"></i> Painel Administrativo - Futebol</h4>
        <a href="#" class="btn btn-outline-danger">Sair</a>
      </div>
      <div class="row g-3">
      <div class="col-md-4">
        <a href="<?php echo $_SESSION["url"]; ?>/academia/detalhe-produto.php" class="btn btn-outline-danger w-100 p-3 shadow-sm">
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
      <!-- Cards de Seções -->
      <div class="row text-center mb-4 mt-4">
        <div class="col-md-3">
          <div class="border category-card border-primary rounded p-3">
            <h6>Jogadores (0)</h6>
            <p>Gerencie jogadores cadastrados.</p>
            <button class="btn btn-sm btn-primary">Acessar</button>
          </div>
        </div>
        <div class="col-md-3">
          <div class="border category-card border-success rounded p-3">
            <h6>Técnicos (0)</h6>
            <p>Controle de treinadores no sistema.</p>
            <button class="btn btn-sm btn-success">Acessar</button>
          </div>
        </div>
        <div class="col-md-3">
          <div class="border category-card border-danger rounded p-3">
            <h6>Equipamentos (0)</h6>
            <p>Gerencie todos os equipamentos.</p>
            <button class="btn btn-sm btn-danger">Acessar</button>
          </div>
        </div>
        <div class="col-md-3">
          <div class="border category-card border-warning rounded p-3">
            <h6>Vendas (0)</h6>
            <p>Acompanhe todas as vendas.</p>
            <button class="btn btn-sm btn-warning">Acessar</button>
          </div>
        </div>
      </div>

      <!-- Resumo Geral -->
      <h5 class="mb-3">Resumo Geral</h5>
      <div class="row text-center">
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h6>Total de Produtos</h6>
              <p class="fw-bold">78</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h6>Estoque Total</h6>
              <p class="fw-bold">230</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h6>Vendas no Mês</h6>
              <p class="fw-bold">31</p>
            </div>
          </div>
        </div>
        <div class="col-md-3 mb-3">
          <div class="card">
            <div class="card-body">
              <h6>Visitantes</h6>
              <p class="fw-bold">980</p>
            </div>
          </div>
        </div>
      </div>
  </div>


    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>