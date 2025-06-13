<?php
require_once '../../controle/AutorControle.php';
$controle = new AutorControle();
$id = $_GET['id'] ?? null;
$autor = ['id' => '', 'nome' => '', 'nacionalidade' => '', 'data_nascimento' => ''];

if ($id) {
    $autor = $controle->buscarPorId($id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $novo = new stdClass();
    $novo->id = $_POST['id'] ?? null;
    $novo->nome = $_POST['nome'];
    $novo->nacionalidade = $_POST['nacionalidade'];
    $novo->data_nascimento = $_POST['data_nascimento'];
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
  <h2>Cadastro de Autor</h2>
  <form method="post">
    <input type="hidden" name="id" value="<?= $autor['id'] ?>">
    <input type="text" name="nome" placeholder="Nome" value="<?= $autor['nome'] ?>" required>
    <input type="text" name="nacionalidade" placeholder="Nacionalidade" value="<?= $autor['nacionalidade'] ?>">
    <input type="date" name="data_nascimento" value="<?= $autor['data_nascimento'] ?>">
    <button type="submit">Salvar</button>
  </form>
  <a href="../../public/index.php">Voltar à tela inicial</a>
</div>
