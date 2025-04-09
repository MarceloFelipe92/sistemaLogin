<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../sistema-login.php");
    exit;
}


// Simulação de dados
$totalVendas = 312;
$estoqueAtual = 120;
$visitantes = 2110;
$receitaTotal = 23650.00;
$usuariosAtivos = 12;
$vendasMensais = [28, 34, 29, 40, 38, 60, 75, 68, 55, 49, 33, 21];

$produtosBaixoEstoque = [
  ['nome' => 'Bola de Futebol', 'estoque' => 3],
  ['nome' => 'Chuteira Infantil', 'estoque' => 5]
];

$maisVendidos = [
  ['nome' => 'Camisa Oficial', 'vendas' => 73],
  ['nome' => 'Meião Esportivo', 'vendas' => 64]
];
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

<div class="content" style="margin-left: 250px;">
  <div class="container mt-4">
  <h2 class="mb-4"><i class="fas fa-futbol text-success"></i> Painel de Controle - Futebol</h2>

<!-- Botões de navegação -->
<div class="mb-4 d-flex gap-2">
  <a href="dashboard.php" class="btn btn-outline-dark">
    <i class="fas fa-plus me-1"></i> Cadastrar Produto
  </a>
</div>


    <div class="row g-4">
      <!-- Vendas -->
      <div class="col-md-3">
        <div class="card text-white bg-success shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-shopping-cart me-2"></i>Vendas Totais</h5>
            <p class="fs-4"><?= $totalVendas ?> vendas</p>
          </div>
        </div>
      </div>

      <!-- Estoque -->
      <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-boxes me-2"></i>Estoque Atual</h5>
            <p class="fs-4"><?= $estoqueAtual ?> unidades</p>
          </div>
        </div>
      </div>

      <!-- Visitantes -->
      <div class="col-md-3">
        <div class="card text-white bg-dark shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-eye me-2"></i>Visitantes</h5>
            <p class="fs-4"><?= $visitantes ?> acessos</p>
          </div>
        </div>
      </div>

      <!-- Receita -->
      <div class="col-md-3">
        <div class="card text-white bg-warning shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-dollar-sign me-2"></i>Receita</h5>
            <p class="fs-4">R$ <?= number_format($receitaTotal, 2, ',', '.') ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Usuários ativos -->
    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-users text-secondary me-2"></i>Usuários Ativos</h5>
        <p class="fs-5"><?= $usuariosAtivos ?> acessos simultâneos</p>
      </div>
    </div>

    <!-- Gráfico -->
    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-chart-line text-info me-2"></i>Vendas Mensais - 2025</h5>
        <canvas id="graficoVendas" height="100"></canvas>
      </div>
    </div>

    <!-- Produtos com baixo estoque -->
    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-exclamation-triangle text-danger me-2"></i>Produtos com Baixo Estoque</h5>
        <ul class="list-group">
          <?php foreach ($produtosBaixoEstoque as $produto): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <?= $produto['nome'] ?>
              <span class="badge bg-danger"><?= $produto['estoque'] ?> unidades</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <!-- Produtos mais vendidos -->
    <div class="card mt-4 shadow mb-5">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-star text-success me-2"></i>Produtos Mais Vendidos</h5>
        <ul class="list-group">
          <?php foreach ($maisVendidos as $produto): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <?= $produto['nome'] ?>
              <span class="badge bg-success"><?= $produto['vendas'] ?> vendas</span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

  </div>
</div>

<script>
const ctx = document.getElementById('graficoVendas').getContext('2d');
const graficoVendas = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        datasets: [{
            label: 'Vendas',
            data: <?= json_encode($vendasMensais) ?>,
            backgroundColor: 'rgba(40, 167, 69, 0.3)',
            borderColor: 'rgba(40, 167, 69, 1)',
            borderWidth: 2,
            fill: true,
            tension: 0.3
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>

</body>
</html>
