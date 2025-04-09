<?php if (isset($mensagem)): ?>
      <div class="alert alert-success"><?= $mensagem ?></div>
    <?php elseif (isset($erro)): ?>
      <div class="alert alert-danger"><?= $erro ?></div>
    <?php endif; ?>