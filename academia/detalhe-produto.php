<?php

include "../verificar-autenticacao.php";


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

<body style="background-color:rgba(179, 248, 225, 0.2);">

  <?php
  include "../mensagens.php";
  include "../navbar.php";
  ?>

  <div class="form-container mt-5">
    <div class="card shadow-lg p-4">
      <h2 class="mb-4 text-dark"><i class="fas fa-dumbbell me-2"></i>Cadastrar Produto de Academia</h2>
      <form method="POST" action="cadastrar.php" enctype="multipart/form-data">
      <a href="detalhe-produto.php" class="btn btn-primary ms-2">
          <i class="fas fa-plus me-1"></i>Novo Produto
        </a>
        <hr>
        <div class="mb-3">
          <label for="productName" class="form-label">Nome do Produto</label>
          <input type="text" name="productName" id="productName" class="form-control" required value="<?php echo isset($product) ? $product["productName"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="productDescription" class="form-label">Descrição</label>
          <textarea name="productDescription" id="productDescription" class="form-control" rows="4" required><?php echo isset($product) ? $product["productDescription"] : ""; ?></textarea>
        </div>

        <div class="mb-3">
          <label for="productPrice" class="form-label">Preço (R$)</label>
          <input type="number" step="0.01" name="productPrice" id="productPrice" class="form-control" required value="<?php echo isset($product) ? $product["productPrice"] : ""; ?>" >
        </div>

        <div class="mb-3">
          <label for="productQuantity" class="form-label">Quantidade Estoque</label>
          <input type="number" name="productQuantity" id="productQuantity" class="form-control" required value="<?php echo isset($product) ? $product["productQuantity"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="productImage" class="form-label">Imagem do Produto</label>
          <input type="file" name="productImage" id="productImage" class="form-control" accept="image/*" value="<?php echo isset($product) ? $product["productImage"] : ""; ?>"  >
        </div>
        <?php
                    if (isset($product["productImage"])) {
                        echo '
                    <div class="mb-3">
                        <input type="hidden" name="currentProductImage" value="' . $product["productImage"] . '">
                        <img width="100" src="imagens/' . $product["productImage"] . '" >
                    </div>
                    ';
                    }
                    ?>

        <button type="submit" class="btn btn-success">
          <i class="fas fa-save me-1"></i>Salvar Produto
        </button>

        <a href="listar-produtos.php" class="btn btn-info ms-2">
          <i class="fas fa-list me-1"></i>Ver Produtos Cadastrados
        </a>

      </form>
    </div>
  </div>

</body>

</html>