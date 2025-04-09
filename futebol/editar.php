<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../sistema-login.php");
    exit;
}

// Simulação de produtos
$produtos = [
  ['id' => 1, 'nome' => 'Chuteira Nike Pro', 'preco' => 299.90],
  ['id' => 2, 'nome' => 'Bola Adidas Oficial', 'preco' => 199.99],
  ['id' => 3, 'nome' => 'Camiseta Seleção Brasil', 'preco' => 149.50],
  ['id' => 4, 'nome' => 'Caneleira Profissional', 'preco' => 49.90]
];

// Busca por nome
$busca = $_GET['busca'] ?? '';
if ($busca) {
    $produtos = array_filter($produtos, function($produto) use ($busca) {
        return stripos($produto['nome'], $busca) !== false;
    });
}

// Ordenação alfabética
usort($produtos, function($a, $b) {
    return strcmp($a['nome'], $b['nome']);
});
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar Produtos - Futebol</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">
</head>
<body style="background-color:rgba(179, 248, 225, 0.2);">

<?php include '../navbar.php'; ?>
<?php include '../mensagens.php'; ?>

<div class="content">
  <div class="container mt-4">
    <h3 class="mb-3 d-flex align-items-center">
      <i class="fas fa-edit text-primary me-2"></i> Editar Produtos - Futebol
    </h3>

    <!-- Botão de Voltar -->
    <a href="./dashboard.php" class="btn btn-sm btn-outline-secondary mb-4">
      <i class="fas fa-arrow-left me-1"></i> Voltar ao Painel
    </a>

    <!-- Campo de busca -->
    <form method="GET" class="mb-4">
      <div class="input-group">
        <input type="text" name="busca" class="form-control" placeholder="Buscar produto por nome..." value="<?= htmlspecialchars($busca) ?>">
        <button class="btn btn-outline-primary" type="submit">
          <i class="fas fa-search"></i> Buscar
        </button>
      </div>
    </form>

    <?php if (empty($produtos)): ?>
      <div class="alert alert-warning">Nenhum produto encontrado.</div>
    <?php else: ?>
      <div class="list-group">
        <?php foreach ($produtos as $produto): ?>
          <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
              <strong><?= $produto['nome'] ?></strong><br>
              <small class="text-muted">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></small>
            </div>
            <div class="btn-group">
              <a href="editar-produto.php?id=<?= $produto['id'] ?>" class="btn btn-outline-primary btn-sm">
                <i class="fas fa-pen"></i> Editar
              </a>
              <a href="excluir-produto.php?id=<?= $produto['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                <i class="fas fa-trash"></i>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>
