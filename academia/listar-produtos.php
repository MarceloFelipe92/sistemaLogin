<?php

include "../verificar-autenticacao.php";

$pagina = "produtos";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Estilo customizado opcional -->
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: rgba(179, 248, 225, 0.2);">

    <?php
    include "../mensagens.php";
    include "../navbar.php";
    ?>

    <div class="container py-5 shadow-sm bg-white rounded-5">
        <div class="d-flex justify-content-between align-items-center  mb-4">
            <h2 class="text-dark "><i class="fas fa-boxes-stacked me-2 "></i>Produtos Cadastrados</h2>
            <div>
                <a href="detalhe-produto.php" class="btn btn-primary  me-2"><i class="fas fa-plus"></i> Novo Produto</a>
                <a href="exportar.php" class="btn btn-success me-2"><i class="fas fa-file-excel"></i> Exportar Excel</a>
                <a href="exportar.pdf.php" class="btn btn-danger"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
            </div>
        </div>

        <div class="table-responsive shadow-sm rounded-4">
            <table class="table table-striped align-middle">
                <thead class="table-dark text-uppercase">
                    <tr>
                        <th class="text-light">#</th>
                        <th class="text-light">Imagem</th>
                        <th class="text-light">Nome</th>
                        <th class="text-light">Descrição</th>
                        <th class="text-light">Preço</th>
                        <th class="text-light">Quantidade</th>
                        <th class="text-light">Ações</th>
                    </tr>
                </thead>
                <tbody id="productTableBody">
                    <!-- Os produtos serão carregados aqui via PHP -->
                    <?php
                    // SE HOUVER PRODUTOS NA SESSÃO, EXIBIR
                    if (!empty($_SESSION["produtos"])) {
                        foreach ($_SESSION["produtos"] as $key => $product) {
                            echo '
                                <tr>
                                    <th scope="row">' . ($key + 1) . '</th>
                                    <td><img src="imagens/' . $product["productImage"] . '"width="55"></td>
                                    <td>' . $product["productName"] . '</td>
                                    <td>' . $product["productDescription"] . '</td>
                                    <td>R$ ' . number_format($product["productPrice"], 2, ',', '.') . '</td>
                                    <td>' . $product["productQuantity"] . '</td>
                                    <td>
                                       <a href="detalhe-produto.php?kry=' . $key . '" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>Editar
                                       </a>
                                       <a href="remover.php?key=' . $key . '" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Excluir
                                       </a>
                                     </td>
                                </tr>
                                ';
                        }
                    } else {
                        echo '
                               <tr>
                                   <td colspan="7">
                                                    <div class="alert alert-info text-center p-4 mb-0 shadow-sm">
                                                        <i class="fas fa-info-circle fa-lg me-2 text-primary"></i>Nenhum produto cadastrado até o momento.
                                                    </div>
                                     </td>
                                </tr>
  
                            ';
                    }

                    ?>

                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>