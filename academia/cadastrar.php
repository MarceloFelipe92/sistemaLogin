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
  <title>Cadastrar Produto - Academia</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/admin-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../style.css">
</head>
<body style="background-color:rgba(179, 248, 225, 0.2);" >

<?php include '../navbar.php'; ?>

<div class="form-container mt-5">
  <div class="card shadow-lg p-4">
    <h2 class="mb-4 text-dark"><i class="fas fa-dumbbell me-2"></i>Cadastrar Produto de Academia</h2>
<hr>
    <form method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nome" class="form-label">Nome do Produto</label>
        <input type="text" name="nome" id="nome" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control" rows="4" required></textarea>
      </div>

      <div class="mb-3">
        <label for="preco" class="form-label">Preço (R$)</label>
        <input type="number" step="0.01" name="preco" id="preco" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="estoque" class="form-label">Estoque</label>
        <input type="number" name="estoque" id="estoque" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="imagem" class="form-label">Imagem do Produto</label>
        <input type="file" name="imagem" id="imagem" class="form-control" accept="image/*" required>
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-save me-1"></i>Salvar Produto
      </button>
    </form>
  </div>
</div>

</body>
</html>
