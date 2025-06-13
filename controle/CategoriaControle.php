<?php
require_once __DIR__ . '/../modelo/Categoria.php';
require_once __DIR__ . '/../conexao/Conexao.php';

class CategoriaControle {
    private $conn;

    public function __construct() {
        $this->conn = Conexao::getConexao();
    }

    public function listar() {
        $sql = "SELECT * FROM categorias";
        return $this->conn->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($categoria) {
        if ($categoria->id) {
            $sql = "UPDATE categorias SET nome=? WHERE id=?";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$categoria->nome, $categoria->id]);
        } else {
            $sql = "INSERT INTO categorias (nome) VALUES (?)";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute([$categoria->nome]);
        }
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM categorias WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM categorias WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
