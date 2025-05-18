<?php

include "../verificar-autenticacao.php";

$pagina = "clientes";

if (isset($_GET["key"])) {
  $key = $_GET["key"];
  $client = $_SESSION["clientes"][$key];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title>Cadastrar Cliente - Clientes</title>
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

  <div class="form-container mt-5 ">
    <h1 class="text-center  text-white mb-4"><i class="fas fa-user  me-2"></i>Cadastro de Cliente</h1>
    <p class="text-center  text-white">Preencha os campos abaixo para cadastrar um novo cliente.</p>
    <a href="../clientes/index.php" class="btn  text-white btn-outline-success mb-2 ">
      <i class="fas fa-arrow-left me-2  text-white"></i>Voltar
    </a>
    <div class="card shadow-lg p-4">
      <h2 class="mb-2 text-dark"><i class="fas fa-user "></i></h2>
      <form method="POST" action="../clientes/cadastrar.php" enctype="multipart/form-data">
        <?php if (isset($key)) { ?>
          <input type="hidden" name="clientId" value="<?php echo $key; ?>">
        <?php } ?>
        <div class="mb-3">
          <label for="categoria" class="form-label">Categoria</label>
          <select name="categoria" id="categoria" class="form-select" required>
            <option value="" selected>Selecione a categoria</option>
            <option value="vip" <?php echo isset($client) && $client["categoria"] == "vip" ? "selected" : ""; ?>>VIP</option>
            <option value="regular" <?php echo isset($client) && $client["categoria"] == "regular" ? "selected" : ""; ?>>Regular</option>
            <option value="novo" <?php echo isset($client) && $client["categoria"] == "novo" ? "selected" : ""; ?>>Novo</option>
            <option value="premium" <?php echo isset($client) && $client["categoria"] == "premium" ? "selected" : ""; ?>>Premium</option>
          </select>
        </div>
        <hr>
        <div class="mb-3">
          <label for="clientName" class="form-label">Nome do Cliente</label>
          <input type="text" name="clientName" id="clientName" class="form-control" required value="<?php echo isset($client) ? $client["clientName"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientCPF" class="form-label">CPF</label>
          <input data-mask="000.000.000-00" type="text" name="clientCPF" id="clientCPF" class="form-control" required value="<?php echo isset($client) ? $client["clientCPF"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientEmail" class="form-label">Email</label>
          <input type="email" name="clientEmail" id="clientEmail" class="form-control" required value="<?php echo isset($client) ? $client["clientEmail"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientWhatsapp" class="form-label">WhatsApp</label>
          <input data-mask="(00) 0 0000-0000" type="text" name="clientWhatsapp" id="clientWhatsapp" class="form-control" required value="<?php echo isset($client) ? $client["clientWhatsapp"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientImage" class="form-label">Imagem do Cliente</label>
          <input type="file" name="clientImage" id="clientImage" class="form-control" accept="image/*" value="<?php echo isset($client) ? $client["clientImage"] : ""; ?>">
        </div>
        <?php
                    if (isset($client["clientImage"])) {
                        echo '
                    <div class="mb-3">
                        <input type="hidden" name="currentClientImage" value="' . $client["clientImage"] . '">
                        <img width="100" src="imagens/' . $client["clientImage"] . '" >
                    </div>
                    ';
                    }
         ?>
        <div class="mb-3">
          <label for="clientCEP" class="form-label">CEP</label>
          <input data-mask="00000-000" type="text" name="clientCEP" id="clientCEP" class="form-control" required value="<?php echo isset($client) ? $client["clientCEP"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientLogradouro" class="form-label">Logradouro</label>
          <input type="text" name="clientLogradouro" id="clientLogradouro" class="form-control" required value="<?php echo isset($client) ? $client["clientLogradouro"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientNumero" class="form-label">Número</label>
          <input type="text" name="clientNumero" id="clientNumero" class="form-control" required value="<?php echo isset($client) ? $client["clientNumero"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientComplemento" class="form-label">Complemento</label>
          <input type="text" name="clientComplemento" id="clientComplemento" class="form-control" value="<?php echo isset($client) ? $client["clientComplemento"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientBairro" class="form-label">Bairro</label>
          <input type="text" name="clientBairro" id="clientBairro" class="form-control" required value="<?php echo isset($client) ? $client["clientBairro"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientCidade" class="form-label">Cidade</label>
          <input type="text" name="clientCidade" id="clientCidade" class="form-control" required value="<?php echo isset($client) ? $client["clientCidade"] : ""; ?>">
        </div>

        <div class="mb-3">
          <label for="clientEstado" class="form-label">Estado</label>
          <select name="clientEstado" id="clientEstado" class="form-select" required>
            <option value="" selected>Selecione o estado</option>
            <?php
            $estados = ["AC", "AL", "AP", "AM", "BA", "CE", "DF", "ES", "GO", "MA", "MT", "MS", "MG", "PA", "PB", "PR", "PE", "PI", "RJ", "RN", "RS", "RO", "RR", "SC", "SP", "SE", "TO"];
            foreach ($estados as $estado) {
              echo '<option value="' . $estado . '" ' . (isset($client) && $client["clientEstado"] == $estado ? "selected" : "") . '>' . $estado . '</option>';
            }
            ?>
          </select>
        </div>

        <div class="row g-3">
          <div class="col-md-4">
            <button href="../clientes/cadastrar.php" type="submit" class="btn btn-outline-success w-100  shadow-sm">
              <i class="fas fa-save me-2"></i>Salvar Cliente
            </button>
          </div>
          <div class="col-md-4">
            <a href="../clientes/index.php" class="btn btn-outline-secondary w-100  shadow-sm">
              <i class="fas fa-list me-2"></i>Ver Clientes Cadastrados
            </a>
          </div>
      
        </div>
      </form>
    </div>
  </div>

</body>

</html>