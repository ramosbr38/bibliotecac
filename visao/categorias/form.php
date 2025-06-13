<?php
require_once '../../controle/CategoriaControle.php';
$controle = new CategoriaControle();
$id = $_GET['id'] ?? null;
$categoria = ['id' => '', 'nome' => ''];

if ($id) {
    $categoria = $controle->buscarPorId($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo = new stdClass();
    $novo->id = $_POST['id'] ?? null;
    $novo->nome = $_POST['nome'];
    $controle->salvar($novo);
    header('Location: listar.php');
}

if (isset($_GET['excluir'])) {
    $controle->excluir($_GET['excluir']);
    header('Location: listar.php');
}
?>
<link rel="stylesheet" href="../../css/estilo.css">
<div class="container">
  <h2>Cadastro de Categoria</h2>
  <form method="post">
    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
    <input type="text" name="nome" placeholder="Nome" value="<?= $categoria['nome'] ?>" required>
    <button type="submit">Salvar</button>
  </form>
  <a href="../../public/index.php">Voltar à tela inicial</a>
</div>
