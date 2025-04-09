<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../sistema-login.php");
    exit;
}

$totalVendas = 128;
$estoqueAtual = 85;
$visitantes = 946;
$receitaTotal = 9850.75;
$usuariosAtivos = 5;
$vendasMensais = [10, 22, 15, 30, 12, 39, 45, 48, 20, 25, 18, 10];

$produtosBaixoEstoque = [
  ['nome' => 'Touca de Natação', 'estoque' => 3],
  ['nome' => 'Óculos Aquáticos', 'estoque' => 2]
];

$maisVendidos = [
  ['nome' => 'Maiô Profissional', 'vendas' => 40],
  ['nome' => 'Sunga Infantil', 'vendas' => 35]
];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Painel Natação</title>
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
    <h2 class="mb-4"><i class="fas fa-swimmer text-primary"></i> Painel de Controle - Natação</h2>

    <div class="row g-4">
      <div class="col-md-3">
        <div class="card text-white bg-primary shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-shopping-cart me-2"></i>Vendas Totais</h5>
            <p class="fs-4"><?= $totalVendas ?> vendas</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-white bg-info shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-boxes me-2"></i>Estoque Atual</h5>
            <p class="fs-4"><?= $estoqueAtual ?> unidades</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-white bg-dark shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-eye me-2"></i>Visitantes</h5>
            <p class="fs-4"><?= $visitantes ?> acessos</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card text-white bg-secondary shadow">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-dollar-sign me-2"></i>Receita</h5>
            <p class="fs-4">R$ <?= number_format($receitaTotal, 2, ',', '.') ?></p>
          </div>
        </div>
      </div>
    </div>

    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-users text-primary me-2"></i>Usuários Ativos</h5>
        <p class="fs-5"><?= $usuariosAtivos ?> acessos simultâneos no momento</p>
      </div>
    </div>

    <div class="card mt-4 shadow">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-chart-line text-primary me-2"></i>Vendas Mensais - 2025</h5>
        <canvas id="graficoVendas" height="100"></canvas>
      </div>
    </div>

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

    <div class="card mt-4 shadow mb-5">
      <div class="card-body">
        <h5 class="card-title"><i class="fas fa-star text-primary me-2"></i>Produtos Mais Vendidos</h5>
        <ul class="list-group">
          <?php foreach ($maisVendidos as $produto): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <?= $produto['nome'] ?>
              <span class="badge bg-primary"><?= $produto['vendas'] ?> vendas</span>
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
            backgroundColor: 'rgba(13, 110, 253, 0.3)',
            borderColor: 'rgba(13, 110, 253, 1)',
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
