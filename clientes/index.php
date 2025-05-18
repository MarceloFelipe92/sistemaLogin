<?php

include "../verificar-autenticacao.php";

// INDICA QUAL PÁGINA ESTOU NAVEGANDO
$pagina = "home";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Painel Cliente</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color:rgba(179, 248, 225, 0.2);">

  <?php include '../navbar.php'; ?>
  <?php include '../mensagens.php'; ?>

  <div class="content">
    <div class="container mt-4">
    <h3 class="mb-4"><i class="fas fa-users text-primary"></i> Painel de Gerenciamento - Cliente</h3>
      <p class="text-muted">Gerencie os clientes e suas informações pessoais e de contato.</p>
      <hr>

    </div>
  </div>

  <div class="content">
    <div class="container mt-4">
    
    <div class="container py-5 shadow-lg bg-white rounded-5">
     <!-- Cabeçalho da página -->
     <div class="d-flex justify-content-between align-items-center mb-4">
         <h2 class="text-dark"><i class="fas fa-users me-2"></i>Clientes Cadastrados</h2>
         <a href="<?php echo $_SESSION["url"]; ?>index.php" class="btn btn-outline-success shadow-sm">
          <i class="fas fa-arrow-left me-2"></i>Voltar
         </a>
         <div>
          <!-- Botões de ações -->
          <a href="../clientes/detalhe-cliente.php" class="btn btn-outline-primary shadow-sm"><i class="fas fa-plus"></i> Novo Cliente</a>
          <a href="../clientes/exportar.php" class="btn btn-outline-success shadow-sm"><i class="fas fa-file-excel"></i> Exportar Excel</a>
          <a href="../clientes/exportar.pdf.php" class="btn btn-outline-danger shadow-sm"><i class="fas fa-file-pdf"></i> Exportar PDF</a>
          

          <!-- Formulário de pesquisa -->
          <form class="d-inline-block" method="GET" action="../clientes/listar-clientes.php">
              <div class="input-group">
               <input type="text" name="search" class="form-control" placeholder="Pesquisar clientes..."
                value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
               <button class="btn btn-outline-secondary" type="submit"><i class="fas fa-search"></i></button>
              </div>
          </form>
         </div>
     </div>

     <!-- Tabela de clientes -->
     <div class="table-responsive shadow-lg rounded-4">
         <table class="table table-hover align-middle">
          <thead class="table-dark text-uppercase">
              <tr>
               <th>#</th>
               <th>Imagem</th>
               <th>Nome</th>
               <th>CPF</th>
               <th>Email</th>
               <th>Whatsapp</th>
               <th>Endereço</th>
               <th>Ações</th>
              </tr>
          </thead>
          <tbody>
              <?php
              // Inicializa variáveis de pesquisa
              $termoPesquisa = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';
              $clientesEncontrados = false;

              // Verifica se há clientes cadastrados
              if (!empty($_SESSION["clientes"])) {
               foreach ($_SESSION["clientes"] as $key => $client) {
                // Filtra clientes com base no termo de pesquisa
                if (!empty($termoPesquisa)) {
                    $nomeCliente = strtolower($client["clientName"]);
                    $emailCliente = strtolower($client["clientEmail"]);
                    if (strpos($nomeCliente, $termoPesquisa) === false && strpos($emailCliente, $termoPesquisa) === false) {
                     continue;
                    }
                }

                $clientesEncontrados = true;
                // Exibe os clientes encontrados
                echo '
                    <tr>
                     <th scope="row">' . ($key + 1) . '</th>
                     <td><img src="imagens/' . $client["clientImage"] . '" width="55"></td>
                     <td>' . $client["clientName"] . '</td>
                     <td>' . $client["clientCPF"] . '</td>
                     <td>' . $client["clientEmail"] . '</td>
                     <td>' . $client["clientWhatsapp"] . '</td>
                     <td>' . $client["clientLogradouro"] . ', ' . $client["clientNumero"] . ' ' . $client["clientComplemento"] . ', ' . $client["clientBairro"] . ', ' . $client["clientCidade"] . ' - ' . $client["clientEstado"] . ' (' . $client["clientCEP"] . ')</td>
                     <td>
                         <a href="../clientes/detalhe-cliente.php?key=' . $key . '" class="btn btn-sm btn-outline-primary btn-sm me-2 mb-2"><i class="fas fa-edit"></i> Editar</a>
                         <a href="../clientes/remover.php?key=' . $key . '" class="btn btn-sm btn-outline-danger btn-sm me-2"><i class="fas fa-trash"></i> Excluir</a>
                     </td>
                    </tr>';
               }

               // Mensagem caso nenhum cliente seja encontrado na pesquisa
               if (!empty($termoPesquisa) && !$clientesEncontrados) {
                echo '<tr><td colspan="8" class="text-center">
                    <div class="alert alert-warning p-4 mb-0 shadow-sm">
                     <i class="fas fa-exclamation-circle fa-lg me-2"></i>Nenhum cliente encontrado para "' . htmlspecialchars($termoPesquisa) . '"
                    </div>
                </td></tr>';
               }
              } else {
               // Mensagem caso não haja clientes cadastrados
               echo '<tr><td colspan="8" class="text-center">
                <div class="alert alert-info p-4 mb-0 shadow-sm">
                    <i class="fas fa-info-circle fa-lg me-2 text-primary"></i>Nenhum cliente cadastrado até o momento.
                </div>
               </td></tr>';
              }
              ?>
          </tbody>
         </table>
     </div>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</body>

</html>
