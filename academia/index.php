<?php

include "../verificar-autenticacao.php";

// INDICA QUAL PÁGINA ESTOU NAVEGANDO
$pagina = "home";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel Academia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../style.css">
</head>
<body style="background-color:rgba(179, 248, 225, 0.2);">

<?php include '../navbar.php'; ?>
<?php include '../mensagens.php'; ?>

<div class="content ">
  <div class="container mt-4">
    <h3 class="mb-4"><i class="fas fa-dumbbell text-danger"></i> Painel de Gerenciamento - Academia</h3>
    <p class="text-muted">Gerencie os equipamentos, acessórios e suplementos voltados para musculação e treino físico.</p>
<hr>

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
  </div>
</div>

<div class="content">
  <div class="container mt-4">
    <h2 class="mb-4"><i class="fas fa-dumbbell text-danger"></i> Painel de Controle - Academia</h2>

    <div class="row g-4">
      <div class="col-md-3">
        <div class="card text-white bg-danger shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-shopping-cart me-2"></i>Vendas Totais</h5>
            <p class="fs-4"> Vendas</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-boxes me-2"></i>Estoque Atual</h5>
            <p class="fs-4">Unidades</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-dark shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-eye me-2"></i>Visitantes</h5>
            <p class="fs-4">Acessos</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card text-white bg-warning shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-dollar-sign me-2"></i>Receita</h5>
            <p class="fs-4">R$ </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-users text-secondary me-2"></i>Usuários Ativos</h5>
        <p class="fs-5"> Acessos simultâneos no momento</p>
      </div>
    </div>

    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-chart-line text-info me-2"></i>Vendas Mensais - 2025</h5>
        <canvas id="graficoVendas" height="100"></canvas>
      </div>
    </div>

    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-exclamation-triangle text-danger me-2"></i>Produtos com Baixo Estoque</h5>
        <ul class="list-group">
         
            <li class="list-group-item d-flex justify-content-between align-items-center">
             
              <span class="badge bg-danger">unidades</span>
            </li>
          
        </ul>
      </div>
    </div>

    <div class="card mt-4 shadow mb-5">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-star text-danger me-2"></i>Produtos Mais Vendidos</h5>
        <ul class="list-group">
        
            <li class="list-group-item d-flex justify-content-between align-items-center">
             
              <span class="badge bg-danger"> vendas</span>
            </li>
       
        </ul>
      </div>
    </div>

  </div>
</div>

</body>
</html>
