<!-- Barra Superior -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
  <div class="container-fluid justify-content-between">
    <h5 class="text-white m-0"><i class="fas fa-tools me-2"></i>Painel Administrativo</h5>
    <a href="<?php echo $_SESSION["url"]; ?>/encerrar-sessao.php" class="btn btn-outline-light"><i class="fas fa-sign-out-alt me-1"></i> Sair</a>
  </div>
</nav>

<!-- Menu Lateral -->
<nav class="sidebar position-fixed d-flex flex-column align-items-center text-white p-4 shadow ">

  <!-- Perfil -->
  <div class="text-center w-100 mb-4 mt-2">
    <div class="position-relative d-inline-block">
      <img src="#"
           alt="Foto de Perfil"
           class="rounded-circle shadow border border-3 border-success">
      <div class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-light"
           style="width: 20px; height: 20px;"></div> <!-- status online -->
    </div>
    <h5 class="fw-semibold mt-3 mb-0">Admin</h5>
    <small class="text-white">Gerenciador</small>
  </div>

  <!-- Menu Links -->
  <ul class="nav flex-column w-100">
    <li class="nav-item mb-2">
      <a href="../index.php" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link">
        <i class="fas fa-home me-2"></i> Dashboard
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/contatos/formulario-contato.php" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "contatos" ? ' active text-primary' : ''; ?>">
      <i class="fas me-2"></i> Contatos
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/clientes" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "clientes" ? ' active text-primary' : ''; ?>">
        <i class="fas me-2"></i> Clientes
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/fornecedores" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "fornecedores" ? ' active text-primary' : ''; ?>">
        <i class="fas me-2"></i> Fornecedores
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/academia/listar-produtos.php" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "produtos" ? ' active text-primary' : ''; ?>">
      <i class="fas  me-2"></i> Produtos
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/vendas" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "vendas" ? ' active text-primary' : ''; ?>">
        <i class="fas  me-2"></i> Vendas
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/futebol" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "futebol" ? ' active text-primary' : ''; ?>">
      <i class="fas me-2"></i> Futebol
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/academia/index.php" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "academia" ? ' active text-primary' : ''; ?>">
      <i class="fas me-2"></i> Academia
      </a>
    </li>
    <li class="nav-item mb-2">
      <a href="<?php echo $_SESSION["url"]; ?>/natacao" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "natacao" ? ' active text-primary' : ''; ?>">
      <i class="fas me-2"></i> Natação
      </a>
    </li>
    <li class="nav-item">
      <a href="<?php echo $_SESSION["url"]; ?>/realidade-aumentada" class="nav-link d-flex align-items-center px-3 py-2 rounded hover-link <?php echo $pagina == "realidade-aumentada" ? ' active text-primary' : ''; ?>">
      <i class="fas me-2"></i> Realidade Aumentada
      </a>
    </li>
  </ul>
</nav>
