<?php
require_once '../../controle/CategoriaControle.php';
$controle = new CategoriaControle();
$categorias = $controle->listar();
?>
<link rel="stylesheet" href="../../css/estilo.css">
<div class="container">
  <h2>Categorias</h2>
  <a href="form.php">Nova Categoria</a>
  <table border="1" style="width:100%; margin-top:20px;">
    <tr><th>ID</th><th>Nome</th><th>Ações</th></tr>
    <?php foreach ($categorias as $categoria): ?>
      <tr>
        <td><?= $categoria['id'] ?></td>
        <td><?= $categoria['nome'] ?></td>
        <td>
          <a href="form.php?id=<?= $categoria['id'] ?>">Editar</a> |
          <a href="form.php?excluir=<?= $categoria['id'] ?>" onclick="return confirm('Excluir categoria?')">Excluir</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <a href="../../public/index.php">Voltar à tela inicial</a>
</div>
