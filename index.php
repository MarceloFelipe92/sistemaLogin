<?php
// CHAMA O ARQUIVO ABAIXO NESTA TELA

include "verificar-autenticacao.php";

// INDICA QUAL PÁGINA ESTOU NAVEGANDO
$pagina = "home";



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel Administrativo</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

  <!-- Estilo Global -->
  <link rel="stylesheet" href="./style.css">


</head>
<body style="background-color:rgba(179, 248, 225, 0.2);">

<?php
    include "mensagens.php";
    include "navbar.php";
    ?>

<!-- Conteúdo Principal -->
<div class="content py-5 ">
  <div class="container">
    <h2 class="dashboard-heading text-center"><i class="fas fa-cogs me-2 text-primary"></i>Painel Administrativo</h2>

    <div class="row gy-4">
      <!-- Clientes -->
      <div class="col-md-6 col-lg-3">
        <div class="category-card border-start border-primary border-5">
          <i class="fas text-primary"></i>
          <h4>Clientes (<?php echo isset($_SESSION["clientes"]) ? count($_SESSION["clientes"]) : 0; ?>)</h4>
          <p>Gerencie todos os clientes no sistema.</p>
          <a href="<?php echo $_SESSION["url"]; ?>/clientes" class="btn btn-outline-primary btn-sm">Acessar</a>
        </div>
      </div>

      <!-- Fornecedores -->
      <div class="col-md-6 col-lg-3">
        <div class="category-card border-start border-success border-5">
          <i class="fas text-success"></i>
          <h4>Fornecedores (<?php echo isset($_SESSION["fornecedores"]) ? count($_SESSION["fornecedores"]) : 0; ?>)</h4>
          <p>Controle de todos os fornecedores no sistema.</p>
          <a href="<?php echo $_SESSION["url"]; ?>/fornecedores" class="btn btn-outline-success btn-sm">Acessar</a>
        </div>
      </div>

      <!-- Produtos -->
      <div class="col-md-6 col-lg-3">
        <div class="category-card border-start border-danger border-5">
          <i class="fas  text-danger"></i>
          <h4>Produtos (<?php echo isset($_SESSION["produtos"]) ? count($_SESSION["produtos"]) : 0; ?>)</h4>
          <p>Gerencie todos os produtos no sistema.</p>
          <a href="<?php echo $_SESSION["url"]; ?>/produtos" class="btn btn-outline-danger btn-sm">Acessar</a>
        </div>
      </div>

      <!-- Vendas -->
      <div class="col-md-6 col-lg-3">
  <div class="category-card border-start border-warning border-5">
    <i class="fas  text-warning"></i>
    <h4>Vendas (<?php echo isset($_SESSION["vendas"]) ? count($_SESSION["vendas"]) : 0; ?>)</h4>
    <p>Acompanhe em tempo real todas as vendas no sistema.</p>
    <a href="<?php echo $_SESSION["url"]; ?>/vendas" class="btn btn-outline-warning btn-sm">Acessar</a>
  </div>
</div>

    </div>

    <!-- Sessão futura para métricas/resumo -->
    
    <div class="mt-5">
      <h5 class="section-title"><i class="fas fa-chart-bar me-2 text-info"></i>Resumo Geral</h5>
      <div class="row text-center">
        <div class="col-md-3">
          <div class="p-3 bg-light rounded shadow-sm">
            <h6>Total de Produtos</h6>
            <p class="fs-4">156</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3 bg-light rounded shadow-sm">
            <h6>Estoque Total</h6>
            <p class="fs-4">385</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3 bg-light rounded shadow-sm">
            <h6>Vendas no Mês</h6>
            <p class="fs-4">89</p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="p-3 bg-light rounded shadow-sm">
            <h6>Visitantes</h6>
            <p class="fs-4">1240</p>
          </div>
        </div>
      </div>
    </div>
  
  </div>
</div>

<!-- Scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
